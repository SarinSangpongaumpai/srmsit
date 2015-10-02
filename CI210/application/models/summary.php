<?php
Class Summary extends CI_Model
{
  function get_schoolTotalRegisterChart($place)
 {
   $this -> db -> select("COUNT(Distinct(register.nationalID)) as student , register.type");
   $this -> db -> from('register');
   if(!strcmp($place,"KMUTT")){
    //$this -> db -> where ('register.study_In');
   }
   else{
    $this -> db -> where('register.study_In',$place);
   }
   $this->db->group_by("register.type"); 
   $query = $this -> db -> get();
   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }  
  function get_schoolSuccessChart($place)
 {
   $this -> db -> select("COUNT(Distinct(participant.nationalID)) as student , register.type");
   $this -> db -> from('participant ');
   if(!strcmp($place,"KMUTT")){
    //$this -> db -> where ('register.study_In');
   }
   else{
    $this -> db -> where('register.study_In',$place);
   }
   $this->db->join('activity', 'participant.ac_title = activity.title', 'inner');
   $this->db->join('register', 'participant.nationalID = register.nationalID', 'inner');
   $this->db->group_by("register.type"); 
   $query = $this -> db -> get();
   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }  
function get_FacultyTable($place)
 {
   $this -> db -> select("COUNT(Distinct(register.nationalID)) as number , register.faculty");
   $this -> db -> from('register');
   if(!strcmp($place,"KMUTT")){
    //$this -> db -> where ('register.study_In');
   }
   else{
    $this -> db -> where('register.study_In',$place);
   }
   $this->db->group_by("register.faculty"); 
   $query = $this -> db -> get();
   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 function get_FacultyParticipantTable($place)
 {
   $this -> db -> select("COUNT(Distinct(participant.nationalID)) as number,faculty");
   $this -> db -> from('participant ');
   $this -> db -> where('activity.place',$place);
   $this->db->join('activity', 'participant.ac_title = activity.title', 'inner');
   $this->db->join('register', 'participant.nationalID = register.nationalID', 'inner');
   $this->db->group_by("register.faculty"); 
   if(!strcmp($place,"KMUTT")){
    //$this -> db -> where ('register.study_In');
   }
   else{
    $this -> db -> where('register.study_In',$place);
   }
   $query = $this -> db -> get();
   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 function get_totalRegisterPTable($place)
 {
   $this -> db -> select("COUNT(Distinct(participant.nationalID)) as total");
   $this -> db -> from('participant ');
   $this -> db -> where('activity.place',$place);
   $this->db->join('activity', 'participant.ac_title = activity.title', 'inner');
   $this->db->join('register', 'participant.nationalID = register.nationalID', 'inner');
   if(!strcmp($place,"KMUTT")){
    //$this -> db -> where ('register.study_In');
   }
   else{
    $this -> db -> where('register.study_In',$place);
   }
   $query = $this -> db -> get();
   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
function get_totalRegisterTable($place)
 {
   $this -> db -> select("COUNT(Distinct(register.nationalID)) as total");
   $this -> db -> from('register');
   if(!strcmp($place,"KMUTT")){
    //$this -> db -> where ('register.study_In');
   }
   else{
    $this -> db -> where('register.study_In',$place);
   }
   $query = $this -> db -> get();
   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

 function get_schoolpieChart($place)
 {
   $this -> db -> select("activity.type , count(participant.no_student) As student");
   $this -> db -> from('activity ');
   $this -> db -> where('activity.place',$place);
   $this->db->join('participant', 'participant.ac_title = activity.title', 'left');
   $this->db->group_by("activity.type"); 
   $query = $this -> db -> get();
   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 function get_distinctEvent($place)
 {
   $this -> db -> select("count(DISTINCT activity.type) As distinctEvent");
   $this -> db -> from('activity');
   $this -> db -> where('activity.place',$place);
   $query = $this -> db -> get();
   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
  function get_schoolcolumnChart($place)
 {
   $this -> db -> select("activity.type , count(participant.no_student) As student");
   $this -> db -> from('activity ');
   $this -> db -> where('activity.place',$place);
   $this->db->join('participant', 'participant.ac_title = activity.title', 'left');
   $this->db->group_by("activity.type"); 
   $query = $this -> db -> get();
   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

 function get_GenderTable($type,$place)
 {
   $this -> db -> select("count(student.gender) As number,gender");
   $this -> db -> from('participant');
   $this -> db -> where('activity.place',$place);
   if(!is_null($type)){
    $this -> db -> where('activity.type',$type);
   }
   $this->db->join('activity', 'participant.ac_title = activity.title', 'left');
   $this->db->join('student', 'participant.nationalID = student.nationalID', 'left');
   $this->db->group_by("student.gender"); 
   $query = $this -> db -> get();
   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
  function get_TotalTable($type,$place)
 {
   $this -> db -> select("count(student.gender) As total");
   $this -> db -> from('participant');
   $this -> db -> where('activity.place',$place);
   if(!is_null($type)){
    $this -> db -> where('activity.type',$type);
   }
   $this->db->join('activity', 'participant.ac_title = activity.title', 'left');
   $this->db->join('student', 'participant.nationalID = student.nationalID', 'left');
   $query = $this -> db -> get();
   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 function get_ProgramTable($type,$place)
 {
   $this -> db -> select("count(student.program) As number,program");
   $this -> db -> from('participant');
   $this -> db -> where('activity.place',$place);
   if(!is_null($type)){
    $this -> db -> where('activity.type',$type);
   }
   $this->db->join('activity', 'participant.ac_title = activity.title', 'left');
   $this->db->join('student', 'participant.nationalID = student.nationalID', 'left');
   $this->db->group_by("student.program"); 
   $query = $this -> db -> get();
   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 function get_schoolYearTable($type,$place)
 {
   $this -> db -> select("count(student.school_year) As number,school_year as schoolYear");
   $this -> db -> from('participant');
   $this -> db -> where('activity.place',$place);
   if(!is_null($type)){
    $this -> db -> where('activity.type',$type);
   }
   $this->db->join('activity', 'participant.ac_title = activity.title', 'left');
   $this->db->join('student', 'participant.nationalID = student.nationalID', 'left');
   $this->db->group_by("student.school_year"); 
   $query = $this -> db -> get();
   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

function get_schoolProfile($place)
 {
   $this -> db -> select("school.name,school.location,school.note,school.latitude,school.longitude");
   $this -> db -> from('school');
   $this -> db -> where('school_code',$place);
   $query = $this -> db -> get();
   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
  }
  function get_schoolCostEvent($place)
 {
   $this -> db -> select("sum(activity.cost)as cost,COUNT(*) as totalEvent");
   $this -> db -> from('activity');
   $this -> db -> where('activity.place',$place);
   $this->db->join('school', 'activity.Place = school.school_code', 'left');
   $this->db->group_by("activity.Place"); 
   $query = $this -> db -> get();
   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
  }
  function get_contactPerson($place)
 {
   $this -> db -> select("*");
   $this -> db -> from('contact');
   $this -> db -> where('school',$place);
   $query = $this -> db -> get();
   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
  }
   function get_Event($place)
 {
   $this -> db -> select("distinct(type)");
   $this -> db -> from('activity');
   $this -> db -> where('place',$place);
   $query = $this -> db -> get();
   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
  }

  function get_TimeLine($place)
 {
   $this -> db -> select("title,start,end,type,place,cost,detail,DATEDIFF( start,NOW()) AS timeLeft,
    DATEDIFF( end,start ) AS duration");
   $this -> db -> from('activity');
   //$this -> db -> where('NOW()< start');
   $this -> db -> where('place',$place);
   $this->db->order_by("timeLeft", "asc");
   $this -> db -> limit(5);
   $query = $this -> db -> get();
   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

 function editSchoolData()
 {
  $school_code = $this->input->post('code');
  $data=array(
    'name'=>$this->input->post('name'),
    //'school_code'=>$this->input->post('code'),
    'location'=>($this->input->post('location')),
    'note'=>$this->input->post('note')
  );
  $this->db->where('school_code', $school_code);
  $this->db->update('school',$data);
  return ($this->db->affected_rows() != 1) ? false : true;
 }
 function sendSchoolMail(){
  $To = $this->input->post('To');
  $Subject = $this->input->post('Subject');
  $Message = $this->input->post('Message');
  $this->load->library('email');

  $this->email->from('noreply@hotmail.com', 'System');
  $this->email->to($To); 

  $this->email->subject($Subject);
  $this->email->message($Message);  
  $this->email->send();
  //echo $this->email->print_debugger();
  print "<script type=\"text/javascript\">alert('Send maill Successfully');</script>";
  redirect('login', 'refresh');
 }


  function get_allSchool($place)
 {
   $this -> db -> select("school_code,name");
   $this -> db -> from('school');
   //$this -> db -> where('NOW()< start');
   $this -> db -> where_not_in('school_code',$place);
   $this->db->order_by("name", "");
   $query = $this -> db -> get();
   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}
?>