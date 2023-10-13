<?php
include 'confing.php';
session_start();
if(isset($_SESSION["admin_email"])){
	header('location:dashbord.php');
}

if(isset($_POST['save'])){
	$email = $_POST['admin_email'];
	$pwd = $_POST['admin_password'];
	// $role = $_POST['admin_type'];

	$sql = mysqli_query($con,"select * from `admin_login` where admin_email='{$email}' && admin_password='{$pwd}'") or die(mysqli_error($con));
	$num = mysqli_num_rows($sql);
	$row = mysqli_fetch_array($sql);

	if($num > 0){
		$_SESSION["admin_id"] = $row['admin_id'];
		$_SESSION["admin_name"] = $row['admin_name'];
		$_SESSION["admin_email"] = $row['admin_email'];
		$_SESSION["admin_type"] = $row['admin_type'];

		header('location:dashbord.php');
	}else{
		echo "error";
	}
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>|E-Signup|</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS -->

 <!-- side nav css file -->
 <link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
 <!-- side nav css file -->
 
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->

</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
	
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h2 class="title1">News Site</h2>
				<div class="sign-up-row widget-shadow">
					<h5>Login Your Email & Password :</h5>
				<form action="#" method="POST">
					<div class="sign-u">
								<!-- <input type="text" name="firstname" placeholder="First Name" required="" name="admin_fname"> -->
						<div class="clearfix"> </div>
					</div>
					
					<div class="sign-u">
						<label for="">E-mail:</label>
								<input type="email" placeholder="Email Address" required="" name="admin_email">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<label for="">Password:</label>
								<input type="password" placeholder="Password" required="" name="admin_password">
						<div class="clearfix"> </div>
					</div>
<!-- 					
						<div class="clearfix"> </div>
					</div>
					<h6>Login Information :</h6> -->
					
					<!-- <div class="sign-u">
								<input type="password" placeholder="Confirm Password" required="">
						</div> -->
						<div class="clearfix"> </div>
					<div class="sub_home">
							<input type="submit" value="Submit" name="save">
						<div class="clearfix"> </div>
					</div>
					<!-- <div class="registration">
						Already Registered.
						<a class="" href="index.php">
							Login
						</a>
					</div> -->
				</form>
				</div>
			</div>
		</div>
		<!--footer-->
		<div class="footer">
		   <p>&copy; 2018 Glance Design Dashboard. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
		</div>
        <!--//footer-->
	</div>
	
	<!-- side nav js -->
	<script src='js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
	
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"> </script>
	
</body>
</html>