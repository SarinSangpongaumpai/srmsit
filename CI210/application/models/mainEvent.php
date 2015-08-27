<?php
Class MainEvent extends CI_Model
{
 function getEvent()
 {
   $this -> db -> select("title,start,end,type,place,cost,DATEDIFF( start,NOW()) AS timeLeft,
    DATEDIFF( end,start ) AS duration");
   $this -> db -> from('activity');
   $this -> db -> where('NOW()< start');
   $this->db->order_by("timeLeft", "asc");
   $this -> db -> limit(5);
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
 function changeEvent()
 {
   $this -> db -> select("title,start,end,type,place,cost,school_name,DATEDIFF( start,NOW()) AS timeLeft,
    DATEDIFF( end,start ) AS duration");
   $this -> db -> from('activity');
   $this -> db -> where('NOW()< start');
   $this->db->join('school', 'activity.place = school.school_code');
   $this->db->order_by("timeLeft", "asc");
   $this -> db -> limit(1);
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
  function previous($date)
 {
   $this -> db -> select("title,start,end,type,place,cost,school_name,DATEDIFF( start,NOW()) AS timeLeft,
    DATEDIFF( end,start ) AS duration");
   $this -> db -> from('activity');
   $this -> db -> where("start < '".$date."'");
   $this->db->join('school', 'activity.place = school.school_code');
   $this->db->order_by("timeLeft", "desc");
   $this -> db -> limit(1);
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
  function next($date)
 {
   $this -> db -> select("title,start,end,type,place,cost,school_name,DATEDIFF( start,NOW()) AS timeLeft,
    DATEDIFF( end,start ) AS duration");
   $this -> db -> from('activity');
   $this -> db -> where("start > '".$date."'");
   $this->db->join('school', 'activity.place = school.school_code');
   $this->db->order_by("timeLeft", "asc");
   $this -> db -> limit(1);
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
 function getLastEvent()
 {
   $this -> db -> select("title,start,end,type,place,cost,school_name,DATEDIFF( start,NOW()) AS timeLeft,
    DATEDIFF( end,start ) AS duration");
   $this -> db -> from('activity');
   $this -> db -> where('NOW()> start');
   $this->db->join('school', 'activity.place = school.school_code');
   $this->db->order_by("timeLeft", "desc");
   $this -> db -> limit(1);
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