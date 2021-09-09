<div style="max-width: 750px;">
<div class="row" style="width:100%;height:100%" >
			<div class="col-md-4"style="height:100%;">

				</div>
			<div class="col-md-8">
      <div class="am-g" >
        <div class=" am-u-md-7 am-u-sm-centered">
          <h1 style="height:60px" class=" hidden-xs "></h1>
    <p style="font-size:24px;margin-top:30px">Login</p>
    <hr>
    <form method="post" class="am-form" action="?r=login">
      
       
<div class="am-form-group <?php echo $ArrayData[0][0];?>">
 <?php echo $ArrayData[1][0];?>
<input type="text" class="am-form-field " name="username" placeholder="Username" id="email" value="<?php echo $username;?>">
  </div>
		<div class="am-form-group  
					<?php 
					
					echo $ArrayData[0][1];
					?>">
 <?php echo $ArrayData[1][1];?>
	 <input type="password" class="am-form-field " name="password" placeholder="Password" id="password" value="">
	 <input type="hidden" name="issubmited" value="y" />
  </div>
    
      
     
      
        <input type="submit" name="" value="Login" style="width: 100%" class="am-btn am-btn-blue am-btn-sm  am-radius">
		   
		  
      
    </form>

    <p calss="smallp"style="color: #BCBCBC;font-size: 12px;letter-spacing: 0.4px;margin-top: 3px">If you don't have an account<a style="color: #409eff;" href="signup.php"> Sign up</a></p>
  </div>
</div> 
		</div>
</div>
		<div style="height:500px"class="hidden-lg"></div>
		</section>

  
  
 </div>	
 
</body>
</html>