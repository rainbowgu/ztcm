<?php /* Smarty version Smarty-3.1-DEV, created on 2016-11-17 15:22:51
         compiled from "tpl\user\payzfb.html" */ ?>
<?php /*%%SmartyHeaderCode:12465582a76c65af221-80723853%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d667b732bcc073b28dc80f2b0a2bb5954d22127' => 
    array (
      0 => 'tpl\\user\\payzfb.html',
      1 => 1479367368,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12465582a76c65af221-80723853',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_582a76c6629797_38632145',
  'variables' => 
  array (
    'userinfo' => 0,
    'zfpaystatus' => 0,
    'zfbid' => 0,
    'jiaoyistatus' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582a76c6629797_38632145')) {function content_582a76c6629797_38632145($_smarty_tpl) {?><!DOCTYPE html>
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
  <script type="text/javascript">




    $(function(){
      $('#checkbox').click(function(){

       var zfpaystatus=$("#zfpaystatus").val();
       var type = $("#type").val();
       var zfbid = $("#zfbid").val();
       var zfbnum=$("#zfbnum").val();
         //alert(zfbnum);
//var zfbnum=1;
var checkMSM = "index.php?c=user&m=jiaoyiajax";
var url = checkMSM+"";
//alert(zfbid);
if(zfbnum == ""  ){
  alert("帐号不能为空");
  return false;
}
if($('input[name="checkbox"]').prop("checked"))
{
 $.ajax({
  type : "POST",
  url : url,
  data : "type="+type+"&zfbid="+zfbid+"&qqqq="+zfbnum+"&zfpaystatus="+zfpaystatus,
  dataType : "json",
  success : function(data){
               //alert("9999999999");
               alert(data);
               window.location.href ="http://www.baidu.com";
             }
           });

}

          //  alert('未选中');
        });


    })


  </script>

</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top navx" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <div class="col-xs-2">
        </div>
        <div class="col-xs-8">
          <p class="navtext text-center">修改支付宝</p>
        </div>
        <div class="col-xs-2">
        </div>
      </div>
    </div>
  </nav>

  <div class="container-fluid mar-top50">
   <div class="row mar-top15">
    <div class="col-xs-12">
      <form id="chgmyinfo" method="POST" action="index.php?c=user&m=payzfb" enctype="multipart/form-data">

        <div class="form-group">
          <input type="text" class="form-control hidden" name="userid" value="">
          <label for="username">支付宝帐号<font color="red">*</font></label>

          <input type="text" class="form-control" name="zfbnum" id="zfbnum" placeholder="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['zt_zfpay'];?>
" >
        </div>
        <input type="hidden" class="form-control hidden" id="zfpaystatus" name="zfpaystatus" value=<?php echo $_smarty_tpl->tpl_vars['zfpaystatus']->value;?>
>
        <input type="hidden" class="form-control hidden" id="zfbid" name="zfbid" value=<?php echo $_smarty_tpl->tpl_vars['zfbid']->value;?>
>
        <input type="hidden" class="form-control hidden" id="type" name="type" value="zfb">


        <?php if ($_smarty_tpl->tpl_vars['zfpaystatus']->value==0) {?>
        <div class="form-group">
          <label>
            <?php if ($_smarty_tpl->tpl_vars['jiaoyistatus']->value==0) {?>
            <input type="checkbox" id="checkbox"  name="checkbox"  >选为默认交易方式
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['jiaoyistatus']->value==1) {?>
            <input type="checkbox" id="checkbox"  name="checkbox"  checked="true">选为默认交易方式
            <?php }?>
          </label>
          <center>
            <input class="btn btn-lg" style="background:#F39700;color:white"  type="submit"  name="tj" value="添&nbsp;&nbsp;&nbsp;加">

            <?php } elseif ($_smarty_tpl->tpl_vars['zfpaystatus']->value==1) {?>
            <div class="form-group">
              <label>
               <?php if ($_smarty_tpl->tpl_vars['jiaoyistatus']->value==0) {?>
               <input type="checkbox" id="checkbox"  name="checkbox"  >选为默认交易方式
               <?php }?>
               <?php if ($_smarty_tpl->tpl_vars['jiaoyistatus']->value==1) {?>
               <input type="checkbox" id="checkbox"  name="checkbox"  checked="true">选为默认交易方式
               <?php }?>
             </label>


           </div>
           <center>
            <input class="btn btn-lg" style="background:#F39700;color:white"  type="submit"  name="tj" value="更&nbsp;&nbsp;&nbsp;新">

            <?php }?>
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
