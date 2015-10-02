<?php
Class SummaryEvent extends CI_Model
{

  function getCostParticipant()
 {
   $this -> db -> select("start as date,count(participant.no_student) as participants,activity.title,activity.cost  ");
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