<?php
function messageBox($title,$icon,$script,$echoType){
	if($echoType=="die"){
		die("<script>layer.msg('$title', {icon: $icon},function(){"."$script});</script>");
	}else{
		echo "<script>layer.msg('$title', {icon: $icon},function(){"."$script});</script>";
	}
}
?>