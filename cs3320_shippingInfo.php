<?php
//ShippingInformation (userId, address1, address2, city, state, zip)
if(isset($_POST['submit'])){
    $data_missing = array();

    //long ass if-else chain that needs to be refactored
    
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
    

    //just sql for reference later
    //ALTER TABLE `userinformation` CHANGE `userId` `userId` INT(11) NOT NULL AUTO_INCREMENT;
    if(empty($data_missing)){
        require_once('mysqli_connect.php');
        $query = "INSERT INTO shippinginformation (address1, address2, city, USstate, zip) 
        VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($dbc, $query);
        mysqli_stmt_bind_param($stmt, "sssss", $address1, $address2, $city, $state, $zip);
        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);
        if($affected_rows == 1){
            echo "User Info Saved";
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
        }
        else{
            echo "Error occured<br>";
            echo mysqli_error();
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
        }

    }else{
        echo 'You need to enter the following data <br>';

        foreach($data_missing as $missing){
            echo "$missing<br>";
        }
    }

}

?>