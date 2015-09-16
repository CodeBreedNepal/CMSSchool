<script type="text/javascript">
 // function validate_feedback()
  //{
    //var name=document.forms['feedbackform']['feed_name'].value;
    


  //}
  function validate_feedback()
  {
    var name=document.forms['feedbackform']['feed_name'].value;
    var email=document.forms['feedbackform'] ['feed_email'].value;
    var message=document.forms['feedbackform'] ['feed_msg'].value;
    var emails=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;//regex for email
    var spaces= /\s/;
    var letters = /^[A-Za-z]+$/;//regex for letters
    var checkname=name.match(letters);
    var checkemail=email.match(emails);
    if(name=="" || name==null)
    {
      document.getElementById('alert1').innerHTML=('* Fill up the Name.');
      return false;
    }
    else if(name.length<5)
    {
      document.getElementById('alert1').innerHTML=("* Please Enter Full Name Greater than 5 character.");
      return false;
    }
    
    else if(checkname=='' || checkname==null)
    {
      document.getElementById('alert1').innerHTML=("* Invalid Name.. Donot use Numbers.");
      return false;
    }
   else if(email=='' || email==null)
    {
       document.getElementById('alert2').innerHTML=("* &nbsp Please insert the Email.");
      return false;
    }
      else if(checkemail=='' || checkemail==null)
    {
      document.getElementById('alert2').innerHTML=("* &nbsp Email Invalid.");
      return false;
    }

    
    else if(message=='' || message==null)
    {
      document.getElementById('alert3').innerHTML=("* &nbsp Please insert the Message.");
      return false;
    }
    else if(message.length>130)
    {
      document.getElementById('alert3').innerHTML=("* Message must be less than 130 characters.");
      return false;

    }
   

  }



</script>
<div id="form">
    <p id="feedback_button"><span class="glyphicon glyphicon-comment gi-4x"></span>Feedback</p>


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
    
	<form class="form-horizontal" role="form" name="feedbackform" id="Message_form" onsubmit='return validate_feedback()'  action='admin/kode/model/process_feedback.php' method="POST">
	
    <label for="name">Name:</label>
    <input type="text" class="form-control" placeholder="Name." name="feed_name" tabindex="1">
    <br/><div id="alert1"></div>
  
    <label for="name">Email:</label>
    <input type="text" class="form-control" placeholder="Email" name="feed_email" tabindex="2">
    <br/><div id="alert2"></div>


  
    <label for="name">Message:</label>
    <textarea class="form-control" rows="5"  name="feed_msg" tabindex="3"></textarea>
  <br/><div id="alert3"></div>
    <br>
  <div class="btn-group">
  <button class="btn btn-danger" type="submit">Give Feedback ->></button>
  
</div>
		</form>
		</div>


  <div class="container"> <div class="row">
                <div class="col-md-12" id="footer">
                      <center>All rights reserved <span class="glyphicon glyphicon-registration-mark"></span>PEBS .  @2015 | 2016  Developed by: <a href="www.rohankumarshrestha.com.np" title="CodeBreed Solutions || DESIGN DEVELOP CODE">CodeBreed Solutions</a></center>
                            </div>
</div></div>
                  