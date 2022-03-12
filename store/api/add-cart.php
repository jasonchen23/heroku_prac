<?php
session_start();

//$id=$_GET["id"];
$id=$_POST["id"];

$newItem=[
    $id=>1
];

if(!isset($_SESSION["cart"])){
    $_SESSION["cart"]=[];
}

$prodcut_exist=0;

foreach($_SESSION["cart"] as $value){
    if(array_key_exists($id, $value)){
        $prodcut_exist=1;
    }
}



if($prodcut_exist===0){
    array_push($_SESSION["cart"], $newItem);
}

echo json_encode($newItem);


?>