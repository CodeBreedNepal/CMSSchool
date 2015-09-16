<?php

/**
* 
*/
class Feedback extends Connection
{
	private $id;
	private $feed_name;
	private $feed_email;
	private $feed_msg;
	private $date_sent;
	private $ip_set;
	private $country;


	public function setfid($i='')
	{
		$this->fid=$i;
	}
	public function setfeed_name($nam='')
	{
		$this->feed_name=$nam;
	}
	public function setfeed_email($mail='')
	{
		$this->feed_email=$mail;
	}
	public function setfeed_msg($msg='')
	{
		$this->feed_msg=$msg;
	}
	public function getdate_feed()
	{
		return $this->date_sent;
	}
	public function setdate_feed()
	{
		$this->date_sent=date('y-m-d h:i:s');
	}
	public function getip_address()
	{
		return $this->ip_set;
	}
	public function setip_address()
	{
		$this->ip_set=$_SERVER['REMOTE_ADDR'];
	}
	
	public function getcountry()
	{
		    $client  = @$_SERVER['HTTP_CLIENT_IP'];

    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];

    $remote  = @$_SERVER['REMOTE_ADDR'];

    $result  = array('country'=>'', 'city'=>'');

    if(filter_var($client, FILTER_VALIDATE_IP)){

        $ip = $client;

    }elseif(filter_var($forward, FILTER_VALIDATE_IP)){

        $ip = $forward;

    }else{

        $ip = $remote;

    }

    //$ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));    

    if($ip_data && $ip_data->geoplugin_countryName != null){

        $result['country'] = $ip_data->geoplugin_countryCode;

        $result['city'] = $ip_data->geoplugin_city;

    }

    return $result['country'];
		//$this->country=geoip_country_name_by_name($_SERVER['REMOTE_ADDR']);
	}
	function setcountry($country='')
	{
		$this->country=$country;
	}

	function getcheck()
	{
		return $this->check;
	}
	function setcheck($check='')
	{
		$this->check=$check;

	}


public function insertfeed()

{
	//echo $this->date_sent;
	$this->sql=" INSERT INTO feedback_tbl (id,name,email,msg,date_sent,ip_address,mycheck,country) 
	VALUES 
	('','$this->feed_name','$this->feed_email','$this->feed_msg','$this->date_sent','$this->ip_set','1','$this->country')";
	//echo $this->sql;
	$this->res=mysqli_query($this->conxn,$this->sql) or die($this->error=mysqli_error($this->conxn));
	$this->affRows=mysqli_affected_rows($this->conxn);
	if($this->affRows>0)
	{
		return true;
		//echo $this->date_sent;
	
	}
	else
	{
		return false;
	}

}
public function getfeedno()
{
	$this->sql="SELECT * FROM feedback_tbl";
	$this->res=mysqli_query($this->conxn,$this->sql) or die($this->error=mysqli_error($this->conxn));
	$this->numRows=mysqli_num_rows($this->res);
	return $this->numRows;
}

public function getallfeedback()
{
	$this->sql="SELECT * FROM feedback_tbl ORDER BY id DESC LIMIT 10";
	$this->res=mysqli_query($this->conxn,$this->sql) or die($this->error=mysqli_error($this->conxn));
	$this->numRows=mysqli_num_rows($this->res);
	 $this->arr=array();
	if($this->numRows>0)
	{

		while($this->data=mysqli_fetch_assoc($this->res)){
        array_push($this->arr,$this->data);
    }
    }
    return $this->arr;

}

public function deletefeedback()
{
	
	$this->sql=" DELETE FROM feedback_tbl WHERE id = '$this->fid' ";
	$this->res=mysqli_query($this->conxn,$this->sql) or die($this->error=mysqli_error($this->conxn));
	$this->affRows=mysqli_affected_rows($this->conxn);
	if($this->affRows>0)
	{
		return true;
	}
	else
		return false;
		
}
public function updatecheck()
{
$this->sql="UPDATE feedback_tbl SET mycheck='0' WHERE id='$this->fid'";
$this->res=mysqli_query($this->conxn,$this->sql) or die($this->error=mysqli_error($this->conxn));


}

}