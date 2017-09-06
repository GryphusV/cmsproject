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
                        Categories Page
                        <small>Author</small>
                    </h1>


                    <div class="col-xs-6">
                        <?php insert_categories()
                        ?>

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="cat-title">Add Category</label>
                            <input class ="form-control" type="text" name="cat_title">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                        </div>

                    </form>

                        <?php   //include update if needed
                        insertUpdate();
                        ?>
                    </div>
                        <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                                <tbody>

                                <?php //find all categories query
                                findAllCategories();
                                ?>
                                <?php
                                deleteCategories();
                                ?>

                                </tbody>
                        </table>
                </div>

            <!-- /.row -->
                </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
<?php include "includes/footer.php"; ?>