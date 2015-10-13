<?php
Class Compare_School_Model extends CI_Model
{
 function schoolCostEvent($place,$start,$end)
 {
   $this -> db -> select("sum(activity.cost)as cost,COUNT(*) as totalEvent");
   $this -> db -> from('activity');
   $this -> db -> where('activity.place',$place);
   if(!is_null($start) && !is_null($end)){
    $this -> db -> where('activity.start >',$start);
    $this -> db -> where('activity.end <',$end);
   }
   $this->db->join('school', 'activity.Place = school.school_code', 'left');
   $this->db->group_by("activity.Place"); 
   $query = $this -> db -> get();
   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
  }
  function FacultyParticipant($place,$start,$end,$faculty)
 {
   $this -> db -> select("COUNT(Distinct(participant.nationalID)) as number,faculty");
   $this -> db -> from('participant ');
   $this -> db -> where('activity.place',$place);
   if(!is_null($start) && !is_null($end)){
    $this -> db -> where('activity.start >',$start);
    $this -> db -> where('activity.end <',$end);
   }
   if(!is_null($faculty)){
    $this -> db -> where('register.faculty ',$faculty);
   }
   $this->db->join('activity', 'participant.ac_title = activity.title', 'inner');
   $this->db->join('register', 'participant.nationalID = register.nationalID', 'inner');
   $this->db->group_by("register.faculty"); 
   if(!strcmp($place,"KMUTT")){
    //$this -> db -> where ('register.study_In');
   }  
   else{
    $this -> db -> where('register.study_In',$place);
   }
   $query = $this -> db -> get();
   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 function Gender($place,$start,$end,$gender)
 {
   $this -> db -> select("count(student.gender) As number,gender");
   $this -> db -> from('participant');
   $this -> db -> where('activity.place',$place);
   if(!is_null($start) && !is_null($end)){
    $this -> db -> where('activity.start >',$start);
    $this -> db -> where('activity.end <',$end);
   }
   if(!is_null($gender)){
    $this -> db -> where('student.gender ',$gender);
   }
   $this->db->join('activity', 'participant.ac_title = activity.title', 'left');
   $this->db->join('student', 'participant.nationalID = student.nationalID', 'left');
   $this->db->group_by("student.gender"); 
   $query = $this -> db -> get();
   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
  }
  function Program($place,$start,$end,$program)
 {
   $this -> db -> select("count(student.program) As number,program");
   $this -> db -> from('participant');
   $this -> db -> where('activity.place',$place);
   if(!is_null($start) && !is_null($end)){
    $this -> db -> where('activity.start >',$start);
    $this -> db -> where('activity.end <',$end);
   }
   if(!is_null($program)){
    $this -> db -> where('student.program ',$program);
   }
   $this->db->join('activity', 'participant.ac_title = activity.title', 'left');
   $this->db->join('student', 'participant.nationalID = student.nationalID', 'left');
   $this->db->group_by("student.program"); 
   $query = $this -> db -> get();
   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
  function schoolYear($place,$start,$end,$year)
 {
   $this -> db -> select("count(student.school_year) As number,school_year as schoolYear");
   $this -> db -> from('participant');
   $this -> db -> where('activity.place',$place);
   if(!is_null($start) && !is_null($end)){
    $this -> db -> where('activity.start >',$start);
    $this -> db -> where('activity.end <',$end);
   }
   if(!is_null($year)){
    $this -> db -> where('student.school_year ',$year);
   }
   $this->db->join('activity', 'participant.ac_title = activity.title', 'left');
   $this->db->join('student', 'participant.nationalID = student.nationalID', 'left');
   $this->db->group_by("student.school_year"); 
   $query = $this -> db -> get();
   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
  function total($place,$start,$end)
 {
   $this -> db -> select("count(student.gender) As number");
   $this -> db -> from('participant');
   $this -> db -> where('activity.place',$place);
   if(!is_null($start) && !is_null($end)){
    $this -> db -> where('activity.start >',$start);
    $this -> db -> where('activity.end <',$end);
   }
   $this->db->join('activity', 'participant.ac_title = activity.title', 'left');
   $this->db->join('student', 'participant.nationalID = student.nationalID', 'left');
   $query = $this -> db -> get();
   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 function register($place,$start,$end)
 {
   $this -> db -> select("COUNT(Distinct(register.nationalID)) as number");
   $this -> db -> from('register');
   if(!is_null($start) && !is_null($end)){
    $this -> db -> where('register.date >',$start);
    $this -> db -> where('register.date <',$end);
   }
    $this -> db -> where('school.school_code',$place);
   $this->db->join('school', 'register.study_In = school.name', 'left');
   $query = $this -> db -> get();
   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 function allSchool()
 {
   $this -> db -> select("school_code,name");
   $this -> db -> from('school');
   $this->db->order_by("name", "");
   $query = $this -> db -> get();
   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}
?>