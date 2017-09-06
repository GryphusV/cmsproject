
                 <div class="col-md-8">
                <?php
                if(isset($_GET['author'])){
                    $the_post_author = $_GET['author'];

                }



               $query = "SELECT * FROM posts WHERE post_author = '{$the_post_author}' ";
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
                            by <a href="index.php"><?php echo $post_author; ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?> </p>
                        <hr>
                        <a href="post.php?p_id=<?php echo $post_id ?>">
                        <img class="img-responsive" <?php echo " src='images/$post_image' "?>alt="">
                        </a>
                        <hr>
                        <p><?php echo $post_content ?></p>


                             <?php } ?>



                        <hr>
                   
                <?php    
                    }
                     ?>

                 </div>
                

                

