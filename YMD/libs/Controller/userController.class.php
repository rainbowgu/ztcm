<?php
include 'libs/Common/init_Controller.php';
class userController extends init_Controller
{

  function __construct()
  {

   if(!$_SESSION['auth']['zt_wechat_openid']){
     $theurl='http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
     $_SESSION['theurl']=$theurl;
     $getopidurl=_APP_."/index.php?c=weixin&m=getUserDetail";
     header('Location:'.$getopidurl);
   }
 }
 private function showmessage($info, $url)
 {
  echo "<script>alert('$info');window.location.href='$url'</script>";
  exit();
}


function invite_list(){
 $user_id = $_SESSION['auth']['id'];
   //var_dump($user_id);
 $userobj=M('user');
 $inviteinfo=$userobj->invite_select($user_id);
 $invite=0;
 if($inviteinfo){
   $invite=$inviteinfo;
 }
 $fanliinfo=$userobj->fanli_select($user_id);
   //$fanli=$fanliinfo;
 $fanli=0;
 if($fanliinfo){
  $fanli=$fanliinfo;
}

VIEW::assign(array(
 'inviteinfo'=>$invite,
 'fanliinfo'=>$fanli
 ));


VIEW::display('user/fenxiao');




}





function upuser_downuser(){
  $_Upid=$_GET['up_id'];
  $user_id = $_SESSION['auth']['id'];

            //判断数据库是否绑定
  $userobj=M('user');
  $userinfo=$userobj->userinfo($user_id);
              // userinfo($id)
  if($userinfo['zt_father']==0){
      //更新 并添加绑定
    $arr=array(
      'zt_father'=>$_Upid
      );
    $where= 'id='.$user_id;
    $updown=$userobj->update($arr, $where);
    $selwhere=' id ='.$user_id.'  and zt_father = '.$_Upid;
    $upinfo=$userobj->slectOne($selwhere); 
    if(!$upinfo){
      $this->showmessage('邀请失败', 'index.php?c=user&m=index');
    } 
    $this->showmessage('邀请成功', 'index.php?c=user&m=index');

    


  }else{
    $this->showmessage('邀请失败 已绑定过', 'index.php?c=user&m=index');
  }
}

function paylist(){
 $user_id = $_SESSION['auth']['id'];
 $userobj=M('user');
 $bankinfo=$userobj->sel_bank($user_id);
 if(!$bankinfo){
  $bankstatus = 0;
          //var_dump($bankstatus);
}else{
 $bankstatus =1;
        // var_dump($bankstatus);
 VIEW::assign(array(
  'bankinfo'=>$bankinfo,
  ));
}
$zfpayinfo=$userobj->sel_zfpay($user_id);
if(!$zfpayinfo){
  $zfpaystatus = 0;
          //var_dump($zfpaystatus);
}else{
 $zfpaystatus =1;
      // var_dump($zfpaystatus);
 VIEW::assign(array(
   'zfpayinfo'=>$zfpayinfo,
   ));
}
VIEW::assign(array(
  'bankstatus'=>$bankstatus,
  'zfpaystatus'=>$zfpaystatus
  ));


VIEW::display('user/paylist');
}


function test(){
  var_dump('12');
  $a=$this->payzfb_insert('1','444444444','0','1');
  var_dump($a);

}


function payzfb_insert($user_id,$paynum,$paystatus,$zfbid){

 $userobj=M('user');
      //var_dump($paystatus);exit();
 if($paystatus == 0){
       //添加
   $arr=array(
    "zt_zfpay"=> $paynum,
    "zt_zfpay_createtime"=>date("Y-m-d h:i:s", time()),
    "zt_user_id"=>$user_id
    );
   $in_zfbinfo=$userobj->ins_zfpay($arr);

   $sel_zfbinfo=$userobj->sel_zfpay($user_id);
   if($sel_zfbinfo){
    $status =1;
  }else{
    $status =2;
  }



}else if($paystatus == 1){
       //更新
 $arr=array(
   "zt_zfpay"=> $paynum
   );
 $where=" id =' ".$zfbid." ' and zt_user_id= '". $user_id."'" ;
 $up_zfbinfo=$userobj->upd_zfpay($arr,$where);
 if($up_zfbinfo){
  $status =3;
}else{
  $status = 4;
}
}
//return $status;

}








function payzfb(){

 if($_POST){
  $userobj=M('user');
  $user_id = $_SESSION['auth']['id'];
  $paynum=isset($_POST['zfbnum'])?addslashes($_POST['zfbnum']):'0';
  $paystatus=addslashes($_POST['zfpaystatus']);
  $zfbid=isset($_POST['zfbid'])?addslashes($_POST['zfbid']):'0';
      //var_dump($paystatus);exit();
  if($paystatus == 0){
       //添加
   $arr=array(
    "zt_zfpay"=> $paynum,
    "zt_zfpay_createtime"=>date("Y-m-d h:i:s", time()),
    "zt_user_id"=>$user_id
    );
   $in_zfbinfo=$userobj->ins_zfpay($arr);

   $sel_zfbinfo=$userobj->sel_zfpay($user_id);
   if($sel_zfbinfo){
    $this->showmessage('添加成功', 'index.php?c=user&m=payzfb');
  }else{
    $this->showmessage('添加失败', 'index.php?c=user&m=payzfb');
  }



}else if($paystatus == 1){
       //更新
 $arr=array(
   "zt_zfpay"=> $paynum
   );
 $where=" id =' ".$zfbid." ' and zt_user_id= '". $user_id."'" ;
 $up_zfbinfo=$userobj->upd_zfpay($arr,$where);
 if($up_zfbinfo){
  $this->showmessage('更新成功', 'index.php?c=user&m=payzfb');
}else{
  $this->showmessage('更新成功', 'index.php?c=user&m=payzfb');
}
}
}else{
  $user_id = $_SESSION['auth']['id'];
        //查找支付宝记录
  $userobj=M('user');
  $userinfo=$userobj->sel_zfpay($user_id);
  $zfbid=$userinfo['id'];
  $userinfo2=$userobj->userinfo($user_id);
   //var_dump($userinfo2);
  $jiaoyistatus=0;
  if($userinfo2['zt_jiaoyitype']==1){
    $jiaoyistatus=1;
  }
 //var_dump($jiaoyistatus);
        //渲染状态
  if($userinfo){
   $zfpaystatus=1;
 }else{
   $zfpaystatus=0;
 }
 $thisurl=_APP_;
 VIEW::assign(array(
  'url2'=>$thisurl,
  'zfpaystatus'=>$zfpaystatus,
  'zfbid'=> $zfbid,
  'userinfo'=>$userinfo,
  'jiaoyistatus'=>$jiaoyistatus
  ));
 VIEW::display('user/payzfb');
}
}

function xxxx(){
  $zfbnum=isset($_POST['qqqq'])?addslashes($_POST['qqqq']):'0';
  echo json_encode($zfbnum);
}

function jiaoyiajax(){
 $userobj=M('user');
 $user_id = $_SESSION['auth']['id'];
 $type=isset($_POST['type'])?addslashes($_POST['type']):'0';
 $zfbid=isset($_POST['zfbid'])?addslashes($_POST['zfbid']):'0';
 $zfbnum=isset($_POST['qqqq'])?addslashes($_POST['qqqq']):'0';
 $zfpaystatus=isset($_POST['zfpaystatus'])?addslashes($_POST['zfpaystatus']):'0';
 $name=isset($_POST['name'])?addslashes($_POST['name']):'0';
 $bank=isset($_POST['bank'])?addslashes($_POST['bank']):'0';
 $address=isset($_POST['address'])?addslashes($_POST['address']):'0';
 $num=isset($_POST['num'])?addslashes($_POST['num']):'0';
 $bankstatus=isset($_POST['bankstatus'])?addslashes($_POST['bankstatus']):'0';
 $bankid=isset($_POST['bankid'])?addslashes($_POST['bankid']):'0';


 $where="id = ".$user_id;
 if($type == 'zfb'){
//支付宝
  $this->payzfb_insert($user_id,$zfbnum,$zfpaystatus,$zfbid);
    //zfbid    type
  $arr=array(
   "zt_jiaoyiid"=>$zfbid,
   "zt_jiaoyitype"=>1
   );
  $userinfo= $userobj->update($arr, $where);
  $wherearr="zt_jiaoyiid=".$zfbid."  and zt_jiaoyitype= 1 and id=".$user_id;
  $upinfo= $userobj->slectOne($wherearr);
  if($upinfo){
    $result='当前默认交易方式为支付宝';
  }else{
    $result='默认交易修改失败';
  }
}else if($type=='bank'){
//银行卡
 $this->paybank_insert($user_id,$name,$bank,$address,$num,$bankstatus,$bankid);

  $arr=array(
    "zt_jiaoyiid"=>$bankid,
    "zt_jiaoyitype"=>2
    );
  
  $userinfo= $userobj->update($arr, $where);
  $wherearr="zt_jiaoyiid=".$bankid."  and zt_jiaoyitype= 2 and id=".$user_id;
  $upinfo= $userobj->slectOne($wherearr);
  if($upinfo){
    $result='当前默认交易方式为银行卡';
  }else{
    $result='默认交易修改失败';
  }



}else{
  $result='默认交易修改失败';
}




echo json_encode($result);




}


function paybank_insert($user_id,$name,$bank,$address,$num,$bankstatus,$bankid){

  $userobj=M('user');
  

  if($bankstatus  == 0){
     //添加数据
    $arr1=array(
      "zt_realname"=> $name,
      "zt_bankname"=> $bank,
      "zt_bankaddress"=> $address,
      "zt_banknum"=> $num,
      "zt_bank_time"=>date("Y-m-d h:i:s", time()),
      "zt_user_id"=>$user_id
      );
    $in_bankinfo=$userobj->ins_bank($arr1);

       // $sel_bankinfo=$userobj->sel_bank($arr);
     /* if($sel_bankinfo){
        $this->showmessage('添加成功', 'index.php?c=user&m=paybank');
      }else{
        $this->showmessage('添加失败', 'index.php?c=user&m=paybank');
      }*/
    }else if($bankstatus  == 1){

      //更新数据
      $arr2=array(
        "zt_realname"=> $name,
        "zt_bankname"=> $bank,
        "zt_bankaddress"=> $address,
        "zt_banknum"=> $num
        );
      $where1=" id =' ".$bankid." ' and zt_user_id= '". $user_id."'" ;
      $up_bankinfo=$userobj->upd_bank($arr2,$where1);
   /*  if($up_bankinfo){
      $this->showmessage('更新成功', 'index.php?c=user&m=paybank');
    }else{
      $this->showmessage('更新失败', 'index.php?c=user&m=paybank');
    }*/

  }
       // $userobj = M('user');
  $userbankarr = array(
    "zt_bank_address" => $address,
    "zt_realname" => $name,
    "zt_bank_type" => $bank,
    "zt_bank_num" => $num
    );
  $where2='id='.$user_id;
  $userobj->update($userbankarr, $where2);
  $arrwhere = "zt_bank_address='". $address."' and
  zt_realname='". $name."' and   zt_bank_type='" . $bank." '
  and  zt_bank_num=" . $num;
  $updateinfo =$userobj->slectOne($arrwhere);
  if ($updateinfo) {
  $status=1;
 } else {
   $status= 2;
 }



}



function paybank(){
  if($_POST){
    $user_id = $_SESSION['auth']['id'];
    $userobj=M('user');
    $name=isset($_POST['name'])?addslashes($_POST['name']):'0';
    $bank=isset($_POST['bank'])?addslashes($_POST['bank']):'0';
    $address=isset($_POST['address'])?addslashes($_POST['address']):'0';
    $num=isset($_POST['num'])?addslashes($_POST['num']):'0';
    $bankstatus=isset($_POST['bankstatus'])?addslashes($_POST['bankstatus']):'0';
    $bankid=isset($_POST['bankid'])?addslashes($_POST['bankid']):'0';

    if($bankstatus  == 0){
     //添加数据
      $arr1=array(
        "zt_realname"=> $name,
        "zt_bankname"=> $bank,
        "zt_bankaddress"=> $address,
        "zt_banknum"=> $num,
        "zt_bank_time"=>date("Y-m-d h:i:s", time()),
        "zt_user_id"=>$user_id
        );
      $in_bankinfo=$userobj->ins_bank($arr1);

       // $sel_bankinfo=$userobj->sel_bank($arr);
     /* if($sel_bankinfo){
        $this->showmessage('添加成功', 'index.php?c=user&m=paybank');
      }else{
        $this->showmessage('添加失败', 'index.php?c=user&m=paybank');
      }*/
    }else if($bankstatus  == 1){

      //更新数据
      $arr2=array(
        "zt_realname"=> $name,
        "zt_bankname"=> $bank,
        "zt_bankaddress"=> $address,
        "zt_banknum"=> $num
        );
      $where1=" id =' ".$bankid." ' and zt_user_id= '". $user_id."'" ;
      $up_bankinfo=$userobj->upd_bank($arr2,$where1);
      if($up_bankinfo){
     // $this->showmessage('更新成功', 'index.php?c=user&m=paybank');
      }else{
     // $this->showmessage('更新失败', 'index.php?c=user&m=paybank');
      }

    }
       // $userobj = M('user');
    $userbankarr = array(
      "zt_bank_address" => $address,
      "zt_realname" => $name,
      "zt_bank_type" => $bank,
      "zt_bank_num" => $num
      );
    $where2='id='.$user_id;
    $userobj->update($userbankarr, $where2);
    $arrwhere = "zt_bank_address='". $address."' and
    zt_realname='". $name."' and   zt_bank_type='" . $bank." '
    and  zt_bank_num=" . $num;
    $updateinfo =$userobj->slectOne($arrwhere);
    if ($updateinfo) {
      $this->showmessage('更新成功', 'index.php?c=user&m=index');
    } else {
      $this->showmessage('更新成功', 'index.php?c=user&m=index');
    }




  }
  else{
   $user_id = $_SESSION['auth']['id'];


   $userobj=M('user');
   $bankinfo=$userobj->sel_bank($user_id);
   $userinfo=$userobj->userinfo($user_id);
   $jiaoyistatus=0;
   if($userinfo['zt_jiaoyitype']==2){
    $jiaoyistatus=1;
  }
  $bankid=$bankinfo['id'];
  // echo "<br><br><br><br><br><br><br>";
   //     var_dump($bankinfo);
  if($bankinfo){

   $bankstatus=1;
 }else{
   $bankstatus=0;
 }
  // var_dump($bankid);
 //  var_dump($bankstatus);
 VIEW::assign(array(
  'bankstatus'=>$bankstatus,
  'bankid'=> $bankid,
  'bankinfo'=>$bankinfo,
  'jiaoyistatus'=>$jiaoyistatus

  ));
 VIEW::display('user/bank');

}


VIEW::display('user/paybank');
}



function reqproject(){
  if($_POST){



   $mpname=isset($_POST['mpname'])?addslashes($_POST['mpname']):'0';
   $url=isset($_POST['url'])?addslashes($_POST['url']):'0';
   $s_price=isset($_POST['s_price'])?addslashes($_POST['s_price']):'0';
   $p_price=isset($_POST['p_price'])?addslashes($_POST['p_price']):'0';
   $num=isset($_POST['num'])?addslashes($_POST['num']):'0';
   $overtime=isset($_POST['overtime'])?addslashes($_POST['overtime']):'0';
   $mark=isset($_POST['mark'])?addslashes($_POST['mark']):'0';
   $tuiname=isset($_POST['tuiname'])?addslashes($_POST['tuiname']):'0';
   $tel=isset($_POST['tel'])?addslashes($_POST['tel']):'0';
   $yufu=isset($_POST['yufu'])?addslashes($_POST['yufu']):'0';
   $userid=isset($_POST['userid'])?addslashes($_POST['userid']):'0';


   $arr=array(
     "zt_mpname"=>$mpname,
     "zt_url"=>$url,
     "zt_s_price"=>$s_price,
     "zt_p_price"=>$p_price,
     "zt_num"=>$num,
     "zt_overtime"=>$overtime,
     "zt_mark"=>$mark,
     "zt_tuiname"=>$tuiname,
     "zt_tel"=>$tel,
     "zt_yufu"=>$yufu,
     "zt_userid"=>$userid
     );
   $userobj=M('user');
   $userinfo=$userobj->ins_tuidan($arr);
   if($userinfo){
    $this->showmessage('申请成功', 'index.php?c=user&m=index');
  }else{
    $this->showmessage('申请失败', 'index.php?c=user&m=index');
  }







}else{
  $user_id = $_SESSION['auth']['id'];
  VIEW::assign(array(
    'user_id'=>$user_id,


    ));


  VIEW::display('user/reqproject');

}



}

function fund(){
  $user_id = $_SESSION['auth']['id'];


  $fundobj=M('fund');

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
        //var_dump($fundinfo);
VIEW::assign(array(
  'fundinfo'=>$fundinfo,
  'fundtotalinfo'=>$fundtotalinfo,
  'xianshinum'=>$xianshinum,
  'coolnum'=>$coolnum

  ));
VIEW::display('fund/index');
}


function index()
{
  $user_id=$_SESSION['auth']['id'];
  $user_img=$_SESSION['auth']['zt_wechat_touimg'];
  $messobj = M('message');
  $nomessinfo=$messobj->mes_num($user_id,'0');
  $mesnum=sizeof($nomessinfo);
  $mesnum=$mesnum-1;
  $userinfo = $this->userinfo();
  //echo "<br><br><br><br><br>";
  //var_dump($$_SESSION['auth']);
  VIEW::assign(array(
    'userinfo' => $userinfo,
    'nomessinfo'=>$nomessinfo,
    'mesnum'=>$mesnum,
    'user_id'=>$user_id,
    "username"=>$_SESSION['auth']['zt_username'],
    'footer'=>3,
    'user_img'=>$user_img
    ));


  VIEW::display('user/index');
}

    /**
     * 
     * 
     * @return array 
     * @author guyonghao
     *         @date 2016��9��7������9:35:21
     * @version v1.0.0
     */
    function userinfo()
    {
      $user_id = $_SESSION['auth']['id'];
      $userobj = M('user');
      $userinfo = $userobj->userinfo($user_id);
      return $userobj;
    }


    function detail()
    {

     if($_POST){
       $user_id = $_SESSION['auth']['id'];

       $username=isset($_POST['username'])?addslashes($_POST['username']):'0';
       $company=isset($_POST['company'])?addslashes($_POST['company']):'0';
       $position=isset($_POST['position'])?addslashes($_POST['position']):'0';
       $tel=isset($_POST['tel'])?addslashes($_POST['tel']):'0';
       $truename=isset($_POST['truename'])?addslashes($_POST['truename']):'0';
       $num=isset($_POST['num'])?addslashes($_POST['num']):'0';
       $jintel=isset($_POST['jintel'])?addslashes($_POST['jintel']):'0';
       $email=isset($_POST['email'])?addslashes($_POST['email']):'0';
       $qq=isset($_POST['qq'])?addslashes($_POST['qq']):'0';

       if(empty($tel)&&empty($username)&&empty($company)&&empty($position)&&empty($truename)&&empty($num)){
         parent::showmessage('未填写完整', 'index.php?c=index&m=index');
       }

       $userobj = M('user');
       $arr = array(
         "zt_username" => $username,
         "zt_company" => $company,
         "zt_position" => $position,
         "zt_tel" => $tel,
         "zt_realname" => $truename,
         "zt_realnum" => $num,
         "zt_qq" => $qq,
         "zt_email" => $email,
         "zt_jintel" => $jintel
         );
             /*  $arr = array(
               "zt_username" => $username,
               "zt_company" => $company,
               "zt_position" => $position,
               "zt_tel" => $tel,
               "zt_realname" => $truename,
               "zt_realnum" => $num
               );*/

               $where=" id=".$user_id;
               $userobj->update($arr, $where);
               $arrwhere = "zt_username ='". $username."' and
               zt_company='". $company."' and   zt_position='" . $position." '
               and  zt_tel=" . $tel." and zt_realnum='".$num."'  and zt_realname='".$truename."'";

               $updateinfo =$userobj->slectOne($arrwhere);
               if ($updateinfo) {
                 $this->showmessage('更新成功', 'index.php?c=user&m=index');
               } else {
                 $this->showmessage('更新失败', 'index.php?c=user&m=index');
               }




             }else{
               $user_id=$_SESSION['auth']['id'];
         // echo "<br><br><br><br>";
         //  var_dump($user_id);
               $userobj = M('user');
               $userinfo = $userobj->userinfo($user_id);
               VIEW::assign(array(
                 'userinfo' => $userinfo
                 ));
               VIEW::display('user/userinfo');
             }


           }
    /**
     * @param unknowtype
     * @return return_type
     * @author guyonghao
     * @date 2016��9��7������3:13:05
     * @version v1.0.0
     */
    function update_realname(){
      if($_POST){
        $user_id = $_SESSION['auth']['id'];
        $realname=$_POST['realname'];
        if(empty($realname)){
          parent::showmessage('���³ɹ�', 'index.php?c=user&m=index');
        }
        $userobj = M('user');
        $arr = array(
          "zt_realname" => $realname
          );
        $updateinfo = $userobj->update($arr, $user_id);

        if ($updateinfo) {
          parent::showmessage('���³ɹ�', 'index.php?c=user&m=index');
        } else {
          parent::showmessage('����ʧ��', 'index.php?c=user&m=index');
        }

      }else{
        VIEW::display('user/realname');
      }
    }
    /**
     *�޸Ĺ�˾
     * @param unknowtype
     * @return return_type
     * @author guyonghao
     * @date 2016��9��7������3:13:05
     * @version v1.0.0
     */
    function update_company(){
      if($_POST){
        $user_id = $_SESSION['auth']['id'];
        $company=isset($_POST['company'])?addslashes($_POST['company']):'0';
        if(empty($company)){
          parent::showmessage('���³ɹ�', 'index.php?c=user&m=index');
        }
        $userobj = M('user');
        $arr = array(
          "zt_company" => $company
          );
        $updateinfo = $userobj->update($arr, $user_id);

        if ($updateinfo) {
          parent::showmessage('���³ɹ�', 'index.php?c=user&m=index');
        } else {
          parent::showmessage('����ʧ��', 'index.php?c=user&m=index');
        }
      }else{
        VIEW::display('user/company');
      }
    }
    
    function update_position(){
      if($_POST){
        $user_id = $_SESSION['auth']['id'];
        $position=isset($_POST['position'])?addslashes($_POST['position']):'0';
        if(empty($position)){
          parent::showmessage('���³ɹ�', 'index.php?c=user&m=index');
        }
        $userobj = M('user');
        $arr = array(
          "zt_position" => $position
          );
        $updateinfo = $userobj->update($arr, $user_id);

        if ($updateinfo) {
          parent::showmessage('更新成功', 'index.php?c=user&m=index');
        } else {
          parent::showmessage('更新失败', 'index.php?c=user&m=index');
        }
      }else{
        VIEW::display('user/position');
      }
    }
    /**
    * 
    * @param unknowtype
    * @return return_type
    * @author guyonghao
    * @version v1.0.0
    */
    function insert_bank(){
      if($_POST){
        $user_id = $_SESSION['auth']['id'];
        $name=isset($_POST['name'])?addslashes($_POST['name']):'0';
        $bank=isset($_POST['bank'])?addslashes($_POST['bank']):'0';
        $address=isset($_POST['address'])?addslashes($_POST['address']):'0';
        $num=isset($_POST['num'])?addslashes($_POST['num']):'0';
        if(empty($name)&&empty($bank)&&empty($address)&&empty($num)){
          parent::showmessage('未填写完整', 'index.php?c=index&m=index');
        }

        $userobj = M('user');
        $arr = array(
          "zt_bank_address" => $address,
          "zt_realname" => $name,
          "zt_bank_type" => $bank,
          "zt_bank_num" => $num
          );
        $where='id='.$user_id;
        $userobj->update($arr, $where);
        $arrwhere = "zt_bank_address='". $address."' and
        zt_realname='". $name."' and   zt_bank_type='" . $bank." '
        and  zt_bank_num=" . $num;



        $updateinfo =$userobj->slectOne($arrwhere);





        if ($updateinfo) {
          $this->showmessage('更新成功', 'index.php?c=user&m=index');
        } else {
          $this->showmessage('更新成功', 'index.php?c=user&m=index');
        }
      }else{
        $userobj = M('user');
        $user_id = $_SESSION['auth']['id'];
        $bankinfo =$userobj->userinfo($user_id);
        VIEW::assign(array(
          'bankinfo' => $bankinfo
          ));
        VIEW::display('user/bank');
      }
    }
    
    public function order(){
      $orderobj=M('product');
      $user_id = $_SESSION['auth']['id'];
      $orderinfo=$orderobj->perproduct($user_id);
      $shenqininfo=$orderobj->shenqinpro($user_id);
      //var_dump($orderinfo);
      if ($shenqininfo){
        VIEW::assign(array(
          'shenqingstatus'=>'1',
          'orderinfo' => $orderinfo,
          'shenqininfo' => $shenqininfo,
          'footer'=>2
          ));
      }else{
        VIEW::assign(array(
          'shenqingstatus'=>'0',
          'orderinfo' => $orderinfo,
          'footer'=>2

          ));
      }
      VIEW::display('user/order');
    }
  /**
  * 修改密码
  * @param unknowtype
  * @return return_type
  * @author guyonghao
  * @date 2016年9月22日上午11:08:56
  * @version v1.0.0
  */
  function update_pwd()
  {
    if ($_POST) {
      $user_id = $_SESSION['auth']['id'];
      $oldpwd = $_POST['oldpwd'];
      $newpwd = $_POST['newpwd'];
      $renewpwd = $_POST['renewpwd'];
      if (($newpwd != $renewpwd) || empty($oldpwd)) {

      }
      $userobj = M('user');
      $authusername=$_SESSION['auth']['zt_tel'];
      $pwdinfo = $userobj->findOne_by_userpwd($authusername, $oldpwd);
      if ($pwdinfo) {
        $arr = array(
          "zt_password" => $newpwd
          );
        $where='id=' . $user_id;
        $userobj->update($arr, $where);
        $updateinfo =$userobj->findOne_by_userpwd($authusername, $newpwd);

      }
      if (!$updateinfo) {
        $this->showmessage('更新失败', 'index.php?c=user&m=update_pwd');
      }
      $this->showmessage('更新成功', 'index.php?c=user&m=update_pwd');
    } else {
      VIEW::display('user/uppwd');
    }
  }
}

