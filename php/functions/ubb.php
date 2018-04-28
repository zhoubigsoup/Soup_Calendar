<?php
  function ubb1($Text) { 
$Text=trim($Text); 
 
$Text=preg_replace("/\\t/is"," ",$Text); 
$Text=preg_replace("/\[hr\]/is","",$Text); 
$Text=preg_replace("/\[separator\]/is","",$Text); 
 
//$Text=preg_replace("/\[url=([^\[]*)\](.+?)\[\/url\]/is","<a href=\\1 target='_blank'>\\2</a>",$Text); 
$Text=preg_replace("/\[url\](.+?)\[\/url\]/is","<a href=\"\\1\" target='_blank'>\\1</a>",$Text); 
$Text=preg_replace("/\[url=(http:\/\/.+?)\](.+?)\[\/url\]/is","<a href='\\1' target='_blank'>\\2</a>",$Text); 
$Text=preg_replace("/\[url=(.+?)\](.+?)\[\/url\]/is","<a href=\\1>\\2</a>",$Text); 

$Text=preg_replace("/\[funny]/is","<img src='./assets/tb/1.png'>",$Text); 
$Text=preg_replace("/\[happy]/is","<img src='./assets/tb/2.png'>",$Text); 
$Text=preg_replace("/\[angry]/is","<img src='./assets/tb/0.png'>",$Text); 
$Text=preg_replace("/\[veryangry]/is","<img src='./assets/tb/3.png'>",$Text); 
$Text=preg_replace("/\[cry]/is","<img src='./assets/tb/4.png'>",$Text); 
$Text=preg_replace("/\[wantcry]/is","<img src='./assets/tb/5.png'>",$Text); 
$Text=preg_replace("/\[img\s(.+?)\](.+?)\[\/img\]/is","<img \\1 src=\\2>",$Text); 
$Text=preg_replace("/\[按钮=(.+?)\](.+?)\[\/按钮\]/is","<button style='am-button am-button-primary'onclick='window.open(\"\\1\");'>\\2</button>",$Text); 
$Text=preg_replace("/\[button\](.+?)\[\/button\]/is","<font color=\"\\1\">\\2</font>",$Text);
$Text=preg_replace("/\[颜色=(.+?)\](.+?)\[\/颜色\]/is","<font color=\\1>\\2</font>",$Text); 
$Text=preg_replace("/\[color=(.+?)\](.+?)\[\/color\]/is","<font color=\"\\1\">\\2</font>",$Text);
$Text=preg_replace("/\[style=(.+?)\](.+?)\[\/style\]/is","<div class='\\1'>\\2</div>",$Text); 
$Text=preg_replace("/\[大小=(.+?)\](.+?)\[\/size\]/is","\\2",$Text); 
$Text=preg_replace("/\[sup\](.+?)\[\/sup\]/is","\\1",$Text); 
$Text=preg_replace("/\[sub\](.+?)\[\/sub\]/is","\\1",$Text); 
$Text=preg_replace("/\[pre\](.+?)\[\/pre\]/is","\\1",$Text); 
$Text=preg_replace("/\[email\](.+?)\[\/email\]/is","<a href='mailto:\\1'>\\1</a>",$Text); 
$Text=preg_replace("/\[i\](.+?)\[\/i\]/is","<i>\\1</i>",$Text); 
$Text=preg_replace("/\[u\](.+?)\[\/u\]/is","<u>\\1</u>",$Text); 
$Text=preg_replace("/\[b\](.+?)\[\/b\]/is","<b>\\1</b>",$Text); 
$Text=preg_replace("/\[br\]/is","",$Text); 
$Text=preg_replace("/\[quote\](.+?)\[\/quote\]/is","\\1", $Text); 

$Text=preg_replace("/\[sig\](.+?)\[\/sig\]/is","\\1", $Text); 
return $Text; 
} 
function ubb($Text) { 
$Text=trim($Text); 
$imgTB1=<<<EOT
<ul data-am-widget="gallery" class="am-gallery am-avg-sm-2   am-avg-md-3 am-avg-lg-4 am-gallery-default am-no-layout" >
      	   <li>
			
        <div class="am-gallery-item">
            <p>
	 
EOT;

$Text=preg_replace("/\\t/is"," ",$Text); 
$Text=preg_replace("/\[hr\]/is","<hr>",$Text); 
$Text=preg_replace("/\[separator\]/is","<br/>",$Text); 
$Text=preg_replace("/\[h1\](.+?)\[\/h1\]/is","<h1>\\1</h1>",$Text); 
$Text=preg_replace("/\[h2\](.+?)\[\/h2\]/is","<h2>\\1</h2>",$Text); 
$Text=preg_replace("/\[h3\](.+?)\[\/h3\]/is","<h3>\\1</h3>",$Text); 
$Text=preg_replace("/\[h4\](.+?)\[\/h4\]/is","<h4>\\1</h4>",$Text); 
$Text=preg_replace("/\[h5\](.+?)\[\/h5\]/is","<h5>\\1</h5>",$Text); 
$Text=preg_replace("/\[h6\](.+?)\[\/h6\]/is","<h6>\\1</h6>",$Text); 
$Text=preg_replace("/\[middle\](.+?)\[\/middle\]/is","<center>\\1</center>",$Text); 
//$Text=preg_replace("/\[url=([^\[]*)\](.+?)\[\/url\]/is","<a href=\\1 target='_blank'>\\2</a>",$Text); 
$Text=preg_replace("/\[url\](.+?)\[\/url\]/is","<a href=\"\\1\" target='_blank'>\\1</a>",$Text); 
$Text=preg_replace("/\[url=(http:\/\/.+?)\](.+?)\[\/url\]/is","<a href='\\1' target='_blank'>\\2</a>",$Text); 
$Text=preg_replace("/\[url=(.+?)\](.+?)\[\/url\]/is","<a href=\\1>\\2</a>",$Text); 
$Text=preg_replace("/\[img\](.+?)\[\/img\]/is","$imgTB1<img src=\\1 data-am-pureviewed='1' alt='1'OnClick=\"window.open('\\1')\" style=\"cursor:pointer\"></p></div></li></ul>",$Text); 
$Text=preg_replace("/\[funny]/is","<img src='./assets/tb/1.png'>",$Text); 
$Text=preg_replace("/\[happy]/is","<img src='./assets/tb/2.png'>",$Text); 
$Text=preg_replace("/\[veryangry]/is","<img src='./assets/tb/3.png'>",$Text); 
$Text=preg_replace("/\[angry]/is","<img src='./assets/tb/0.png'>",$Text); 
$Text=preg_replace("/\[cry]/is","<img src='./assets/tb/4.png'>",$Text); 
$Text=preg_replace("/\[wantcry]/is","<img src='./assets/tb/5.png'>",$Text); ; 
$Text=preg_replace("/\[color=(.+?)\](.+?)\[\/color\]/is","<font color=\\1>\\2</font>",$Text); 
$Text=preg_replace("/\[style=(.+?)\](.+?)\[\/style\]/is","<div class='\\1'>\\2</div>",$Text); 
$Text=preg_replace("/\[size=(.+?)\](.+?)\[\/size\]/is","<font size=\\1>\\2</font>",$Text); 
$Text=preg_replace("/\[sup\](.+?)\[\/sup\]/is","<sup>\\1</sup>",$Text); 
$Text=preg_replace("/\[sub\](.+?)\[\/sub\]/is","<sub>\\1</sub>",$Text); 
$Text=preg_replace("/\[pre\](.+?)\[\/pre\]/is","<pre>\\1</pre>",$Text); 
$Text=preg_replace("/\[email\](.+?)\[\/email\]/is","<a href='mailto:\\1'>\\1</a>",$Text); 
$Text=preg_replace("/\[i\](.+?)\[\/i\]/is","<i>\\1</i>",$Text); 
$Text=preg_replace("/\[u\](.+?)\[\/u\]/is","<u>\\1</u>",$Text); 
$Text=preg_replace("/\[b\](.+?)\[\/b\]/is","<b>\\1</b>",$Text); 
$Text=preg_replace("/\[br\]/is","</br>",$Text); 
$Text=preg_replace("/\[quote\](.+?)\[\/quote\]/is","<blockquote><div style='color:#393939;padding:5px' >\\1</div></blockquote>", $Text); 

$Text=preg_replace("/\[sig\](.+?)\[\/sig\]/is","<div style='text-align: left; color: darkgreen; margin-left: 5%'><br><br>--------------------------<br>\\1<br>--------------------------</div>", $Text); 
return $Text; 
} 
?>