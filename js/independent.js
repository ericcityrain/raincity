window.onload=function(){
function $(id){return document.getElementById(id)}
	var menu=$("topTags").getElementsByTagName("ul")[0];//頂部的選單
	var tags=menu.getElementsByTagName("li");//頂部的選單
	var ck=$("leftMenu").getElementsByTagName("ul")[0].getElementsByTagName("li");//左侧菜单
	
	var j;
	//点击左侧菜单增加新标签
	for(i=0;i<ck.length;i++){
		ck[i].onclick=function(){
		$("welcome").style.display="none"//欢迎内容隐藏
		clearMenu();
		this.style.background='url(images/tabbg02.gif)'
		//循环取得当前索引
		for(j=0;j<8;j++){
			if(this==ck[j]){
				if($("p"+j)==null){
					openNew(j,this.innerHTML);//设置标签显示文字
				}
				clearStyle();
				$("p"+j).style.background='url(images/tabbg1.gif)';
				clearContent();
				$("c"+j).style.display="block";
			}
			}
			return false;
		}
	}
	//增加或删除标签
	function openNew(id,name){
		var tagMenu=document.createElement("li");
		tagMenu.id="p"+id;
		tagMenu.innerHTML=name+"&nbsp;&nbsp;"+"<img src='images/off.gif' style='vertical-align:middle'/>";
		//标签点击事件
		tagMenu.onclick=function(evt){
			clearMenu();
			ck[id].style.background='url(images/tabbg02.gif)'
			clearStyle();
			tagMenu.style.background='url(images/tabbg1.gif)';
			clearContent();
			$("c"+id).style.display="block";
		}
		//标签内关闭图片点击事件
		tagMenu.getElementsByTagName("img")[0].onclick=function(evt){
			evt=(evt)?evt:((window.event)?window.event:null);
			if(evt.stopPropagation){evt.stopPropagation()} //取消opera和Safari冒泡行为;
			this.parentNode.parentNode.removeChild(tagMenu);//删除当前标签
			var color=tagMenu.style.backgroundColor;
			//设置如果关闭一个标签时，让最后一个标签得到焦点
			if(color=="#ffff00"||color=="yellow"){//区别浏览器对颜色解释
			if(tags.length-1>=0){
				clearStyle();
				tags[tags.length-1].style.background='url(images/tabbg1.gif)';
				clearContent();
				var cc=tags[tags.length-1].id.split("p");
				$("c"+cc[1]).style.display="block";
				clearMenu();
				ck[cc[1]].style.background='url(images/tabbg1.gif)';
			}
			else{
				clearContent();
				clearMenu();
				$("welcome").style.display="block"
				}
			}
		}
		menu.appendChild(tagMenu);
	}
	//清除菜单样式
	function clearMenu(){
		for(i=0;i<ck.length;i++){
			ck[i].style.background='url(images/tabbg01.gif)';
		}
	}
	//清除标签样式
	function clearStyle(){
		for(i=0;i<tags.length;i++){
			menu.getElementsByTagName("li")[i].style.background='url(images/tabbg2.gif)';
		}
	}
	//清除内容
	function clearContent(){
		for(i=0;i<6;i++){
			$("c"+i).style.display="none";
		}
	}
}

