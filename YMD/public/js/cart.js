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

	var table = document.getElementById('cartlist'); // 购物车表格
	var selectInputs = document.getElementsByClassName('check'); // 所有勾选框
	var checkAllInputs = document.getElementsByClassName('check-all'); // 全选框
	var tr = document.getElementsByClassName('foodtr'); //每行商品
	var priceTotal = document.getElementById('priceTotal'); //总计

	// 点击选择框
	for(var i = 0; i < selectInputs.length; i++ ){
		selectInputs[i].onclick = function () {
			if (this.className.indexOf('check-all') >= 0) { //如果是全选，则吧所有的选择框选中
				for (var j = 0; j < selectInputs.length; j++) {
					selectInputs[j].checked = this.checked;
				}
			}
			if (!this.checked) { //只要有一个未勾选，则取消全选框的选中状态
				for (var i = 0; i < checkAllInputs.length; i++) {
					checkAllInputs[i].checked = false;
				}
			}
			getTotal();//选完更新总计
		}
	}

	// 更新总数和总价格
	function getTotal() {
		var selected= 0, price = 0;
		for (var i = 0; i < tr.length; i++) {
			if (tr[i].getElementsByTagName('input')[0].checked) {
				selected += parseInt(tr[i].getElementsByTagName('input')[1].value); //计算已选商品数目
				price += parseFloat(tr[i].getElementsByTagName('span')[1].innerHTML); //计算总计价格
			}
		}
		priceTotal.innerHTML = price.toFixed(2); // 总价
	}

	//为每行元素添加事件
	for (var i = 0; i < tr.length; i++) {
		//将点击事件绑定到tr元素
		tr[i].onclick = function (e) {
			var e = e || window.event;
			var el = e.target || e.srcElement;//通过事件对象的target属性获取触发元素
			var cls = el.className; //触发元素的class
			//alert(cls);
			var proid = this.getElementsByTagName('p')[0].innerHTML;//商品id
			var userid = this.getElementsByTagName('p')[1].innerHTML;//用户id
			var countInout = this.getElementsByTagName('input')[1]; // 数目input
			var value = parseInt(countInout.value); //数目
			//通过判断触发元素的class确定用户点击了哪个元素
			switch (cls) {
				case 'glyphicon glyphicon-plus':
				case 'btn btn-default btn-sm add': //点击了加号
					countInout.value = value + 1;
					var newnum=countInout.value;
					getSubtotal(this);
					changenum(newnum,proid,userid);
					break;
				case 'glyphicon glyphicon-minus':
				case 'btn btn-default btn-sm reduce': //点击了减号
					if (value > 1) {
						countInout.value = value - 1;
						var newnum=countInout.value;
						getSubtotal(this);
						changenum(newnum,proid,userid);
					}
					break;
				case 'glyphicon glyphicon-trash': 
				case 'btn btn-danger btn-sm delete': //点击了删除
					var conf = confirm('确定删除此商品吗？');
					if (conf) {
						this.parentNode.removeChild(this);
						deletepro(proid,userid);
					}
					break;
			}
			getTotal();
		}
	}

	// 计算单行价格
	function getSubtotal(tr) {
		var price = tr.getElementsByTagName('span')[0]; //单价
		var subtotal = tr.getElementsByTagName('span')[1]; //小计td
		var countInput = tr.getElementsByTagName('input')[1]; //数目input
		//写入HTML
		subtotal.innerHTML = (parseInt(countInput.value) * parseFloat(price.innerHTML)).toFixed(2);
	}

	//修改购物车商品数量
	function changenum(newnum,proid,userid){
		//alert('change'+newnum+'proid:'+proid+'userid'+userid);
		var url = "/index.php/Home/Shop/ChangeCart";
		var data = {"proid":proid,"pronum":newnum,"userid":userid};
		var success = function(dataReturn){
			if(dataReturn.status){
				//var str = dataReturn.info;
				//alert(str);
			}else{
				alert('修改失败');
			}
		};
		$.post(url,data,success,"json");
	}

	//删除购物车商品
	function deletepro(proid,userid){
		//alert(proid+'and'+userid);
		var url = "/index.php/Home/Shop/DeleteCart";
		var data = {"proid":proid,"userid":userid};
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


	//将选中的商品加入订单
	function getProduct() {
		var selected = new Array();

		for (var i = 0; i < tr.length; i++) {
			if (tr[i].getElementsByTagName('input')[0].checked) {
				selected.push(tr[i].getElementsByTagName('p')[2].innerHTML); //已选购物车id
			}
		}
		return selected;
	}

	$('#CartToOrder').on('click',CartToOrder);

	function CartToOrder(){
		var cartid = getProduct();

		//alert(cartid);

		var url = "/index.php/Home/Shop/CartToOrder";
		var data = {"cartid":cartid,"totalprice":priceTotal.innerHTML};
		var success = function(dataReturn){
			if(dataReturn.status){
				var str = dataReturn.info;
				alert(str);
				window.location.href=dataReturn.url;
			}else{
				alert('加入失败');
			}
		};
		$.post(url,data,success,"json");
	}
};