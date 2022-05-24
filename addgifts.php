<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    // creating connection
    include "Assets/database/connection.php";
    $conn = dbConnection(); 

    // fetching the json data, parsing to an assoc array
    $json_data = file_get_contents("./assets/API/gifts.json");
    $products = json_decode($json_data, JSON_OBJECT_AS_ARRAY);
    // var_dump($products);
    // die();

    foreach ($products as $product) {
        
        $productName = $product["ProductName"];
        $shop = $product["Shop"];
        $price = $product["Price"];
        $website= $product["Website"];
        $imageURL= $product["ImageURL"];
        $preference= $product["Preference"];
       
        
        $sqlQuery = "INSERT INTO `Gifts`(`ProductName`, `Shop`, `Price`, `Website`, `ImageURL`, `Preference`) VALUES('$productName','$shop','$price','$website','$imageURL', '$preference')";
        $result = mysqli_query($conn, $sqlQuery);
        var_dump($result);
        
    }
   
   

?>
</body>
</html>
