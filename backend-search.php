<?php
require("dbCon.php");
$term = mysqli_real_escape_string($conn, $_REQUEST['term']);
    if(isset($term))
    {
        $sql = "SELECT distinct cat_name FROM catalog WHERE cat_name LIKE '%" . $term . "%'";
        $sql1 = "SELECT distinct topic_name FROM catalog WHERE topic_name LIKE '%" . $term . "%'";
        $sql2 = "SELECT distinct post_title FROM catalog WHERE post_title LIKE '%" . $term . "%'";
        $result = $conn->query($sql);
        $result1 = $conn->query($sql1);
        $result2 = $conn->query($sql2);
        if($result->num_rows > 0 || $result1->num_rows > 0 || $result2->num_rows > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
                echo "<p>" . $row['cat_name'] . "</p>";
            }
            while($row = mysqli_fetch_array($result1))
            {
                echo "<p>" . $row['topic_name'] . "</p>";
            }
            while($row = mysqli_fetch_array($result2))
            {
                echo "<p>" . $row['post_title'] . "</p>";
            }

            // Close result set
            mysqli_free_result($result);
            mysqli_free_result($result1);
            mysqli_free_result($result2);
        } 
        else
        {
            echo "<p>No matches found</p>";
        }

    }
    // close connection
    mysqli_close($conn);
?>