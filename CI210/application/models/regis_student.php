<?php
Class Regis_student extends CI_Model
{
 function login($nationalID,$school_code)
 {
   $this -> db -> select('*');
   $this -> db -> from('student ');
   $this -> db -> where('nationalID', $nationalID);
   $this -> db -> where('school_code', $school_code);
   $this->db->join('school', 'student.study_In = school.school_code');
   $this -> db -> limit(1);
   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

  function register()
 {
  $data=array(
    'nationalID'  =>$this->input->post('nationalID'),
    'FName'       =>$this->input->post('FName'),
    'LName'       =>$this->input->post('LName'),
    'school_year' =>$this->input->post('school_year'),
    'program'     =>$this->input->post('program'),
    'gender'      =>$this->input->post('gender'),   
    'gpa'         =>$this->input->post('gpa'),
    'study_In'    =>$this->input->post('school')
  );
  $this->db->insert('student  ',$data);
  $this->updateActivity();
 }
 function updateActivity()
 {
  $data=array(
    'nationalID'  =>$this->input->post('nationalID'),
    'ac_id'       =>$this->input->post('ac_id')
  );
  $this->db->insert('participant  ',$data);
  return ($this->db->affected_rows() != 1) ? false : true;
 }

function checkID($nationalID)
 {
   $this -> db -> select('*');
   $this -> db -> from('student');
   $this -> db -> where('nationalID', $nationalID);
   $this -> db -> limit(1);
   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

  function searchStudent($nationalID,$ac_id)
 {
   $this -> db -> select('*');
   $this -> db -> from('participant');
   $this -> db -> where('nationalID', $nationalID);
   $this -> db -> where('ac_id', $ac_id);
   $this -> db -> limit(1);
   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 
 function updateProfile()
 {
  $nationalID = $this->input->post('nationalID');
  $data=array(
    'FName'       =>$this->input->post('FName'),
    'LName'       =>$this->input->post('LName'),
    'school_year' =>$this->input->post('school_year'),
    'program'     =>$this->input->post('program'),
    'gender'      =>$this->input->post('gender'),   
    'gpa'         =>$this->input->post('gpa')
  );
  $this->db->where('nationalID', $nationalID);
  $this->db->update('student  ',$data);
  return ($this->db->affected_rows() != 1) ? false : true;
 }
}
?>