<?php
require_once('../classes/db-connection.class.php');
require_once('../classes/feedback.class.php');
require_once('../classes/locate.class.php');



//creating an object
$objFeedback=new Feedback();

//setting the parameters
$name=mysqli_real_escape_string($objFeedback->conxn,$_POST['feed_name']);
$email=mysqli_real_escape_string($objFeedback->conxn,$_POST['feed_email']);
$message=mysqli_real_escape_string($objFeedback->conxn,$_POST['feed_msg']);
//setting objects variables
$objFeedback->setfeed_name($name);
$objFeedback->setfeed_email($email);
$objFeedback->setfeed_msg($message);
$objFeedback->setip_address();
//$country=$objFeedback->getcountry();
$country=$objFeedback->getcountry();
$objFeedback->setcountry($country);
$objFeedback->setdate_feed();

$flag=$objFeedback->insertfeed();
if($flag==true)
{
	new Locate('../../../index.php?success='.base64_encode('Feedback succesfully delivered.'));

}
else
{
	new Locate('../../../index.php?error='.base64_encode('Feedback is not delivered.'));
}

?>