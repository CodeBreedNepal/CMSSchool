<script type="text/javascript">
  function validate()
  {
    var a=document.forms['adduserform']['admin_name'].value;
    var b=document.forms['adduserform']['admin_email'].value;
    var c=document.forms['adduserform']['admin_password'].value;
    var d=document.forms['adduserform']['admin_password2'].value;
    var e=document.forms['adduserform']['admin_access_level'].value;
    var f=document.forms['adduserform']['admin_img'].value;
      var letters = /^[A-Za-z]+$/;
    //var atpos = b.indexOf('@');
    //var dotpos= b.indexOf('?');
    var spaces= /\s/;
    var emails=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var checkemail=b.match(emails); 

    if(a=='' || a==null)
    {
      document.getElementById('alert1').innerHTML=("* &nbsp Please type your full name");
      return false;
    }
    else if(a.length<5)
    {
      document.getElementById('alert1').innerHTML=("* &nbsp; Please Enter Full Name Greater than 5 character.");
      return false;
    }
    else if(a.match(spaces))
    {
    document.getElementById('alert1').innerHTML=("* &nbsp; Please donot enter the space and tab.");
      return false;
    }


    else if(b==''|| b==null)
    {
      document.getElementById('alert2').innerHTML=("* &nbsp Please type your Email address");
      return false;
    
    }
    else if(b.match(spaces))
    {
      document.getElementById('alert2').innerHTML=("* &nbsp Email Invalid.");
      return false;
    }
    else if(checkemail=='' || checkemail==null)
    {
      document.getElementById('alert2').innerHTML=("* &nbsp Email Invalid.");
      return false;
    }

    else if(c=='' || c==null)
    {
      document.getElementById('alert3').innerHTML=('* Please type Password');
      return false;
    }
    else if(c.length<6 )
    {
      document.getElementById('alert3').innerHTML=('* Weak Password. Password must be greater than 6 character.');
      return false;
    }
    
     else if(d=='' || d==null)
    {
      document.getElementById('alert4').innerHTML=('* Please Re-type Password');
      return false;
    }
    else if(c!=d)
    {
      document.getElementById('alert4').innerHTML=('* Password didnot matched');
      return false;
    }
    
    else if(e=='' || e==null)
    {
      document.getElementById('alert5').innerHTML=('* Please select an access level');
      return false;
    }

    else if(f==''|| f==null)
    {
      document.getElementById('alert6').innerHTML=('* Please select an Image');
      return false;
    }

}


</script>



<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-plus fa-fw"></i><span class="blue-word">User Form</span></h1>
                </div>
                 <div class="col-lg-12">

                 		<form class="form-horizontal" enctype='multipart/form-data' name="adduserform" role="form" action="model/process_add_user.php" onsubmit='return validate()' method="post">
  

<div class="form-group">
    <label class="col-sm-2 control-label" ></label>
    <div class="col-sm-6">
     <?php if(isset($_GET['error'])){ ?>
        <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo base64_decode($_GET['error']); ?>
                </div>
                <?php } ?>
                 <?php if(isset($_GET['success'])){ ?>
        <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo base64_decode($_GET['success']); ?>
                </div>
                <?php } ?>
                </div></div>


   	<div class="form-group">
      <label class="col-sm-2 control-label" for="inputSuccess">
         <strong>Admin Name:</strong>
      </label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="inputSuccess" placeholder="Name.." name="admin_name">
      </div>
      <div id="alert1">
      

      </div>
   </div>
<div class="form-group">
      <label class="col-sm-2 control-label" for="inputSuccess">
         <strong>Admin Email:</strong>
      </label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="inputSuccess" placeholder="Email.." name="admin_email">
      </div>
      <div id="alert2">
      

      </div>
   </div>

   <div class="form-group">
      <label class="col-sm-2 control-label" for="inputSuccess">
         <strong>Password:</strong>
      </label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="inputSuccess" placeholder="Password.." name="admin_password">
      </div>
      <div id="alert3">
      

      </div>
   </div>

   <div class="form-group">
      <label class="col-sm-2 control-label" for="inputSuccess">
         <strong>Re-Type Password</strong>
      </label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="inputSuccess" placeholder="Re-Type Password.." name="admin_password2">
      </div>
      <div id="alert4">
      

      </div>
   </div>

 
   <div class="form-group">
    <label class="col-sm-2 control-label" for="inputSuccess" >
    	<strong>Access level</strong>
      </label>
      <div class="col-sm-6">
      <select class="form-control" name="admin_access_level">
      	<option></option>
         <option>777 (Super Admin )</option>
         <option>770  (Admin)</option>
         
</select>
</div>
<div id="alert5">
      

      </div></div>

<div class="form-group">
     <label class="col-sm-2 control-label" for="inputSuccess">
    	<strong>Image Upload</strong>
      </label>
      <div class="col-sm-6">
      <input type="file" id="inputfile" name="admin_img" >
      <p class="help-block"><span class="red-word">Image size shouldnot exceed 2MB.</span></p>
   </div>
   <div id="alert6">
      

      </div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label" for="inputSuccess"></label>
  <div class="col-sm-6">
    <button  name="btn_submit" class="btn btn-success" >Submit</button>
    <button  name="btn_reset" type="reset" class="btn btn-danger">Reset</button>
  </div>
</div>

</form>
</div>
</div>




