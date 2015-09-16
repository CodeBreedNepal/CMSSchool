<html>
<head>
	    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="stylesheet" type="text/css" href="kode/bootstrap_admin/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="kode/bootstrap_admin/css/admin.css">
	<script type="text/javascript" src="kode/bootstrap_admin/js/bootstrap.min.js"></script>
</head>


<body>

<script type="text/javascript">
    function validate()
    {
        var a=document.forms['form_login'] ['admin_username'].value;
        var b=document.forms['form_login']['admin_password'].value;
            if(a=='' || a==null )
            {
                alert("Please enter the Username");
                return false;
            }
             else if(b=='' || b==null)
            {
                alert("Please enter the Password.");
                return false;
            }
            else
            {
             return true;
            }

    }

</script>

 <div class="container" id="container">
        <div class="row">
           <div class="col-md-4 col-md-offset-4 " id="login-div">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><center>Please Sign In</center></h3>
                    </div>
                    <div class="panel-body">
                        <?php if(isset($_GET['error'])){ ?>
        <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo base64_decode($_GET['error']); ?>
                </div>
                <?php } ?>
                        <form class="bs-example bs-example-form"  name="form_login" onsubmit="return validate()" action="kode/model/login_check.php"  method="post">
                            <fieldset>
                             
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <input class="form-control" placeholder="Username" name="admin_username" type="text" autofocus>
                                </div><br/>

                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>

                                    <input class="form-control" placeholder="Password" name="admin_password" type="password" value="">

                                </div><br/>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>

                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="submit" class="btn btn-lg btn-success btn-block">Login   >>></button><br>

                                <label>Recover your<a href="kode/index.php?menu=user&action=details"> Username or Password</a></label>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
           
        </div>
    </div>




</body></html>