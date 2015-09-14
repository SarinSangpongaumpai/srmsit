<?php 
class Map extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('map_model');
		$this->load->library('googlemaps');
	}  
	
	public function index()
	{	
		$this->load->view('header');
		$this->load->view('map/map');
		$this->load->view('footer');
	}
	public function addSchool(){
		$data = array('name'=>  $this->input->post('name'),
                'location'=>$this->input->post('location'),
                'school_code'=>$this->input->post('code'),
                'latitude'=>$this->input->post('latitude'),
                'longitude' =>$this->input->post('longtitude'));
                $this->db->insert('school', $data); 
        print "<script type=\"text/javascript\">alert('ลงทะเบียนสำเร็จแล้ว');</script>";
   		redirect('map/index', 'refresh');
	}
}
?>
