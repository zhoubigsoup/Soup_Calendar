<?php
require_once ("theme/default/heads/calendarhead.php");
$username=$_SESSION['username'];
if ($_GET['tid'] != null) {
    $type = AntiUnWord($_GET['type']);
    $tid = AntiUnWord($_GET['tid']);
	
    if ($type == "edit") {
        $result = queryMySQL("SELECT *FROM tasks WHERE tid=$tid AND user='$username'");
        $rows = $result->num_rows;
        for ($j = 0, $style = 1;$j < $rows;++$j) {
            $result->data_seek($j);
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $forum['tid'] = $row['tid'];
            $forum['name'] = $row['name'];
            $forum['detail'] = $row['detail'];
            $forum['starttime'] = $row['starttime'];
			$forum['endtime'] = $row['endtime'];
            $forum['image'] = $row['image'];
            
        }
        require_once ("theme/default/bodys/editTask.php");
    } elseif ($type == "delete") {
		queryMysql("DELETE FROM tasks WHERE tid=$tid AND user='$username'");
		die("<script>layer.msg('delete', {icon: 1},function(){url='calendar.php';window.location.href=url;});</script>");
    }elseif ($type == "finish") {
		queryMysql("UPDATE tasks SET status='finished' WHERE tid=$tid AND user='$username'");
		die("<script>url='calendar.php';window.location.href=url;</script>");
    }

}
if ($_POST['name'] != null) {
    $name = $detail = $image = $starttime = $endtime = "";
    $name = AntiUnWord($_POST['name']);
    $tid = AntiUnWord($_POST['tid']);
    $detail = AntiUnWord($_POST['detail']);
    $image = AntiUnWord($_POST['image']);
    $starttime = AntiUnWord($_POST['starttime']);
	$endtime = AntiUnWord($_POST['endtime']);
    if ($name == null) {
        $namewarning = "Please enter task name";
    } elseif ($detail == null) {
        $detailwarning = "Please enter detail";
    } elseif ($image == null) {
        $imagewarning = "please choose an image";
    } elseif ($starttime == null) {
        $starttimewarning = "Please choose";
    } elseif ($endtime == null) {
        $endtimewarning = "Please choose";
    } else {
		queryMysql("UPDATE tasks SET name='$name',detail='$detail',starttime='$starttime',endtime='$endtime',image='$image' WHERE tid=$tid AND user='$username'");
		die("<script>layer.msg('Update successfully', {icon: 1},function(){url='calendar.php';window.location.href=url;});</script>");
		
	}
}
$ArrayData = InputWarning($namewarning, $detailwarning, $imagewarning, $starttimewarning,$endtimewarning);
?>