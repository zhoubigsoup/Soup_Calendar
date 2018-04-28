<?php
function IsInTime($timeBegin1,$timeEnd1,$nowTime)  
{  
	$timeBegin1=strtotime($timeBegin1);
	$timeEnd1=strtotime($timeEnd1);
	if(!isset($nowTime)) $nowTime=time();  
     
    if($nowTime >= $timeBegin1 && $nowTime <= $timeEnd1)  
    {  
        return true;  
    }  
      
    return false;  
}  
function CalculateTime($starttime,$endtime,$calculatetime){
	return((strtotime($endtime)-strtotime($starttime))/($calculatetime));
}
?>