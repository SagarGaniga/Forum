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
                        $sql1 = "select topic_name from topic where topic_id = ".$row["post_topic"];
                        $topic = $conn->query($sql1);
                        $raw = $topic->fetch_array();
                        echo "<a href=\"comment.php?postid=".$row["post_id"]."\" style=\"color: white\">".$raw["0"]." > ".$row["post_title"]."</a>";
                        require("part2.html");
                        echo "<p>";
                        echo $row["post_content"];
                        echo "</p>";
                        
                        
                        
                        $sql1 = "select user_name from users where user_id = ".$row["post_by"];
                        $topic = $conn->query($sql1);
                        $raw = $topic->fetch_array();
                        //echo "<p>Posted By: ".$row["post_by"]."</p>";
                        echo"</div>";
                                echo"<div class=\"panel-footer\">"; 
                                    echo "<p>Post By: ".$raw[0]."<br>";
                                    echo "Posted On: ".$row["post_date"]."<br>";                    
                                echo"</div>";
                            echo"</div>";
                        echo"</div>";

                        $sql = "select * from comment where com_post=\"".$postid."\"";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc())
                            {                               
                                $sql1 = "select user_name from users where user_id = ".$row["com_by"];
                                $topic = $conn->query($sql1);
                                $raw = $topic->fetch_array();
                                require("part1.html");
                                echo "<p>Comment By: ".$raw[0]."<br>"; 
                                require("part2.html");
                                echo "<p>";
                                echo $row["com_content"];
                                echo "</p>";

                                    echo"</div>";
                                        echo"<div class=\"panel-footer\">";                                        
                                            echo "Posted On: ".$row["com_date"]."</p>";  
                                        echo"</div>";
                                    echo"</div>";
                                echo"</div>";
                            }
                        }        
                    }
                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
                    {
                        require("commentOption.php");
                    }
                    else
                    {
                        echo "<p>Hello Guest. <a href=\"signUp.php\">Register</a> or <a href=\"signUp.php\">Login</a> to Comment</p>";
                    }
                ?>
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