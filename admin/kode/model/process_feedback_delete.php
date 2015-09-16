<?php
//delete function for feedback

require_once('classes/db-connection.class.php');
require_once('classes/feedback.class.php');
require_once('classes/locate.class.php');


$id=isset($_GET['fid']) ? $_GET['fid'] : '';

echo $id;
	$fid=base64_decode($id);
	


//delete fuction for user

$objFeedback=new Feedback();
$objFeedback->setfid($fid);

$flag=$objFeedback->deletefeedback();

if($flag==true)
{
	new Locate('index.php?action='.base64_encode('feedback-page').'&success='.base64_encode('Records has been deleted.'));
}
else
new Locate('index.php?action='.base64_encode('feedback-page').'&error='.base64_encode('Records cannot be deleted.'));
	

?>