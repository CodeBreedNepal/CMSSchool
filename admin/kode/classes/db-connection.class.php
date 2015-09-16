<?php

/**
 class is to connect with the database
*/

class Connection{

	private $user;
	private $password;
	private $host;
	private $db;

	public $sql;
	public $res;
	public $err;
	public $affRows;
	public $numRows;
	public $data = array(); // blank array

	public $conxn;

	/* setters */
	public function setUser($ur = ''){
		$this->user = $ur;
	}

	public function setPassword($pd = '' ){
		$this->password = $pd;
	}

	public function setHost($ht = ''){
		$this->host = $ht;
	}

	public function setDB($db = ''){
		$this->db = $db;
	}
//$h = 'localhost', $u = 'itucnac_site', $p = 'HswldUQN*{Ji', $db = 'itucnac_site'
//$h = 'localhost',  $u = 'root', $p = '', $db = 'db_bedc'
	public function __construct($h = 'localhost',  $u = 'root', $p = '', $db = 'Pebs_database'){
	
	$this->conxn=mysqli_connect($h, $u, $p, $db)
				or trigger_error($this->err = mysqli_error($this->conxn));
	
//echo "<br /> The database is ready to serve! ";	
	}
	
	public function close(){
	mysqli_close($this->conxn);
	//echo "<br /> The connection is closed";	
	}
}//class ends
?>