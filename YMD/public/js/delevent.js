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

	var tr = document.getElementsByClassName('eventtr'); //每行活动

	//为每行元素添加事件
	for (var i = 0; i < tr.length; i++) {
		//将点击事件绑定到tr元素
		tr[i].onclick = function (e) {
			var e = e || window.event;
			var el = e.target || e.srcElement;//通过事件对象的target属性获取触发元素
			var cls = el.className; //触发元素的class
			//alert(cls);
			var eventid = this.getElementsByTagName('p')[0].innerHTML;//店铺id
			//通过判断触发元素的class确定用户点击了哪个元素
			switch (cls) {
				case 'glyphicon glyphicon-trash': 
				case 'btn btn-danger btn-sm pull-right btnmarlt15 deleve': //点击了删除
					var conf = confirm('确定删除此活动吗？');
					if (conf) {
						this.parentNode.removeChild(this);
						deleteevent(eventid);
					}
					break;
			}
		}
	}

	//删除活动
	function deleteevent(eventid){
		//alert(proid+'and'+userid);
		var url = "/index.php/Admin/Shop/DeleteEvent";
		var data = {"eventid":eventid};
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