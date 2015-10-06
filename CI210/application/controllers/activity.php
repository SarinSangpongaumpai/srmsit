<?php 
class Activity extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('regis_student','',TRUE);
	}  
  public function login()
  {
    $this->load->helper(array('form'));
    $this->load->view("activity/login");
  }
  public function studentLogin()
  {
     $this->load->library('form_validation');
   
     $this->form_validation->set_rules('nationalID', 'เลขประจำตัวประชาชน', 'trim|required|exact_length[13]|xss_clean');
     $this->form_validation->set_message('exact_length', 'กรุณาใส่เลขประจำตัวประชาชนให้ถูกต้อง');
     if($this->form_validation->run() == FALSE)
     {
       print "<script type=\"text/javascript\">alert('เลขประจำตัวประชาชนยังไม่ได้ลงทะเบียน');</script>";
       $this->load->view('activity/login');
     }
     else
     {
        $nationalID = $this->input->post('nationalID');
        $school_code = $this->input->post('school_code');
        $result = $this->regis_student->checkID($nationalID);
        if(!$result)
        {
          print "<script type=\"text/javascript\">alert('เลขประจำตัวประชาชนยังไม่ได้ลงทะเบียน');</script>";
          $this->load->view('activity/login');
        }
        else
        {
          $result = $this->regis_student->login($nationalID,$school_code);
          if($result){
           $profile = array();
           foreach($result as $row)
           {
             $profile = array(
               'nationalID'  => $row->nationalID,
               'FName'       => $row->FName,
               'LName'       =>$row->LName,
               'school_year' =>$row->school_year,
               'program'     =>$row->program,
               'gender'      =>$row->gender,   
               'gpa'         =>$row->gpa,
               'school_name'    =>$row->school_name,
               'school_code'    =>$row->school_code
             );
             $this->session->set_userdata('logged_in', $profile);
             $this->load->view("activity/profile" , $profile);
            }
          }
        }
      }
    }
	public function regis()
	{
		$this->load->helper(array('form'));
		$this->load->view("activity/regis");
	}
  public function studentRegis()
   {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('nationalID', 'เลขประจำตัวประชาชน', 'trim|required|exact_length[13]|is_unique[student.nationalID]');
    $this->form_validation->set_rules('FName', 'ชื่อ', 'trim|required|min_length[1]|max_length[30]');
    $this->form_validation->set_rules('LName', 'นามสกุล', 'trim|required|min_length[1]|max_length[30]');
    $this->form_validation->set_rules('gpa', 'เกรด', 'trim|required|');
    $this->form_validation->set_message('min_length', 'ต้องมีความยาวอย่างน้อย 1 ตัวอักษร');
    $this->form_validation->set_message('max_length', 'ต้องมีความยาวไม่เกิน 30 ตัวอักษร');
    $this->form_validation->set_message('exact_length', 'กรุณาใส่เลขประจำตัวประชาชนให้ถูกต้อง');
    $this->form_validation->set_message('is_unique', 'เลขประจำตัวประชาชนนี้มีอยู่ในระบบแล้ว');
    if($this->form_validation->run() == FALSE)
    {
     $this->load->view('activity/regis');
    }
    else
    {
     $this->regis_student->register();
     print "<script type=\"text/javascript\">alert('ลงทะเบียนสำเร็จแล้ว');</script>";
     redirect('activity/login', 'refresh');
    }
   } 
  public function profile()
  {
    $this->load->helper(array('form'));
    $this->load->view("activity/profile");
  }
  public function studentUpdate()
  {
    $nationalID = $this->input->post('nationalID');
    $school_code = $this->input->post('school_code');
    $result = $this->regis_student->login($nationalID,$school_code);
    if($result)
    {
         $profile = array();
         foreach($result as $row)
         {
           $profile = array(
             'nationalID'  => $row->nationalID,
             'FName'       => $row->FName,
             'LName'       =>$row->LName,
             'school_year' =>$row->school_year,
             'program'     =>$row->program,
             'gender'      =>$row->gender,   
             'gpa'         =>$row->gpa,
             'school_name'    =>$row->school_name
           );
           $this->session->set_userdata('logged_in', $profile);
           $this->load->view("activity/updateProfile" , $profile);
        }
    }
  }
  public function activityRegis()
 {  
      $nationalID = $this->input->post('nationalID');
      $ac_id = $this->input->post('ac_id');
      $result = $this->regis_student->searchStudent($nationalID,$ac_id);
      if($result)
      {
       print "<script type=\"text/javascript\">alert('รหัสนี้ได้ทำการเข้าร่วมแล้ว');</script>";
      }
      else
      {
       $result = $this->regis_student->updateActivity();
       if($result)
       {
         print "<script type=\"text/javascript\">alert('ลงทะเบียนสำเร็จแล้ว');</script>";
       }
       else
       {
        print "<script type=\"text/javascript\">alert('ลงทะเบียนล้มเหลวกรุณาลองใหม่อีกครั้ง');</script>";
       }
     }
       $this->login();
  }
  public function updateProfile()
 {
     $result = $this->regis_student->updateProfile();
     if($result)
     {
        print "<script type=\"text/javascript\">alert('แก้ไขข้อมูลสำเร็จแล้ว');</script>";
      }
      else
      {
        print "<script type=\"text/javascript\">alert('เกิดข้อผิดพลาดในการแก้ไขข้อมูล');</script>";
      }
     $this->login();
  }
}

