<?php 
class SummaryReport extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('summary','',TRUE);

	}  
	
	public function school()
	{




    
      if ( isset($_GET['Place']) ) {
       $place = $_GET['Place'];
   		 $this->load->view("header");
   		 $data['Gender'] = $this->summary->get_genderTable(null,$place);
       $data['total'] = $this->summary->get_totalTable(null,$place);
       $data['distinctEvent'] = $this->summary->get_distinctEvent($place);
       $data['Program'] = $this->summary->get_programTable(null,$place);
       $data['Profile'] = $this->summary->get_schoolProfile($place);
       $data['schoolYear'] = $this->summary->get_schoolYearTable(null,$place);
       $data['Contact'] = $this->summary->get_ContactPerson($place);
       $data['Event'] = $this->summary->get_Event($place);
       $this->load->view("summary/graph",$data);

			 $this->schoolsuccessChart();
			 $this->load->view("footer");
      }
      else{
        $this->load->view("footer");
      }
	}
  public function changeEvent()
  {
       if ( isset($_GET['Event']) and isset($_GET['Place'])) {
         $event = $_GET['Event'];
         $place = $_GET['Place'];
         $this->load->view("header");
         $data['Gender'] = $this->summary->get_genderTable($event,$place);
         $data['total'] = $this->summary->get_totalTable($event,$place);
         $data['distinctEvent'] = $this->summary->get_distinctEvent($place);
         $data['Program'] = $this->summary->get_programTable($event,$place);
         $data['Profile'] = $this->summary->get_schoolProfile($place);
         $data['schoolYear'] = $this->summary->get_schoolYearTable($event,$place);
         $data['Contact'] = $this->summary->get_ContactPerson($place);
         $data['Event'] = $this->summary->get_Event($place);
         $this->load->view("summary/graph",$data);
       }
       else{
        echo "<script type='text/javascript'>alert('Some error occur');</script>";
       
       }
  }
  
	public function schoolpieChart()
	{
    $place = $_GET['Place'];
		print $json = json_encode($this->summary->get_schoolpieChart($place));
	}
  public function schoolcolumnChart()
  {
    $place = $_GET['Place'];
    print $json = json_encode($this->summary->get_schoolcolumnChart($place));
  }
  public function schoolsuccessChart(){
    $place = $_GET['Place'];
    print $json = json_encode($this->summary->get_schoolSuccessChart($place));
  }
}

/* End of file chart.php */
/* Location: ./application/controllers/chart.php */