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
}
?>