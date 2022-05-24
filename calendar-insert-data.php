<?php 
include "Assets/database/connection.php";
$conn = dbConnection();
session_start();

$eventName = $_POST["eventName"];
$eventType = $_POST["eventType"];
$date = $_POST["eventDate"];

var_dump($eventName);
var_dump($eventType);
var_dump($date);
echo "<br>";

$userID = $_SESSION["loggedUser"]["UserId"];

$_SESSION["addEvent"]["eventName"] = $eventName;
$_SESSION["addEvent"]["eventType"] = $eventType;
$_SESSION["addEvent"]["date"] = $date;


$sqlQuery = "SELECT CategoryID FROM event_category WHERE `Name` = '$eventType';";
$queryResult = mysqli_query($conn,$sqlQuery);
$returnedRow = $queryResult -> fetch_all(MYSQLI_ASSOC);
$eventID = $returnedRow[0]["CategoryID"];

var_dump($userID);
$sqlInsert = "INSERT INTO Events (`Name`, `EventCategory`, `Date`, `UserID`) VALUES ('$eventName','$eventID', '$date', '$userID');";

$result = mysqli_query($conn, $sqlInsert);

if($result != False)
{
    echo "<h2>Stored into the data</h2>";
    header("Location: localstorage.php");
}
else
{
    echo "<h2>Unstored in the data</h2>";
    header("Location: localstorage.php");
}

?>