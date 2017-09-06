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
                Comments Page
                <small>Author</small>
            </h1>
            <?php
                if(isset($_GET['p_id'])){
                    $post_id = $_GET['p_id'];
                    include "includes/view_id_comments.php";
                }

                else{
                    include "includes/view_all_comments.php";
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