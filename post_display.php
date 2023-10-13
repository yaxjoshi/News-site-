<?php
include 'sidebar.php';
include 'confing.php';
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
							<h4>Upload POST</h4>
						</div>
						<div class="form-body">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text text-danger">Sr No.</th>
                                        <th class="text text-danger">Post Title.</th>
                                        <th class="text text-danger">Post Category.</th>
                                        <th class="text text-danger">Post Date.</th>
                                        <th class="text text-danger">Post Author.</th>
                                        <th class="text text-danger">Action</th>
                                    </tr>
                                </thead>
                                <?php

                                $limit = 5;
                                if(isset($_GET['page'])){
                                    $page = $_GET['page'];
                                }else{
                                    $page = '1';
                                }

                                $offset = ($page - 1) * $limit;

                                // check admin conditions

                                if($_SESSION["admin_type"] == 1) {
                                    // this query is admin and show all post in admin
                                    $sql1 = "select * from `post` 
                                    LEFT JOIN `news-category` ON post.category = `news-category`.category_id
                                    LEFT JOIN `admin_login` ON `post`.author = `admin_login`.admin_id
                                    ORDER BY `post`.post_id DESC LIMIT {$offset},{$limit}";

                                }

                                elseif($_SESSION["admin_type"] == 0){
                                    $sql1 = "select * from `post` 
                                    LEFT JOIN `news-category` ON post.category = `news-category`.category_id
                                    LEFT JOIN `admin_login` ON `post`.author = `admin_login`.admin_id
                                    where `post`.author = {$_SESSION['admin_id']}
                                    ORDER BY `post`.post_id DESC LIMIT {$offset},{$limit}";

                                }
                                
                                
                               
                                $result = mysqli_query($con,$sql1);

                                if($result){
                                    while($row = mysqli_fetch_array($result)){
                                        echo '<tr>';
                                        echo "<th class='text text-primary'>{$row['post_id']}</th>";
                                        echo "<th>{$row['post_title']}</th>";
                                        echo "<th>{$row['category_name']}</th>";
                                        echo "<th>{$row['post_date']}</th>";
                                        echo "<th class='text text-success'>{$row['admin_name']}</th>";
                                        echo "<th><a class='text text-warning' href='post_display_edit.php?eid={$row['post_id']}'>Edit| </a>
                                        <a class='text text-danger' href='post_display_delete.php?did={$row['post_id']}&catid={$row['category']}'>Delete</a></th>";
                                        echo '</tr>';
                                    }
                                }


                                
                                ?>
                            </table>

                            <?php
                            $query = "select * from `post`";
                            $find = mysqli_query($con,$query);

                            if($row = mysqli_num_rows($find) > 0){
                                $total_recored = mysqli_num_rows($find);
                                // $limit = 2;
                                $total_page = ceil($total_recored/$limit);

                          echo '<ul class="pagination admin-pagination">';

                          for($i=1; $i <= $total_page; $i++){

                            if($i== $page){
                                $active ='active';
                            }else{
                                $active = '';
                            }
                            echo '<li class="'.$active.'"><a href="post_display.php?page='.$i.'">'.$i.'</a></li>';
                          }
                           
                            }
                            ?>

                           

                           <!-- <ul class="pagination admin-pagination">
                           <li><a href="">2</a></li>
                           <li><a href="">3</a></li>
                        </ul> -->
                            
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