<?php
    if(isset($_POST['create_post'])){
        global $connection;
        $post_title=$_POST['title'];
        $post_category_id=$_POST['post_category'];
        $post_author=$_SESSION['user_fname'];
        $post_author .= " ";
        $post_author.=$_SESSION['user_lname'];
        $post_status=$_POST['post_status'];

        $post_image= $_FILES['image']['name'];
        $post_image_temp= $_FILES['image']['tmp_name'];

        $post_tags= $_POST['post_tags'];
        $post_content= $_POST['post_content'];
        $post_date= date('d-m-y');

            move_uploaded_file($post_image_temp, "./images/$post_image");
            copy("./images/$post_image", "../images/$post_image");

        $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,";
        $query .= "post_tag,post_status) ";
        $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}',";
        $query .= "'{$post_content}','{$post_tags}','{$post_status}') ";
        $add_post_query = mysqli_query($connection, $query);
        queryFailed($add_post_query);

        $query="SELECT * FROM posts WHERE post_title = '{$post_title}' AND post_category_id = '{$post_category_id}' ";
        $get_post_id = mysqli_query($connection, $query);
        queryFailed($get_post_id);


        while($row = mysqli_fetch_assoc($get_post_id)){
            $post_id = $row['post_id'];
            echo "Post Added: " . "<a href='../post.php?p_id={$post_id}'>View Post</a>" . "<br>      " .
                "<a href='posts.php'>View All Post</a>";
        }


    }
?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
        <select name="post_category" id="">
            <?php
            $query = "SELECT * FROM categories";
            $select_categories = mysqli_query($connection, $query);
            queryFailed($select_categories);

            while($row = mysqli_fetch_assoc($select_categories)) { //povuce row iz db i stavi ga u array
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<option value='$cat_id'>$cat_title</option>";
            }
            ?>


        </select>

    </div>
<!--    <div class="form-group">-->
<!--        <label for="post_author">Post Author</label>-->
<!--        <input type="text" class="form-control" name="author">-->
<!--    </div>-->
    <div class="form-group">
        <label for="post_status">Choose Post Status</label>
        <select name="post_status" id="">
            <option value='draft'>draft</option>
            <option value='active'>active</option>




        </select>
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>















</form>