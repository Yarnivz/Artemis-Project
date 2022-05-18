<?php
  include "functions.php";
  session_start();
  authenticate();
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

    <div id="calendar"></div>

    <!-- The Whole Form dive when you press the + button -->
    <div id='formDiv'>
      <fieldset style='padding:0 20px 20px 20px'>
        
        <legend>
          <h2> Add An Event </h2>
        </legend>
        
        <!-- Form to Add an event into the calendar -->
        <form name='myForm' onsubmit="theFunction()">
        
          <table>
            
            <tr>
              <td>Name:</td>
              <td><input type="text" name="eventName" id="eventName" required></td>
            </tr>
            
            <tr>
              <td>Type:</td>
              <td style="display: flex;">
                <select class="selectMenu" id="eventType" name="eventType" onchange="displayEventSelection()" required>
                  <option value="">-- Select Event --</option>
                  <option value="Event">Event</option>
                  <option value="Free Times">Free Times</option>
                  <option value="Family Time">Family Time</option>
                  <option value="Birthday">Birthday</option>
                </select>
                <div id="eventColor"></div>
              </td>
            </tr>

            <tr>
              <td>Date:</td>
              <td><input type="date" name="eventDate" id="eventDate" required></td>
            </tr>
            
            <tr>
              <td><input type="submit" id="addEventBTN" value="Add Event"></td>
              <td><button id="closeBTN" onclick="closeForm()" form="noForm">Close Window</button></td>
            </tr>

          </table>
        
        </form>
        
      </fieldset>
    </div>  
    
    
    
    <script src="Assets/js/calendar.js"></script>

  </body>
  </html>