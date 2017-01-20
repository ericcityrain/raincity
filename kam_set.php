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
<style type="text/css">

</style>
</head>
<body>
<?php 
	// 顯示抬頭畫面
	require("./topshow.php");
	$pnt = 3;
	$path="./images/";
	$showpage =0;
	$imgcnt = serchfile($ShowData,"","","kam","1");
	$rowcnt = ceil($imgcnt/$pnt);
?>
<div class="news_main">
	<div class="news_index">
		<table border ="0" width="760" cellspacing="0" >
			<?php for($i=0;$i<$rowcnt;$i++){ ?>
			<tr>
				<?php for($j=0;$j<$pnt;$j++){
					if($imgcnt<=$showpage){
						$showpic="";
						$Introduction ="";
					}else{
						$imgpath = $path.$ShowData["name"][$showpage].".".$ShowData["extension"][$showpage];
						$showpic ="<a target='new' href=".$imgpath."><img src=".$imgpath." width='200px' height='200px'></a>";
						$Introduction = $ShowData["content"][$showpage];
					}
					?>
				<td>
					<table border ="0" class="TB_COLLAPSE" cellspacing="0" >
						<tr>
							<td><?php echo $showpic;?></td>
						</tr>
						<tr align="center">
							<td><?php echo $Introduction;?></td>
						</tr>
					</table>
					
				</td>
				<?php 
					$showpage++;
				}?>
			<tr>
			<?php }?>
		</table>
	</div>
</div>
<?php 
	// 顯示底部畫面
	require("./bottom_show.php");
?>
</body>
</html>
