<?php
		 
					require('db.php');

					session_start();//session starts here  
  

						   
				if (isset($_POST['adminusername']))
				{
					$adminusername = $_REQUEST['adminusername'];
					$adminpassword = $_REQUEST['adminpassword'];
					
					$query = "SELECT * FROM admin WHERE username='$adminusername' and password='$adminpassword'";
					
					$result = mysqli_query($con,$query);
										
					if(mysqli_num_rows($result))
					{
						header("Location:adminpanel.php");
						//echo"<script>window.open('adminpanel.php')</script>";
						$_SESSION['admin']=$adminusername;
					}
					else
					{
						echo "<script>alert('Incorrect Username or Password')</script>";
					}
				}
				
				if (isset($_POST['doctorusername']))
				{
					$doctorusername = $_REQUEST['doctorusername'];
					$doctorpassword = $_REQUEST['doctorpassword'];
					
					$query = "SELECT * FROM doctor WHERE username='$doctorusername' and password='$doctorpassword'";
					
					$result = mysqli_query($con,$query);
										
					if(mysqli_num_rows($result))
					{
						header("Location:doctorpanel.php");
						//echo"<script>window.open('adminpanel.php')</script>";
						$_SESSION['doctor']=$doctorusername;
					}
					else
					{
						echo "<script>alert('Incorrect Username or Password')</script>";
					}
				}
				if (isset($_POST['patientusername']))
				{
					$patientusername = $_REQUEST['patientusername'];
					$patientpassword = $_REQUEST['patientpassword'];
					
					$query = "SELECT * FROM patient WHERE username='$patientusername' and password='$patientpassword'";
					
					$result = mysqli_query($con,$query);
										
					if(mysqli_num_rows($result))
					{
						header("Location:patientpanel.php");
						//echo"<script>window.open('adminpanel.php')</script>";
						$_SESSION['patient']=$patientusername;
					}
					else
					{
						echo "<script>alert('Incorrect Username or Password')</script>";
					}
				}
				
			?>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" href="1/c.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">

</head>
	<body background="1/bg.jpg">
		<div class="head">
			<nav id="head" class="navbar">
				<div class="label1"> 
					<img src="1/main.png" style="height: 5vw; margin: 0px 25px;">
					<label>Hospital Management System</label>
					</div>
			</nav>
			<div id="mySidebar" class="sidebar">
			  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
			  
			  <button class=snm><img id="1" src="1/adminlogo.png" style="height: 5vw; margin:1vw;" onclick="openAdminlogin()">Admin</button>
			  <button class=snm><img id="1" src="1/doctorlogo.png" style="height: 5vw; margin:1vw;" onclick="openDoctorlogin()">Doctor</button>
			  <button class=snm><img id="1" src="1/patientlogo.png" style="height: 5vw; margin:1vw;" onclick="openPatientlogin()">Patient</button>
			  
		</div>
		
		<div id="adminlogin" class="popuplogin" style="    display: none;"> 
		
				<a href="javascript:void(0)" class="closebtn" onclick="closeAdminlogin()">×</a>
					<form id='DL' method="post" name="adminlogin" style="margin: 0 50;">
					<label style="align-items: center;text-align: center;margin: 0 0 0 38%;font-weight: bold;">Admin Login</label>
					<table>
						
						<tr><td><label>Enter your ID:</label></td><td> <input type="text" name="adminusername" placeholder="Enter your ID" required> </input> </td></tr>
						<tr><td><label>Enter your Password:</label></td><td><input type="password" name="adminpassword" placeholder="Enter your Password" required></input></td></tr>
						<tr><td colspan='2'><input class="button" type="submit"  value="Login"></td></tr>
					</table>
					</form>
		</div>
		
		<div id="doctorlogin" class="popuplogin" style="    display: none;"> 
		
				<a href="javascript:void(0)" class="closebtn" onclick="closeDoctorlogin()">×</a>
					<form id='DL' method="post" name="doctorlogin" style="margin: 0 50;">
					<label style="align-items: center;text-align: center;margin: 0 0 0 38%;font-weight: bold;">Doctor Login</label>
					<table>
						<tr><td><label>Enter your ID:</label></td><td> <input type="text" name="doctorusername" placeholder="Enter your ID" required> </input> </td></tr>
						<tr><td><label>Enter your Password:</label></td><td><input type="password" name="doctorpassword" placeholder="Enter your Password" required></input></td></tr>
						<tr><td colspan='2'><input class="button" type="submit"  value="Login"></td></tr>
					</table>
					</form>
		</div>
		
		<div id="patientlogin" class="popuplogin" style="    display: none;"> 
		
				<a href="javascript:void(0)" class="closebtn" onclick="closePatientlogin()">×</a>
					<form id='DL' method="post" name="adminlogin" style="margin: 0 50;">
					<label style="align-items: center;text-align: center;margin: 0 0 0 38%;font-weight: bold;">Patient Login</label>
					<table>
						<tr><td><label>Enter your ID:</label></td><td> <input type="text" name="patientusername" placeholder="Enter your ID" required> </input> </td></tr>
						<tr><td><label>Enter your Password:</label></td><td><input type="password" name="patientpassword" placeholder="Enter your Password" required></input></td></tr>
						<tr><td colspan='2'><input class="button" type="submit"  value="Login"></td></tr>
					</table>
					</form>
		</div>

	<div id="main">
	<button id="openbtn" class="openbtn" onclick="openNav()">☰ Login Options</button>  
	</div>
	
	<div id="ss" class="slideshow" style="max-width:801px;transition: 0.5s;">
		  <img class="mySlides" src="1/hos1.jpg" style="width:100%">
		  <img class="mySlides" src="1/hos2.jpg" style="width:100%">
		  <img class="mySlides" src="1/hos3.jpg" style="width:100%">
	</div>
	
</div>
	<script>
		var myIndex = 0;
		carousel();

		function carousel() {
		  var i;
		  var x = document.getElementsByClassName("mySlides");
		  for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";  
		  }
		  myIndex++;
		  if (myIndex > x.length) {myIndex = 1}    
		  x[myIndex-1].style.display = "block";  
		  setTimeout(carousel, 2000); // Change image every 2 seconds
		}

	
	
	function openAdminlogin() {
		document.getElementById("adminlogin").style.display = "block";
		document.getElementById("adminlogin").style.marginLeft = "16%";
		document.getElementById("openbtn").style.display = "none";
		document.getElementById("doctorlogin").style.display = "none";
		document.getElementById("doctorlogin").style.marginLeft = "0";
		document.getElementById("patientlogin").style.display = "none";
		document.getElementById("patientlogin").style.marginLeft = "0";
		
	}
	
	
	function closeAdminlogin() {
		document.getElementById("adminlogin").style.display = "none";
		
		document.getElementById("openbtn").style.display = "block";
		document.getElementById("mySidebar").style.width = "0";
		document.getElementById("main").style.marginLeft= "0";
		document.getElementById("head").style.marginLeft= "0";
	   
	}
	function openDoctorlogin() {
		document.getElementById("doctorlogin").style.display = "block";
		document.getElementById("doctorlogin").style.marginLeft = "16%";
		document.getElementById("openbtn").style.display = "none";
		document.getElementById("adminlogin").style.display = "none";
		document.getElementById("adminlogin").style.marginLeft = "0";
		document.getElementById("patientlogin").style.display = "none";
		document.getElementById("patientlogin").style.marginLeft = "0";
	}
	
	
	function closeDoctorlogin() {
		document.getElementById("doctorlogin").style.display = "none";
		document.getElementById("doctorlogin").style.marginLeft = "0";
		document.getElementById("openbtn").style.display = "block";
		document.getElementById("mySidebar").style.width = "0";
		document.getElementById("main").style.marginLeft= "0";
		document.getElementById("head").style.marginLeft= "0";
	   
	}
	function openPatientlogin() {
		document.getElementById("patientlogin").style.display = "block";
		document.getElementById("patientlogin").style.marginLeft = "16%";
		document.getElementById("openbtn").style.display = "none";
		document.getElementById("adminlogin").style.display = "none";
		document.getElementById("adminlogin").style.marginLeft = "0";
		document.getElementById("doctorlogin").style.display = "none";
		document.getElementById("doctorlogin").style.marginLeft = "0";
		
	}
	
	
	function closePatientlogin() {
		document.getElementById("patientlogin").style.display = "none";
		document.getElementById("patientlogin").style.marginLeft = "0";
		document.getElementById("openbtn").style.display = "block";
		document.getElementById("mySidebar").style.width = "0";
		document.getElementById("main").style.marginLeft= "0";
		document.getElementById("head").style.marginLeft= "0";
	   
	}
	
	function openNav() {
		document.getElementById("mySidebar").style.width = "16%";
		document.getElementById("main").style.marginLeft = "16%";
		document.getElementById("head").style.marginLeft = "16%";
		document.getElementById("ss").style.marginLeft = "16%";
	}

	function closeNav() {
		document.getElementById("mySidebar").style.width = "0";
		document.getElementById("main").style.marginLeft= "0";
		document.getElementById("head").style.marginLeft= "0";
		document.getElementById("ss").style.marginLeft= "0";
		document.getElementById("openbtn").style.display = "block";
		document.getElementById("adminlogin").style.display = "none";
		document.getElementById("adminlogin").style.marginLeft = "0";
		document.getElementById("doctorlogin").style.display = "none";
		document.getElementById("doctorlogin").style.marginLeft = "0";
		document.getElementById("patientlogin").style.display = "none";
		document.getElementById("patientlogin").style.marginLeft = "0";
	}
	</script>
	
</body>
	
</html>