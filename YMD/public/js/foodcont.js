$(function(){
	$('#numup').on('click',numup);
	$('#numdown').on('click',numdown);
	$('#addToCart').on('click',addToCart);
	function numup(){
		var foodnum = parseInt($('#foodnum').val());
		$('#foodnum').val(++foodnum);
	}

	function numdown(){
		var foodnum = parseInt($('#foodnum').val());
		if(foodnum<2) return;
		$('#foodnum').val(--foodnum);
	}

	function addToCart(){
		var pronum = parseInt($('#foodnum').val());
		
		var url = "/index.php/Home/Shop/addToCart";
		var data = {"proid":proid,"pronum":pronum,"shopid":shopid};
		var success = function(dataReturn){
			if(dataReturn.status){
				var str = dataReturn.info;
				alert(str);
			}else{
				alert('加入失败');
			}
		};
		$.post(url,data,success,"json");
	}
})