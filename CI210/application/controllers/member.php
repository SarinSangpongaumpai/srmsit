<?php
 class Member extends CI_Controller
 {
   public function _construct()
   {
     parent:__construct();
   }
    

   public function index()
   {
    /*
    $sql="SELECT * FROM student order by ID asc";
    $rs =$this->db->query($sql);
    */

    $rs=$this->db->get("student");
    $data["rs"] = $rs->result_array();

    $this->load->view("member/index",$data);
   }

   public function add()
   {
   	if($this->input->post("btsave")!=null)
   	{
   	  $data= array(
   	  	"Id"=>$this->input->post("Id"),
   	  	"FirstName"=>$this->input->post("FirstName"),
   	  	"LastName"=>$this->input->post("LastName"),
   	    "Grade"=>$this->input->post("Grade")
   	  );
      $this->db->insert("student",$data);
      redirect("member","refresh");
      exit();
   	}
   	$this->load->view("member/add_member");
   }
   public function del($id)
   {
     $this->db->delete("student",array("id"=>$id));
     redirect("member","refresh");
     exit();
   }

   public function update($id)
   {
   	if($this->input->post("btsave")!=null)
   	{
   	 $data= array(
   	  	"FirstName"=>$this->input->post("FirstName"),
   	  	"LastName"=>$this->input->post("LastName"),
   	    "Grade"=>$this->input->post("Grade")
   	  );
   	  $this->db->where('Id',$id);
      $this->db->update('student',$data);
      redirect("member","refresh");
      exit();
    }

      /*
     $sql="Select* from student where Id ='$id'";
     $rs=$this->db->query($sql);
     */
     $rs=$this->db->get_where("student");
     if($rs->num_rows()==0)
     {
     	$data['rs']=array();
     }
     else
     {
     	$data['rs']=$rs->row_array();
     }
     $this->load->view("member/update_member",$data);
   }
}
 ?>