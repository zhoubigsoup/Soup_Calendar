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
function WeekDay(){
	$ga = date("w"); 
	switch( $ga ){ 
		case 1 : return("mon");break; 
		case 2 : return("tue");break; 
		case 3 : return("wed");break; 
		case 4 : return("thu");break; 
		case 5 : return("fri");break; 
		case 6 : return("sat");break; 
		case 0 : return("sun");break; 
default : echo "Incorrect value！"; 
}; 
}
?>