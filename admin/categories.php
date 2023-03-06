<?php include 'includes/admin_header.php';?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'includes/admin_nav.php';?>

        <div id="page-wrapper">

            <div class="container-fluid mt-5">

                <!-- Page Heading -->
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin Page
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6">

                                                               <!-- CREATIG THE CATEGORIES -->
                            <?php  insert_categories(); ?>
  
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Category</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Add category">
                                </div>
                            </form>

<?php
if(isset($_GET['edit'])){
    $cat_id = $_GET['edit'];
    
    include "includes/update_categories.php";
}


?>
                            
                        </div>

                    <div class="col-xs-6">

 
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                </tr>
                            </thead>
                            <tbody>


                                             <!-- RENDERING DATA FROM DATABASE                  -->

        <?php findAllCategories(); ?>
                                             <!-- //DELETIG THE CATEGORIES -->
        <?php deleteAllCategories();  ?>

 
                            </tbody>
                        </table>
                    </div>



                         
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include 'includes/admin_footer.php';?>
</body>

