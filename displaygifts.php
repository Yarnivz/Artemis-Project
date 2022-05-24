 <?php

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

echo( "<button onclick= \"location.href='displaygifts.php'\">Refresh it now</button>") . "<br>";

foreach($returnRow as $value){
    $productName = $value["ProductName"];
    $price = $value["Price"];
    $websitelink = $value["Website"];
     echo  $productName . "<br>";
     echo "Price: ". $price . "<br>";
     echo( "<button onclick= \"location.href='$websitelink'\">Buy it now</button>") . "<br>"; 
     $imageURL = $value["ImageURL"];
     $imageData = base64_encode(file_get_contents($imageURL));
      echo '<img src="data:image/jpeg;base64,'.$imageData.'">' . "<br>";
     
}
 