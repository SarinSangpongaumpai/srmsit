<?php 
class SummaryReportEvent extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('summary_event','',TRUE);

	}  
	
	public function event()
	{
   	   $this->load->view("header");
   	   $data['CostParticipant'] = $this->summary_event->getCostParticipant();
       $this->load->view("summary/event",$data);
	   $this->load->view("footer");
    }
  
	public function getCostParticipant()
	{
     $json = json_encode($this->summary_event->getCostParticipant() , JSON_NUMERIC_CHECK);
     print $json;
	}
    public function getCostEffective()
    {
     $json = json_encode($this->summary_event->getCostEffective() , JSON_NUMERIC_CHECK);
     print $json;
    }
 } 