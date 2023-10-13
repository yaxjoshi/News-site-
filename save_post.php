<?php
include 'confing.php';
session_start();

// img include multipale step please carefully read 

if(isset($_FILES['FileToUpload'])){
    // this error variable is work from error in this array functions
    $errors = array();

    // file upload 
     $file_name = $_FILES['FileToUpload']['name'];

    //  file size 
    $file_size = $_FILES['FileToUpload']['size'];

    // file temp_name save in tmp_name
    $file_tmp = $_FILES['FileToUpload']['tmp_name'];

    // file type 
    $file_type = $_FILES['FileToUpload']['type'];

    // file extenstions like jpg,png...etc this function is use for user upload img file not a video ya anywhere 
    $file_ext = strtolower(end(explode('.',$file_name)));
    // create extension for use only this file...
    $extensions = array("jpeg","png","jpg");

    // for user use another file can after massage show for you only use $extensions file okk...

    if(in_array($file_ext,$extensions) === false){
        $errors[] = "This extensions is not allowed, Please Use For JPG OR PNG FILE";
    }

    // after use file size functio in 2mb and file is byte but kb 1024 bytes or mb under 1024 kbs  1024byts*1024mb = 1,048,576 for this 1mb in byts *2 mb mate 
    if($file_size > 2097152){
        $errors[] = "Please Uploads File In 2mb and Lower.";
    }

    // alll parameter is right and no errors to after uploads file...

    if(empty($errors) == true){
        move_uploaded_file($file_tmp,"upload/".$file_name);
    }else{
        print_r($errors);
        die();
    }

}

$title = mysqli_real_escape_string($con,$_POST['post_title']);
$description = mysqli_real_escape_string($con,$_POST['post_description']);
$category = mysqli_real_escape_string($con,$_POST['category']);
$date = date("Y-m-d");
$author = $_SESSION["admin_id"];

$sql = "INSERT INTO `post`(post_title,post_description,category,post_date,author,post_img)
VALUES('{$title}','{$description}',{$category},'{$date}',{$author},'{$file_name}');";
$sql .= "UPDATE `news-category` SET post = post + 1 WHERE category_id = {$category}";


if(mysqli_multi_query($con, $sql)){
    header('location:add_post.php');
}else{
   echo  "<div class='alert alert-danger'>Query Failed.</div>";
}
?>