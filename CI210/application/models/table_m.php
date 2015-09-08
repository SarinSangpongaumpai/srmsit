<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Table_M extends CI_Model {

  	public function fillstudentTable(){
        $this->db->order_by("nationalID", "desc"); 
        $data = $this->db->get('student');
        foreach ($data->result() as $row){
            $edit = base_url().'table/edit/';
            $delete = base_url().'table/delete/';
            echo "<tr>
                        <td>$row->nationalID</td>
                        <td>$row->FName</td>
                        <td>$row->LName</td>
                        <td>$row->school_year</td>
                        <td>$row->program</td>
                        <td>$row->gender</td>
                        <td>$row->gpa</td>
                        <td>$row->study_In</td>
                        <td><a href='$edit' data-id='$row->nationalID' class='btnedit' title='edit'><i class='glyphicon glyphicon-pencil' title='edit'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='$delete' data-id='$row->nationalID' class='btndelete' title='delete'><i class='glyphicon glyphicon-remove'></i></a></td>    
                    </tr>";
            
        }
        exit;
    }

    public function create(){
        $data = array('FName'=>  $this->input->post('FName'),
                'LName'=>$this->input->post('LName'),
                'program,'=>$this->input->post('program'),
                'school_year'=>$this->input->post('school_year'),
                'gender'=>$this->input->post('gender'),
                'gpa'=>$this->input->post('gpa'),
                'nationalID'=>('nationalID'));
            $this->db->insert('student', $data);
            echo'<div class="alert alert-success">One record inserted Successfully</div>';
            exit;
    }
   
   private function edit(){}
   
   private function delete(){}

}