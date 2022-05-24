<?php
    include "Assets/database/connection.php";
    include "functions.php";
    $conn = dbConnection();
    $userID = $_SESSION["loggedUser"]["UserId"];
    $sqlQuery1 = "SELECT * FROM Events WHERE `UserId` = '$userID';";
    $result1 = mysqli_query($conn,$sqlQuery1);
    $events = $result1 -> fetch_all(MYSQLI_ASSOC);

    foreach($events as $event){

        $eventName = $event["Name"];
        $eventTypeID = $event["EventCategory"];
        $eventDate = $event["Date"];

        $sqlQuery2 = "SELECT Name FROM Event_Category WHERE `CategoryID` = '$eventTypeID';";
        $result2 = mysqli_query($conn,$sqlQuery2);
        $returnedRow = $result2 -> fetch_all(MYSQLI_ASSOC);
        $eventType = $returnedRow[0]["Name"];

    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
 
            echo "<div class='eventName'>$eventName</div>";
            echo "<div class='eventType'>$eventType</div>";
            echo "<div class='eventDate'>$eventDate</div>";
            echo "<br>";
        }
        

    ?>
    
<script src="Assets/js/localstorage.js"></script>
</body>
</html>