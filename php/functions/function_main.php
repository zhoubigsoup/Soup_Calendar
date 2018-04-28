<?php // Mainfunction
  session_start();
  require_once 'colors.php';//Colors 
  require_once '/configs/config_main.php'; //to get the configs
  require_once 'database.php';//database function
  require_once 'souper.php';//souper basic function
  require_once 'session.php';//session functions
  require_once 'email.php';//email function
  require_once 'cards.php';//email function
  require_once 'forumfunction.php';//function of showing forums 
  require_once 'ubb.php';//function of showing forums 
  require_once 'user.php';//function of controling users 
  require_once 'cleanchar.php';//function of cleaning illegal chars 
  require_once 'datetime.php';//function of datetime


//START COMMAND
  $IsLoginResource=returnToolbarLogin();

?>