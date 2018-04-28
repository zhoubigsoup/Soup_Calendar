  <div class="container" id="frame"style="margin-top:14px;">
      
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
  <div class="am-card">
    <div class="thumbnail am-card-inside">
		
      
      <div class="caption"> 
		  
		  <h2 class="am-card-title "><span cstyle="margin-top:5px"> <?php echo $_SESSION['username'];?></span></h3>  <hr style="margin-top:0px" >  
        <form class="am-form am-form-horizontal" method="post" action="sendForum.php"> 
         <div class="am-form-group "> 
			 
          <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">账号</label> 
          <div class="am-u-sm-10"> 
           <input type="text" id="doc-ipt-3" name="title" value=" <?php echo $_SESSION['username'];?>" disabled/> 
          </div> 
         </div> 
			<div class="am-form-group "> 
			 
          <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">注册日期</label> 
          <div class="am-u-sm-10"> 
           <input type="text" id="doc-ipt-3" name="title" value=" <?php echo $_SESSION['date'];?>" disabled/> 
          </div> 
         </div> 
			<div class="am-form-group "> 
			 
          <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">邮箱</label> 
          <div class="am-u-sm-10"> 
           <input type="text" id="doc-ipt-3" name="title" value=" <?php echo $_SESSION['email'];?>" disabled/> 
          </div> 
         </div> 
			<div class="am-form-group hidden"> 
			 
          <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">修改密码</label> 
          <div class="am-u-sm-10"> 
           <input type="password" id="doc-ipt-3" name="title" value="2017-12-31" /> 
          </div> 
         </div> 
			<div class="am-form-group "> 
			 
          <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">经验值</label> 
          <div class="am-u-sm-10"> 
            <div class="am-progress am-progress-striped am-progress-lg am-active " style="margin-top: 1.3rem">
                      <div class="am-progress-bar am-progress-bar-secondary" style="width:  <?php echo $_SESSION['xp'];?>%">经验： <?php echo $_SESSION['xp'];?>/100</div></div>
          </div> 
         </div> 
			 <div class="am-form-group hidden"> 
          <div class="am-u-sm-10 am-u-sm-offset-2"> 
           <button type="submit" class="am-btn am-btn-default am-btn-success">提交</button> 
          </div> 
         </div> 
		  </form>
        
      </div>
    </div>
  </div>

					 		 
</div></div>
    </div>