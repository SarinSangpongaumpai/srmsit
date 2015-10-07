<?php 
class Upload extends CI_Controller {

	public $data;
	public function __construct()
	{
	parent::__construct();
	$this->load->model('upload_function', 'function');
	$this->load->helper("form");
	}
	public function index()
	{
		
		$this->load->view("header");
	    $this->load->view("upload/studentUpload");
	    $this->load->view('footer');

	}
	function studentUpload(){
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
			$this->load->view('upload/studentUploadCon');
			$this->load->view('footer');

		}
		else{
			echo $this->upload->display_errors();
			echo anchor("studentUpload","Back");
		}
			
	}
	function studentSubmit(){
		$this->function->studentUpload_csv();
		$this->index();
		print "<script type=\"text/javascript\">alert('Upload File SuccessFul');;</script>";
		
	}
	function participantUpload(){
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
			$this->load->view('upload/participantUploadCon');
			$this->load->view('footer');

		}
		else{
			echo $this->upload->display_errors();
			echo anchor("participantUpload","Back");
		}
			
	}
	function registerSubmit(){
		$this->function->registerUpload_csv();
		$this->index();
		print "<script type=\"text/javascript\">alert('Upload File SuccessFul');;</script>";
		
	}
	function registerUpload(){
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
			$this->load->view('upload/registerUploadCon');
			$this->load->view('footer');

		}
		else{
			echo $this->upload->display_errors();
			echo anchor("registerUpload","Back");
		}
			
	}
}

/* End of file chart.php */
/* Location: ./application/controllers/chart.php */