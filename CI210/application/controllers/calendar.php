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
	}	
	// Json data for calendar
	public function data()
	{
		print $json = json_encode($this->calendar_m->get_calendar());
	}
	// Get event from view and add to DB
	public function addEvent()
	{
		if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) 
				&& isset($_POST['type']) && isset($_POST['place'])
				&& isset($_POST['budget'])&& isset($_POST['expectPeople']) )
		{
			$title 				= $_POST['title'];
			$start 				= $_POST['start'];
			$end 				= $_POST['end'];
			$type 				= $_POST['type'];
			$place 				= $_POST['place'];
			$budget 			= $_POST['budget'];
			$expectPeople 		= $_POST['expectPeople'];
			$this->calendar_m->addEvent($title,$start,$end,$type,$place,$budget,$expectPeople);
		}
		else{
			print "<script type=\"text/javascript\">alert('Some error occur,please try again');</script>";
		}
	}
	public function editEvent()
	{
		if (isset($_POST['eventID']) && isset($_POST['title']) 
			&& isset($_POST['start']) && isset($_POST['end'])
			&& isset($_POST['type']) && isset($_POST['place'])
				&& isset($_POST['budget'])&& isset($_POST['expectPeople']) )
		{
			$id 				= $_POST['eventID'];
			$title 				= $_POST['title'];
			$start 				= $_POST['start'];
			$end 				= $_POST['end'];
			$type 				= $_POST['type'];
			$place 				= $_POST['place'];
			$budget 			= $_POST['budget'];
			$expectPeople 		= $_POST['expectPeople'];
			$this->calendar_m->updateEvent($id,$title,$start,$end,$type,$place,$budget,$expectPeople);
			//print "<script type=\"text/javascript\">alert('Edit Successfully');</script>";
		
		}
		else{
			print "<script type=\"text/javascript\">alert('Some error occur,please try again');</script>";
		}
	}
	// Remove specific event
	public function removeEvent()
	{
		if (isset($_POST['id']))
		{
			$this->calendar_m->removeEvent($_POST['id']);
		}
	}
}