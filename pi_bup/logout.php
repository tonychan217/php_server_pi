<?php

if (isset($_COOKIE['KEEP_LOGIN'])) {
    
    unset($_COOKIE['KEEP_LOGIN']); 
    setcookie('KEEP_LOGIN', '', -1, '/'); 
    
    header('location:index.php');
    return true;
    
} else {
    
    return false;
}


?>
