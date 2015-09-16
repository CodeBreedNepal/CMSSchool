<?php

session_start();
//load classes
require_once('../classes/db-connection.class.php');
require_once('../classes/user.class.php');
require_once('../classes/locate.class.php');

//create an object
$objuser=new User();
//load the form values
$username=mysqli_real_escape_string($objuser->conxn, $_POST['admin_username']);
$userpassword=mysqli_real_escape_string($objuser->conxn, $_POST['admin_password']);

//set the properties
$objuser->setAdmin_username($username);
$objuser->setPassword($userpassword);
$objuser->setlogin_date();
$objuser->setIp_used();
//validataion check
$flag=$objuser->validateuser();
//check for remember 

if(isset($_POST['remember']) && $_POST['remember'] == '1'){
	$_SESSION['remember'] = 1;
}
//locating
if($flag ==  TRUE){
new Locate('../../kode/index.php');	
}else{
new Locate('../../index.php?error='.base64_encode('Your credentials did not match!'));	
}
