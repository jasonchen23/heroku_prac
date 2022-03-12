<?php
require_once("../../db_connect.php");

$cart=$_POST["cart"];

$products=[];

$cart=json_decode($cart);
// echo json_encode($cart);
// exit;
foreach($cart as $product){
    $product_id =key($product);
    $value=current($product );
    $sql="SELECT * FROM products WHERE id='$product_id'";
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
    $item=[
        'name'=>$row['name'],
        'price'=>$row['price'],
        'amount'=>$value
    ];
    array_push($products, $item);
}

echo json_encode($products);



?>