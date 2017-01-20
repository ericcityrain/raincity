<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>康析文教機構</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<!--link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Varela+Round" rel="stylesheet" /-->
<?php
 include_once("./function/useother.php");
$start_date = date("Y-m-d H:i:s");
$end_date = date("Y-m-d H:i:s",(strtotime($start_date)+(86400*7)));

?>
<style type="text/css">

</style>
</head>
<body>
<?php 
	// 顯示抬頭畫面
	require("./topshow.php");
?>
<div class="news_main">
	<!--
	<div class="left_Menu">
		<ul class='left_Menu_ul'>
			<li class='left_Menu_li'>國小</li>
			<li class='left_Menu_li'>國中</li>
			<li class='left_Menu_li'>高中</li>
		</ul>
	</div>
	-->
	<div class="news_index">
		<?php $newcnt= get_news($newsData,$end_date,6,"1");?>
		<?php for($i=0;$i<$newcnt;$i++){?>
		<table class="TB_COLLAPSE" border='0' width="600px"  cellspacing='0'>
			
			<thead>
				<tr>
					<th colspan="2">標題：<?php echo $newsData['title'][$i];?></th>
					
				</tr>
			</thead>
			<tr >
				<td width="100px" >項目：<?php echo ($i+1);?></td>
				<td ><?php echo $newsData['content'][$i];?></td>
			</tr>
		</table>
		<br>
		<?php }?>
	</div>
</div>


<?php 
	// 顯示底部畫面
	require("./bottom_show.php");
?>
</body>
</html>
