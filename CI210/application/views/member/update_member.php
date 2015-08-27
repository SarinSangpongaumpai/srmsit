<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Member</title>
</head>
<body>
	<h1>Update Member</h1>
	<?php echo form_open("member/update/".$rs['Id']);?>
	<table>
		<tr>
			<td>First Name:</td>
			<td><input type= "text" name="FirstName"value="<?php echo $rs["FirstName"];?>"/></td>
		</tr>
		<tr>
			<td>Last Name:</td>
			<td><input type= "text" name="LastName"value="<?php echo $rs["LastName"];?>"/></td>
		</tr>
		<tr>
			<td>Grade:</td>
			<td><input type= "text" name="Grade"value="<?php echo $rs["Grade"];?>"/></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit"name="btsave"value="Submit"/>&nbsp;<?php echo anchor("member","cancel");?></td>
		</tr>
	</table>
	<?php echo form_close();?>

</body>
</html>