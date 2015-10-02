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
		$this->load->view('header');
		$this -> db -> select("school.name,school.location,school.note,school.latitude,school.longitude");
	    $this -> db -> from('school');
	    $this -> db -> where_not_in("school.name","King Mongkut's University of Technology Thonburi");
	    $query = $this -> db -> get();
	    if($query -> num_rows() >= 1)
	    {
	     $data['DBSchool'] = $query->result();
	    }
	    else
	    {
	     $data['DBSchool'] = false;
	    }
		$this->load->view('map/map',$data);
		$this->load->view('footer');
	}
	public function addSchool(){
		$data = array('name'=>  $this->input->post('name'),
                'location'=>$this->input->post('location'),
                'school_code'=>$this->input->post('code'),
                'latitude'=>$this->input->post('latitude'),
                'longitude' =>$this->input->post('longtitude'));
                $this->db->insert('school', $data); 
        $school_code = $this->input->post('code');
        $this->load->helper('file');
		$file = 'img/schoolLogo/no_img.png';
		$newfile = 'img/schoolLogo/'.$school_code.'.png';
		  if (!copy($file, $newfile)) {
		    echo "failed to copy $file...\n";
		  }
        print "<script type=\"text/javascript\">alert('เพิ่มโรงเรียนสำเร็จแล้ว');</script>";
   		redirect('map/index', 'refresh');
	}
	public function searchRange(){
		$this -> db -> select("school.name,school.location,school.note,school.latitude,school.longitude");
	    $this -> db -> from('school');
	    $this -> db -> where_not_in("school.name","King Mongkut's University of Technology Thonburi");
	    $query = $this -> db -> get();
	    if($query -> num_rows() >= 1)
	    {
	     $data['DBSchool'] = $query->result();
	    }
	    else
	    {
	     $data['DBSchool'] = false;
	    }
		$data['range'] = $this->input->post('range');
   		$this->load->view('header');
		$this->load->view('map/map',$data);
		$this->load->view('footer');
	}
}
?>
