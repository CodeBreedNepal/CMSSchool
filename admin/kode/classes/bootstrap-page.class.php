<?php
            class pages
            {

      function change_page()
            {

          $menu=isset($_GET['action']) ? $_GET['action'] : '';
          $menu=base64_decode($menu);
          

          if (($menu)!='') 
            
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
  require_once('views/home_admin-views.php');
}
}
  
  
    function change_option()
    {
      $opt=isset($_GET['opt']) ? $_GET['opt'] : '';
      if ($opt!='') {
            if(file_exists('model/'.$opt.'.php'))
            {
              require_once('model/'.$opt.'.php');
            }
            else
            {
              require_once('model/error-views.php');
            }
      }
      else
      {
        return false;
        exit();
      }

    }
    


}

            ?>
