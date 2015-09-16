
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-comment fa-fw"></i><span class="blue-word">Feedbacks</span></h1>
                </div>
                 <div class="col-lg-12">

                 <?php 
                 require_once('classes/feedback.class.php');
                 require_once('classes/locate.class.php');

                 		$objFeedback=new Feedback();
                 		$data_list=$objFeedback->getallfeedback();



                 ?>
                 <table class="table">
   <thead>
      <tr class="danger">
      		<th></th>
         <th>Id</th>
         <th>Name</th>
         <th>Email</th>
         <th>Message</th>
         <th>Date Sent</th>
         <th>IP Address</th>
         
      </tr>
<?php
foreach ($data_list as $key => $value) {?>

<tr class="active"><td>
                <a href='index.php?action=<?php echo base64_encode('views_user_setting');?>&opt=process_delete&uid=<?php echo $value['admin_id'] ?>'><button type="button" class="close" title="Delete">&times;</button></a>

                

                                        </td>
                

                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['name']; ?></td>
                        <td><?php echo $value['email']; ?></td>
                        <td><?php echo $value['msg']; ?></td>
                        <td><?php echo $value['date_sent']; ?></td>
                        <td><?php echo $value['ip_address']; ?></td>
                        





                </tr>


	
<?php
}
?>

   </thead>
   <tbody>


                 </div></div></div>


