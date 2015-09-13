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

       $data['totalRegister'] = $this->summary->get_totalRegisterTable($place);
       $data['Faculty'] = $this->summary->get_FacultyTable($place);

       $data['totalRegisterP'] = $this->summary->get_totalRegisterPTable($place);
       $data['FacultyParticipant'] = $this->summary->get_FacultyParticipantTable($place);

       $data['timeLine'] = $this->summary->get_TimeLine($place);
       $this->load->view("summary/school",$data);
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

         $data['totalRegister'] = $this->summary->get_totalRegisterTable($place);
         $data['Faculty'] = $this->summary->get_FacultyTable($place);


         $data['totalRegisterP'] = $this->summary->get_totalRegisterPTable($place);
         $data['FacultyParticipant'] = $this->summary->get_FacultyParticipantTable($place);

         $data['timeLine'] = $this->summary->get_TimeLine($place);
         $this->load->view("summary/school",$data);
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
    print $json = json_encode($this->summary->get_schoolsuccessChart($place));
  }
  public function schooltotalRegisterChart(){
    $place = $_GET['Place'];
    print $json = json_encode($this->summary->get_schoolTotalRegisterChart($place));
  }


  function editSchoolData()
 {
  $place = $_GET['Place'];
  $this->load->library('form_validation');
  //$this->form_validation->set_rules('name', 'Name', 'trim|required|is_unique[school.name]');
  //$this->form_validation->set_rules('code', 'Code', 'trim|required|min_length[1]|max_length[13]|is_unique[school.code]');
  if($this->form_validation->run() == FALSE)
  {
    $this->summary->editSchoolData();
    print "<script type=\"text/javascript\">alert('Update Successful');</script>";
    redirect('summaryReport/school?Place='.$place, 'refresh');
  }
  else
  {
   $this->summary->editSchoolData();
   print "<script type=\"text/javascript\">alert('Successful Register');</script>";
   redirect('summaryReport/school?Place='.$place, 'refresh');
  }
 } 
  function sendSchoolMail(){
  $place = $_GET['Place'];
  $To = $this->input->post('To');
  $Subject = $this->input->post('Subject');
  $Message = $this->input->post('Message');
  $this->load->library('email');

  $this->email->from('noreply@hotmail.com', 'System');
  $this->email->to($To); 

  $this->email->subject($Subject);
  $this->email->message($Message);  
  $this->email->send();
  //echo $this->email->print_debugger();
  print "<script type=\"text/javascript\">alert('Send maill Successfully');</script>";
  redirect('summaryReport/school?Place='.$place, 'refresh');
 }
}

/* End of file chart.php */
/* Location: ./application/controllers/chart.php */