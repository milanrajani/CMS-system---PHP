<?php include 'includes/db.php';?>
<?php include 'includes/header.php';?>

    <!-- Navigation -->
<?php  include 'includes/nav.php'; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php

 

 
       
        $query = "SELECT * FROM posts ";
        $select_all_posts_query = mysqli_query($connection, $query);
        
        while($row = mysqli_fetch_assoc( $select_all_posts_query)){
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_content = substr($row['post_content'],0,50);
            $post_tags = $row['post_tags'];
            $post_status = $row['post_status'];


            if($post_status == 'published') {
       ?>

      

       <!-- First Blog Post -->
       <h2>
           <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
       </h2>
       <p class="lead">
           <!-- by <a href="index.php"><?php echo $post_author ?></</a> -->
           by <a href="author_posts.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_author ?>"><?php echo $post_author ?></</a>
       </p>
       <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></</p>
       
       <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
   
       <p><?php echo $post_content ?></</p>
       <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

       <hr>



       <?php } }?>

</div>


<?php include 'includes/sidebar.php' ?>
</div>
 

  


        <hr>

     
<?php include 'includes/footer.php'?>
