<?php
class User extends Connection
{
	private $admin_id;
	private $admin_email;
	private $admin_username;
	private $password;
	private $ip_used;
	private $login_date;
    private $acces_level;
    private $admin_img;


    public function setuid($ud='')
    {
        return $this->admin_id=$ud;
    }
		
	public function getIp_used()
    {
        return $this->ip_used;
    }
    //public function setadmin_img($aimg='')
   // {
    //    $this->admin_img=$aimg;
    //}
    public function setIp_used()
    {
    	$this->ip_used=$_SERVER['REMOTE_ADDR'];

    }
    public function getaccess_level()
    {
        return $this->access_level;
    }
    public function setaccess_level($al="")
    {
        $this->access_level=$al;
    }
    public function getAdmin_email()
    {
    	return $this->admin_email;
    }
    public function setAdmin_email($adem='')
    {
        $this->admin_email=$adem;
    }
    public function getAdmin_username()
    {
    	return $this->Admin_username;
    }
    public function getPassword()
    {
    	return $this->password;
    }
    public function setAdmin_username($uname='')
    {
        $this->Admin_username=$uname;

    }
    public function setPassword($upass='')
    {
        $this->password=sha1($upass);
    }
    public function setlogin_date()
    {
       
    	$this->login_date=date('y-m-d h:i:s');
    }
    public function setimg_name($imgn='')
    {
        $this->img_name=$imgn;
    }
    
//validate the username
public function validateuser()
{
$this->sql= "SELECT * FROM admin_data WHERE admin_name='$this->Admin_username' AND password='$this->password'";
$this->res = mysqli_query($this->conxn,$this->sql) or die($this->error = mysqli_error($this->conxn));
$this->numRows = mysqli_num_rows($this->res);
if($this->numRows!=0)
{
    $this->data=mysqli_fetch_assoc($this->res);
   
    $_SESSION['uid']=$this->data['admin_id'];
    //$_SESSION['admin_id']=$row['admin_id'];
    //$_SESSION['acces_level']=$row['access_level']
    $this->sql="UPDATE admin_data SET login_date='$this->login_date', admin_ip_used='$this->ip_used' WHERE admin_name='$this->Admin_username' ";
    $this->res = mysqli_query($this->conxn,$this->sql) or die($this->error = mysqli_error($this->conxn));
    return TRUE;
}
    else
    return FALSE;

}
//get the user information from database

public function user_info()
{
    if(isset($_SESSION['uid']))
    {
    $id=$_SESSION['uid'];
    $this->sql="SELECT * FROM admin_data WHERE admin_id='$id' ";
   
    $this->res=mysqli_query($this->conxn,$this->sql) or die($this->error=mysqli_query($this->conxn));
    $this->numRows=mysqli_num_rows($this->res);
    $this->arr=array();
    if($this->numRows>0)
    {
         $this->data=mysqli_fetch_assoc($this->res);
                 return $this->data;
    }
    }
    return false;
    //return TRUE;
}

//inset the new user
public function adduser()
{
    $this->sql= "INSERT INTO admin_data (admin_id,admin_name,admin_email,password,access_level,admin_img) 
    VALUES ('','$this->Admin_username','$this->admin_email','$this->password','$this->access_level','$this->img_name')";
    $this->res = mysqli_query($this->conxn,$this->sql) or die($this->error = mysqli_error($this->conxn));
    $this->affRows=mysqli_affected_rows($this->conxn);
    if($this->affRows>0)
    {
    return TRUE;
}
else
return false;

}

//display content of whole table
public function getalluser()
{
    
$this->sql= "SELECT * FROM admin_data";
$this->res=mysqli_query($this->conxn,$this->sql) or die($this->error=mysqli_query($this->conxn));
$this->numRows=mysqli_num_rows($this->res);

    $this->arr=array();
    if($this->numRows>0)
    {
        while($this->data=mysqli_fetch_assoc($this->res)){
        array_push($this->arr,$this->data);
    }
    }
    return $this->arr;
    //return TRUE;
}

public function deleteuser()
{
    
    $this->sql = " SELECT admin_img FROM admin_data WHERE admin_id = '$this->admin_id' ";
        $this->res = mysqli_query($this->conxn, $this->sql) 
            or trigger_error($this->err = mysqli_error($this->conxn));
        $this->numRows = mysqli_num_rows($this->res);
        $this->data = mysqli_fetch_assoc($this->res);
        
        //filename
        $file_name = $this->data['admin_img'];
        
    
        $destination="/projects/Finished/Prabhat/admin/kode/Uploads/".$file_name;
                    
       
        //delete the file
        if(file_exists($_SERVER['DOCUMENT_ROOT'].$destination)){

        
                if(unlink($_SERVER['DOCUMENT_ROOT'].$destination)){
            //file removed from the server
            //now remove from the database
                    $this->sql = " DELETE FROM admin_data WHERE admin_id = '$this->admin_id' ";
                    $this->res = mysqli_query($this->conxn, $this->sql)
                    or trigger_error($this->err = mysqli_error($this->conxn));
                    $this->affRows = mysqli_affected_rows($this->conxn);
                    
                
                    if($this->affRows>0){
                        
                    return TRUE;
                    }
                    else{
                        return FALSE;
                    }
                    //unlink ends
                    }

                
                else{
                     return FALSE;
                }
        }//delete file ends

   

   

}//function ends



public function updateuser()
{
    $this->sql="UPDATE admin_data SET admin_name='$this->Admin_username', admin_email='$this->admin_email', password='$this->password',admin_img='$this->img_name' WHERE admin_id ='$this->admin_id'";
    $this->res = mysqli_query($this->conxn,$this->sql) or die($this->error = mysqli_error($this->conxn));
    $this->affRows=mysqli_affected_rows($this->conxn);
    if($this->affRows>0)
    {
    return TRUE;
}
else
return false;


  
}




}//class ends



