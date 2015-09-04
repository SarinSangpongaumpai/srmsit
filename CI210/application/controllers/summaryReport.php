<?php 
class SummaryReport extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('summary','',TRUE);
	}  
	
	public function index()
	{

   		 $this->load->view("header");
   		 $data['Gender'] = $this->summary->get_genderTable();
       $data['total'] = $this->summary->get_totalTable();
       $data['totalEvent'] = $this->summary->get_totalEvent();
       $data['Program'] = $this->summary->get_programTable();
       $this->load->view("summary/graph",$data);

			 $this->load->view("side");
			 $this->load->view("footer");
	}
  
	public function pieChart()
	{
		print $json = json_encode($this->summary->get_pieChart());
	}
  public function columnChart()
  {
    print $json = json_encode($this->summary->get_columnChart());
  }
  public function table(){
    //$data['gender'] = $this->summary->get_genderTable());
  }
}

/* End of file chart.php */
/* Location: ./application/controllers/chart.php */