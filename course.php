<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>康析文教機構</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<!--link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Varela+Round" rel="stylesheet" /-->
<?php include_once("./function/useother.php");
$start_date = date("Y-m-d H:i:s");
$end_date = date("Y-m-d H:i:s",(strtotime($start_date)+(86400*7)));
//$end_date = ate_add($start_date,date_interval_create_from_date_string("7 days"));
?>
<style type="text/css">

</style>
</head>
<body>
<?php 
	// 顯示抬頭畫面
	require("./topshow.php");
	$cocnt = course_list($RptData,"","","1");
?>
<div class="news_main">

		<?php for($i=0;$i<$cocnt;$i++){?>
		<table  class="TB_COLLAPSE" width="800px" border="1" align="center" cellspacing="0"  >
			<thead>
				<tr>
					<th>班別</th>
					<th>星期/時間</th>
					<th>備註</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan=3 align="center"><?php echo $RptData['note2'][$i];?></td>
				</tr>
			</tfoot>
			<tr>
				<td><?php echo $RptData['grade'][$i]."/".$RptData['classes'][$i];?></td>
				<td><?php echo $RptData['open_date'][$i]."&nbsp;".$RptData['open_time'][$i]."<br>".$RptData['close_date'][$i]."&nbsp;".$RptData['close_time'][$i];?></td>
				<td width='200' nowrap="nowrap"><?php echo $RptData['note'][$i];?></td>
			</tr>
			
		</table>
		<BR>
		<?php }?>
	</div>
</div>


<?php 
	// 顯示底部畫面
	require("./bottom_show.php");
?>
</body>
</html>
