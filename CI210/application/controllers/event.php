<?php 
class Event extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('event_m','',TRUE);
	}  
	
	public function setting()
	{
		$this->load->view("header");
		$this->load->view("event/event");
		$this->load->view("footer");
	}	
	public function listEvent()
	{
		  if ( isset($_POST['start']))    { $start      = $_POST['start']; }
	      	else{ $start = "2015-01-01"; }
	      if ( isset($_POST['end'])) 	  { $end     	= $_POST['end']; }
	      	else{ $end   = date("Y-m-d");}
	      if ( ($_POST['duration'] != 0)) { $duration   = $_POST['duration'];}
	      	else{ $duration = "1";}
	      if ( ($_POST['mincost'] != 0)) {  $mincost  	= $_POST['mincost'];}
	      	else{ $mincost = "0";}
	      if ( ($_POST['maxcost'] != 0)) {  $maxcost  	= $_POST['maxcost'];}
	      	else{ $maxcost = "200000";}
		$this->load->view("header");
		$data['result'] = $this->event_m->getEvent($start,$end,$duration,$mincost,$maxcost);
		$data['jsonResult'] = json_encode($this->event_m->getEventGraph($start,$end,$duration,$mincost,$maxcost));
		$this->load->view("event/list",$data);
		$this->load->view("footer");
	}	
}
