<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar_m extends CI_Model {

  	function __construct()
    {
        parent::__construct();
    }

    function get_calendar()
    {
        $this->db->select('id,title,start,end');
        $this->db->from('activity');
        $query = $this->db->get();
        return $query->result();
    }
    function addEvent($title,$start,$end,$type)
    {
        $data = array(
        'title' => $title,
        'start' =>  $start,
        'end' =>  $end,
        'type' => $type
        );
        $this->db->insert('activity', $data);
        return $query->result();
    }
    function removeEvent($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('activity'); 
        return $query->result();
    }
}