<?php

// Developments by RavinduJ

require_once('../../dbconfig/setconnection.php');

if(isset($_POST)){
        $txt_email = $_POST['txt_email'];
        $txt_password = $_POST['txt_password'];

    $sql = "SELECT * FROM userlogindetails WHERE UserEmail = '".$txt_email."' AND UserPassword = '".$txt_password."' limit 1";

    $result = $conn -> query($sql);
    if(mysqli_num_rows($result) == 1){
        echo "You have successfully logged in";
        exit();
    }
    else{
        echo "User dose not exists......";
    }
}


?>