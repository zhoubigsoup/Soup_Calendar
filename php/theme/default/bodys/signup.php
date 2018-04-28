    <section class="am-contai center-block  ">
		<div class="row" style="width:90%;height:100%" >
			<div class="col-md-3"style="height:100%;">
      <img src="theme/default/Amaze UI_files/flatline.png" class="visible-lg" />
				</div>
			<div class="col-md-8">
      <div class="am-g" >
        <div class=" am-u-md-7 am-u-sm-centered">
          <h1 style="height:60px" class=" hidden-xs "></h1>
          <p style="font-size:24px;margin-top:30px">注册账号</p>
          <hr>
          <form method="post" class="am-form" action="signup.php">
            <div class="am-form-group <?php echo $ArrayData[0][0];?> ">
				<?php echo $ArrayData[1][0];?>
              <input type="text" class="am-form-field " name="username" placeholder="昵称" id="username" value="<?php echo $username;?>"></div>
			  <div class="am-form-group <?php echo $ArrayData[0][1];?>">
				  <?php echo $ArrayData[1][1];?>
              <input type="email" class="am-form-field " name="email" placeholder="邮箱" id="email" value="<?php echo $email;?>"></div>
			  <div class="am-form-group <?php echo $ArrayData[0][2];?>">
				  <?php echo $ArrayData[1][2];?>
              <input type="text" class="am-form-field " name="phonenumber" placeholder="手机号码" id="phonenumber" value="<?php echo $phonenumber;?>"></div>
            <div class="am-form-group  <?php echo $ArrayData[0][3];?>
            ">
				<?php echo $ArrayData[1][3];?>
              <input type="password" class="am-form-field " name="password" placeholder="密码" id="password" value="">
              </div>
			  <div class="am-form-group  <?php echo $ArrayData[0][4];?>
            ">
				  <?php echo $ArrayData[1][4];?>
              <input type="password" class="am-form-field " name="password2" placeholder="确认密码" id="password2" value="">
              </div> <div class="am-form-group  <?php echo $ArrayData[0][5];?>
            "><div class="am-cf">
			  <div class="am-fl">
			   
  <input type="text" class="am-form-field " name="authcode" placeholder="验证密码" id="authcode" value=""></div><div class="am-fl">
			 <p><img id="checkpic" onclick="changing();" style="height:36.67px;width:60px"src='/functions/yanzheng.php' />
				   <script>
					   function changing(){
    		document.getElementById('checkpic').src="/functions/yanzheng.php?"+Math.random();
} 
				   </script>
			  </p>
				  </p></div></div></div>
			  <input type="hidden" name="issubmited" value="y" />
            <br>
			 
            <div class="am-cf">
              <input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl button-glow am-radius">
		   
		  
		 <input name="" value="忘记密码 ^_^? " class="am-btn am-btn-default am-btn-sm am-fr am-radius " type="button">
		  <input name="" OnClick="window.location.href='login.php'; "value="登录账号" class="am-btn am-btn-success am-btn-sm am-fr am-radius" type="button" style="margin-right:5px">
        </div>
          </form>
          <hr>
          <p>© 2018 Souper Studio All right reserved</p>
        </div>
      </div>
			</div>
			
   
		</div>
		 
    </section>
  
  </body>

</html>