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

	var tr = document.getElementsByClassName('prolttr'); //每行商品

	//为每行元素添加事件
	for (var i = 0; i < tr.length; i++) {
		//将点击事件绑定到tr元素
		tr[i].onclick = function (e) {
			var e = e || window.event;
			var el = e.target || e.srcElement;//通过事件对象的target属性获取触发元素
			var cls = el.className; //触发元素的class
			//alert(cls);
			var proid = this.getElementsByTagName('p')[0].innerHTML;//商品id
			var status = this.getElementsByTagName('span')[3];//商品状态
			//通过判断触发元素的class确定用户点击了哪个元素
			switch (cls) {
				case 'glyphicon glyphicon-trash': 
				case 'btn btn-danger btn-xs mar-lft10 delpro': //点击了删除
					var conf = confirm('确定删除此商品吗？');
					if (conf) {
						this.parentNode.removeChild(this);
						deletepro(proid);
					}
					break;
				case 'btn btn-success btn-xs mar-rgt10 profull': //点击了上新
					var info=status.innerHTML;
					proputup(proid);
					break;
				case 'btn btn-danger btn-xs mar-rgt10 proempty': //点击了售罄
					var info=status.innerHTML;
					//alert(info);
					proputdown(proid);
					break;
			}
		}
	}

	//删除店铺
	function deletepro(proid){
		//alert(proid+'and'+userid);
		var url = "/index.php/Home/User/DeleteProduct";
		var data = {"proid":proid};
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

	//上新
	function proputup(proid){
		//alert(proid+'and'+userid);
		var url = "/index.php/Home/User/UpProduct";
		var data = {"proid":proid};
		var success = function(dataReturn){
			if(dataReturn.status){
				//var str = dataReturn.info;
				//alert(str);
				window.location.reload();
			}else{
				alert('上新失败');
			}
		};
		$.post(url,data,success,"json");
	}

	//下架
	function proputdown(proid){
		//alert(proid+'and'+userid);
		var url = "/index.php/Home/User/DownProduct";
		var data = {"proid":proid};
		var success = function(dataReturn){
			if(dataReturn.status){
				//var str = dataReturn.info;
				//alert(str);
				window.location.reload();
			}else{
				alert('下架失败');
			}
		};
		$.post(url,data,success,"json");
	}
};