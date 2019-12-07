<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>
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
<body onload="OnShoppingCartPageLoad();">
    
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
            </ul>
        </div>
    </nav>
         
         <form action = "ShippingInfo.php" name = "productForm"> 
            <!--css uses this class if styling product purchase field-->
            <fieldset> 
            <div class = "productPurchaseField centerThis"> 
                   
                    
                    Product
                    <select id = "productSelection0" onchange="calculateUnitPrice(this)" name = "productList">
                        <option id = "product0" value="Bananas">Bananas ($.50 / lb)</option>
                        <option id = "product1" value="peaches">Peaches ($.60 / lb)</option>
                        <option id = "product2" value="Apple">Apple ($.70 / lb)</option>
                        <option id = "product3" value="Love">Love ($10 / lb)</option>
                    </select>
              
                    <!--javascript code to detect if keypress is a number... move to js file-->
                    <input id = "numUnits0" type = "text" onkeypress='return validInput()' onchange = 'CalculateTotalUnitPrice(this)' name = "unitsNumber" value = "" placeholder="# Unit" maxlength="9" style="width: 50px;"/>
                    <input id ="unitPrice0" type="text" name="unit0" value="" placeholder = "Price" readonly style="width: 50px;">
                    <button type="button" onclick='AddToCart()' name="submit">Add to Cart</button>
      
            </div>
            <input type="text" name="totalPrice" value="Total Price" readonly style="width: 90px;">
            <button type="button"  onclick= 'ShowCart()'>See Cart</button>
            </fieldset>
            <input class = "centerButton" type = "submit" value = "Next" name="submit">
        </form>
    </body>
</html>