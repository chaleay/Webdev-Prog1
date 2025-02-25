<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    <!--Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

    <!--FontAwesome Kit-->
    <script src="https://kit.fontawesome.com/93d15b6e32.js" crossorigin="anonymous"></script>
  
    <!-- JavaScript -->
    <script src="../JS/main.js"></script>
    
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <!-- style -->
    <link rel=stylesheet href="../CSS/styles.css">
</head>
<body onload = "OnConfirmPageLoad();">
    
    <!-- Header and Logo-->
    <header id=mainHeader>
        <div class=container>
            <h1 class = 'header'> <span id = 'eSpecial'>e</span>Com</h1>
        </div>
    </header>
    
    <nav id = "mainNav">
        <div class=navContainer>
            <ul>
                <li><a href=sessionHome.php>Home</a></li>
                <li><a href=UserInfo.php>User Information</a></li>
                <li><a href=ShoppingCart.php>ShoppingCart</a></li>
                <li><a href=ShippingInfo.php>Shipping Information</a></li>
                <li><a href=Checkout.php>Checkout</a></li>
            </ul>
        </div>
    </nav>
        
    <fieldset>
            <div class = "container centerText">
                <h2>Order Confirmed!</h2>
                <div class = "app-container">
                    <h4>Order Summary</h4>
                    <p> Total Shopping Amount:</p>  
                    <input type = "text" id = "totalId1" value = ""  readonly placeholder="Total Amount">
                    <p> Total Tax Amount:</p>
                    <input type = "text" id = "totalId2" value = ""  readonly placeholder="Total Amount">
                    <p> Total Shipping Amount:</p>
                    <input type = "text" id = "totalId3" value = ""  readonly placeholder="Total Amount">
                    <p> Total Amount Due:</p>
                    <input type = "text" id = "totalId4" value = ""  readonly placeholder="Total Amount">   



            </div>
        </fieldset>

</body>
</html>