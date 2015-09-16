<?php
            class pages
            {

      function change_page()
            {

          $menu=isset($_GET['tab']) ? $_GET['tab'] : '';
          $menu=base64_decode($menu);
          if ($menu!='') 
            
            {
              /*check the file*/
             if(file_exists('views/'.$menu.'.php'))
             {
              require_once('views/'.$menu.'.php');

             }
             else
             {
              require_once('views/error-views.php');
             }
           }
else
{
  require_once('views/home-views.php');
}
}
}

            ?>
