<?php 
class Upload extends CI_Controller {

	public $data;
	public function __construct()
	{
	//Core controller constructor
	parent::__construct();
	$this->load->model('upload_function', 'function');
	$this->load->helper("form");
	}
	public function index()
	{
		
		$this->load->view("header");
		//$this->load->view("side");
	    $this->load->view("upload/upload");

	}
	function do_upload(){
		$config = array(
			"upload_path"=>"uploadFile/",
			"allowed_types"=>"csv|docx",
			"max_size"=>2000,
			"max_height"=>2000,
			"max_width"=>2000
			);
		$this->load->library("upload",$config);
		if($this->upload->do_upload("upload")){
			$data = $this->upload->data();
			$name="temp";
			rename($data['full_path'],$data['file_path'].$name.$data['file_ext']);
			$this->load->view("header");
			//$this->load->view("side");
			$this->load->view('upload/upload2');

		}
		else{
			echo $this->upload->display_errors();
			echo anchor("upload","Back");
		}
			
	}
	function submit(){
		$this->function->upload_csv();
		$this->index();
		print "<script type=\"text/javascript\">alert('Upload File SuccessFul');;</script>";
		
	}

}

/* End of file chart.php */
/* Location: ./application/controllers/chart.php */