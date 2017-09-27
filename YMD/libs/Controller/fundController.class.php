
<?php
include 'libs/Common/init_Controller.php';

class fundController extends init_Controller
{

  public function __construct()
  {
    parent::__construct();

  }

  function index()
  {
    VIEW::display('fund/index');
  }

  private function showmessage($info, $url)
  {
    echo "<script>alert('$info');window.location.href='$url'</script>";
    exit();
  }

  function atm()
  {
    if ($_POST) {
      $user_id = $_SESSION['auth']['id'];
      $num =  intval($_POST['num']*100);

      $tixiantype =  $_POST['tixiantype'];
      $tixiannum =  $_POST['tixiannum'];
      $fundobj = M('fund');
      $fundtotalobj = M('fund');
      $fundtotalinfo = $fundtotalobj->fundtotallast($user_id);


      $shenheinfo = $fundtotalobj->fundshenhe($user_id);
      if($shenheinfo){


      }




      if ($fundtotalinfo['user_e_num']*100 < $num ){
        $this->showmessage('金额不足，加油哦' , 'index.php?c=user&m=fund');
      }

      if ($num<5000) {
        $this->showmessage('提现金额低于50' , 'index.php?c=user&m=fund');
      }

      $oneday=86400;
      $fundall=$fundtotalobj->fundone_ALL($user_id);
      $coolnum=0;
      foreach ($fundall as $key => $value) {
       $time1=strtotime($value['zt_datetime']);
       $time2=time();
       $days=$value['zt_days'];
       $oneday=86400;
       $time3=$time2-$time1;

       if($time3<$value['zt_days']*$oneday){
         $coolnum=$coolnum+$value['zt_money'];
       }

     }



     $xianshinum=$fundtotalinfo['user_e_num']-$coolnum;




     if ($xianshinum*100 < $num||$num<5000) {
      $this->showmessage('金额不足或者低于50' , 'index.php?c=user&m=fund');
    } else {
          //total 虚拟金额-提现申请 

     $newtotalfund=($fundtotalinfo['user_e_num']*100-$num)/100;

     $newarr = array(
      "user_e_id" => $user_id,
      "user_e_num" => $newtotalfund,
      "datetime" => date("Y-m-d G:i:s"),
      "user_e_type" => 4
      );

     $newtotalinfo = $fundtotalobj->insertfund($newarr);




          //取现申请字段+1 状态 3 
     $fundarr=array(
      "zt_user_id" => $user_id,
      "zt_pro_id" => '0',
      "zt_datetime" => date("Y-m-d G:i:s"),
      "zt_money"=>$num/100,
      "zt_type" => 3,
      "zt_tixiantype" => $tixiantype,
      "zt_tixiannum" =>  $tixiannum
      );
     $insertfund = $fundobj->infund($fundarr);
            // $where= "zt_user_id=". $user_id." and zt_pro_id=1  and zt_type= 3 ";

     $fundidinfo=$fundtotalobj->fund_id_select($user_id);



     $fund_id= $fundidinfo["id"];

         //申请体现  
     $arr = array(
      "user_e_id" => $user_id,
      "user_e_num" => $num/100,
      "datetime" => date("Y-m-d G:i:s"),
      "user_e_type" => 3,
      "fund_id"=>$fund_id
      );
     $insertinfo = $fundtotalobj->insertfund($arr);
     if ($insertinfo) {
      $this->showmessage('申请成功', 'index.php?c=user&m=index');
    } else {
      $this->showmessage('申请失败，请联系客服', 'index.php?c=user&m=index');
    }
  }

} else {


  $zt_user_id = $_SESSION['auth']['id'];
  $userobj = M('user');
  $userinfo = $userobj->userinfo($zt_user_id);
        //var_dump($userinfo);
  if($userinfo["zt_jiaoyiid"]==null||$userinfo["zt_jiaoyitype"]==NULL){
    $this->showmessage('请完善提现交易方式', 'index.php?c=user&m=paylist');
  }else{
$user_id = $_SESSION['auth']['id'];


  $fundobj=M('fund');
  //$totallast= $fundobj-> fundtotallast($zt_user_id);




  $fundinfo=$fundobj->fundhis($user_id);
  $fundtotalinfo=$fundobj->fundtotallast($user_id);
  $fundall=$fundobj->fundone_ALL($user_id);
  $coolnum=0;
  foreach ($fundall as $key => $value) {
   $time1=strtotime($value['zt_datetime']);
   $time2=time();
   $days=$value['zt_days'];
   $oneday=86400;
   $time3=$time2-$time1;
   if($time3>$value['zt_days']*$oneday){
           // echo "pass";
     $coolarr=array(
       "zt_cool"=>1
       );

     $where=" id = ".$value['id']." and zt_user_id = ".$user_id;
     $fundobj->up_fund($coolarr,$where);


   }else{


    $coolnum=$coolnum+$value['zt_money'];
  }

}

$xianshinum=$fundtotalinfo['user_e_num']-$coolnum;
















    //zfb
   if($userinfo['zt_jiaoyitype'] == 1){
       //查询支付宝
    $zfbuserinfo = $userobj->sel_zfpay($zt_user_id);

    if(!$zfbuserinfo){
      $this->showmessage('支付宝帐户出错', 'index.php?c=user&m=paylist');
    }

   


    VIEW::assign(array(
      'zfbuserinfo'=>$zfbuserinfo,
      'userinfo'=>$userinfo,
      'jiaoyistatus'=>1,
      'totallast'=> $xianshinum
      ));

     }else if($userinfo['zt_jiaoyitype'] == 2){//bank
      $bankuserinfo = $userobj->sel_bank($zt_user_id);
      if(!$bankuserinfo){
        $this->showmessage('银行帐户出错', 'index.php?c=user&m=paylist');
      }

      $num1=mb_substr($bankuserinfo['zt_banknum'] , 0 , 4);
      $num2=substr($bankuserinfo['zt_banknum'] , -4);
      $num=$num1."*****".$num2;
      VIEW::assign(array(
        'bankuserinfo'=>$bankuserinfo,
        'num'=>$num,
        'userinfo'=>$userinfo,
        'jiaoyistatus'=>2,
      'totallast'=> $xianshinum
        ));


    }else{
      VIEW::assign(array(
       'jiaoyistatus'=>3,
      'totallast'=> $totallast
       ));
    }
   // var_dump($totallast);

    VIEW::display('fund/atm');
  }


}
}
}