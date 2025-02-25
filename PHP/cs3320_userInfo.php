<?php

if(isset($_POST['submit'])){
    $data_missing = array();

    //long ass if-else chain that needs to be refactored
    if(empty($_POST['firstname'])){
        $data_missing[] = 'First Name';
    }
    else{
        $f_name = Trim($_POST['firstname']);

    }

    if(empty($_POST['lastname'])){
        $data_missing[] = 'last Name';
    }
    else{
        $l_name = Trim($_POST['lastname']);
        
    }

    if(empty($_POST['address1'])){
        $data_missing[] = 'Address 1';
    }
    else{
        $address1 = Trim($_POST['address1']);

    }

    
    $address2 = Trim($_POST['address2']);


    if(empty($_POST['city'])){
        $data_missing[] = 'city';
    }
    else{
        $city = Trim($_POST['city']);

    }

    if(empty($_POST['state'])){
        $data_missing[] = 'state';
    }
    else{
        $state = $_POST['state'];

    }

    if(empty($_POST['zipcode'])){
        $data_missing[] = 'zipcode';
    }
    else{
        $zip = Trim($_POST['zipcode']);

    }

    if(empty($_POST['email'])){
        $data_missing[] = 'email';
    }
    else{
        $email = Trim($_POST['email']);

    }

    if(empty($_POST['phone'])){
        $data_missing[] = 'phone';
    }
    else{
        $phone = Trim($_POST['phone']);

    }
    

    //just sql for reference later
    //ALTER TABLE `userinformation` CHANGE `userId` `userId` INT(11) NOT NULL AUTO_INCREMENT;
    if(empty($data_missing)){
        require_once('mysqli_connect.php');
        $query = "INSERT INTO userinformation (firstName, lastName, address1, address2, city, USstate, zip) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($dbc, $query);
        mysqli_stmt_bind_param($stmt, "sssssss", $f_name, $l_name, $address1, $address2, $city, $state, $zip);
        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);
        if($affected_rows == 1){
            echo "User Info Saved";
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
            header("Location: ShoppingCart.php?userInfo=success");
            exit(); 
        }
        else{
            echo "Error occured<br>";
            echo mysqli_error();
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
        }

    }else{
        echo 'You need to enter the following data <br>. Press back on your browser to resubmit info.';

        foreach($data_missing as $missing){
            echo "$missing<br>";
        }
    }

}

?>