<?php 
    
    include "assets/database/connection.php";

    $conn = dbConnection();
    session_start();

    if ($_SESSION["isLoggedIn"] != True) {
        header("Location: login.html");
    }
    $firstname = $_SESSION["loggedUser"]["FirstName"]; 
    $lastname = $_SESSION["loggedUser"]["LastName"]; 
    $email = $_SESSION["loggedUser"]["Email"];
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
                
            <div class="settings">
        <h4 class="des">Account settings</h4>
        <div class="">
            <div class="row py-2">
            </div>
                </br>
                </br>
                </br>
                </br>
                </br>
                </br>
                </br>
                </br>
                </br>

                <div class="S-details">

                    <h3>
                    <?php
                            echo $firstname;
                        ?>
                    </h3>
                        <br>
                        <h3>
                    <?php
                            echo $firstname;
                        ?>
                    </h3>
                        <br>
                        <h3>
                    <?php
                            echo $firstname;
                        ?>
                    </h3>

                </div>


            <div class="" id="deactivate">
                <div class="tag">
                </div>

                </br>
                </br>
                </br>
                </br>
                </br>
                </br>
                </br>
                </br>
              
                



                <form method="POST" action = "logout.php">
                    <button type="submit" class="set-out"> Log out </button>
                </form>
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
