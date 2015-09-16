<?php

ob_start();
session_start();
$_SESSION['hasvisited']='yes';
include('admin/kode/model/process_count_visitor.php');
include('classes/bootstrap-page.class.php');
require_once("views/header-views.php");
require_once("views/banner-views.php");
require_once("views/menu-views.php");
require_once("views/sidebar-left-views.php");
  
  $pages=new pages();
  $pages->change_page();

          
require_once("views/footer-views.php");
require_once("views/java-script-views.php");

//ob_clean();

?>



              
                   




                                    

                                                      
 


                                                                             
             
                




    

