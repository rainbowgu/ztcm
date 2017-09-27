<?php /* Smarty version Smarty-3.1-DEV, created on 2016-11-17 11:47:52
         compiled from "tpl\fund\atm.html" */ ?>
<?php /*%%SmartyHeaderCode:3796582d26a319d838-74478303%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae4622d9d4c1cdae4029194301d619a9c4e24fea' => 
    array (
      0 => 'tpl\\fund\\atm.html',
      1 => 1479354468,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3796582d26a319d838-74478303',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_582d26a32550c2_53281664',
  'variables' => 
  array (
    'jiaoyistatus' => 0,
    'zfbuserinfo' => 0,
    'bankuserinfo' => 0,
    'num' => 0,
    'totallast' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582d26a32550c2_53281664')) {function content_582d26a32550c2_53281664($_smarty_tpl) {?><!DOCTYPE html>
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
        <p class="navtext text-center">提现申请</p>
      </div>
      <div class="col-xs-2">
      </div>
    </div>
  </div>
</nav>

<div class="container-fluid mar-top50 ">

    <div class="row mar-top15">
      <div class="panel panel-default panelx">
        <div class="list-group">
    
        <?php if ($_smarty_tpl->tpl_vars['jiaoyistatus']->value==1) {?>

         <div class="col-xs-10">
                             <font style="font-size:16px;" >支付宝</font>
           <br>
                             <font style="font-size:16px;">帐号: <?php echo $_smarty_tpl->tpl_vars['zfbuserinfo']->value['zt_zfpay'];?>
</font>
          </div>
        <?php } elseif ($_smarty_tpl->tpl_vars['jiaoyistatus']->value==2) {?>
         <div class="col-xs-10">
                             <font style="font-size:16px;" ><?php echo $_smarty_tpl->tpl_vars['bankuserinfo']->value["zt_bankname"];?>
</font>
           <br>
                             <font style="font-size:16px;">尾号为: <?php echo $_smarty_tpl->tpl_vars['num']->value;?>
</font>
          </div>
    

   <?php }?>
         
       



          
          <!--  div class="col-xs-2">
           <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span>
          </div>-->
         
        </div>
      </div>
    </div>





  

	<div class="row mar-top15">
		<div class="col-xs-12">
      <form id="Atm" method="POST" action="index.php?c=fund&m=atm">
        <div class="form-group">
          <label for="exampleInputEmail1">提现申请金额</label>
          <input type="text" class="form-control" placeholder="当前可提取最大金额为<?php echo $_smarty_tpl->tpl_vars['totallast']->value;?>
"  name="num" id="num">
        </div>
        <input type="hidden" class="form-control" name="tixiantype"  value=<?php echo $_smarty_tpl->tpl_vars['jiaoyistatus']->value;?>
>
   <?php if ($_smarty_tpl->tpl_vars['jiaoyistatus']->value==1) {?>
         <input type="hidden" class="form-control"  name="tixiannum" value=<?php echo $_smarty_tpl->tpl_vars['zfbuserinfo']->value['zt_zfpay'];?>
>
         <?php } elseif ($_smarty_tpl->tpl_vars['jiaoyistatus']->value==2) {?>   
 <input type="hidden" class="form-control"  name="tixiannum" value=<?php echo $_smarty_tpl->tpl_vars['bankuserinfo']->value['zt_banknum'];?>
>
           <?php }?>
       <center> <input class="btn"  style="background:#F39700;color:white"   type="submit" value="提现申请">
        </center></form>
    </div>
	</div>
	
	
	
	
</div>
<?php echo $_smarty_tpl->getSubTemplate ("public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>
</html>
<?php }} ?>
