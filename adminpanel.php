<?php  
session_start();  
require('db.php');

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
		
		<img id="navlogo" src="1/adminlogo.png" style="height: 11vw;margin: 21%;">
		<div id='ap1'>
					<h1 style="display:flex;justify-content:center;color: white;font-size: 1.5vw;">Welcome <?php echo $_SESSION['admin'];?></h1>
			</div>
			
		
		<div class=snm><a href="viewpatients.php" style="border-top-style: solid;border-color: white;padding: 2vw 0 1vw 0;">Views Patient</a></div>
		<div class=snm><a href="viewdoctors.php" style="padding: 0 0 1vw 0;">View Doctors</a></div>
		<div class=snm><a href="add_doctor.php" style="padding: 0 0 1vw 0;">Add Doctor</a></div>
		<div class=snm><a href="logout.php" style="padding: 0 0 1vw 0;">Logout</a></div>
			
	</div>
		<div class="head">
			<nav class="navbar1">
				<div class="label1"> 
				
					<img src="1/main.png" style="height: 6vw;  margin: 0vw 2vw;">
					<label>Hospital Management System</label>
				</div>
			</nav>
			<div class='subtitle'> 
				
					
					<label>Dashboard</label>
					
			</div>
			<div class='mbody'>
				
				<?php
					$dcount=0;
					$pcount=0;
					$npcount=0;
					
					$sql_query1 = "Select * from doctor ORDER BY id;";
					$sql_query2 = "Select * from patient ORDER BY id;";
					$sql_query4 = "Select * from patient where updatedOn = curdate();";
					
					
					$result1 = mysqli_query($con, $sql_query1);
					$result2 = mysqli_query($con, $sql_query2);
					$result4 = mysqli_query($con, $sql_query4);
					
					
					
					while($row = mysqli_fetch_assoc($result1)) 
					{ 
						$dcount++; 
					}
					
					while($row = mysqli_fetch_assoc($result2)) 
					{ 
						$pcount++; 
					}
					
					while($row = mysqli_fetch_assoc($result4)) 
					{ 
						$npcount++; 
					}
					?>
				<div class='pcount'>
				
				<table style="color: white; font-weight: 600;">
					<tr>
						<td colspan="2">Total Patients</td>
                    </tr>
					<tr>
					<td style="padding: 0 0 20 0;"><img src='1/b_pat.png' style="height:35px;"></td>
						<td style="font-size: 35;padding: 0 0 20 0;"><?php echo $pcount; ?></td>
                    </tr>
				</table>
				</div>
				
				<div class='pcount'>
				
				<table style="color: white; font-weight: 600;">
					<tr>
						<td colspan="2">New Patients</td>
                    </tr>
					<tr>
					<td style="padding: 0 0 20 0;"><img src='1/eye.png' style="height:35px;"></td>
						<td style="font-size: 35;padding: 0 0 20 0;"><?php echo $npcount; ?></td>
                    </tr>
				</table>
				</div>
				
				<div class='dcount'>
				<table style="color: white; font-weight: 600;">
					<tr>
						<td  colspan="2">Total Doctors</td>
                    </tr>
					<tr>
					<td style="padding: 0 0 20 0;"><img src='1/b_pat.png' style="height:35px;"></td>
						<td style="font-size: 35; padding: 0 0 20 0;"><?php echo $dcount; ?></td>
                    </tr>
				</table>
					
				</div>
				</div>
				
				
				<div class="panelbox">
				<div class='todayspatient'>
				<img src='1/eye.png' style="height:15px;">
				<label>New Patients</label>
				<?php
						$count=1;
						$sql_query3 = "Select * from patient where updatedOn = curdate();";
						$result3 = mysqli_query($con, $sql_query3);
						?>
						
						<table style="width: max-content; outline: 3px solid #044798;text-align: right;margin: 10; background-color: white;">
						
						<thead><tr>
						<td align="center"><strong>Sr.No</strong></td>
						<td align="center"><strong>Fullname</strong></td>
						<td align="center"><strong>Address</strong></td>
						<td align="center"><strong>Gender</strong></td>
						
						<td align="center"><strong>Contact Number</strong></td>
						<td align="center"><strong>Registered On</strong></td>
						</tr></thead>
						<?php while($row = mysqli_fetch_assoc($result3)) { ?>
						
						
						<tbody>
						<tr><td><?php echo $count; ?></td>
							
							
							<td align="center"><?php echo $row["fullname"]; ?></td>
							
							<td align="center"><?php echo $row["addr"]; ?></td>
						
							<td align="center"><?php echo $row["gender"]; ?></td>
						
							<td align="center" ><?php echo $row["contactnumber"]; ?></td>
							
							<td align="center" ><?php echo $row["updatedOn"]; ?></td>
						
						</tr>
							
					</tbody>
					<?php $count++; } ?>
				</table>
							
						
						
			</div>
			
			<div class='todayspatient'>
				<img src='1/eye.png' style="height:15px;">
				<label>New Patients</label>
				<?php
						$count=1;
						$sql_query3 = "Select * from patient where updatedOn = curdate();";
						$result3 = mysqli_query($con, $sql_query3);
						?>
						
						<table style="width: max-content; outline: 3px solid #044798;text-align: right;margin: 10; background-color: white;">
						
						<thead><tr>
						<td align="center"><strong>Sr.No</strong></td>
						<td align="center"><strong>Firstname</strong></td>
						<td align="center"><strong>Address</strong></td>
						<td align="center"><strong>Gender</strong></td>
						<td align="center"><strong>BloodGroup</strong></td>
						<td align="center"><strong>Contact Number</strong></td>
						<td align="center"><strong>Registered On</strong></td>
						</tr></thead>
						<?php while($row = mysqli_fetch_assoc($result3)) { ?>
						
						
						<tbody>
						<tr><td><?php echo $count; ?></td>
							
							
							<td align="center"><?php echo $row["fullname"]; ?></td>
							
							<td align="center"><?php echo $row["addr"]; ?></td>
						
							<td align="center"><?php echo $row["gender"]; ?></td>
						
							<td align="center"><?php echo $row["bldgrp"]; ?></td>
						
							<td align="center" ><?php echo $row["contactnumber"]; ?></td>
							
							<td align="center" ><?php echo $row["updatedOn"]; ?></td>
						
						</tr>
							
					</tbody>
					<?php $count++; } ?>
				</table>
							
						
						
			</div>
			</div>
			
	<script>
		var slideIndex = 0;
		carousel();

			function carousel() {
			  var i;
			  var x = document.getElementsByClassName("pcount");
			  for (i = 0; i < x.length; i++) {
				x[i].style.display = "none"; 
			  }
			  slideIndex++;
			  if (slideIndex > x.length) 
				{
				  slideIndex = 1
				} 
				
			  x[slideIndex-1].style.display = "block"; 
			  setTimeout(carousel, 2500); 
			}
	</script>
			
	</body>
</html>