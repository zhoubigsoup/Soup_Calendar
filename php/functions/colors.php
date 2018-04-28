<?php
$flatColor=array();
$flatColor['green']='#13ce66';
$flatColor['red']='#ff4949';
$flatColor['orange']='#FF5722';
$flatColor['yellow']='#FF9800';
$flatColor['blue']='#13ce66';
$flatColor['brown']='#795548';
function Color_Transform($usercolor){
	return($flatColor[$usercolor]);
}
?>