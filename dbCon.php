<?php
    $user = "root";
	//$user = "u309968265_sagar";
    $password = "";
	//$password = "A205243468";
    $db = "forum";
	//$db = "u309968265_event";
	$conn = new mysqli("localhost", $user, $password, $db) or die("Unabel to connect");
    //$conn = new mysqli("mysql.hostinger.in", $user, $password, $db) or die("Unabel to connect");
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }      
?>