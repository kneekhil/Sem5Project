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
	<title>Add Doctor</title>
	<link rel="stylesheet" href="1/c.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
</head>
	<body background="1/bg.jpg">
	<div id="mySidebar" class="sidebar1">
		
		<img id="navlogo" src="1/doctorlogo.png" > </img> </br>
			
		
		<div id='ap1'>
					<h1 style="display:flex;justify-content:center;color: white;font-size: 1.5vw;">Add Doctor</h1>
			</div>
		<div class=snm><a href="adminpanel.php" style="padding: 0 0 1vw 0;">Dashboard</a></div>
		<div class=snm><a href="viewdoctors.php" style="border-top-style: solid;border-color: white;padding: 2vw 0 1vw 0;">View Doctors</a></div>
		<div class=snm><a href="viewpatients.php" style="padding: 0 0 1vw 0;">View Patients</a></div>
		
		
		<div class=snm><a href="logout.php" style="padding: 0 0 1vw 0;">Logout</a></div>		
	</div>
		
			<nav class="navbar1">
				<div class="label1"> 
				
					<img src="1/main.png" style="height: 6vw;  margin: 0vw 2vw;">
					<label>Hospital Management System</label>
				</div>
				
				
			</nav>
	
		
			
			
			<?php
				
    
				if (isset($_REQUEST['username'])){
					$firstname =$_REQUEST['firstname']; 
					$lastname=$_REQUEST['lastname'];
					$gender = $_REQUEST['gender'];
					$addr = $_REQUEST['addr'];
					$spec = $_REQUEST['spec'];
					$contactnumber = $_REQUEST['contactnumber'];
					$qualification = $_REQUEST['qualification'];
					$username = $_REQUEST['username'];
					$password = $_REQUEST['password'];
					
					
					$query = "INSERT into doctor (firstname, lastname, gender, addr,spec,contactnumber,qualification,username, password) 
										VALUES ('$firstname','$lastname','$gender','$addr','$spec','$contactnumber','$qualification','$username','$password')";
					$result = mysqli_query($con,$query);
					if($result){
							echo "<div class='err'><img src='1/done.png' style='height: 41px;'><h3>Doctor Added Successfully</h3></div>";
							
							
							}
					
				}else{
					
			?>
			<center>
				
				
			
					<table>
					
					<form id="adf" name="add_doctor" method="POST">

						<tr><td style="border-bottom: 1px solid black;text-align: left;font-size: 12px;"><text>Personal Information</text></td><td style="border-bottom: 1px solid black;"> </td></tr>
						<tr><td>Firstname:</td><td><input type="text" name="firstname" placeholder="First Name" required=""></td></tr>
						<tr><td>Lastaname:</td><td><input type="text" name="lastname" placeholder="Last Name" required=""></td></tr>
						<tr><td>Gender:</td><td> <select name="gender" size="1">
													<option>Male</option>
													<option>Female</option>
												</select></td></tr>
						<tr><td>Address:</td><td> <textarea name="addr" cols='25' placeholder="Address" required=""> </textarea></td></tr>
						<tr><td>Speciality:</td><td> <select name="spec" size="1">
														<option value='Surgeon'> Surgeon </option>
														<option value='Darmeologist'> Dermatologist </option>
														<option value='Physiotherepist'> Physiotherepist </option>
														<option value='Neurologist'> Neurologist </option>
														<option value='Surgeon'> Dentist </option>
														<option value='Surgeon'> Psychiatrist </option>
														<option value='Surgeon'> Cardiologist </option>
													</select></td></tr>
						<tr><td>Qualification</td><td><textarea cols='25' name="qualification" placeholder="Qualification" required=""></textarea></td></tr>
						<tr><td>Experience</td><td><input type="text" name="experience" placeholder="Experience" required=""></td></tr>
													
						<tr><td>Enter your Contact No.:</td><td><input type="tel" name="contactnumber" placeholder="Contact Number" required=""></td></tr>
					
						<tr><td></td><td> </td> </tr>
						<tr><td style="border-bottom: 1px solid black;text-align: left;font-size: 12px;"><text>Login Credintials</text></td><td style="border-bottom: 1px solid black;"> </td></tr>
						<tr><td>Enter new User ID:</td><td><input type="text" name="username" placeholder="Username" required=""></td></tr>
						<tr><td>Enter Password:</td><td><input type="password" name="password" placeholder="Password" required=""></td></tr>
						<tr><td colspan="2"><input class="button" type="submit" name="submit" value="Register"></td></tr>
				</form>
				</table>	
			</center>
				<?php } ?>
			
		
	</body>

</html>