<?php /* Smarty version Smarty-3.1-DEV, created on 2016-11-15 10:44:59
         compiled from "tpl\product\detail.html" */ ?>
<?php /*%%SmartyHeaderCode:19787582a76ab8d7f99-88410202%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ecf3e1babda5024c16847e56b9fd4a5f1309457' => 
    array (
      0 => 'tpl\\product\\detail.html',
      1 => 1478502707,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19787582a76ab8d7f99-88410202',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'signPackage' => 0,
    'detailinfo' => 0,
    '_app_' => 0,
    'pro_status' => 0,
    'status' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_582a76ab98f7c5_73964461',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582a76ab98f7c5_73964461')) {function content_582a76ab98f7c5_73964461($_smarty_tpl) {?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<link href="public/css/bootstrap.min.css" rel="stylesheet">
<link href="public/css/style.css" rel="stylesheet">
<script src="public/js/jquery-2.1.4.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/form.js"></script>
<meta name="viewport"
	content="width=device-width,initial-scale=1,user-scalable=no">
 <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
  /*
   * 注意：
   * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
   * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
   * 3. 完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
   *
   * 如有问题请通过以下渠道反馈：
   * 邮箱地址：weixin-open@qq.com
   * 邮件主题：【微信JS-SDK反馈】具体问题
   * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
   */
  wx.config({
    appId: '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['appId'];?>
',
    timestamp:  <?php echo $_smarty_tpl->tpl_vars['signPackage']->value['timestamp'];?>
,
    nonceStr:  '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['nonceStr'];?>
',
    signature:  '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['signature'];?>
',
    jsApiList: [
        'checkJsApi',
        'onMenuShareTimeline',
        'onMenuShareAppMessage',
        'onMenuShareQQ',
        'onMenuShareWeibo',
        'hideMenuItems',
        'showMenuItems',
        'hideAllNonBaseMenuItem',
        'showAllNonBaseMenuItem',
        'translateVoice',
        'startRecord',
        'stopRecord',
        'onRecordEnd',
        'playVoice',
        'pauseVoice',
        'stopVoice',
        'uploadVoice',
        'downloadVoice',
        'chooseImage',
        'previewImage',
        'uploadImage',
        'downloadImage',
        'getNetworkType',
        'openLocation',
        'getLocation',
        'hideOptionMenu',
        'showOptionMenu',
        'closeWindow',
        'scanQRCode',
        'chooseWXPay',
        'openProductSpecificView',
        'addCard',
        'chooseCard',
        'openCard'
      ]
  });
  wx.ready(function () {
    // 在这里调用 API
  });
</script>
 
 
 
  <!--微信分享-->
  <script type="text/javascript">
  wx.ready(function () {
  var shareData = {
  title: '<?php echo $_smarty_tpl->tpl_vars['detailinfo']->value['zt_pro_title'];?>
',
  desc: '<?php echo $_smarty_tpl->tpl_vars['detailinfo']->value['zt_pro_simplecontent'];?>
',
  link: '<?php echo $_smarty_tpl->tpl_vars['_app_']->value;?>
/index.php?c=product&m=detail&id=<?php echo $_smarty_tpl->tpl_vars['detailinfo']->value['id'];?>
',
  imgUrl: '<?php echo $_smarty_tpl->tpl_vars['_app_']->value;?>
/public/upimg/<?php echo $_smarty_tpl->tpl_vars['detailinfo']->value['zt_pro_firstimg'];?>
'
  };
  wx.onMenuShareAppMessage(shareData);
  wx.onMenuShareTimeline(shareData);
  wx.onMenuShareQQ(shareData);
  wx.onMenuShareWeibo(shareData);
  });
  wx.error(function (res) {
  console.log(res.errMsg);
  });
  </script>



	
</head>

<style type="text/css">
.padnone1 {
	background: #DCDCDD;
	color: #FFF
}

.padnone2 {
	background: #F39700;
	color: #000
}

.padnone21 {
	background: #eeefef;
	color: #eeefef
}

.kefubg {
	background: #ffffff;
	color: #fff
}
.divfull{
	 background: #ffffff;
	 margin-left: -15px;
     margin-right: -15px;
     margin-top: 8px;
}

.panel{
	background: #ffffff;
}

.spantext{
	margin-left: 15px;
	margin-right: 15px;
}

.navbar-fixed-bottom {
	
}

.eee{
	margin-bottom:-3px;
}
.martop--3{
	margin-top:-3px;
}
.mar-left{
	margin-left: -5px;
}
</style>
<body>
	<!--nav class="navbar navbar-default navbar-fixed-top navx" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <div class="col-xs-2 navbar-left rollback">
        <a href=""><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
      </div>
      <div class="col-xs-8">
        <p class="navtext text-center"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</p>
      </div>
      <div class="col-xs-2 navbar-right">
     
      </div>
    </div>
  </div>
</nav-->
	<div class="container-fluid padnone martop--3">
		<div class="panel panel-default">
			<div >
				<img src="public/upimg/<?php echo $_smarty_tpl->tpl_vars['detailinfo']->value['zt_pro_firstimg'];?>
" alt="..."
					class="img-responsive center-block">
			</div>

			<div class="panel-body">
				<div class="row">

					<div class="col-xs-12">
					<div class="text-left divfull">
						<h1 class="panel-title "><center><strong><?php echo $_smarty_tpl->tpl_vars['detailinfo']->value['zt_pro_title'];?>
</strong></center></h1>
				     <br>
				  
			      	</div>  

			      	<?php echo $_smarty_tpl->tpl_vars['detailinfo']->value['zt_pro_tent'];?>

				
					</div>
				</div>
			
				<!--div class="row divfull">
					<div class="col-xs-12">
						<img class="center-block eventpic"
							src="public/upimg/<?php echo $_smarty_tpl->tpl_vars['detailinfo']->value['zt_pro_secondimg'];?>
" alt="...">
					</div>
				</div-->

				<div class="row divfull">
					<div class="col-xs-12">
						<p class="eventcont">返利金额：<?php echo $_smarty_tpl->tpl_vars['detailinfo']->value['zt_pro_goal'];?>
</p>
						<hr>
						<p class="eventcont">推广区域：<?php echo $_smarty_tpl->tpl_vars['detailinfo']->value['zt_pro_address'];?>
</p>
					</div>
				</div>
			
				<div class="divfull">
				<div>
				  <!-- h3 class="panel-title eventcont "><?php echo $_smarty_tpl->tpl_vars['detailinfo']->value['zt_pro_company'];?>
</h3-->
					<br>
					<span><div class="spantext">
					&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['detailinfo']->value['zt_pro_companycontent'];?>
   </div></span>
               </div>			
			</div>
				
			</div>

			
		</div>
	</div>


<div>

</div>







	<div>


		<nav class="navbar navbar-default navbar-fixed-bottom  eee"
			role="navigation">
			<div class="row center-block">
				<div class="padnone21 col-xs-2 col-sm-2 col-md-2 kefubg">
					<span class="col-xs-offset-0  mar-left"><a href="tel:025-86738902"> <img class="iconb"
						src="public/img/kefu.png"></a></span>
				
				</div>
				<?php if ($_smarty_tpl->tpl_vars['pro_status']->value=='0') {?>
				<div class="padnone10 col-xs-10 col-sm-10 col-md-10">
					<span class="col-xs-offset-6"><img class="iconc"
						src="public/img/kefu.png"></span>
				
				</div>

				<?php } elseif ($_smarty_tpl->tpl_vars['pro_status']->value=='1') {?> <?php if ($_smarty_tpl->tpl_vars['status']->value=='1') {?>
				<div class="padnone1 col-xs-5 col-sm-5 col-md-5">
					<span class="col-xs-offset-0"><img class="icone"
						src="public/img/huiup.png"></span>
				
				</div>

				<div class="padnone2 col-xs-5 col-sm-5 col-md-5">
					<span class="col-xs-offset-0"> <a 
						href='index.php?c=product&m=sqsure&id=<?php echo $_smarty_tpl->tpl_vars['detailinfo']->value['id'];?>
'> <img
							class="icone" src="public/img/chesq.jpg"></a>
							</span>


				</div>
				<?php }?> <?php if ($_smarty_tpl->tpl_vars['status']->value=='0') {?>
				<div class="padnone2 col-xs-5 col-sm-5 col-md-5">
					<span class="col-xs-offset-0"> <a 
						href='index.php?c=product&m=updateorder&id=<?php echo $_smarty_tpl->tpl_vars['detailinfo']->value['id'];?>
&status=0'>
							<img class="icone" src="public/img/cheup.jpg">
					</a></span>
					
				</div>

				<div class="padnone1 col-xs-5 col-sm-5 col-md-5">
					<span class="col-xs-offset-0"><img class="icone"
						src="public/img/huisq.png"></span>
				
				</div>
				<?php }?> <?php }?>

			</div>



		</nav>
	

	</div>
<br><br><br><br><br><br>
</body>

</html>
<?php }} ?>
