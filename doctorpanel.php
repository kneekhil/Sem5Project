<?php  
session_start();  
include "db.php";

if(!$_SESSION['doctor'])  
{  
  
    header("Location: login.php");//redirect to the login page to secure the welcome page without login access.  
}  
  
?>  
  

<html>
<head>
	<title>Doctor Panel</title>
	<link rel="stylesheet" href="1/c.css"><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
</head>
	<body background="1/bg.jpg">
	
	<div id="mySidebar" class="sidebar1">
		
		<img id="navlogo" src="1/doctorlogo.png" style="height: 11vw;margin: 21%;">
		<div id='ap1'>
					<h1 style="display:flex;justify-content:center;color: white;font-size: 1.5vw;">Welcome <?php echo $_SESSION['doctor'];?></h1>
			</div>
			
		
		
		<div class=snm><a href="doctorlogout.php" style="padding: 0 0 1vw 0;">Logout</a></div>
			
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
			
			
				<!-- Three columns -->
				<div class="row">
				  <div class="column" id="col1" onclick="openTab('b1');" >
					Book Appointment 
				  </div>
				  <div class="column" id="col2" onclick="openTab('b2');" >
					Find a Doctor
				  </div>
				  <div class="column" id="col1" onclick="openTab('b3');" >
					Feedback or Complaints
				  </div>
				</div>

				<!-- Full-width columns: (hidden by default) -->
				<div id="b1" class="grid" style="display:none;">
				  <span onclick="this.parentElement.style.display='none'" class="closeb">X</span>
				  <table>
				  <form id="spf1" name="registration" method="post">
						<tr><td style="border-bottom: 1px solid black;text-align: left;font-size: 12px;"><text>Database Information</text></td><td style="border-bottom: 1px solid black;"> </td></tr>
						
				  <?php
					$username=$_SESSION['patient'];
					$records = mysqli_query($con,"select * from patient where username='$username'"); // fetch data from database
					$drecords = mysqli_query($con,"select * from doctor"); // fetch data from database
					
					while($data = mysqli_fetch_array($records))
					{
					?>
					<tr><td><strong>ID</strong></td>
						<td><input type='text' name='id' value='<?php echo $data['id']; ?>' readonly></td>
					</tr>
					<tr><td><strong>Your Name</strong></td>
						<td><input type='text' name='name' value='<?php echo $data['fullname']; ?>' readonly></td>
					</tr>
					<tr><td><strong>Your Age</strong></td>
						<td><input type='text' name='age' value='<?php echo $data['age']; ?>' readonly></td>
					</tr>
					<tr><td><strong>Your Address</strong></td>
						<td><input type='text' name='addr' value='<?php echo $data['addr']; ?>' readonly></td>
					</tr>
					<tr><td><strong>Your BloodGroup</strong></td>
						<td><input type='text' name='bldgrp' value='<?php echo $data['bldgrp']; ?>' readonly></td>
					</tr>
					<tr><td><strong>Your Gender</strong></td>
						<td><input type='text' name='gender' value='<?php echo $data['gender']; ?>' readonly></td>
					</tr>
					<?php } ?>
					</form>
					</table>
					<table>
					<form id="spf1" name="registration" method="post">
						<tr><td style="border-bottom: 1px solid black;text-align: left;font-size: 12px;"><text>Appointment Information</text></td><td style="border-bottom: 1px solid black;"> </td></tr>
						<tr><td>Select Date:</td><td><input type='date' name="date"></td></tr>
						<tr><td>Select category of Appointment:</td><td> <select name="ap_cat" size="1">
															<option value='Standard Consultation'> Standard Consultation </option>
															<option value='Long Consultation'> Long Consultation </option>
															
															<option value='Repeat Prescription'> Repeat Prescription </option>
															<option value='Child Immunisations'> Child Immunisations </option>
															<option value='Dressing(Wound Care)'> Dressing(Wound Care) </option>
															<option value='Skin Check'> Skin Check </option>
														</select>
														</td></tr>
					<?php
						$username=$_SESSION['patient'];
						
						$drecords = mysqli_query($con,"select * from doctor"); // fetch data from database
						?>
						
						<tr><td>Select Doctor:</td><td> <select name="ap_cat" size="1">
						<?php
						while($data = mysqli_fetch_array($drecords))
						{ ?>
					
							<option> <?php echo $data['firstname']; ?> </option>
						<?php } ?>
						</select>
						</td></tr>
						<tr><td>Reason for Visit:</td><td> <textarea name="reason" cols='25'> </textarea></td></tr>
						<tr><td>Add a Note:</td><td> <textarea name="note" cols='25'> </textarea></td></tr>
						
						<tr><td>Enter your Contact No.:</td><td><input type="tel" name="contactnumber" required=""></td></tr>
						<tr><td colspan="2"><input class="button" type="submit" name="submit" value="Book"></td></tr>
						</form>					
					
					</table>



				</div>

				<div id="b2" class="grid" style="display:none;">
				  <span onclick="this.parentElement.style.display='none'" class="closeb">X</span>
					
					<?php
						$count=1;
						$sql_query="Select * from doctor;";
						$result = mysqli_query($con,$sql_query);
						while($row = mysqli_fetch_assoc($result)) { ?>
						<table style="width: 100%;">
						<thead>
						<tr><td><?php echo $count; ?></td></tr>
						<tr><td colspan="5" style="border-bottom: 1px solid black;"> </td></tr>
							
						</thead>
						<tbody >
						<tr>
						<td> &nbsp </td>
							<th><strong>Firstname</strong></th>
							<td align="center"><?php echo $row["firstname"]; ?></td>
							
							<td align="center"><?php echo $row["lastname"]; ?></td>
							<td> &nbsp </td>
						</tr>
						<tr>
						<td> &nbsp </td>
							
							<td align="center"><strong>Address</strong></td>
							<td align="center"><?php echo $row["addr"]; ?></td>
						</tr>
						<tr>
						<td> &nbsp </td>
							<td align="center"><strong>Specilization</strong></td>
							<td align="center"><?php echo $row["spec"]; ?></td>
						</tr>
						<tr>
						<td> &nbsp </td>
							<td align="center"><strong>Contact No.</strong></td>
							<td align="center"><?php echo $row["contactnumber"]; ?></td>
						</tr>
						<tr>
						<td>&nbsp </td>
						<td align="center"><strong>Qualification</strong></td>
							<td colspan="3" align="center" ><?php echo $row["qualification"]; ?></td>
						</tr>
						<tr><td colspan="8" style="border-bottom: 1px solid black;"> </td></tr>
							</tbody>
					
				</table>
							
						
						<?php $count++; } ?>
					
				</div>

				<div id="b3" class="grid" style="display:none;">
				  <span onclick="this.parentElement.style.display='none'" class="closeb">X</span>
				  <table style="width: 100%;">
				  <form>
				  <tbody>
				  <tr><td colspan='2'> Feedback/Complaint Form</td></tr>
				  <tr><td>Your Name: </td><td><input type="text"></td></tr>
				  <tr><td>Feedback/Complaint: </td><td><textarea></textarea></td></tr>
				  <tr><td colspan='2'> <input class="button" type="submit" name="submit" value="Submit"></td></tr>
				  </tbody>
				  </form>
				  </table>
				</div>

				
				
			
	</body>
</html>

				<script>
					function openTab(tabName) {
					  var i, x;
					  x = document.getElementsByClassName("grid");
					  for (i = 0; i < x.length; i++) {
						x[i].style.display = "none";
					  }
					  document.getElementById(tabName).style.display = "flex";
					  
					}
				</script>