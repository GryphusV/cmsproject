
                 <div class="col-md-8">
                <?php
                if(isset($_GET['p_id'])){
                    $the_post_id = $_GET['p_id'];
                    

                }
                $query = "UPDATE posts SET post_views = post_views +1 WHERE post_id = {$the_post_id}";
                $view_query= mysqli_query($connection, $query);


               $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
               $select_post= mysqli_query($connection, $query);
                    
                    while($row = mysqli_fetch_assoc($select_post)) { //povuce row iz db i stavi ga u array
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                        $post_status = $row['post_status'];
                        ?>
                        <?php if($post_status == "active"){
                        ?>

                        <!-- First Blog Post -->
                        <h2>
                            <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title; ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="author.php?author=<?php echo $post_author; ?>"><?php echo $post_author; ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?> </p>
                        <hr>
                        <img class="img-responsive" <?php echo " src='images/$post_image' "?>alt="">
                        <hr>
                        <p><?php echo $post_content ?></p>


                             <?php } ?>


                   <?php if(isset($_SESSION['user_role'])){
                            if(isset($_GET['p_id'])) {
                                $the_post_title = $_GET['p_id'];
                                $user_role = $_SESSION['user_role'];
                                if ($user_role == 'admin') {
                                    ?>
                                    <input class='btn btn-primary' type='button' value='Edit Post'
                                           onclick='window.location.href="admin/posts.php?source=edit_post&p_id=<?php echo $post_id; ?>"'>
                                    <?php
                                }
                            }

                        }?>

                        <hr>
                   
                <?php    
                    }
                     ?>
                     <?php
                     if(isset($_SESSION['user_role'])){

                     include "includes/view_all_comments.php";
                 } else {
                         echo "<center><h4>Log in to post comments.</h4></center>";
                     }
                     ?>
                 </div>
                

                

