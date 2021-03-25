<?php 
    session_start();
    if (isset($_SESSION['LoggedIn'])) {
        if ($_SESSION['LoggedIn']==1) {
            header("Location: home.php");
            die();
        }
    }else {
        header("Location: login.php");
        die();
    }        
?>