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
                if(isset($_GET['p_id'])){

                    $the_post_id = $_GET['p_id'];

            
          $view_query = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = $the_post_id ";
          $send_query = mysqli_query($connection, $view_query);

          if(!$send_query){
            die("Query failed");
          }
 
       
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
        $select_all_posts_query = mysqli_query($connection, $query);
        
        while($row = mysqli_fetch_assoc( $select_all_posts_query)) {
            $post_title = $row['post_title'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            // $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags'];


       ?>
 
       <!-- First Blog Post -->
       <h2>
           <a href="#"><?php echo $post_title ?></a>
       </h2>
       <p class="lead">
           by <a href="index.php"><?php echo $post_author ?></</a>
       </p>
       <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></</p>
    
   
       <p><?php echo $post_content ?></</p>
      
 
       <hr>
 
       <?php }    
    
    
    } else{
        header("Location: index.php");
    }
    
    
    ?>

                  <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>


                <?php
                if(isset($_POST['create_comment'])) {

                    $the_post_id = $_GET['p_id'];
                    
                 
                    $comment_author = $_POST['comment_author'];
                    $comment_email = $_POST['comment_email'];
            
                    if(!empty($comment_author) && !empty($comment_email)){
 
             
                        $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_status,comment_date)";
            
                        $query .= "VALUES ($the_post_id,'{$comment_author}', '{$comment_email}', 'unapproved',now())";
            
                        $create_comment_query = mysqli_query($connection, $query);
            
                        if (!$create_comment_query) {
                            die('QUERY FAILED' . mysqli_error($connection));
             
            
                        }
            
            
                    }else{
                        echo "<script>alert('Fields cannot be empty')</script>";
                    }
                $query = "UPDATE posts SET post_comment_count = post_comment_count  + 1 ";
                $query .= "WHERE post_id = $the_post_id";
                $update_the_query = mysqli_query($connection, $query);
                       
            
                } 
          
                ?>
 
 
                <!-- Comment -->
                <div class="well">
                    <h4>Leave a comment:</h4>
                    <form action="" method="post" class="form" require>
                        <div class="form-group">
                            <input type="email"  class="form-control" name="comment_email" placeholder="Email" required>  
                        </div>
                        <div class="form-group">
                            <textarea  id=""  rows="3"  class="form-control"  name="comment_author" placeholder="leave a query" required></textarea>
                        </div>
                        
                        <button class="btn btn-primary" name="create_comment">Submit</button>
                    </form>
                </div>
 
                <?php
                
                $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
                $query .= "AND comment_status = 'approve' ";
                $query .= "ORDER BY comment_id DESC ";
                $select_comment_query = mysqli_query($connection, $query);

                if(!$select_comment_query){

                    die('Query Failed' . mysqli_error($connection));
                }
                while($row = mysqli_fetch_array($select_comment_query)){
                    $comment_date = $row['comment_date'];
                    $comment_author = $row['comment_author'];
                   
                    ?>


 
                    <div class="media mt-3">
                        <a href="#" class="pull-left">
                        <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Error" class="media-body" style="border-radius: 50%;width:50px">
                        </a>
                        <div class="media-body">
                           
                            <small><?php echo $comment_date; ?></small>
                            <h4 class="media-heading"> <?php echo $comment_author; ?>
                            </h4>
                            
                        </div>
                    </div>

 
              <?php  }?>
 

</div>


<?php include 'includes/sidebar.php' ?>
</div>
     
<?php include 'includes/footer.php'?>
