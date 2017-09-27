<?php /* Smarty version Smarty-3.1-DEV, created on 2016-11-15 10:45:24
         compiled from "tpl\user\paylist.html" */ ?>
<?php /*%%SmartyHeaderCode:22360582a76c4caa7c6-08166312%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58cef1bd2f4e10218ecb9bab347b9c1c44856d66' => 
    array (
      0 => 'tpl\\user\\paylist.html',
      1 => 1478758727,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22360582a76c4caa7c6-08166312',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'zfpaystatus' => 0,
    'bankstatus' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_582a76c4d24d41_67196223',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582a76c4d24d41_67196223')) {function content_582a76c4d24d41_67196223($_smarty_tpl) {?>
<!DOCTYPE html>
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
<style type="text/css">
  body{
    background-color: #ffffff;
  }
  .thumbnail .caption{
    padding: 0;
  }
  .thumbnail{
    margin-bottom: 0;
    border:none;
    border-right:1px solid #ddd;
  }
  .head{
  background:#e9eaea ; color:#e9eaea
  }

</style>
<body>
<nav class="navbar navbar-default navbar-fixed-top navx" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header ">
      <div class="col-xs-2 navbar-left"></div>
      <div class="col-xs-8">
        <p class="navtext text-center">个人中心</p>
      </div>
      <div class="col-xs-2 navbar-right">
        <a href="index.php?c=index&m=index">
          <img class="icon-navright"src="public/img/index.png">
        </a>
      </div>
    </div>
  </div>
</nav>

  <div class="container-fluid mar-top50 head " style="background-image:url('public/img/headbg.jpg')">
   <img class="headpic center-block img-circle" src=/>
   <p class="username text-center"><font color="#717071"></font></p>
  </div>

  <div class="container-fluid">
  

    <div class="row mar-top15">
      <div class="panel panel-default panelx">
        <div class="list-group">

<?php if ($_smarty_tpl->tpl_vars['zfpaystatus']->value==1) {?>
    <a href="index.php?c=user&m=payzfb" class="list-group-item">
            <span class="glyphicon glyphicon glyphicon-user pull-left" aria-hidden="true"></span>
            支付宝
               <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span>
          </a>


<?php } elseif ($_smarty_tpl->tpl_vars['zfpaystatus']->value==0) {?>
    <a href="index.php?c=user&m=payzfb" class="list-group-item">
            <span class="glyphicon glyphicon glyphicon-user pull-left" aria-hidden="true"></span>
             添加支付宝
               <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span>
          </a>

<?php }?>




<?php if ($_smarty_tpl->tpl_vars['bankstatus']->value==1) {?>
      <a href="index.php?c=user&m=paybank" class="list-group-item">
            <span class="glyphicon glyphicon glyphicon-th-list pull-left" aria-hidden="true"></span>
            银行卡
            <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span>
          </a>

<?php } elseif ($_smarty_tpl->tpl_vars['bankstatus']->value==0) {?>
       <a href="index.php?c=user&m=paybank" class="list-group-item">
            <span class="glyphicon glyphicon glyphicon-th-list pull-left" aria-hidden="true"></span>
            添加银行卡
            <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span>
          </a>
<?php }?>
      
      



      
          


        </div>
      </div>
    </div>
<br><br><br><br>
  
  
  
  </div>
  <?php echo $_smarty_tpl->getSubTemplate ("public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>
</html>


<?php }} ?>
