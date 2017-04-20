<?php
    session_start();
    $_SESSION["loggedin"]=false;
    unset($_SESSION["name"]);
    header("location: default.php");
?>