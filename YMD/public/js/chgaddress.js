window.onload = function () {
	if (!document.getElementsByClassName) {
		document.getElementsByClassName = function (cls) {
			var ret = [];
			var els = document.getElementsByTagName('*');
			for (var i = 0, len = els.length; i < len; i++) {

				if (els[i].className.indexOf(cls + ' ') >=0 || els[i].className.indexOf(' ' + cls + ' ') >=0 || els[i].className.indexOf(' ' + cls) >=0) {
					ret.push(els[i]);
				}
			}
			return ret;
		}
	}

	var selectInput = document.getElementsByTagName('input')[4]; //勾选框
	var def=document.getElementsByTagName('input')[5];//是否为默认

	// 点击选择框
	selectInput.onclick = function () {
		if (selectInput.checked) {
			def.value=1;
			alert(def.value);
		}else{
			def.value=0;
			alert(def.value);
		}
	}
};