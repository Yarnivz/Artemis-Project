<?php

    include "Assets/database/connection.php";
    include "functions.php";

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
                <a href="index.php"><img src="assets/images/log2.png" class="logo" alt="index.html"> </a>
                <ul>
                    <?php
                        navbar();
                    ?>
                </ul>

            </div>
            
            <div class="find-friends-container">
                <div class="find-friends-header">
                    <div class="S-details">
                        <?php
                            if ($num_rows < 1) {
                                echo "No users found";
                            }
                            else {
                                foreach($users as $user) {
                                    echo "<button class='addfriend' type='submit'> + </button>";
                                    echo "<h4>" . $user['fullname'] . "</h4>";
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