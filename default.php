<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en">
  <?php
    require("header.php");
  ?>
  
<script>
	$("#post").click(function(){
		$("#box").load("post.php");
	});
</script>
  <body style="padding: 0px; margin: 0px;background: #ECEFF1;width:100%">
    <?php 
      require("background_pic.html");
      require("navBar.php"); 
      require("page_divider.php");
    ?>
  </body>
</html>