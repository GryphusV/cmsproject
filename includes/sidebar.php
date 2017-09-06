<div class="well">

                            <!-- Blog Search Well -->
                    <?php include "includes/search_form.php" ?>

                            <!-- Blog Log in Form -->
                    <?php
                    if($_SESSION['user_name'] == "" || $_SESSION['user_name'] == null){

                        include "includes/login_form.php";
                        }
                    else{ include "includes/logout_form.php";




                    }

                    ?>




                            <!-- Blog Categories Well -->
                    <?php include "includes/categories_form.php" ?>
                                <!-- /.row -->

                            <!-- Side Widget Well -->
                            <?php include "widget.php"; ?>

</div>