<?php
include 'sidebar.php';
include 'confing.php';
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Add New Post</title>
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
							<h4>Add New Post</h4>
						</div>
						<div class="form-body">
							<form action="save_post.php" method="POST" enctype="multipart/form-data">

                            <div class="form-group"> 
                                    <label for="exampleInputEmail1">Post Title</label> 
                                    <input type="text" class="form-control" name="post_title" id="exampleInputEmail1" placeholder="Add Post Title" autocomplete="off"> 
                            </div> 

                            <div class="form-group"> 
                                    <label for="exampleInputEmail1">Post Descriptions</label> 
                                    <input type="text" class="form-control" name="post_description" id="exampleInputEmail1" placeholder="Add Post Descriptions" autocomplete="off"> 
                            </div> 

                            <div class="form-group"> 
                                    <label for="exampleInputEmail1">Post Category</label> 
                                    <!-- <input type="text" class="form-control" name="category" id="exampleInputEmail1" placeholder="Add Post Category" autocomplete="off">  -->
                              <?php 
                              $post = mysqli_query($con,"select * from `news-category`");

                              echo "<select name='category'>";
                              echo "<option>Select News</option>";

                              while($data = mysqli_fetch_array($post)){
                                echo "<option value='{$data['category_id']}'>{$data['category_name']}</option>";
                              }
                              echo "</select>";
                              ?>

                            </div> 

                            <div class="form-group"> 
                                    <label for="exampleInputEmail1">Post Images</label> 
                                    <input type="file" class="form-control" name="FileToUpload" id="exampleInputEmail1" placeholder="Add Post Images" autocomplete="off"> 
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
		<?php
              include 'footer.php';
               ?>
	</div>
	
	
</body>
</html>
