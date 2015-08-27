<?php 
class Chart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data');
	}  
	
	public function index()
	{
		/*
		 if($this->session->userdata('logged_in'))
   		{
    		 $session_data = $this->session->userdata('logged_in');
    		 $data['name'] = $session_data['name'];
    		 $this->load->view("header",$data);
   		*/	 $this->load->view("header");

			 $this->load->view("side");
			 $this->load->view("summary/content");
			 $this->load->view("summary/amchart");
			 $this->load->view("summary/stockchart");
			 $this->load->view("footer");
  		/* }
 	 	else
   		{
   		  //If no session, redirect to login page
     	redirect('login', 'refresh');
 		}*/
	}
	
 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }
	public function data(){
		print $json = json_encode($this->data->get_stock());
	}
	public function data3(){
		print $json = json_encode($this->data->get_stock2());
	}
	public function data2()
	{
		print $json = json_encode($this->data->get_am());
		/*	
		$data = $this->data->get_am();
		
		$category = array();
		$category['name'] = 'school';
		
		$series
		foreach ($data as $row)
		{	
		    $category['data'][] = $row->school;
			$series1['data'][] = $row->st1 = array();
		$series1['name'] = 'student';
		udent;
		}
		$color = array();
		$color['name'] = 'color';
		$color['data'] = array("#FF0F00","#FF9E01", "#F8FF01","#04D215","#0D8ECF","#2A0CD0","#CD0D74","#DDDDDD");

		$result = array();
		array_push($result,$category);
		array_push($result,$series1);
		array_push($result,$color);
		
		print json_encode($result, JSON_NUMERIC_CHECK);
		*/
	}
	/*
	public function data()
	{
		
		$data = $this->data->get_data();
		
		$category = array();
		$category['name'] = 'Category';
		
		$series1 = array();
		$series1['name'] = 'WordPress';
		
		$series2 = array();
		$series2['name'] = 'Code Igniter';
		
		$series3 = array();
		$series3['name'] = 'Highcharts';
		
		foreach ($data as $row)
		{
		    $category['data'][] = $row->month;
			$series1['data'][] = $row->wordpress;
			$series2['data'][] = $row->codeigniter;
			$series3['data'][] = $row->highcharts;
		}
		
		$result = array();
		array_push($result,$category);
		array_push($result,$series1);
		array_push($result,$series2);
		array_push($result,$series3);
		
		print json_encode($result, JSON_NUMERIC_CHECK);
	}
	*/	
}

/* End of file chart.php */
/* Location: ./application/controllers/chart.php */