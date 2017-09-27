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

	var tr = document.getElementsByClassName('revitr'); //每行商品

	//为每行元素添加事件
	for (var i = 0; i < tr.length; i++) {
		//将点击事件绑定到tr元素
		tr[i].onclick = function (e) {
			var e = e || window.event;
			var el = e.target || e.srcElement;//通过事件对象的target属性获取触发元素
			var cls = el.className; //触发元素的class
			//alert(cls);
			var shopid = this.getElementsByTagName('p')[0].innerHTML;//店铺id
			//通过判断触发元素的class确定用户点击了哪个元素
			switch (cls) {
				case 'glyphicon glyphicon-ok':
				case 'btn btn-success btn-sm pull-right shoppass': //点击了通过
					changesug(shopid);
					this.parentNode.removeChild(this);
					break;
				case 'glyphicon glyphicon-remove': 
				case 'btn btn-danger btn-sm pull-right btnmarlt15 dele': //点击了删除
					var conf = confirm('确定删除此店铺吗？');
					if (conf) {
						this.parentNode.removeChild(this);
						deleteshop(shopid);
					}
					break;
			}
		}
	}

	//修改店铺状态
	function changesug(shopid){
		//alert('change'+newnum+'proid:'+proid+'userid'+userid);
		var url = "/index.php/Admin/Shop/ChangeShopsug";
		var data = {"shopid":shopid};
		var success = function(dataReturn){
			if(dataReturn.status){
				var str = dataReturn.info;
				alert(str);
			}else{
				alert('修改失败');
			}
		};
		$.post(url,data,success,"json");
	}

	//删除店铺审核申请
	function deleteshop(shopid){
		//alert(proid+'and'+userid);
		var url = "/index.php/Admin/Shop/DeleteShop";
		var data = {"shopid":shopid};
		var success = function(dataReturn){
			if(dataReturn.status){
				var str = dataReturn.info;
				alert(str);
			}else{
				alert('删除失败');
			}
		};
		$.post(url,data,success,"json");
	}
};