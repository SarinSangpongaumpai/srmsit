<?php
Class CompareSchool_Model extends CI_Model
{
 function get_schoolCostEvent($place)
 {
   $this -> db -> select("sum(activity.cost)as cost,COUNT(*) as totalEvent");
   $this -> db -> from('activity');
   $this -> db -> where('activity.place',$place);
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
}
?>