 <header class="am-topbar am-topbar-fixed-top" style="box-shadow: 0 2px 4px rgba(3,27,78,.1);">
      <div class="am-container">
        <h1 class="am-topbar-brand app-logo">
          <a href="http://tpl.amazeui.org/index.html" style="margin-top:-10">
            <img src="./theme/default/Amaze UI_files/logo.png" alt=""></a>
        </h1>
        <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-secondary am-show-sm-only" data-am-collapse="{target:#collapse-head}">
          <span class="am-sr-only">SWITCH</span>
          <span class="am-icon-bars"></span>
        </button>
        <div class="am-collapse am-topbar-collapse" id="collapse-head">
          <ul class="am-nav am-nav-pills am-topbar-nav" style="width:70%">
            <li data-type="index" class='<?php echo $ToolbarAct[0];?>'>
              <a href="http://calendar.46c46.com">Home</a></li>
            <li data-type="developer" class="<?php echo $ToolbarAct[1];?>">
              <a href="#">Calendars</a></li>
            <li class="<?php echo $ToolbarAct[2];?>">
              <a href="#">Schedule</a></li>
            <li class="<?php echo $ToolbarAct[3];?>">
              <a>My Task</a>
            </li>
                      <?php echo $ToolbarOtherActive;?>
           <?php echo $IsLoginResource;?>
          </ul>
        </div>
      </div>
      </div>
    </header>
