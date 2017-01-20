<?php 
// 各式簡易介紹內容
function get_content(&$val,$search,$idx){
	$sql="select * from `contents` where `idx`='{$search}'";
	$query=mysql_query($sql);
	$data=mysql_fetch_array($query);
	$val['content'] = $data['content'];
	
}

// 搜索最新消息
function get_news(&$val,$end_date,$endcnt,$state){
	$Connection ="";
	if($end_date > 0 or $state <> ""){
		$Connection =" Where 1=1";
		if($end_date > 0){
			$Connection = $Connection . " and `end_date` < '{$end_date}'";
		}
		if($state > 0){
			$Connection = $Connection . " and state ='{$state}'";
		}
	}
	
	$num = 0;
	$sql="select * from `latest_news` {$Connection}  order by start_date limit 0,{$endcnt}";
	$query=mysql_query($sql);
	while($RptData=mysql_fetch_array($query)){
		$val['idx'][$num]	 = $RptData['idx'];
		$val['title'][$num]	 = $RptData['title'];
		$val['content'][$num]	 = $RptData['content'];
		$val['start_date'][$num] = $RptData['start_date'];
		$val['end_date'][$num]   = $RptData['end_date'];
		$num++;
	}
	return $num;
}
// 搜索課程介紹
function course_list(&$val,$start_date,$end_date,$state){
	$num = 0;
	$Connection =" Where 1=1";

	if($state > 0){
		$Connection = $Connection . " and state ='{$state}'";
	}
	
	$sql="select * from `course` {$Connection} ";
	$query=mysql_query($sql);
	while($RptData=mysql_fetch_array($query)){
		$val['idx'][$num] 		 = $RptData['idx'];;		// 關鍵key
		$val['grade'][$num] 	 = $RptData['grade'];;		// 學級
		$val['classes'][$num] 	 = $RptData['classes'];;		// 課程
		$val['open_date'][$num]  = $RptData['open_date'];;	// 開課時間
		$val['open_time'][$num]  = $RptData['open_time'];;	// 開課時間
		$val['close_date'][$num] = $RptData['close_date'];;	// 結束時間
		$val['close_time'][$num] = $RptData['close_time'];;	// 結束時間
		$val['note'][$num] 		 = $RptData['note'];;			// 備註1
		$val['note2'][$num] 	 = $RptData['note2'];;		// 備註2
		$val['make_user'][$num]  = $RptData['make_user'];;	// 建置使用者
		$val['make_date'][$num]  = $RptData['make_date'];;	// 建置時間
		$num++;
	}
	return $num;
}
// 搜索圖檔
function serchfile(&$val,$file,$extension,$type,$state){
	$num=0;
	if($type <> "" or $state <> "" or $extension ){
		$Connection = "Where ";
		if($extension <> ""){
			$Connection = $Connection . " extension ='".$extension."' and";
		}
		if($state <> ""){
			$Connection = $Connection . " state ='".$state."' and";
		}
		if($type <> ""){
			$Connection = $Connection . " type ='".$type."' and";
		}
		if($file <> ""){
			$Connection = $Connection . " name ='".$file."' and";
		}
		$Connection = substr($Connection, 0, -3);
	}
	
	
	$sql="select * from `img_list` {$Connection} order by name ";
	$query=mysql_query($sql);
	while($data=mysql_fetch_array($query)){
		$val['name'][$num]		= $data['name'];
		$val['extension'][$num] = $data['extension'];
		$val['type'][$num] 		= $data['type'];
		$val['state'][$num] 	= $data['state'];
		$val['content'][$num]	= $data['content'];
		$num++;
	}
	return $num;
}

// 各區塊靜態顯示欄位
function showadmin($state,$path){
	
	switch($state){
		case "lastest_news":
			require($path."news.php");
		break;
		case "course":
			require($path."course.php");
		break;
		case "gold_list":
			require($path."gold_list.php");
		break;
		case "contact_us":
			require($path."contact_us.php");
		break;
		case "kam_set":
			require($path."kam_set.php");
		break;
		case "staffadmin":
			require($path."staffadmin.php");
		break;
		default :
			require($path."news.php");
		break;

	}
}

function imgt_type($search){
	switch($search){
		case "gold":
			return "榮譽金榜";
		break;
		
		
	}
	
}
?>