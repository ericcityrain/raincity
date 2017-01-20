<?php 
	include_once("../function/useother.php");

	
?>
<style type="text/css">

</style>
</head>
<body>
<?php 
	// 顯示抬頭畫面
	require("./topshow.php");
	$path="./gold_img/";
	$cnt = serchfile($goldData,"","jpg");
			
?>
<div class="news_main">
	<div class="left_Menu">
		<ul class='left_Menu_ul'>
			<li class='left_Menu_li'>國小</li>
			<li class='left_Menu_li'>國中</li>
			<li class='left_Menu_li'>高中</li>
		</ul>
	</div>
	
	<div class="gold_list" >
		榮譽金榜
		<br>
		<ul>
		<?php 
			for($i=0;$i<$cnt;$i++){
				$imgpath = $path.$goldData["name"][$i].".".$goldData["type"][$i];
			?>
				<li><a href ="#">連結一號</a ></li>
		<?php }?>
		</ul>
		<!--img  src ="<?php echo $imgpath?>"-->
	</div>
	<span id="span1"></span>
</div>


<?php 
	// 顯示底部畫面
	require("./bottom_show.php");
?>
</body>
</html>
