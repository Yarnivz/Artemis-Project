<?php
    include "assets/database/connection.php";
    $conn = dbConnection();
    session_start();

    $_SESSION["isLoggedIn"] = False;
    $_SESSION["loggedUser"] = "";
    $_SESSION["creatingUser"] = "";

?>

<script src="Assets/js/logout.js"></script>

