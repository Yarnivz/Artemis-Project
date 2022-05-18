<?php
    include "assets/database/connection.php";
    $conn = dbConnection();
    session_start();

    $_SESSION["isLoggedIn"] = False;
    $_SESSION["loggedUser"] = "";

    header("Location: login1.php")
?>