<?php
class Upload_function extends CI_Model
 {
function __construct()
{			
	parent::__construct();			 
}
 function studentUpload_csv()
 {
 		$objCSV = fopen("uploadFile/temp.csv", "r");
		while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
			$strSQL = "INSERT INTO student ";
			$strSQL .="(nationalID,FName,LName,school_year,program,gender,gpa,study_In) ";
			$strSQL .="VALUES ";
			$strSQL .="('".$objArr[0]."','".iconv("ISO-8859-11", "UTF-8", $objArr[1])."','".iconv("ISO-8859-11", "UTF-8", $objArr[2])."' ";
			$strSQL .=",'".iconv("ISO-8859-11", "UTF-8", $objArr[3])."' ";
			$strSQL .=",'".iconv("ISO-8859-11", "UTF-8", $objArr[4])."' ";
			$strSQL .=",'".iconv("ISO-8859-11", "UTF-8", $objArr[5])."' ";
			$strSQL .=",'".iconv("ISO-8859-11", "UTF-8", $objArr[6])."' ";
			$strSQL .=",'".iconv("ISO-8859-11", "UTF-8", $objArr[7])."') ";
			$objQuery = mysql_query($strSQL);
		}
		//$names = array(0);
		//$this->db->where_in('nationalID', $names);
		//$this->db->delete('student');	
		fclose($objCSV);
		$name=date("YmdHis");
	    rename("uploadFile/temp.csv", "uploadFile/student/student".$name.".csv");
	}
function participantUpload_csv()
 {
 		$objCSV = fopen("uploadFile/temp.csv", "r");
		while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
			$strSQL = "INSERT INTO participant ";
			$strSQL .="(nationalID,ac_title) ";
			$strSQL .="VALUES ";
			$strSQL .="('".$objArr[0]."','".iconv("ISO-8859-11", "UTF-8", $objArr[1])."') ";
			$objQuery = mysql_query($strSQL);
		}
		//$names = array(0);
		//$this->db->where_in('nationalID', $names);
		//$this->db->delete('student');	
		fclose($objCSV);
		$name=date("YmdHis");
	    rename("uploadFile/temp.csv", "uploadFile/participant/participant".$name.".csv");
	}
}
