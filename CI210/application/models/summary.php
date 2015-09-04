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
 function get_totalEvent()
 {
   $this -> db -> select("count(DISTINCT activity.type) As totalEvent");
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

 function get_GenderTable()
 {
   $this -> db -> select("count(student.gender) As number,gender");
   $this -> db -> from('participant');
   $this -> db -> where('activity.place','KMUTT');
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
  function get_TotalTable()
 {
   $this -> db -> select("count(student.gender) As total");
   $this -> db -> from('participant');
   $this -> db -> where('activity.place','KMUTT');
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
 function get_ProgramTable()
 {
   $this -> db -> select("count(student.program) As number,program");
   $this -> db -> from('participant');
   $this -> db -> where('activity.place','KMUTT');
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
}
?>