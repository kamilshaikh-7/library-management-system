<?php
    session_start();
    if(isset($_SESSION['login_user'])){
        unset($_SESSION['login_user']);
    }
    else if(isset($_SESSION['login_admin'])){
        unset($_SESSION['login_admin']);
    }
    header("location:main.php");
?>