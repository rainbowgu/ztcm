<?php /* Smarty version Smarty-3.1-DEV, created on 2016-11-16 11:21:02
         compiled from "tpl\boss\index.html" */ ?>
<?php /*%%SmartyHeaderCode:10393582bd09e64a4d3-90030788%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ccbad5ee84bfb760c25b04992bfcfa036141225e' => 
    array (
      0 => 'tpl\\boss\\index.html',
      1 => 1478248137,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10393582bd09e64a4d3-90030788',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'orderinfo' => 0,
    'v' => 0,
    'orderinfo2' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_582bd09e74e514_03804123',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582bd09e74e514_03804123')) {function content_582bd09e74e514_03804123($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['orderinfo']->value=='') {?>
别看了，没有
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['orderinfo']->value!='') {?>
<?php  $_smarty_tpl->tpl_vars["v"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["v"]->_loop = false;
 $_smarty_tpl->tpl_vars['num'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['orderinfo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["v"]->key => $_smarty_tpl->tpl_vars["v"]->value) {
$_smarty_tpl->tpl_vars["v"]->_loop = true;
 $_smarty_tpl->tpl_vars['num']->value = $_smarty_tpl->tpl_vars["v"]->key;
?>
<div >
<span><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</span>
<span><?php echo $_smarty_tpl->tpl_vars['v']->value['zt_user_id'];?>
</span>
<span ><img  src="public/upimg/<?php echo $_smarty_tpl->tpl_vars['v']->value['zt_upload'];?>
" height="30px" width="30px" ></span>
<button onclick="javascript:location.href='index.php?c=boss&m=orderdetail&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
'">查看详情</button>

<button onclick="javascript:location.href='index.php?c=boss&m=jinenum&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
'">成功</button>

<button onclick="javascript:location.href='index.php?c=boss&m=shenhefail&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
'">失败</button>
</div>
<?php } ?>
<?php }?>

<br> <br><br><br><br><br>
<?php  $_smarty_tpl->tpl_vars["v"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["v"]->_loop = false;
 $_smarty_tpl->tpl_vars['num'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['orderinfo2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["v"]->key => $_smarty_tpl->tpl_vars["v"]->value) {
$_smarty_tpl->tpl_vars["v"]->_loop = true;
 $_smarty_tpl->tpl_vars['num']->value = $_smarty_tpl->tpl_vars["v"]->key;
?>
<div >
<span><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</span>
<span><?php echo $_smarty_tpl->tpl_vars['v']->value['zt_user_id'];?>
</span>
<span ><img  src="public/upimg/<?php echo $_smarty_tpl->tpl_vars['v']->value['zt_upload'];?>
" height="30px" width="30px" ></span>
<button onclick="javascript:location.href='index.php?c=boss&m=orderdetail&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
'">查看详情</button>


</div>
<?php } ?><?php }} ?>
