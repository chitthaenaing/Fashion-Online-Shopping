<?php 
session_start();
require '../functions.php';
$conn = connect();
$bank_balance = $_SESSION['bank_balance'];
$customer_acc_id = $_SESSION['customer_acc_id'];
if(isset($_POST['order'])){
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$email  = $_POST['email'];
$postal_code = $_POST['postal_code'];
$address = $_POST['address'];
$contactno = $_POST['contact_no'];
$grandTotal = $_GET['grandTotal'];
//To check bank account balance
if($bank_balance < $grandTotal) {
  echo "<script>alert('Your bank balance is low');
  window.location.href='index.php?hasCart=true'</script>";
}else {
    //For Orders
    $customer_id = $conn->lastInsertId();
    $order_qty = count($_SESSION['cart']);
    $query = "Insert into orders(status,order_date,customer_acc_id,qty,total_price) 
    values(0,NOW(),:customer_id,:qty,:total_price)";
    $binding = array(':customer_id' => $customer_acc_id,':qty' => $order_qty, ':total_price' => $grandTotal);
    $order_rs = insert($query,$binding,$conn);
    //For Order Items
    $order_id= $conn->lastInsertId();
    $query = "Insert into orders_items(item_id,order_id) values(:item_id,:order_id)";
    foreach($_SESSION['cart'] as $key => $value){
      $binding= array(
        ':item_id' => $value['item_id'],
        ':order_id'=>$order_id
        );
      $order_item_rs = insert($query,$binding,$conn);
    }
    //For Customer
    $query = "Insert into customer (firstName,lastName,email,postal_code,address,phone_no, order_id) values(:firstName,:lastName,:email,:postal_code,:address,:phone_no, :order_id)";
    $binding = array(
      ':firstName'  => $firstName,
      ':lastName' => $lastName,
      ':email' => $email,
      ':postal_code' => $postal_code,
      ':address' => $address,
      ':phone_no' => $contactno,
      ':order_id'=>$order_id
      );
      $customer_rs = insert($query,$binding,$conn);
    // To update bank balance
    $rs_balance = $bank_balance - $grandTotal;
    $query = "Update bank set balance = '".$rs_balance."' where customer_id ='".$_SESSION['customer_acc_id']."'";
    $bank_statement = get($query, $conn);
    //For Payments
    // if($payment == 'paypal'){
    // $query = "Insert into payments(payment_name,customer_id) 
    // values(:payment_name,:customer_id)";
    // $binding = array(
    //   ':payment_name' => $payment,
    //   ':customer_id' => $customer_id
    //   );
    // }else if($payment == 'credit'){
    //   $query = "Insert into payments(payment_name,account_number,account_name,customer_id) 
    // values(:payment_name,:account_number,:account_name,:customer_id)";
    // $binding = array(
    //   ':payment_name' => $payment,
    //   ':account_number' => $account_no,
    //   ':account_name' => $account_name,
    //   ':customer_id' => $customer_id
    //   );
    // }
    
    // $payment_rs = insert($query,$binding,$conn);
    if($order_rs && $order_item_rs && $bank_statement) {
      echo "<script>alert('Order! Your order has been successfully placed.'); window.location.href='../index.php'</script>";
        $_SESSION['bank_balance'] = $rs_balance;
        unset($_SESSION['cart']);
        // header("location:../index.php");
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/checkout_style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/payment_style.css">
</head>
<body>
  <div class="container">
    <div class="wrapper">
      <ul class="steps">
        <li class="is-active">1. Your Email Address </li>
        <li>2. Your Delivery Address </li>
        <li>3. Select a Delivery Option</li>
        <!-- <li>4. Payment Method</li> -->
        <!-- <li>4. Finish</li> -->
        
      </ul>
      <form class="form-wrapper" action="#" method="POST">
        
        <fieldset class="section is-active">
          <h3>Your Email Address</h3>
          <!-- <input type="text" name="name" id="name" placeholder="Name"> -->
          <input type="text" name="email" id="email" placeholder="Email" value="<?=(isset($_SESSION['email']))?$_SESSION['email']:'' ?>">
          <div class="button">Next</div>
        </fieldset>

        <fieldset class="section">
          <h3>Your Delivery Address</h3>

          <div class="row cf">
            <div class="four col">
              <input type="text" name="first_name" id="r1" placeholder="First Name" value="<?=(isset($_SESSION['first_name']))?$_SESSION['first_name']:'' ?>">
            </div>
            <div class="four col">
              <input type="text" name="last_name" id="r2" placeholder="Last Name" value="<?=(isset($_SESSION['last_name']))?$_SESSION['last_name']:'' ?>">
            </div>
          </div>

          <div class="row cf">
            <div class="four col">
              <input type="text" placeholder="Postal Code" name="postal_code" id="r1">
            </div>
          </div>
  
          <div class="row cf">
            <div class="twelve col">
              <input type="text" placeholder="Address" name="address" id="r1" style="margin:10px;margin-left:50px;">
            </div>
          </div>

          <div class="row cf">
            <div class="twelve col">
              <input type="text" placeholder="Contact No" name="contact_no" id="r1" style="margin:10px;margin-left:50px;">
            </div>
          </div>
  
          <div class="button">Next</div>
        </fieldset>

        <fieldset class="section">
          <h3>Select A delivery Option</h3>
          <div class="row cf">
            <div class="four col">
              <input type="radio" name="r1" id="r1" checked>
              <label for="r1">
                <h4>Custom shipping method (3-5 days) - $15.00</h4>
              </label> 
            </div>
          </div>
          
         <!-- <div class="button">Next</div> -->
         <div style="margin-bottom:50px;"></div>
          <input type="submit" class="submit button" name="order" value="Submit My Order">
        </fieldset>

        <!-- <fieldset class="section">
          <h3>Payment method</h3>
          <div class="card__container">
        <div class="card">
            <div class="row paypal">
                <div class="left">
                    <input id="pp" type="radio" name="payment" value="paypal"/>
                    <div class="radio"></div>
                    <label for="pp">Paypal</label>
                </div>
                <div class="right">
                    <img src="http://i68.tinypic.com/2rwoj6s.png" alt="paypal" />
                </div>
            </div>
            <div class="row credit">
                <div class="left">
                    <input id="cd" type="radio" name="payment" value="credit" />
                    <div class="radio"></div>
                    <label for="cd">Debit/ Credit Card</label>
                </div>
                <div class="right">
                    <img src="http://i66.tinypic.com/5knfq8.png" alt="visa" />
                    <img src="http://i67.tinypic.com/14y4p1.png" alt="mastercard" />
                    <img src="http://i63.tinypic.com/1572ot1.png" alt="amex" />
                    <img src="http://i64.tinypic.com/2i92k4p.png" alt="maestro" />
                </div>
            </div>
            <div class="row cardholder">
                <div class="info">
                    <label for="cardholdername">Name</label>
                    <input placeholder="e.g. Richard Bovell" id="cardholdername" type="text" name="account_name" />
                </div>
            </div>
            <div class="row number">
                <div class="info">
                    <label for="cardnumber">Card number</label>
                    <input id="cardnumber" type="text" pattern="[0-9]{16,19}" maxlength="19" placeholder="8888-8888-8888-8888" name="account_no" />
                </div>
            </div>
            <div class="row details">
                <div class="left">
                    <label for="expiry-date">Expiry</label>
                    <select id="expiry-date">
                        <option>MM</option>
                        <option value="1">01</option>
                        <option value="2">02</option>
                        <option value="3">03</option>
                        <option value="4">04</option>
                        <option value="5">05</option>
                        <option value="6">06</option>
                        <option value="7">07</option>
                        <option value="8">08</option>
                        <option value="9">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    <span>/</span>
                     <select id="expiry-date">
                        <option>YYYY</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                    </select>
                </div>
                <div class="right">
                    <label for="cvv">CVC/CVV</label>
                    <input type="text" maxlength="4" placeholder="123" style="display:initial;padding:0px;margin:0px" />
                    <span data-balloon-length="medium" data-balloon="The 3 or 4-digit number on the back of your card." data-balloon-pos="up">i</span>
                </div>
            </div>
        </div>
    </div>
      <div style="margin-bottom:50px;"></div>
           <input type="submit" class="submit button" name="order" value="Submit My Order">
        </fieldset> -->
        </form>
        <!-- <fieldset class="section">
          <h3>Orderd !</h3>
          <p>Your order has now been successfully placed.</p>
          <a href="../index.php" class="button">Continue Shopping</a>
        </fieldset> -->
     
    </div>
  </div>
  <script type="text/javascript">
  $(document).ready(function(){
  $(".form-wrapper .button").click(function(){
    var button = $(this);
    var currentSection = button.parents(".section");
    var currentSectionIndex = currentSection.index();
    var headerSection = $('.steps li').eq(currentSectionIndex);
    currentSection.removeClass("is-active").next().addClass("is-active");
    headerSection.removeClass("is-active").next().addClass("is-active");
    // $(".form-wrapper").submit(function(e) {
    //   // e.preventDefault();
    //   alert("Order! Your order has been successfully placed.")
       
    // });
    if(currentSectionIndex === 5){
      $(document).find(".form-wrapper .section").first().addClass("is-active");
      $(document).find(".steps li").first().addClass("is-active");
    }
  });
});
  </script>
</body>
</html>