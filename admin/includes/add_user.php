<?php
    if(isset($_GET['u_id'])){


    }
    if(isset($_POST['add_user'])){
        global $connection;
        $user_fname=$_POST['user_fname'];
        $user_lname=$_POST['user_lname'];
        $user_name=$_POST['user_name'];
        $user_password=$_POST['user_password'];

        $user_image= $_FILES['user_image']['name'];
        $user_image_temp= $_FILES['user_image']['tmp_name'];

        $user_email= $_POST['user_email'];
        $user_role= $_POST['user_role'];
        if(isset($user_image)) {
            move_uploaded_file($user_image_temp, "./images/users/$user_image");
        }
        $user_password_crypt = password_hash($user_password, PASSWORD_BCRYPT);


        $query = "INSERT INTO users(user_name,user_password,user_fname,user_lname,user_role,user_email,";
        $query .= "user_image) ";
        $query .= "VALUES('{$user_name}','{$user_password_crypt}','{$user_fname}','{$user_lname}',";
        $query .= "'{$user_role}','{$user_email}','{$user_image}') ";
        $add_user = mysqli_query($connection, $query);
        queryFailed($add_user);

        echo "User created: " . "<a href='users.php'>View Users</a>";
    }
?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_fname">First Name</label>
        <input type="text" class="form-control" name="user_fname">
    </div>

    <div class="form-group">
        <label for="user_lname">Last Name</label>
        <input type="text" class="form-control" name="user_lname">
    </div>

    <div class="form-group">
        <label for="user_role">Pick User Role</label>
        <select name="user_role" id="">
            <option value='admin'>Admin</option>
            <option value='subscriber'>Subscriber</option>
        </select>


        <div class="form-group">
            <br>
        <label for="user_name">Username</label>
        <input type="text" class="form-control" name="user_name">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="user_image">User Image</label>
        <input type="file" name="user_image">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="add_user" value="Add User">
    </div>



</form>