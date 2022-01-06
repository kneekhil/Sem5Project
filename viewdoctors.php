<?php
require('db.php');

session_start();  

if(!$_SESSION['admin'])  
{  
  
    header("Location: login.php");//redirect to the login page to secure the welcome page without login access.  
}  
  
?>  

<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" href="1/c.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
</head>
	<body background="1/bg.jpg">
	
	<div id="mySidebar" class="sidebar1">
		
		<img id="navlogo" src="1/doctorlogo.png" style="height: 11vw;margin: 21%;">
		<div id='ap1'>
					<h1 style="display:flex;justify-content:center;color: white;font-size: 1.5vw;">View Doctors</h1>
			</div>
			
		
		
		<div class=snm><a href="adminpanel.php" style="padding: 0 0 1vw 0;">Dashboard</a></div>
		
		<div class=snm><a href="add_doctor.php" style="border-top-style: solid;border-color: white;padding: 2vw 0 1vw 0;">Add Doctors</a></div>
	 
		<div class=snm><a href="viewpatients.php" style="padding: 0 0 1vw 0;">View Patients</a></div>
		
		<div class=snm><a href="logout.php" style="padding: 0 0 1vw 0;">Logout</a></div> 	
	</div>
		<div class="head">
			<nav class="navbar1">
				<div class="label1"> 
				
					<img src="1/main.png" style="height: 6vw;  margin: 0vw 2vw;">
					<label>Hospital Management System</label>
				</div>
				
				
			</nav>
			<center>
			<table width="100%" border="0" style="border-collapse:collapse;" cellpadding='5' cellspacing='5' padding="5">
		
		
			<?php
			$count=1;
			$sql_query="Select * from doctor ORDER BY id;";
			$result = mysqli_query($con,$sql_query);
			while($row = mysqli_fetch_assoc($result)) { ?>
			<thead>
			<tr>
			
				<th align="left"><strong>S.No</strong></th>
				<td ><?php echo $count; ?></td>
				<th align="left"><strong>Emp.ID</strong></th>
				<td ><?php echo $row["id"]; ?></td>
				<td> &nbsp </td>
				
				
				<td align="center"><a href="docdelete.php?id=<?php echo $row["id"]; ?>">Delete this user</a></td>
				
				
			</tr>
			</thead>
			<tbody >
			<tr>
			<td> &nbsp </td>
				<th><strong>Firstname</strong></th>
				<td align="center"><?php echo $row["firstname"]; ?></td>
				<th><strong>Lastname</strong></th>.
				<td align="center"><?php echo $row["lastname"]; ?></td>
			</tr>
			<tr>
			<td> &nbsp </td>
				<td align="center"><strong>Gender:</strong></td>
				<td align="center"><?php echo $row["gender"]; ?></td>
				<td align="center"><strong>Address</strong></td>
				<td align="center"><?php echo $row["addr"]; ?></td>
			</tr>
			<tr>
			<td> &nbsp </td>
				<td align="center"><strong>Specilization</strong></td>
				<td align="center"><?php echo $row["spec"]; ?></td>
				<td align="center"><strong>Contact No.</strong></td>
				<td align="center"><?php echo $row["contactnumber"]; ?></td>
			</tr>
			<tr>
			<td>&nbsp </td>
			<td align="center"><strong>Qualification</strong></td>
				<td colspan="3" align="center" ><?php echo $row["qualification"]; ?></td>
			</tr>
				<tr><td> &nbsp </td></tr>
				
				
				
			
			<?php $count++; } ?>
		</tbody>
		
	</table>
	</center>
			
	</body>
</html>