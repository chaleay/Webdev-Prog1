<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Commerce Shopping Cart</title>
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
<body>

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
            </ul>
        </div>
    </nav>

    <!-- <section id=jumbo>
        <div class=container>
            <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. At iure dicta, nam commodi quam alias nostrum placeat eligendi fuga veniam odio ipsum ad nulla minima quae omnis porro deleniti libero.</h1>
        </div>
    </section> -->

    <div class=container>
        <p>
            Welcome back, user
        </p>
    </div>

    <form name = "userInfo" action = "http://localhost:1234/cs3320/PHP/cs3320_userInfo.php" onsubmit = "" method = "POST">
            <fieldset>
            <div class ="centerThis">
                <legend>User information: </legend>

                First name: <br>
                <input type = "text" name = "firstname" value = "" placeholder="first name goes here..."> <br>

                Last name: <br>
                <input type = "text" name = "lastname" value = "" placeholder="last name goes here..."> <br><br>

                Shipping Info: <br>
                <input type = "text" name = "address1" value = "" placeholder="address line 1..." maxlength="100"> <br>
                <input type = "text" name = "address2" value = "" placeholder="address line 2..." maxlength="100"> <br>
                <input type = "text" name = "city" value = "" placeholder="city goes here..." maxlength="100"> <br>
                State:
                <select name=state id=stateSelect> <br>
                    <option value =default>Select a State</option>
                    <option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
                </select> <br>
                <input type = "text" name = "zipcode"  value = "" minlength="5" placeholder="zipcode goes here..." maxlength="9"> <br>
                <input type = "text" name = "phone"  value = "" placeholder="###-###-####" onchange="return ValidatePhone(this)"> <br>
                <input type = "text" name = "email" value = "" placeholder="email goes here..." maxlength="100" onchange="return ValidateEmail(this)"> <br>

                <input type = "submit" onclick='StoreShippingInfo()'value = "Next" name="submit">

    </div>
            </fieldset>
        </form>

    

</body>
</html>