<?php 

    session_start();

    include("connection.php");
    include("login.php");
   
    ?>


<html>
<head>
    <link rel="stylesheet" type="text/css" href="login_style.css" media="screen"/>

	<title> MY Portal - Shui Cheong </title>
	
</head>
<body>
    
    <?php
                if (isset($_SESSION['IS_LOGIN'])){
                    echo $_SESSION['IS_LOGIN'];
                }
                unset($_SESSION['IS_LOGIN']);
            ?>

    <section>
        <form name="form" action="login.php" method="POST">
            <h1> 瑞 昌 汽 車 </h1>
            
            <?php 
                if(isset($_GET['error'])) { ?>
	  		<div class="alert-danger" role="alert"><?=htmlspecialchars($_GET['error'])?></div>
		    <?php } ?>
            
            <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                <input type="text" id="user" name="user" value="<?php echo $username_cookie?>" required>
                <label for="">Email</label>
            </div>
            <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="password" id="pwd" name="pwd" value="<?php echo $password_cookie?>" required>
                <label for="">Password</label>
            </div>
            <div class="forget">
                <label for=""><input type="checkbox" name="rememberMe" id="rememberMe" <?php echo $set_remember?>>Remember Me</label>
              <a href="#">Forget Password</a>
            </div>
            <button type="submit" value="Login" name = "submit">Login</button>
            </div>
        </form>
    </section>
    
            
            
</body>
</html>
