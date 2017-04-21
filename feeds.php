
<?php
    require("dbCon.php");
    $sql = "select * from posts";
    $result = $conn->query($sql);
    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            require("part1.html");
            echo "<a href=\"comment.php?postid=".$row["post_id"]."\" style=\"color: white\">#".$row["post_id"]." ".$row["post_title"]."</a>";
            require("part2.html");
            echo "<p>";
            echo $row["post_content"];
            echo "</p>";
            
            echo "<p>Posted On: ".$row["post_date"]."</p>";
            echo "<p><a href=\"comment.php?postid=".$row["post_id"]."\" style=\"color: blue\">Comments: ".$row["Com_count"]."</a></p>";
            
            $sql1 = "select topic_name from topic where topic_id = ".$row["post_topic"];
            $topic = $conn->query($sql1);
            $raw = $topic->fetch_array();
            echo "<p>Post Topic: ".$raw[0]."</p>";
            
            $sql1 = "select user_name from users where user_id = ".$row["post_by"];
            $topic = $conn->query($sql1);
            $raw = $topic->fetch_array();
            echo "<p>Post By: ".$raw[0]."</p>";
            //echo "<p>Posted By: ".$row["post_by"]."</p>";
            
            require("part3.html");
        }
    }
?>