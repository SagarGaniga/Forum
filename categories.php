<body>
    <div style="background:white;padding:10px">
        <h4 style="color:grey">Categories</h4><hr>
        <?php
            require("dbCon.php");
            $sql = "select cat_name from categories where 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    echo "<a href=\"#\">".$row["cat_name"]."</a>";
                    echo "<br><br>";   
                }
            }
        ?>
    </div>
</body>