<?php /* Smarty version Smarty-3.1-DEV, created on 2016-11-15 11:03:31
         compiled from "tpl\user\reqproject.html" */ ?>
<?php /*%%SmartyHeaderCode:21012582a7b036c75c8-53413931%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8ee4386de7882b66e29ca5942306fa0815fc4ec' => 
    array (
      0 => 'tpl\\user\\reqproject.html',
      1 => 1478073202,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21012582a7b036c75c8-53413931',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_582a7b03741b40_64533279',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582a7b03741b40_64533279')) {function content_582a7b03741b40_64533279($_smarty_tpl) {?>
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
<body>
  <nav class="navbar navbar-default navbar-fixed-top navx" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <div class="col-xs-2">
        </div>
        <div class="col-xs-8">
          <p class="navtext text-center">推单申请</p>
        </div>
        <div class="col-xs-2">
        </div>
      </div>
    </div>
  </nav>

  <div class="container-fluid mar-top50">
   <div class="row mar-top15">
    <div class="col-xs-12">
      <form id="form" method="POST" action="index.php?c=user&m=reqproject" enctype="multipart/form-data">
       <input type="hidden" class="form-control" name="userid" id="userid" value=<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
>
       
       <div class="form-group">
        <label for="username"  class="col-xs-4 control-label">名牌名称</label>
        <div class="col-xs-8">
          <input type="text" class="form-control" name="mpname" id="inputEmail3" >
        </div>
        
      </div>
      <div class="form-group">
        <label for="username" class="col-xs-4 control-label">任务链接</label>
        <div class="col-xs-8">
          <input type="text" class="form-control" name="url" id="url" value="">
        </div>  </div>
        <div class="form-group">
          <label for="username" class="col-xs-4 control-label">散客价</label>
          <div class="col-xs-8">
            <input type="password" class="form-control" name="s_price" id="s_price" value="">
          </div>  </div>
          <div class="form-group">
            <label for="username" class="col-xs-4 control-label">批量价</label>
            <div class="col-xs-8">
              <input type="password" class="form-control" name="p_price" id="p_price" value="">
            </div>  </div>
            <div class="form-group">
              <label for="username" class="col-xs-4 control-label">任务数量</label>
              <div class="col-xs-8">
                <input type="password" class="form-control" name="num" id="num" value="">
              </div>  </div>
              <div class="form-group">
                <label for="username" class="col-xs-4 control-label">结束日期</label>
                <div class="col-xs-8">
                  <input type="password" class="form-control" name="overtime" id="overtime" value="">
                </div>  </div>
                <div class="form-group">
                  <label for="username" class="col-xs-4 control-label">说明</label>
                  <div class="col-xs-8">
                    <input type="password" class="form-control" name="mark" id="mark" value="">
                  </div>  </div>
                  
                  <div class="form-group">
                    <label for="username" class="col-xs-4 control-label">推单人</label>
                    <div class="col-xs-8">
                      <input type="password" class="form-control" name="tuiname" id="tuiname" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="username" class="col-xs-4 control-label">手机号码</label>
                    <div class="col-xs-8">
                      <input type="password" class="form-control" name="tel" id="tel" value="">
                    </div>  </div>
                    



                    <div class="form-group">
                      <label for="username" class="col-xs-4 control-label">预付款</label>
                      
                      <div class="radio col-xs-8">
                        <label>
                          <input type="radio" name="yufu" id="yufu" value="yes" checked>
                          是   
                        </label>
                        <label>
                          <input type="radio" name="yufu" id="yufu" value="no">
                          否
                        </label>
                      </div>

                    </div>



                    <div class="form-group">
                      <center>
                        <input class="btn  btn-lg"  style="background:#F39700;color:white" type="submit"   value="确认修改">
                      </center></div>
                    </form>
                  </div>
                </div>
              </div>

            </body>
            </html>

<!--meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<form method='post' action='http://localhost/index.php?c=user&m=update_pwd'>
	<input type="text" name="oldpwd" /> 
	<input type="text" name="newpwd" /> 
	<input type="text" name="renewpwd" /> 
		<input type="submit" value='确认修改' />


</form--><?php }} ?>
