<?php // Mainfunction
  session_start();
  require_once 'configs/config_main.php'; //to get the configs

  require_once 'System_lib/colors.php';//Colors 
  require_once 'System_lib/database.php';//database function
  require_once 'System_lib/session.php';//session functions
  require_once 'System_lib/email.php';//email function
  require_once 'System_lib/ubb.php';//function of showing forums 
  require_once 'System_lib/cleanchar.php';//function of cleaning illegal chars 
  require_once 'System_lib/datetime.php';//function of datetime
  require_once 'System_lib/JS.php';//function of JavaScript
  require_once 'System_lib/pages.php';//function of pages
  require_once 'System_lib/API.php';//function of pages

  require_once 'Custom/user.php';//function of controling users 
  require_once 'Custom/cards.php';//email function
  require_once 'Custom/forumfunction.php';//function of showing forums 
  require_once 'Custom/souper.php';//souper basic function
  require_once 'Custom/message.php';//souper basic function
  
//START COMMAND
  $IsLoginResource=returnToolbarLogin();

?>