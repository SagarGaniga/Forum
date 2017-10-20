<?php
    $user = "root";
    $password = "";
    $db = "forum";
	$conn = new mysqli("localhost", $user, $password, $db) or die("Unabel to connect");
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }      
?>
