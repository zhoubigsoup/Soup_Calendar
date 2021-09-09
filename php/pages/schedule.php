<?php
$ToolbarAct=ToolbarActive(0);
$LeftbarAct=LeftbarActive('Schedule');
if (!isset($_SESSION['username'])) die('<script>url="login.php";window.location.href=url;</script>');
$username=$_SESSION['username'];
require_once 'theme/default/heads/calendarhead.php';
require_once 'theme/default/headers/leftbar2.php';
require_once 'theme/default/headers/header2.php';

//tasks
UpdateTasks();
$result = queryMySQL("SELECT *FROM tasks WHERE status='doing' AND user='$username' order by endtime ");
$rows=$result->num_rows;
$calendar['totaltasks']=0;
for($j = 0;$j < $rows; ++$j)
{
	
	$result->data_seek($j);
	$row=$result->fetch_array(MYSQLI_ASSOC);
	$tid=$row['tid'];
	$name=$row['name'];
	$starttime=$row['starttime'];
	$endtime=$row['endtime'];
	$status=$row['status'];
	$image=$row['image'];
	if($j==0){
		$startCalendarDate=$starttime;
		
	}
	if(IsInTime($starttime,$endtime,$startCalendarDate)){
		$calendar['totaltasks']++;
		$color=$flatColor['green'];
	
	$calendar['events']=$calendar['events'].<<<EOT

	        {
          title: '$name',
          start: '$starttime',
          end: '$endtime',
		  color:"$color"
        },
EOT;
	}
	//$cards=$cards.defaultcard($fid,$title,$describtion,'查看教程',$icon,$partname,$imagepath,$thumb);
$startCalendarDate=date('Y-m-d',strtotime( " +1 days ",strtotime($startCalendarDate)));
}
//events
$result = queryMySQL("SELECT *FROM events WHERE user='$username' order by starttime");
$calendar['totalevents']=$rows=$result->num_rows;

for($j = 0,$style=1;$j < $rows; ++$j)
{
	$result->data_seek($j);
	$row=$result->fetch_array(MYSQLI_ASSOC);
	$id=$row['id'];
	$name=$row['name'];
	$detail=$row['detail'];
	$starttime=$row['starttime'];
	$endtime=$row['endtime'];
	$color=$flatColor[$row['color']];
	
	$calendar['events']=$calendar['events'].<<<EOT

	        {
          title: '$name',
          start: '$starttime',
          end: '$endtime',
		  color:"$color"
        },
EOT;
	//$cards=$cards.defaultcard($fid,$title,$describtion,'查看教程',$icon,$partname,$imagepath,$thumb);
}

require_once 'theme/default/bodys/schedule.php';
?>
