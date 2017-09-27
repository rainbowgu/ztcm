<?php /* Smarty version Smarty-3.1-DEV, created on 2016-11-16 11:20:38
         compiled from "tpl\boss\prolist.html" */ ?>
<?php /*%%SmartyHeaderCode:5705582bd086add9d6-94257259%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46afe4973094ada55d8ded0c17a78dffde1360b0' => 
    array (
      0 => 'tpl\\boss\\prolist.html',
      1 => 1478224794,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5705582bd086add9d6-94257259',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'proinfo' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_582bd086b5bcc6_66217330',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582bd086b5bcc6_66217330')) {function content_582bd086b5bcc6_66217330($_smarty_tpl) {?><button onclick="javascript:location.href='index.php?c=boss&m=insertproduct'">发布新产品</button>
<button onclick="javascript:location.href='index.php?c=boss&m=orderpass'">审核</button>

<button onclick="javascript:location.href='index.php?c=boss&m=tixian'">提现申请处理</button>
<?php  $_smarty_tpl->tpl_vars["v"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["v"]->_loop = false;
 $_smarty_tpl->tpl_vars['num'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['proinfo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["v"]->key => $_smarty_tpl->tpl_vars["v"]->value) {
$_smarty_tpl->tpl_vars["v"]->_loop = true;
 $_smarty_tpl->tpl_vars['num']->value = $_smarty_tpl->tpl_vars["v"]->key;
?>
<div >
<span><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</span>
<span><?php echo $_smarty_tpl->tpl_vars['v']->value['zt_pro_title'];?>
</span>



<button onclick="javascript:location.href='index.php?c=boss&m=xiugai&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
'">修改</button>
<!--button onclick="javascript:location.href='index.php?c=boss&m=shenhefail&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
'">删除</button-->

</div>
<?php } ?><?php }} ?>
