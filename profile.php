<?php
session_start();
require("dbCon.php");
$name = $_SESSION["name"];
$sql = "select * from users where user_name='$name'";
	$result = $conn->query($sql);
	$row = $result->fetch_array();
	require("part1.html");
	echo "<center>Your Profile</center>";
	require("part2.html");
	echo "<div class=\"model-body row-fluid\" style=\"padding:0px\">";
	echo "<div class=\"col-md-2\">";?>
		<div class="input-group-addon-large" style="padding:0px">
                
                <h1 class="glyphicon glyphicon-user" style="font-size:800%"></h1>
                
		</div>
		<?php
		echo "</div>";
			echo "<div class=\"col-md-8\">";
			echo "<h1>".$name."</h1>";
			echo "User ID :".$row[0]."<br>";
			echo "User Email :".$row[2]."<br>";
			echo "User Level :".$row[4]."<br>";
			echo "User Type :".$row[6]."<br>";
			echo "User Department :".$row[7]."<br>";
		echo "</div>";
	echo "</div>";
	require("part3.html");
?>
