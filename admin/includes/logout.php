<?php session_start();?>
<?php
    $_SESSION['user_name'] = null;
    $_SESSION['user_fname'] = null;
    $_SESSION['user_lname'] = null;
    $_SESSION['user_role'] = null;
    header("Location: /cms/index.php");
?>