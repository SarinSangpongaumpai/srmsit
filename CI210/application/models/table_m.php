<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Table_M extends CI_Model {

  	public function fillstudentTable(){
        $this->db->order_by("nationalID", "asc"); 
        $data = $this->db->get('student');
        foreach ($data->result() as $row){
            $edit   = base_url().'table/editStudent/';
            $delete = base_url().'table/deleteStudent/';
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

    public function createStudent(){
        $data = array('FName'=>  $this->input->post('FName'),
                      'LName'=>  $this->input->post('LName'),
                   'program,'=>  $this->input->post('program'),
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
   private function editSchool(){}
   private function deleteSchool(){}
   public function fillSchoolTable(){
        $this->db->order_by("school_code", "asc"); 
        $data = $this->db->get('school');
        foreach ($data->result() as $row){
            $editSchool   = base_url().'table/editSchool/';
            $deleteSchool = base_url().'table/deleteSchool/';
            echo "<tr>
                        <td>$row->school_code</td>
                        <td>$row->name</td>
                        <td>$row->location</td>
                        <td>$row->note</td>
                        <td>$row->latitude</td>
                        <td>$row->longitude</td>
                        <td><a href='$editSchool' data-id='$row->school_code' class='btnedit' title='editSchool'><i class='glyphicon glyphicon-pencil' title='editSchool'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='$deleteSchool' data-id='$row->school_code' class='btndelete' title='deleteSchool'><i class='glyphicon glyphicon-remove'></i></a></td>    
                    </tr>";    
        }
        exit;
    }

    private function editEvent(){}
   private function deleteEvent(){}
   public function fillEventTable(){
        $this->db->order_by("id", "asc"); 
        $data = $this->db->get('activity');
        foreach ($data->result() as $row){
            $editEvent   = base_url().'table/editEvent/';
            $deleteEvent = base_url().'table/deleteEvent/';
            echo "<tr>
                        <td>$row->id</td>
                        <td>$row->title</td>
                        <td>$row->start</td>
                        <td>$row->end</td>
                        <td>$row->type</td>
                        <td>$row->Place</td>
                        <td>$row->budget</td>
                        <td>$row->cost</td>
                        <td>$row->expectPeople</td>
                        <td>$row->Detail</td>
                        <td><a href='$editEvent' data-id='$row->id' class='btnedit' title='editEvent'><i class='glyphicon glyphicon-pencil' title='editEvent'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='$deleteEvent' data-id='$row->id' class='btndelete' title='deleteEvent'><i class='glyphicon glyphicon-remove'></i></a></td>    
                    </tr>";    
        }
        exit;
    }
} 