<?php 
include 'confing.php';

include 'sidebar.php';

if($_SESSION["admin_type"] == 0) {
    header('location:post.php');
}

if(isset($_POST['save'])){
	$name = $_POST['category_name'];

	$sql = "insert into `news-category` (category_name) values ('$name')";
	$result = mysqli_query($con,$sql);

	if($result){
		echo "<script>alert('Your Category Is Add');</script>";
	}else{
		echo "error";
	}
}
?>


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
							<h4>Category</h4>
						</div>
						<div class="form-body">
							<table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>CATEGORY NAME</th>
                                        <th>No. OF POST</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php
                               include 'confing.php';

							//    $eid = $_GET['eid'];

							

							   if(isset($_GET['did'])){
								$did = $_GET['did'];
								$delete = mysqli_query($con,"delete from `news-category` where category_id='$did'");
							   }

								$limit = 2;

								if(isset($_GET['page'])){
									$page = $_GET['page'];
								}else{
									$page = '1';
								}

								$offset = ($page - 1)*$limit;

                                $sql = "select * from `news-category` LIMIT {$offset},{$limit}";
                                $result = mysqli_query($con,$sql);

                                if($result){
                                    while($row = mysqli_fetch_array($result)){
                                        echo '<tr>';
                                        echo "<th> {$row['category_id']} </th>";
                                        echo "<th class='text text-success'>{$row['category_name']}</th>";
                                        echo "<th>{$row['post']}</th>";
										echo "<th><a href= 'all_category_edit.php?eid={$row['category_id']}'>Edit|</a>
										<a class='text text-danger' href='?did={$row['category_id']}'>Delete</a></th>";
                                        echo '</tr>';
                                    }
                                }
                                ?>
                            </table>

							<?php
							$sql1 = "select * from `news-category`";
							$result1 = mysqli_query($con,$sql1);

							if($row = mysqli_num_rows($result1) > 0){
								$total_recored = mysqli_num_rows($result1);
								$total_page = ceil($total_recored/$limit);
							}

							echo '<ul class="pagination admin-pagination">';

							for($i = 1; $i <= $total_page; $i++){

								if($i == $page){
									$active = 'active';
								}else{
									$active = '';
								}
								echo '<li class="'.$active.'"><a href="all_category.php?page='.$i.'">'.$i.'</a></li>';
								
							}
							
							?>

							</ul>
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