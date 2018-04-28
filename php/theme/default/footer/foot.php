		 <script>
			 $(function(){
     //获取浏览器宽度
				 
     var _width = $(window).width(); 
     if(_width < 770){
            
            $("#footer").css('padding-left','0px');
		 
		 
            
     }
});

$(window).resize(function() {  
 
 var _width = $(window).width(); 
     if(_width < 770){
            
            $("#footer").css('padding-left','0px');
		    
            
     }
	if(_width > 770){
            
            $("#footer").css('padding-left','180px');
		    
            
     }
  
});  
		  </script>
<footer class="amz-footer footer  " id="footer"style="margin-top: 400px; bottom: 0;padding-left: 180px;width:100%">
   <div class="am-g am-g-fixed">
    <div class="col-md-4 col-md-push-8 am-u-md-4 am-u-md-push-8">

    </div>
    <div class="col-md-8 col-md-pull-4 am-u-md-8 am-u-md-pull-4">
     <h2 class="amz-fd"><img src="theme/default/Amaze UI_files/logo.png" style="width:180px;height:30px;margin-left: 00px"/></h2>
     
     <p class="amz-cp"style="margin-left:30px">copyright &copy;  2013-2018 SouperStudio. All rights reserved . Developed with <a href="http://www.jetbrains.com/webstorm/" target="_blank">ZhouBigsoup</a>.</p>
     
    </div>
   </div>
</footer>