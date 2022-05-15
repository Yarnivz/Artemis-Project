<?php

    include "Assets/database/connection.php";

    $conn = dbConnection();
    session_start();
    $preference1 = $_POST["Preference1"];
    $preference2 = $_POST["Preference2"];
    $preference3 = $_POST["Preference3"];

    $prefQuery1 = "SELECT PreferenceID FROM `Preferences` WHERE `Name` = '$preference1';";
    $prefQuery2 = "SELECT PreferenceID FROM `Preferences` WHERE `Name` = '$preference2';";
    $prefQuery3 = "SELECT PreferenceID FROM `Preferences` WHERE `Name` = '$preference3';";

    $prefID1Qry = mysqli_query($conn,$prefQuery1)->fetch_all(MYSQLI_ASSOC);
    $prefID2Qry = mysqli_query($conn,$prefQuery2)->fetch_all(MYSQLI_ASSOC);
    $prefID3Qry = mysqli_query($conn,$prefQuery3)->fetch_all(MYSQLI_ASSOC);

    $prefID1 = $prefID1Qry[0]["PreferenceID"]; 
    $prefID2 = $prefID2Qry[0]["PreferenceID"];
    $prefID3 = $prefID3Qry[0]["PreferenceID"];

    $sqlQuery = "SELECT * FROM `Preferences` WHERE `Email` = '$email' AND `Password` = '$password';";

    $currentUser = $_SESSION["creatingUser"]["UserId"];

    $sqlInsert1 = "INSERT INTO `User_Preferences` (`UserID`, `PreferenceID`) VALUES ('$currentUser','$prefID1');";
    $sqlInsert2 = "INSERT INTO `User_Preferences` (`UserID`, `PreferenceID`) VALUES ('$currentUser','$prefID2');";
    $sqlInsert3 = "INSERT INTO `User_Preferences` (`UserID`, `PreferenceID`) VALUES ('$currentUser','$prefID3');";

    mysqli_query($conn,$sqlInsert1);
    mysqli_query($conn,$sqlInsert2);
    mysqli_query($conn,$sqlInsert3);

    header("Location: login1.php");
?>

<?php
    $conn -> close();
?>