<?php

    include "Assets/database/connection.php";

    $conn = dbConnection();
    session_start();
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $gender = $_POST["gender"];
    $birthdate = $_POST["birthdate"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $addfriend = $_POST["add friend"];






    // $connection = new mysqli('localhost', 'root', 'password', 'DB_NAME');

    // $search = $_GET['search'];
    // $search = $mysqli -> real_escape_string($search);

    // $query = "SELECT username FROM member WHERE username LIKE '%".$search."%'";
    // $result= $mysqli -> query($query);

    // while($row = $result -> fetch_object()){
    //     echo "<div id='link' onClick='addText(\"".$row -> username."\");'>" . $row -> username . "</div>";  
    // }

?>