<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Table extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data');
	}  
	
	public function index()
	{
		
		$this->load->view("header");
		$this->load->view("side");
		$this->load->view("table/schoolTable");
		
	}
	public function data(){
		print $json = json_encode($this->data->get_stock());
	}
	public function data2()
	{
		print $json = json_encode($this->data->get_am());
	}
}
/* End of file chart.php */
/* Location: ./application/controllers/chart.php */