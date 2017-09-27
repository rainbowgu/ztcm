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

	var myalltr = document.getElementsByClassName('myalor') //每行全部订单
	var myunfinishtr = document.getElementsByClassName('myunor'); //每行未完成订单

	//为每行元素添加事件
	for (var i = 0; i < myalltr.length; i++) {
		//将点击事件绑定到tr元素
		myalltr[i].onclick = function (e) {
			var e = e || window.event;
			var el = e.target || e.srcElement;//通过事件对象的target属性获取触发元素
			var cls = el.className; //触发元素的class
			//alert(cls);
			var ordernum = this.getElementsByTagName('span')[0].innerHTML;//订单号
			
			//通过判断触发元素的class确定用户点击了哪个元素
			switch (cls) {
				case 'btn btn-danger btn-xs': //点击了退款
					var conf = confirm('确定申请退款吗？');
					if (conf) {
						myrtpay(ordernum);
					}
					break;
				
				case 'btn btn-primary btn-xs': //点击了确认收货
					mycheckbag(ordernum);
					break;

				case 'btn btn-success btn-xs': //点击了评价
					mywrcomment(ordernum);
					break;

				case 'btn btn-warning btn-xs': //点击了付款
					mytopay(ordernum);
					break;
			}
		}
	}

	//为每行元素添加事件
	for (var i = 0; i < myunfinishtr.length; i++) {
		//将点击事件绑定到tr元素
		myunfinishtr[i].onclick = function (e) {
			var e = e || window.event;
			var el = e.target || e.srcElement;//通过事件对象的target属性获取触发元素
			var cls = el.className; //触发元素的class
			//alert(cls);
			var ordernum = this.getElementsByTagName('span')[0].innerHTML;//订单号
			
			//通过判断触发元素的class确定用户点击了哪个元素
			switch (cls) {
				case 'btn btn-danger btn-xs': //点击了退款
					//alert(ordernum);
					var conf = confirm('确定申请退款吗？');
					if (conf) {
						myrtpay(ordernum);
					}
					break;
				
				case 'btn btn-primary btn-xs': //点击了确认收货
					mycheckbag(ordernum);
					break;

				case 'btn btn-success btn-xs': //点击了评价
					mywrcomment(ordernum);
					break;

				case 'btn btn-warning btn-xs': //点击了付款
					mytopay(ordernum);
					break;
			}
		}
	}

	//申请退款
	function myrtpay(ordernum){
		//alert('change'+newnum+'proid:'+proid+'userid'+userid);
		var url = "/index.php/Home/User/myReturnPay";
		var data = {"ordernum":ordernum};
		var success = function(dataReturn){
			if(dataReturn.status){
				//var str = dataReturn.info;
				//alert(str);
				window.location.reload();
			}else{
				alert('申请失败');
			}
		};
		$.post(url,data,success,"json");
	}

	//确认收货
	function mycheckbag(ordernum){
		//alert(proid+'and'+userid);
		var url = "/index.php/Home/User/myCheckBag";
		var data = {"ordernum":ordernum};
		var success = function(dataReturn){
			if(dataReturn.status){
				//var str = dataReturn.info;
				//alert(str);
				window.location.reload();
			}else{
				alert('确认失败');
			}
		};
		$.post(url,data,success,"json");
	}

	//评价商品
	function mywrcomment(ordernum){
		//alert(proid+'and'+userid);
		var url = "/index.php/Home/User/myWriteComment";
		var data = {"ordernum":ordernum};
		var success = function(dataReturn){
			if(dataReturn.status){
				var str = dataReturn.info;
				alert(str);
			}else{
				alert('评价失败');
			}
		};
		$.post(url,data,success,"json");
	}

	//付款
	function mytopay(ordernum){
		//alert(proid+'and'+userid);
		var url = "/index.php/Home/User/myToPay";
		var data = {"ordernum":ordernum};
		var success = function(dataReturn){
			if(dataReturn.status){
				var str = dataReturn.info;
				alert(str);
			}else{
				alert('付款失败');
			}
		};
		$.post(url,data,success,"json");
	}
};