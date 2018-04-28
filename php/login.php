<?php

require_once '/functions/function_main.php';
require_once("theme/default/heads/calendarhead.php");
$ToolbarOtherActive=ToolbarOtherAct("Login");
if($_POST['issubmited']!=null)
{
	$username=$password="";
	$username=AntiUnWord($_POST['username']);
	$password=md5(AntiUnWord($_POST['password']));
	if($username==null){
		$userwarning="Please enter username";
	
	}elseif($password==null){
		$passwarning="Please enter password";
	
	}else{
		$result = queryMySQL("SELECT username,password FROM user
        WHERE username='$username' AND password='$password'");

      if ($result->num_rows == 0)
      {
        $userwarning="incorrect username or password";
	  }
      else
      {
		$result = queryMySQL("SELECT *FROM user WHERE username='$username'");
		$rows=$result->num_rows;
		$row=$result->fetch_array(MYSQLI_ASSOC);
        $_SESSION['username'] = $row['username'];
		$_SESSION['type'] = $row['type'];
		$_SESSION['date'] = $row['date'];
		$_SESSION['uid'] = $row['uid'];
		$_SESSION['status'] = $row['status'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['phonenumber'] = $row['phonenumber'];
		$_SESSION['xp'] = $row['xp'];
		$_SESSION['superadmin'] = $row['superadmin'];
        die("<script>layer.msg('Login successed', {icon: 1},function(){url='calendar.php';window.location.href=url;});</script>");
      }
	}
	$ArrayData=InputWarning($userwarning,$passwarning);
}



require_once("theme/default/headers/header2.php");
require_once("theme/default/bodys/login.php");
require_once("theme/default/footer/foot.php");
?>