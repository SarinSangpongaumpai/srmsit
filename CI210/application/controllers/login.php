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
   //This method will have the credentials validation
   $this->load->library('form_validation');
 
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
 
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     print "<script type=\"text/javascript\">alert('Invalid Username or Password');</script>";
     redirect('login', 'refresh');
   }
   else
   {
     //Go to private area
     redirect('chart/index', 'refresh');
   }
 
 }
 
 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
 
   //query the database
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
  function forgetPassword()
 {
   $this->load->helper(array('form'));
   $this->load->view('login/forgetPassword_view');
 }
 function sendMail(){
 	$this->load->library('email');

	$this->email->from('sarin.s19@gmail.com', 'Sarin');
	$this->email->to('test@gmail.com'); 

	$this->email->subject('Email Test');
	$this->email->message('Testing the email class.');	

	$this->email->send();
	echo $this->email->print_debugger();
 }
}

?>