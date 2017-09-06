<?php
        if(isset($_GET['u_id'])) {
            $user_id = $_GET['u_id'];
            $query = "SELECT * FROM users WHERE user_id = {$user_id}";
            $select_user = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_user)) {
                $user_id = $row['user_id'];
                $user_fname = $row['user_fname'];
                $user_lname = $row['user_lname'];
                $user_name = $row['user_name'];
                $user_image = $row['user_image'];
                $user_email = $row['user_email'];
                $user_role = $row['user_role'];
            }




            if (isset($_POST['edit_user'])) {
                $user_fname = $_POST['user_fname'];
                $user_lname = $_POST['user_lname'];
                $user_name = $_POST['user_name'];
                $user_password = $_POST['user_password'];

                $user_image = $_FILES['user_image']['name'];
                $user_image_temp = $_FILES['user_image']['tmp_name'];

                $user_email = $_POST['user_email'];
                $user_role = $_POST['user_role'];
                move_uploaded_file($user_image_temp, "./images/users/$user_image");

                $user_password_crypt = password_hash($user_password, PASSWORD_BCRYPT);

                $query="UPDATE users SET ";
                $query.="user_fname = '{$user_fname}', ";
                $query.="user_lname = '{$user_lname}', ";
                $query.="user_name = '{$user_name}', ";
                $query.="user_password = '{$user_password_crypt}', ";
                $query.="user_image = '{$user_image}', ";
                $query.="user_email = '{$user_email}', ";
                $query.="user_role = '{$user_role}' ";
                $query .="WHERE user_id = {$user_id}";
                $edit_user = mysqli_query($connection, $query);
                queryFailed($edit_user);
            }


        }
?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_fname">First Name</label>
        <input type="text" class="form-control" name="user_fname" value="<?php echo $user_fname ?>">
    </div>

    <div class="form-group">
        <label for="user_lname">Last Name</label>
        <input type="text" class="form-control" name="user_lname" value="<?php echo $user_lname ?>">
    </div>

    <div class="form-group">
        <label for="user_role">Pick User Role</label>
        <select name="user_role" id="">
            <option value='<?php echo $user_role ?>'><?php echo $user_role ?></option>
            <?php
                if($user_role == 'admin'){
                    echo "<option value='subscriber'>subscriber</option>";
                }
                else{
                    echo "<option value='admin'>admin</option>";
                }
            ?>

        </select>
    </div>


        <div class="form-group">
            <br>
        <label for="user_name">Username</label>
        <input type="text" class="form-control" name="user_name" value="<?php echo $user_name ?>">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password" value="">
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email" value="<?php echo $user_email ?>">
    </div>

    <div class="form-group">
        <img width="100" height="100" src="images/users/<?php echo $user_image; ?>" alt="">
        <input type="file" name="user_image">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Edit User">    </div>



</form>