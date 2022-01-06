<?php  
session_start();  
include "db.php";

if(!$_SESSION['patient'])  
{  
  
    header("Location: login.php");//redirect to the login page to secure the welcome page without login access.  
}  
  
?>  
  

<html>
<head>
	<title>Patient Panel</title>
	<link rel="stylesheet" href="1/c.css"><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
</head>
	<body background="1/bg.jpg">
	
	<div id="mySidebar" class="sidebar1">
		
		<img id="navlogo" src="1/patientlogo.png" style="height: 11vw;margin: 21%;">
		<div id='ap1'>
					<h1 style="display:flex;justify-content:center;color: white;font-size: 1.5vw;">Welcome <?php echo $_SESSION['patient'];?></h1>
			</div>
			
		
		
		<div class=snm><a href="patientlogout.php" style="padding: 0 0 1vw 0;">Logout</a></div>
			
	</div>
		<div class="head">
			<nav class="navbar1">
				<div class="label1"> 
				
					<img src="1/main.png" style="height: 6vw;  margin: 0vw 2vw;">
					<label>Hospital Management System</label>
				</div>
				
				
			</nav>
			
			
				
				<div class="row">
				  <div class="column" id="col1" onclick="openTab('b1');" >
					Book Appointment 
				  </div>
				</div>

				
				<div id="b1" class="grid" style="display:block;">
				  
				  <table>
				  	
				  <?php
				  
					$username=$_SESSION['patient'];

					$records = mysqli_query($con,"select * from patient where username='$username'"); // fetch data from database
					$drecords = mysqli_query($con,"select * from doctor"); // fetch data from database
				
				if (isset($_REQUEST['name'])){	
				
					$p_id=$_REQUEST['id'];
					
					
					$ap_date = $_REQUEST['ap_date'];
					$ap_cat = $_REQUEST['ap_cat'];
					$d_name = $_REQUEST['ap_doctor'];
					
					
					$reason = $_REQUEST['reason'];
					$note = $_REQUEST['note'];
					

					
					$query2 = "INSERT into appointment (p_id, ap_date, ap_cat, reason, note) 
										VALUES ('$p_id','$ap_date','$ap_cat','$reason','$note')";
					
					$result2 = mysqli_query($con,$query2);
					if($result2){
							echo "<div class='err'><img src='1/done.png' style='height: 41px;'><h3>Appointment Booked Successfully</h3></div>";
							}
					
				}else{
					
					while($data = mysqli_fetch_array($records))
					{
					?>
					<form id="spf1" name="registration" method="post">
						<tr><td style="border-bottom: 1px solid black;text-align: left;font-size: 12px;"><text>Database Information</text></td><td style="border-bottom: 1px solid black;"> </td></tr>
					
					<tr><td><strong>ID</strong></td>
						<td><input type='text' name='id' value='<?php echo $data['id']; ?>' readonly></td>
					</tr>
					
					
					
					
					
					<?php } ?>
					</form>
					</table>
					<table>
					<form id="spf1" name="registration" method="post">
						<tr><td style="border-bottom: 1px solid black;text-align: left;font-size: 12px;"><text>Appointment Information</text></td><td style="border-bottom: 1px solid black;"> </td></tr>
						<tr><td>Select Date:</td><td><input type='date' name="ap_date"></td></tr>
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
						
						<tr><td>Select Doctor:</td><td> <select name="ap_doctor" size="1">
						<?php
						while($data = mysqli_fetch_array($drecords))
						{ ?>
					
							<option value='<?php echo $data['firstname']; ?>'> <?php echo $data['firstname']; ?> </option>
						<?php } ?>
						</select>
						</td></tr>
						<tr><td>Reason for Visit:</td><td> <textarea name="reason" cols='25'> </textarea></td></tr>
						<tr><td>Add a Note:</td><td> <textarea name="note" cols='25'> </textarea></td></tr>
						
						<tr><td>Enter your Contact No.:</td><td><input type="tel" name="contactnumber" required=""></td></tr>
						<tr><td colspan="2"><input class="button" type="submit" name="submit" value="Book"></td></tr>
						<?php } ?>
						</form>					
					
					</table>



				</div>

				

				
				
				
			
	</body>
</html>

				