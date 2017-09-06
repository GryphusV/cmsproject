
<div class="col-md-8">
    <?php
    if(isset($_POST['submit'])) {

        $search = $_POST['search'];


        $query = "SELECT * FROM posts WHERE post_tag LIKE '%$search%' OR post_author LIKE '%$search%' ";
        $search_query = mysqli_query($connection, $query);

        $count = mysqli_num_rows($search_query);

        if ($count == 0) {

            echo "<h1> No result found.</h1>";

        } else {

            while ($row = mysqli_fetch_assoc($search_query)) {
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = substr($row['post_content'], 0, 240);
                $post_id = $row['post_id'];
                $post_status = $row['post_status'];

                ?>
                <?php if($post_status == "active"){
                    ?>

                <h2>
                    <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="author.php?author=<?php echo $post_author; ?>"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?> </p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id ?>">
                <img class="img-responsive" <?php echo " src='images/$post_image' " ?>alt="">
                </a>
                    <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More <span
                            class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                    <?php } ?>

                <?php
            }
        }
    }
    ?>
</div>





