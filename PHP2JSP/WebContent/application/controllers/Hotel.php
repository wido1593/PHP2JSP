<?
class Hotel extends CI_Controller { 
	function __construct()
    {
            parent::__construct();
            $this->load->database();
            $this->load->model("hotel_m");
			$this->load->library('pagination');
			$this->load->helper('cookie');
			$this->load->helper('date');
			$this->load->helper(array("url","date"));  
	}		
    public function index()            
    {
		 $this->lists();    
    }

	 public function lists()
        {
		$uri_array=$this->uri->uri_to_assoc(3);
		$text2=array_key_exists("text2",$uri_array) ? urldecode($uri_array["text2"]) : "";
		$text3=array_key_exists("text3",$uri_array) ? urldecode($uri_array["text3"]) : "";


		$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
		if ($text1=="")
		$base_url = "/hotel/lists/page";               // $page_segment = 4;
		else 
		$base_url = "/hotel/lists/text1/$text1/text2/$text2/text3/$text3/page";    // $page_segment = 6;
		$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;

		$base_url = "/~team5" . $base_url;

		$config["per_page"]	 = 9;                              // �������� ǥ���� line ��
		$config["total_rows"] = $this->hotel_m->rowcount($text1,$text2,$text3);  // ��ü ���ڵ尳�� ���ϱ�
		$config["uri_segment"] = $page_segment;		 // �������� �ִ� segment ��ġ
		$config["base_url"]	 = $base_url;                // �⺻ URL
		$this->pagination->initialize($config);           // pagination ���� ����
		
		$data["page"]=$this->uri->segment($page_segment,0);  // ������ġ, ������ 0.
		$data["pagination"] = $this->pagination->create_links();  // �������ҽ� ����

		$start=$data["page"];                 // n������ : ������ġ
		$limit=$config["per_page"];        // ������ �� ���μ�

		$data["text1"]=$text1;
		$data["text2"]=$text2;
		$data["text3"]=$text3;
        $data["list"] = $this->hotel_m->getlist($text1,$text2,$text3,$start,$limit); // �ش������� �ڷ��б�
		$data["list2"] = $this->hotel_m->getrow2($text1,$start,$limit);
		
		$this->load->view("main_header");
        $this->load->view("hotel_list",$data); 
        $this->load->view("main_footer");
        }

		public function view(){
		$uri_array=$this->uri->uri_to_assoc(3);
		$no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
		$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
		$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : 0 ;

		$data["text1"]=$text1;
		$data["page"]=$page;
		$data["row"] = $this->hotel_m->getrow($no);
		$data["list3"]=$this->hotel_m->getrow4($no);
		$data["list4"]=$this->hotel_m->getrow5($no);
		$data["list5"] = $this->hotel_m->getrow6($no);
		$data["sessionname"] = $this->hotel_m->getrow3();

		$this->load->view("main_header");
        $this->load->view("hotel_view",$data); 
        $this->load->view("main_footer");

		}

		public function viewHotel()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$no=array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
			$text1=array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : 0 ;
			$data["text1"]=$text1;
			$data["page"]=$page;
			$data["row"] = $this->hotel_m->getrow6($no);

			$this->load->view('hotelinformation',$data);
		}

		public function reservation()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : 0 ;

			$data["text1"]=$text1;
			$no=$_POST["number"];
			$data["page"]=$page;
			$data["row"] = $this->hotel_m->getrow5($no);
			$data["Adult"] = $_POST["price1"];
			$data["Child"] = $_POST["price2"];
			$data["totalPrice"] = $_POST["totalprice"];
			$data["productno"] = $_POST["number"];
			$data["checkin"] = $_POST["checkin"];
			$data["checkout"] = $_POST["checkout"];
			$this->load->view("main_header");
			$this->load->view("hotel_reservation",$data); 
			$this->load->view("main_footer");
		}

		public function pay()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : 0 ;
			$data["Child"] = $_POST["child"];
			$data["Adult"] = $_POST["adult"];
			$data["totalPrice"] = $_POST["totalp"];
			$data["formtotal"] = $_POST["totalt"];
			$data["totalProduct"] = $_POST["totalproduct"];
			$data["realTotal"] = $_POST["totals"];
			$data["productno"] = $_POST["productno"];
			$data["checkin"] = $_POST["checkin"];
			$data["checkout"] = $_POST["checkout"];
			$data["member"] = $this->hotel_m->sessioninfo();
			$this->load->view("main_header");
			$this->load->view("hotel_pay",$data); 
			$this->load->view("main_footer");
		}
		public function payadd()
		{
		 $card1 = $this->input->post("card1",true);
         $card2 = $this->input->post("card2",true);
		 $card3 = $this->input->post("card3",true);
		 $card4 = $this->input->post("card4",true);
		 $card = sprintf("%-4s%-4s%-4s%-4s",$card1,$card2,$card3,$card4);
		 $month = $this->input->post("expire_month",true);
			$uri_array=$this->uri->uri_to_assoc(3);
			$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0 ;

			$this->load->library("form_validation");
			$this->form_validation->set_rules("name","�̸�","required|max_length[20]");

			 $data=array(
				'product_no'=>$this->input->post("product_no",true),
				'type'=>3,
				'member_id'=>$this->input->post("lastname_booking",true),
				'pay_type'=>$this->input->post("pay_method",true),
				'card_no'=>$card,
				'month'=>$month,
				'year'=>$this->input->post("expire_year",true),
				'cvc'=>$this->input->post("cvc",true),
				'bankbook'=>$this->input->post("muselect",true),
				'payday'=>date("Y-m-d"),
				'price'=>$this->input->post("total_price",true),
				'status'=>0,
				 'checkin'=>$this->input->post("checkin",true),
				 'checkout'=>$this->input->post("checkout",true)
				 );

				$result=$this->hotel_m->insertrow($data); 
			$this->load->view("main_header");
			$this->load->view("reservation_complete"); 
			$this->load->view("main_footer");
		}

			public function delReply()
				{
						$prevPage = $_SERVER['HTTP_REFERER'];
					$uri_array=$this->uri->uri_to_assoc(3);
					$no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
					$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "" ;
					$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0 ;

					$this->hotel_m->deletereply($no);
					header('location:'.$prevPage);   //   ���ȭ������ �̵�.
				}

}
?>
