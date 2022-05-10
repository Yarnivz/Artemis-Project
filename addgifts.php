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

   $mysqli = new mysqli('localhost', 'root', 'root', 'trial');
if($mysqli->connect_errno != 0){
    echo $mysqli->connect_error;
    exit();
    
}


$json_data = file_get_contents("ex.json");
$products = json_decode($json_data, JSON_OBJECT_AS_ARRAY);

$stmt = $mysqli->prepare("
INSERT INTO Gifts(ProductName, Shop, Price, Website,EventCategory) VALUES(?,?,?,?,?)
");
$stmt->bind_param("ssdsi", $ProductName, $Shop, $Price, $Website,$EventCategory);

$inserted_rows = 0;
foreach ($Gifts as $Gift) {
    $ProductName = $Gift["ProductName"];
    $Shop = $Gift["Shop"];
    $Price = $Gift["Price"];
    $Website= $Gift["Website"];
    $EventCategory= $Gift["EventCategory"];
    
    $stmt->execute();
    $inserted_rows ++;
}
if(count($Gifts) == $inserted_rows){
    echo "succes";
}else{
    echo "error";
}

?>
</body>
</html>
