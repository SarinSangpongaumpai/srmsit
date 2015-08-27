<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Member</title>
</head>
<body>
	<h1> Member</h1>
	<?php echo anchor("member/add","add") ?>



	<table border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>ID</th>
				<th>First</th>
				<th>Last</th>
				<th>Grade</th>
				<th>Edit</th>
			</tr>
		</thead>
	<tbody>
		<?php
		if(count($rs)==0)
		{
			echo"<tr><td colspan='5'align='center'>--no data--</td></tr>";
		}
		else
		{
			$no=1;
			foreach($rs as $r)
			{
				echo"<tr>";
				echo"<td align='center'>$no</td>";
				echo"<td>".$r['Id']."</td>";
				echo"<td>".$r['FirstName']."</td>";
				echo"<td>".$r['LastName']."</td>";
				echo"<td>".$r['Grade']."</td>";
				echo"<td align='center>";
				echo"<td align='center>";
				echo anchor("member/update/".$r['Id'],"Update")."&nbsp;";
				echo anchor("member/del/".$r['Id'],"Delete",array("onclick"=>"javascript:return confirm('Do you want to delete?');"));

				echo"</td>";
				echo"</tr>";
				$no++;
			}
		}
	      ?>
	</tbody>
</table>
</body>
</html>