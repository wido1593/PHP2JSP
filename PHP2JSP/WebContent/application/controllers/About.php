<?
class About extends CI_Controller { 
		function __construct()
    {
            parent::__construct();
            $this->load->database();
            $this->load->model("About_m");

	}		
    public function index()            
    {
		$data["member"] = $this->About_m->member(); // �ش������� �ڷ��б�
        $this->load->view("main_header");
		$this->load->view("about",$data);
        $this->load->view("main_footer");
    }
}
?>