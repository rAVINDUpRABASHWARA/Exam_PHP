<?php

// Developments by RavinduJ

require_once('../../dbconfig/setconnection.php');

if(isset($_POST)){
        $submit = $_POST['submit'];
        $action = $_POST['action'];
        $cmb_prefix = $_POST['cmb_prefix'];
        $txt_fname = $_POST['txt_fname'];
        $txt_lname = $_POST['txt_lname'];
        $txt_phone = $_POST['txt_phone'];
        $txt_addr1 = $_POST['txt_addr1'];
        $txt_addr2 = $_POST['txt_addr2'];
        $cmb_country = $_POST['cmb_country'];
        $txt_city = $_POST['txt_city'];
        $txt_zip = $_POST['txt_zip'];
        $cmb_industry = $_POST['cmb_industry'];
        $cmb_field = $_POST['cmb_field'];
        $txt_email = $_POST['txt_email'];
        $txt_password = $_POST['txt_password'];

    $sql = "INSERT INTO `userlogindetails`(UserEmail, UserPassword, FirstName, LastName, Country, City, Industry, Field, Address1, Address2) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmtinsert = $conn->prepare($sql);
    $result = $stmtinsert->execute([$txt_email, $txt_password, $txt_fname, $txt_lname, $cmb_country, $txt_city, $cmb_industry, $cmb_field, $txt_addr1, $txt_addr2]);
		if($result){
			echo 'Successfully saved.';
		}else{
			echo 'There were erros while saving the data.';
		}
    }else{
	    echo 'No data';
}


?>