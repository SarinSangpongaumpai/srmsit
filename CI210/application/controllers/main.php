<?php 
class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mainEvent','',TRUE);
	}  
  public function logout()
  {
    $this->session->unset_userdata('logged_in');
    session_destroy();
    redirect('login', 'refresh');
  }
   public function current()
  {
    if($this->session->userdata('logged_in'))
    {
      $session_data = $this->session->userdata('logged_in');
      $data['name'] = $session_data['name'];
      $this->load->view("header",$data);
      $data = $this->event();

      $this->load->view("main",$data);
      $this->load->view("footer");
    }
      else
    {
      redirect('login', 'refresh');
    }
  }
  public function event(){
    $result = $this->mainEvent->getEvent();
    if($result){
      $data['Event'] =  $result;
      $data = $this->changeEvent($data);
      $result = $this->mainEvent->lastDate();  
      if($result){
         $data['max'] =  $result;
      }
      $result = $this->mainEvent->firstDate();
      if($result){
         $data['min'] =  $result;
      }


      $result = $this->mainEvent->getCalendar();
      if($result){
        $data['Calendar'] = $result;
      }
      return $data;
    }
    else{
      $result = $this->mainEvent->getLastEvent();
      $data['Current'] =  $result;
       $result = $this->mainEvent->lastDate();  
      if($result){
         $data['max'] =  $result;
      }
      $result = $this->mainEvent->firstDate();
      if($result){
         $data['min'] =  $result;
      }
      
      $result = $this->mainEvent->getCalendar();
      if($result){
        $data['Calendar'] = $result;
      }
      return $data;
    }
  }


  public function changeEvent($data){
    $data   = $data;
    $result = $this->mainEvent->changeEvent();
      if($result){
         $data['Current'] =  $result;
         return $data;
      }
      else{
        $result = $this->mainEvent->getLastEvent();
        $data['Current'] =  $result;
        return $data;
      }
  }


   public function previous(){
    if ( isset($_GET['date']) ) {
      $date = $_GET['date'];

      $this->load->view("header");
      $data = $this->event();
      $result = $this->mainEvent->previous($date);
      if($result){
         $data['Current'] =  $result;
      }

      $result = $this->mainEvent->getCalendar();
      if($result){
         $data['Calendar'] =  $result;
      }
      $result = $this->mainEvent->lastDate();
      if($result){
         $data['max'] =  $result;
      }
      $result = $this->mainEvent->firstDate();
      if($result){
         $data['min'] =  $result;
      }
      $this->load->view("main",$data);
      $this->load->view("footer");
    } 
    else {  
      $this->current;
    }
  }
   public function next(){
    if ( isset($_GET['date']) ) {
      $date = $_GET['date'];

      $this->load->view("header");
      $data = $this->event();
      $result = $this->mainEvent->next($date);
      if($result){
         $data['Current'] =  $result;
      }
      $result = $this->mainEvent->getCalendar();
      if($result){
         $data['Calendar'] =  $result;
      }
      $result = $this->mainEvent->lastDate();
      if($result){
         $data['max'] =  $result;
      }
      $result = $this->mainEvent->firstDate();
      if($result){
         $data['min'] =  $result;
      }
      $this->load->view("main",$data);
      $this->load->view("footer");
    } 
    else {  
      $this->current;
    }
  }

}

