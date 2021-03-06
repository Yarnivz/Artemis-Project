<?php 
    
    include "assets/database/connection.php";
    include "functions.php";

    $conn = dbConnection();
    session_start();
    authenticate();
    
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
    <link rel="stylesheet" href="assets/css/settings.css" type="text/css">
</head>
<body>

    <section class="header"> 
        <nav>
            
            <div class="nav-links" id="navlinks"> 
                <a href="index.php"><img src="assets/images/log2.png" class="logo" alt="index.html"> </a>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="calendar.php">CALENDAR</a></li>
                    <li><a href="friends.php">FRIENDS</a></li>
                    <li><a href="about.php">ABOUT US</a></li>
                </ul>

            </div>
                
        <div class="settings">

            <h4 class="des">Account settings</h4>
            <div class="">
                <div class="row py-2">
                </div>
                    </br>
                    
                

                    <div class="S-details">

                        <h3>
                            First Name
                        </h3>
                        <br>
                        <h4 class="detail">
                            <?php
                                echo $firstname;
                            ?>
                        </h4 class="detail">
                        <br>
                        <h3>
                            Last Name
                        </h3>
                        <br>
                        <h4 class="detail">
                            <?php
                                echo $lastname;
                            ?>                            
                        </h4>
                        <br>
                        <h3>
                            E-mail
                        </h3>
                        <br>
                        <h4 class="detail">
                            <?php
                                echo $email;
                            ?>
                        </h4>

                    </div>
                    </div>

                    </br>
                    </br>

                    
                    <form method="POST" action = "preference1.php">
                        <button type="submit" class="set-out"> Preferences </button>
                    </form>

                    <form method="POST" action = "calendar-delete-data.php">
                        <button type="submit" class="set-out"> Delete events </button>
                    </form>

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
