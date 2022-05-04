<?php 
    
    include "assets/database/connetion.php";

    $conn = dbconnection();
    session_start();

    $firstname = $_SESSION["loggedUser"][0]["firstName"]; 
    $lastname = $_SESSION["loggedUser"][0]["lastName"]; 
    $email = $_SESSION["loggedUser"][0]["email"]; 
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
        <h4 class="">Account settings</h4>
        <div class="">
            <div class="row py-2">
            </div>
                <h3>
                   <?php
                        echo $firstname;
                        echo "</br>";
                        echo $lastname;
                        echo "</br>";
                        echo $email;

                   ?>
                </h3>
            
            <div class=""> <button class="btn btn-primary mr-3">Save</button> 
                <button class="btn border button">Cancel</button> 
            </div>

            <div class="" id="deactivate">
                <div class="tag"> <b>Logout</b>
                </div>
                <button type="submit"> Log out </button>
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