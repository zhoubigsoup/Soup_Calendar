  <body style="margin-top: 5px;margin-left:0px">
	  <nav id="sidebar" class="am-topbar-fixed-top " style="margin-top: 60px;height: 100%;box-shadow: 1px 0px 4px rgba(3,0,78,.1);">
			 <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
			         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


                <ul class="list-unstyled components">
                   					<li >
						 <a href="#homeSubmenu" ><i class="am-icon-caret-down     leftbaricon" style="margin-left: 5px"></i>Calendar</a>
					</li>
                    <li class="<?php echo $LeftbarAct['Dashboard'];?>">
                        <a href="dashboard.php" ><i class="am-icon-area-chart   leftbaricon"></i>Dashboard</a>

                    </li>
					<li class="<?php echo $LeftbarAct['schedule'];?>">
						 <a href="schedule.php" ><i class="am-icon-calendar    leftbaricon"></i>Schedule</a>
					</li>
   
                    <li >
						 <a href="#homeSubmenu" ><i class="am-icon-caret-down     leftbaricon" style="margin-left: 5px"></i>Tasks</a>
					</li>
					<li class="<?php echo $LeftbarAct['task1'];?>">
						 <a href="#homeSubmenu" ><i class="am-icon-sticky-note    leftbaricon"></i>Task1</a>
					</li>
					<li class="<?php echo $LeftbarAct['Task2'];?>">
						 <a href="#homeSubmenu" ><i class="am-icon-sticky-note    leftbaricon"></i>Task2</a>
					</li>
   
                </ul>

                
            </nav>