<?php
$objUser=new User();
//$id=isset($_SESSION['uid']) ? $_SESSION['uid'] : '';
//$objUser->setuid($id);
$data_list=$objUser->getalluser();
//$row=$objUser->getalluser();

?>


<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-cog fa-fw"></i><span class="blue-word">User Setting</span></h1>
                </div>
                	<div class="col-md-12">
                	
                		
                		
                

                	

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
    <table class="table">
   <thead>
      <tr class="danger">
      <th></th>
         
         <th>Admin Name</th>
         <th>Admin Email</th>
         <th>Password</th>
         <th>Admin Ip</th>
         <th>Last Login Date</th>
         <th>Access Level</th>
         <th>Admin Image</th>
      </tr>
   </thead>
   <tbody>

                <?php
                //to display all content of table
                foreach ($data_list as $key => $value) { ?>

                	                <?php if($value['admin_id']!=$_SESSION['uid'])
                                    {?>
                                        <tr class="active"><td>
                <a href='index.php?action=<?php echo base64_encode('views_user_setting');?>&opt=process_delete&uid=<?php echo $value['admin_id'] ?>'><button type="button" class="close" title="Delete">&times;</button></a>

                

                                        </td>
                

                        <td><?php echo ucfirst($value['admin_name']); ?></td>
                        <td><?php echo ucfirst($value['admin_email']); ?></td>
                        <td><?php echo ucfirst($value['password']); ?></td>
                        <td><?php echo ucfirst($value['admin_ip_used']); ?></td>
                        <td><?php echo ucfirst($value['login_date']); ?></td>
                        <td><?php echo ucfirst($value['access_level']); ?></td>
                        <td><?php echo "<img src=\"Uploads/{$value['admin_img']}\" alt='{$data_list['admin_img']}' id='thumbnailpic'>"; ?></td>





                </tr>


                                <?php }?><?php }?>
                

             


              
                		
                		

               
                