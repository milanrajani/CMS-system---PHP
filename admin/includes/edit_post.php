<?php
if(isset($_GET['p_id'])){
      $the_post_id = $_GET['p_id'];

}


$query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
$select_posts_by_id = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_posts_by_id)){
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_tags = $row['post_tags'];
    $post_content = $row['post_content'];
    $post_date = $row['post_date'];

}

if(isset($_POST['update_post'])){

    $post_author = $_POST['post_author'];
    $post_title = $_POST['post_title']; 
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];


   $query = "UPDATE posts SET ";
   $query .="post_title = '{$post_title}', ";
   $query .="post_author = '{$post_author}', ";
   $query .="post_category_id = '{$post_category_id}', ";
   $query .="post_date = now(), ";
   $query .="post_status = '{$post_status}', ";
   $query .="post_tags = '{$post_tags}', ";
   $query .="post_content = '{$post_content}' ";
   $query .= "WHERE post_id = {$the_post_id} ";

   $update_post = mysqli_query($connection, $query);

   // confrimQuery($update_post);
   if(!$update_post){
      die("QUERY FAILED" . mysqli_error($connection));
   }

}

?>


 


<form action="" method="post" enctype="multiple/form-data">


 <div class="form-group">
    <label for="post_title">Post Title</label>
    <input type="text" value="<?php echo $post_title?>" class="form-control" name="post_title" id="">
 </div>



 <div class="form-group">
   <select name="post_category" id="">

<?php
 $query = "SELECT * from category";
 $select_category = mysqli_query($connection, $query);

 confirmQuery($select_category);

 while($row = mysqli_fetch_assoc($select_category)){
   $cat_id = $row['cat_id'];
   $cat_title = $row['cat_title'];

 echo "<option value='{$cat_id}'>{$cat_title}</option>";


 }





?>
 
 
   </select>
 </div>



 <div class="form-group">
    <label for="post_category_id">Post category Id</label>
    <input type="text" value="<?php echo $post_category_id?>"  class="form-control" name="post_category_id" id="">
 </div>

 <div class="form-group">
    <label for="post_author">Post Author</label> 
    <input type="text" value="<?php echo $post_author?>" class="form-control" name="post_author" id="">
 </div>
 <div class="form-group">
   
    <select name="post_status" id="">
    <option value='<?php echo $post_status ?>'><?php echo $post_status; ?></option>
   <?php
   if($post_status == 'published'){

      echo "<option vale='draft'>Draft</option>";
   } else{
         echo "<option vale='published'>Published</option>";
   }
   
   ?>
    </select>
 </div>


<!-- 
 <div class="form-group">
    <label for="post_status">Post Status</label>
    <input type="text"value="<?php echo $post_status?>"  class="form-control" name="post_status" id="">
 </div> -->
 <div class="form-group">
    <label for="post_title">Post Title</label>
    <input type="text"value="<?php echo $post_title?>"  class="form-control" name="post_title" id="">
 </div>
  
 <!-- <div class="form-group">
    <label for="image">Post image</label>
    <input type="file" class="form-control" name="image" id="">
 </div> -->
 <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" value="<?php echo $post_tags?>"  class="form-control" name="post_tags" id="">
 </div>
 <div class="form-group">
    <label for="post_tags">Post Comment</label>
    <input type="text" value="<?php echo $post_tags?>"  class="form-control" name="post_tags" id="">
 </div>
 <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea  class="form-control" name="post_content" id="" cols="30" rows="10"> <?php echo $post_content?></textarea>
 </div>
 <div class="form-group">
    <input type="submit" class="btn btn-primary" name="update_post" id="" value="Publish Post"> 
 </div>







</form>