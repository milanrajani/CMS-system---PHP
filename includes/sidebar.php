 

<div class="col-md-4">

 


<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method='post'>
    <div class="input-group">
        <input type="text" name="search" class="form-control">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    </form>
    <!-- /.input-group -->
</div>



<!-- Login page -->
<div class="well">
    <h4>Login</h4>
    <form action="includes/login.php" method="POST">
    <div class="form-group">
        <input type="text" placeholder="Enter username" name="username" class="form-control">
    </div>
    <div class="form-group">
        <input type="password" placeholder="Enter password" name="password" class="form-control">
    </div>
    <button value="submit" class="btn btn-primary" name="login">Submit</button>
    
    </form>
    <!-- /.input-group -->
</div>  












<!-- Blog Categories Well -->
<div class="well">
 <?php
  $query = 'SELECT * FROM category';
  $select_category_sidebar = mysqli_query($connection, $query);
  
  
 ?>






    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
          <?php
          
          while($row = mysqli_fetch_assoc($select_category_sidebar)){
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
      
            echo "<li><a href='category.php?category= $cat_id '>{$cat_title}<li/>";
        }
          
          
          
          ?>
 
            </ul>
        </div>
        <!-- /.col-lg-6 -->
        
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<?php include"widget.php";?>

</div>
