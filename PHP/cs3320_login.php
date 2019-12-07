<html>

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora&display=swap" rel="stylesheet">

     <!--style -->  
    <link rel="stylesheet" href="../CSS/login.css">

    <!-- JavaScript here -->
   
    <!--FontAwesome Kit-->
    <script src="https://kit.fontawesome.com/93d15b6e32.js" crossorigin="anonymous"></script>

    <!--Jquery -->  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

   <title>Sign in</title>
</head>

<body>
 <!-- Header and Logo-->
  <h1 class = 'header'> <span id = 'eSpecial'>e</span>Com</h1>

  <div class="main">
    <p class="sign" align="center">Sign in</p>
    <form class="form1" name = "loginForm" action = "http://localhost:1234/cs3320/PHP/cs3320_loginVerify.php" method="POST">
      <input class="un" name = 'userName' type="text" align="center" placeholder="Username">
      <input class="pass" name='password' type="password" align="center" placeholder="Password">
      <input class='submit' type = "submit" value = "Submit" name="submit">
      <p class="forgot" align="center"><a href="#">Forgot Password?</p>
      <a href ="#" class = "createAcct" align="center">Create Account</a>
            
       </form>         
    </div>

  
   
</body>

</html>