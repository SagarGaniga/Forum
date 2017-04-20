
<!DOCTYPE html>
<html>
	<head>
		<title>New Post</title>
	</head>
	<body>
		<form id="newpost" method="post" action="posthandle.php">
<div class="form-group">
			<label for="title">Title: </label>
			<input type="text" class="form-control" name="title" id="title"><br>
			<label for="title">Topic: </label>
			<select name="topic" id="topic" class="form-control">
				<?php
					require("dbCon.php");
					$sql="Select distinct topic_name from topic where 1";
					$result=$conn->query($sql);
					if($result->num_rows>0)
					{
						while($row=$result->fetch_assoc())
						{
							echo "<option value=\"".$row["topic_name"]."\">".$row["topic_name"]."</option>";
						}
					}
				?>
			</select>
			<br><br>
			<label for="content">Post Description:</label><br>
			<textarea name="content" form="newpost" class="form-control" rows="12" id="content"></textarea><br><br>
			<input type="submit" name="submit" value="Post" class="btn-lg btn-primary">
</div>
		</form>
	</body>
</htiml>

