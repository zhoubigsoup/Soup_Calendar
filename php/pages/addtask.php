<?php

if (!isset($_SESSION['username'])) die('<script>url="login.php";window.location.href=url;</script>');
require_once 'theme/default/heads/calendarhead.php';
$username=$_SESSION['username'];
$namewarning = $detailwarning = $starttimewarning = $endtimewarning = $imagewarning = InputWarningText("");
if ($_POST['name'] != null) {
    $name = $detail = $image = $starttime = $endtime = "";
    $name = AntiUnWord($_POST['name']);
    $detail = AntiUnWord($_POST['detail']);
    $starttime = AntiUnWord($_POST['starttime']);
    $endtime = AntiUnWord($_POST['endtime']);
    $image = AntiUnWord($_POST['image']);
    if ($name == null) {
        $namewarning = InputWarningText("Please enter name");
    } elseif ($detail == null) {
        $detailwarning = InputWarningText("Please enter detail");
    } elseif ($image == null) {
        $imagewarning = InputWarningText("Please choose an image");
    } elseif ($starttime == null) {
        $starttimewarning = InputWarningText("Please select start time");
    } elseif ($endtime == null) {
        $endtimewarning = InputWarningText("Please select due time");
    } elseif($starttime==$endtime){
		 $endtimewarning = InputWarningText("Can't be same date");
	} else{
		
		queryMysql("INSERT INTO tasks (name,detail,starttime,endtime,image,status,user)VALUES('$name','$detail','$starttime','$endtime','$image','not-doing','$username')");
		die("<script>layer.msg('add task successfully', {icon: 1},function(){url='calendar.php';parent.layer.close(index);});</script>");
		
	}
}


require_once 'theme/default/bodys/addtask.php';
?>