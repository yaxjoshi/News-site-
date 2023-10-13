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
<title>News</title>
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
					<h2 class="title1">News</h2>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>News Update</h4>
						</div>
						<div class="form-body">
							<form method="POST">

    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <div class="post-container">
                      <?php

                        /* Calculate Offset Code */
                        $limit = 3;
                        if(isset($_GET['page'])){
                          $page = $_GET['page'];
                        }else{
                          $page = 1;
                        }
                        $offset = ($page - 1) * $limit;

                        $sql = "select * from `post` 
                        LEFT JOIN `news-category` ON post.category = `news-category`.category_id
                        LEFT JOIN `admin_login` ON `post`.author = `admin_login`.admin_id
                        ORDER BY `post`.post_id DESC LIMIT {$offset},{$limit}";

                        $result = mysqli_query($con, $sql) or die("Query Failed.");
                        if(mysqli_num_rows($result) > 0){
                          while($row = mysqli_fetch_assoc($result)) {
                      ?>
                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                  <a class="post-img"  href="single.php?id=<?php echo $row['post_id']; ?>"><img style="width:150px;" src="upload/<?php echo $row['post_img']; ?>" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                  <div class="inner-content clearfix">
                                      <h3><a href='single.php?id=<?php echo $row['post_id']; ?>'><?php echo $row['post_title']; ?></a></h3>
                                      <div class="post-information">
                                          <span>
                                              <i class="fa fa-tags" aria-hidden="true"></i>
                                              <a href='category.php?cid=<?php echo $row['category']; ?>'><?php echo $row['category_name']; ?></a>
                                          </span>
                                          <span>
                                              <i class="fa fa-user" aria-hidden="true"></i>
                                              <a href='author.php?aid=<?php echo $row['author']; ?>'><?php echo $row['admin_name']; ?></a>
                                          </span>
                                          <span>
                                              <i class="fa fa-calendar" aria-hidden="true"></i>
                                              <?php echo $row['post_date']; ?>
                                          </span>
                                      </div>
                                      <p class="description">
                                          <?php echo substr($row['post_description'],0,130) . "..."; ?>
                                      </p>
                                      <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id']?>'>read more</a>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <?php
                          }
                        }else{
                          echo "<h2>No Record Found.</h2>";
                        }

                        // show pagination
                        $sql1 = "SELECT * FROM post";
                        $result1 = mysqli_query($con, $sql1) or die("Query Failed.");

                        if(mysqli_num_rows($result1) > 0){

                          $total_records = mysqli_num_rows($result1);

                          $total_page = ceil($total_records / $limit);

                          echo '<ul class="pagination admin-pagination">';
                          if($page > 1){
                            echo '<li><a href="news_body.php?page='.($page - 1).'">Prev</a></li>';
                          }
                          for($i = 1; $i <= $total_page; $i++){
                            if($i == $page){
                              $active = "active";
                            }else{
                              $active = "";
                            }
                            echo '<li class="'.$active.'"><a href="news_body.php?page='.$i.'">'.$i.'</a></li>';
                          }
                          if($total_page > $page){
                            echo '<li><a href="news_body.php?page='.($page + 1).'">Next</a></li>';
                          }

                          echo '</ul>';
                        }
                        ?>
                    </div><!-- /post-container -->
                </div>
            </div>
        </div>
    </div>

                                 
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