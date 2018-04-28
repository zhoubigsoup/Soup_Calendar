<?php
function defaultforum($id,$title,$content,$icon,$icontext,$author,$date,$thumb,$isthumbup){
	if($thumb!=-1){
		$thumbhtml=<<<EOT
			<form method="post" class="am-form" action="forum.php?fid=$id">
			<input type="hidden" name="isthumbup" value="1" />
			<button type="submit"class="am-btn am-btn-warning am-round am-btn-sm am-fr"><i class="am-icon-thumbs-o-up"></i> $thumb</button></form>
EOT;
	}
	if($isthumbup==1){
		$thumbhtml=<<<EOT
			
			
			<button type="submit"class="am-btn am-btn-warning am-round am-btn-sm am-fr"><i class="am-icon-thumbs-up"></i> $thumb</button>
EOT;
	}
	$returnHtml=<<<EOT
		<div class="am-card">
    <div class="thumbnail am-card-inside" >
		
      
      <div class="caption"> 
		  
		  <h2 class="am-card-title am-cf"><span class="am-fl" style="margin-top:5px"> $title<span style="color:#ADADAD;font-size: 12px;letter-spacing: 0.5px;margin-left: 5px;font-weight: normal"> 作者:  <a>$author</a></span></span>$thumbhtml</h3>  <hr style="margin-top:0px" >  
        <div class="am-text-p"style="min-height:200px" >$content</div>
        <p class="am-card-downbar"></p><div class="am-cf am-vertical-align"><div class=" am-fl"> <span class="am-badge am-badge-success am-round am-fl"style="margin-top:4px"><i class="am-icon-clock-o"></i> $date</span>
		  </div><span class="am-fr am-card-downbarauthor"><i class="$icon"></i>  $icontext</span></div><p></p>
      </div>
    </div>
  </div>
		
EOT;
	return($returnHtml);
}
function BackpanelManageForum($id,$title,$author,$date,$visible){
	if($visible=="true"){
		$functionButton=<<<EOT
			<button type="button" OnClick="window.open('forumManage.php?type=delete&fid=$id');" class="am-btn am-btn-danger am-round am-btn-xs"><i class="am-icon-trash"></i></button>
EOT;
	}elseif($visible=="false"){
		$functionButton=<<<EOT
			<button type="button" OnClick="window.open('forumManage.php?type=visible&fid=$id');" class="am-btn am-btn-danger am-round am-btn-xs"><i class="am-icon-eye"></i></button>
EOT;
	}
	$returnHTML=<<<EOT
		<tr>
                <td>
                  <a style="cursor:pointer" OnClick="window.open('forum.php?fid=$id');">$id</a>
                </td>
                <td>$title</td>
                <td>$date</td>
                <td>
                  $author</td>
                <td>
				  <button type="button" class="am-btn am-btn-success am-round am-btn-xs" OnClick="window.open('forumManage.php?type=edit&fid=$id');"><i class="am-icon-pencil"></i></button>
                  $functionButton
                 
                </td>
              </tr>
EOT;
	return($returnHTML);
	
}
?>