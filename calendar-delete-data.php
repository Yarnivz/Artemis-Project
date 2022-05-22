<?php
    
    include "Assets/database/connection.php";

    $eventName = $_POST['Name'];
    $eventType = $_POST['Type'];
    $date = $_POST['Date'];

    $conn = dbConnection();

    $sqlDelete = "DELETE FROM `Events` WHERE `Name` = $eventName AND `Type` = '$eventType' AND `Date` = $date;";

    $sqlQuery = "SELECT * FROM `Events` WHERE `Name` = $eventName AND `Type` = '$eventType' AND `Date` = $date;";

    $result = mysqli_query($conn, $sqlDelete);
    $queryResult = mysqli_query($conn, $sqlQuery);


    if($result == true)
    {
        echo "<h2>Data deletion completed!</h2>";
    }
    else
    {
        echo "<h2>Data deletion failed!</h2>";
    }

?>