<?php 
class CompareSchool extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('compareSchool_Model','',TRUE);
    $this->load->library('upload');

	}  
	
	public function school(){
      if ( isset($_GET['school1']) && isset($_GET['school2']) ) {
       $school1 = $_GET['school1'];
       $school2 = $_GET['school2'];
   		 $this->load->view("header");
       $data['CostEvent1'] = $this->compareSchool_Model->get_schoolCostEvent($school1);
       $data['CostEvent2'] = $this->compareSchool_Model->get_schoolCostEvent($school2);
       $this->load->view("compare/school",$data);
			 $this->load->view("footer");
      }
      else{
        $this->load->view("footer");
      }
      
	}

  
	public function schoolpieChart()
	{
    $place = $_GET['Place'];
		//print $json = json_encode($this->compare->get_schoolpieChart($place));
	}

}

/* End of file chart.php */
/* Location: ./application/controllers/chart.php */