<?php 
session_start();
require 'functions.php';
$conn = connect();




if(isset($_SESSION['cart'])) {


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
        $datetime1 = date_create(date("Y-m-d"));
        $datetime2 = date_create($row['coupon_expire_date']);
        $interval = $datetime1->diff($datetime2);
        $diff = $interval->format('%R%a');
        if($diff > 0) {
          $couponAmount = $row['coupon_amount'];  
          echo "<script>alert('Your Coupon Code has been applied');</script>"; 
        }else {
          echo "<script>alert('Sorry! Your Coupon Code has expired');</script>"; 
        }
        
      }  
    }else echo "<script>alert('Your Coupon Code is invalid');</script>";
    
  } 
}else {
  echo "<script>alert('There is no item to checkout!');window.location.href='index.php';</script>";
}

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Responsive Shopping Cart</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/css/custom.css">

  
  <link rel="stylesheet" href="shopping-cart/css/style.css">

  
</head>

<body>
  <?php include 'navbar.php'; ?> 
  <div class="container" style="margin-top:5%">
    <!-- <div class="row">
      <div class="col-md-12" >
          <img src="../admin/images/imc.png">  
        </div>
    </div> -->
      <div class="panel panel-default"">
        <div class="panel-heading">
          <h1>Shopping Cart</h1>
        </div>

        <div class="panel-body">
          
          <div class="shopping-cart">

            <div class="column-labels">
              <label class="product-image">Image</label>
              <label class="product-details">Product</label>
              <label class="product-price">Price</label>
              <label class="product-quantity">Quantity</label>
              <label class="product-removal">Remove</label>
              <label class="product-line-price">Total</label>
            </div>
            <?php foreach($_SESSION['cart'] as $index => $row) { ?>

            <div class="product" data-id="<?=$row['item_id']?>">
              <div class="product-image">
               <img src="admin/photo/<?=$row['item_image']; ?>">
              </div>
              <div class="product-details">
                <div class="product-title"><?= $row['item_name']; ?> </div>
              </div>
              <div class="product-price">
                <?= $pr = ($row['discount_price']>0)?$row['discount_price']:$row['price'];?>
              </div>
              <div class="product-quantity">
                <input type="number" value="1" min="1" class = "product-quantity-<?=$index?>" id="product-quantity">
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
                
            <button class="checkout" name="checkout" onclick="checkout(<?=sizeof($_SESSION['cart'])?>)">Checkout</button>

          </div>  
                
        </div>
    </div>
  </div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script type="text/javascript" src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script  src="shopping-cart/js/index.js"></script>
    <script>
  
      $('.logout-link').on('click', function(e) {
        console.log('click');
        $.ajax({
            url:'logout.php', 
            type:'GET',
            success:function(data){
              var data = JSON.parse(data);
              
            swal("Success!", data.response, "success").then((value) => { window.location.href= data.location});
            },
            error:function(data){
              
            swal("Oops...", "Something went wrong :(", "error");
            }
          });
      });
  
      function checkout(totalProduct){

        var productQty = [];
        for(var i=0;i<totalProduct;i++) {
          productQty.push($('.product-quantity-'+i).val());
        }
        console.log(productQty);
        var grandTotal = $('#cart-total').html();
        $.get( "add-product-qty.php", { productQuantities: JSON.stringify(productQty) } )
          .done(function(data) {
            // var data = JSON.parse(data);
            // console.log(data);
            window.location.href="shopping-cart/checkout.php?grandTotal="+grandTotal;
        });
        
      }  
</script>

</body>
</html>
