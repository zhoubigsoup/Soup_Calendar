<?php
function rLocalPageAddress($pageName){
	return("pages/".$pageName.".php");
}
function rPHPPageAddress($pageName){
	return("?r=".$pageName);
}
?>