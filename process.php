<?php 
	
	// 抓取欲修改的數值
	@$idx = $_REQUEST["idx"];
	// 抓取是新增/修改/刪除的類型
	@$state = $_POST["state"];
	@$action_link = $_POST["action_link"];

	switch($action_link){

		case "news":
			switch ($state){
				case "Upd":
					echo "123";
					$sql="Update latest_news set content =''";
					$query=mysql_query($sql);
					$data=mysql_fetch_array($query);
					$val['content'] = $data['content'];
					
					$sql="Update latest_news set content =''";
					$query=mysql_query($sql);
					$data=mysql_fetch_array($query);
					$val['content'] = $data['content'];
					
					
					
				break;
				case "INS":
				
				break;
			}
		break;
	}

?>