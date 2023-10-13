<?php
include 'confing.php';

$did = $_GET['did'];
$cat_id = $_GET['catid'];

$sql = "DELETE from `post` WHERE post_id='{$did}';";
$sql .= "UPDATE `news-category` SET post = post - 1 WHERE category_id = {$cat_id}";

if(mysqli_multi_query($con,$sql)){
    header('location:post_display.php');
}else{
    echo "Query Filed:";
}
?>