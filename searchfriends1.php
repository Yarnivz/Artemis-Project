<!-- Instruction about our site -->
<!-- Log In or Create an Account
Check your friend's Birthday or the Event
Scroll, choose, go to the shop's website
Buy the selected gift and enjoy the Birthday! -->

<?php
    include "functions.php";
    authenticate();
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
                <a href="index1.php"><img src="assets/images/log2.png" class="logo" alt="index.html"> </a>
                <ul>
                    <?php
                        navbar();
                    ?>
                </ul>

            </div>
            
            <div class="find-friends-container">
                <div class="find-friends-header">
                    <div class="heading">
                        <div class="search">
                            <img src="assets/images/search.png" alt="">

                            <form action="searchfriends.php" method="POST">
                                
                                <input type="text" class="enterA" placeholder="Enter a friend's name" name="fullname">
                                
                                <button type="submit" value="Search" class="search1">
                                    Search
                                </button>

                            </form>

                        </div>
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