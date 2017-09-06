
<?php
function insert_categories()
{
    global $connection;
    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];

        if ($cat_title == "" || empty($cat_title)) {

            echo "This field should not be empty.";

        } else {
            $query = "INSERT INTO categories(cat_title) ";     //cat_title je column u categories
            $query .= "VALUE('{$cat_title}')";

            $create_category_query = mysqli_query($connection, $query);

            if (!$create_category_query) {
                die ("Not working." . mysqli_error($connection));
            }
        }
    }
}
function findAllCategories(){
    global $connection;

    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);



    while($row = mysqli_fetch_assoc($select_categories)) { //povuce row iz db i stavi ga u array
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo"<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo"</tr>";
    }
}
function deleteCategories(){
    global $connection;
    if(isset($_GET['delete'])) {
        $the_cat_id = $_GET['delete'];

        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
        $delete_query = mysqli_query($connection,$query);
        header("Location: categories.php");
    }
}
function insertUpdate(){
    global $connection;
    if(isset($_GET['edit'])){
        $cat_id=$_GET['edit'];
        include "includes/update_category.php";
    }
}
function queryFailed($result){
    global $connection;
    if(!$result){
        die("Query failed" . mysqli_error($connection));
    }
}

function redirect($location){


    return header("Location:" . $location);
}

function allposts(){
    global $connection;
    global $post_num;
    $query = "SELECT * FROM posts";
    $select_posts = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_posts)){
        $post_num = $post_num + 1;
    }
}

function allactiveposts(){
    global $connection;
    global $post_active_num;
    $query = "SELECT * FROM posts WHERE post_status ='active'";
    $select_active_posts = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_active_posts)){
        $post_active_num = $post_active_num + 1;
    }
}

function alldraftposts(){
    global $connection;
    global $post_draft_num;
    $query = "SELECT * FROM posts WHERE post_status ='draft'";
    $select_draft_posts = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_draft_posts)){
        $post_draft_num = $post_draft_num + 1;
    }
}



function allcategories(){
    global $connection;
    global $cat_num;
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_categories)){
        $cat_num = $cat_num + 1;
    }
}

function allcomments(){
    global $connection;
    global $comm_num;
    $query = "SELECT * FROM comments";
    $select_comments = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_comments)){
        $comm_num = $comm_num + 1;
    }
}

function allappcomments(){
    global $connection;
    global $comm_app_num;
    $query = "SELECT * FROM comments WHERE comment_status = 'approved'";
    $select_app_comments = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_app_comments)){
        $comm_app_num = $comm_app_num + 1;
    }
    queryFailed($select_app_comments);
}

function alluncomments(){
    global $connection;
    global $comm_un_num;
    $query = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
    $select_un_comments = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_un_comments)){
        $comm_un_num = $comm_un_num + 1;
    }
    queryFailed($select_un_comments);
}

function allusers(){
    global $connection;
    global $user_num;
    $query = "SELECT * FROM users";
    $select_users = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_users)){
        $user_num = $user_num + 1;
    }
}

function allsubscribers(){
    global $connection;
    global $subs_num;
    $query = "SELECT * FROM users";
    $select_subs = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_subs)){
        $subs_num = $subs_num + 1;
    }
}











?>