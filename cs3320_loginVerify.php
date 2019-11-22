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
      if(!mysqli_stmt_prepare($stmt,$sql)){
         header("Location: cs3320_login.php?error=sqlerror");
         exit();
      }
      else{
         mysqli_stmt_bind_param($stmt, "s", $userName);
         mysqli_stmt_execute($stmt);
         $result = mysqli_stmt_get_result($stmt);
         if($row = mysqli_fetch_assoc()){

         }
      }
   }

}
else{
   header("Location: cs3320_login.php");
   exit();
}

?>