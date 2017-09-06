<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Image</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Username</th>
        <th>Password</th>
        <th>Email</th>
        <th>Role</th>
        <th>Change Role</th>
    </tr>
    </thead>
    <tbody>

    <?php
    $query = "SELECT * FROM users";
    $select_users = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_users)){
        $user_id = $row['user_id'];
        $user_image = $row['user_image'];
        $user_fname = $row['user_fname'];
        $user_lname = $row['user_lname'];
        $user_name = $row['user_name'];
        $user_password = $row['user_password'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];

//        $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
//
//        $select_categories_title = mysqli_query($connection, $query);
//        while($row = mysqli_fetch_array($select_categories_title)){
//            $category_title = $row['cat_title'];


        echo"<tr>";
        echo "<td>{$user_id}</td>";
        echo "<td><img width='75' height='75' src='images/users/$user_image' alt='image'</td>";
        echo "<td>{$user_fname}</td>";
        echo "<td>{$user_lname}</td>";
        echo "<td>{$user_name}</td>";
        echo "<td>{$user_password}</td>";
        echo "<td>{$user_email}</td>";
        echo "<td>{$user_role}</td>";
        echo "<td><a href='users.php?admin={$user_id}'>Admin</a>
              <br>
              <a href='users.php?subs={$user_id}'>Subscriber</a></td>";
        echo "<td><a href='users.php?source=edit_user&u_id={$user_id}'>Edit</a>
              <br>
              <a onClick=\"javascript: return confirm('Are you sure?'); \" href='users.php?delete={$user_id}'>Delete</a></td>";

        echo"</tr>";
    }
    if(isset($_GET['delete'])){
        $user_id=$_GET['delete'];
        $query ="DELETE FROM users WHERE user_id = {$user_id} ";
        $delete_user = mysqli_query($connection, $query);
        header("Location: users.php");
    }
    if(isset($_GET['admin'])){
        $user_id=$_GET['admin'];
        $query ="UPDATE users SET user_role = 'admin' WHERE user_id = {$user_id} ";
        $delete_user = mysqli_query($connection, $query);
        header("Location: users.php");
    }
    if(isset($_GET['subs'])){
        $user_id=$_GET['subs'];
        $query ="UPDATE users SET user_role = 'subscriber' WHERE user_id = {$user_id} ";
        $delete_user = mysqli_query($connection, $query);
        header("Location: users.php");
    }
    if(isset($_GET['edit'])){
        $user_id=$_GET['edit'];
        $query ="UPDATE users SET user_role = 'subscriber' WHERE user_id = {$user_id} ";
        $delete_user = mysqli_query($connection, $query);
        header("Location: users.php");
    }









    ?>

    </tbody>
</table>