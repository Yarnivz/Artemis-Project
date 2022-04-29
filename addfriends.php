<?php

$connection = new mysqli('localhost', 'root', 'password', 'DB_NAME');

$search = $_GET['search'];
$search = $mysqli -> real_escape_string($search);

$query = "SELECT username FROM member WHERE username LIKE '%".$search."%'";
$result= $mysqli -> query($query);

while($row = $result -> fetch_object()){
    echo "<div id='link' onClick='addText(\"".$row -> username."\");'>" . $row -> username . "</div>";  
}