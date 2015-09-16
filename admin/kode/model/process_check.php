<?php
require_once('classes/db-connection.class.php');
//require_once('classes/user.class.php');
require_once('classes/locate.class.php');
require_once('classes/feedback.class.php');


if(isset($_GET['fid']))

{

$id =isset($_GET['fid']) ? $_GET['fid'] : '';
$id=base64_decode($id);

//echo $id;
$objFeedback=new Feedback();

$objFeedback->setfid($id);

$flag=$objFeedback->updatecheck();

//do nothing






}