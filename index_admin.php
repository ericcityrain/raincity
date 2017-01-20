<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>康析文教後臺管理系統</title>
<?php 
	
	include("./function/useother.php");
	@$showpage = $_POST['showpage'];
	if($showpage==""){$showpage="news.php";}
?>
<style type="text/css">
body{
	font-size:12px;
	background-image: url(images/bg.gif);
	background-repeat: repeat;
}
ul,li,h2{margin:0;padding:0;}
ul{list-style:none;}
</style>	
<!--script src='./js/independent.js' type='text/javascript'> </script-->
</head>
<body>
<div id="top">
	<h2>管理選單</h2>
	<div class=jg></div>
	<div id="topTags">
		<ul>
		</ul>
	</div>
</div>
<form name="form1" id="form1" target="_self" method="POST" action="#" >
	<input type="hidden" name="showpage" id="showpage" >
	<div id="main"> 
		<div id="leftMenu">
			<ul>
				<li><input type="submit" class="buttonspecial" value="最新消息" onclick="showpage.value='news.php'"></li>
				<li><input type="submit" class="buttonspecial" value="課程介紹" onclick="showpage.value='course.php'"></li>
				<li><input type="submit" class="buttonspecial" value="圖片存放" onclick="showpage.value='img_list.php'"></li>
				<!--li><input type="submit" class="buttonspecial" value="聯絡我們" onclick="showpage.value='contact_us.php'"></li-->
				<!--li><input type="submit" class="buttonspecial" value="上課錦集" onclick="showpage.value='kam_set.php'"></li-->
				<li><input type="submit" class="buttonspecial" value="人員管理" onclick="showpage.value='staffadmin.php'"></li>
			</ul>
		</div>
		
		<div id="welcome" class="content" style="display:block;">
			<iframe width="100%" height="100%" scrolling="auto" frameborder="0" src="./page/<?php echo $showpage;?>"></iframe>
		</div>
	</div>
</form>

<div id="admin_footer">管理小區</div>
</body>
</html>