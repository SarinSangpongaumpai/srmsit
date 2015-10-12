<?php
Class Summary_Event extends CI_Model
{

  function getCostParticipant()
 {
   $this -> db -> select("start as date,count(participant.no_student) as participants,activity.title,activity.cost,budget,expectPeople ");
   $this -> db -> from('activity');
   $this -> db -> join('participant', 'participant.ac_title = activity.title', 'left');
   $this -> db -> group_by("activity.title"); 
   $this->db->order_by("date", "asc");
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
   function getCostEffective()
 {
   $this -> db -> select("start as date,(count(participant.no_student)/cost*budget/100) as actual,activity.title,(expectPeople/budget*cost/100) as expected");
   $this -> db -> from('activity');
   $this -> db -> join('participant', 'participant.ac_title = activity.title', 'left');
   $this -> db -> group_by("activity.title"); 
   $this->db->order_by("date", "asc");
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