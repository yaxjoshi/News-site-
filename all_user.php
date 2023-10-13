<?php 
include 'confing.php';
require 'sidebar.php';

if($_SESSION["admin_type"] == 0) {
    header('location:post.php');
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
							<h4>All User</h4>
						</div>
						<div class="form-body">

                        <table class="table table-boredered">
                            <thead>
                                <tr>
                                    <th>Admin Id</th>
                                    <th>Admin Name</th>
                                    <th>Admin Surname</th>
                                    <th>Admin E-mail</th>
                                    <th>Admin Password</th>
                                    <th>Admin Contact</th>
                                    <th>Admin Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <?php

                            if(isset($_GET['did'])){
                                $did = $_GET['did'];
                                $delete = mysqli_query($con, "delete from `admin_login` where admin_id='{$did}'");
                            }

                            $sqlq = "select * from `admin_login`";
                            $result = mysqli_query($con,$sqlq);

                            if($result){
                                while($row = mysqli_fetch_array($result)){
                                    echo '<tr>';

                                    echo "<th>{$row['admin_id']}</th>";
                                    echo "<th>{$row['admin_name']}</th>";
                                    echo "<th>{$row['admin_surname']}</th>";
                                    echo "<th>{$row['admin_email']}</th>";
                                    echo "<th>{$row['admin_password']}</th>";
                                    echo "<th>{$row['admin_contact']}</th>";
                                    echo "<th>{$row['admin_type']}</th>";

                                    echo "<th><a href='all_user.php?did={$row['admin_id']}'>Delete |</a>
                                    <a href ='all_user_edit.php?eid={$row['admin_id']}'>Edit</a></th>";
                                    

                                    echo '</tr>';
                                }
                            }
                            ?>

                        </table>
							
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