<?php
require('db.php');

	$id=$_REQUEST['id'];
	$query = "select * from patient where id='$id'"; 
	$result = mysqli_query($con, $query) or die ( mysqli_error());
	$row = mysqli_fetch_assoc($result);
?>

<html>
<head>
	<title>Update Patient</title>
	<link rel="stylesheet" href="1/c.css" />
</head>
<body>
		<div class="form">
			
			<h1>Update Record</h1>
					<?php
					$status = "";
					if(isset($_POST['new']) && $_POST['new']==1)
					{
					$id=$_REQUEST['id'];
					$name =$_REQUEST['fullname'];
					$age =$_REQUEST['age'];
					$addr =$_REQUEST['addr'];
					$bldgrp =$_REQUEST['bldgrp'];
					$gender =$_REQUEST['gender'];
					
					$update="update patient set fullname='$name', age='$age', addr='$addr',  gender='$gender',  bldgrp='$bldgrp'  where id='$id'";
					
					mysqli_query($con, $update);
					$status = "Record Updated Successfully. </br></br><a href='#'>View Updated Record</a>";
					echo '<p style="color:#FF0000;">'.$status.'</p>';
					}else {
					?>
			<div>
			
				<form name="form" method="post" action=""> 
				<table width="100%" border="0" style="border-collapse:collapse;" cellpadding='5' cellspacing='5' padding="5">
					<input type="hidden" name="new" value="1" />
					<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
					<tr><td>Fullname
					<p><input type="text" name="fullname" placeholder="Enter Name" required value="<?php echo $row['fullname'];?>" /></p></td></tr>
					<tr><td>Age
					<p><input type="text" name="age" placeholder="Enter Age" required value="<?php echo $row['age'];?>" /></p></td></tr>
					<tr><td>Address
					<p><input type="text" name="addr" placeholder="Enter Address" required value="<?php echo $row['addr'];?>" /></p></td></tr>
					<tr><td>BloodGroup
					<p><input type="text" name="bldgrp" placeholder="Enter Bldgrp" required value="<?php echo $row['bldgrp'];?>" /></p></td></tr>
					<tr><td>Gender
					<p><input type="text" name="gender" placeholder="Enter Gender" required value="<?php echo $row['gender'];?>" /></p></td></tr>

					<tr><td><p><input name="submit" type="submit" value="Update" /></p></td></tr>
				
				</table>
				</form>
					<?php } ?>
			</div>
	</div>
</body>
</html>
