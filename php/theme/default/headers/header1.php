<body data-type="index" style=" ">

  <header class="am-topbar am-topbar-fixed-top"style="">
    <div class="am-container">
      <h1 class="am-topbar-brand app-logo">
        <a href="http://tpl.amazeui.org/index.html">
          <img src="./theme/default/Amaze UI_files/logo.png" alt=""></a>
      </h1>
      <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-secondary am-show-sm-only" data-am-collapse="{target:#collapse-head}">
        <span class="am-sr-only">导航切换</span>
        <span class="am-icon-bars"></span>
      </button>
      <div class="am-collapse am-topbar-collapse" id="collapse-head">
        <ul class="am-nav am-nav-pills am-topbar-nav"style="width:70%">
          <li data-type="index" class=" <?php echo $ToolbarAct[0];?>">
            <a href="index.php">首页</a></li>
          <li data-type="developer" class="<?php echo $ToolbarAct[1];?>">
            <a OnClick="layer.msg('暂未开放，尽请期待', {icon: 0})">下载中心</a></li>
          <li class="<?php echo $ToolbarAct[2];?>">
            <a OnClick="layer.msg('暂未开放，尽请期待', {icon: 0})">社区</a></li>
			 <li class="visible-xs">
            <a href="login.php">登录</a></li>
			
          <?php echo $ToolbarOtherActive;?>
           <?php echo $IsLoginResource;?>
        </ul>
		  
        
        
      </div>
      </div>
    </div>
  </header>
	
	