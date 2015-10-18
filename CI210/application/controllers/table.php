<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Table extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('table_m');
        $this->load->library('form_validation');
    }

    public function index()
    {   
  		$this->load->view('header');
        $this->load->view('table/studentTable');
    }
    public function student()
    {   
        $this->load->view('header');
        $this->load->view('table/studentTable');
    }
    // Fill table    
    public function fillstudentTable(){
        $this->table_m->fillstudentTable();
    }
    public function createStudent(){
        $this->form_validation->set_rules('nationalID', 'เลขประจำตัวประชาชน', 'trim|required|exact_length[13]|is_unique[student.nationalID]');
		$this->form_validation->set_rules('FName', 'ชื่อ', 'trim|required|min_length[1]|max_length[30]');
		$this->form_validation->set_rules('LName', 'นามสกุล', 'trim|required|min_length[1]|max_length[30]');
		$this->form_validation->set_rules('gpa', 'เกรด', 'trim|required|');
		$this->form_validation->set_message('min_length', 'ต้องมีความยาวอย่างน้อย 1 ตัวอักษร');
		$this->form_validation->set_message('max_length', 'ต้องมีความยาวไม่เกิน 30 ตัวอักษร');
		$this->form_validation->set_message('exact_length', 'กรุณาใส่เลขประจำตัวประชาชนให้ถูกต้อง');
		$this->form_validation->set_message('is_unique', 'เลขประจำตัวประชาชนนี้มีอยู่ในระบบแล้ว');  
        if ($this->form_validation->run() == FALSE){
            echo'<div class="alert alert-danger">'.validation_errors().'</div>';
            exit;
        }
        else{
            $data=array(
				'nationalID'  =>$this->input->post('nationalID'),
				'FName'       =>$this->input->post('FName'),
				'LName'       =>$this->input->post('LName'),
				'school_year' =>$this->input->post('school_year'),
                'program' =>$this->input->post('program'),
				'gender'      =>$this->input->post('gender'),   
				'gpa'         =>$this->input->post('gpa'),
				'study_In'         =>$this->input->post('place')
			);
			$this->db->insert('student  ',$data);
            echo'<div class="alert alert-success">'.$this->input->post('nationalID').' inserted Successfully</div>';
        }
    }    
    public function editStudent(){
        $id =  $this->uri->segment(3);
        $this->db->where('nationalID',$id);
        $data['query'] = $this->db->get('student');
        $data['nationalID'] = $id;
        $this->load->view('table/editStudent', $data);
    }        
    public function updateStudent(){
        $res['error']="";
        $res['success']="";
        $this->form_validation->set_rules('FName', 'ชื่อ', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('LName', 'นามสกุล', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('gpa', 'เกรด', 'trim|required|');
        if ($this->form_validation->run() == FALSE){
            $res['error']='<div class="alert alert-danger">'.validation_errors().'</div>';
        }           
        else{
            $data = array('FName'=>  $this->input->post('FName'),
                          'LName'=>  $this->input->post('LName'),
                    'school_year'=>  $this->input->post('school_year'),
                         'gender'=>  $this->input->post('gender'),
                       'program' =>  $this->input->post('program'),
                            'gpa'=>  $this->input->post('gpa'));
            $nationalID = $this->input->post('nationalID');
            $this->db->where('nationalID', $nationalID);
            $this->db->update('student', $data);
            $res['success']='<div class="alert alert-success">'.$nationalID.' updated Successfully</div>';   
        }
        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }
    public function deleteStudent(){
        $id =  $this->input->POST('id');
        $this->db->where('nationalID', $id);
        $this->db->delete('student');
        echo'<div class="alert alert-success">'.$id.' deleted Successfully</div>';
        exit;
    }

    // end of student file
    public function school()
    {   
        $this->load->view('header');
        $this->load->view('table/schoolTable');
    }
    // Fill table    
    public function fillSchoolTable(){
        $this->table_m->fillSchoolTable();
    }
   
    public function editSchool(){
        $school_code =  $this->uri->segment(3);
        $this->db->where('school_code',$school_code);
        $data['query'] = $this->db->get('school');
        $data['school_code'] = $school_code;
        $this->load->view('table/editSchool', $data);
    }        
    public function updateSchool(){
        $res['error']="";
        $res['success']="";
        $this->form_validation->set_rules('name', 'ชื่อ', 'trim|required|min_length[1]|max_length[100]');
        $this->form_validation->set_rules('location', 'สถานที่', 'trim|required|min_length[1]|max_length[200]');
        $this->form_validation->set_rules('note', 'ข้อเสนอแนะ', 'trim|required|');
        $this->form_validation->set_rules('latitude', 'ละติจูด', 'trim|required|');
        $this->form_validation->set_rules('longitude', 'ลองติจูด', 'trim|required|');
        $this->form_validation->set_message('min_length', 'ต้องมีความยาวอย่างน้อย 1 ตัวอักษร');
        $this->form_validation->set_message('max_length', 'ต้องมีความยาวไม่เกิน 30 ตัวอักษร');
        if ($this->form_validation->run() == FALSE){
            $res['error']='<div class="alert alert-danger">'.validation_errors().'</div>';
        }           
        else{
          $data = array('name'       =>$this->input->post('name'),
                'location'       =>$this->input->post('location'),
                'note' =>$this->input->post('note'),
                'latitude'      =>$this->input->post('latitude'),   
                'longitude'         =>$this->input->post('longitude'));
            $this->db->where('school_code', $this->input->post('school_code'));
            $this->db->update('school', $data);
            $res['success']='<div class="alert alert-success">One record inserted Successfully</div>';
        }
        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }
    public function deleteSchool(){
        $school_code =  $this->input->POST('school_code');
        $this->db->where('school_code', $school_code);
        $this->db->delete('school');
        echo'<div class="alert alert-success">One record deleted Successfully</div>';
        exit;
    }
    //end of school file

    public function event()
    {   
        $this->load->view('header');
        $this->load->view('table/eventTable');
    }
    // Fill table    
    public function fillEventTable(){
        $this->table_m->fillEventTable();
    }
    public function createEvent(){
        $this->form_validation->set_rules('nationalID', 'เลขประจำตัวประชาชน', 'trim|required|is_unique[activity.id]');
        $this->form_validation->set_message('min_length', 'ต้องมีความยาวอย่างน้อย 1 ตัวอักษร');
        $this->form_validation->set_message('max_length', 'ต้องมีความยาวไม่เกิน 30 ตัวอักษร');
        $this->form_validation->set_message('is_unique', 'กิจกรรมนี้มีอยู่ในระบบแล้ว');  
        if ($this->form_validation->run() == FALSE){
            echo'<div class="alert alert-danger">'.validation_errors().'</div>';
            exit;
        }
        else{
            $data=array(
                'id'  =>$this->input->post('id'),
                'title'       =>$this->input->post('title'),
                'start'       =>$this->input->post('start'),
                'end' =>$this->input->post('end'),
                'type' =>$this->input->post('type'),
                'Place'      =>$this->input->post('Place'),   
                'budget'         =>$this->input->post('budget'),
                'cost'         =>$this->input->post('cost'),
                'expectedPeople'         =>$this->input->post('expectedPeople'),
                'Detail'         =>$this->input->post('Detail')
            );
            $this->db->insert('activity  ',$data);
            echo'<div class="alert alert-success">'.$this->input->post('id').' inserted Successfully</div>';
        }
    }    
    public function editEvent(){
        $id =  $this->uri->segment(3);
        $this->db->where('id',$id);
        $data['query'] = $this->db->get('activity');
        $data['id'] = $id;
        $this->load->view('table/editEvent', $data);
    }        
    public function updateEvent(){
        $res['error']="";
        $res['success']="";
         if ($this->form_validation->run() == FALSE){
            $data = array('title' =>$this->input->post('title'),
                'start'       =>$this->input->post('start'),
                'end' =>$this->input->post('end'),
                'type' =>$this->input->post('type'),
                'Place'      =>$this->input->post('Place'),   
                'budget'         =>$this->input->post('budget'),
                'type'         =>$this->input->post('type'),
                'cost'         =>$this->input->post('cost'),
                'expectPeople'         =>$this->input->post('expectPeople'),
                'Detail'         =>$this->input->post('Detail'));
            $id= $this->input->post('id');
            $this->db->where('id', $id);
            $this->db->update('activity', $data);
            $res['success']='<div class="alert alert-success">'.$id.' updated Successfully</div>';
        }           
        else{
            $data = array('title' =>$this->input->post('title'),
                'start'       =>$this->input->post('start'),
                'end' =>$this->input->post('end'),
                'type' =>$this->input->post('type'),
                'Place'      =>$this->input->post('Place'),   
                'budget'         =>$this->input->post('budget'),
                'type'         =>$this->input->post('type'),
                'cost'         =>$this->input->post('cost'),
                'expectPeople'         =>$this->input->post('expectPeople'),
                'Detail'         =>$this->input->post('Detail'));
            $id= $this->input->post('id');
            $this->db->where('id', $id);
            $this->db->update('activity', $data);
            $res['success']='<div class="alert alert-success">'.$id.' updated Successfully</div>';   
        }
        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }
    public function deleteEvent(){
        $id =  $this->input->POST('id');
        $this->db->where('id', $id);
        $this->db->delete('activity');
        echo'<div class="alert alert-success">'.$id.' deleted Successfully</div>';
        exit;
    }
}