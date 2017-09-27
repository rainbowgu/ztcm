<?php /* Smarty version Smarty-3.1-DEV, created on 2016-11-15 10:44:18
         compiled from "public\footer.html" */ ?>
<?php /*%%SmartyHeaderCode:7996582a76821f67c7-61805252%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55f06bdc6c0efb53723642fe70ea680f6a6b9a0d' => 
    array (
      0 => 'public\\footer.html',
      1 => 1476412758,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7996582a76821f67c7-61805252',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_582a7682233a86_37924031',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582a7682233a86_37924031')) {function content_582a7682233a86_37924031($_smarty_tpl) {?><nav class="navbar navbar-default navbar-fixed-bottom " role="navigation">
    <div class="row center-block">
        <?php if ((($tmp = @$_smarty_tpl->tpl_vars['footer']->value)===null||$tmp==='' ? '0' : $tmp)=='1') {?>
        <div class="padnone col-xs-4 col-sm-4 col-md-4">
            <span class="col-xs-offset-4"><a href="index.php?c=index&m=index"><img class="icon" src="public/img/index3.png"></a></span>
        </div>
         <?php } else { ?>
          <div class="padnone col-xs-4 col-sm-4 col-md-4">
            <span class="col-xs-offset-4"><a href="index.php?c=index&m=index"><img class="icon" src="public/img/index2.png"></a></span>
        </div>
        <?php }?>
        
         <?php if ((($tmp = @$_smarty_tpl->tpl_vars['footer']->value)===null||$tmp==='' ? '0' : $tmp)=='2') {?>
        <div class="padnone col-xs-4 col-sm-4 col-md-4">
            <span class="col-xs-offset-4"><a href="index.php?c=user&m=order"><img class="icon" src="public/img/xiangmu3.png"></a></span>
        </div>
         <?php } else { ?>
         <div class="padnone col-xs-4 col-sm-4 col-md-4">
            <span class="col-xs-offset-4"><a href="index.php?c=user&m=order"><img class="icon" src="public/img/xiangmu2.png"></a></span>
        </div>
        <?php }?>
         <?php if ((($tmp = @$_smarty_tpl->tpl_vars['footer']->value)===null||$tmp==='' ? '0' : $tmp)=='3') {?>
        <div class="padnone col-xs-4 col-sm-4 col-md-4">
            <span class="col-xs-offset-4"><a href="index.php?c=user&m=index"><img class="icon" src="public/img/my3.png"></a></span>
        </div>
        <?php } else { ?>
          <div class="padnone col-xs-4 col-sm-4 col-md-4">
            <span class="col-xs-offset-4"><a href="index.php?c=user&m=index"><img class="icon" src="public/img/my2.png"></a></span>
        </div>
        <?php }?>
    </div>

    
</nav><?php }} ?>
