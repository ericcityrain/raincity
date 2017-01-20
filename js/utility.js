// 撈取ajax物件
/*
function createXMLHttpRequert(){
	var XHR;
	if (window.XMLHttpRequest){ // code for all new browsers 
		XHR= new XMLHttpRequest();
	}else if (window.ActiveXObject){ // code for IE5 and IE6 
		XHR= new ActiveXObject("Microsoft.XMLHTTP");
	}
	return XHR;
}

function handleStateChange(){
	if(XHR.readyState==4){
		if(XHR.status==200){
			document.getElementById("span1").innerHTML= XHR.responseText;
		}else{
			window.alert("檔案開啟錯誤");
		}
		
	}
}
function startRequest(url){
	XHR = createXMLHttpRequert();
	XHR.open("GET",url);
	XHR.onreadystatechange = handleStateChange;
	XHR.send(null);
}

function handleStateChange(){
	if(XHR.readyState==4){
		if(XHR.status==200){
			document.getElementById("span1").innerHTML= XHR.responseText;
		}else{
			window.alert("檔案開啟錯誤");
		}
	}
}*/
// 撈取ajax物件
function createXMLHttpRequert(){
	var XHR;
	if (window.XMLHttpRequest){ // code for all new browsers 
		XHR= new XMLHttpRequest();
	}else if (window.ActiveXObject){ // code for IE5 and IE6 
		XHR= new ActiveXObject("Microsoft.XMLHTTP");
	}
	return XHR;
}

function startRequest(url,method,idname){
	
	XHR = createXMLHttpRequert();
	XHR.open(method,url);
	XHR.onreadystatechange = function() {
		if (XHR.readyState == 4 ) {
			if(XHR.status == 200){
				document.getElementById(idname).value = XHR.responseText;
			}else{
				window.alert("檔案開啟錯誤");
			}
		}
	};
	XHR.send(null);
}

function handleStateChange(){
	if(XHR.readyState==4){
		if(XHR.status==200){
			document.getElementById("span1").innerHTML= XHR.responseText;
		}else{
			window.alert("檔案開啟錯誤");
		}
	}
}