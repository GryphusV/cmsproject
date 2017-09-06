<!-- Comments Form -->

<div class="well">
    <center><h3>Leave a Comment</h3></center>
    <form method="post" role="form" action="">

        <div class="form-group">
            <textarea name="comment_content" class="form-control" rows="4"></textarea>
        </div>

        <center><button type="submit" class="btn btn-primary" name="create_comment">Submit</button></center>
    </form>
</div>
<hr>

<?php
    if(isset($_POST['create_comment'])) {
        $comment_author = $_SESSION['user_fname'] . " " . $_SESSION['user_lname'];
        $comment_email = $_SESSION['user_email'];
        $comment_content = $_POST['comment_content'];
        $comment_post_id = $_GET['p_id'];
        $comment_status = "unapproved";
        $comment_date= date('d-m-y');
        $comment_user_name = $_SESSION['user_name'];


        if(!empty($comment_content)) {

            $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date, comment_user_name) ";
            $query .= "VALUES({$comment_post_id}, '{$comment_author}', '{$comment_email}', '{$comment_content}', ";
            $query .= "'{$comment_status}', now(), '{$comment_user_name}' ) ";
            $add_comment = mysqli_query($connection, $query);
            if (!$add_comment) {
                die("Query failed" . mysqli_error($connection));
            }

            $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = {$comment_post_id}";
            $increment_comment = mysqli_query($connection, $query);
        }

        else{
            echo "<script>alert('Field cannot be empty.')</script>";
        }

    }




?>








<?php

        $comment_post_id = $_GET['p_id'];
        $query = "SELECT * FROM comments WHERE comment_post_id = $comment_post_id";
        $display_comments = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($display_comments)){
            $comment_id = $row['comment_id'];
            $comment_author = $row['comment_author'];

            $comment_email = $row['comment_email'];
            $comment_content = $row['comment_content'];
            $comment_date = $row['comment_date'];
            $comment_status = $row['comment_status'];
            $comment_user_name = $row['comment_user_name'];
            $query = "SELECT * FROM users WHERE user_name = '{$comment_user_name}'";
            $select_user_image = mysqli_query($connection, $query);
            $row = mysqli_fetch_array($select_user_image);
            $comment_image = $row['user_image'];
            if($comment_status == "approved") {
                echo "<div class='media'>
                <a class='pull-left' href='#'>
                    <img class='media-object' src='admin/images/users/$comment_image' alt=''>
                </a>
                <div class='media-body'>
                    <h4 class='media-heading'>$comment_author
                        <small>$comment_date</small>
                    </h4>
                    $comment_content
                </div>
            </div>";
            }
?>




<?php
        }

?>



<!--<!-- Comment -->
<!--<div class="media">-->
<!--    <a class="pull-left" href="#">-->
<!--        <img class="media-object" src="http://placehold.it/64x64" alt="">-->
<!--    </a>-->
<!--    <div class="media-body">-->
<!--        <h4 class="media-heading">Start Bootstrap-->
<!--            <small>August 25, 2014 at 9:30 PM</small>-->
<!--        </h4>-->
<!--        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.-->
<!--    </div>-->
<!--</div>-->

<!--<!-- Comment -->
<!--<div class="media">-->
<!--    <a class="pull-left" href="#">-->
<!--        <img class="media-object" src="http://placehold.it/64x64" alt="">-->
<!--    </a>-->
<!--    <div class="media-body">-->
<!--        <h4 class="media-heading">Start Bootstrap-->
<!--            <small>August 25, 2014 at 9:30 PM</small>-->
<!--        </h4>-->
<!--        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.-->
<!--        <!-- Nested Comment -->
<!--        <div class="media">-->
<!--            <a class="pull-left" href="#">-->
<!--                <img class="media-object" src="http://placehold.it/64x64" alt="">-->
<!--            </a>-->
<!--            <div class="media-body">-->
<!--                <h4 class="media-heading">Nested Start Bootstrap-->
<!--                    <small>August 25, 2014 at 9:30 PM</small>-->
<!--                </h4>-->
<!--                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.-->
<!--            </div>-->
<!--        </div>-->
        <!-- End Nested Comment -->
<!--    </div>-->
<!--</div>-->