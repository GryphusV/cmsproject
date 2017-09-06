<?php


if(isset(($_GET['p_id']))) {
    $post_id= $_GET['p_id'];


    $query = "SELECT * FROM posts WHERE post_id = {$post_id}";
    $select_post_by_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_post_by_id)) {
        $post_id = $row['post_id'];
        $post_category_id = $row['post_category_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tag = $row['post_tag'];
        $post_comment_count = $row['post_comment_count'];
        $post_status = $row['post_status'];

    }
    if(isset($_POST['edit_post'])){
        $post_category_id = $_POST['post_category'];
        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];
        $post_content = $_POST['post_content'];
        $post_tag = $_POST['post_tag'];
        $post_status = $_POST['post_status'];
        move_uploaded_file($post_image_temp, "images/$post_image");
        copy("./images/$post_image", "../images/$post_image");

        if(empty($post_image)){
            $query = "SELECT * FROM posts WHERE post_id = {$post_id} ";
            $select_image = mysqli_query($connection, $query);
            while($row = mysqli_fetch_array($select_image)){
                $post_image = $row['post_image'];
            }
        }

        $query="UPDATE posts SET ";
        $query.="post_title = '{$post_title}', ";
        $query.="post_category_id = '{$post_category_id}', ";
        $query.="post_date = now(), ";
        $query.="post_author = '{$post_author}', ";
        $query.="post_status = '{$post_status}', ";
        $query.="post_tag = '{$post_tag}', ";
        $query.="post_content = '{$post_content}', ";
        $query.="post_image = '{$post_image}' ";
        $query .="WHERE post_id = {$post_id} ";
        $edit_post = mysqli_query($connection, $query);
        queryFailed($edit_post);


        echo "Post Edited: " . "<a href='../post.php?p_id={$post_id}'>View Post</a>" . "<br>" .
                "<a href='posts.php'>View All Post</a>";

    }
}
?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="post_title" value="<?php echo $post_title ?>">
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
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author" value="<?php echo $post_author?>">
    </div>
    <div class="form-group">
        <select name="post_status" id="">
            <option value='<?php echo $post_status; ?>'><?php echo $post_status; ?></option>"
            <?php if($post_status == active ){

                echo "<option value='draft'>draft</option>";

            } else{
                echo "<option value='active'>active</option>";
            }
            ?>


        </select>
    </div>
    <div class="form-group">

        <img width="100" src="images/<?php echo $post_image; ?>" alt="">
        <input  type="file" name="post_image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tag" value="<?php echo $post_tag ?>" ">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content ?>
        </textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_post" value="Edit Post">
    </div>















</form>