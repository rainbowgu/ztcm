<?php /* Smarty version Smarty-3.1-DEV, created on 2016-11-15 10:44:18
         compiled from "tpl\index\index.html" */ ?>
<?php /*%%SmartyHeaderCode:3375582a768217c258-79561697%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '582ec9b926802535936711aced7500a86e7634d9' => 
    array (
      0 => 'tpl\\index\\index.html',
      1 => 1477557637,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3375582a768217c258-79561697',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_582a76821b9510_82570810',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582a76821b9510_82570810')) {function content_582a76821b9510_82570810($_smarty_tpl) {?><!DOCTYPE html>
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
</head>
<style type="text/css">
.carousel-inner>.item>a>img, .carousel-inner>.item>img, .img-responsive a>img
	{
	//height: 180px;
}

.carousel {
	margin-bottom: 15px;
	
}

.thumbnail {
	border-color: #22c5a6;
}

h4 {
	font-family: "SimHei";
}

.phone {
	font-size: 12px;
	color: #ff0000;
}

.navbar-inner {
	background-color: #22c5a6;
}
</style>
<body>
	<nav class="navbar navbar-default navbar-fixed-top navx"
		role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<div class="col-xs-2 navbar-left rollback">
					<a href=""><span class="glyphicon glyphicon-chevron-left"
						aria-hidden="true"></span></a>
				</div>
				<div class="col-xs-8">
					<p class="navtext text-center">首&nbsp;&nbsp;页</p>
				</div>
				<div class="col-xs-2 navbar-right">
					<a href=""> <!--  img class="icon-navright"src="public/img/usercenter.png" -->
					</a>
				</div>
			</div>
		</div>
	</nav>
	<!--活动轮播图-->
	<div id="carousel-example-generic " class="mar-top50 carousel slide"
		data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators ">
			<li data-target="#carousel-example-generic" data-slide-to="0"
				class="active"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1"></li>
			<li data-target="#carousel-example-generic" data-slide-to="2"></li>
			<!-- li data-target="#carousel-example-generic" data-slide-to="3"></li> -->
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<div class="item active"
				style="background: url(http://ztcm2016.oss-cn-hangzhou.aliyuncs.com/ymd/gyh/img/1.jpg); background-size: cover; ">
				<a href="#"> <img  src="http://ztcm2016.oss-cn-hangzhou.aliyuncs.com/ymd/gyh/img/1.jpg" alt="...">
					<div class="carousel-caption">
						<h3>
						</h3>
					</div>
				</a>
			</div>

	<!--div class="item active"
				style="background: url(public/img/banner1.jpg); background-size: cover; ">
				<a href="#"> <img  src="public/img/banner1.jpg" alt="...">
					<div class="carousel-caption">
						
					</div>
				</a>
			</div-->
			<div class="item"
				style="background: url(http://ztcm2016.oss-cn-hangzhou.aliyuncs.com/ymd/gyh/img/2.jpg); background-size: cover;">
				<a href="#"> <img src="http://ztcm2016.oss-cn-hangzhou.aliyuncs.com/ymd/gyh/img/2.jpg" alt="...">
					<div class="carousel-caption">
						
					</div>
				</a>
			</div>
			
			
			<div class="item"
				style="background: url(http://ztcm2016.oss-cn-hangzhou.aliyuncs.com/ymd/gyh/img/3.jpg); background-size: cover;">
				<a href="#"> <img src="http://ztcm2016.oss-cn-hangzhou.aliyuncs.com/ymd/gyh/img/3.jpg" alt="...">
					<div class="carousel-caption">
						
					</div>
				</a>
			</div>
			
			
			<!--div class="item"
				style="background: url(public/img/banner2.jpg); background-size: cover;">
				<a href=""> <img src="public/img/banner2.jpg" alt="...">
					<div class="carousel-caption">
						<h3></h3>
					</div>
				</a>
			</div-->
			
			
		</div>
		<!-- Controls -->
		<!--  a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>-->
	</div>


	<div class="indexbg">
		<?php  $_smarty_tpl->tpl_vars["v"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["v"]->_loop = false;
 $_smarty_tpl->tpl_vars['num'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["v"]->key => $_smarty_tpl->tpl_vars["v"]->value) {
$_smarty_tpl->tpl_vars["v"]->_loop = true;
 $_smarty_tpl->tpl_vars['num']->value = $_smarty_tpl->tpl_vars["v"]->key;
?>
		<div class="divfull">
			<a href="index.php?c=product&m=detail&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><img
				src="public/upimg/<?php echo $_smarty_tpl->tpl_vars['v']->value['zt_pro_firstimg'];?>
" alt="..."
				class="img-responsive center-block"></a>
		</div>
		<?php } ?> <?php echo $_smarty_tpl->getSubTemplate ("public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>
<br><br><br><br><br>



</body>
</html><?php }} ?>
