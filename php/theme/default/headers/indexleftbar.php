
<div class="am-topbar-fixed-top hidden-xs" style="height:100%;margin-top: 60px;background-color:#444;width:224px">
      <ul class="list-group " style="height:100%">
        <li class="am-collapse" style="color: white">ToolBar</li>
		  <li>
          <a type="button" class="am-btn am-btn-darkbut <?php echo $LeftbarAct[0];?>" href="index.php">
			  <i class="am-icon-star"></i>
            <span class="am-btnspan">推荐</span>
                
          </a>
        </li>
<?php
		  
$result = queryMySQL("SELECT *FROM part order by pid ");
$rows=$result->num_rows;

for($j = 0,$style=1;$j < $rows; ++$j)
{
	$result->data_seek($j);
	$row=$result->fetch_array(MYSQLI_ASSOC);
	$pid=$row['pid'];
	$name=$row['name'];
	$icon=$row['icon'];
	$active=$LeftbarAct[$pid];
	$leftBarList=<<<EOT
		 <li>
         <a type="button" href="index-1.php?page=$pid"class="am-btn am-btn-darkbut $active">
			  <i class="$icon"></i>
            <span class="am-btnspan">$name</span>
            
          </a>
        </li>
EOT;
	echo $leftBarList;
}
		  if ($_SESSION['type']=='admin') echo <<<EOT
		  <li>
          <a type="button" href="sendForum.php"class="am-btn am-btn-darkbut ">
			  <i class="am-icon-pencil"></i>
            <span class="am-btnspan">新帖子</span>
            
          </a>
        </li>
		  
EOT;
?>
		  
       
		  
      </ul>
    </div>