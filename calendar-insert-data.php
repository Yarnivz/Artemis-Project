<?php
 
include "Assets/database/connection.php";

$eventName = $_POST['Name'];
$eventType = $_POST['Type'];
$date = $_POST['Date'];

$conn = dbConnection();

$sql = "INSERT INTO 'Events' ('Name', 'Type', 'Date') VALUES ('$eventName','$eventType', '$date');";

$result = mysqli_query($conn, $sql);

if($result == true)
{
    echo "<h2>Stored into the data</h2>";
}
else
{
    echo "<h2>Unstored in the data</h2>";
}

?>