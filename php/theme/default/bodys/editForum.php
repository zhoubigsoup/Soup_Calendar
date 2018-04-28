  <div class="container" id="frame" style="margin-top:14px;"> 
   <script>
			 $(function(){
     //获取浏览器宽度
				 
     var _width = $(window).width(); 
     if(_width < 770){
            //直接为该div添加w1024样式,会覆盖前一个样式
            $("#content").css('margin-left','0px');
		 
		 
            
     }
});

$(window).resize(function() {  
 
 var _width = $(window).width(); 
     if(_width < 770){
            
            $("#content").css('margin-left','0px');
		    
            
     }
	if(_width > 770){
            
            $("#content").css('margin-left','180px');
		    
            
     }
  
});  
			
function insertAtCursor(myField, myValue) {
//IE support
if (document.selection) {
myField.focus();
sel = document.selection.createRange();
sel.text = myValue;
sel.select();
}
//MOZILLA/NETSCAPE support 
else if (myField.selectionStart || myField.selectionStart == '0') {
var startPos = myField.selectionStart;
var endPos = myField.selectionEnd;
// save scrollTop before insert www.keleyi.com
var restoreTop = myField.scrollTop;
myField.value = myField.value.substring(0, startPos) + myValue + myField.value.substring(endPos, myField.value.length);
if (restoreTop > 0) {
myField.scrollTop = restoreTop;
}
myField.focus();
myField.selectionStart = startPos + myValue.length;
myField.selectionEnd = startPos + myValue.length;
} else {
myField.value += myValue;
myField.focus();
}
} 
</script> 
   <div id="content" style="margin-left: 180px;">
    <div class="row"> 
     <div class="am-card"> 
      <div class="thumbnail am-card-inside"> 
       <div class="caption"> 
        <p class="am-card-title am-cf"><span class="am-fl" style="margin-top:5px"> 发表文章<span style="color:#ADADAD;font-size: 12px;letter-spacing: 0.5px;margin-left: 5px;font-weight: normal"> </span></span></p> 
        <hr style="margin-top:0px" /> 
        <form class="am-form am-form-horizontal" method="post" action="ForumManage.php"> 
			<div class="am-form-group hidden"> 
			 
          <label for="doc-ipt-3" class="am-u-sm-2 am-form-label" >文章ID</label> 
          <div class="am-u-sm-10"> 
           <input type="text" id="doc-ipt-3" name="id" value="<?php echo $forum['fid']; ?>" placeholder="输入你的文章标题"/> 
          </div> 
         </div> 
         <div class="am-form-group <?php echo $ArrayData[0][0];?>"> 
			 <?php echo $ArrayData[1][0];?>
          <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">标题</label> 
          <div class="am-u-sm-10"> 
           <input type="text" id="doc-ipt-3" name="title" value="<?php echo $forum['title']; ?>" placeholder="输入你的文章标题" /> 
          </div> 
         </div> 
			<div class="am-form-group <?php echo $ArrayData[0][4];?>"> 
			 <?php echo $ArrayData[1][4];?>
          <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">简介</label> 
          <div class="am-u-sm-10"> 
           <input type="text" id="doc-ipt-3" name="describtion" value="<?php echo  $forum['describe'];?>" placeholder="输入你的文章简介" /> 
          </div> 
         </div> 
         <div class="am-form-group <?php echo $ArrayData[0][1];?>">
			 <?php echo $ArrayData[1][1];?>
          <label for="doc-ipt-3" class="am-u-sm-2 am-form-label"  >内容</label> 
          <div class="am-u-sm-10"> 
           <div class="btn-toolbar" style="margin-bottom: 2px" role="toolbar" aria-label=""> 
            <button id="funny" class="button button-circle button-tiny" style="margin-bottom:5px"onclick="insertAtCursor(document.getElementById('text'),'[滑稽]')" type="button"> <img src="/assets/tb/1.png" /> </button> 
            <button id="mad" class="button button-circle button-tiny" style="margin-bottom:5px"onclick="insertAtCursor(document.getElementById('text'),'[阴险]')" type="button"> <img src="/assets/tb/0.png" /></button> 
            <button id="happy" class="button button-circle button-tiny" style="margin-bottom:5px"onclick="insertAtCursor(document.getElementById('text'),'[高兴]')" type="button"> <img src="/assets/tb/2.png" /> </button> 
            <button id="angry" class="button button-circle button-tiny" style="margin-bottom:5px"onclick="insertAtCursor(document.getElementById('text'),'[生气]')" type="button"> <img src="/assets/tb/3.png" /> </button> 
            <button id="cry" class="button button-circle button-tiny" style="margin-bottom:5px"onclick="insertAtCursor(document.getElementById('text'),'[哭]')" type="button"> <img src="/assets/tb/4.png" /> </button> 
            <button id="wantcry" class="button button-circle button-tiny" style="margin-bottom:5px"onclick="insertAtCursor(document.getElementById('text'),'[想哭]')" type="button"> <img src="/assets/tb/5.png" /> </button> 
            <button id="include" class="button button-circle button-tiny" style="margin-bottom:5px"onclick="insertAtCursor(document.getElementById('text'),'[引用]这里填要引用的内容[/引用]')" type="button"> <img src="/assets/tb/6.png" /> </button> 
            <button id="center" class="button button-circle button-tiny" style="margin-bottom:5px"onclick="insertAtCursor(document.getElementById('text'),'[居中]这里填要居中的内容[/居中]')" type="button"> <img src="/assets/tb/7.png" /> </button> 
            <button id="image" class="button button-circle button-tiny" style="margin-bottom:5px"onclick="insertAtCursor(document.getElementById('text'),'[图片]这里填图片链接[/图片]')" type="button"> <img src="/assets/tb/8.png" /> </button> 
            <button id="h1" class="button button-circle button-tiny" style="margin-bottom:5px"onclick="insertAtCursor(document.getElementById('text'),'[h1]这里填的内容会很大[/h1]')" type="button"> <img  src="/assets/tb/9.png" /> </button> 
            <button id="h2" class="button button-circle button-tiny" style="margin-bottom:5px"onclick="insertAtCursor(document.getElementById('text'),'[h3]这里填的内容会有点大[/h3]')" type="button"> <img src="/assets/tb/10.png" /> </button> 
            <button id="h3" class="button button-circle button-tiny" style="margin-bottom:5px"onclick="insertAtCursor(document.getElementById('text'),'[h5]这里填的内容会很小[/h5]')" type="button"> <img src="/assets/tb/11.png" /> </button> 
			<button id="br" class="button button-circle button-tiny" style="margin-bottom:5px"onclick="insertAtCursor(document.getElementById('text'),'[br\]')" type="button"> br</button> 
           </div> 
           <textarea class="" rows="10" id="text" name="text" ><?php echo  $forum['text'];?></textarea> 
          </div> 
         </div> 
			<div class="am-form-group <?php echo $ArrayData[0][2];?>"> 
          <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">背景</label> 
          <div class="am-u-sm-10"> 
            <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2
  am-avg-md-3 am-avg-lg-4 am-gallery-default" data-am-gallery="{ pureview: true }" >
      <?php


$max=2000;//设置每页显示图片最大张数
$handle = opendir('./assets/images'); //当前目录
  while (false !== ($file = readdir($handle))) { //遍历该php文件所在目录
   list($filesname,$kzm)=explode(".",$file);//获取扩展名
    if($kzm=="png" or $kzm=="jpg" or $kzm=="gif" or $kzm=="jpeg") { //文件过滤
     if (!is_dir('./'.$file)) { //文件夹过滤
       echo <<<EOT
	   <li>
			
        <div class="am-gallery-item">
            <p>
              <img src="./assets/images/$file"  alt="$i"/>
                <h3 class="am-gallery-title"> <label >
        <input type="radio"  value="assets/images/$file" name="image" > 选择图片
      </label></h3>
                
            </p>
        </div>
      </li>
EOT;
      $i++;//记录图片总张数
     }
    }
  }


 
?>
        
		
  </ul>
          </div> 
         </div> 
			<div class="am-form-group <?php echo $ArrayData[0][3];?>"> 
          <div class="am-u-sm-offset-2 am-u-sm-10"> 
			  <?php
		  
$result = queryMySQL("SELECT *FROM part order by pid ");
$rows=$result->num_rows;
$i=0;
for($j = 0,$style=1;$j < $rows; ++$j)
{
	$i++;
	$result->data_seek($j);
	$row=$result->fetch_array(MYSQLI_ASSOC);
	$name=$row['name'];
	$active=$LeftbarAct[$pid];
	$leftBarList=<<<EOT
		 <label class="am-radio-inline">
        <input type="radio"  value="$i" name="part" > $name
      </label>
EOT;
	echo $leftBarList;
}
?>
           
      
	  
         </div> 
         <div class="am-form-group"> 
          <div class="am-u-sm-offset-2 am-u-sm-10"> 
           <label class="am-checkbox-inline">
			   
				 
			  <input type="checkbox" type="post" name="isthumb" checked/> 开启点赞 
	  </label> 
			 </div</div>
         <div class="am-form-group"> 
          <div class="am-u-sm-10 am-u-sm-offset-2"> 
           <button type="submit" class="am-btn am-btn-default">提交</button> 
          </div> 
         </div> 
        </form>
       
        <p></p> 
       </div> 
      </div> 
     </div> 
    </div>
   </div> 
  </div>  