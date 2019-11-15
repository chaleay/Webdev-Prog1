<?php

if(isset($_POST['submit'])){
    $data_missing = array();

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

    if(empty($data_missing)){
        require_once('C:\Users\elija\Projects\repos\Webdev-Prog1\mysqli_connect.php');
        $fullName = $f_name . $l_name;
        $query = "INSERT INTO userinformation (fullName) VALUES ($fullName)";
        $stmt = mysqli_prepare($dbc, $query);
        mysqli_stmt_bind_param($stmt, "ss", $fullName);
        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);
        if($affected_rows == 1){
            echo "Full Info entered";
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