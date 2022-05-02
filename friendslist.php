<?php

    include "Assets/database/connection.php";

    $connection = dbConnection(); 

    $friends = $_POST["friends"];
    $sqlQuery = "SELECT Friends FROM Users";

    $result = mysqli_query($connection, $sqlQuery);
    
    
?>