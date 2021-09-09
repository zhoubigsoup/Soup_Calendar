<?php
if (!isset($_SESSION['username'])) die('<script>url="?r=login";window.location.href=url;</script>');
require_once 'theme/default/heads/calendarhead.php';
$username=$_SESSION['username'];
$namewarning =  $starttimewarning = $endtimewarning = $color = InputWarningText("");
if ($_POST['name'] != null) {
    $name =  $color = $starttime = $endtime = "";
    $name = AntiUnWord($_POST['name']);
	$eventdate = AntiUnWord($_POST['eventdate']);
	$isrepeat = AntiUnWord($_POST['isrepeat']);
	$repeat_week=$_POST['repeat-week'];
    $starttime = AntiUnWord($_POST['starttime']);
    $endtime = AntiUnWord($_POST['endtime']);
	$repeatstart = AntiUnWord($_POST['repeatstart']);
    $repeatend = AntiUnWord($_POST['repeatend']);
    $color = AntiUnWord($_POST['color']);
	$repeat_week_char="";
	for($i=0;$i<count($repeat_week);$i++)
	{
		$repeat_week_char=$repeat_week_char.AntiUnWord($repeat_week[$i]).",";
	}
	$avalible=true;
    if ($name == null) {
        $namewarning = InputWarningText("Please enter name");
		$avalible=false;
    } elseif($isrepeat[1]=="yes"){
		if($repeatstart== null){
			$repeatstart=InputWarningText("Please select a date");
			$avalible=false;
		}elseif($repeatend== null){
			$repeatend=InputWarningText("Please select a date");
			$avalible=false;
		}elseif($repeat_week_char== null){
			$repeatweek=InputWarningText("Please select a date");
			$avalible=false;
		}
	}elseif ($starttime == null) {
        $starttimewarning = InputWarningText("Please select start time");
		$avalible=false;
    } elseif ($eventdate == null) {
        $avalible=false;
		$eventdate=InputWarningText("Please select a date");
		
    } elseif ($endtime == null) {
        $endtimewarning = InputWarningText("Please select due time");
		$avalible=false;
    }  
	if($avalible==true){
		
		queryMysql("INSERT INTO events (name,starttime,endtime,color,user,eventdate,repeatweek,repeatstart,repeatend)VALUES('$name','$starttime','$endtime','$color','$username','$eventdate','$repeat_week_char','$repeatstart','$repeatend')");
		die("<script>layer.msg('Add event successfully', {icon: 1},function(){url='calendar.php';parent.layer.close(index);});</script>");
		
	}
}


require_once 'theme/default/bodys/addevent.php';
?>