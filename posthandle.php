<?php
	include"dbCon.php";
	session_start();
	$title=$_POST["title"];
	$topicname=$_POST["topic"];
	$content=$_POST["content"];
	$userid=$_SESSION["id"];
	$sql="select topic_id,topic_cat from topic where topic_name='$topicname'";
	$result=$conn->query($sql);
	$row=$result->fetch_array();
	$topicid=$row[0];
	$topicCat = $row[1];
	$date = date("Y-m-d h:i:sa");
	//echo $topicid;
	$sql="insert into posts(post_title,post_by,post_content,post_topic,post_cat,post_date) values('$title','$userid','$content','$topicid','$topicCat','$date')";
	$conn->query($sql);
	header("location:default.php");
?>
