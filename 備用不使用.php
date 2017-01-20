<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<!--link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Varela+Round" rel="stylesheet" /-->
<?php include_once("./function/useother.php");
use_link();
$start_date = date("Y-m-d H:i:s");
$end_date = date("Y-m-d H:i:s",(strtotime($start_date)+(86400*7)));
//$end_date = ate_add($start_date,date_interval_create_from_date_string("7 days"));

?>
</head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header" class="container">
			<div id="logo">
				<h1><a href="index.php">康析文教機構</a></h1>
				<p><a href="https://www.facebook.com/KangShisciencemath/?fref=ts" target='new' rel="facebook">相關連結</a></p>
			</div>
			<!--
			<div id="social">
				<ul class="contact">
					<li><a href="#" class="icon icon-twitter"><span>Twitter</span></a></li>
					<li><a href="#" class="icon icon-facebook"><span></span></a></li>
					<li><a href="#" class="icon icon-dribbble"><span>Pinterest</span></a></li>
					<li><a href="#" class="icon icon-tumblr"><span>Google+</span></a></li>
					<li><a href="#" class="icon icon-rss"><span>Pinterest</span></a></li>
				</ul>
			</div>
			-->
		</div>
		<div id="menu" class="container">
			<ul>
				<li class="current_page_item"><a href="./index.php" accesskey="1" title="">首頁</a></li>
				<li><a href="#about_us" accesskey="2" title="">關於我們</a></li>
				<li><a href="#" accesskey="3" title="">最新消息</a></li>
				<li><a href="#" accesskey="4" title="">課程簡介</a></li>
				<li><a href="#" accesskey="5" title="">榮譽金榜</a></li>
				<li><a href="#" accesskey="6" title="">聯絡我們</a></li>
				<li><a href="#" accesskey="7" title="">上課錦集</a></li>
				<!--
				<li><a href="#" accesskey="4" title="">Careers</a></li>
				<li><a href="#" accesskey="5" title="">Contact Us</a></li>
				-->
			</ul>
		</div>
	</div>
	
	<div id="page" class="container">
		<div><a href="#" class="image image-full"><img src="images/logo.jpg" alt="" /></a></div>
		<div class="column1">
			<div class="title">
				<h2>最新消息</h2>
				<?php $newcnt= get_news($newsData,$end_date,6);?>
				<table border='0px'  cellspacing='0'>
					<?php for($i=0;$i<$newcnt;$i++){?>
					<tr>
						<td>項目：<?php echo ($i+1);?></td>
						<td><?php echo $newsData['content'][$i];?></td>
					</tr>
					<?php }?>
				</table>
			</div>
			<p> 相關其餘內容 </p>
			<a href="#" class="button">暫無</a>
		</div>
		<div class="column3">
			<div class="title">
				<h2>補習班環境</h2>
			</div>
			<img src="images/qk.jpg" width="282" height="150" alt="" />
			<p>學生們的吃飯/休息環境</p>
			<a href="#" class="button">暫無</a>
		</div>
		<div class="column4">
			<div class="title">
				<h2>教室環境設備</h2>
			</div>
			<img src="images/classroom.jpg" width="282" height="150" alt="" />
			<p>相關的教室及環境設備參考</p>
			<a href="#" class="button">暫無</a>
		</div>
	</div>


	<!--
	<div id="portfolio-wrapper">
		<div id="portfolio" class="container">
			<div class="title">
				<h2>Aenean elementum</h2>
				<span class="byline">Integer sit amet pede vel arcu aliquet pretium</span> </div>
			<div class="column1">
				<div class="box">
					<span class="icon icon-cloud-download"></span>
					<h3>Vestibulum venenatis</h3>
					<p>Fermentum nibh augue praesent a lacus at urna congue rutrum.</p>
					<a href="#" class="button">Etiam posuere</a> </div>
			</div>
			<div class="column2">
				<div class="box">
					<span class="icon icon-coffee"></span>
					<h3>Praesent scelerisque</h3>
					<p>Vivamus fermentum nibh in augue praesent urna congue rutrum.</p>
					<a href="#" class="button">Etiam posuere</a> </div>
			</div>
			<div class="column3">
				<div class="box">
					<span class="icon icon-globe"></span>
					<h3>Donec dictum metus</h3>
					<p>Vivamus fermentum nibh in augue praesent urna congue rutrum.</p>
					<a href="#" class="button">Etiam posuere</a> </div>
			</div>
			<div class="column4">
				<div class="box">
					<span class="icon icon-dashboard"></span>
					<h3>Mauris vulputate dolor</h3>
					<p>Rutrum fermentum nibh in augue praesent urna congue rutrum.</p>
					<a href="#" class="button">Etiam posuere</a> </div>
			</div>
		</div>
	</div>
	-->
</div>
<div id="footer">
	
	<?php 
	// 顯示底部內容 顯示關於我們
		get_content($footerData,"about_us","");
	?>
	<a id="about_us"><pre><?php echo $footerData['content']?></pre></a>
</div>
</body>
</html>
