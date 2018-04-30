<?php
    $login_error = FALSE;
    $logged_out = FALSE;
    if(isset($_POST["pwd"])){
        include("back/database.php");

        $sql = "SELECT password FROM users WHERE name='{$_POST['email']}'";
        $result = $connection->query($sql);
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if($row["password"] != hash('sha256', $_POST["pwd"])){
                $login_error = TRUE;
            } else {
                $token = hash('sha256', $_POST["pwd"] . time());
                if(isset($_POST["remember"])){
                    setcookie("auth_token", $token, time()+60*60*24*30);
                } else {
                    setcookie("auth_token", $token);
                }
                $connection->query("DELETE FROM `tokens` WHERE `user` = '{$_POST['email']}'");
                $servtoken = "INSERT INTO `tokens` (`user`, `token`) VALUES ('{$_POST['email']}', '{$token}')";
                $connection->query($servtoken);
                header("Location: http://localhost/");
            }
        } else {
            $login_error = TRUE;
        }
    }

    #Normal Template Start point

	$title="Login";
	$active="login";

	#include("back/database.php"); #if database is needed.
    include("back/authcheck.php");

    if(isset($_GET["logout"]) and $loggedin){
        include("back/database.php");
        $connection->query("DELETE FROM `tokens` WHERE `user` = '{$username}'");
        setcookie("auth_token", "", time()-3600);
        $logged_out = TRUE;
        $loggedin = FALSE;
        $user_level = 2;
    }

	include("navbar.php");
?>
<div class="container body-content">
    <br>
    <form class="form-horizontal" action="/login.php" method="POST">
        <div class="form-group row">
        	<span class="col-sm-3"></span>
            <label class="control-label col-sm-1" for="email">Email:</label>
            <div class="col-sm-5">
                <?php if(!$login_error): ?>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                <?php else: ?>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $_POST['email']?>" autofocus>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group row">
        	<span class="col-sm-3"></span>
            <label class="control-label col-sm-1" for="pwd">Password:</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
            </div>
        </div>
        <div class="form-group row">
        	<span class="col-sm-4"></span>
            <div class="col-sm-8">
                <div class="checkbox">
                    <label><input type="checkbox" name="remember"> Remember me</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
        	<span class="col-sm-4"></span>
            <div class="col-sm-8">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <?php if($login_error): ?>
            <div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> Username or Password is Incorrect</div>
        <?php elseif($logged_out): ?>
            <div class="alert alert-info"><i class="fa fa-check"></i> You have been logged out.</div>
        <?php endif ?>

        <div class="row">
        	<span class="col-sm-4"></span>
            <span class="col-sm-8">
                Don’t have an account? &ensp;
            <a class="txt2" href="#">
                Sign Up
            </a>
        </span>
        </div>
    </form>
</div>

<?php
	include("footer.php");
?>