<?php 
class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mainEvent','',TRUE);
	}  
   public function index()
  {
    $this->load->view("header");
    $this->load->view("side");
    $data = $this->event();
    $this->load->view("main",$data);
    //$this->load->view("main");
    $this->load->view("footer");
  }
  public function event(){
    $result = $this->mainEvent->getEvent();
      if($result){
         $data['Event'] =  $result;
         $data = $this->changeEvent($data);
         return $data;
      }
      else{
        $result = $this->mainEvent->getLastEvent();
        $data['Event'] =  $result;
        $data['Current'] =  $result;
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
      $this->load->view("side");
      $data = $this->event();
      $result = $this->mainEvent->previous($date);
      if($result){
         $data['Current'] =  $result;
      }
      $this->load->view("main",$data);
      $this->load->view("footer");
    } 
    else {  
      $this->index;
    }
  }
   public function next(){
    if ( isset($_GET['date']) ) {
      $date = $_GET['date'];

      $this->load->view("header");
      $this->load->view("side");
      $data = $this->event();
      $result = $this->mainEvent->next($date);
      if($result){
         $data['Current'] =  $result;
      }
      $this->load->view("main",$data);
      $this->load->view("footer");
    } 
    else {  
      $this->index;
    }
  }
}

