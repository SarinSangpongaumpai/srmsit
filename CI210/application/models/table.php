<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Table extends CI_Model {

  	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_calendar()
    {
        $this->db->select('id,title,start,end');
        $this->db->from('activity');
        $query = $this->db->get();
        return $query->result();
    }

}