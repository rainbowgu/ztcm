<?php /* Smarty version Smarty-3.1-DEV, created on 2016-11-17 10:16:03
         compiled from "tpl\user\bank.html" */ ?>
<?php /*%%SmartyHeaderCode:25703582a7a8fe48803-07489615%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e061c3b0bc3f42f4ed729c8705fdecef688f2cde' => 
    array (
      0 => 'tpl\\user\\bank.html',
      1 => 1479348960,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25703582a7a8fe48803-07489615',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_582a7a8fec2d82_60876826',
  'variables' => 
  array (
    'bankinfo' => 0,
    'bankstatus' => 0,
    'bankid' => 0,
    'jiaoyistatus' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582a7a8fec2d82_60876826')) {function content_582a7a8fec2d82_60876826($_smarty_tpl) {?>
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
  <script type="text/javascript">




    $(function(){
      $('#checkbox').click(function(){



       var num = $("#num").val();
       var address = $("#address").val();
       var bank = $("#bank").val();
       var name = $("#name").val();
       var bankstatus=$("#bankstatus").val();
       var type = $("#type").val();
       var bankid = $("#bankid").val();
       var checkMSM = "index.php?c=user&m=jiaoyiajax";
       var url = checkMSM+"";
if(num == ""  ){
      alert("帐号不能为空");
      return false;
   }
if(address == ""  ){
      alert("开户行不能为空");
      return false;
   }
   if(bank == ""  ){
      alert("银行名称不能为空");
      return false;
   }
   if(name == ""  ){
      alert("收款人不能为空");
      return false;
   }


//alert(bankid);
if($('input[name="checkbox"]').prop("checked"))
{
//alert("hello");

  $.ajax({
    type : "POST",
    url : url,
    data : "type="+type+"&bankid="+bankid+"&num="+num+"&address="+address+"&bank="+bank+"&bankstatus="+bankstatus+"&name="+name,
    dataType : "json",
    success : function(data){
               //alert("9999999999");
               alert(data);
             }
           });
}
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
          <p class="navtext text-center">修改银行卡信息</p>
        </div>
        <div class="col-xs-2">
        </div>
      </div>
    </div>
  </nav>

  <div class="container-fluid mar-top50 background-color: #ffffff;">
   <div class="row mar-top15">
    <div class="col-xs-12">
      <form id="chgbank" method="POST" action="index.php?c=user&m=paybank" enctype="multipart/form-data">


        <div class="form-group">

          <label for="username">收款人真实姓名<font color="red">*</font></label>
          <input type="text" class="form-control" name="name" id="name" placeholder=<?php echo $_smarty_tpl->tpl_vars['bankinfo']->value['zt_realname'];?>
>
        </div>

        <div class="form-group">
          <label for="username">银行名称<font color="red">*</font>
          </label>
          <input type="text" class="form-control" name="bank" id="bank" placeholder=<?php echo $_smarty_tpl->tpl_vars['bankinfo']->value['zt_bankname'];?>
>
        </div>

        <div class="form-group">
          <label for="userage">开户行地址<font color="red">*</font></label>
          <input type="text" class="form-control" name="address" id="address" placeholder=<?php echo $_smarty_tpl->tpl_vars['bankinfo']->value['zt_bankaddress'];?>
>
        </div>
        <div class="form-group">
          <label for="userphone">银行卡卡号<font color="red">*</font></label>
          <input type="text" class="form-control" name="num" id="num" placeholder=<?php echo $_smarty_tpl->tpl_vars['bankinfo']->value['zt_banknum'];?>
>
        </div>
        <input type="hidden" class="form-control" name="bankstatus" id="bankstatus" value=<?php echo $_smarty_tpl->tpl_vars['bankstatus']->value;?>
>
        <input type="hidden" class="form-control" name="bankid" id="bankid" value=<?php echo $_smarty_tpl->tpl_vars['bankid']->value;?>
>
        <input type="hidden" class="form-control hidden" name="type"  id="type" value="bank">



        <?php if ($_smarty_tpl->tpl_vars['bankstatus']->value==0) {?>
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
          <input class="btn btn-lg" type="submit"  style="background:#F39700;color:white" value="添&nbsp;&nbsp;&nbsp;&nbsp;加">
          <?php } elseif ($_smarty_tpl->tpl_vars['bankstatus']->value==1) {?>
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
            <input class="btn btn-lg" type="submit"  style="background:#F39700;color:white"  value="更&nbsp;&nbsp;&nbsp;&nbsp;新">
            <?php }?>


          </center>
        </form>
      </div>
    </div>
  </div>
  <br><br><br>
  <?php echo $_smarty_tpl->getSubTemplate ("public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>
</html>

<?php }} ?>
