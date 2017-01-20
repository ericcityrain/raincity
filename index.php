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
//$end_date = ate_add($start_date,date_interval_create_from_date_string("7 days"));

?>
<script>

</script>
</head>
<body>

<?php 
	// 顯示抬頭畫面
	require("./topshow.php");
	// 最新消息
	$newcnt= get_news($newsData,$end_date,6,"1");
	
?>
<div id="wrapper">
	<div id="page" class="container">
		<div>
			<a href="#" class="image image-full"><img src="images/logo.jpg" alt="" /></a>
		</div>
		<div class="column1">
			<div>
				<h2>最新消息</h2>
				<ul class="licss">
				<?php for($i=0;$i<$newcnt;$i++){
					if($i%2==0){
						$color = "style='background:#DDDDDD'";
					}else{
						$color = "style='background:#FFFFFF'";
					};
					?>
					<a href="latest_news.php" target="_self"><li <?php echo $color;?>><?php echo $newsData['title'][$i];?></li></a>
				<?php }?>
				</ul>
			</div>
		</div>
		<div class="column3">
			<div class="title">
				<h2>補習班環境</h2>
			</div>
			<img src="images/qk.jpg" width="282" height="150" alt="" />
			<p>學生們的吃飯/休息環境</p>
		</div>
		<div class="column4">
			<div class="title">
				<h2>教室環境設備</h2>
			</div>
			<img src="images/classroom.jpg" width="282" height="150" alt="" />
			<p>相關的教室及環境設備參考</p>
		</div>
	</div>
</div>
<?php 
	// 顯示底部畫面
	require("./bottom_show.php");
?>
</body>
</html>
