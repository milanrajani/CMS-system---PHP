<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
               
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand" href="#">Start Bootstrap</a> -->
                <a class="navbar-brand" href="admin">admin</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                <li>
                        <a href="registration.php">Registration</a>
                    </li>
                <?php
                $query = 'SELECT * FROM category';
                $select_all_category_query = mysqli_query($connection, $query);
                
                while($row = mysqli_fetch_assoc( $select_all_category_query)){
                    $cat_title = $row['cat_title'];

                    echo "<li><a href='#'>{$cat_title}<li/>";
                }
                ?>
                   
               
                

<li>
   
</li>


 
                     
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>