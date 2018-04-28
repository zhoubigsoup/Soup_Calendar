<?php
 function cleanJsCss($html){  
    $html=trim($html);  
    $html=preg_replace('/\0+/', '', $html);  
$html=preg_replace('/(\\\\0)+/', '', $html);  
$html=preg_replace('#(&\#*\w+)[\x00-\x20]+;#u',"\\1;",$html);  
$html=preg_replace('#(&\#x*)([0-9A-F]+);*#iu',"\\1\\2;",$html);  
$html=preg_replace("/%u0([a-z0-9]{3})/i", "&#x\\1;", $html);  
$html=preg_replace("/%([a-z0-9]{2})/i", "&#x\\1;", $html);  
    $html=str_replace(array('<?','?>'),array('<?','?>'),$html);  
   $html=preg_replace('#\t+#',' ',$html);  
$scripts=array('javascript','vbscript','script','applet','alert','document','write','cookie','window');  
foreach($scripts as $script){  
    $temp_str="";  
    for($i=0;$i<strlen($script);$i++){  
        $temp_str.=substr($script,$i,1)."\s*";  
    }  
    $temp_str=substr($temp_str,0,-3);  
    $html=preg_replace('#'.$temp_str.'#s',$script,$html);  
    $html=preg_replace('#'.ucfirst($temp_str).'#s',ucfirst($script),$html);  
}  
$html=preg_replace("#<a.+?href=.*?(alert\(|alert&\#40;|javascript\:|window\.|document\.|\.cookie|<script|<xss).*?\>.*?</a>#si", "", $html);  
$html=preg_replace("#<img.+?src=.*?(alert\(|alert&\#40;|javascript\:|window\.|document\.|\.cookie|<script|<xss).*?\>#si", "", $html);  
$html=preg_replace("#<(script|xss).*?\>#si", "<\\1>", $html);  
$html=preg_replace('#(<[^>]*?)(onblur|onchange|onclick|onfocus|onload|onmouseover|onmouseup|onmousedown|onselect|onsubmit|onunload|onkeypress|onkeydown|onkeyup|onresize)[^>]*>#is',"\\1>",$html);  
//$html=preg_replace('#<(/*\s*)(alert|applet|basefont|base|behavior|bgsound|blink|body|embed|expression|form|frameset|frame|head|html|ilayer|iframe|input|layer|link|meta|object|plaintext|style|script|textarea|title|xml|xss)([^>]*)>#is', "<\\1\\2\\3>", $html);  
$html=preg_replace('#<(/*\s*)(alert|applet|basefont|base|behavior|bgsound|blink|body|expression|form|frameset|frame|head|html|ilayer|iframe|input|layer|link|meta|object|plaintext|style|script|textarea|title|xml|xss)([^>]*)>#is', "<\\1\\2\\3>", $html);  
$html=preg_replace('#(alert|cmd|passthru|eval|exec|system|fopen|fsockopen|file|file_get_contents|readfile|unlink)(\s*)(.∗?)#si', "\\1\\2(\\3)", $html);  
$bad=array(  
'document.cookie'   => '',  
'document.write'    => '',  
'window.location'   => '',  
"javascript\s*:"    => '',  
"Redirect\s+302"    => '',  
'<!--'               => '<!--',  
'-->'                => '-->'  
);  
foreach ($bad as $key=>$val){  
    $html=preg_replace("#".$key."#i",$val,$html);  
}  
   return   $html;  
 }  
?>