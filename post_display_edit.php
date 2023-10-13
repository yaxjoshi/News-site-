<?php
session_start();
// include 'sidebar.php';
include 'confing.php';

$eid = $_GET['eid'];

$sql1 = "select * from `post` 
LEFT JOIN `news-category` ON `post`.category = `news-category`.category_id
LEFT JOIN `admin_login` ON `post`.author = `admin_login`.admin_id
where `post`.post_id = {$eid}";

$result = mysqli_query($con,$sql1);

$row = mysqli_fetch_array($result);

if($_POST){

        if($row['category'] == $row['category_id']){
                $selected = "selected";
        }else{
                $selected = "";
        }
       
    $title = mysqli_real_escape_string($con,$_POST['post_title']);
    $description = mysqli_real_escape_string($con,$_POST['post_description']);
    $category = mysqli_real_escape_string($con,$_POST['category']);
    $date = date("Y-m-d");
    $author = $_SESSION["admin_id"];
    $file_name = $_FILES['FileToUpload']['name'];

    $update = mysqli_query($con,"update `post` set post_title='{$title}',post_description='{$description}',category='{$category}',post_date='{$date}',post_img='{$file_name}' where post_id='{$eid}'");

    if($update){
      
        echo "<script>alert('Recored Update');</script>";
    }
}
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
							<form action="#" method="POST" enctype="multipart/form-data">

                            <div class="form-group"> 
                                    <label for="exampleInputEmail1">Post Title</label> 
                                    <input type="text" class="form-control" name="post_title" value = "<?php echo $row['post_title'] ?>" id="exampleInputEmail1" placeholder="Add Post Title" autocomplete="off"> 
                            </div> 

                            <div class="form-group"> 
                                    <label for="exampleInputEmail1">Post Descriptions</label> 
                                    <input type="text" class="form-control" name="post_description" value = "<?php echo $row['post_description'] ?>" id="exampleInputEmail1" placeholder="Add Post Descriptions" autocomplete="off"> 
                            </div> 

                            <div class="form-group"> 
                                    <label for="exampleInputEmail1">Post Category</label> 
                                    <!-- <input type="text" class="form-control" name="category" id="exampleInputEmail1" placeholder="Add Post Category" autocomplete="off">  -->
                                    <select name='category' >
                              <?php 
                              $post = mysqli_query($con,"select * from `news-category`");

                              
                              while($data = mysqli_fetch_array($post)){
                                echo "<option value='{$data['category_id']}'>{$data['category_name']}</option>";
                              }
                              
                              ?>
                              </select>

                            </div> 

                            <div class="form-group"> 
                                    <label for="exampleInputEmail1">Post Images</label> 
                                    <input type="file" class="form-control" name="FileToUpload" value="" id="exampleInputEmail1" placeholder="Add Post Images" autocomplete="off"> 
                                    <?php echo $row['post_img'] ?>
                                    <img src="upload/<?php echo $row['post_img'] ?>" height="150px" alt="">
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