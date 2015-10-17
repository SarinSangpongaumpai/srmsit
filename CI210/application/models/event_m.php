<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_m extends CI_Model {

  	function __construct()
    {
        parent::__construct();
    }

    function getEvent($start,$end,$duration,$mincost,$maxcost)
     {
       $this -> db -> select("title,start,end,type,place,cost,DATEDIFF( end,start ) AS duration,start as date,
        (count(participant.no_student)/cost*budget/100) as actual, count(participant.no_student) as number,
        (expectPeople/budget*cost/100) as expected");
       $this -> db -> from('activity');
       $this -> db -> where('NOW()> start');
       if(!is_null($start) && !is_null($end)){
            $this -> db -> where('activity.start >=',$start);
            $this -> db -> where('activity.end <=',$end);
       }
       if(!is_null($mincost)){
        $this -> db -> where('cost >=',$mincost);
       }
       if(!is_null($duration)){
        $this -> db -> where('DATEDIFF( end,start ) <=',$duration);
       }
       if(!is_null($maxcost)){
        $this -> db -> where('cost <=',$maxcost);
       }
       $this -> db -> join('participant', 'participant.ac_title = activity.title', 'left');
       $this -> db -> group_by("activity.title"); 
       $this->db->order_by("actual", "desc");

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
     function getEventGraph($start,$end,$duration,$mincost,$maxcost)
     {
       $this -> db -> select("title,start as date,(count(participant.no_student)/cost*budget/100) as actual,
        (expectPeople/budget*cost/100) as expected");
       $this -> db -> from('activity');
       $this -> db -> where('NOW()> start');
       if(!is_null($start) && !is_null($end)){
            $this -> db -> where('activity.start >=',$start);
            $this -> db -> where('activity.end <=',$end);
       }
       if(!is_null($mincost)){
        $this -> db -> where('cost >=',$mincost);
       }
       if(!is_null($maxcost)){
        $this -> db -> where('cost <=',$maxcost);
       }
       if(!is_null($duration)){
        $this -> db -> where('DATEDIFF( end,start ) <=',$duration);
       }
       $this -> db -> join('participant', 'participant.ac_title = activity.title', 'left');
       $this -> db -> group_by("activity.title"); 
       $this->db->order_by("date", "asc");

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
}