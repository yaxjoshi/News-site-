<?php 

include 'confing.php';
include 'sidebar.php';


if($_SESSION["admin_type"] == 0) {
    header('location:post.php');
}

$eid = $_GET['eid'];

$eidquery = mysqli_query($con,"select * from `admin_login` where admin_id = '{$eid}'");
$row = mysqli_fetch_array($eidquery);

if($_POST){
    $name = $_POST['admin_name'];
    $surname = $_POST['admin_surname'];
    $email = $_POST['admin_email'];
    $pwd = $_POST['admin_password'];
    $mobile = $_POST['admin_contact'];
    $role = $_POST['admin_type'];

    $update = mysqli_query($con,"update `admin_login` set admin_name='{$name}', admin_surname = '{$surname}',admin_email='{$email}',admin_password='{$pwd}',admin_contact='{$mobile}',admin_type='{$role}' where admin_id='{$eid}'");

    header('location:all_user.php');
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
<title>|News-Add User|</title>
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
							<h4>Add User</h4>
						</div>
						<div class="form-body">
							<form method="POST">
                                 <div class="form-group"> 
                                    <label for="exampleInputEmail1">Admin Name</label> 
                                    <input type="text" class="form-control" name="admin_name" value="<?php echo $row['admin_name']?>" id="exampleInputEmail1" placeholder="Add Admin First Name" autocomplete="off"> 
                                </div> 
                                 
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Admin Surname</label> 
                                    <input type="text" class="form-control" name="admin_surname" value="<?php echo $row['admin_surname']?>" id="exampleInputEmail1" placeholder=" Add Admin Surname" autocomplete="off"> 
                                </div>

                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Admin email</label> 
                                    <input type="text" class="form-control" name="admin_email" value="<?php echo $row['admin_email']?>" id="exampleInputEmail1" placeholder=" Add Admin Email" autocomplete="off"> 
                                </div>

                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Admin Password</label> 
                                    <input type="text" class="form-control" name="admin_password" value="<?php echo $row['admin_password']?>" id="exampleInputEmail1" placeholder=" Add Admin Password" autocomplete="off"> 
                                </div>

                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Admin Contact</label> 
                                    <input type="text" class="form-control" name="admin_contact" value="<?php echo $row['admin_contact']?>" id="exampleInputEmail1" placeholder=" Add Admin Contact" autocomplete="off"> 
                                </div>

                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Admin Role</label> 
                                    <select name="admin_type" id="" value="<?php echo $row['admin_type']?>">
                                    <option value="">Select Admin Role</option>
                                        <option value="1">Admin</option>
                                        <option value="0">Normal User</option>
                                    </select>
                                </div>
                                 
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