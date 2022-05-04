<?php

    include "Assets/database/connection.php";

    $connection = dbConnection(); 

    $friends = $_GET["friends"];
    $sqlQuery = "SELECT Friends FROM Users";

    $result = mysqli_query($connection, $sqlQuery);
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FriendsList</title>
</head>
<body>
    
</body>
</html>