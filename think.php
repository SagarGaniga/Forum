<?php
    session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
    {
        header("location:topic.php");
    }
    else
    {
        header("location:signUp.php");
    }
?>