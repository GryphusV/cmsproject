<div class="well">
    <!--    <h4>Blog Search</h4>-->
    <form action="includes/logout.php" method="post">
        <div class="form-group">
            <center>
            <label><?php echo "Welcome, " . $_SESSION['user_fname'] . " " . $_SESSION['user_lname'] ?></label>
            </center>


        </div>
        <div class="form-group">
            <center>
                <button class="btn btn-primary" name="logout" type ="submit">Log Out</button>
            </center>


        </div>



    </form><!--search form-->
    <!-- /.input-group -->
</div>