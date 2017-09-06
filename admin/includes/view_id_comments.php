<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Author</th>
        <th>Comment</th>
        <th>Email</th>
        <th>Status</th>
        <th>In response to</th>
        <th>Date</th>
        <th>Validate</th>
    </tr>
    </thead>
    <tbody>

    <?php
    if(isset($_GET['p_id'])){
        $post_id = $_GET['p_id'];
    }
    $query = "SELECT * FROM comments WHERE comment_post_id = {$post_id}";
    $select_comments = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_comments)){
        $comment_id = $row['comment_id'];
        $comment_post_id = $row['comment_post_id'];
        $comment_author = $row['comment_author'];
        $comment_email = $row['comment_email'];
        $comment_content = $row['comment_content'];
        $comment_status = $row['comment_status'];
        $comment_date = $row['comment_date'];

        $query = "SELECT * FROM posts WHERE post_id = {$comment_post_id}";
        $select_posts_title = mysqli_query($connection, $query);
        while($row = mysqli_fetch_array($select_posts_title)){
            $post_title = $row['post_title'];
        }

//        $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
//
//        $select_categories_title = mysqli_query($connection, $query);
//        while($row = mysqli_fetch_array($select_categories_title)){
//            $category_title = $row['cat_title'];


        echo"<tr>";
        echo "<td>{$comment_id}</td>";
        echo "<td>{$comment_author}</td>";
        echo "<td>{$comment_content}</td>";
        echo "<td>{$comment_email}</td>";
        echo "<td>{$comment_status}</td>";
        echo "<td><a href ='../post.php?p_id={$comment_post_id}'>{$post_title}</td></a>";
        echo "<td>{$comment_date}</td>";
        echo "<td><a href='comment.php?p_id={$post_id}&approve={$comment_id}'>Approve</a>
              <br> <a href='comment.php?p_id={$post_id}&unapprove={$comment_id}'>Unapprove</a> </td>";
        echo "<td><a onClick=\"javascript: return confirm('Are you sure?'); \" href='comment.php?delete={$comment_id}'>Delete</a></td>";

        echo"</tr>";
    }
    if(isset($_GET['delete'])){
        $comments_id=$_GET['delete'];
        $query ="DELETE FROM comments WHERE comment_id = {$comments_id} ";
        $delete_query = mysqli_query($connection, $query);
        header("Location: comment.php");
    }
    if(isset($_GET['approve'])){
        $comments_id=$_GET['approve'];
        $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = {$comments_id}";
        $approve_comment=mysqli_query($connection, $query);
        header("Location: comment.php?p_id={$post_id}");
    }
    if(isset($_GET['unapprove'])){
        $comments_id=$_GET['unapprove'];
        $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = {$comments_id}";
        $unapprove_comment=mysqli_query($connection, $query);
        header("Location: comment.php?p_id={$post_id}");
    }








    ?>

    </tbody>
</table>