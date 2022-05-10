<?php

    include "Assets/database/connection.php";

    $conn = dbConnection();
    session_start();
    
    $fullname = $_POST["fullname"];
   
    $sqlQuery = "SELECT `fullname` FROM Users WHERE `fullname` LIKE '%$fullname%';";
    
    $result =  mysqli_query($conn, $sqlQuery);

    $num_rows = mysqli_num_rows($result);

    $users = $result -> fetch_all(MYSQLI_ASSOC);
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content-ppu="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
</head>
<body>

    <section class="header"> 
        <nav>
            
            <div class="nav-links" id="navlinks"> 
                <a href="index.html"><img src="assets/images/log2.png" class="logo" alt="index.html"> </a>
                <ul>
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="login.html">LOGIN</a></li>
                    <li><a href="singup.html">SIGNUP</a></li>
                    <li><a href="about.html">ABOUT US</a></li>
                </ul>

            </div>
            
            <div class="find-friends-container">
                <div class="find-friends-header">
                    <div class="heading">
                        <?php
                            if ($num_rows < 1) {
                                echo "No users found";
                            }
                            else {
                                foreach($users as $user) {
                                    echo $user['fullname'];
                                    echo "<br>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
          
      
      
          
        </nav>
        

    </section>


<script>

    var navlinks = document.getElementById("navlinks");

    function showMenu(){
        navlinks.style.right= "0"
    }
    function hideMenu(){
        navlinks.style.right="-200px";
    }

</script>

</body>
</html> 