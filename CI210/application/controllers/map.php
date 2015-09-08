
<?php 
class Map extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('map_model');
		$this->load->library('googlemaps');
	}  
	
	public function index()
	{	/*
		$config['center'] = '13.652383, 100.493872';
		$config['zoom'] = 'auto';
		$config['places'] = TRUE;
		$config['placesAutocompleteInputID'] = 'myPlaceTextBox';
		$config['placesAutocompleteBoundsMap'] = TRUE; // set results biased towards the maps viewport
		$config['placesAutocompleteOnChange'] = 'alert(\'You selected a place\');';
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = 'KMUTT';
		$marker['animation']='BOUNCE]]';
		$marker['flat'] = TRUE;
		$this->googlemaps->add_marker($marker);
		$data['map'] = $this->googlemaps->create_map();
		*/

		$this->load->view('header');
		$this->load->view('side');
		$this->load->view('map/map');
		$this->load->view('footer');
	}
}
?>
