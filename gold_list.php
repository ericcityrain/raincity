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
	$path="./gold_img/";
	// 抓取單一圖片
	$cnt = serchfile($goldData,"","","gold","1");
	
	$path ="./images/";
	//抓圖片單一位置
	@$imgname = $_GET['imgname'];
	// 秀出圖片位置
	// 抓取全部圖片檔案位置
	serchfile($showimg,$imgname,"","gold","1");
?>
<div class="news_main">
	<div class="gold_list" >
		<div style="height:100%;">
			<ul class="nav nav-pils">
				<?php 
					for($i=0;$i<$cnt;$i++){
				?>
						<li role="presentation" class="active" 	><a href ="?imgname=<?php echo $goldData['name'][$i];?>"><?php echo  $goldData['content'][$i];?></a></li>
				<?php 
					}
				?>
			</ul>
			
		</div>
		<?php
			// 圖檔路徑
			$imgpath = $path.$showimg["name"][0].".".$showimg["extension"][0];
		?>
		<div class="showimg">
			<img width='600' src ="<?php echo $imgpath?>">
		</div>
	</div>
	

<?php 
	// 顯示底部畫面
	require("./bottom_show.php");
?>
</body>
</html>
