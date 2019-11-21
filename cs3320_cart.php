<?php
//Orders (userId, orderNumber, productId, quantity, totalPrice)
//userId, orderNumber, productId is unique combination

if(isset($_POST['submit'])){
    $data_missing = array();

    //long ass if-else chain that needs to be refactored
    
    if(empty($_POST['productList'])){
        $data_missing[] = 'Product';
    }
    else{
        $productID = Trim($_POST['productList']);

    }


    if(empty($_POST['unitsNumber'])){
        $data_missing[] = 'quantity';
    }
    else{
        $unitsNumber = Trim($_POST['unitsNumber']);

    }


    if(empty($_POST['unit0'])){
        $data_missing[] = 'totalPrice';
    }
    else{
        $totalPrice = Trim($_POST['unit0'], '$');

    }
    

    //just sql for reference later
    //ALTER TABLE `userinformation` CHANGE `userId` `userId` INT(11) NOT NULL AUTO_INCREMENT;
    if(empty($data_missing)){
        require_once('mysqli_connect.php');
        $query = "INSERT INTO orders (productId, quantity, totalPrice)
        VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($dbc, $query);
        mysqli_stmt_bind_param($stmt, "sss", $productID, $unitsNumber, $totalPrice);
        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);
        if($affected_rows == 1){
            echo "Order added to Cart";
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