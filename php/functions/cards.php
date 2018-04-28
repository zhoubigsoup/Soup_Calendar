<?php
function GetCardIconByID($id){
	$result = queryMySQL("SELECT *FROM part WHERE pid='$id'");
	$rows=$result->num_rows;
	$row=$result->fetch_array(MYSQLI_ASSOC);
    return($row['icon']);
	
}
function GetCardNameByID($id){
	$result = queryMySQL("SELECT *FROM part WHERE pid='$id'");
	$rows=$result->num_rows;
	$row=$result->fetch_array(MYSQLI_ASSOC);
    return($row['name']);
}

function defaultcard($id,$title,$content,$buttontext,$icon,$icontext,$imagepath,$thumb){
	$content=ubb1($content);
	if($thumb!=-1){
		$thumbhtml=<<<EOT
			<span type="submit"class="am-fr" style="color:white;filter:alpha(opacity=50);
	-moz-opacity:0.5;
	opacity: 0.5;margin-right:8px;margin-top:2px">$thumb  <i class="am-icon-thumbs-up"></i></span>
EOT;
	}
	$CardHtml=<<<EOT
		 <div class="am-card ">
    <div class="thumbnail am-card-inside">
		<div class="am-cf"style="width:100%;height:70px;background: url('$imagepath');opacity:1;filter(alpha=100)">$thumbhtml<h3 class="am-card-title" style="margin-top:43px;margin-left:8px;color:white;filter:alpha(opacity=90);/*IE*/
	opacity:0.9;/*FF*/">$title</h3></div>
      
      <div class="caption">
        
        <p class="am-card-p" >$content</p>
        <p class="am-card-downbar"><div class="am-cf am-vertical-align"><button type="button" class="am-btn am-btn-success am-btn-xs am-fl" OnClick="window.location.href='forum.php?fid=$id';">$buttontext</button><span class="am-fr am-card-downbarauthor" ><i class="$icon"></i>  $icontext</span></div></p>
      </div>
    </div>
  </div>
		
EOT;
	return($CardHtml);
		
	
}
?>