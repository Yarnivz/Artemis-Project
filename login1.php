<?php
    include "functions.php";
    nonauthenticate();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

            <div class="signup">
                
                <form method="POST" action="login2.php"> 
                  
                   
                    
                 
                  <label for="chk" aria-hidden="true"> LOG IN </label>

                  <input type="text" name="email" placeholder="Email"  required>
                  <input type="password" name="password" placeholder="Password"  required>
                  <button type="submit"> Log in </button>
                  
                 
            
                  
                </form>
    
              </div>
          
        </nav>
        
             

    </section>

</body>
</html>