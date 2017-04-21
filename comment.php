<!DOCTYPE html>
<html>
    <?php
        session_start();
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
        ?>
        <div class="modal-body row-fluid">
            <div class="col-md-8" id="box">
                <?php
                    require("dbCon.php");
                    $postid=$_GET["postid"];
                    $_SESSION["postid"]=$postid;
                    $sql = "select * from posts where post_id=\"".$postid."\"";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0)
                    {
                        $row = $result->fetch_assoc();
                        require("part1.html");
                        echo "#".$row["post_id"]." ".$row["post_title"];
                        require("part2.html");
                        echo "<p>";
                        echo $row["post_content"];
                        echo "</p>";
                        
                        echo "<p>Posted On: ".$row["post_date"]."</p>";
                        
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

                        $sql = "select * from comment where com_post=\"".$postid."\"";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc())
                            {
                                require("part1.html");
                                require("part2.html");
                                echo "<p>";
                                echo $row["com_content"];
                                echo "</p>";
                                
                                echo "<p>Posted On: ".$row["com_date"]."</p>";
                                
                                $sql1 = "select user_name from users where user_id = ".$row["com_by"];
                                $topic = $conn->query($sql1);
                                $raw = $topic->fetch_array();
                                echo "<p>Comment By: ".$raw[0]."</p>";
                                
                                require("part3.html");
                            }
                        }        
                    }
                ?>
                <form id="newcomment" method="post" action="commenthandle.php">
                    <div class="form-group">
                        <label for="content">Comment:</label><br>
                        <textarea name="content" form="newcomment" class="form-control" rows="6" id="content"></textarea><br><br>
                        <input type="submit" name="submit" value="Comment" class="btn-lg btn-primary">
                    </div>
                </form>
            </div>
            <div class="col-md-4">
            <!-- Your second column here -->
                <?php
                    require("categories.php");
                    echo "<br>";
                    require("panel.php");
                ?>
            </div>
        </div>
    </body>
</htiml>