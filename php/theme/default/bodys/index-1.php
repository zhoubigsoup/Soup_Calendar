      
<div class=" visible-xs" style="height:200px;background-color:#444;width:100%;margin-top:8px">
      <ul class="list-group " >
        <li class="am-collapse" style="color: white">ToolBar</li>
		  <li>
          <a type="button" class="am-btn am-btn-darkbut" href="index.php"<?php echo $LeftbarAct[0];?>>
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
<div class=""id="frame" style="padding-left:0px;padding-right: 8px;margin-top: 20px">

		 <script>
			 $(function(){
     //获取浏览器宽度
				 
     var _width = $(window).width(); 
     if(_width < 750){
            //直接为该div添加w1024样式,会覆盖前一个样式
            $("#content").css('margin-left','0px');
		    $("#content").css('margin-top','120px');
		    $("#frame").addClass("container");
		    $("#frame").css('margin-top','0px');
		    
            
     }
});

$(window).resize(function() {  
 
 var _width = $(window).width(); 
     if(_width < 750){
            
            $("#content").css('margin-left','0px');
		    $("#content").css('margin-right','0px');
		    $("#content").css('margin-top','120px');
		    $("#frame").addClass("container");
	  	    $("#frame").css('margin-top','0px');
            
     }
	if(_width > 750){
            
            $("#content").css('margin-left','240px');
		    $("#content").css('margin-top','0px');
		    $("#frame").removeClass("container");
		    $("#frame").css('margin-top','20px');
            
     }
  
});  
		  </script>
		  
        <div id="content"style="margin-left:240px"><div class="row" style="width:100%;margin-left: 4px">
  <?php echo $cards;?>
					 		 
</div></div>
    </div>