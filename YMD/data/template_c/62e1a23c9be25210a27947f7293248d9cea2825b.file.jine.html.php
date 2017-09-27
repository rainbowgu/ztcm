<?php /* Smarty version Smarty-3.1-DEV, created on 2016-11-16 11:26:51
         compiled from "tpl\boss\jine.html" */ ?>
<?php /*%%SmartyHeaderCode:10567582bd1d53209d3-32143612%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62e1a23c9be25210a27947f7293248d9cea2825b' => 
    array (
      0 => 'tpl\\boss\\jine.html',
      1 => 1479266789,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10567582bd1d53209d3-32143612',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_582bd1d539ecb3_73082450',
  'variables' => 
  array (
    'upstatus' => 0,
    'Uptrueinfo' => 0,
    'userid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582bd1d539ecb3_73082450')) {function content_582bd1d539ecb3_73082450($_smarty_tpl) {?><html>
<form  method="POST" action="index.php?c=boss&m=shenhe"  enctype ="multipart/form-data" runat="server">
金额:
<input type="text" name="num" /><br>
天数:
<input type="text" name="days" /><br>
<input type="hidden" name="upstatus" value=<?php echo $_smarty_tpl->tpl_vars['upstatus']->value;?>
 ><br>
 
<?php if ($_smarty_tpl->tpl_vars['upstatus']->value==2) {?>
<?php echo $_smarty_tpl->tpl_vars['Uptrueinfo']->value['zt_username'];?>

邀请人金额:
<input type="text" name="fathernum" /><br>
<?php }?>




<input type="hidden" name="id" value=<?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
>

<input type="submit" value="审核成功"/>




</form>
</html><?php }} ?>
