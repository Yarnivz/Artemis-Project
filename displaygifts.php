 <?php

include "Assets/database/connection.php";
    $conn = dbConnection(); 

$query = "SELECT * FROM Gifts ORDER BY RAND() LIMIT 5 ";
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
 