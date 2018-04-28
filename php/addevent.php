<?php
require_once '/functions/function_main.php';
if (!isset($_SESSION['username'])) die('<script>url="login.php";window.location.href=url;</script>');
require_once '/theme/default/heads/calendarhead.php';
$username=$_SESSION['username'];
$namewarning =  $starttimewarning = $endtimewarning = $color = InputWarningText("");
if ($_POST['name'] != null) {
    $name =  $color = $starttime = $endtime = "";
    $name = AntiUnWord($_POST['name']);
	$eventdate = AntiUnWord($_POST['date']);
    $starttime = $eventdate." ".AntiUnWord($_POST['starttime']);
    $endtime = $eventdate." ".AntiUnWord($_POST['endtime']);
    $color = AntiUnWord($_POST['color']);
	
    if ($name == null) {
        $namewarning = InputWarningText("Please enter name");
    } elseif ($starttime == null) {
        $starttimewarning = InputWarningText("Please select start time");
    } elseif ($eventdate == null) {
        $eventtimewarning = InputWarningText("Please choose a date");
    } elseif ($endtime == null) {
        $endtimewarning = InputWarningText("Please select due time");
    }  else{
		
		queryMysql("INSERT INTO events (name,starttime,endtime,color,user)VALUES('$name','$starttime','$endtime','$color','$username')");
		die("<script>layer.msg('add event successed', {icon: 1},function(){url='calendar.php';parent.layer.close(index);});</script>");
		
	}
}


require_once '/theme/default/bodys/addevent.php';
?>