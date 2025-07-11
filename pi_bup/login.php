<?php

    include("connection.php");
        
    if (isset($_POST['submit'])) {
        $username = $_POST['user'];
        $password = $_POST['pwd'];
        

        $sql = "select * from login where username = '$username' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  

        
        if($count > 0){  
            
            setcookie('KEEP_LOGIN',time()+60*60*24*7);
            setcookie('user',$username,time()+60*60*24*365*1000);
         
        if(isset($_POST['rememberMe'])){
			setcookie('username',$username,time()+60*60*24*7);
			setcookie('password',$password,time()+60*60*24*7);
		}else{
			setcookie('username',$username,30);
			setcookie('password',$password,30);
		}
		
		header("Location: home.php");
		die();   
            
        }  
        else{  
            echo  '<script>
           
                        window.location.href = "index.php?error=***Incorrect username and password.";

                    </script>';
        }     
    }
    
        $user =  $_COOKIE['user'];
        $username_cookie='';
        $password_cookie='';
        $set_remember="";
        
        if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
            $username_cookie=$_COOKIE['username'];
            $password_cookie=$_COOKIE['password'];
            $set_remember="checked='checked'";	
            
        }
        
        if(isset($_COOKIE['KEEP_LOGIN'])){
            	
         header("Location: home.php");   
        }
        
    ?>
