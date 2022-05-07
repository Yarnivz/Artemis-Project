<?php

    include "assets/database/connection.php";
    $conn = dbConnection();
    session_start();
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sqlQuery = "SELECT * FROM `Users` WHERE `Email` = '$email' AND `Password` = '$password';";
    
    $result = mysqli_query($conn,$sqlQuery);
    var_dump($result);
    $returnedRow = $result -> fetch_all(MYSQLI_ASSOC);
    $loggedUser = $returnedRow[0];

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
            if ($result == False OR $result["num_rows"] == 0) {
                echo "Login Failed, please check if your e-mail or password is correct!";
                echo "\r";
                var_dump($sqlQuery);
                echo "\r";
                var_dump($result);
                header("Location: login.html");
            }
            else {
                echo "Login Succesful!";
                $_SESSION["isLoggedIn"] = True;
                $_SESSION["loggedUser"] = $loggedUser;
                header("Location: calen.html");
            }
        
        ?>
    </h1>
</body>
</html>

<?php
    $conn -> close();
?>