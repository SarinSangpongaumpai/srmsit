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
       $this->load->view("side");
   		 $data['Gender'] = $this->summary->get_genderTable(null);
       $data['total'] = $this->summary->get_totalTable(null);
       $data['distinctEvent'] = $this->summary->get_distinctEvent();
       $data['Program'] = $this->summary->get_programTable(null);
       $data['Profile'] = $this->summary->get_schoolProfile(null);
       $data['schoolYear'] = $this->summary->get_schoolYearTable(null);
       $data['Contact'] = $this->summary->get_ContactPerson();
       $data['Event'] = $this->summary->get_Event();
       $this->load->view("summary/graph",$data);

			 
			 $this->load->view("footer");
	}
  public function changeEvent()
  {
       if ( isset($_GET['Event']) ) {
         $event = $_GET['Event'];
         $this->load->view("header");
         $this->load->view("side");
         $data['Gender'] = $this->summary->get_genderTable($event);
         $data['total'] = $this->summary->get_totalTable($event);
         $data['distinctEvent'] = $this->summary->get_distinctEvent();
         $data['Program'] = $this->summary->get_programTable($event);
         $data['Profile'] = $this->summary->get_schoolProfile($event);
         $data['schoolYear'] = $this->summary->get_schoolYearTable($event);
         $data['Contact'] = $this->summary->get_ContactPerson();
         $data['Event'] = $this->summary->get_Event();
         $this->load->view("summary/graph",$data);
       }
       else{
        echo "<script type='text/javascript'>alert('Some error occur');</script>";
        $this->index();
       }
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