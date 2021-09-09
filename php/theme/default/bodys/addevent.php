
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
       
               <form class="am-form am-form-horizontal" method="post" action="?r=addevent"> 
			<div class="am-form-group hidden"> 
			 
          <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">tid</label> 
          <div class="am-u-sm-10"> 
           <input type="text" id="doc-ipt-3" name="id" value="" > 
          </div> 
         </div> 
         <div class="am-form-group <?php echo $namewarning['class'];?>"> 
			 <?php echo $namewarning['text'];?>
			           <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">Name</label> 
          <div class="am-u-sm-10"> 
           <input type="text" id="doc-ipt-3" name="name" value="<?php echo $name;?>" placeholder="Please type the task name"> 
          </div> 
         </div> 

			<div class="am-form-group<?php echo $eventtimewarning['class'];?>"id="eventdate"> 
				<?php echo $eventtimewarning['text'];?>
			           <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">Event date</label> 
          <div class="am-u-sm-10"> 
           <input value="<?php if($event!= null){echo $event;}else{echo date("Y-m-d");}?>" name="eventdate" id="date" type="date">
          </div> 
         </div> 
			<div class="am-form-group <?php echo $starttimewarning['class'];?>"> 
				<?php echo $starttimewarning['text'];?>
			           <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">Start time</label> 
          <div class="am-u-sm-10"> 
           <input value="09:00" name="starttime" id="Server_endtime" type="time">
          </div> 
         </div> 
			
			<div class="am-form-group <?php echo $endtimewarning['class'];?>"> 
				<?php echo $endtimewarning['text'];?>
			           <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">end time</label> 
          <div class="am-u-sm-10"> 
           <input value="10:00" name="endtime" id="Server_endtime" type="time">
          </div> 
         </div> 
		<div class="am-form-group "> 
			 
          <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">Color</label> 
          <div class="am-u-sm-10"> 

			  		 <label class="am-radio-inline">
        <input type="radio" value="blue" name="color"> Blue
      </label>		 <label class="am-radio-inline">
        <input type="radio" value="red" name="color"> Red
      </label>		 <label class="am-radio-inline">
        <input type="radio" value="orange" name="color"> Orange
      </label>		 <label class="am-radio-inline">
        <input type="radio" value="yellow" name="color"> Yellow
      </label>		 <label class="am-radio-inline">
        <input type="radio" value="green" name="color"> Green
      </label>           
      
	  

          </div> 
         </div>  
				 
				   <div class="am-form-group "> 
			 
          <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">Repeat</label> 
          <div class="am-u-sm-10 repeat2"> 

        <input type="checkbox"id="repeatbox"value="true" name="isrepeat" hidden>

			  <button type="button" onclick='
		$("#repeatdiv").attr("disabled",false); 
		$("#repeatbox").attr("checked",true); 
        $("#repeatdiv").show("slow");  
		$(".repeats").show("slow");  
		$("#eventdate").hide("slow"); 
		$(".repeat2").hide("slow");
											 
       ' class="am-btn am-btn-blue am-btn-xs">Enable</button>
          </div> 
 <div class="am-u-sm-10 repeats" hidden> 
	 <button type="button" onclick=' 
		$("#repeatdiv").attr("disabled",true); 
		$("#repeatbox").attr("checked",false); 
        $("#repeatdiv").hide("slow");  
		$(".repeats").hide("slow");  
		$("#eventdate").show("slow"); 
		$(".repeat2").show("slow"); 
       ' class="am-btn am-btn-danger am-btn-xs">Disable</button>
          </div> 
          <div class="am-u-sm-10 "id="repeatdiv" hidden> 
           	 <label class="am-checkbox-inline">
        		<input type="checkbox" value="mon" name="repeat-week[]"> Mon
             </label>
			  <label class="am-radio-inline">
        		<input type="checkbox" value="tue" name="repeat-week[]"> Tue
             </label>	
			  <label class="am-radio-inline">
        		<input type="checkbox" value="wed" name="repeat-week[]"> Wed
             </label>	
			  <label class="am-radio-inline">
        		<input type="checkbox" value="thu" name="repeat-week[]"> Thu
             </label>	
			  <label class="am-radio-inline">
        		<input type="checkbox" value="fri" name="repeat-week[]"> Fri
             </label>	
			  <label class="am-radio-inline">
        		<input type="checkbox" value="sat" name="repeat-week[]"> Sat
             </label>	
			  <label class="am-radio-inline">
        		<input type="checkbox" value="sun" name="repeat-week[]"> Sun
             </label>	
      
	  

          </div> 
         </div>  
		 <div class="am-form-group repeats" hidden>
      <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">Repeat-Start</label>
					<div class="am-u-sm-10"> 
      <input  value="<?php if($repeatstart!= null){echo $repeatstart;}else{echo date("Y-m-d");}?>"name="repeatstart" id="Server_endtime" type="date">
					</div>
    </div>
		 <div class="am-form-group repeats" hidden>
      <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">Repeat-End</label>
					<div class="am-u-sm-10"> 
      <input  value="<?php if($repeatend!= null){echo $repeatend;}else{echo date('Y-m-d',strtotime( " +1 day",strtotime(date("Y-m-d"))));}?>"name="repeatend" id="Server_endtime" type="date">
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