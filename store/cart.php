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
          if(isset($_SESSION["cart"])):

            $total=0;
            foreach($_SESSION["cart"] as $product):
              $product_id =key($product);
              $value=current($product );
              $sql="SELECT * FROM products WHERE id='$product_id'";
              $result = $conn->query($sql);
              $row=$result->fetch_assoc();

        ?>
          <tr>
            <td><?=$row["name"]?></td>
            <td class="text-end"><?=$row["price"]?></td>
            <td class="text-end"><?=$value?></td>
            <td class="text-end">
            <?php
              $subtotal=$row["price"]*$value;
              echo $subtotal;
              $total+=$subtotal;
            ?>
            </td>
          </tr>

          <?php
          endforeach;
          endif; //Cart 存在
          ?>
        </tbody>
        <tfoot>
          <tr>
            <td class="text-end" colspan="4">總價: <?=$total?></td>
          </tr>
        </tfoot>
      </table>
      <div class="py-2 text-end">
          <a class="btn btn-info" href="pay.php">結帳</a>
      </div>
      </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>