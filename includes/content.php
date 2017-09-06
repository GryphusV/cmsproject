
                 <div class="col-md-8">
                <?php
               $per_page = 4;
               $query = "SELECT * FROM posts WHERE post_status = 'active'";
               $post_query = mysqli_query($connection, $query);
               $count = mysqli_num_rows($post_query);
               $count = ceil($count/$per_page);

                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                } else {
                    $page = "";
                }

                if($page == "" || $page ==1){
                    $page1 = 0;
                } else{
                    $page1 = ($page * $per_page) - $per_page;
                }


               $query = "SELECT * FROM posts LIMIT {$page1}, {$per_page}";
               $select_post= mysqli_query($connection, $query);
                    
                    while($row = mysqli_fetch_assoc($select_post)) { //povuce row iz db i stavi ga u array
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = substr($row['post_content'], 0, 240);
                        $post_status = $row['post_status'];
                        ?>
                        
                        
<!--                    <h1 class="page-header">-->
<!--                    Page Heading-->
<!--                    <small>Secondary Text</small>-->
<!--                </h1>-->

                <!-- First Blog Post -->

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
                <img class="img-responsive" <?php echo " src='images/$post_image' "?>alt="">
                </a>
                    <hr>
                <p><?php echo $post_content ?></p>
                        <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                   
                   <?php } ?>

                   
                <?php    
                    }
                     ?>
                     <ul class="pager pager-hover">
                         <?php
                         for($i = 1; $i <=$count; $i++) {
                             if ($i == $page) {
                                 echo "       
                            <li><a class='active_link' href='index.php?page=$i'>$i</a> </li>";
                             }
                             else {
                                 echo "       
                            <li><a href='index.php?page=$i'>$i</a> </li>";

                             }
                         }




                         ?>




                     </ul>



                 </div>
                

                

