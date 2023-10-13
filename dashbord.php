<?php
include 'confing.php';
include 'sidebar.php';

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
<title>|News-Dashbord|</title>
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
<div id="page-wrapper">
			<div class="main-page">
			<div class="col_3">
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-dollar icon-rounded"></i>
                    <div class="stats">
                      <?php
                     $query = mysqli_query($con,"SELECT COUNT(category_id) as total_category from `news-category`");
                      ?>
                      <?php
                      while($row = mysqli_fetch_array($query)){
                     ?> 
                    <h5><strong><?php echo $row['total_category']?></strong></h5>
                     <?php
                      }
                      ?>
                      <span>Total Category</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-laptop user1 icon-rounded"></i>
                    <div class="stats">
                      <?php
                    if($_SESSION["admin_type"] == 1) {
                                    // this query is admin and show all post in admin
                                    $sql1 = "select count(post_id) as total_post from `post` 
                                    LEFT JOIN `news-category` ON post.category = `news-category`.category_id
                                    LEFT JOIN `admin_login` ON `post`.author = `admin_login`.admin_id
                                    ORDER BY `post`.post_id DESC ";

                                }

                                elseif($_SESSION["admin_type"] == 0){
                                  $sql1 = "select count(post_id) as total_post from `post` 
                                  LEFT JOIN `news-category` ON post.category = `news-category`.category_id
                                  LEFT JOIN `admin_login` ON `post`.author = `admin_login`.admin_id
                                  where `post`.author = {$_SESSION['admin_id']}
                                  ORDER BY `post`.post_id DESC ";
                                }
                                $result = mysqli_query($con,$sql1);

                                if($result){

                                  while($row = mysqli_fetch_array($result)){

                                  ?>
                    <h5><strong><?php echo $row['total_post']?></strong></h5>

                            <?php
                            
                          }
                              
                        }
                    ?>  
                      <span>Active Post</span>
                    </div>
                </div>
        	</div>
        	<!-- <div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-money user2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>$1012</strong></h5>
                      <span>Expenses</span>
                    </div>
                </div>
        	</div> -->
          <?php
          if($_SESSION['admin_type'] == 1){
          ?>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
            <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
                    <div class="stats">
                      <?php
                      $normal = mysqli_query($con,"SELECT COUNT(admin_type) as normal_user FROM `admin_login` WHERE admin_type = '0'");
                      ?>
                      <?php
                      while($row = mysqli_fetch_array($normal)){
                      ?>
                      <h5><strong><?php echo $row['normal_user']?></strong></h5>
                      <?php
                      }
                      ?>
                      <span>Normal User</span>
                    </div>
                </div>
        	 </div>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
                    <div class="stats">
                      <?php 
                      $adminq = mysqli_query($con,"SELECT COUNT(admin_type) as admin_user FROM `admin_login` WHERE admin_type = '1'");
                      ?>
                      <?php
                      while($row = mysqli_fetch_array($adminq)){
                      ?>
                      
                      <h5><strong><?php echo $row['admin_user']?></strong></h5>
                    <?php
                    }
                    ?>
                      <span>Admin User</span>
                    </div>
                </div>
                <?php
                  }
                ?>
        	 </div>
        	<div class="clearfix"> </div>
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