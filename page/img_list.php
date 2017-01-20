<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>康析文教後臺管理系統</title>
<?php 
	include("../function/useother_2.php");
	
	
	$path ="../images/";//圖片上傳路徑
	//抓圖片單一位置
	//@$imgname = $_GET['imgname'];	
	@$kind = $_POST['kind'];
	@$idx = $_POST['idx'];
	@$key = $_POST['key'];
	@$seltype = $_POST['seltype'];

	switch($kind){
		case "INS":
			// 抓取相關內容
			// 照片類型
			$pic_type = $_POST['pic_type'];
			// 照片狀態
			$state = $_POST['state'];
			// 照片內容
			$content = $_POST['content'];
			
			if($_FILES['gold_picture']['name']<>''){
				$sql="select `name`, `extension`, `type`, `state`, `content` from img_list  ";
				$picturequery=mysql_query($sql);
				$pictureData=mysql_fetch_assoc($picturequery);
				
				$goldpic = explode(".",$_FILES['gold_picture']['name']);	// 切割副檔名
				
				$INS_sql= "INSERT INTO `img_list`(`name`, `extension`, `type`, `state`, `content`)
				VALUES ('{$goldpic[0]}','{$goldpic[1]}','{$pic_type}','{$state}','{$content}')";
				mysql_query($INS_sql);
				// 判斷圖檔是否存在並且刪除
				if(is_file($path.$pictureData['name'].".".$pictureData['extension'])){
					unlink($path.$pictureData['name'].".".$pictureData['extension']);
				}
				// 移動圖檔
				move_uploaded_file($_FILES['gold_picture']['tmp_name'],"{$path}{$_FILES['gold_picture']['name']}");
			}
		break;
		case "UPD":
			
			// 照片類型
			$pic_type = $_POST['pic_type'.$idx];
			// 照片狀態
			$state = $_POST['state'.$idx];
			// 照片內容
			$content = $_POST['content'.$idx];
			
			$key = $_POST['key'];
			$upd_sql= "Update `img_list` set `type`='{$pic_type}', `state`='{$state}', `content`='{$content}' 
			Where name ='{$key}'";
			mysql_query($upd_sql);
		break;
		case "Del":
			// 照片類型
			$pic_type = $_POST['pic_type'.$idx];
			// 照片狀態
			$state = $_POST['state'.$idx];
			// 照片內容
			$content = $_POST['content'.$idx];
			
			$upd_sql= "Update `img_list` set `type`='{$pic_type}', `state`='2', `content`='{$content}' 
			Where name ='{$key}'";
			mysql_query($upd_sql);
			
			$sql="select `name`, `extension`, `type`, `state`, `content` from img_list  ";
			$picturequery=mysql_query($sql);
			$pictureData=mysql_fetch_assoc($picturequery);
			
			if(is_file($path.$pictureData['name'].".".$pictureData['extension'])){
				unlink($path.$pictureData['name'].".".$pictureData['extension']);
			}
		break;
	}
	
	
	$imgcnt = serchfile($ShowData,"","",$seltype,1);
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

</head>
<body>
<form name="form1" id="form1" method="POST" action="./img_list.php" Enctype="Multipart/Form-Data">

	<input type="hidden" name="action_link" id="action_link" value="news">
	<!-- 要做的新增/修改類型-->
	<input type="hidden" name="kind" id="kind" >
	<!-- 要做的位置-->
	<input type="hidden" name="idx" id="idx" >
	<!-- 主鍵值-->
	<input type="hidden" name="key" id="key">
	
	<table>
		<tr>
			<td><?php 
					$selected ="";
					$selected_2 = "";
					
					if($seltype=="gold"){
						$selected="selected";
					}elseif($seltype=="kam"){
						$selected_2="selected";
					}else{
						$selected="";
						$selected_2="";
					}
				?>
				
				<select name="seltype" id="seltype">
					<option  value="">全部</option>
					<option <?php echo $selected;?>  value="gold">榮譽金榜</option>
					<option <?php echo $selected_2;?> value="kam">上課錦集</option>
				<select>
				<input type="submit" class="selbutton" onclick="kind.value='SEL';" value="查詢" >
			</td>
		</tr>
	</table>
	<table border="1" width="100%" cellpadding="0" cellspacing="0">
		<tr align="center">
			<td>圖檔名稱</td>
			<td>照片類型</td>
			<td>是否啟用</td>
			<td>圖片內容</td>
			<td>圖片連結</td>
			<td>&nbsp;</td>
		</tr>
		<tr align="center">
			<td><input  type="file" name="gold_picture" id="gold_picture" style="width:100px;" class=""></td>
			<td>
				<select name="pic_type" id="pic_type">
					<option value="gold">榮譽金榜</option>
					<option value="kam">上課錦集</option>
				<select>
			</td>
			<td>
				<select name="state" id="state" >
					<option value="1">啟用</option>
					<option value="0">關閉</option>
				</select>
			</td>
			<td><input type="text" name="content" id="content" ></td>
			<td>稍後建置</td>
			<td><input type="submit" class="green_button" value="新增圖片" onclick="kind.value='INS';" ></td>
		</tr>
		<?php for($i=0;$i<$imgcnt;$i++){
			$selected="";
			$selected_2="";
			// 圖片路徑
			$imgpath = $path.$ShowData['name'][$i].".".$ShowData['extension'][$i];
		?>
		<tr align="center">
			<td><?php echo $ShowData['name'][$i];?></td>
			<td><?php 
					if($ShowData['type'][$i]=="gold"){
						$selected="selected";
					}elseif($ShowData['type'][$i]=="kam"){
						$selected_2="selected";
					}else{
						$selected="";
						$selected_2="";
					}
				?>
				<select name="pic_type<?php echo $i;?>" id="pic_type">
					<option <?php echo $selected;?> value="gold">榮譽金榜</option>
					<option <?php echo $selected_2;?> value="kam">上課錦集</option>
				<select>
			</td>
			<td>
				<select name="state<?php echo $i;?>" >
					<?php 
						$selected="";
						$selected_2="";
						if($ShowData['state'][$i]==1){
							$selected="selected";
						}elseif($ShowData['state'][$i]==0){
							$selected_2="selected";
						}else{
							$selected="";
							$selected_2="";
						}
					?>
					<option <?php echo $selected;?> value="1">啟用</option>
					<option <?php echo $selected_2;?> value="0">關閉</option>
				</select>
			</td>
			<td><input type="text" name="content<?php echo $i?>" value="<?php echo $ShowData['content'][$i];?>"></td>
			<td>
				<a target="new" href="<?php echo $imgpath;?>">圖片連結</a>
			</td>
			<td>
			<input type="submit" class="orange_button" onclick="kind.value='UPD';idx.value='<?php echo $i;?>';key.value='<?php echo $ShowData['name'][$i]?>'" value="修改圖片" >
			<input type="submit" class="del_button" onclick="kind.value='Del';idx.value='<?php echo $i;?>';key.value='<?php echo $ShowData['name'][$i]?>'" value="刪除圖片" >
			</td>
			
		</tr>
		<?php }?>
	</table>
</form>
</body>
</html>