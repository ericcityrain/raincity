<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>康析文教後臺管理系統</title>
<?php 
	include("../function/useother_2.php");
	$nowdate =date("Y-m-d H:i:s");
	// 判斷為新增或是修改
	@$kind = $_POST["kind"];
	if(@$kind <> ""){
		switch($kind){
			case "UPD":
				// 影響值
				$idx = $_POST["idx"];
				// 主鍵值
				$keyidx = $_POST["keyidx"];
				// 班別
				$grade = $_POST["grade".$idx];
				//課程
				$classes = $_POST["classes".$idx];
				// 開始日期
				$open_date = $_POST["open".$idx];
				$open_HH = $_POST["openHH".$idx];
				$open_NN = $_POST["openNN".$idx];
				$open_time = $open_HH.":".$open_NN.":00";
				// 結束日期
				$close_date = $_POST["close".$idx];
				$close_HH = $_POST["closeHH".$idx];
				$close_NN = $_POST["closeNN".$idx];
				$close_time = $close_HH.":".$close_NN.":00";
				
				// 備註
				$note = $_POST["note".$idx];
				$notetwo = $_POST["notetwo".$idx];
				
			
				$sql="UPDATE `course` SET `grade` ='{$grade}',`classes`='{$classes}',
				`open_date`='{$open_date}',`open_time`='{$open_time}',
				`close_date`='{$close_date}',`close_time`='{$close_time}',
				`note`='{$note}',`note2`='{$notetwo}',
				`make_date` = '{$nowdate}'
				Where idx = '{$keyidx}'";
				//echo $sql;
				$query=mysql_query($sql);
			break;
			case "INS":
				
				// 班別
				$grade = $_POST["grade"];
				//課程
				$classes = $_POST["classes"];
				// 開始日期
				$open_date = $_POST["open"];
				$open_HH = $_POST["openHH"];
				$open_NN = $_POST["openNN"];
				$open_time = $open_HH.":".$open_NN.":00";
				// 結束日期
				$close_date = $_POST["close"];
				$close_HH = $_POST["closeHH"];
				$close_NN = $_POST["closeNN"];
				$close_time = $close_HH.":".$close_NN.":00";
				
				// 備註
				$note = $_POST["note"];
				$notetwo = $_POST["notetwo"];
				
				
				$sql="INSERT INTO `course` (`grade`, `classes`, `open_date`, `open_time`,
				`close_date`, `close_time`, `note`, `note2`, `make_user`, `make_date`)
				VALUES ('{$grade}','{$classes}','{$open_date}','{$open_time}',
				'{$close_date}','{$close_time}','{$note}','{$notetwo}','','{$nowdate}')";
				
				$query=mysql_query($sql);
			break;
			case "Del":
				// 影響值
				$idx = $_POST["idx"];
				// 主鍵值
				$keyidx = $_POST["keyidx"];
				
				$sql="UPDATE `course` SET `state` ='2' Where idx = '{$keyidx}'";
				$query=mysql_query($sql);
			break;
		}
	}
	$cocnt = course_list($RptData,"","","1");
?>

</head>
<body>
<form name="form1" id="form1" method="POST" action="./course.php">
	<input type="hidden" name="kind" id="kind">
	<input type="hidden" name="keyidx" id="keyidx">
	<input type="hidden" name="idx"    id="idx">
	<table width="100" border="0" cellspacing="0" align="left" >
		<tr>
			<td>
				<input type="submit" class="green_button" value="新 增" onclick="kind.value='INS';">
			</td>
		</tr>
	</table>
	<table width="650" border="1" cellspacing="0"  align="center" >
		<tr align="center">
			<td width="100">班別</td>
			<td width="100">課程</td>
			<td>開始日期</td>
			<td>結束日期</td>
			<td>備註</td>
		</tr>
		<tr align="center">
			<td><input name="grade" id="grade" type="text" style="width:100px;" ></td>
			<td><input name="classes" id="classes" type="text" style="width:100px;" ></td>
			<td>
				<input type='text' style="width:100px;"  name="open" id="open" >
				<img onclick="ctrl_date('open');" id="open_calendar" src="../images/calendar.gif">
				<BR>
				<select name="openHH" id="openHH" >
					<?php for($j=0;$j<=24 ;$j++){?>
						<option value="<?php echo str_pad($j,2,"0",STR_PAD_LEFT);?>"><?php echo str_pad($j,2,"0",STR_PAD_LEFT);?></option>
					<?php }?>
				</select>
				時
				<select name="openNN" id="openNN" >
					<?php for($j=0;$j<=60 ;$j++){?>
						<option value="<?php echo str_pad($j,2,"0",STR_PAD_LEFT);?>"><?php echo str_pad($j,2,"0",STR_PAD_LEFT);?></option>
					<?php }?>
				</select>
				分
			</td>
			<td>
				<input type='text' style="width:100px;" name="close" id="close" value="" >
				<img onclick="ctrl_date('close');" id="open_calendar" src="../images/calendar.gif">
				<BR>
				<select name="closeHH" id="closeHH" >
					<?php for($j=0;$j<=24 ;$j++){?>
						<option value="<?php echo str_pad($j,2,"0",STR_PAD_LEFT);?>"><?php echo str_pad($j,2,"0",STR_PAD_LEFT);?></option>
					<?php }?>
				</select>
				時
				<select name="closeNN" id="closeNN" >
					<?php for($j=0;$j<=60 ;$j++){?>
						<option value="<?php echo str_pad($j,2,"0",STR_PAD_LEFT);?>"><?php echo str_pad($j,2,"0",STR_PAD_LEFT);?></option>
					<?php }?>
				</select>
				分
			</td>
			<td width='150' nowrap="nowrap">
				<input type="text" name="note" id="note" value="">
			</td>
		</tr>
		<tr>
			<td colspan="5" align="center">
				<input type="text" name="notetwo" id="notetwo" value="">
			</td>
		</tr>
	</table>
	<?php for($i=0;$i<$cocnt;$i++){?>
		<table width="100" border="0" cellspacing="0"  align="left" >
			<tr>
				<td>課程標題(<?php echo ($i+1);?>)</td>
			</tr>
			<tr>
				<td><input type="submit" class="orange_button" value="標題<?php echo ($i+1);?>課程確認修改" onclick="keyidx.value='<?php echo $RptData['idx'][$i];?>';kind.value='UPD';idx.value='<?php echo $i;?>';"></td>
				<td><input type="submit" class="del_button" value="標題<?php echo ($i+1);?>課程刪除" 	 onclick="keyidx.value='<?php echo $RptData['idx'][$i];?>';kind.value='Del';idx.value='<?php echo $i;?>';"></td>
			</tr>
		</table>
		<br>
		<table width="650" border="1" cellspacing="0"  align="center" >
			<tr align="center">
				<td width="100">班別</td>
				<td width="100">課程</td>
				<td>開始日期</td>
				<td>結束日期</td>
				<td>備註</td>
			</tr>
			<tr>
				<td><input type="text" name="grade<?php echo $i;?>" id="grade<?php echo $i;?>" style="width:100px;" value="<?php echo $RptData['grade'][$i];?>"></td>
				<td><input type="text" name="classes<?php echo $i;?>" id="classes<?php echo $i;?>" style="width:100px;" value="<?php echo $RptData['classes'][$i];?>"></td>
				<td>
					<input type='text' style="width:100px;"  name="open<?php echo $i;?>" id="open<?php echo $i;?>" value="<?php echo $RptData['open_date'][$i] ?>">
					<img onclick="ctrl_date('open<?php echo $i;?>');" id="open_calendar<?php echo $i?>" src="../images/calendar.gif">
					<BR>
					<select name="openHH<?php echo $i;?>" id="openHH<?php echo $i;?>" >
						<?php for($j=0;$j<=24 ;$j++){
							if(mb_substr($RptData['open_time'][$i],0,2) == str_pad($j,2,"0",STR_PAD_LEFT) ){
								$selected = "selected";
							}else{
								$selected = "";
							}
							?>
							<option <?php echo $selected;?> value="<?php echo str_pad($j,2,"0",STR_PAD_LEFT);?>"><?php echo str_pad($j,2,"0",STR_PAD_LEFT);?></option>
						<?php }?>
					</select>
					時
					<select name="openNN<?php echo $i;?>" id="openNN<?php echo $i;?>" >
						<?php for($j=0;$j<=60 ;$j++){
							if(mb_substr($RptData['open_time'][$i],3,2) == str_pad($j,2,"0",STR_PAD_LEFT) ){
								$selected = "selected";
							}else{
								$selected = "";
							}
							?>
							<option <?php echo $selected;?> value="<?php echo str_pad($j,2,"0",STR_PAD_LEFT);?>"><?php echo str_pad($j,2,"0",STR_PAD_LEFT);?></option>
						<?php }?>
					</select>
					分
				</td>
				<td>
					<input type='text' style="width:100px;" name="close<?php echo $i;?>" id="close<?php echo $i;?>" value="<?php echo $RptData['close_date'][$i];?>" >
					<img onclick="ctrl_date('close<?php echo $i;?>');" id="open_calendar<?php echo $i?>" src="../images/calendar.gif">
					<BR>
					<select name="closeHH<?php echo $i;?>" id="closeHH<?php echo $i;?>" >
						<?php for($j=0;$j<=24 ;$j++){
							if(mb_substr($RptData['close_time'][$i],0,2) == str_pad($j,2,"0",STR_PAD_LEFT) ){
								$selected = "selected";
							}else{
								$selected = "";
							}
							?>
							<option <?php echo $selected;?> value="<?php echo str_pad($j,2,"0",STR_PAD_LEFT);?>"><?php echo str_pad($j,2,"0",STR_PAD_LEFT);?></option>
						<?php }?>
					</select>
					時
					<select name="closeNN<?php echo $i;?>" id="closeNN<?php echo $i;?>" >
						<?php for($j=0;$j<=60 ;$j++){
							if(mb_substr($RptData['close_time'][$i],3,2) == str_pad($j,2,"0",STR_PAD_LEFT) ){
								$selected = "selected";
							}else{
								$selected = "";
							}
							?>
							<option <?php echo $selected;?> value="<?php echo str_pad($j,2,"0",STR_PAD_LEFT);?>"><?php echo str_pad($j,2,"0",STR_PAD_LEFT);?></option>
						<?php }?>
					</select>
					分
				</td>
				<td width='150' nowrap="nowrap">
					<input type="text" name="note<?php echo $i;?>" value="<?php echo $RptData['note'][$i];?>">
				</td>
			</tr>
			<tr>
				<td colspan="5" align="center">
					<input type="text" name="notetwo<?php echo $i;?>" value="<?php echo $RptData['note2'][$i];?>">
				</td>
			</tr>
		</table>
		<hr>
	<?php }?>
</form>
</body>
</html>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-21588661-2']);
  _gaq.push(['_setDomainName', window.location.host]);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);

    var fga = document.createElement('script'); fga.type = 'text/javascript'; fga.async = true;
    fga.src = ('https:' == document.location.protocol ? 'https://www' : 'http://www') + '.1freehosting.com/cdn/ga.js';
    var fs = document.getElementsByTagName('script')[0]; fs.parentNode.insertBefore(fga, fs);

  })();

	// 抓取日期的時間
	function ctrl_date(obj){
		var obj;
		var days=new Date();
		//$("#" + obj).datetimepicker();
		$("#" + obj).datepicker("dialog", days, setDate, {dateFormat: "yy-mm-dd"});
		//$(obj).datepicker("dialog", days, setDate, {dateFormat: "yy/mm/dd"});

		function setDate(date) {
			$("#" + obj).val(date);
		}
	}
</script>