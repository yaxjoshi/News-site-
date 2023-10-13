<?php
include 'confing.php';
include 'sidebar.php';

if(!isset($_SESSION['admin_name'])){
    echo "<script>alert('Please Login Your Account and After Change Your Password')</script>";
    header ('location:index.php');
}

if($_POST){
    $opass = $_POST['opass'];
    $npass = $_POST['npass'];
    $cpass = $_POST['cpass'];

	// fetch old password in a database 
	$oldpass = mysqli_query($con,"select admin_password from `admin_login` where admin_id ='{$_SESSION["admin_id"]}'") or die(mysqli_error($con));
	$find = mysqli_fetch_array($oldpass);
	if($find['admin_password'] == $oldpass);


}
?>



<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Category</title>
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
			<div class="main-page">
				<div class="forms">
					<h2 class="title1">Forms</h2>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Change Password</h4>
						</div>
						<div class="form-body">
							<form method="POST">

                            <label for="">Old Password:</label> <br>
                            <input type="password" class="form-control" name="opass"  id="exampleInputEmail1" placeholder="Enter Old Password" autocomplete="off"> 

                            <label for="">New Password:</label> <br>
                            <input type="password" class="form-control" name="npass"  id="exampleInputEmail1" placeholder="Enter New Password" autocomplete="off"> 

                            <label for="">Confirem Password:</label> <br>
                            <input type="password" class="form-control" name="cpass"  id="exampleInputEmail1" placeholder="Enter Confirem Password" autocomplete="off"> 



                                 
                                <button type="submit" class="btn btn-default" name="save">Submit</button> 
                            </form> 
						</div>
					</div>
								
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		<div class="footer">
		   <p>&copy; 2018 Glance Design Dashboard. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
	   </div>
        <!--//footer-->
	</div>
	
	
</body>
</html>