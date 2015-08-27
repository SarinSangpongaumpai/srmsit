<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	public function index()
	{
	 	 $this->load->database();
  		$this->load->model('new_m');
         echo $this->new_m->test();
      }
}
?>

 