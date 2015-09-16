<?php 

session_start();
//load classes
require_once('../classes/db-connection.class.php');
require_once('../classes/user.class.php');
require_once('../classes/locate.class.php');
require_once('../classes/check_img.class.php');

//create an object

$objImage= new Image();
//


//setting the inputs
$admin_img=$_FILES['admin_img'];
$admin_img_name=mysqli_real_escape_string($objImage->conxn,$_FILES['admin_img']['name']);
$size=mysqli_real_escape_string($objImage->conxn,$_FILES['admin_img']['size']);
$type=mysqli_real_escape_string($objImage->conxn,$_FILES['admin_img']['type']);
$tmp_name=mysqli_real_escape_string($objImage->conxn,$_FILES['admin_img']['tmp_name']);


$objImage->setadmin_img($admin_img);
$objImage->setimg_name($admin_img_name);
$objImage->setimg_size($size);
$objImage->setimg_type($type);
$objImage->settmp_img_name($tmp_name);
//check the image extension


$img_return=$objImage->check_img();

//now teh condition for flag

	if($img_return==true)
	{
		$objUser=new User();
		$admin_id=$_SESSION['uid'];
		$admin_name=mysqli_real_escape_string($objUser->conxn,$_POST['admin_name']);
		$admin_email=mysqli_real_escape_string($objUser->conxn,$_POST['admin_email']);
		$admin_password=mysqli_real_escape_string($objUser->conxn,$_POST['admin_password']);
		$admin_password2=mysqli_real_escape_string($objUser->conxn,$_POST['admin_password2']);
		$admin_access_level=mysqli_real_escape_string($objUser->conxn,$_POST['admin_access_level']);
		$admin_img_name=mysqli_real_escape_string($objUser->conxn,$_FILES['admin_img']['name']);


			$objUser->setuid($admin_id);
			$objUser->setAdmin_username($admin_name);
			$objUser->setPassword($admin_password);
			$objUser->setAdmin_email($admin_email);
			//$objUser->setaccess_level($admin_access_level);
			$objUser->setimg_name($admin_img_name);

			$flag=$objUser->updateuser();
		

	}
	else

			

	new Locate('../index.php?action='.base64_encode('views_user_profile').'&opt&error='.base64_encode('Image not uploaded. Try again') );


if($flag==true)
{
	new Locate('../index.php?action='.base64_encode('views_user_profile').'&opt&success='.base64_encode('Admin data has been successfully Updated.') );
}
else
	new Locate('../index.php?action='.base64_encode('views_user_profile').'&opt&error='.base64_encode('Form Update Incomplete') );

		

