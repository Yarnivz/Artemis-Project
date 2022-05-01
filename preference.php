<?php
    include "Assets/database/connection.php";

    $conn = dbConnection();

    $preference1 = $_POST["Preference1"];
    $preference1 = $_POST["Preference2"];
    $preference1 = $_POST["Preference3"];

    $sqlQuery = "SELECT * FROM `Preferences` WHERE `Email` = '$email' AND `Password` = '$password';";

    $sqlInsert = "INSERT INTO `User_Preferences` (`UserID`, `PreferenceID`) VALUES ('$_SESSION["loggedUser"]["UserID"]','');";

?>