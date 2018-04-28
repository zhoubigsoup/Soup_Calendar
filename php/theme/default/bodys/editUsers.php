<div class="container" style="margin-top:10px;">
      <script>$(function() {
          //获取浏览器宽度
          var _width = $(window).width();
          if (_width < 750) {
            //直接为该div添加w1024样式,会覆盖前一个样式
            $("#content").css('margin-left', '0px');

          }
        });

        $(window).resize(function() {

          var _width = $(window).width();
          if (_width < 750) {

            $("#content").css('margin-left', '0px');

          }
          if (_width > 750) {

            $("#content").css('margin-left', '170px');

          }

        });</script>
      <style type="text/css">.table-bordered { border-collapse: collapse; text-align: center; font-size: 14px; margin-top: 15px; } .table-bordered td { padding: 8px 20px !important; vertical-align: middle !important; height: 50px; line-height: 46px; text-align: center; color: #666; } .table-bordered th { padding: 8px 20px !important; vertical-align: middle !important; border-bottom: 1px solid #e1e6eb !important; text-align: center; color: #666; background-color: #f5f6fa; } .table .text-left { text-align: left !important; }</style>
      <div id="content" style="margin-left:150px">
        <div class="row" style="width:100%">
          <table class="table table-bordered table-condensed text-center">
            <thead>
              <tr>
                <th width="20px">用户ID</th>
                <th width="80px">用户昵称</th>
                <th width="80px">邮箱</th>
				<th width="80px">手机号</th>
                <th width="50px">注册日期</th>
                <th width="50px">用户组</th>
				<th width="50px">状态</th></tr>
			    
            </thead>
            <tbody class="tbody">
             <?php
$result = queryMySQL("SELECT *FROM user order by uid ");
$rows=$result->num_rows;

for($j = 0,$style=1;$j < $rows; ++$j)
{
	$result->data_seek($j);
	$row=$result->fetch_array(MYSQLI_ASSOC);
	$uid=$row['uid'];
	$name=$row['username'];
	$email=$row['email'];
	$phonenumber=$row['phonenumber'];
	$date=$row['date'];
	$type=$row['type'];
	$status=$row['status'];


	echo BackpanelManageUser($uid,$name,$email,$phonenumber,$date,$type,$status);
}

				?>
              
            </tbody>
          </table>
        </div>
      </div>