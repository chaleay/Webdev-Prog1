<?php
//login verification system

//make sure this page was accessed by pressing the submit button, otherwise redirect back to login page
if(isset($_POST['submit'])){
   require_once('mysqli_connect.php');

   $userName = trim($_POST['userName']);
   $pass = trim($_POST['password']);

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
         
         if($row = mysqli_fetch_assoc($result)){
            $pwdCheck = strcmp($pass, $row['pass']);
            
           

            //password matches the one entered in the database
            if($pwdCheck == true){
               session_start();
               $_SESSION['userName'] = $row['userName'];
               $_SESSION['userId'] =  $row['userId'];
               //success
               header("Location: HTML/sessionHome.php?login=success");
               exit(); 
            }
            //password does not match the one entered in the database - uh oh
            else{
               header("Location: cs3320_login.php?error=pwderror");
               exit(); 
            }
         }
         else{
            header("Location: cs3320_login.php?error=noUserError");
            exit();
         }
      }
   }

}
else{
   header("Location: cs3320_login.php");
   exit();
}

?>