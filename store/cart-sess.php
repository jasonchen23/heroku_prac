<?php
//$cart=[
    //product id => amount
  //  [1=>1],
  //  [2=>1]
//];

//echo json_encode($cart);
session_start();
if(isset($_SESSION["cart"])){
    var_dump($_SESSION["cart"]);
}

?>