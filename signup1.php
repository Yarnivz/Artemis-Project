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
                <img src="assets/images/log2.png" class="logo" alt="index.html">
                <ul>
                    <?php
                        navbar();
                    ?>
                    
                </ul>

            </div>

            <div class="signup">
                
                <form method="POST" action="signup2.php"> 
                  
                   
                    
                 
                    <label for="chk" aria-hidden="true"> Make Account </label>
                    <input type="text"  name="firstname" placeholder="Firstname" required>
                    <input type="text" name="lastname" placeholder="Lastname"  required>
                  
                    <select name="gender" class="gender">  
	                    <option value="none" selected>Gender</option>
	                    <option value="male">Male</option>
	                    <option value="female">Female</option>	
                    </select>

                    <input type="date" name="birthdate" placeholder="Birthdate" required>
                    <input type="email" name="email" placeholder="Email"  required>
                    <input type="password" name="password" placeholder="Password"  required>
                    <input type="password" name="confirm_password" placeholder="Confirm Password"  required>
                    <button type="submit"> Sign up </button>
                  
                 
            
                  
                </form>
    
            </div>
          
        </nav>
        
             

    </section>

</body>
</html>