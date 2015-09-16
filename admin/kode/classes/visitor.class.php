<?php
/**
* 
*/
class Visitor extends Connection
{
	
	private $visitor_id;
	private $visitor_count;
public function setcount($count='')
{
	$this->visitor_count=$count;
}
public function setsession_count($sess='')
{
	$this->session_count=$sess;
}


public function visitor_check()
{
	/*$this->sql="INSERT INTO visitor (visitor_id,visitor_no) VALUES ('1','$this->visitor_count')";
	$this->res = mysqli_query($this->conxn,$this->sql) or die($this->error = mysqli_error($this->conxn));
	$this->affRows=mysqli_affected_rows($this->conxn);
	if($this->affRows>0)
	{
		return TRUE;
	}
	else
		return FALSE;*/

		//step 1--check the db for no
		$this->sql="SELECT * FROM visitors";
		$this->res=mysqli_query($this->conxn,$this->sql) or die($this->error=mysqli_error($this->conxn));
		$this->numRows=mysqli_num_rows($this->res);
		$this->data=mysqli_fetch_assoc($this->res);
		if($this->data['visitor_id']!='' AND $this->data['session_responsible']!=$this->session_count)

			{
				
				$this->prevdata=$this->data['visitor_no'];
				$this->visitor_count=$this->prevdata+1;
				$this->sql="UPDATE visitors SET visitor_no='$this->visitor_count' WHERE visitor_id='0'";
				$this->res=mysqli_query($this->conxn,$this->sql) or die($this->error=mysqli_error($this->conxn));
				//return true;
				
			}
			elseif($this->data['session_responsible']==$this->session_count)
			{
					//do nothing
			}
			else
			{
				$this->sql="INSERT INTO visitors (visitor_id,visitor_no,session_responsible) VALUES ('','$this->visitor_count','$this->session_count')";
				$this->res=mysqli_query($this->conxn,$this->sql) or die($this->error=mysqli_error($this->conxn));
				return true;
			}	
			return false;
}
public function delete_session()
{
	$this->sql="UPDATE  visitors SET session_responsible='' WHERE visitor_id='0'";
	$this->res=mysqli_query($this->conxn,$this->sql) or die($this->error=mysqli_error($this->conxn));

}


}