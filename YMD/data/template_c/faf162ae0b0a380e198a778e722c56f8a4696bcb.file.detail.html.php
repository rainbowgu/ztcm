<?php /* Smarty version Smarty-3.1-DEV, created on 2016-11-16 11:21:04
         compiled from "tpl\boss\detail.html" */ ?>
<?php /*%%SmartyHeaderCode:9892582bd0a04365c1-13108381%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'faf162ae0b0a380e198a778e722c56f8a4696bcb' => 
    array (
      0 => 'tpl\\boss\\detail.html',
      1 => 1478247404,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9892582bd0a04365c1-13108381',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'orderinfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_582bd0a04ea144_42391945',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582bd0a04ea144_42391945')) {function content_582bd0a04ea144_42391945($_smarty_tpl) {?> <html>
<body>
人名：<?php echo $_smarty_tpl->tpl_vars['orderinfo']->value[0]['zt_username'];?>
<br>
 手机号：<?php echo $_smarty_tpl->tpl_vars['orderinfo']->value[0]['zt_tel'];?>
<br>
 身份证：<?php echo $_smarty_tpl->tpl_vars['orderinfo']->value[0]['zt_usernum'];?>
<br>
 上传时间：<?php echo $_smarty_tpl->tpl_vars['orderinfo']->value[0]['zt_createtime'];?>
<br>
 凭证图：
<img src="public/upimg/<?php echo $_smarty_tpl->tpl_vars['orderinfo']->value[0]['zt_upload'];?>
">




<br>






<button onclick="javascript:location.href='index.php?c=boss&m=jinenum&id=<?php echo $_smarty_tpl->tpl_vars['orderinfo']->value[0]['id'];?>
'">成功</button>

</body>



</html><?php }} ?>
