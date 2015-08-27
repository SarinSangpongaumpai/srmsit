<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<?php echo $maps['js']; ?></head>  
<body>
	 <?php echo $maps['html']; ?>  




	<?php echo form_open('map/index'); ?>
  <?php echo validation_errors(); ?>
  <?php
  	 $data = array(
  	 		  'name'        => 'myPlaceTextBox',
          'id'          => 'myPlaceTextBox',
  	  );
  	 //echo form_input($data);
  //echo form_input('lon', $this->input->post('myPlaceTextBox')); 
  //echo form_submit('submit','submit'); 
  echo form_close(); 
  ?>




<?php
  echo form_open('map/index');
 
  echo "<input id=\"place\" name=\"place\"  list=\"place1\" >
  <datalist id=\"place1\" autocomplete=\"off\" >";
   foreach($myDropdown as $dd) {
  echo  "<option value=\"$dd[Place_name]\"/>"; // Format for adding options 
  }
  echo "</datalist>";
  echo form_submit('submit','submit'); 
  echo form_close(); 

   //$this->input->post('place');
?>


</body>
</html>