<?php
$ToolbarAct=ToolbarActive(0);
$LeftbarAct=LeftbarActive('Dashboard');
if (!isset($_SESSION['username'])) die('<script>url="?r=login";window.location.href=url;</script>');
$username=$_SESSION['username'];
require_once 'theme/default/heads/calendarhead.php';
require_once 'theme/default/headers/leftbar2.php';
require_once 'theme/default/headers/header2.php';

//tasks
UpdateTasks();
$result = queryMySQL("SELECT *FROM tasks WHERE status='finished' AND user='$username'");
$calendar['finished_tasks']=$result->num_rows;
$result = queryMySQL("SELECT *FROM tasks WHERE status='doing' AND user='$username' order by endtime ");
$rows=$result->num_rows;
$calendar['totaltasks']=0;
for($j = 0,$style=1;$j < $rows; ++$j)
{
	$result->data_seek($j);
	$row=$result->fetch_array(MYSQLI_ASSOC);
	$tid=$row['tid'];
	$name=$row['name'];
	$starttime=$row['starttime'];
	$endtime=$row['endtime'];
	$status=$row['status'];
	$image=$row['image'];
	if(IsInTime($starttime,$endtime,time())){
		$calendar['totaltasks']++;
		$calendar['tasks']=$calendar['tasks'].<<<EOT

<div class="taskbar">
         <img class="taskbarimg img-circle am-inline-block" src="$image"> 
         <div class="am-inline-block">
            <span class="taskbartext">$name</span> 
            <div>
			   <span class="am-badge am-badge-primary am-round " onclick="layer.open({
    type: 2,
    title: 'Edit',
    maxmin: true,
    area: ['90%', '90%'],
    content: ['?r=edittask&type=edit&tid=$tid'],
    
  }); $('#msgspan').addClass('hidden');$('#namespan').addClass('hidden');" style="margin-bottom: 5px;"><i class="am-icon-pencil"></i></span> 
               <span class="am-badge am-badge-success am-round " onclick="window.open('?r=edittask&type=finish&tid=$tid');"><i class="am-icon-check"></i></span> 
            </div>
         </div>
      </div>
EOT;
	}
	//$cards=$cards.defaultcard($fid,$title,$describtion,'查看教程',$icon,$partname,$imagepath,$thumb);
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
	$eventdate=$row['eventdate'];
	$repeat_week=$row['repeatweek'];
	$repear_week_array=explode(',',$repeat_week); 
	$repeat_start=$row['repeatstart'];
	$repeat_end=$row['repeatend'];
	$endtime=$row['endtime'];
	$color=$flatColor[$row['color']];
	if($repeat_week== null){
		$starttime = $eventdate." ".$starttime;
		$endtime = $eventdate." ".$endtime;
		if(IsInTime($starttime,$endtime,time())){
		}else continue;
	}else{
		if(IsInTime($repeat_start,$repeat_end,time())){
			for($i=0;$i<count($repear_week_array);$i++){
				if($repear_week_array[$i] == WeekDay()){
					$starttime = date("Y-m-d")." ".$starttime;
					$endtime = date("Y-m-d")." ".$endtime;
					$avalible=true;
					break;
				}else{
					$avalible=false;
					continue;
				}
			}
			if($avalible==true){}else{
				continue;
			}
		}else{
			continue;
		}
	}
	if(CalculateTime($starttime,$endtime,24)<45&&CalculateTime($starttime,$endtime,24)>20){
		$endtime=date('Y-m-d H:i:s',strtotime( " +10 minutes ",strtotime($endtime)));
	}
	if(CalculateTime($starttime,$endtime,24)<19){
		$endtime=date('Y-m-d H:i:s',strtotime( " +20 minutes ",strtotime($endtime)));
	}
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

require_once 'theme/default/bodys/calendar.php';
?>
