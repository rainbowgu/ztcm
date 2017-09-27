<?php /* Smarty version Smarty-3.1-DEV, created on 2016-11-16 11:19:58
         compiled from "tpl\product\test.html" */ ?>
<?php /*%%SmartyHeaderCode:29776582bd05ea177f7-01759826%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c8f4143492f5c0f0c0d6d2fc95d976ef4dd772d' => 
    array (
      0 => 'tpl\\product\\test.html',
      1 => 1478830812,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29776582bd05ea177f7-01759826',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'orderinfo' => 0,
    'proid' => 0,
    'status' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_582bd05ea95b05_18460610',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582bd05ea95b05_18460610')) {function content_582bd05ea95b05_18460610($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title></title>
<link href="public/css/bootstrap.min.css" rel="stylesheet">
<link href="public/css/style.css" rel="stylesheet">
<script src="public/js/jquery-2.1.4.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/form.js"></script>
<meta name="viewport"
  content="width=device-width,initial-scale=1,user-scalable=no">
<script type="text/javascript">
//下面用于图片上传预览功能
function setImagePreview(avalue) {
var docObj=document.getElementById("doc");
 
var imgObjPreview=document.getElementById("preview");
if(docObj.files &&docObj.files[0])
{
//火狐下，直接设img属性
imgObjPreview.style.display = 'block';
imgObjPreview.style.width = '150px';
imgObjPreview.style.height = '180px'; 
//imgObjPreview.src = docObj.files[0].getAsDataURL();
 
//火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
}
else
{
//IE下，使用滤镜
docObj.select();
var imgSrc = document.selection.createRange().text;
var localImagId = document.getElementById("localImag");
//必须设置初始大小
localImagId.style.width = "150px";
localImagId.style.height = "180px";
//图片异常的捕捉，防止用户修改后缀来伪造图片
try{
localImagId.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
}
catch(e)
{
alert("您上传的图片格式不正确，请重新选择!");
return false;
}
imgObjPreview.style.display = 'none';
document.selection.empty();
}
return true;
}
 
</script>
 
</head>




<body>
  <nav class="navbar navbar-default navbar-fixed-top navx"
    role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
          <p class="navtext text-center">上传凭证</p>
        </div>
        <div class="col-xs-2"></div>
      </div>
    </div>
  </nav>
  <br />
  <br />
  <div class="container-fluid mar-top50">
    <div class="row mar-top15">
      <div class="col-xs-12">





        <form id="Upload" method="POST"
          action="index.php?c=product&m=updateorder"
          enctype="multipart/form-data" runat="server">


 <div class="form-group">
       <label for="exampleInputEmail1">上传凭证(<font color="red">* 图片大小须小于2M</font>)</label> 
<div id="localImag"><img id="preview" src="public/img/u60.jpg" width="150" height="180" style="display: none; width: 150px; height: 180px;"></div>

<td align="center" style="padding-top:10px;"><input type="file" name="pictures[]"  id="doc" style="width:150px;" onchange="javascript:setImagePreview();"></td>

</div>







            <div class="form-group">
            <label for="exampleInputEmail1">订单号</label> <input type="text"
              class="form-control" name="ordernum" id="ccc">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">手机号码</label> <input type="text"
              class="form-control" readonly="readonly"  value="<?php echo $_smarty_tpl->tpl_vars['orderinfo']->value['zt_tel'];?>
" name="tel" id="ddd">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">证件号码</label> <input type="text"
              class="form-control" readonly="readonly"  value="<?php echo $_smarty_tpl->tpl_vars['orderinfo']->value['zt_usernum'];?>
" name="num" id="ddd">
          </div>
          <div class="form-group">
            <input type="hidden" class="form-control" name="proid"
              value="<?php echo $_smarty_tpl->tpl_vars['proid']->value;?>
">
          </div>
            <div class="form-group">
            <input type="hidden" class="form-control" name="status"
              value="<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
">
          </div>
<div>
          <div class="form-group">
            <label for="gu" id="gu"></label>
          </div>
          <div>


          <!--div class="form-group ">

            <div class="fileInputContainer">
            
              <div class="fileInput">上传图片</div>
              <input type="file" class="fileInput" name="pictures[]"
                onChange="if(this.value)insertTitle(this.value);" />
            </div>
          </div-->


       <div class="form-group">
          <center>
            <input class="btn btn-lg" style=" margin-top: 20px; background:#F39700;color:white" type="submit"
              value="确&nbsp;认&nbsp;上&nbsp;传">
          </center> 
        </div>


        </form>
      
      </div>
    </div>
  </div>

</body>
</html>


<?php }} ?>
