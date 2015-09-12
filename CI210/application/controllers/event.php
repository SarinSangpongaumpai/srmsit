<?php 
class Event extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data');
	}  
	
	public function index()
	{
		
		$this->load->view("header");
		//$this->load->view("side");
		$this->load->view("event/event");
		

	}	
}

/* End of file chart.php */
/* Location: ./application/controllers/chart.php */