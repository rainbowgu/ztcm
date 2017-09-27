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

	var tr = document.getElementsByClassName('shoplttr'); //每行商品

	//为每行元素添加事件
	for (var i = 0; i < tr.length; i++) {
		//将点击事件绑定到tr元素
		tr[i].onclick = function (e) {
			var e = e || window.event;
			var el = e.target || e.srcElement;//通过事件对象的target属性获取触发元素
			var cls = el.className; //触发元素的class
			//alert(cls);
			var shopid = this.getElementsByTagName('span')[0].innerHTML;//店铺id
			var status = this.getElementsByTagName('button')[0];//店铺状态按钮
			//通过判断触发元素的class确定用户点击了哪个元素
			switch (cls) {
				case 'glyphicon glyphicon-trash': 
				case 'btn btn-danger btn-xs pull-right mar-lft10 delshop': //点击了删除
					var conf = confirm('确定删除此店铺吗？');
					if (conf) {
						this.parentNode.removeChild(this);
						deleteshop(shopid);
					}
					break;
				case 'btn btn-success btn-xs opn': //点击了开始营业
					openshop(shopid);
					break;
				case 'btn btn-danger btn-xs clo': //点击了停止营业
					closeshop(shopid);
					break;
			}
		}
	}

	//删除店铺
	function deleteshop(shopid){
		//alert(proid+'and'+userid);
		var url = "/index.php/Home/User/DeleteShop";
		var data = {"shopid":shopid};
		var success = function(dataReturn){
			if(dataReturn.status){
				//var str = dataReturn.info;
				//alert(str);
			}else{
				alert('删除失败');
			}
		};
		$.post(url,data,success,"json");
	}

	//开始营业
	function openshop(shopid){
		//alert(proid+'and'+userid);
		var url = "/index.php/Home/User/OpenShop";
		var data = {"shopid":shopid};
		var success = function(dataReturn){
			if(dataReturn.status){
				//var str = dataReturn.info;
				//alert(str);
				window.location.reload();
			}else{
				alert('停止失败');
			}
		};
		$.post(url,data,success,"json");
	}

	//关闭营业
	function closeshop(shopid){
		//alert(proid+'and'+userid);
		var url = "/index.php/Home/User/CloseShop";
		var data = {"shopid":shopid};
		var success = function(dataReturn){
			if(dataReturn.status){
				//var str = dataReturn.info;
				//alert(str);
				window.location.reload();
			}else{
				alert('停止失败');
			}
		};
		$.post(url,data,success,"json");
	}
};