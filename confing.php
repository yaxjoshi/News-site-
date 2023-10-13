<?php
$con = new mysqli("localhost","root","","news-site");

if(!$con){
    die(mysqli_error($con));
}
?>