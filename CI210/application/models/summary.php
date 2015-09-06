<?php
Class Summary extends CI_Model
{
 
    
 function get_pieChart()
 {
   $this -> db -> select("activity.type , count(participant.no_student) As student");
   $this -> db -> from('activity ');
   $this -> db -> where('activity.place','KMUTT');
   $this->db->join('participant', 'participant.ac_id = activity.id', 'left');
   $this->db->group_by("activity.type"); 
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
 function get_distinctEvent()
 {
   $this -> db -> select("count(DISTINCT activity.type) As distinctEvent");
   $this -> db -> from('activity');
   $this -> db -> where('activity.place','KMUTT');
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
  function get_columnChart()
 {
   $this -> db -> select("activity.type , count(participant.no_student) As student");
   $this -> db -> from('activity ');
   $this -> db -> where('activity.place','KMUTT');
   $this->db->join('participant', 'participant.ac_id = activity.id', 'left');
   $this->db->group_by("activity.type"); 
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

 function get_GenderTable($type)
 {
   $this -> db -> select("count(student.gender) As number,gender");
   $this -> db -> from('participant');
   $this -> db -> where('activity.place','KMUTT');
   if(!is_null($type)){
    $this -> db -> where('activity.type',$type);
   }
   $this->db->join('activity', 'participant.ac_id = activity.id', 'left');
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
  function get_TotalTable($type)
 {
   $this -> db -> select("count(student.gender) As total");
   $this -> db -> from('participant');
   $this -> db -> where('activity.place','KMUTT');
   if(!is_null($type)){
    $this -> db -> where('activity.type',$type);
   }
   $this->db->join('activity', 'participant.ac_id = activity.id', 'left');
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
 function get_ProgramTable($type)
 {
   $this -> db -> select("count(student.program) As number,program");
   $this -> db -> from('participant');
   $this -> db -> where('activity.place','KMUTT');
   if(!is_null($type)){
    $this -> db -> where('activity.type',$type);
   }
   $this->db->join('activity', 'participant.ac_id = activity.id', 'left');
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
 function get_schoolYearTable($type)
 {
   $this -> db -> select("count(student.school_year) As number,school_year as schoolYear");
   $this -> db -> from('participant');
   $this -> db -> where('activity.place','KMUTT');
   if(!is_null($type)){
    $this -> db -> where('activity.type',$type);
   }
   $this->db->join('activity', 'participant.ac_id = activity.id', 'left');
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

function get_schoolProfile()
 {
   $this -> db -> select("school.name,school.location,school.note,school.latitude,school.longitude,
    sum(activity.cost)as cost,COUNT(*) as totalEvent");
   $this -> db -> from('activity');
   $this -> db -> where('activity.place','KMUTT');
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
  function get_contactPerson()
 {
   $this -> db -> select("*");
   $this -> db -> from('contact');
   $this -> db -> where('school','KMUTT');
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
   function get_Event()
 {
   $this -> db -> select("distinct(type)");
   $this -> db -> from('activity');
   $this -> db -> where('place','KMUTT');
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