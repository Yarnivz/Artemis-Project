<?php
    function dbConnection() {
        $hostname = "localhost";
        $username = "root";
        $password = "root";
        $databasename = "Bday";
        $port = "3306";

        $conn = mysqli_connect($hostname, $username, $password, $databasename, $port);

        if ($conn == false) {
            echo "Can't connect to the database!";
            die();
        }

        return $conn;
    }
    
?>