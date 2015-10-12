<?php 
class CompareSchool extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('compareSchool_Model','csm',TRUE);
    $this->load->library('upload');

	}  
	
	public function school(){
      if ( isset($_GET['school1']) && isset($_GET['school2']) and isset($_GET['start']) and isset($_GET['end']) ) {
       $school1 = $_GET['school1'];
       $school2 = $_GET['school2'];
       $start = $_GET['start'];
       $end = $_GET['end'];
   	   $this->load->view("header");
       $data['CostEvent1'] = $this->csm->schoolCostEvent($school1,$start,$end);
       $data['CostEvent2'] = $this->csm->schoolCostEvent($school2,$start,$end);
       $data['CS1'] = $this->csm->FacultyParticipant($school1,$start,$end,"CS");
       $data['CS2'] = $this->csm->FacultyParticipant($school2,$start,$end,"CS");
       print $json = json_encode($this->csm->schoolYear($school1,$start,$end,"มัธยมศึกษาปีที่6"));
       $data['IT1'] = $this->csm->FacultyParticipant($school1,$start,$end,"IT");
       $data['IT2'] = $this->csm->FacultyParticipant($school2,$start,$end,"IT");
       $data['Male1'] = $this->csm->Gender($school1,$start,$end,"ชาย");
       $data['Male2'] = $this->csm->Gender($school2,$start,$end,"ชาย");
       $data['Female1'] = $this->csm->Gender($school1,$start,$end,"หญิง");
       $data['Female2'] = $this->csm->Gender($school2,$start,$end,"หญิง");
       $data['MathSci1'] = $this->csm->Program($school1,$start,$end,"วิทย์-คณิต");
       $data['MathSci2'] = $this->csm->Program($school2,$start,$end,"วิทย์-คณิต");
       $data['EngMath1'] = $this->csm->Program($school1,$start,$end,"ศิลป์-คำนวน");
       $data['EngMath2'] = $this->csm->Program($school2,$start,$end,"ศิลป์-คำนวน");
       $data['ArtMath1'] = $this->csm->Program($school1,$start,$end,"ศิลป์-ภาษา");
       $data['ArtMath2'] = $this->csm->Program($school2,$start,$end,"ศิลป์-ภาษา");
       $data['ETC1'] = $this->csm->Program($school1,$start,$end,"อื่นๆ");
       $data['ETC2'] = $this->csm->Program($school2,$start,$end,"อื่นๆ");
       $data['M41'] = $this->csm->schoolYear($school1,$start,$end,"มัธยมศึกษาปีที่4");
       $data['M42'] = $this->csm->schoolYear($school2,$start,$end,"มัธยมศึกษาปีที่4");
       $data['M51'] = $this->csm->schoolYear($school1,$start,$end,"มัธยมศึกษาปีที่5");
       $data['M52'] = $this->csm->schoolYear($school2,$start,$end,"มัธยมศึกษาปีที่5");
       $data['M61'] = $this->csm->schoolYear($school1,$start,$end,"มัธยมศึกษาปีที่6");
       $data['M62'] = $this->csm->schoolYear($school2,$start,$end,"มัธยมศึกษาปีที่6");
       $data['participant1'] = $this->csm->total($school1,$start,$end);
       $data['participant2'] = $this->csm->total($school2,$start,$end);
       $data['register1'] = $this->csm->register($school1,$start,$end);
       $data['register2'] = $this->csm->register($school2,$start,$end);
       $this->load->view("compare/school",$data);
			 $this->load->view("footer");
      }
      else{
        $school1 = $_GET['school1'];
       $school2 = $_GET['school2'];
   	   $this->load->view("header");
       $data['CostEvent1'] = $this->csm->schoolCostEvent($school1);
       $data['CostEvent2'] = $this->csm->schoolCostEvent($school2);
       $this->load->view("compare/school",$data);
			 $this->load->view("footer");
      }
      
	}

  
	public function schoolpieChart()
	{
    $place = $_GET['Place'];
		//print $json = json_encode($this->compare->schoolpieChart($place));
	}

}

/* End of file chart.php */
/* Location: ./application/controllers/chart.php */