<?php

    include "assets/database/connection.php";

    $conn = dbConnection();
    session_start();
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $gender = $_POST["gender"];
    $birthdate = $_POST["birthdate"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $fullname = $firstname . " " . $lastname;

    $sqlInsert = "INSERT INTO `Users` (`firstName`, `lastName`,`fullname`, `gender`, `email`, `password`, `birthdate`) VALUES ('$firstname', '$lastname', '$fullname', '$gender', '$email', '$password', '$birthdate');";

    $sqlQuery = "SELECT * FROM `Users` WHERE `Email` = '$email' AND `Password` = '$password';";

    $result = mysqli_query($conn, $sqlInsert);

    $queryResult = mysqli_query($conn, $sqlQuery);

    $returnedRow = $queryResult -> fetch_all(MYSQLI_ASSOC);
    $creatingUser = $returnedRow[0];

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
            header("Location: singup1.php");
        }
        else {
            echo "Account succesfully created";
            $_SESSION["creatingUser"] = $creatingUser;
            header("Location: preference1.php");
        }
    ?>
</h1>
</body>
</html>


<?php
    $conn -> close();
?>