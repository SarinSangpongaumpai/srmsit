<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data extends CI_Model {

  	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_data()
    {
        $this->db->select('month, wordpress, codeigniter, highcharts');
		$this->db->from('project_requests');
		$query = $this->db->get();
       	return $query->result();
    }

    function get_am()
    {
        $this->db->select('school, student');
        $this->db->from('testamchart');
        $this->db->order_by("student", "desc");
        $query = $this->db->get();
        return $query->result();
    }
      function get_stock()
    {
        $this->db->select('date, student');
        $this->db->from('testamchart2');
        $this->db->where('event', "applicants"); 
        $query = $this->db->get();
        return $query->result();
    }
     function get_stock2()
    {
        $this->db->select('date, student');
        $this->db->from('testamchart2');
        $this->db->where('event', "participants"); 
        $query = $this->db->get();
        return $query->result();
    }

}