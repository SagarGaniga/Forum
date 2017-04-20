<?php
    echo "ni";
    require("dbCon.php");
    $sql = "Select * from catelog";
    $result = $conn->query($sql);
    $array = mysql_fetch_assoc($result);
    echo json_encode($array);
?>