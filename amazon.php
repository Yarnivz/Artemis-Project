<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://amazon24.p.rapidapi.com/api/product?categoryID=aps&keyword=sport&country=US&page=1",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: amazon24.p.rapidapi.com",
		"X-RapidAPI-Key: e276d4498fmshe7928a0534db2d1p175cb7jsn6b74e21c4df3"
	],
]);

$result = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);



// include "connection.php";
// $conn = dbConnection(); 

// foreach ($products as $product) {
// 	$ProductName = $product["product_title"];
// 	$Price = $product["app_sale_price"];
// 	$ImageURL = $product["product_main_image_url"];
// 	$Website= $product["product_detail_url"];
// 	var_dump($ProductName);
// 	die();
	
// 	$sqlQuery = "INSERT INTO Gifts(ProductName, Price, ImageURL, Website,Preference) VALUES('$ProductName','$Price','$ImageURL','$Website','1')";
// 	$result = mysqli_query($conn, $sqlQuery);
	
	
// }