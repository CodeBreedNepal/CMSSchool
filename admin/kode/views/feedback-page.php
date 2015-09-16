<?php require_once('classes/locate.class.php');
        require_once('classes/feedback.class.php'); ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-comment fa-fw"></i><span class="blue-word">Feedbacks</span></h1>
                </div>
                 <div class="col-lg-12">
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
                 </div>
                  <div class="col-lg-12">
                 <?php 
                 
                

                 		$objFeedback=new Feedback();
                 		$data_list=$objFeedback->getallfeedback();



                 ?>
                 <table class="table">
   <thead>
      <tr class="danger">
      	
         <th>Id</th>
         <th>Name</th>
         <th>Email</th>
         <th>Message</th>
         <th>Date Sent</th>
         <th>IP Address</th>
            <th></th>
         
      </tr>
<?



foreach ($data_list as $key => $value) {
                        if($value['mycheck']=='1') {?>
                    
               
<tr class="success" onclick="document.location = 'index.php?action=<?php echo base64_encode('feedback-page');?>&opt=process_check&fid=<?php echo base64_encode($value['id']);?>'">

                

                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['name']; ?></td>
                        <td><?php echo $value['email']; ?></td>
                        <td><?php echo $value['msg']; ?></td>
                        <td><?php echo $value['date_sent']; ?></td>
                        <td><?php echo $value['ip_address']; ?></td>


                        



 <td>
                <a href='index.php?action=<?php echo base64_encode('feedback-page');?>&opt=process_feedback_delete&fid=<?php echo base64_encode($value['id']);?>'><button type="button" class="close" title="Delete" >&times;</button></a>

                

                                        </td>
                        
                </tr>


                
                <?php }?>


                <?php if($value['mycheck']=='0') {?>
                    
               
<tr class="active" onclick="document.location = 'index.php?action=<?php echo base64_encode('feedback-page');?>&opt=process_check&fid=<?php echo base64_encode($value['id']);?>'">

                

                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['name']; ?></td>
                        <td><?php echo $value['email']; ?></td>
                        <td><?php echo $value['msg']; ?></td>
                        <td><?php echo $value['date_sent']; ?></td>
                        <td><?php echo $value['ip_address']; ?></td>


                        


<td>
                <a href='index.php?action=<?php echo base64_encode('feedback-page');?>&opt=process_feedback_delete&fid=<?php echo base64_encode($value['id']);?>'><button type="button" class="close" title="Delete" >&times;</button></a>

                

                                        </td>

                        
                </tr>


                 
                <?php }?><?php }?>


   </thead>
   <tbody>


                 </div></div></div>


