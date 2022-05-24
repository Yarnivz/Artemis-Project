<?php
    include "assets/database/connection.php";
    $conn = dbConnection();
    session_start();

    $_SESSION["isLoggedIn"] = False;
    $_SESSION["loggedUser"] = "";

?>

<script src="Assets/js/logout.js"></script>

