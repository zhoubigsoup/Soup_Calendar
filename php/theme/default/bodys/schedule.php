
   <div style="width:300px;height:0px;background-color: red;display: inline-block" ></div>
	
    <div class="container" style="margin-top:10px;margin-top: 20px;display: inline-block;max-width: 700px;">

     <script>

  $(document).ready(function() {

    $('#calendar').fullCalendar({
	  header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
        
	                <?php echo $calendar['events'];?>]
    });
	  

	  
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
	   <span class="dashboardtitle"><i class="am-icon-bolt"></i>  Schedule</span>
	   
		   <div id="calendar"></div>
	   
   </div>
   

  </body>

</html>