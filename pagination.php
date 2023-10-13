

<?php

$limit = 3;

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = '1';
}

$offset = ($page - 1) * $limit;


$sql = "select * from tbl_name LIMIT {$offset},{$limit}";
$result = mysqli_query($con,$sql);

if($row = mysqli_num_rows($result)> 0 ){
    $total_recored = mysqli_num_rows($result);
    // $limit = 3;
    $total_page = $totaal_recored/$limit;

    echo '<ul class="pagination admin-pagination">';

    for($i = 1; $i <= $total_page; $i++){

        if($i == $page){
            $active = 'active';
        }else{
            $active = 'danger';
        }
        echo '<li class="'.$active.'"><a href="pagination.php?page='.$i.'">'.$i.'</a></li>';
    }




}
?>


<html>
        <li><a href="">1</a></li>
        <li><a href="">2</a></li>
        <li><a href="">3</a></li>
    </ul>
</html>