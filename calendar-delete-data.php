<?php
 
include "Assets/database/connection.php";

$eventName = $_POST['Name'];
$eventType = $_POST['Type'];
$date = $_POST['Date'];

$conn = dbConnection();

$sqlDelete = "DELETE FROM 'Events' WHERE 'Name'= $eventName AND 'Type'= $eventType AND 'Date'= $date ;";

$result = mysqli_query($conn, $sqlDelete);

if($result == true)
{
    echo "<h2>Stored into the data</h2>";
}
else
{
    echo "<h2>Unstored in the data</h2>";
}

?>