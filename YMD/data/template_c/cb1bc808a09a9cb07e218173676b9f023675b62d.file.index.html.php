<?php /* Smarty version Smarty-3.1-DEV, created on 2016-11-18 10:35:25
         compiled from "tpl\message\index.html" */ ?>
<?php /*%%SmartyHeaderCode:13516582a76bc0dacf3-39948364%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb1bc808a09a9cb07e218173676b9f023675b62d' => 
    array (
      0 => 'tpl\\message\\index.html',
      1 => 1479436513,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13516582a76bc0dacf3-39948364',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_582a76bc155270_74206502',
  'variables' => 
  array (
    'messinfo' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582a76bc155270_74206502')) {function content_582a76bc155270_74206502($_smarty_tpl) {?><!DOCTYPE html>
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
body {
	background-color: #e8e8e8;
}

.thumbnail .caption {
	padding: 0;
}

.thumbnail {
	margin-bottom: 0;
	border: none;
	border-right: 1px solid #ddd;
}
 .head{
	background:#e9eaea ; color:#e9eaea
  }
</style>
<body>

	<nav class="navbar navbar-default navbar-fixed-top navx"
		role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<div class="col-xs-2 navbar-left"></div>
				<div class="col-xs-8">
					<p class="navtext text-center">消息</p>
				</div>
				<div class="col-xs-2 navbar-right">
					<a href=""> <img class="icon-navright"
						src="public/img/index.png">
					</a>
				</div>
			</div>
		</div>
	</nav>
	
	
	<volist name="userinfo" id="vol">
	

	<div class="container-fluid">
		<div class="row mar-top15">
			<div class="panel panel-default panelx">
				<div class="list-group">
					<table class="table table-condensed">
	<?php  $_smarty_tpl->tpl_vars["v"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["v"]->_loop = false;
 $_smarty_tpl->tpl_vars['num'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['messinfo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["v"]->key => $_smarty_tpl->tpl_vars["v"]->value) {
$_smarty_tpl->tpl_vars["v"]->_loop = true;
 $_smarty_tpl->tpl_vars['num']->value = $_smarty_tpl->tpl_vars["v"]->key;
?>
	   <?php if ($_smarty_tpl->tpl_vars['v']->value['id']%2==0) {?>
		<tr class="info">
	   <?php }?>
	    <?php if ($_smarty_tpl->tpl_vars['v']->value['id']%2==1) {?>
		<tr class="active">
	   <?php }?>
	  

	        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['zt_mess_title'];?>
</td>
	        
			<td><?php echo $_smarty_tpl->tpl_vars['v']->value['zt_mess_content'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['v']->value['zt_mess_datetime'];?>
</td>
			
		</tr>
		<?php } ?>
</table>
				</div>
			</div>
		</div>

	</div>
	</volist><?php echo $_smarty_tpl->getSubTemplate ("public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>
</html>



<?php }} ?>
