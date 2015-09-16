<?php
require_once('classes/locate.class.php');
session_start();
session_destroy();
new locate('../');


?>