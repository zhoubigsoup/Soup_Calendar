<?php


$ToolbarOtherActive=ToolbarOtherAct("Login");
if($_POST['issubmited']!=null|| $request['type']=="api")
{
	$username=$password="";
	$username=AntiUnWord($_POST['username']);
	$password=md5(AntiUnWord($_POST['password']));
	if($username==null){
		if($request['type']=="api[]"){
		      $API['status']="0";
			  $API['message']="NULL_username";
			  echoAPI($API,"die");
		  }
		$userwarning="Please enter username";
	
	}elseif($password==null){
		if($request['type']=="api"){
		      $API['status']="0";
			  $API['message']="NULL_password";
			  echoAPI($API,"die");
		  }
		$passwarning="Please enter password";
	
	}else{
		$result = queryMySQL("SELECT username,password FROM user
        WHERE username='$username' AND password='$password'");

      if ($result->num_rows == 0)
      {
		  if($request['type']=="api"){
		      $API['status']="0";
			  $API['message']="INCORRECT_username";
			  echoAPI($API,"die");
		  }
        $userwarning="incorrect username or password";
	  }
      else
      {
		$result = queryMySQL("SELECT *FROM user WHERE username='$username'");
		$rows=$result->num_rows;
		$row=$result->fetch_array(MYSQLI_ASSOC);
        $API['result']['username']=$_SESSION['username'] = $row['username'];
		$API['result']['type']=$_SESSION['type'] = $row['type'];
		$API['result']['signupDate']=$_SESSION['date'] = $row['date'];
		$API['result']['uid']=$_SESSION['uid'] = $row['uid'];
		$API['result']['userStatus']=$_SESSION['status'] = $row['status'];
		$API['result']['email']=$_SESSION['email'] = $row['email'];
		$API['result']['phoneNumber']=$_SESSION['phonenumber'] = $row['phonenumber'];
		$API['result']['XP']=$_SESSION['xp'] = $row['xp'];
		$API['result']['defaultTime']=$_SESSION['defaultTime'] = $row['defaultTime'];
		$API['result']['superAdmin']=$_SESSION['superadmin'] = $row['superadmin'];
		$API['status']="1";
		$API['message']="SUCCESS_login";
		if($request['type']=="api"){
			
			echoAPI($API,"die");
		}else{
			require_once("theme/default/heads/calendarhead.php");
		}
			
        messageBox("Login successfully",1,rJSURLJump(rPHPPageAddress('calendar')),'die');
		//die("<script>layer.msg('add task successfully', {icon: 1},function(){url='calendar.php';parent.layer.close(index);});</script>");
      }
	}
	$ArrayData=InputWarning($userwarning,$passwarning);
}


require_once("theme/default/heads/calendarhead.php");
require_once("theme/default/headers/header2.php");
require_once("theme/default/bodys/login.php");
require_once("theme/default/footer/foot.php");
?>