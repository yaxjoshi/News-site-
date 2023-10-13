<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="post-container">
                    <?php
                    include 'confing.php';
                    $post_id = $_GET['id'];

                    $sql = "select * from `post` 
                    LEFT JOIN `news-category` ON post.category = `news-category`.category_id
                    LEFT JOIN `admin_login` ON `post`.author = `admin_login`.admin_id
                    WHERE `post`.post_id = '{$post_id}'";
                    $result = mysqli_query($con,$sql);
                   if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <div class="post-contact single-post">
                       <h3> <?php echo $row['post_title']; ?></h3>
                </div>
                <div class="post-information">
                <i class="fa fa-tags" aria-hidden="true"></i>

                </div>
                    <?php
                   
                }
            }
?>
                    
                </div>
            </div>
        </div>
    </div>

</div>