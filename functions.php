<?php
    function authenticate() {
        if ($_SESSION["isLoggedIn"] != True) {
            header("Location: login.html");
        }
    }

    function nonauthenticate() {
        if ($_SESSION["isLoggedIn"] == True) {
            header("Location: login.html");
        }
    }
?>