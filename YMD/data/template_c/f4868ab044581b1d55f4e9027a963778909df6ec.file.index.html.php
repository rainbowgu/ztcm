<?php /* Smarty version Smarty-3.1-DEV, created on 2016-11-18 10:34:45
         compiled from "tpl\fund\index.html" */ ?>
<?php /*%%SmartyHeaderCode:21269582a76bdee5686-58949154%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4868ab044581b1d55f4e9027a963778909df6ec' => 
    array (
      0 => 'tpl\\fund\\index.html',
      1 => 1479369761,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21269582a76bdee5686-58949154',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_582a76be0d1307_91762440',
  'variables' => 
  array (
    'fundtotalinfo' => 0,
    'xianshinum' => 0,
    'coolnum' => 0,
    'fundinfo' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582a76be0d1307_91762440')) {function content_582a76be0d1307_91762440($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\phpStudy\\YMD\\framework\\libs\\view\\Smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html>
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
		background-color: #ffffff;
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
		background-color:#EA5414
	}
</style>
<body>
	<!--nav class="navbar navbar-default navbar-fixed-top navx"
		role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<div class="col-xs-2 navbar-left"></div>
				<div class="col-xs-8">
					<p class="navtext text-center">个人中心</p>
				</div>
				<div class="col-xs-2 navbar-right">
					<a href=""> <img class="icon-navright"
						src="public/img/index.png">
					</a>
				</div>
			</div>
		</div>
	</nav-->

	<div class="container-fluid  head">
		<a href="index.php?c=fund&m=atm&e=<?php echo $_smarty_tpl->tpl_vars['fundtotalinfo']->value['user_e_num'];?>
"><img
			class="headpic center-block img-circle" src="public/tixian.png" /></a>

			<p class="username text-center">余额：<?php echo $_smarty_tpl->tpl_vars['xianshinum']->value;?>
 冻结: <?php echo $_smarty_tpl->tpl_vars['coolnum']->value;?>
</p>
		</div>
		<br >


		<div class="container-fluid">
			<?php  $_smarty_tpl->tpl_vars["v"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["v"]->_loop = false;
 $_smarty_tpl->tpl_vars['num'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fundinfo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["v"]->key => $_smarty_tpl->tpl_vars["v"]->value) {
$_smarty_tpl->tpl_vars["v"]->_loop = true;
 $_smarty_tpl->tpl_vars['num']->value = $_smarty_tpl->tpl_vars["v"]->key;
?>
			<div class="row">
				<div class="panel panel-default panelx">
					<div class="list-group">

						<span class="col-xs-12">
							<?php if ($_smarty_tpl->tpl_vars['v']->value['zt_type']==5) {?>
							<?php echo $_smarty_tpl->tpl_vars['v']->value['zt_pro_name'];?>

							<span style="float:right;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['zt_datetime'],"%Y-%m-%d");?>
</span></span>
							<span class="col-xs-12" > 邀请返利 <span style="float:right;">
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['v']->value['zt_type']==1) {?>

								提现申请中
								<span style="float:right;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['zt_datetime'],"%Y-%m-%d");?>
</span></span>
								<span class="col-xs-12" >
									<span style="float:right;">
										<?php }?>
										<?php if ($_smarty_tpl->tpl_vars['v']->value['zt_type']==3) {?>
										提现申请中
										<span style="float:right;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['zt_datetime'],"%Y-%m-%d");?>
</span></span>
										<span class="col-xs-12" > <span style="float:right;">
											<?php }?>
											<?php if ($_smarty_tpl->tpl_vars['v']->value['zt_type']==4) {?>
											提现成功
											<span style="float:right;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['zt_datetime'],"%Y-%m-%d");?>
</span></span>
											<span class="col-xs-12" > <span style="float:right;">
												<?php }?>
												<?php if ($_smarty_tpl->tpl_vars['v']->value['zt_type']==2) {?>
												<?php echo $_smarty_tpl->tpl_vars['v']->value['zt_pro_name'];?>

												<span style="float:right;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['zt_datetime'],"%Y-%m-%d");?>
</span></span>
												<span class="col-xs-12" >手机号:<?php echo $_smarty_tpl->tpl_vars['v']->value['zt_order_tel'];?>
 <span style="float:right;">
													<?php }?>
													
													
													<?php if ($_smarty_tpl->tpl_vars['v']->value['zt_type']==1) {?>
													-
													<?php }?>
													<?php if ($_smarty_tpl->tpl_vars['v']->value['zt_type']==3) {?>
													-
													<?php }?>
													<?php if ($_smarty_tpl->tpl_vars['v']->value['zt_type']==2) {?>
													+<?php }?>
													<?php if ($_smarty_tpl->tpl_vars['v']->value['zt_type']==5) {?>
													+<?php }?>




													<?php echo $_smarty_tpl->tpl_vars['v']->value['zt_money'];?>

												</span></span>
					 <!--  span class="col-xs-12"><span style="float:right;">
					<?php if ($_smarty_tpl->tpl_vars['v']->value['zt_type']==2) {?>
					
					项目返利<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['v']->value['zt_type']==1) {?>
					提现成功
					<?php }?>
					 <?php if ($_smarty_tpl->tpl_vars['v']->value['zt_type']==3) {?>
					 提现申请
					<?php }?>
					</span> 
				</span>-->
				
				

			</div>  <hr style="margin:1px 1px 1px 1px;height:1px">
		</div>
	</div>




	<?php } ?>


</div>
<br ><br ><br ><br ><br ><br ><br >
<?php echo $_smarty_tpl->getSubTemplate ("public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>
</html>


<?php }} ?>
