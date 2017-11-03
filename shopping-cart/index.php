<?php 
session_start();
require '../functions.php';
$conn = connect();
$couponAmount = 0;
if(isset($_POST['coupon_use'])){
  $couponCode = $_POST['coupon_code'];
  //Get Coupon Amount
  $query = "Select * from coupon where coupon_code=:couponCode";
  $binding = array(':couponCode' => $couponCode);
  $stmt = $conn->prepare($query);
  $stmt->execute($binding);
  $rs = $stmt->rowCount();
  if($rs){
      while($row = $stmt->fetch()){
      $couponAmount = $row['coupon_amount'];
    }  
  }else echo "<script>alert('Your Coupon Code is invalid');</script>";
  

}

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Responsive Shopping Cart</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <h1>Shopping Cart</h1>

<div class="shopping-cart">

  <div class="column-labels">
    <label class="product-image">Image</label>
    <label class="product-details">Product</label>
    <label class="product-price">Price</label>
    <label class="product-quantity">Quantity</label>
    <label class="product-removal">Remove</label>
    <label class="product-line-price">Total</label>
  </div>
  <?php foreach($_SESSION['cart'] as $row) { ?>
  <div class="product">
    <div class="product-image">
     <img src="../admin/photo/<?=$row['item_image']; ?>">
    </div>
    <div class="product-details">
      <div class="product-title"><?= $row['item_name']; ?> </div>
    </div>
    <div class="product-price">
      <?= $pr = ($row['discount_price']>0)?$row['discount_price']:$row['price'];?>
    </div>
    <div class="product-quantity">
      <input type="number" value="1" min="1" id="product-quantity">
    </div>
    <div class="product-removal">
      <button class="remove-product">
        Remove
      </button>
    </div>
    <div class="product-line-price" id='total<?= $row['item_id']; ?>'>
      <?=$pr;?>
    </div>
  </div>
   <?php } ?>
 
  <div class="couponCode">
    <form action="#" method="post">
    <label for="coupon" class="coupon_label">Enter Your coupon Code Here</label>
    <input type="text" name="coupon_code" class="couponInput" id="coupon">
    <button class="coupon" name="coupon_use">Use</button>
    </form>
  </div>

  <div class="totals">
    <div class="totals-item">
      <label>Subtotal</label>
      <div class="totals-value" id="cart-subtotal">
        <?php 
          $totalPrice=0;
          foreach($_SESSION['cart'] as $price){
                    $totalPrice+=($price['discount_price']>0)?$price['discount_price']:$price['price'];
          }
          echo $totalPrice;
        ?></div>
    </div>
    <div class="totals-item">
      <label>Tax (5%)</label>
      <div class="totals-value" id="cart-tax"><?=$tv=$totalPrice*0.05; ?></div>
    </div>
    <div class="totals-item">
      <label>Shipping</label>
      <div class="totals-value" id="cart-shipping">15.00</div>
    </div>
    <div class="totals-item totals-item-total">
      <label>Grand Total</label>
      <div class="totals-value" id="cart-total"><?= $grandTotal= ($tv+$totalPrice+15.00)-$couponAmount;?></div>
    </div>
  </div>
      
      <button class="checkout" onclick="checkout()">Checkout</button>

</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>
    <script>
  
  
  function checkout(){
    var grandTotal = $('#cart-total').html();
    window.location.href="checkout.php?grandTotal="+grandTotal;
  }  
</script>

</body>
</html>
