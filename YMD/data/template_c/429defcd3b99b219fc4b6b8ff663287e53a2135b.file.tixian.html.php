<?php /* Smarty version Smarty-3.1-DEV, created on 2016-11-16 14:34:42
         compiled from "tpl\boss\tixian.html" */ ?>
<?php /*%%SmartyHeaderCode:6082582bfe023876d6-59852024%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '429defcd3b99b219fc4b6b8ff663287e53a2135b' => 
    array (
      0 => 'tpl\\boss\\tixian.html',
      1 => 1478851893,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6082582bfe023876d6-59852024',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fundinfo' => 0,
    'v' => 0,
    'fundinfo2' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_582bfe02442c89_53412646',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582bfe02442c89_53412646')) {function content_582bfe02442c89_53412646($_smarty_tpl) {?> <html>

<body>
<?php  $_smarty_tpl->tpl_vars["v"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["v"]->_loop = false;
 $_smarty_tpl->tpl_vars['num'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fundinfo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["v"]->key => $_smarty_tpl->tpl_vars["v"]->value) {
$_smarty_tpl->tpl_vars["v"]->_loop = true;
 $_smarty_tpl->tpl_vars['num']->value = $_smarty_tpl->tpl_vars["v"]->key;
?>
<div >
<span><?php echo $_smarty_tpl->tpl_vars['v']->value['zt_money'];?>
</span>

<?php if ($_smarty_tpl->tpl_vars['v']->value['zt_tixiantype']==1) {?>
支付宝
<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['zt_tixiantype']==2) {?>
银行卡
<?php }?>
<span><?php echo $_smarty_tpl->tpl_vars['v']->value['zt_tixiannum'];?>
</span>

<span><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</span>

<span><?php echo $_smarty_tpl->tpl_vars['v']->value['zt_datetime'];?>
</span>

<button onclick="javascript:location.href='index.php?c=boss&m=tixiansuccess&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['fundee'];?>
&userid=<?php echo $_smarty_tpl->tpl_vars['v']->value['zt_user_id'];?>
'">提现成功</button>
</div>
<?php } ?>

<br><br><br><br><br>

<?php  $_smarty_tpl->tpl_vars["v"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["v"]->_loop = false;
 $_smarty_tpl->tpl_vars['num'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fundinfo2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["v"]->key => $_smarty_tpl->tpl_vars["v"]->value) {
$_smarty_tpl->tpl_vars["v"]->_loop = true;
 $_smarty_tpl->tpl_vars['num']->value = $_smarty_tpl->tpl_vars["v"]->key;
?>
<div >
<span><?php echo $_smarty_tpl->tpl_vars['v']->value['user_e_num'];?>
</span>

<span><?php echo $_smarty_tpl->tpl_vars['v']->value['zt_username'];?>
</span>

<span><?php echo $_smarty_tpl->tpl_vars['v']->value['datetime'];?>
</span>


</div>
<?php } ?>



</body>



</html><?php }} ?>
