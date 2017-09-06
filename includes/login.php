<?php include "db.php";?>
<?php include "../admin/functions.php";?>
<?php session_start() ?>

    <?php
            if(isset($_POST['login'])) {
                $user_name = $_POST['user_name'];
                $user_password = $_POST['user_password'];

                $user_name = mysqli_real_escape_string($connection, $user_name);
                $user_password = mysqli_real_escape_string($connection, $user_password);

                $query = "SELECT * FROM users WHERE user_name = '{$user_name}' ";
                $login_query = mysqli_query($connection, $query);
                if (!$login_query) {
                    die("Query failed" . mysqli_error($connection));
                }

                while ($row = mysqli_fetch_array($login_query)) {
                    $db_user_fname = $row['user_fname'];
                    $db_user_lname = $row['user_lname'];
                    $db_user_id = $row['user_id'];
                    $db_user_name = $row['user_name'];
                    $db_user_password = $row['user_password'];
                    $db_user_role = $row['user_role'];
                    $db_user_email = $row['user_email'];
                    $db_user_image = $row['user_image'];


                }

                if (password_verify($user_password, $db_user_password)) {
                    $_SESSION['user_id'] = $db_user_id;
                    $_SESSION['user_name'] = $db_user_name;
                    $_SESSION['user_fname'] = $db_user_fname;
                    $_SESSION['user_lname'] = $db_user_lname;
                    $_SESSION['user_role'] = $db_user_role;
                    $_SESSION['user_email'] = $db_user_email;
                    $_SESSION['user_image'] = $db_user_image;
                    redirect("/cms/admin");
                }
                else{
                    redirect("/cms/index.php");

                }
            }






?>
