<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>康析文教機構</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<!--link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Varela+Round" rel="stylesheet" /-->
<?php 
include_once("./function/useother.php");+
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
	<div class="contact_us_index">
		<p class="dfkaititlepx">淡水教室</p>
		<p class="dfkaipx">淡水區新生街51巷15-1號</p>
		<img width="100%" height="100%" src="images/map1.png"></img>
		<p class="dfkaititlepx">竹圍教室</p>
		<p class="dfkaipx">淡水區民權路139號2樓(竹圍捷運站對面，住商不動產樓上)</p>
		<img width="100%" height="100%" src="images/map2.png"></img>
		<p class="dfkaipx"要>聯絡方式：2620-3596</p>
		<p class="dfkaipx">手機聯絡：0922-161-160</p>
		<p class="dfkaipx">Line ID: jjkk5115</p>
	</div>
</div>


<?php 
	// 顯示底部畫面
	require("./bottom_show.php");
?>
</body>
</html>
