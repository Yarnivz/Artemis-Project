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

    $result = mysqli_query($conn, $sqlInsert);
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
<h1>
    <?php
        if ($result == false){
            echo "Account creation failed";
            header("Location: singup.html");
        }
        else {
            echo "Account succesfully created";
        }
    ?>
</h1>
</body>
</html>