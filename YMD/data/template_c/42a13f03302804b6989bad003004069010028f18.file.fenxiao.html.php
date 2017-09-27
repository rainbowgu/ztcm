<?php /* Smarty version Smarty-3.1-DEV, created on 2016-11-16 14:53:44
         compiled from "tpl\user\fenxiao.html" */ ?>
<?php /*%%SmartyHeaderCode:30903582bb9ff5b3741-95180635%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42a13f03302804b6989bad003004069010028f18' => 
    array (
      0 => 'tpl\\user\\fenxiao.html',
      1 => 1479279208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30903582bb9ff5b3741-95180635',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_582bb9ff6e92b1_49522924',
  'variables' => 
  array (
    'shenqingstatus' => 0,
    'shenqininfo' => 0,
    's' => 0,
    'inviteinfo' => 0,
    'a' => 0,
    'fanliinfo' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582bb9ff6e92b1_49522924')) {function content_582bb9ff6e92b1_49522924($_smarty_tpl) {?><!DOCTYPE html>
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
.nav-tabs,
.nav-pills {
  *zoom: 1;
}

.nav-tabs:before,
.nav-pills:before,
.nav-tabs:after,
.nav-pills:after {
  display: table;
  line-height: 0;
  content: "";
}

.nav-tabs:after,
.nav-pills:after {
  clear: both;
}

.nav-tabs > li,
.nav-pills > li {
  float: righ;
}

.nav-tabs > li > a,
.nav-pills > li > a {
  padding-right: 12px;
  padding-left: 12px;
  margin-right: 2px;
  line-height: 14px;
  
}

.nav-tabs {
  border-bottom: 1px none #ffffff;
}

.nav-tabs > li {
  margin-bottom: 1px;
}

.nav-tabs > li > a {
  padding-top: 8px;
  padding-bottom: 8px;
  line-height: 20px;
  border: 0px none white;
  -webkit-border-radius: 0px 0px 0 0;
     -moz-border-radius: 0px 0px 0 0;
          border-radius: 0px 0px 0 0;
}

.nav-tabs > li > a:hover,
.nav-tabs > li > a:focus {
  border-color: #eeeeee #eeeeee #dddddd;
}

.col-xs-3{
padding-right: 0px;
padding-left: 0px;
}
</style>
<body>
<nav class="navbar navbar-default navbar-fixed-top navx" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <div class="col-xs-2 navbar-left rollback">
        <a href="#"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
      </div>
      <div class="col-xs-8">
        <p class="navtext text-center">邀请</p>
      </div>
      <div class="col-xs-2 navbar-right">
        <a href="#">
       
        </a>
      </div>
    </div>
  </div>
</nav>

<div class="container-fluid padnone mar-top50">
  <ul id="myTab" class="nav nav-tabs">
    <li  class="col-xs-6 active">
      <a href="#allorder"  data-toggle="tab">邀请记录</a>
    </li>
    <!-- li class="col-xs-4">
      <a href="#finished" data-toggle="tab">待凭证</a>
    </li-->
    <li class="col-xs-6">
      <a href="#unfinished" data-toggle="tab">邀请返利</a>
    </li>
     <!--li class="col-xs-4">
      <a href="#allfinished" data-toggle="tab">已结束</a>
    </li-->
  </ul>
  
  
  
  <div id="myTabContent" class="tab-content">

    <!--待申请-->
    <!--div class="tab-pane fade in active" id="allorder">
    <?php if ($_smarty_tpl->tpl_vars['shenqingstatus']->value=='1') {?>
     <?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['s']->_loop = false;
 $_smarty_tpl->tpl_vars['num'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['shenqininfo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->_loop = true;
 $_smarty_tpl->tpl_vars['num']->value = $_smarty_tpl->tpl_vars['s']->key;
?>
  
      <div class="panel panel-success mar-top15">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-12">
             <p><?php echo $_smarty_tpl->tpl_vars['s']->value['zt_pro_title'];?>
<span style="float:right;"><a href="index.php?c=product&m=detail&id=<?php echo $_smarty_tpl->tpl_vars['s']->value['id'];?>
"><button class="btn">申请</button></a></span></p> 
              <p>订单时间:<?php echo $_smarty_tpl->tpl_vars['s']->value['zt_pro_datetime'];?>
</p>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              
              <span class="pull-right"></a></span>
            </div>
          </div>
        </div>
      
      </div> 
  
           <?php } ?>
      <?php } else { ?>
      
       <div class="panel panel-warning mar-top15">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-12">
             <p>当前没有新的项目可以参加</p> 
              <p></p>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
             
               </div>
          </div>
        </div>
      
      </div> 
      <?php }?>
    </div-->

   
    
    <!--待凭证-->
    <div class="tab-pane fade in active"  id="allorder">
   <?php if ($_smarty_tpl->tpl_vars['inviteinfo']->value!=0) {?>
     <?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['a']->_loop = false;
 $_smarty_tpl->tpl_vars['num'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['inviteinfo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value) {
$_smarty_tpl->tpl_vars['a']->_loop = true;
 $_smarty_tpl->tpl_vars['num']->value = $_smarty_tpl->tpl_vars['a']->key;
?>

     
      <div class="panel panel-warning mar-top15">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-12">
              <p><?php echo $_smarty_tpl->tpl_vars['a']->value['zt_username'];?>
 <span style="float:right;">
              <?php echo $_smarty_tpl->tpl_vars['a']->value['zt_createtime'];?>

              <!--a href="index.php?c=product&m=updateorder&id=<?php echo $_smarty_tpl->tpl_vars['a']->value['id'];?>
&status=0"><button class="btn">上传凭证</button></a--></span> </p> 
              <!--p>身份证号:<?php echo $_smarty_tpl->tpl_vars['a']->value['zt_username'];?>
</p-->
            </div>
          </div>
          <!--div class="row">
            <div class="col-xs-12">
              <span class="pull-left">手机号：<?php echo $_smarty_tpl->tpl_vars['a']->value['zt_username'];?>
</span>
              <span class="pull-right"> </span>
            </div>
          </div-->
        </div>
      </div>
   
        <?php } ?>
   <?php }?>
    </div>

  
  
  
    <!--待审核-->
    <div class="tab-pane fade" id="unfinished">
    <?php if ($_smarty_tpl->tpl_vars['fanliinfo']->value!=0) {?>
      <?php  $_smarty_tpl->tpl_vars["v"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["v"]->_loop = false;
 $_smarty_tpl->tpl_vars['num'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fanliinfo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["v"]->key => $_smarty_tpl->tpl_vars["v"]->value) {
$_smarty_tpl->tpl_vars["v"]->_loop = true;
 $_smarty_tpl->tpl_vars['num']->value = $_smarty_tpl->tpl_vars["v"]->key;
?>

      <div class="panel panel-warning mar-top15">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-12">
              <p><?php echo $_smarty_tpl->tpl_vars['v']->value['zt_username'];?>
 <span style="float:right;"><?php echo $_smarty_tpl->tpl_vars['v']->value['zt_datetime'];?>
</span></p> 
              <p><?php echo $_smarty_tpl->tpl_vars['v']->value['zt_pro_name'];?>
<span style="float:right;"><?php echo $_smarty_tpl->tpl_vars['v']->value['zt_money'];?>
</span></p>
            </div>
          </div>
          <!--div class="row">
            <div class="col-xs-12">
              <span class="pull-left">手机号：<?php echo $_smarty_tpl->tpl_vars['v']->value['zt_order_tel'];?>
</span> <span style="float:right;"><?php echo $_smarty_tpl->tpl_vars['v']->value['zt_money'];?>
</span>
            </div>
          </div-->
        </div>
      </div>
   
        
      
          <?php } ?>
          <?php }?>
    </div>
    
    
  
    

</div>
<?php echo $_smarty_tpl->getSubTemplate ("public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>




</body>
</html><?php }} ?>
