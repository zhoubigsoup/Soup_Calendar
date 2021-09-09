
<body >
  

  <style>
	  .am-form-label{
		  font-size: 12px;
		  color:#8D8D8D;
	  }
	</style>
	
	
  <div class="container" id="frame" style="margin-top:14px;"> 
   <script>

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
  
       <div class="caption"> 
       
               <form class="am-form am-form-horizontal" method="post" action="?r=edittask"> 
			<div class="am-form-group hidden"> 
			 
          <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">tid</label> 
          <div class="am-u-sm-10"> 
           <input type="text" id="doc-ipt-3" name="tid" value="<?php echo $forum['tid'];?>" > 
          </div> 
         </div> 
         <div class="am-form-group <?php echo $namewarning['class'];?>"> 
			 <?php echo $namewarning['text'];?>
			           <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">Name</label> 
          <div class="am-u-sm-10"> 
           <input type="text" id="doc-ipt-3" name="name" value="<?php echo $forum['name'];?>" placeholder="Please type the task name"> 
          </div> 
         </div> 

         <div class="am-form-group <?php echo $detailwarning['class'];?>">
			 <?php echo $detailwarning['text'];?>
			           <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">Detail</label> 
          <div class="am-u-sm-10"> 
           <div class="btn-toolbar" style="margin-bottom: 4px;margin-left: 2px" role="toolbar" aria-label=""> 
            <button id="funny" class="button button-circle button-tiny" style="margin-bottom:5px" onclick="insertAtCursor(document.getElementById('text'),'[funny]')" type="button"> <img src="/assets/tb/1.png"> </button> 
            <button id="mad" class="button button-circle button-tiny" style="margin-bottom:5px" onclick="insertAtCursor(document.getElementById('text'),'[angry]')" type="button"> <img src="/assets/tb/0.png"></button> 
            <button id="happy" class="button button-circle button-tiny" style="margin-bottom:5px" onclick="insertAtCursor(document.getElementById('text'),'[happy]')" type="button"> <img src="/assets/tb/2.png"> </button> 
            <button id="angry" class="button button-circle button-tiny" style="margin-bottom:5px" onclick="insertAtCursor(document.getElementById('text'),'[veryangry]')" type="button"> <img src="/assets/tb/3.png"> </button> 
            <button id="cry" class="button button-circle button-tiny" style="margin-bottom:5px" onclick="insertAtCursor(document.getElementById('text'),'[cry]')" type="button"> <img src="/assets/tb/4.png"> </button> 
            <button id="wantcry" class="button button-circle button-tiny" style="margin-bottom:5px" onclick="insertAtCursor(document.getElementById('text'),'[wantcry]')" type="button"> <img src="/assets/tb/5.png"> </button> 
            <button id="include" class="button button-circle button-tiny" style="margin-bottom:5px" onclick="insertAtCursor(document.getElementById('text'),'[quote]Please typein the quote[/quote]')" type="button"> <img src="/assets/tb/6.png"> </button> 
            <button id="center" class="button button-circle button-tiny" style="margin-bottom:5px" onclick="insertAtCursor(document.getElementById('text'),'[middle]please type in text[/middle]')" type="button"> <img src="/assets/tb/7.png"> </button> 
            <button id="image" class="button button-circle button-tiny" style="margin-bottom:5px" onclick="insertAtCursor(document.getElementById('text'),'[img]Please typein the image link[/img]')" type="button"> <img src="/assets/tb/8.png"> </button> 
            <button id="h1" class="button button-circle button-tiny" style="margin-bottom:5px" onclick="insertAtCursor(document.getElementById('text'),'[h1]Very big text[/h1]')" type="button"> <img src="/assets/tb/9.png"> </button> 
            <button id="h2" class="button button-circle button-tiny" style="margin-bottom:5px" onclick="insertAtCursor(document.getElementById('text'),'[h3]Big text[/h3]')" type="button"> <img src="/assets/tb/10.png"> </button> 
            <button id="h3" class="button button-circle button-tiny" style="margin-bottom:5px" onclick="insertAtCursor(document.getElementById('text'),'[h5]Small text[/h5]')" type="button"> <img src="/assets/tb/11.png"> </button> 
			<button id="br" class="button button-circle button-tiny" style="margin-bottom:5px" onclick="insertAtCursor(document.getElementById('text'),'[br\]')" type="button"> br</button> 
           </div> 
           <textarea class="" rows="10" id="text" name="detail"><?php echo $forum['detail'];?></textarea> 
          </div> 
         </div> 
			<div class="am-form-group <?php echo $namewarning['class'];?>"> 
				<?php echo $imagewarning['text'];?>
          <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">Image</label> 
          <div class="am-u-sm-10"> 
            <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2   am-avg-md-3 am-avg-lg-4 am-gallery-default am-no-layout" data-am-gallery="{ pureview: true }">
      	    <?php


$max=2000;//设置每页显示图片最大张数
$handle = opendir('./assets/images'); //当前目录
  while (false !== ($file = readdir($handle))) { //遍历该php文件所在目录
   list($filesname,$kzm)=explode(".",$file);//获取扩展名
    if($kzm=="png" or $kzm=="jpg" or $kzm=="gif" or $kzm=="jpeg") { //文件过滤
     if (!is_dir('./'.$file)) { //文件夹过滤
		 if($forum['image']=="assets/images/$file"){
			 $checked="checked";
		 }else{
			 $checked="";
		 }
       echo <<<EOT
	   <li>
			
        <div class="am-gallery-item">
            <p>
              <img src="./assets/images/$file"  alt="$i"/>
                <h3 class="am-gallery-title"> <label >
        <input type="radio"  value="assets/images/$file" name="image"$checked > Pick this
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
			<div class="am-form-group <?php echo $starttimewarning['class'];?>"> 
				<?php echo $starttimewarning['text'];?>
			           <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">Start time</label> 
          <div class="am-u-sm-10"> 
           <input value="<?php echo $forum['starttime'];?>" name="starttime" id="Server_endtime" type="date">
          </div> 
         </div> 
			
			<div class="am-form-group <?php echo $endtimewarning['class'];?>"> 
				<?php echo $endtimewarning['text'];?>
			           <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">Due time</label> 
          <div class="am-u-sm-10"> 
           <input value="<?php echo $forum['endtime'];?>" name="endtime" id="Server_endtime" type="date">
          </div> 
         </div> 
			 
         <div class="am-form-group"> 
          <div class="am-u-sm-10 am-u-sm-offset-2"> 
          			   <button class="am-btn am-btn-lightblue" type="submit">Submit</button>
          </div> 
         </div> 
        
        
       
        <p></p> 
       </div> 
      </div> 
     </div></form> 
	
		  </script>
</body>