<?
    class Country_reply extends CI_Controller {
        function __construct() 
        {
            parent::__construct();
            $this->load->database();
            $this->load->model("country_reply_m");
			$this->load->helper(array("url","date"));   
			$this->load->library('pagination');
        }
        public function index()
        {
			//if (!$this->session->userdata("rnak")!=1) redirect("/");

            $this->lists();     
        }
        public function lists()
        {
		$uri_array=$this->uri->uri_to_assoc(3);
		$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
		if ($text1=="") 
		$base_url = "/country_reply/lists/page";               // $page_segment = 4;
		else 
		$base_url = "/country_reply/lists/text1/$text1/page";    // $page_segment = 6;
		$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;

		$base_url = "/~team5" . $base_url;

		$config["per_page"]	 = 5;                              // �������� ǥ���� line ��
		$config["total_rows"] = $this->country_reply_m->rowcount($text1);  // ��ü ���ڵ尳�� ���ϱ�
		$config["uri_segment"] = $page_segment;		 // �������� �ִ� segment ��ġ
		$config["base_url"]	 = $base_url;                // �⺻ URL
		$this->pagination->initialize($config);           // pagination ���� ����

		$data["page"]=$this->uri->segment($page_segment,0);  // ������ġ, ������ 0.
		$data["pagination"] = $this->pagination->create_links();  // �������ҽ� ����

		$start=$data["page"];                 // n������ : ������ġ
		$limit=$config["per_page"];        // ������ �� ���μ�

		$data["text1"]=$text1;
        $data["list"] = $this->country_reply_m->getlist($text1,$start,$limit); // �ش������� �ڷ��б�
		$this->load->view("admin_header");
        $this->load->view("country_reply_list",$data); 
        $this->load->view("admin_footer");
        }

		public function view(){
		$uri_array=$this->uri->uri_to_assoc(3);
		$no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
		$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
		$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : 0 ;

		$data2["text1"]=$text1;
		$data2["page"]=$page;
		$data2["row"] = $this->country_reply_m->getrow($no);

		$this->load->view("admin_header");
        $this->load->view("country_reply_view",$data); 
        $this->load->view("admin_footer");

		}

		public function del()
		{
		$uri_array=$this->uri->uri_to_assoc(3);
		$no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
		$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "" ;
		$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0 ;

		$this->country_reply_m->deleterow($no);
		redirect("/~team5/country_reply/lists/".$text1.$page);
		}

		public function add()
		{
		$prevPage = $_SERVER['HTTP_REFERER'];
		$uri_array=$this->uri->uri_to_assoc(3);
		$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "" ;
		$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0 ;

		$this->load->library("form_validation");

		$this->form_validation->set_rules("name","��	��","required|max_length[20]");

		if ( $this->form_validation->run()==TRUE )
		{
		 $this->load->view("main_header");
		 $this->load->view("country_view");    // �Է�ȭ�� ǥ��
         $this->load->view("main_footer");
		 }
		 else              // �Է�ȭ���� �����ư Ŭ���� ���
		 {

         $data=array(
				'country_no' => $this->input->post("country_no",true),
				'username' => $this->input->post("reply_name",true),
				'country_reply' => $this->input->post("reply_message",true),
				'country_score' => $this->input->post("reply_score",true),
				'country_id' => $this->input->post("reply_id",true)	
			 );

         $result=$this->country_reply_m->insertrow($data); 
		
         header('location:'.$prevPage);   //   ���ȭ������ �̵�.
			}
		}


    }
?>
