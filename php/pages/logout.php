<?php // Example 26-12: logout.php
require_once("theme/default/heads/head1.php");
  if (isset($_SESSION['username']))
  {
    destroySession();
    die("<script>layer.msg('Logout successful', {icon: 1},function(){url='?r=login';window.location.href=url;});</script>");
  }
  else die("<script>layer.msg('Logout failed: You didn't login., {icon: 0},function(){url='?r=login';window.location.href=url;});</script>");
?>
