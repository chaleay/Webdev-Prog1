<?php
//login verification system

if(isset($_POST['submit'])){
   require_once('mysqli_connect.php');

   $userName = $_POST['userName'];
   $pass = $_POST['password'];

   if(empty($userName) || empty($pass)){
      header("Location: cs3320_login.php?error=emptyfields");
      exit();
   }
   else{
      $sql = "SELECT * FROM usercredentials WHERE userName=?;";
      $stmt = mysqli_stmt_init($dbc);

   }

}
else{
   header("Location: cs3320_login.php");
   exit();
}

?>