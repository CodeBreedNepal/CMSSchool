<?php
//require('classes/locate.class.php');
require("classes/bootstrap-page.class.php");
require('classes/db-connection.class.php');
require('classes/locate.class.php');
require("classes/user.class.php");

session_start();
if(!isset($_SESSION['uid']))
{
	new locate('../index.php?error='.base64_encode('You donot have sufficient privillage.<br>Login First.'));
}
else
{



require_once("views/header_admin-views.php");
require_once("views/top_admin-views.php");

require_once("views/menulinks_admin-views.php");


/*require_once("views/home_admin-views.php");*/
$page=new pages();
$page->change_page();
$page->change_option();


require_once("views/footer_admin-views.php");
}


	
           
?>
        
