<?php
function echoAPI($APIarray,$echoType){
	$APIarrayString=json_encode($APIarray);
	if($echoType=="die"){
		die($APIarrayString);
	}else{
		echo $APIarrayString;
    }
	
}
?>