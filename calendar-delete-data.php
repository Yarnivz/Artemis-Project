<?php 
    include "Assets/database/connection.php";
    $conn = dbConnection();
    session_start();

    $userID = $_SESSION["loggedUser"]["UserId"];

    $sqlQuery = "SELECT * FROM Events WHERE `UserId` = '$userID';";
    $queryResult = mysqli_query($conn,$sqlQuery);
    $events = $queryResult -> fetch_all(MYSQLI_ASSOC);

    var_dump($userID);
    foreach($events as $event) {
        $eventName = $event["Name"];
        $eventDate = $event["Date"];
        $catID = $event["EventCategory"];

        var_dump($eventName);
        echo "<br>";
        var_dump($eventDate);
        echo "<br>";
        var_dump($catID);
        echo "<br>";

        $sqlDelete = "DELETE FROM `Events` WHERE `Name` = '$eventName' AND `EventCategory` = '$catID' AND `Date` = '$eventDate' AND `UserId` = '$userID';";
    
        $result = mysqli_query($conn, $sqlDelete);

        if($result != false)
        {
            echo "<h2>Deletion succesful</h2>";
            header("Location: localstorage.php");
        }
    }

?>