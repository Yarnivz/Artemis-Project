<?php
    function authenticate() {
        if ($_SESSION["isLoggedIn"] != True) {
            header("Location: login1.php");
        }
    }

    function nonauthenticate() {
        if ($_SESSION["isLoggedIn"] == True) {
            header("Location: calendar.php");
        }
    }

    function navbar() {
        if ($_SESSION["isLoggedIn"] == True) {
            echo '<li><a href="index.php">HOME</a></li>';
            echo '<li><a href="calendar.php">CALENDAR</a></li>';
            echo '<li><a href="settings.php">SETTINGS</a></li>';
            echo '<li><a href="about.php">ABOUT US</a></li>';
        }
        else {
            echo '<li><a href="index.php">HOME</a></li>';
            echo '<li><a href="login1.php">LOGIN</a></li>';
            echo '<li><a href="signup1.php">SIGNUP</a></li>';
            echo '<li><a href="about.php">ABOUT US</a></li>';
        }
    }
?>