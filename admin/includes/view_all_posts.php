<?php
    if(isset($_POST['checkBoxArray'])){
        foreach ($_POST['checkBoxArray'] as $postValueId) {
            $bulk_options = $_POST['bulk_options'];

            switch ($bulk_options) {

                case 'active':
                    $query="UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}";
                    $activequery = mysqli_query($connection, $query);
                    break;
                case 'draft':
                    $query="UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}";
                    $draftquery = mysqli_query($connection, $query);
                    break;
                case 'delete':
                    $query="DELETE FROM posts where post_id = {$postValueId}";
                    $deltequery = mysqli_query($connection, $query);
                    break;

            }
        }



    }


?>


<form action="" method="post">

<table class="table table-bordered table-hover">

    <div id="bulkOptionsContainer" class="col-xs-4">
        <select class ="form-control" name="bulk_options" id="">
        <option value="">Select Option</option>
        <option value="active">Active</option>
        <option value="draft">Draft</option>
        <option value="delete">Delete</option>
        </select>
    </div>
    <div class="col-xs-4">
        <input type="submit" name="submit" class="btn btn-success"
        value="Apply">
        <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>


    </div>

<br>
    <br>

    <thead>
    <tr>
        <th><input id="selectAllboxes" type="checkbox"> </th>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>

    <?php
    $query = "SELECT * FROM posts ORDER by post_id DESC";
    $select_categories = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_categories)){
        $post_id = $row['post_id'];
        $post_category_id = $row['post_category_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_tag = $row['post_tag'];
        $post_comment_count = $row['post_comment_count'];
        $post_status = $row['post_status'];
        $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
        $select_categories_title = mysqli_query($connection, $query);
        while($row = mysqli_fetch_array($select_categories_title)){
            $category_title = $row['cat_title'];
        }

        echo"<tr>"; ?>
        <td><input class='checkBoxes' id='select' type='checkbox' name="checkBoxArray[]"
                   value="<?php echo $post_id ?>">  </td>
    <?php
        echo "<td>{$post_id}</td>";
        echo "<td><a href='../post.php?p_id={$post_id}'>{$post_title}</a></td>";
        echo "<td>{$post_author}</td>";
        echo "<td>{$category_title}</td>";
        echo "<td>{$post_status}</td>";
        echo "<td><img width='150' src='images/$post_image' alt='image'</td>";
        echo "<td>{$post_tag}</td>";
        echo "<td><a href='./comment.php?p_id={$post_id}'>{$post_comment_count}</a></td>";
        echo "<td>{$post_date}</td>";
        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
        echo "<td><a onClick=\"javascript: return confirm('Are you sure?'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";
        echo"</tr>";
    }
    if(isset($_GET['delete'])){
        $posts_id=$_GET['delete'];
        $query ="DELETE FROM posts WHERE post_id = {$posts_id} ";
        $delete_query = mysqli_query($connection, $query);
        header("Location: posts.php");
    }


    ?>

    </tbody>
</table>
</form>