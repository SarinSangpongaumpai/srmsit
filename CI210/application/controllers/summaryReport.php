<?php 
class SummaryReport extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('summary','',TRUE);

	}  
	
	public function school()
	{

    $this->load->library('googlemaps');

$config['center'] = '37.4419, -122.1419';
$config['zoom'] = 'auto';
$this->googlemaps->initialize($config);

$marker = array();
$marker['position'] = '37.429, -122.1419';
$this->googlemaps->add_marker($marker);
$data['map'] = $this->googlemaps->create_map();


    
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
  
	public function pieChart()
	{
    $place = $_GET['Place'];
		print $json = json_encode($this->summary->get_pieChart($place));
	}
  public function columnChart()
  {
    $place = $_GET['Place'];
    print $json = json_encode($this->summary->get_columnChart($place));
  }
  public function table(){
    //$data['gender'] = $this->summary->get_genderTable());
  }
}

/* End of file chart.php */
/* Location: ./application/controllers/chart.php */