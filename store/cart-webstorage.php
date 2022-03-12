<?php
require_once("../db_connect.php");

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Cart</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <div class="container">
      <table class="table table-bordered table-sm">
        <thead>
          <tr class="text-center">
            <th>產品名稱</th>
            <th>單價</th>
            <th>數量</th>
            <th>小計</th>
          </tr>
        </thead>
        <tbody>
        <?php 


        ?>
          <tr>
            <td></td>
            <td class="text-end"></td>
            <td class="text-end"></td>
            <td class="text-end">
            
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td class="text-end" colspan="4">總價: <?=$total?></td>
          </tr>
        </tfoot>
      </table>
      <div id="data">

      </div>
      <div class="py-2 text-end">
          <a class="btn btn-info" href="pay.php">結帳</a>
      </div>
      </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.0/axios.min.js"></script>
    <script>
        let cart=localStorage.getItem("cart");
        // let cart=localStorage.getItem("cart");

        let formData=new FormData();
            formData.append('cart', cart);
            axios({
                method: "post",
                url: "/store/api/cart.php",
                data: formData,
                headers: { 'Content-Type': "multipart/form-data"}
            }).
            then(function(response){
                console.log(response.data)
                let products=response.data;
                products.forEach(function(product){
                    $("#data").append(`<div>${product.name}: ${product.price}</div>`)
                })
            })
            .catch(function(response){
                console.log(response)
        })

    </script>
  </body>
</html>