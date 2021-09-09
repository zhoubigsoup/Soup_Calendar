<?php
$ToolbarAct=ToolbarActive(0);
$LeftbarAct=LeftbarActive('Manage');
if (!isset($_SESSION['username'])) die('<script>url="login.php";window.location.href=url;</script>');
$username=$_SESSION['username'];
require_once 'theme/default/heads/calendarhead.php';
require_once 'theme/default/headers/leftbar2.php';
require_once 'theme/default/headers/header2.php';

$page=AntiUnWord($_GET['page']);
if($page=="user"){
	$LeftbarAct=LeftbarActive('Edit');
	require_once("theme/default/headers/backpanelleftbar.php");
	require_once("theme/default/bodys/editUsers.php");
}elseif($page==""){
	$LeftbarAct=LeftbarActive('Edit');
	require_once("theme/default/headers/backpanelleftbar.php");
	require_once("theme/default/bodys/editForums.php");
}



require_once("theme/default/footer/foot.php");


?>
