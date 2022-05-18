<?php

    include "assets/database/connection.php";
    $conn = dbConnection();
    session_start();
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sqlQuery = "SELECT * FROM Users WHERE `Email` = '$email' AND `Password` = MD5('$password');";
    
    $result = mysqli_query($conn,$sqlQuery);
    $num_rows = mysqli_num_rows($result);
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
            if ($num_rows < 1) {
                echo "Login Failed, please check if your e-mail or password is correct!";
                header("Location: login1.php");
            }
            else {
                echo "Login Succesful!";
                $_SESSION["isLoggedIn"] = True;
                $_SESSION["loggedUser"] = $loggedUser;
                header("Location: calendar.php");
            }
        
        ?>
    </h1>
</body>
</html>

<?php
    $conn -> close();
?>