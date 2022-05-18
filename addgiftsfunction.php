<?php

function addGifts($catID) {
    foreach ($products as $product) {
        
        $ProductName = $product["product_title"];
        $Shop = "Amazon";
        $Price = $product["app_sale_price"];
        $Website= $product["Website"];
        $Preference= $product["Preference"];
        
        $sqlQuery = "INSERT INTO Gifts(ProductName, Shop, Price, Website,Preference) VALUES('$ProductName','$Shop','$Price','$Website','$catID')";
        $result = mysqli_query($conn, $sqlQuery);
    }
}