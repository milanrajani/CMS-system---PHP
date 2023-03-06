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
                            Welcome to All posts

                        </h1>
                       <?php
                       if(isset($_GET['source'])){
                        $source = $_GET['source'];

                       }else{
                        $source = '';
                       }
                       
                       switch($source){
                        case 'add_user';
                        include "includes/add_user.php";
                        break;

                        case 'edit_user';
                        include "includes/edit_user.php";
                        break; 

                       default:
                        include "includes/view_all_users.php";
                       }
                       
                       ?>


                         
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include 'includes/admin_footer.php';?>
</body>

