<?php // Example 26-12: logout.php
require_once '/functions/function_main.php';
require_once("theme/default/heads/head1.php");
  if (isset($_SESSION['username']))
  {
    destroySession();
    die("<script>layer.msg('登出成功，将为您跳转到登录页面', {icon: 1},function(){url='login.php';window.location.href=url;});</script>");
  }
  else die("<script>layer.msg('登出失败，您尚未登录', {icon: 0},function(){url='login.php';window.location.href=url;});</script>");
?>
