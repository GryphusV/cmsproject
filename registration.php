<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

<?php
$message = null;
    if(isset($_POST['submit'])){
        $user_fname = $_POST['user_fname'];
        $user_lname = $_POST['user_lname'];
        $user_name = $_POST['user_name'];
        $user_password = $_POST['user_password'];
        $user_email = $_POST['user_email'];

        if(!empty($user_fname) && !empty($user_lname) && !empty($user_name) && !empty($user_password) && !empty($user_email)){

        $user_fname = mysqli_real_escape_string($connection, $user_fname);
        $user_lname = mysqli_real_escape_string($connection, $user_lname);
        $user_name = mysqli_real_escape_string($connection, $user_name);
        $user_email = mysqli_real_escape_string($connection, $user_email);
        $user_password = mysqli_real_escape_string($connection, $user_password);

        $user_password_crypt = password_hash($user_name, PASSWORD_BCRYPT);


        $query = "INSERT INTO users(user_fname, user_lname, user_name, user_password, user_email, user_role) ";
        $query .="VALUES('{$user_fname}', '{$user_lname}', '{$user_name}', '{$user_password_crypt}', '{$user_email}', 'subscriber')";
        $register_user = mysqli_query($connection, $query);
        $message = "Your account is registered.";

    }
    else {
        $message = "Please fill in all the fields.";

    }
    }



?>




    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <center><h1>Register</h1></center>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <?php echo "<h5 class='text-center'>$message</h5>"; ?>

                        <div class="form-group">
                            <label for="user_fname" class="sr-only">First Name</label>
                            <input type="text" name="user_fname" id="user_fname" class="form-control" placeholder="Enter First Name">
                        </div>
                        <div class="form-group">
                            <label for="user_lname" class="sr-only">Username</label>
                            <input type="text" name="user_lname" id="user_lname" class="form-control" placeholder="Enter Last Name">
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">Username</label>
                            <input type="text" name="user_name" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="user_email" class="sr-only">Email</label>
                            <input type="email" name="user_email" id="user_email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="user_password" class="sr-only">Password</label>
                            <input type="password" name="user_password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
