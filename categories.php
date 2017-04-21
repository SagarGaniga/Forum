<body>
    <div style="background:white;padding:10px">
        <h4 style="color:grey">Categories</h4><hr>
        <?php
            require("dbCon.php");
            $sql = "select cat_name,cat_id from categories where 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    echo "<a href=\"#\">".$row["cat_name"]."</a>";
                    $id=$row["cat_id"];
                    $sql = "select topic_name from topic where topic_cat='$id'";
                    $res = $conn->query($sql);
                    while($raw=$res->fetch_assoc())
                    {
                        echo "<br>";
                        echo "<a href=\"#\">".$raw["topic_name"]."</a>";
                    }
                    echo "<br>";   
                }
            }
        ?>
    </div>
</body>