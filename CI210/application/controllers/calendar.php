<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('calendar_m');
	}  
	
	public function index()
	{
		
		$this->load->view("header");
		$this->load->view("calendar/calendar");
		$this->data();
	}	
	public function data(){
		print $json = json_encode($this->calendar_m->get_calendar());
	}
	public function addEvent(){
		if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) 
				&& isset($_POST['type']) ){
			$title = $_POST['title'];
			$start = $_POST['start'];
			$end = $_POST['end'];
			$type = $_POST['type'];
			$this->calendar_m->addEvent($title,$start,$end,$type);
		}
	}
	public function removeEvent(){
		if (isset($_POST['id'])){
			$this->calendar_m->removeEvent($_POST['id']);
		}
	}
}
/* End of file chart.php */
/* Location: ./application/controllers/chart.php */