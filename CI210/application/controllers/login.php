<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }

 function index()
 {
   $this->load->helper(array('form'));
   $this->load->view('login/login_view');
 }
 function regis()
 {
   $this->load->helper(array('form'));
   $this->load->view('login/register_view');
 }
 function verifyRegis()
 {
  $this->load->library('form_validation');
  $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[6]|max_length[32]|is_unique[users.name]');
  $this->form_validation->set_rules('user_name', 'ID', 'trim|required|min_length[6]|max_length[32]|is_unique[users.username]');
  $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
  $this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');
  $this->form_validation->set_rules('email', 'Email',  'required|valid_email|is_unique[users.email]');
  $this->form_validation->set_message('min_length', 'Please use between 6 and 30 characters');
  $this->form_validation->set_message('max_length', 'Please use between 6 and 30 characters');
  if($this->form_validation->run() == FALSE)
  {
   $this->load->view('login/register_view');
  }
  else
  {
   $this->user->register();
   print "<script type=\"text/javascript\">alert('Successful Register');</script>";
   redirect('login', 'refresh');
  }
 } 


  function verifylogin()
 {
   $this->load->library('form_validation');
 
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
 
   if($this->form_validation->run() == FALSE)
   {
     print "<script type=\"text/javascript\">alert('Invalid Username or Password');</script>";
     redirect('login', 'refresh');
   }
   else
   {
     redirect('main/current', 'refresh');
   }
 
 }
 
 function check_database($password)
 {
   $username = $this->input->post('username');
   $result = $this->user->login($username, $password);
 
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->username,
         'name' => $row->name
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
 function sendMail(){
  $emailUser = $this->input->post('forgetEmail');
  $sql      = "SELECT * from users WHERE email = '". $emailUser . "' LIMIT 1";
  $result   = $this->db->query($sql);
  if($result){
    $row      = $result -> row();
    $id       = $row->id;
    $username = $row->username;
    $password = $row->password;

   	$this->load->library('email');

  	$this->email->from( 'noreply@hotmail.com');
  	$this->email->to($emailUser); 

  	$this->email->subject("Reset your SRM's SIT BI system password");
  	$this->email->message("We received a request to reset the password for your user ".$username."

    To reset your password, click on the link below 
    (or copy and paste the URL in your browser):

    http://srmatsit.esy.es/login/changePass?id=".($password)."
    
    Thank you
    
    =================================

    ※This email was sent automatically,please do not reply this mail back");
  	$this->email->send();
  	echo $this->email->print_debugger();
    print "<script type=\"text/javascript\">alert('Send maill Successfully, Please check your email');</script>";
    //redirect('login', 'refresh');
  }
  else{
    print "<script type=\"text/javascript\">alert('Some error occur, Please try again');</script>";
    redirect('login', 'refresh');
  }
 }
 function changePass()
 {
   if ( isset($_GET['id'])) {
       $password = $_GET['id'];
       $sql      = "SELECT * from users WHERE password = '". $password . "' LIMIT 1";
       $result   = $this->db->query($sql);
       if($result){
          $row      = $result -> row();
          $id       = $row->id;
          $username = $row->username;
         $data["username"] = $username;
         $data["id"] = $id;
         $this->load->view('login/changePass',$data);
       }
        else{
          print "<script type=\"text/javascript\">alert('Some error occur, please try again');</script>";
          redirect('login', 'refresh');
        }
    }
    else{
      print "<script type=\"text/javascript\">alert('Some error occur, please try again');</script>";
      redirect('login', 'refresh');
    }
  }
  function submitPassword(){
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $sql      = "UPDATE users SET password = '".md5($password)."' WHERE username = '".$username."'";
    $this->db->query($sql);
    $afftectedRows=$this->db->affected_rows();
    if($afftectedRows){
      print "<script type=\"text/javascript\">alert('Change password Successfully');</script>";
      redirect('login', 'refresh');
    }
    else{
      print "<script type=\"text/javascript\">alert('Some error occur, please try again');</script>";
      redirect('login', 'refresh');
    }
  }
}