<?php /* Smarty version Smarty-3.1-DEV, created on 2016-11-18 10:57:38
         compiled from "tpl\user\index.html" */ ?>
<?php /*%%SmartyHeaderCode:17605582a76a23aca04-59003768%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a543fe299ecbf98fc2efdf60c5e1e0e11caeaba8' => 
    array (
      0 => 'tpl\\user\\index.html',
      1 => 1479437854,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17605582a76a23aca04-59003768',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_582a76a2426f87_59514176',
  'variables' => 
  array (
    'user_img' => 0,
    'username' => 0,
    'user_id' => 0,
    'mesnum' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582a76a2426f87_59514176')) {function content_582a76a2426f87_59514176($_smarty_tpl) {?>
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
<volist name="userinfo" id="vol">
  <div class="container-fluid mar-top50 head " style="background-image:url('public/img/headbg.jpg')">
	 <img class="headpic center-block img-circle" src=<?php echo $_smarty_tpl->tpl_vars['user_img']->value;?>
/>
	 <p class="username text-center"><font color="#717071"><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</font></p>
  </div>

  <div class="container-fluid">
    <div class="row">
		  <div class="panel panel-default panelx">
  			<div class="panel-body padnone">
       
            <div class="col-xs-4 order padnone">
              <a href="index.php?c=message&m=index&id=<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
&type=0" class="thumbnail">
                <img src="public/img/mynotice.png" alt="...">
                <div class="caption">
                  <p>我的通知
                 <?php if ($_smarty_tpl->tpl_vars['mesnum']->value!=0) {?>
                  
                 (<font color="red"> <?php echo $_smarty_tpl->tpl_vars['mesnum']->value;?>
  </font>)<?php }?>
                </p>
                </div>
              </a>
            </div>
        
            <div class="col-xs-4 order padnone">
              <a href="index.php?c=message&m=index&id=<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
&type=1" class="thumbnail">
                <img src="public/img/systemnotice.png" alt="...">
                <div class="caption">
                  <p>系统通知</p>
                </div>
              </a>
            </div>
            <div class="col-xs-4 order padnone">
              <a href="index.php?c=user&m=fund"  class="thumbnail">
                <img src="public/img/cart.png" alt="...">
                <div class="caption">
                  <p>钱包</p>
                </div>
              </a>
            </div>
        </div>
		  </div>
    </div>

    <div class="row mar-top15">
		  <div class="panel panel-default panelx">
  			<div class="list-group">
  				<a href="index.php?c=user&m=detail" class="list-group-item">
            <span class="glyphicon glyphicon glyphicon-user pull-left" aria-hidden="true"></span>
            个人信息
               <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span>
          </a>
  	
          <a href="index.php?c=user&m=paylist" class="list-group-item">
            <span class="glyphicon glyphicon glyphicon-yen pull-left" aria-hidden="true"></span>
          交易方式
            <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span>
          </a>
      


        </div>
		  </div>
    </div>

  
    <div class="row mar-top15">
      <div class="panel panel-default panelx">
        <div class="list-group">
         <a href="index.php?c=user&m=invite_list" class="list-group-item">
            <span class="glyphicon glyphicon glyphicon-th-list pull-left" aria-hidden="true"></span>
            邀请返利
            <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span>
          </a>
            <!--a href="index.php?c=user&m=insert_bank" class="list-group-item">
            <span class="glyphicon glyphicon glyphicon-globe pull-left" aria-hidden="true"></span>
            银行卡
            <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span>
          </a-->
         <a href="index.php?c=weixin&m=erweima" class="list-group-item">
            <span class="glyphicon glyphicon glyphicon-list-alt pull-left" aria-hidden="true"></span>
           个人邀请码
            <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span>
          </a>
               <a href="index.php?c=user&m=reqproject" class="list-group-item">
            <span class="glyphicon glyphicon glyphicon-wrench pull-left" aria-hidden="true"></span>
          推单申请
            <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span>
          </a>
          <!--  a href="" class="list-group-item">
            <span class="glyphicon glyphicon glyphicon-wrench pull-left" aria-hidden="true"></span>
          安全设置
            <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span>
          </a>-->
         
          <!--eq name="chk" value="0">
            <a href="" class="list-group-item">
              <span class="glyphicon glyphicon glyphicon-home pull-left" aria-hidden="true"></span>
             商家入驻
              <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span>
            </a>
          </eq-->
          <!--a href="" class="list-group-item">
            <span class="glyphicon glyphicon glyphicon-list-alt pull-left" aria-hidden="true"></span>
        关于我们
            <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span>
          </a-->
        </div>
      </div>
    </div>
  <br> <br>
 <br>
 <br>

  </div>
</volist><?php echo $_smarty_tpl->getSubTemplate ("public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>
</html>


<?php }} ?>
