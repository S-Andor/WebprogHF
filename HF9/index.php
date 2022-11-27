<?php
require 'Caller.php';
if (isset($_POST['get'])){
    if (isset($_POST['userID'])){

        $url = "https://fakestoreapi.com/carts/user/" .$_POST['userID'];
        $response = (new Caller)->CallAPI($url);

        $total = 0;

        $productUrl = "https://fakestoreapi.com/products/";
        foreach ($response as $cart){
            foreach ($cart->products as $product){
                $tmp = (new Caller)->CallAPI($productUrl . $product->productId);
                $total += ($tmp->price * $product->quantity);
            }
        }
        echo "<br>The total is: ";
        echo $total;
    }
}
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="userCart">
    <form action="index.php" method="post">
        <label for="username">
            <i class="fas fa-user"></i>
        </label>
        <input type="number" name="userID" placeholder="User ID" id="user" required>

        <input type="submit" value="Get" name="get">
    </form>
</div>
</body>
</html>