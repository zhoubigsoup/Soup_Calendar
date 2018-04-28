<?php
function BackpanelManageUser($id,$name,$email,$phonenumber,$date,$type,$status){
	if($status==0) $status='未激活';
	if($status==1) $status='已激活';
	if($status==2) $status='被封禁';
	
	if($status=="未激活"){
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
                  <a style="cursor:pointer" OnClick="layer.open({
    type: 2,
    title: '修改:$name',
    maxmin: true,
    area: ['290px', '250px'],
    content: ['UserManage.php?type=edit&uid=$id','no'],
    
  });">$id</a>
                </td>
                <td>$name</td>
                <td>$email</td>
                <td>
                  $phonenumber</td>
                <td>
				  $date
                 
                </td>
		       <td>$type</td>
		       <td>$status</td>
              </tr>
EOT;
	return($returnHTML);
	
}
?>