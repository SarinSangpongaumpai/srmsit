<?php
class Upload_function extends CI_Model
 {
function __construct()
{			
	parent::__construct();			 
}
 function upload_csv()
 {
 		$objCSV = fopen("uploadFile/temp.csv", "r");
		while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
			$strSQL = "INSERT INTO student ";
			$strSQL .="(nationalID,FName,LName,gpa) ";
			$strSQL .="VALUES ";
			$strSQL .="('".$objArr[0]."','".iconv("ISO-8859-11", "UTF-8", $objArr[1])."','".$objArr[2]."' ";
			$strSQL .=",'".$objArr[3]."') ";
			$objQuery = mysql_query($strSQL);
		}
		//$names = array(0);
		//$this->db->where_in('nationalID', $names);
		//$this->db->delete('student');	
		fclose($objCSV);
		$name=date("YmdHis");
	    rename("uploadFile/temp.csv", "uploadFile/".$name.".csv");
	}

}
