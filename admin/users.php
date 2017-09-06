<?php include "includes/header.php"; ?>
    <body>
<div id="wrapper">
    <!-- Navigation -->
<?php include "includes/navigation.php"; ?>
    <div id="page-wrapper">

    <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Users Page
                <small>Author</small>
            </h1>
            <?php
                if(isset($_GET['source'])){
                    $source = $_GET['source'];
                }
                else {
                    $source='';
                }
            switch($source){
                case 'add_user':
                        include "includes/add_user.php";
                        break;
                case 'edit_user':
                        include "includes/edit_user.php";
                    break;
                default:
                    include "includes/view_all_users.php";
                    break;
            }

            ?>



                <div class="col-xs-6">

                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Blank Page
                        </li>
                    </ol>
                </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
<?php include "includes/footer.php"; ?>