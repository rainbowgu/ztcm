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

	var spalltr = document.getElementsByClassName('spalor') //每行全部订单
	var spunfinishtr = document.getElementsByClassName('spunor'); //每行未完成订单

	//为每行元素添加事件
	for (var i = 0; i < spalltr.length; i++) {
		//将点击事件绑定到tr元素
		spalltr[i].onclick = function (e) {
			var e = e || window.event;
			var el = e.target || e.srcElement;//通过事件对象的target属性获取触发元素
			var cls = el.className; //触发元素的class
			//alert(cls);
			var ordernum = this.getElementsByTagName('span')[0].innerHTML;//订单号
			
			//通过判断触发元素的class确定用户点击了哪个元素
			switch (cls) {
				case 'btn btn-danger btn-xs': //点击了退款
					var conf = confirm('确定退款吗？');
					if (conf) {
						sprtpay(ordernum);
					}
					break;
				
				case 'btn btn-primary btn-xs': //点击了发货
					spsendbag(ordernum);
					break;
			}
		}
	}

	//为每行元素添加事件
	for (var i = 0; i < spunfinishtr.length; i++) {
		//将点击事件绑定到tr元素
		spunfinishtr[i].onclick = function (e) {
			var e = e || window.event;
			var el = e.target || e.srcElement;//通过事件对象的target属性获取触发元素
			var cls = el.className; //触发元素的class
			//alert(cls);
			var ordernum = this.getElementsByTagName('span')[0].innerHTML;//订单号
			
			//通过判断触发元素的class确定用户点击了哪个元素
			switch (cls) {
				case 'btn btn-danger btn-xs': //点击了退款
					var conf = confirm('确定退款吗？');
					if (conf) {
						sprtpay(ordernum);
					}
					break;
				
				case 'btn btn-primary btn-xs': //点击了发货
					spsendbag(ordernum);
					break;
			}
		}
	}

	//退款
	function sprtpay(ordernum){
		//alert('change'+newnum+'proid:'+proid+'userid'+userid);
		var url = "/index.php/Home/User/spReturnPay";
		var data = {"ordernum":ordernum};
		var success = function(dataReturn){
			if(dataReturn.status){
				var str = dataReturn.info;
				alert(str);
				window.location.reload();
			}else{
				alert('退款失败');
			}
		};
		$.post(url,data,success,"json");
	}

	//发货
	function spsendbag(ordernum){
		//alert(proid+'and'+userid);
		var url = "/index.php/Home/User/spSendBag";
		var data = {"ordernum":ordernum};
		var success = function(dataReturn){
			if(dataReturn.status){
				var str = dataReturn.info;
				alert(str);
				window.location.reload();
			}else{
				alert('发货失败');
			}
		};
		$.post(url,data,success,"json");
	}
};