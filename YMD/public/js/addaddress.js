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

	var selectInputs = document.getElementsByTagName('input')[3]; //勾选框
	var defa=document.getElementsByTagName('input')[4];//是否为默认

	// 点击选择框
	selectInputs.onclick = function () {
		if (selectInputs.checked) {
			defa.value=1;
			//def=selectInputs.value;
			//alert(def);
		}else{
			defa.value=0;
			//def=selectInputs.value;
			//alert(def);
		}
	}
};