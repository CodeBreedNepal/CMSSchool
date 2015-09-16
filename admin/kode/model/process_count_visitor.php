<?php

require_once('admin/kode/classes/db-connection.class.php');
require_once('admin/kode/classes/visitor.class.php');
//require_once('classes/locate.class.php');

	$objVisitor=new Visitor();//creating an instance of object of visitor

	if(isset($_SESSION['hasvisited'])=='yes')
	{
		//$count=$count+1;
		//return $count;
		 $count=1;
		$objVisitor->setcount($count);

		$objVisitor->setsession_count($_SESSION['hasvisited']);
	//$flag=$objVisitor->visitor_check();	

			if($flag==TRUE)
			{
				//$check=$objVisitor->delete_session();	

			}
			else{}
				//exit();
					//unset($_SESSION['hasvisited']);
				//session_destroy();
				//echo "mama";

	}
		


?>