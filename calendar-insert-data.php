<?php
    
    include "Assets/database/connection.php";

    $eventName = $_POST['Name'];
    $eventType = $_POST['Type'];
    $date = $_POST['Date'];

    $conn = dbConnection();

    $sql = "INSERT INTO `Events` (`Name`, `Type`, `Date`) VALUES ('$eventName','$eventType', '$date');";

    $sqlQuery = "SELECT * FROM `Events` WHERE `Name` = $eventName AND `Type` = '$eventType' AND `Date` = $date;";

    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_query($conn, $sqlQuery);


    if($result == true)
    {
        echo "<h2>Data is stored!</h2>";
    }
    else
    {
        echo "<h2>Error data is not stored, please try again!</h2>";
    }

?>