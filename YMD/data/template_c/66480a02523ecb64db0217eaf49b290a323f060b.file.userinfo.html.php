<?php /* Smarty version Smarty-3.1-DEV, created on 2016-11-15 10:48:52
         compiled from "tpl\user\userinfo.html" */ ?>
<?php /*%%SmartyHeaderCode:29480582a7794c48a49-80548218%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66480a02523ecb64db0217eaf49b290a323f060b' => 
    array (
      0 => 'tpl\\user\\userinfo.html',
      1 => 1478139814,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29480582a7794c48a49-80548218',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'userinfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_582a7794c85d02_12418225',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582a7794c85d02_12418225')) {function content_582a7794c85d02_12418225($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/style.css" rel="stylesheet">
    <script src="public/js/jquery-2.1.4.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/form.js"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top navx" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <div class="col-xs-2">
      </div>
      <div class="col-xs-8">
        <p class="navtext text-center">修改资料</p>
      </div>
      <div class="col-xs-2">
      </div>
    </div>
  </div>
</nav>

<div class="container-fluid mar-top50">
	<div class="row mar-top15">
		<div class="col-xs-12">
      <form id="chgmyinfo" method="POST" action="index.php?c=user&m=detail" enctype="multipart/form-data">
        
          <div class="form-group">
            <input type="text" class="form-control hidden" name="userid" value="">
            <label for="username">昵称</label>
            <input type="text" class="form-control" name="username" id="username" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['zt_username'];?>
">
          </div>
             <div class="form-group">
            <label for="userphone">身份证号</label>
            <input type="text" class="form-control" name="num" id="num" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['zt_realnum'];?>
">
          </div>
            <div class="form-group">
            <label for="userphone">真实姓名</label>
            <input type="text" class="form-control" name="truename" id="truename" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['zt_realname'];?>
">
          </div>
        
 <div class="form-group">
            <label for="userphone">常用QQ</label>
            <input type="text" class="form-control" name="qq" id="qq" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['zt_qq'];?>
">
          </div>
           <div class="form-group">
            <label for="userphone">常用邮箱</label>
            <input type="text" class="form-control" name="email" id="email" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['zt_email'];?>
">
          </div>
           <div class="form-group">
            <label for="userphone">紧急电话</label>
            <input type="text" class="form-control" name="jintel" id="jintel" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['zt_jintel'];?>
">
          </div>


      
     <center>
          <input class="btn btn-lg" style="background:#F39700;color:white"  type="button" onclick = "checkchgmyinfo();" value="提&nbsp;&nbsp;&nbsp;交">
            <div class="form-group">
            <label for="userphone"></label>
            <input type="hidden" class="form-control"  readonly="readonly" name="tel" id="tel" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['zt_tel'];?>
">
                <div class="form-group">
            <label for="userage"></label>
            <input type="hidden" class="form-control" name="company" id="company" value="0">
          </div>
          <div class="form-group">
            <label for="userphone"></label>
            <input type="hidden" class="form-control" name="position" id="position" value="0">
          </div>
          </div>
        </center>
      </form>
       <br><br><br> <br><br><br>
    </div>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>
</html>
<?php }} ?>
