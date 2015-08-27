<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php 
class Map extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('map_model');
		$this->load->library('googlemaps');
	}  
	
	public function index()
	{
		/*
		 if($this->session->userdata('logged_in'))
   		{
    		 $session_data = $this->session->userdata('logged_in');
    		 $data['name'] = $session_data['name'];
    		 $this->load->view("header",$data);

   		*/	$this->load->library('googlemaps');


			//$address = $this->input->post('myPlaceTextBox');
			//echo $address;
			//$config['center'] = $address;
			//$marker['position'] = $address;
			//$this->googlemaps->add_marker($marker);
			//$this->googlemaps->initialize($config);
			

			//$this->load->view('map/map', $data);
  		/* }
 	 	else
   		{
   		  //If no session, redirect to login page
     	redirect('login', 'refresh');
 		}*/


	 		$query = $this->map_model->getDropdown();
			if($query)
			{
			    $data['myDropdown'] = $query;
			}


			$place = $this->input->post('place');
			if(!is_null($place)){
				$address = $this->map_model->getLatLon($place);
				  foreach ($address as $row)
					{
						$lat =  $row['Latitude'];
						$lon = $row['Longitude'];
					   echo "".$lat.",".$lon."";
					}
					$config['center'] = $lat.",".$lon;
					$marker['position'] = $lat.",".$lon;
					$this->googlemaps->initialize($config);
					$this->googlemaps->add_marker($marker);
			}
			else{
				$config['center'] = '13.651528200000074,100.49397189999723';
				$marker['position'] = '13.651528200000074,100.49397189999723';
				$config['zoom'] = 'auto';
				$config['places'] = TRUE;
				$config['placesAutocompleteInputID'] = 'myPlaceTextBox';
				$config['placesAutocompleteBoundsMap'] = TRUE; // set results biased towards the maps viewport
				$this->googlemaps->initialize($config);
				$this->googlemaps->add_marker($marker);
			}
			$data['maps'] = $this->googlemaps->create_map();
			

			$this->load->view('map/map', $data);
	}

	
 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }

}
?>
	</head>