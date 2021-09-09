<?php
$date_timestamp=date('Y-m-d H:i:s');

function InputWarning($name, $value='') {

    $args = func_get_args();
	$num=0;
	foreach($args as $arg){
		$WarningText=$args[$num];
		if($WarningText!=""){
			$WarningLabel[$num]="<label class='am-form-label' for='doc-ipt-warning'>$WarningText</label>";
			$WarningClass[$num]="am-form-warning";
		    $ReturnData=array($WarningClass,$WarningLabel);
			return($ReturnData);

			

		}
		$num++;
		
	}

		

}
function InputWarningText($WarningText){
	if($WarningText!=""){
		return(array("text"=>"<label class='am-form-label' for='doc-ipt-warning'>$WarningText</label>","class"=>"am-form-warning"));
	}
}

function ToolbarActive($TolNumber) {
	$ToolbarAct[$TolNumber]="am-active";

	return($ToolbarAct);

}
function LeftbarActive($TolNumber) {
	$ToolbarAct[$TolNumber]="active";

	return($ToolbarAct);

}
function ToolbarOtherAct($pagename){
	return("<li class='am-active'><a >$pagename</a></li>");
}
function returnToolbarLogin(){
	if($_SESSION['type']=="admin")$backpanel='<li><a href="backpanel.php">Manage</a></li>';
	if(!isset($_SESSION['username'])){
	$LoginResource=<<<EOT
					<li style="width:0px;float: right;margin-top:10px"class="text-right hidden-xs">
			
			

  <div class="col-lg-2" style="margin-left:5px;padding-left: 10px;padding-right: 0px;width:140px">
	    <button  onclick="window.location.href='signup.php';"class="button button-pill button-border button-rounded button-primary">Sign up</button>
	   
	  </div></li>
			<li style="width:200px;float: right;margin-top:10px"class="text-right hidden-xs">
				<div class="col-lg-2" style="padding-left: 130px;padding-right: 0px;width:200px">
	  <button onclick="window.location.href='?r=login';" class="button button-primary button-pill "style="width:95.99px">Login</button></div>
			</li>
EOT;
		return($LoginResource);
	}else{
		$username=$_SESSION['username'];
		$xp=$_SESSION['xp'];
		$process=$xp;
		$msgs=GetMSG();
		if($msgs!=0){
			$msgs=<<<EOT
				<span id="msgspan"class="am-badge am-badge-danger am-round am-fl"style="position:fixed">$msgs
			</span>
				
				
EOT;
			$namemsg=<<<EOT
				<span id="namespan"class="am-badge am-badge-danger am-round am-fl"style="position:fixed;height:10px;padding-left:0px;padding-right:0px;margin-top:5px">
			</span>
				
EOT;
		}else{
			$msgs="";
		}
		$LoginResource=<<<EOT
			<li class="pull-right"><div class="am-dropdown" data-am-dropdown> <button type="button" class="btn btn-dark am-dropdown-toggle"  style="background-color:rgba(0,0,0,0);border-color: rgba(0,0,0,0);color:#999999;height:60px" aria-haspopup="true" aria-expanded="false">
  <img class="img-circle" style="width: 40px;height:40px" src="theme/default/Amaze%20UI_files/feng.jpg">  $username $namemsg <span class="caret"></span>
  </button>
			 <ul class="am-dropdown-content">
    <li class="am-dropdown-header">$username</li>
	<li><div class="am-progress am-progress-striped am-progress-md am-active "style="margin-bottom: 1rem">
  <div class="am-progress-bar am-progress-bar-secondary"  style="width: $xp%">$xp/100</div>
</div></li>
			$backpanel
    <li><a href="profile.php">Profile</a></li>
    <li><a style="cursor:pointer"onclick=" layer.open({
    type: 2,
    title: 'Inbox',
    maxmin: true,
    area: ['90%', '90%'],
    content: ['?r=message'],
    
  }); $('#msgspan').addClass('hidden');$('#namespan').addClass('hidden');">Inbox $msgs</a></li>
    <li class="am-divider"></li>
    <li><a href="?r=logout">Logout</a></li>
			</ul></div></li>
EOT;
		return($LoginResource);
	}
	
	
	
}
 function GetMSG(){
	$username=$_SESSION['username'];	
	//更新系统消息
	$result = queryMySQL("SELECT *FROM Sys_msg order by date DESC ");
	$rows=$result->num_rows;
	for($j = 0,$style=1;$j < $rows; ++$j){
	$result->data_seek($j);
	$row=$result->fetch_array(MYSQLI_ASSOC);
	$title=$row['title'];
	$text=$row['text'];
	$date=$row['date'];
	$mid=$row['mid'];
	$result2 = queryMySQL("SELECT *FROM message WHERE toUser='$username' AND smid='$mid'");
		
        if ($result2->num_rows == 0) {
			queryMysql("INSERT INTO message (title,text,date,type,comefrom,toUser,smid)VALUES('$title','$text','$date','system_Msg','Official Message','$username',$mid)");
		}
	}
	 //获取未读消息数
	 $result = queryMySQL("SELECT *FROM message WHERE toUser='$username' AND viewed=0");
	 $rows=$result->num_rows;
	 $msgs=0;
	 for($j = 0,$style=1;$j < $rows; ++$j)
	 {
		 $msgs++;
	 }
	 return($msgs);
	 
 }
function UpdateTasks(){
	$result = queryMySQL("SELECT *FROM tasks WHERE status='not-doing'");
	$rows=$result->num_rows;
	for($j = 0,$style=1;$j < $rows; ++$j){
		$result->data_seek($j);
		$row=$result->fetch_array(MYSQLI_ASSOC);
		$starttime=$row['starttime'];
		$endtime=$row['endtime'];
		$tid=$row['tid'];
		if(IsInTime($starttime,$endtime,time())){
		queryMysql("UPDATE tasks SET status='doing' WHERE tid=$tid");
		}
 
	}
	 
 }

 function GetRS($len) 
{ 
    $chars = array( 
        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",  
        "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",  
        "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",  
        "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",  
        "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",  
        "3", "4", "5", "6", "7", "8", "9" 
    ); 
    $charsLen = count($chars) - 1; 
    shuffle($chars);   
    $output = ""; 
    for ($i=0; $i<$len; $i++) 
    { 
        $output .= $chars[mt_rand(0, $charsLen)]; 
    }  
    return $output;  
} 

?>