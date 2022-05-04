<?php
    include "Assets/database/connection.php";

    $conn = dbConnection();

    $preference1 = $_POST["Preference1"];
    $preference1 = $_POST["Preference2"];
    $preference1 = $_POST["Preference3"];

    $prefQuery1 = "SELECT 'PreferenceID' FROM `Preferences` WHERE `Name` = $preference1;";
    $prefQuery2 = "SELECT 'PreferenceID' FROM `Preferences` WHERE `Name` = $preference2;";
    $prefQuery3 = "SELECT 'PreferenceID' FROM `Preferences` WHERE `Name` = $preference3;";

    $prefID1 = mysqli_query($conn,$prefQuery1)->fetch_all(MYSQLI_ASSOC);
    $prefID2 = mysqli_query($conn,$prefQuery2)->fetch_all(MYSQLI_ASSOC);
    $prefID3 = mysqli_query($conn,$prefQuery3)->fetch_all(MYSQLI_ASSOC);

    var_dump($prefQuery1);
    die();

    $sqlQuery = "SELECT * FROM `Preferences` WHERE `Email` = '$email' AND `Password` = '$password';";

    $currentUser = $_SESSION["creatingUser"]["UserID"];

    $sqlInsert1 = "INSERT INTO `User_Preferences` (`UserID`, `PreferenceID`) VALUES ('$currentUser','$prefID1');";
    $sqlInsert2 = "INSERT INTO `User_Preferences` (`UserID`, `PreferenceID`) VALUES ('$currentUser','$prefID2');";
    $sqlInsert3 = "INSERT INTO `User_Preferences` (`UserID`, `PreferenceID`) VALUES ('$currentUser','$prefID3');";

?>