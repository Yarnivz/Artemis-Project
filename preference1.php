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
    <link rel="stylesheet" href="assets/css/style.css">
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
           
           
        </nav>

        <div class="pref">

            <form method="post" action="preference2.php" class="">
                <div class="pref">
                    <h2 class="pre">Choose your preferences</h2>
                </br>
                    <span class="select-wrapper">
                        <select name="Preference1" required>
                            
                            <option value="*" disabled selected>Preference</option>
                            <option value="sports">Sports</option>
                            <option value="gaming">Gaming</option>
                            <option value="clothing">Clothing</option>
                            <option value="decoration">Decoration</option>
                            <option value="gardening">Gardening</option>
                            <option value="gadgets">Gadgets</option>
                            <option value="books">Books</option>
                            <option value="movies">Movies</option>
                            <option value="art">Art</option>
                            <option value="beauty">Beauty Products</option>
                            <option value="travel">Travel</option>
                            <option value="toys">Kids&Toys</option>
                            <option value="cooking">Cooking</option>
                        </select>
                        <select name="Preference2">
                            <option value="*" disabled selected>Preference</option>
                            <option value="sports">Sports</option>
                            <option value="gaming">Gaming</option>
                            <option value="clothing">Clothing</option>
                            <option value="decoration">Decoration</option>
                            <option value="gardening">Gardening</option>
                            <option value="gadgets">Gadgets</option>
                            <option value="books">Books</option>
                            <option value="movies">Movies</option>
                            <option value="art">Art</option>
                            <option value="beauty">Beauty Products</option>
                            <option value="travel">Travel</option>
                            <option value="toys">Kids&Toys</option>
                            <option value="cooking">Cooking</option>
                        </select>
                  
        
                        <select name="Preference3">
                            <option value="*" disabled selected>Preference</option>
                            <option value="sports">Sports</option>
                            <option value="gaming">Gaming</option>
                            <option value="clothing">Clothing</option>
                            <option value="decoration">Decoration</option>
                            <option value="gardening">Gardening</option>
                            <option value="gadgets">Gadgets</option>
                            <option value="books">Books</option>
                            <option value="movies">Movies</option>
                            <option value="art">Art</option>
                            <option value="beauty">Beauty Products</option>
                            <option value="travel">Travel</option>
                            <option value="toys">Kids&Toys</option>
                            <option value="cooking">Cooking</option>
                        </select>
                    </span>
                </div>
                
                   <button type="submit" class="next"> Next </button>
                  
                </form> 
    
              </div>
          
        
    </section>

  

</body>
</html>