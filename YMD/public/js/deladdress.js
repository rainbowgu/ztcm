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

	var tr = document.getElementsByClassName('adrlttr'); //每行商品

	//为每行元素添加事件
	for (var i = 0; i < tr.length; i++) {
		//将点击事件绑定到tr元素
		tr[i].onclick = function (e) {
			var e = e || window.event;
			var el = e.target || e.srcElement;//通过事件对象的target属性获取触发元素
			var cls = el.className; //触发元素的class
			//alert(cls);
			var adrid = this.getElementsByTagName('span')[0].innerHTML;//地址id
			var status = this.getElementsByTagName('p')[1].innerHTML;//商品状态
			//alert(adrid+'and'+status);

			//通过判断触发元素的class确定用户点击了哪个元素
			switch (cls) {
				case 'glyphicon glyphicon-trash': 
				case 'btn btn-danger btn-xs pull-right mar-lft10 deladr': //点击了删除
					var conf = confirm('确定删除此地址吗？');
					if (conf) {
						this.parentNode.removeChild(this);
						deleteadr(adrid,status);
					}
					break;
			}
		}
	}

	//删除地址
	function deleteadr(adrid,status){
		//alert(proid+'and'+userid);
		var url = "/index.php/Home/User/DeleteAddr";
		var data = {"adrid":adrid,"status":status};
		var success = function(dataReturn){
			if(dataReturn.status){
				var str = dataReturn.info;
				var ref = dataReturn.refresh;
				alert(str);
				if(ref){
					window.location.reload();
				}
			}else{
				alert('删除失败');
			}
		};
		$.post(url,data,success,"json");
	}
};