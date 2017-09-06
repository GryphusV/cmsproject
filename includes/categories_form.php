<?php
$query = "SELECT * FROM categories LIMIT 4 ";
$select_cat_side = mysqli_query($connection, $query);
?>
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
                <?php
                while($row = mysqli_fetch_assoc($select_cat_side)) { //povuce row iz db i stavi ga u array
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];

                    echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";   //stavI povuceni cat_title u navigaciju
                }
                ?>


            </ul>
        </div>
    </div>
</div>