<?php

    include "Assets/database/connection.php";

    $conn = dbConnection();
    session_start();
    
    $firstname = $_POST["FirstName"]
   
    $sqlQuery = "SELECT FirstName FROM Users WHERE FirstName LIKE '%".$firstname."%'";
    
    $result =  mysqli_query($conn, $sqlQuery);

    while($row == $result -> fetch_all(MYSQLI_ASSOC)){
        
    }
    
    
    // echo "<div id='link' onClick='addText(\"".$row -> username."\");'>" . $row -> username . "</div>";  
    
    // $connection = new mysqli('localhost', 'root', 'password', 'DB_NAME');
    
    // $search = $_GET['search'];
    // $search = $mysqli -> real_escape_string($search);
    
    // $result= $mysqli -> query($query);
    
        
?>