<?php
  include "functions.php";
  authenticate();
  include "Assets/database/connection.php";
    $conn = dbConnection(); 
    session_start();
    $userID = $_SESSION["loggedUser"]["UserId"];
    
$query1 = "SELECT * FROM User_Preferences WHERE UserID=$userID ";
$queryResult1 = mysqli_query($conn, $query1);

$returnRow1 = $queryResult1 -> fetch_all(MYSQLI_ASSOC);
$row=0;
foreach($returnRow1 as $value){
    $preferenceID[$row] = $value["PreferenceID"]; 
    $row=$row+1;
}

$query = "SELECT * FROM Gifts WHERE Preference=$preferenceID[0] OR Preference=$preferenceID[1] OR Preference=$preferenceID[2] ORDER BY RAND() LIMIT 5 ";

$queryResult = mysqli_query($conn, $query);
$returnRow = $queryResult -> fetch_all(MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/css/navigation-bar.css" type="text/css">
    <link rel="stylesheet" href="Assets/css/calendar.css" type="text/css">
    <title>BDAY Calendar</title>
  </head>
  
  <body>
    
    <section class="head"> 
      <nav>      
          <div class="nav-links" id="navlinks"> 
              <a href="indexLoggedIn.html"><img src="assets/images/log2.png" class="logo" alt="index.html"> </a>
              <ul>
                  <?php
                    navbar();
                  ?>
              </ul>
          </div>
      </nav>
    </section>

    


    <div id="calendar"></div>

    <div id='formDiv'>
      <fieldset style='padding:0 20px 20px 20px'>
        
        <legend>
          <h2> Add An Event </h2>
        </legend>
        
        <!-- Form to Add an event into the calendar -->
        <form name='myForm' method="POST" action="calendar-insert-data.php" onsubmit="theFunction()">
        
          <table>
            
            <!-- Usage Name of the event -->
            <tr>
              <td>Name:</td>
              <td><input type="text" name="eventName" id="eventName" required></td>
            </tr>
            



            <!-- Usage Type of the event -->
            <tr>
              <td>Type:</td>
              <td style="display: flex;">
                <select class="selectMenu" id="eventType" name="eventType" onchange="displayEventSelection()" required>
                  <option value="Birthday">Birthday</option>
                  <option value="Wedding">Wedding</option>
                  <option value="Party">Party</option>
                  <option value="Event">Event</option>

                </select>
                <div id="eventColor"></div>
              </td>
            </tr>


            <!-- Usage Date of the event  -->


            <tr>
              <td>Date:</td>
              <td><input type="date" name="eventDate" id="eventDate" required></td>
            </tr>
            

            <!-- Usage submit & close form -->
            
            <tr>
              <td><button class="hero-btn1" type="submit" id="addEventBTN" value="Add Event">Add </button>
              <td><button class="hero-btn1" id="closeBTN" onclick="closeForm()" form="noForm">Close</button>
            </tr>
            
               


          </table>
        
        </form>
        
      </fieldset>
    </div>  
    <section class="header2">

    <div class="shopping">
            <?php
                echo( "<button onclick= \"location.href='calendar.php'\">Refresh</button>") . "<br>";

                foreach($returnRow as $value){
                    $productName = $value["ProductName"];
                    $price = $value["Price"];
                    $websitelink = $value["Website"]; ?>
                    <h3 class="shoplist">
                       <?php echo  $productName . "<br>"; ?>
                    </h3> 
                   <h3 class="shoplist">
                        <?php echo "Price: ". $price ."$". "<br>"; ?>
                   </h3>
                    <div class="Portrait">
                    <?php
        
                    
                    $imageURL = $value["ImageURL"];
                    $imageData = base64_encode(file_get_contents($imageURL));
                    
                  
                        

                         echo '<img src="data:image/jpeg;base64,'.$imageData.'">' . "<br>"; 
                         
                         echo( "<button onclick= \"location.href='$websitelink'\">Buy</button>") . "<br>"; ?>
                    </div>
                   
                 <?php   
                }
                ?>

            </div>
    

    </section>
   
    
    
    <!-- Library tool for the calendar  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="Assets/js/calendar.js"></script>
  
  </body>
  </html>