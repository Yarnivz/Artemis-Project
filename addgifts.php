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
  
    foreach ($products as $product) {
        
        $ProductName = $product["ProductName"];
        $Shop = $product["Shop"];
        $Price = $product["Price"];
        $Website= $product["Website"];
        $Preference= $product["Preference"];
        
        $sqlQuery = "INSERT INTO Gifts(ProductName, Shop, Price, Website,Preference) VALUES('$ProductName','$Shop','$Price','$Website',$Preference)";
        $result = mysqli_query($conn, $sqlQuery);
        var_dump($product);
        //$stmt->execute();
    }
   

?>
</body>
</html>
