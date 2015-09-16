<?php
class Image extends Connection
{
private $img_name;
private $img_extension;
private $img_size;
private $tmp_name;
private $target_dir;



//getter and setters
public function getadmin_img()
{
	$this->img;
}
public function setadmin_img($img='')
{
	$this->img=$img;
}
public function getimg_name()
{
	$this->img_name;
}
public function setimg_name($imgn='')
{
	$this->img_name=$imgn;
}

public function setimg_size($size='')
{
	$this->img_size=$size;
}
public function setimg_type($imgty='')

{
	$this->img_type=$imgty;
}

public function settmp_img_name($tmpimg='')
{
	$this->img_tmp=$tmpimg;
}

public function check_img()
{
	if(isset($this->img)){
      $errors= array();

      //$file_name = $_FILES['image']['name'];
      //$file_size =$_FILES['image']['size'];
      //$file_tmp =$_FILES['image']['tmp_name'];
      //$file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$this->img_name)));
      
      $expensions= array("jpeg","jpg","png","PNG","bmp","Gif");
      $target_dir='../Uploads';

      if(in_array($file_ext,$expensions) === false){
	        $errors[]="Extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($this->img_size> 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      if(file_exists($target_dir.'/'.$this->img_name))
      {
      	$errors[]='File already exists..';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($this->img_tmp,"$target_dir/$this->img_name");
         return true;
      }
      else{
         return false;
      }
   }


}
}

