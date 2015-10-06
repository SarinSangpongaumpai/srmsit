<?php
class new_m extends CI_Model { 
   function get_data(){
       return mysql_query("SELECT * FROM student");
   }
   function data_load(){
       return mysql_query("SELECT * FROM amchart");
   }
   
   function test()
	{
		$q="SELECT * FROM amchart";  
		$qr=mysql_query($q);  
		while($rs=mysql_fetch_array($qr)){  
		    $json_data[]=array(  
		        "year"=>$rs['year'],  
		        "participants"=>$rs['participants'],
		        "applicants"=>$rs['applicants'],
		        "students"=>$rs['students'],  
		    );    
		}  
		$json= json_encode($json_data);  
		if(isset($_GET['callback']) && $_GET['callback']!=""){  
		echo $_GET['callback']."(".$json.");";      
		}else{  
		echo $json; 
		}
	}
function get_people() {
		static $query;
		$this->db->select('year, participants, applicants, students');
		$query = $this->db->get('amchart');
		if($query->num_rows() > 0) return $query->result();
		else return FALSE;
	}
}
?> 
