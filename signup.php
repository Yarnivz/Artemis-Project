<?php

    include "assets/database/connection.php";

    $conn = dbConnection();

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $gender = $_POST["gender"];
    $birthdate = $_POST["birthdate"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $sqlInsert = "INSERT INTO `Users` (`firstName`, `lastName`, `gender`, `email`, `password`, `birthdate`) VALUES ('$firstname', '$lastname', '$gender', '$email', '$password', '$birthdate');";

    mysqli_query($conn, $sqlInsert);
?>