<?php
    include "functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/about.css" type="text/css">
</head>
<body>
    <section class="header"> 
        <nav>
            
            <div class="nav-links" id="navlinks"> 
                <a href="index.html"><img src="assets/images/log2.png" class="logo" alt="index.html"> </a>
                <ul>
                    <?php
                        navbar();
                    ?>
                </ul>

            </div>

          
        </nav>
        <div class="text-box">
            <h1>
                MEET OUR TEAM
            </h1>
            <p>
        
                In April of 2022 four data science students came with an idea of making a platform for your event-presents ideas. </br>
                
            </p>  

    </section>

    <section class="works">
       
        <div class="row">
            <div class="Budapest">
                <img src="assets/images/shaff.JPG" alt="Budapest">
                <div class="layer">
                    <h3>
                        Shafiq Pohesh
                    </h3>
                    <p>
                        First year student of Data Scientist & Front-End Developer
                    </p>
                </div>
            </div>

            <div class="Portrait">
                <img src="assets/images/mia.jpg" alt="Portrait">
                <div class="layer">
                    <h3>
                        Mia Fetcu
                    </h3>
                    <p>
                        First year student of Data Scientist & Front-End Developer
                    </p>
                </div>
            </div>

            <div class="Portrait1">
                <img src="assets/images/Yarni.jpeg" alt="Portrait1">
                <div class="layer">
                    <h3 >
                        Yarni Van Zeebroeck 
                    </h3>
                    <p>
                        First year student of Data Scientist & Programmer
                    </p>
                </div>
            </div>

            <div class="Portrait1">
                <img src="assets/images/Henry.jpg" alt="Portrait2">
                <div class="layer">
                    <h3>
                        Henry
                    </h3>
                    <P>
                        First year student of Data Scientist & Co-Programmer
                    </P>
                </div>
            </div>

          
    </section>
   
</body>
</html>