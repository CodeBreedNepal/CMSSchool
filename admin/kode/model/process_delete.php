<?php
require_once('classes/db-connection.class.php');
require_once('classes/user.class.php');
require_once('classes/locate.class.php');
require_once('classes/feedback.class.php');


//delete fuction for user

$id =isset($_GET['uid'] ? $_GET['id'] : '';


$objUser=new User();
$objUser->setuid($id);

$flag=$objUser->deleteuser();

if($flag==true)
{
	new Locate('index.php?action='.base64_encode('views_user_setting').'&success='.base64_encode('Records has been deleted.'));
}
else
new Locate('index.php?action='.base64_encode('views_user_setting').'&error='.base64_encode('Records cannot be deleted.'));

}

}