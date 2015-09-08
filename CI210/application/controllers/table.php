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
  		$this->load->view('side');
        $this->load->view('table/studentTable');
    }
    public function student()
    {   
        $this->load->view('header');
        $this->load->view('side');
        $this->load->view('table/studentTable');
        //$this->load->view('footer');
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
            $this->db->where('nationalID', $this->input->post('nationalID'));
            $this->db->update('student', $data);
            $res['success']='<div class="alert alert-success">One record inserted Successfully</div>';   
        }
        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }
    public function deleteStudent(){
        $id =  $this->input->POST('id');
        $this->db->where('nationalID', $id);
        $this->db->delete('student');
        echo'<div class="alert alert-success">One record deleted Successfully</div>';
        exit;
    }
}