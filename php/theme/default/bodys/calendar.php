
   <div style="width:300px;height:0px;background-color: red;display: inline-block" ></div>
	
    <div class="container" style="margin-top:50px;display: inline-block;max-width: 600px;">

     <script>

  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: false,
      navLinks: true, // can click day/week names to navigate views
      editable: false,
	  height: 350,
	  width:400,
	  scrollTime:"<?php echo $_SESSION['defaultTime'];?>",
      eventLimit: false, // allow "more" link when too many events
	  defaultView: 'agendaDay',
      events: [
        
	                <?php echo $calendar['events'];?>]
    });
	  
$('.fc-widget-header').addClass('hidden');
$('.fc-day-grid').addClass('hidden');
	  
  });

</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>

<div class="row ">
   <div class="col-sm-1 dashboard">
	   <span class="dashboardtitle"><i class="am-icon-bolt"></i>  Dashboard</span>
	   <div class="row">
	   <div class="circlesa col-sm-1 col-xs-2">
		   <div class="circles">
		   		<div class="dashboardball am-circle am-inline-block">
					<div class="dashboardhalfcircle" ></div>
					<span class="dashboardnumber" ><?php echo $calendar['totalevents'];?></span>
					<span class="dashboardcircletext" >Events</span>
					
		  		</div>
		   		<div class="dashboardball am-circle am-inline-block">
					<div class="dashboardhalfcircle" ></div>
					<span class="dashboardnumber" ><?php echo $calendar['totaltasks'];?></span>
					<span class="dashboardcircletext" >Tasks</span>
					
		  	    </div>
		   		<div class="dashboardball am-circle am-inline-block">
					<div class="dashboardhalfcircle" ></div>
					<span class="dashboardnumber" >0</span>
					<span class="dashboardcircletext" >Finished</span>
					
		  	    </div>
		   </div>
		   <span class="badge am-badge-success dashboardspan">Timezone:<span class="dashboarddetail" >Holiday</span></span>
		   <span class="badge am-badge-primary dashboardspan">Today's task:<span class="dashboarddetail" ><?php echo $calendar['totaltasks'];?></span></span>
		   <span class="badge badge-success dashboardspan">Finished task:<span class="dashboarddetail" ><?php echo $calendar['finished_tasks'];?></span></span>
	
	   </div>
	   	   <div class="col-sm-1 col-xs-2 dashboardfunction">
			   <button class="am-btn am-btn-lightblue dashboardbtn" onclick="layer.open({
    type: 2,
    title: 'Add task',
    maxmin: true,
    area: ['90%', '90%'],
    content: ['?r=addtask'],
    
  }); $('#msgspan').addClass('hidden');$('#namespan').addClass('hidden');" style="margin-bottom: 5px;"><i class="am-icon-plus dashboardicon"></i>  Add task</button>
			   <button class="am-btn am-btn-lightblue dashboardbtn" onclick="layer.open({
    type: 2,
    title: 'Add event',
    maxmin: true,
    area: ['90%', '90%'],
    content: ['?r=addevent'],
    
  }); $('#msgspan').addClass('hidden');$('#namespan').addClass('hidden');"  style="margin-bottom: 5px;"><i class="am-icon-plus dashboardicon"></i>  Add event</button>
		   
		   </div>
	   </div>
   </div>
	   <div class="col-md-6 col-sm-1">
      <div class="bartitle">
         Events
      </div>
      <div id="calendar"></div>
   </div>
	   <div id="tasks" class="col-md-6 col-sm-1">
      <div class="bartitle">
         Tasks
      </div>
     <?php echo $calendar['tasks'];?>
   </div>

</div>


  </body>

</html>