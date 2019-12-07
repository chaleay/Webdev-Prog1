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
<body onload="OnCheckoutPageLoad();">
    
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
            </ul>
        </div>
    </nav>
       
    <fieldset>
            <form action = "Confirm.php" target = "_blank"  method = "POST" name = "checkoutForm"> 
            <div class = "centerThis">
                <p>Check Out (make sure to enable cookies)</p>
               
                <p> Total Shopping Amount:</p>  
                <input type = "text" name = "totalShopAmt" value = ""  readonly placeholder="Total Amount">
                <p> Total Tax Amount:</p>
                <input type = "text" name = "totalTax" value = ""  readonly placeholder="Total Amount">
                <p> Total Shipping Amount:</p>
                <input type = "text" name = "totalShipping" value = ""  readonly placeholder="Total Amount">
                <p> Total Amount Due:</p>
                <input type = "text" name = "completeTotal" value = ""  readonly placeholder="Total Amount">
            <div class = "card-details">
                <p>Card Details</p>
                <fieldset>
                    <select name="cardType">
                        <option value="visa"> Visa</option>
                        <option value="master-card"> MasterCard</option>
                        <option value="American-Express"> American Express</option>
                    </select>
                    <div class = "card-num">
                    <label>
                        Card Number:
                    </label>
                    <input type="text" name = "cardNum" class="card-num" placeholder="xxxx-xxxx-xxxx-xxxx" onkeypress='return validInput()' onchange="return ValidateCard(this)">

                </div>
                    <div class = "card-exp">
                        <label> Expiration Date:</label>
                        <input name = "cardDate" type ="text" class="card-num" placeholder="MM/YYYY" onkeypress='return validInput2()' onchange="return ValidateExpiration(this)">
                    </div>
                    <div class = "agreement">
                        <input type="checkbox" name = "terms" value="legal">I agree and authorize the amount to be charged to my credit card <br>
                    </div>
                    <button type="button"  onclick='return ValidateInformation()' >Complete Purchase</button>
                </form>
            </fieldset>

            </div>

            </div>
        </fieldset>

</body>
</html>