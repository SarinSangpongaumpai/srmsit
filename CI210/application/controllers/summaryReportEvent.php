<?php 
class SummaryReportEvent extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('summaryEvent','',TRUE);

	}  
	
	public function event(){
	  //$this->load->view("summary/upload");
     
   		 $this->load->view("header");
   	   $data['CostParticipant'] = $this->summaryEvent->getCostParticipant();
       $this->load->view("summary/event",$data);
			 $this->load->view("footer");
  }
  
	public function test()
	{
    //$place = $_GET['Place'];
		$json = json_encode($this->summaryEvent->getCostParticipant() , JSON_NUMERIC_CHECK);
     print $json;
	}


 } 

/* End of file chart.php */
/* Location: ./application/controllers/chart.php */