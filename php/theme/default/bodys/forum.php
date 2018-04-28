   <div class="container" id="frame"style="margin-top:14px;margin-bottom: 80px">
      
		 <script>
			 $(function(){
     //获取浏览器宽度
				 
     var _width = $(window).width(); 
     if(_width < 750){
            //直接为该div添加w1024样式,会覆盖前一个样式
            $("#content").css('margin-left','0px');
		 
		 
            
     }
});

$(window).resize(function() {  
 
 var _width = $(window).width(); 
     if(_width < 750){
            
            $("#content").css('margin-left','0px');
		    
            
     }
	if(_width > 750){
            
            $("#content").css('margin-left','180px');
		    
            
     }
  
});  
		  </script>
		  
        <div id="content" style="margin-left: 180px;"><div class="row" >
  
<?php echo $forum;?>
					 		 
</div></div>
    </div>
  </body>

</html>