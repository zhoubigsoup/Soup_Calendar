<div class="container" style="margin-top:10px;">
     
      <style type="text/css">.table-bordered { border-collapse: collapse; text-align: center; font-size: 14px; margin-top: 15px; } .table-bordered td { padding: 8px 20px !important; vertical-align: middle !important; height: 50px; line-height: 46px; text-align: center; color: #666; } .table-bordered th { padding: 8px 20px !important; vertical-align: middle !important; border-bottom: 1px solid #e1e6eb !important; text-align: center; color: #666; background-color: #f5f6fa; } .table .text-left { text-align: left !important; }</style>
      <div id="content" style="margin-left:150px">
        <div class="row" style="width:100%">
          <table class="table table-bordered table-condensed text-center">
            <thead>
              <tr>
                <th width="50px">文章ID</th>
                <th width="80px">文章标题</th>
                <th width="50px">发布时间</th>
                <th width="50px">作者</th>
                <th width="100px">操作</th></tr>
            </thead>
            <tbody class="tbody">
             <?php
$result = queryMySQL("SELECT *FROM forum order by fid ");
$rows=$result->num_rows;

for($j = 0,$style=1;$j < $rows; ++$j)
{
	$result->data_seek($j);
	$row=$result->fetch_array(MYSQLI_ASSOC);
	$fid=$row['fid'];
	$title=$row['topic'];
	$describtion=$row['describtion'];
	$author=$row['author'];
	$imagepath=$row['imagepath'];
	$part=$row['part'];
	$icon=GetCardIconByID($part);
	$partname=GetCardNameByID($part);
	$thumb=$row['thumb'];
	$date=$row['date'];
	$visible=$row['visible'];

	echo BackpanelManageForum($fid,$title,$author,$date,$visible);
}

				?>
              
            </tbody>
          </table>
        </div>
      </div>