<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Map_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function getDropdown()
    {
    $this->db->select('Place_name');
    $this->db->from('place');
    $query = $this->db->get();
    if($query)
    {
      $query = $query->result_array();
      return $query;
    }
  }
    function getLatLon($place)
    {
      $this->db->select('Latitude,Longitude');
      $this->db->from('place');
      $this->db->where('Place_name', $place); 
      $query = $this->db->get();
      if($query)
      {
        $query = $query->result_array();
        return $query;
      }
    }
}