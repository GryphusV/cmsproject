<div class="well">
    <!--    <h4>Blog Search</h4>-->
    <form action="includes/login.php" method="post">
        <div class="form-group">
            <center><label>Log in</label></center>
            <input name="user_name" type="text" class="form-control" placeholder="username">
        </div>
        <div class="input-group">
            <input name="user_password" type="password" class="form-control" placeholder="password">
            <span class="input-group-btn">
            <button class="btn btn-primary" name="login" type ="submit">Log In</button>
            </span>
        </div>
    </form><!--search form-->
    <form action="registration.php" method="post">
        <div class="form-group">
            <center>

                <h6>Don't have an account yet?</h6>
        <button class="btn btn-primary" name="signup" type ="submit">Sign Up</button>
            </center>
        </div>
    </form>
    <!-- /.input-group -->
</div>