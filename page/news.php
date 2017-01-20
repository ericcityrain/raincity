<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>康析文教後臺管理系統</title>
<?php 
	include("../function/useother_2.php");
	$date = date("Y-m-d H:i:s");
	$flag = 0;
	//選擇顯示類型
	@$kind = $_POST['kind'];
	@$idx = $_POST['idx'];
	@$key = $_POST['key'];
	switch($kind){
		case "UPD":
			// 最改最新消息內容
			@$content = $_POST['content'.$idx];
			$sql="Update latest_news set content ='{$content}' where idx='{$key}'";
			$query=mysql_query($sql);
			$flag= 1;
		break;
		case "INS":
			@$content = $_POST["contentins"];
			$sql="INSERT INTO latest_news 
			(`content`, `start_date`, `end_date`) VALUES ('{$content}','{$date}','{$date}')";
			$query=mysql_query($sql);
			$flag= 2;
		break;
		case "Del":
			$sql="Update latest_news set state ='2' where idx='{$key}'";
			$query=mysql_query($sql);
			$flag =3;
		break;
	}
	$endcnt = 30;
	$newcnt = get_news($newsData,"",$endcnt,1);
?>
<script text="text/html">
var flag = '<?php echo $flag;?>';
switch(flag){
	case "1":
		alert("修改完成");
	break;
	case "2":
		alert("新增完成");
	break;
	case "3":
		alert("刪除完成");
	break;
	default:
	
}

</script>

</head>
<body>
	<form name="form1" id="form1" method="POST" action="./news.php">

		<input type="hidden" name="action_link" id="action_link" value="news">
		<!-- 要做的新增/修改類型-->
		<input type="hidden" name="kind" id="kind" >
		<!-- 要做的位置-->
		<input type="hidden" name="idx" id="idx" >
		<!-- 主鍵值-->
		<input type="hidden" name="key" id="key">
		<table cellspacing=0 border='1' align="center" width="100%">
			<tr align="center">
				<td>序號</td>
				<td>新消息內容</td>
				<td>開始時間</td>
				<td>結束時間</td>
				<td>&nbsp;</td>
			</tr>
			<tr align="center">
				<td>預設值</td>
				<td><input type="text"  name="contentins" id="contentins" ></td>
				<td></td>
				<td></td>
				<td><input type="submit" class="green_button" value="新   增" onclick="kind.value='INS';"></td>
			</tr>
			<?php for($i=0;$i<$newcnt;$i++){?>
				<tr align="center">
					<td><?php echo ($i+1);?></td>
					<td><input type="text"  name="content<?php echo $i;?>" id="content<?php echo $i;?>" value="<?php echo $newsData['content'][$i]?>"></td>
					<td><?php echo $newsData['start_date'][$i]?></td>
					<td><?php echo $newsData['end_date'][$i]?></td>
					<td><input type="submit" class="orange_button" value="確認修改" onclick="kind.value='UPD';idx.value='<?php echo $i;?>';key.value='<?php echo $newsData['idx'][$i]?>'">
						<input type="submit" class="del_button" value="刪除" onclick="kind.value='Del';idx.value='<?php echo $i;?>';key.value='<?php echo $newsData['idx'][$i]?>'">
					</td>
				</tr>
			<?php }?>
		</table>
	</form>
</body>
</html>