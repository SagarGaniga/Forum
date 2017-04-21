<?php
	include"dbCon.php";
	session_start();
	$content=$_POST["content"];
	$postid=$_SESSION["postid"];
	$userid=$_SESSION["id"];
	$date = date("Y-m-d h:i:sa");
	$sql="insert into comment(com_by,com_content,com_date,com_post) values('$userid','$content','$date','$postid')";
	$conn->query($sql);
	$sql="update posts set Com_count=Com_count+1 where post_id='$postid'";
	$conn->query($sql);
	header("location:comment.php?postid=".$postid);
?>