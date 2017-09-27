
function shenqin(id,method){
	//alert(id);
	location.href="index.php?c=product&m="+method+"&id="+id;
}



function checklogin(){
   var loginid = document.getElementById("loginid").value;
   var loginpwd = document.getElementById("loginpwd").value;

   if(loginid == ""  ){
     alert("账号不能为空");
     return false;
   }
   if(loginpwd == ""  ){
      alert("密码不能为空");
      return false;
   }
  document.getElementById("login").submit();
}

function proadd(){
	 document.getElementById("proaddact").submit();
}

function checkregister(){
   var username = document.getElementById("username").value;
   var password = document.getElementById("password").value;
   var repassword = document.getElementById("repassword").value;
   
   var tel = document.getElementById("tel").value;
   var rules = /^1[3|4|5|7|8]\d{9}$/;
 
   if(username == ""  ){
     alert("昵称不能为空");
     return false;
   }
 
   if(password == "" && repassword == ""){
      alert("密码不能为空");
      return false;
   }
   if(password != repassword   ){
      alert("两次输入密码不一致");
      return false;
   }
   if(!rules.test(tel)){
    alert("手机号不正确");
    return false;
  }
  document.getElementById("register").submit();
}



function checkchgmyinfo(){
   var username = document.getElementById("username").value;
   var company = document.getElementById("company").value;
   var position = document.getElementById("position").value;
   var tel = document.getElementById("tel").value;
  

   if(username == ""  ){
     alert("昵称不能为空");
     return false;
   }
   if(company == ""  ){
     alert("公司不能为空");
     return false;
   }

   if(position == "" ){
      alert("职位不能为空");
      return false;
   }

   if(tel == ""   ){
      alert("手机号码不能为空");
      return false;
   }
   
  document.getElementById("chgmyinfo").submit();
}
function checkbank(){
	   var bank = document.getElementById("bank").value;
	   var address = document.getElementById("address").value;
	   var num = document.getElementById("num").value;
	   var name = document.getElementById("name").value;
	   if(bank == ""  ){
	     alert("收款人银行不能为空");
	     return false;
	   }
	   if(address == ""){
	      alert("开户行名称不能为空");
	      return false;
	   }
	   if(num == ""   ){
	      alert("银行卡卡号不能为空");
	      return false;
	   }
	   if(name == ""   ){
		      alert("银行卡卡号不能为空");
		      return false;
		   }

	  document.getElementById("chgbank").submit();
	}
function checkchgpwd(){
   var oldpwd = document.getElementById("oldpwd").value;
   var userpwd1 = document.getElementById("userpwd1").value;
   var userpwd2 = document.getElementById("userpwd2").value;

   if(oldpwd == ""  ){
     alert("原密码不能为空");
     return false;
   }
   if(userpwd1 == "" && userpwd2 == ""){
      alert("新密码不能为空");
      return false;
   }
   if(userpwd2 != userpwd1   ){
      alert("两次输入密码不一致");
      return false;
   }

  document.getElementById("chgpwd").submit();
}

function checkaddevent(){
   var title = document.getElementById("event-title").value;
   var content = document.getElementById("event-content").value;
   var eventpic = document.getElementById("eventpic").value;
   var btime = document.getElementById("event-time1").value;
   var etime = document.getElementById("event-time2").value;
   var checktime = /^((?!0000)[0-9]{4}-((0[1-9]|1[0-2])-(0[1-9]|1[0-9]|2[0-8])|(0[13-9]|1[0-2])-(29|30)|(0[13578]|1[02])-31)|([0-9]{2}(0[48]|[2468][048]|[13579][26])|(0[48]|[2468][048]|[13579][26])00)-02-29)$/;

   if(title == ""  ){
      alert("标题不能为空");
      return false;
   }
   if (!checktime.test(btime)) {
      alert("起始日期不正确");
      return false;
   }
   if (!checktime.test(etime)) {
      alert("结束日期不正确");
      return false;
   }
   if(content == ""  ){
      alert("内容不能为空");
      return false;
   }
   if (eventpic == ""  ){
      alert("图片不能为空");
      return false;
   }
  document.getElementById("addevent").submit();
}

function checkchgevent(){
   var title = document.getElementById("event-title").value;
   var content = document.getElementById("event-content").value;
   var eventpic = document.getElementById("eventpic").value;
   var btime = document.getElementById("event-time1").value;
   var etime = document.getElementById("event-time2").value;
   var checktime = /^((?!0000)[0-9]{4}-((0[1-9]|1[0-2])-(0[1-9]|1[0-9]|2[0-8])|(0[13-9]|1[0-2])-(29|30)|(0[13578]|1[02])-31)|([0-9]{2}(0[48]|[2468][048]|[13579][26])|(0[48]|[2468][048]|[13579][26])00)-02-29)$/;

   if(title == ""  ){
      alert("标题不能为空");
      return false;
   }
   if (!checktime.test(btime)) {
      alert("起始日期不正确");
      return false;
   }
   if (!checktime.test(etime)) {
      alert("结束日期不正确");
      return false;
   }
   if(content == ""  ){
      alert("内容不能为空");
      return false;
   }
   if (eventpic == ""  ){
      alert("图片不能为空");
      return false;
   }
  document.getElementById("chgevent").submit();
}

function checkcart(){
  document.getElementById("checkcart").submit();
}

function checkaddproduct(){
   var proname = document.getElementById("proname").value;
   var protype = document.getElementById("protype").value;
   var propic = document.getElementById("propic").value;
   var price = document.getElementById("price").value;
   

   if(proname == ""  ){
     alert("商品名不能为空");
     return false;
   }
   if(protype == ""  ){
     alert("商品类型不能为空");
     return false;
   }
  if(!(/^\d+$/.test(price))){
     alert("价格不正确");
     return false;
   }
   if(propic == ""  ){
     alert("图片不能为空");
     return false;
   }
  document.getElementById("addproduct").submit();
}

function checkchgproduct(){
   var proname = document.getElementById("proname").value;
   var protype = document.getElementById("protype").value;
   var propic = document.getElementById("propic").value;
   var price = document.getElementById("price").value;
   

   if(proname == ""  ){
     alert("商品名不能为空");
     return false;
   }
   if(protype == ""  ){
     alert("商品类型不能为空");
     return false;
   }
  if(!(/^\d+$/.test(price))){
     alert("价格不正确");
     return false;
   }
   if(propic == ""  ){
     alert("图片不能为空");
     return false;
   }
  document.getElementById("chgproinfo").submit();
}

function checkaddshop(){
   var shopname = document.getElementById("shopname").value;
   var phone = document.getElementById("phonenum").value;
   var shoppic = document.getElementById("shoppic").value;
   var content = document.getElementById("shopinfo").value;
   var rules = /^1[3|4|5|7|8]\d{9}$/;

   if(shopname == ""  ){
     alert("店铺名不能为空");
     return false;
   }
   if(!rules.test(phone)){
     alert("手机号不正确");
     return false;
   }
   if(shoppic == ""  ){
     alert("图片不能为空");
     return false;
   }
   if(content == ""  ){
      alert("简介不能为空");
      return false;
   }
  document.getElementById("addshop").submit();
}

function checkchgshop(){
   var shopname = document.getElementById("shopname").value;
   var phone = document.getElementById("phonenum").value;
   var shoppic = document.getElementById("shoppic").value;
   var content = document.getElementById("spinfo").value;
   var rules = /^1[3|4|5|7|8]\d{9}$/;

   if(shopname == ""  ){
     alert("店铺名不能为空");
     return false;
   }
   if(!rules.test(phone)){
     alert("手机号不正确");
     return false;
   }
   if(shoppic == ""  ){
     alert("图片不能为空");
     return false;
   }
   if(content == ""  ){
      alert("简介不能为空");
      return false;
   }
  document.getElementById("chgshopinfo").submit();
}

function checkaddaddress(){
   var consignee = document.getElementById("consignee").value;
   var phone = document.getElementById("phonenum").value;
   var address = document.getElementById("adr").value;
   var rules = /^1[3|4|5|7|8]\d{9}$/;

   if(consignee == ""  ){
     alert("收货人不能为空");
     return false;
   }
  if(!rules.test(phone)){
    alert("手机号不正确");
    return false;
  }
   if(address == ""  ){
      alert("地址不能为空");
      return false;
   }
  document.getElementById("addaddress").submit();
}

function checkchgaddress(){
   var consignee = document.getElementById("consignee").value;
   var phone = document.getElementById("phonenum").value;
   var address = document.getElementById("adr").value;
   var rules = /^1[3|4|5|7|8]\d{9}$/;

   if(consignee == ""  ){
     alert("收货人不能为空");
     return false;
   }
  if(!rules.test(phone)){
    alert("手机号不正确");
    return false;
  }
   if(address == ""  ){
      alert("地址不能为空");
      return false;
   }
  document.getElementById("chgaddress").submit();
}

//以下是九月编写
function checkaddarti(){
  var title = document.getElementById('arti-title').value;
  var content= document.getElementById('arti-content').value;
  var picture= document.getElementById('InputPic').value;
    if(title == ""  ){
      alert("文章不能为空");
      return false;
    }
    if(content == ""  ){
      alert("文章内容不能为空");
      return false;
    }
    if(picture == ""  ){
      alert("图片不能为空");
      return false;
    }

    document.getElementById("addarti").submit();

}

  function checkaddpro(){
    var title= document.getElementById("pro-name").value;
    var content = document.getElementById("pro-content").value;
    var address = document.getElementById("pro-add").value;
    var formerprice = document.getElementById("pro-formerprice").value;
    var price = document.getElementById("pro-price").value;
    var neww  = document.getElementById("pro-new").value;
    var tel= document.getElementById("phonenum1").value;
    var rules = /^1[3|4|5|7|8]\d{9}$/;

    if(title == ""  ){
      alert("商品名不能为空");
      return false;
    }
    if(content == ""  ){
      alert("商品简介不能为空");
      return false;
    }
    if(!(/^\d+$/.test(price))){
      alert("初始价格不正确");
      return false;
    }
    if(address == ""  ){
      alert("交易地点不能为空");
      return false;
    }

    if(!(/^\d+$/.test(formerprice))){
      alert("当前价格不正确");
      return false;
    }
    if(!rules.test(tel)){
      alert("联系方式不正确");
      return false;
    }
    if(pic == ""  ){
      alert("图片不能为空");
      return false;
   }
  document.getElementById("addpro").submit();
}

  function checkaddupd(){
    var utitle = document.getElementById('upd-title').value;
    var ucontent= document.getElementById('upd-content').value;
    var upicture= document.getElementById('updPic').value;
      if(utitle == ""  ){
        alert("文章不能为空");
        return false;
      }
      if(ucontent == ""  ){
        alert("文章内容不能为空");
        return false;
      }
      if(upicture == ""  ){
        alert("图片不能为空");
        return false;
      }
    document.getElementById("addupd").submit();
  }