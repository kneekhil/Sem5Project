<html>
<head>
	<title>Patient Signup</title>
	<link rel="stylesheet" href="1/c.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
</head>
	<body background="1/bg.jpg">
	<div id="mySidebar" class="sidebar1">
		
		<img id="navlogo" src="1/patientlogo.png" > </img> </br>
		<label id='pname'>Patient Registrion Form</label>		  
		
		
		</div>
		
			<nav class="navbar1">
				<div class="label1"> 
				
					<img src="1/main.png" style="height: 6vw;  margin: 0vw 2vw;">
					<label>Hospital Management System</label>
				</div>
				
			</nav>
	
		
			
			
			<?php
				require('db.php');
    
				if (isset($_REQUEST['username'])){
					$username =$_REQUEST['username']; 
					$fullname=$_REQUEST['fullname'];
					$contactnumber = $_REQUEST['contactnumber'];
					$gender = $_REQUEST['gender'];
					$password = $_REQUEST['password'];
					$addr = $_REQUEST['addr'];
					$bldgrp = $_REQUEST['bldgrp'];
					$age = $_REQUEST['age'];
					
					$query = "INSERT into Patient (fullname, gender, username, password,addr,age,contactnumber, bldgrp) VALUES ('$fullname','$gender','$username','$password','$addr', '$age', '$contactnumber','$bldgrp')";
					
					$result = mysqli_query($con,$query);
					if($result){
							echo "<div class='err'><img src='1/done.png' style='height: 41px;'><h3>You have Signed Up Successfully</h3><br/>Click here to <a href='patientlogin.php'>Login</a></div>";
							}
				}else{
			?>
			<center>
				
				
			
					
					
					<form id="spf1" name="registration" method="post">
					<table>
						<tr><td style="border-bottom: 1px solid black;text-align: left;font-size: 12px;"><text>Personal Information</text></td><td style="border-bottom: 1px solid black;"> </td></tr>
						<tr><td>Enter your Full Name:</td><td><input type="text" name="fullname" placeholder="Enter Your FullName" required=""></td></tr>
						<tr><td>Gender:</td><td> <select name="gender" size="1">
													<option>Male</option>
													<option>Female</option>
												</select></td></tr>
						<tr><td>Blood Group:</td><td> <select name="bldgrp" size="1">
														<option> A+ </option>
														<option> B+ </option>
														<option> A- </option>
														<option> B- </option>
														<option> Ab+ </option>
														<option> Ab- </option>
														<option> O </option>
													</select></td></tr>
						<tr><td>Address:</td><td> <textarea name="addr" cols='25'> </textarea></td></tr>
						<tr><td>Age:</td><td> <input name="age" type="number"/> </td></tr>
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