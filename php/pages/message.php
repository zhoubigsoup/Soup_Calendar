<div class="container" id="frame"style="margin-top:14px;margin-bottom: 80px;padding-left: 2px;padding-right: 2px">
	 <div id="content" style="">
  
<?php
$html="";
require_once("theme/default/heads/calendarhead.php");
if (!isset($_SESSION['username'])) die('<script>url="login.php";window.location.href=url;</script>');
$username=$_SESSION['username'];
GetMSG();
		 
$result = queryMySQL("SELECT *FROM message WHERE toUser='$username'  order by date DESC ");
$rows=$result->num_rows;

for($j = 0,$style=1;$j < $rows; ++$j)
{
	$result->data_seek($j);
	$row=$result->fetch_array(MYSQLI_ASSOC);
	$mid=$row['mid'];
	$title=$row['title'];
	$text=$row['text'];
	$from=$row['comefrom'];
	$date=$row['date'];
	$part=$row['part'];
	$type=$row['type'];
	$isviewd=$row['viewed'];
	if($isviewd==1){
		$isviewd='<span class="am-badge am-badge-success  am-fl"style="margin-top:4px;margin-left:5px;height:18.67px">Readed</span>';
	}else{
		$isviewd='<span class="am-badge am-badge-danger  am-fl"style="margin-top:4px;margin-left:5px;height:18.67px">Unread</span>';
	}
	
	$html=<<<EOT
		$html
			<div class="am-card">
    <div class="thumbnail am-card-inside" >
		
      
      <div class="caption"> 
		  
		  <h2 class="am-card-title am-cf"><span class="am-fl" style="margin-top:5px;font-weight:normal">$title<span style="color:#ADADAD;font-size: 12px;letter-spacing: 0.5px;margin-left: 5px;font-weight: normal"> From:  <a>$from</a></span></span>		</h3>  <hr style="margin-top:5px;" >  
        <div class="am-text-p" >$text</div>
        <p class="am-card-downbar"></p><div class="am-cf "><div class=" am-fl"> <span class="am-badge am-badge-warning  am-fl"style="margin-top:4px"><i class="am-icon-clock-o"></i> $date</span>$isviewd
		  </div>
      </div>
    </div>
  </div>
			  </div>
EOT;
}
		 queryMysql("UPDATE message SET viewed=1 WHERE toUser='$username';");
echo $html;
?>
</div></div>
</html>