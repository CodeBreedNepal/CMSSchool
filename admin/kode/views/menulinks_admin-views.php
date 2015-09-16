<?php
//require('classes/user.class.php');
//require('classes/db-connection.class.php');

$objUser=new User();
$id=isset($_SESSION['uid']) ? $_SESSION['uid'] : '';
$objUser->setuid($id);
$data_list=$objUser->user_info();

?>


<div class="navbar-default sidebar" role="navigation">
        
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                            <div class="user_info">
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr><td><?php echo "<img src=\"Uploads/{$data_list['admin_img']}\" alt='{$data_list['admin_img']}' class='img-responsive' id='static_img'> "?></td></tr>
                                                <tr>
                         <td>

                            Admin Name:    <?php echo "<span class='red-word'>"  .$data_list['admin_name']. "</span>"; ?></td>
         
                                            </tr>
                    <tr><td>Login Date:    <?php echo "<span class='red-word'>" .$data_list['login_date']. "</span>"; ?></td></tr>

                            </tbody></table>

                            </div>

                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>



                        <li>
                            <a class="active" href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="index.php?action=<?php echo base64_encode('student-form')?>"><i class="fa fa-edit fa-fw"></i> Student-Forms</a>
                        </li>
                        <li>
                            <a href="index.php?action=<?php echo base64_encode('upimg'); ?>"><i class="fa fa-film fa-fw"></i> Upload Image</a>
                        </li>
                        <li>
                            <a href="index.php?tab=upevents"><i class="fa fa-upload fa-fw"></i> Upcoming events</a>
                        </li>
                        <li>
                            <a href="index.php?tab=data-table"><i class="fa fa-table fa-fw"></i>Data-Tables</a>
                        </li>
                        
                        
                        
                        
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>