<?php
include 'libs/Common/init_Controller.php';

class bossController extends init_Controller
{

    public function __construct()
    {
     //   ini_set("display_errors", "On");
//
//error_reporting(E_ALL | E_STRICT);
        //parent::__construct();
        //判断权限
    }
    function updatepro(){
       if($_POST){

        $this->showmessage('有未填写 ', 'index.php?c=boss&m=xiugai&id=16');
    }
}















function yue(){

    $user_id = '1';

    $fundobj=M('fund');

    $fundinfo=$fundobj->fundhis($user_id);
    $fundtotalinfo=$fundobj->fundtotallast($user_id);
    //var_dump($fundtotalinfo);
    //查询所有的未解冻状态
    $fundall=$fundobj->fundone_ALL($user_id);
    $coolnum=0;

    foreach ($fundall as $key => $value) {
       $time1=strtotime($value['zt_datetime']);

       $time2=time();
       $days=2;
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

   //  var_dump($arr);















}






function xiugai(){
 if($_POST){

    if (empty($_POST['title']) || empty($_POST['goal'])
        ){
        $this->showmessage('有未填写 ', 'index.php?c=index&m=login');
}


$company=isset($_POST['company'])?addslashes($_POST['company']):'0';
$title=isset($_POST['title'])?addslashes($_POST['title']):'0';
$simplecontent=isset($_POST['simplecontent'])?addslashes($_POST['simplecontent']):'0';
$process=isset($_POST['process'])?addslashes($_POST['process']):'0';
$zt_pro_mubiao=isset($_POST['mubiao'])?addslashes($_POST['mubiao']):'0';
$address=isset($_POST['address'])?addslashes($_POST['address']):'0';
$tel=isset($_POST['tel'])?addslashes($_POST['tel']):'0';
$companycontent=isset($_POST['companycontent'])?addslashes($_POST['companycontent']):'0';
$goal=isset($_POST['goal'])?addslashes($_POST['goal']):'0';
$up=isset($_POST['up'])?addslashes($_POST['up']):'0';
$down=isset($_POST['down'])?addslashes($_POST['down']):'0';
$tent=isset($_POST['news_content'])?$_POST['news_content']:'0';


$arr=array(
    "zt_pro_company"=>$company,
    
    "zt_pro_title"=>$title,
    "zt_pro_simplecontent"=>$simplecontent,
    "zt_pro_process"=>$process,
    "zt_pro_secondimg"=>$secondimg,
    "zt_pro_address"=>$address,
    "zt_pro_tel"=>$tel,
    "zt_pro_companycontent"=>$companycontent,
    "zt_pro_goal"=>$goal,
    "zt_pro_datetime"=>date("Y-m-d H:i:s", time()),
    "zt_pro_status"=>'1',
    "zt_pro_mubiao"=>$zt_pro_mubiao,
    "zt_pro_up"=>$up,
    "zt_pro_down"=>$down,
    "zt_pro_tent"=>$tent
    
    
    );
$proid=$_POST['proid'];
$proobj=M('boss');
            //更新
$where='id='.$proid;
$proinfo=$proobj-> updatepro($arr,$where);
// 围坐判断           
$this->showmessage('修改成功', 'index.php?c=boss&m=prolist');





}else{
    $user_id = $_SESSION['auth']['id'];
    $pro_id = $_GET['id'];
    $detailobj = M('boss');
    $detailinfo = $detailobj->detail($pro_id);
    
    VIEW::assign(array(
        'detailinfo' => $detailinfo,
        'proid'=>$pro_id
        
        ));
    VIEW::display('boss/xiugai');
}

}

function tixiansuccess(){
   if($_GET){

//fund表id
       $id=$_GET['id'];
       $userid=$_GET['userid'];

       $bossobj=M('boss');
//真实金额-提成
     //获取提成金额
       $ticheng_info= $bossobj->fund_select_id($id);
       $goal=$ticheng_info["zt_money"];
//var_dump($ticheng_info);
       $truetotal_info= $bossobj-> total_true_last($userid);
       $truetotal=$truetotal_info["user_e_num"];


       if ($truetotal<$goal) {
        $this->showmessage('金额不足' , 'index.php?c=boss&m=tixian');
    } 
   // var_dump($goal);
   // $a=-intval($goal);
  //  echo $a;
    $newtotalfund=(number_format($truetotal, 2))+(-(intval($goal)));
       //var_dump($newtotalfund);


//申请状态更改






    $arr=array(

        "user_e_type"=>2

        );

    $where="user_e_id = ".$userid." and pro_id = 0 and fund_id=".$id;
    $bossinfo1= $bossobj->total_update_toal($arr,$where);


        //存入数据库


    $upinfo=array(

        "user_e_type"=>1,
        "datetime"=>date("Y-m-d H:i:s", time()),
        "user_e_id"=>$userid,
        "user_e_num"=>$newtotalfund,
        "pro_id"=>0,

        "fund_id"=>$id 
        );

 // var_dump($upinfo);

    $insertinfo=$bossobj->inserttotal($upinfo);



    $arr2=array(

        "zt_type"=>4

        );

    $where="id=".$id;
    $bossinfo2= $bossobj->fund_update_atm($arr2,$where);










       // $truewhere="zt_user_id = ".$userid." and zt_pro_id = 0 and fund_id=".$id." and user_e_num= ".$newtotalfund." and user_e_type = 1";
    $ifinfo1= $bossobj->total_select_if($userid,$id,$newtotalfund);

       // $arrwhere=="zt_user_id = ".$userid." and zt_pro_id = 0 and fund_id=".$id." and zt_type= 2";

    $ifinfo2= $bossobj->total_select_shenqin_if($userid,$id);
    if($ifinfo1){
        $this->showmessage('提现没好', 'index.php?c=boss&m=tixian');
    }
    if($ifinfo2){
        $this->showmessage('提现没好', 'index.php?c=boss&m=tixian');
    }

    $this->showmessage('提现好了', 'index.php?c=boss&m=tixian');

}
}








function tixian(){


    $fundobj=M('boss');

    $fundinfo=$fundobj->fund_select_atm();
    $fundinfo2=$fundobj->fund_user_sel();
    $fundinfo3=$fundobj->over_fund_user_sel();
   // var_dump($fundinfo2);
    //var_dump($fundinfo3);
    VIEW::assign(array(
        'fundinfo' => $fundinfo2,
        'fundinfo2' => $fundinfo3
        ));
    VIEW::display('boss/tixian');
}



function orderdetail(){
 $id=$_GET['id'];
// var_dump($id);
 $orderobj = M('boss');
 $orderinfo = $orderobj->selectOdetail($id);
   //var_dump( $orderinfo);
 VIEW::assign(array(
    'orderinfo' => $orderinfo,
    'userinfo'=>$userinfo
    ));
 VIEW::display('boss/detail');
}





function orderpass()
{
    $orderobj = M('boss');
    $orderinfo = $orderobj->shenheallorder('1');

    $orderinfo2 = $orderobj->shenheallorder('2');
//var_dump($orderinfo2);
    VIEW::assign(array(
        'orderinfo' => $orderinfo,
        'orderinfo2' => $orderinfo2
        ));
    VIEW::display('boss/index');
}



public function addn(){
    if($_POST){

        $tent=isset($_POST['news_content'])?addslashes($_POST['news_content']):'0';
        var_dump($tent);
        
    }else{

        var_dump(_APP_);
        VIEW::display('boss/addpro');}
    }

    public function prolist(){
     $orderobj = M('boss');
     $proinfo = $orderobj->selsctallpro();
        //var_dump($proinfo);

     VIEW::assign(array(
        'proinfo' => $proinfo
        ));
     VIEW::display('boss/prolist');




 }



 function insertproduct(){
    if($_POST){
        if (
            empty($_POST['title']) ||
            
            
            empty($_POST['goal'])
            ){
            $this->showmessage('有未填写 ', 'index.php?c=index&m=login');
    }
    
    
    $company=isset($_POST['company'])?addslashes($_POST['company']):'0';
    $title=isset($_POST['title'])?addslashes($_POST['title']):'0';
    $simplecontent=isset($_POST['simplecontent'])?addslashes($_POST['simplecontent']):'0';
    $process=isset($_POST['process'])?addslashes($_POST['process']):'0';
    $zt_pro_mubiao=isset($_POST['mubiao'])?addslashes($_POST['mubiao']):'0';
    $address=isset($_POST['address'])?addslashes($_POST['address']):'0';
    $tel=isset($_POST['tel'])?addslashes($_POST['tel']):'0';
    $companycontent=isset($_POST['companycontent'])?addslashes($_POST['companycontent']):'0';
    $goal=isset($_POST['goal'])?addslashes($_POST['goal']):'0';
    $up=isset($_POST['up'])?addslashes($_POST['up']):'0';
    $down=isset($_POST['down'])?addslashes($_POST['down']):'0';
    
    $tent=isset($_POST['news_content'])?$_POST['news_content']:'0';
            //var_dump($tent);
    
    
    
    $fileArray = $_FILES['pictures'];
    $upload_dir = 'C:/phpStudy/YMD/public/upimg/';
    foreach ($fileArray['error'] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            $temp_name = $fileArray['tmp_name'][$key];
            $strr = explode('/', $fileArray['type'][$key]);
            $file_name = time() . $key . '.' . $strr[1];
            move_uploaded_file($temp_name, $upload_dir . $file_name);
        } else {
            echo 'error';
        }
        if ($key == 0) {
            $firstimg = $file_name;
        }
        if($key==1){
            $secondimg = $file_name;
        }
    }
    
    
    $arr=array(
        "zt_pro_company"=>$company,
        "zt_pro_firstimg"=>$firstimg,
        "zt_pro_title"=>$title,
        "zt_pro_simplecontent"=>$simplecontent,
        "zt_pro_process"=>$process,
        "zt_pro_secondimg"=>$secondimg,
        "zt_pro_address"=>$address,
        "zt_pro_tel"=>$tel,
        "zt_pro_companycontent"=>$companycontent,
        "zt_pro_goal"=>$goal,
        "zt_pro_datetime"=>date("Y-m-d H:i:s", time()),
        "zt_pro_status"=>'1',
        "zt_pro_mubiao"=>$zt_pro_mubiao,
        "zt_pro_up"=>$up,
        "zt_pro_down"=>$down,
        "zt_pro_tent"=>$tent
        
        
        );
    $proobj=M('product');
    $proinfo=$proobj-> insertpro($arr);
    if($proinfo){
        $this->showmessage('发布成功', 'index.php?c=boss&m=prolist');
    }else{
        $this->showmessage('发布失败，请联系管理员', 'index.php?c=boss&m=prolist');
    }
    
}else{


    VIEW::display('boss/addpro');
}



}



function shenhefail(){

    $id = $_GET['id'];
        // 查询具体订单 获取项目id
    $orderobj = M('boss');
    $orderdetail = $orderobj->selectorder($id);
        // 获取当前项目的金额
    $productdetail = $orderobj->selectproduct($orderdetail['zt_pro_id']);
    $goal = $productdetail['zt_pro_goal'];
        // 将值更新到数据库中
    $arr = array(

        "zt_status" => '3'
        );
    $where = "id=" . $id;
    $orderinfo = $orderobj->shenhe($arr, $where);
    
    if($orderinfo){
        $this->showmessage('审核 不通过', 'index.php?c=boss&m=orderpass');
    }
    
}

function jinenum(){
    $id = $_GET['id'];
    $orderobj = M('boss');
    $orderdetail = $orderobj->selectorder($id);
        // 获取当前项目的详细内容
    $productdetail = $orderobj->selectproduct($orderdetail['zt_pro_id']);
     //var_dump($productdetail);

    $upwhere =' id ='.$orderdetail['zt_user_id'];
    //var_dump(  $upwhere);
    $Upinfo  = $orderobj->  slectOne($upwhere);
    //  var_dump(  $Upinfo);
    $fatherid=$Upinfo['zt_father'];
    //var_dump($fatherid);

    if($fatherid!=0 && $fatherid!=NULL){

    //var_dump($fatherid);
        $Uptruewhere=' id='.$fatherid;
        $Uptrueinfo  = $orderobj->  slectOne($Uptruewhere);
        //var_dump($Uptrueinfo);
        VIEW::assign(array(
            'Uptrueinfo'=>$Uptrueinfo,
            'userid'=>$id,
            'upstatus'=>2
            ));
    //$num=$_POST['num'];
    }else{
       VIEW::assign(array(
        'userid'=>$id,
        'upstatus'=>1
        ));

   }




        // var_dump($userinfo);
   
   
   
   
   VIEW::display('boss/jine');





   
}


function shenhe()
{    

   $id = $_POST['id'];
   // 查询具体订单 获取项目id
   $orderobj = M('boss');
   $orderdetail = $orderobj->selectorder($id);
   // 获取当前项目的详细内容
   $productdetail = $orderobj->selectproduct($orderdetail['zt_pro_id']);
   $goal=$_POST['num'];
   $days=$_POST['days'];


   //当事人
   //更新订单状态
   $arr = array(
    "zt_money" => $goal,
    "zt_status" => '2'
    );
   $where = "id=" . $id;
   $orderinfo = $orderobj->shenhe($arr, $where);
   $title=mb_substr($productdetail['zt_pro_title'] , 0 , 10);
   $title=$title."...";


   // 将数值加入到资金流水中
   $fundarr = array(
      "zt_days"=>$days,
      "zt_order_tel"=> $orderdetail['zt_tel'],
      "zt_pro_name"=> $title,
      "zt_order_id"=> $id,
      "zt_user_id" => $orderdetail['zt_user_id'],
      "zt_pro_id" => $orderdetail['zt_pro_id'],
      "zt_money" => $goal,
      "zt_remark" => 'null',
      "zt_type" => '2',
      "zt_datetime" =>date("Y-m-d H:i:s", time())
      );
   $fundinfo = $orderobj->insertfund($fundarr);
   if (!$fundinfo) {
    echo "failfundinfo";
   }
 //数值加入余额表
 // 真实金额+项目金额
 // 1 查询最后一条余额
$zt_user_id = $orderdetail['zt_user_id'];
$totalinfo = $orderobj->total_select_truetotal($zt_user_id,'1');
if (! $totalinfo) {
 echo "totalinfo";
 $totalinfo['user_e_num'] =0;

}
  //插入数据  真实余额
$new_total = intval($totalinfo['user_e_num'] * 100 + 100 * $goal)/ 100;
if ($new_total < 0) {
 echo "new_total";
}


$totalarr = array(
    "user_e_id" =>  $zt_user_id,
    "user_e_num" => $new_total,
    "datetime" => date("Y-m-d H:i:s", time()),
    "user_e_type" => 1,
    "pro_id" => $id
    );
$totalininfo = $orderobj->inserttotal($totalarr);

 // 虚拟金额+项目金额
$totalinfo2 = $orderobj->total_select_truetotal($zt_user_id,'4');
if (! $totalinfo2) {
 echo "totalinfo";
 $totalinfo2['user_e_num'] =0;

}
$new_total2 = intval($totalinfo2['user_e_num'] * 100 + 100 * $goal)/ 100;
if ($new_total2 < 0) {
 echo "new_total2";
}
$totalarr2 = array(
    "user_e_id" =>  $zt_user_id,
    "user_e_num" => $new_total2,
    "datetime" => date("Y-m-d H:i:s", time()),
    "user_e_type" => 4,
    "pro_id" => $id
    );
        //var_dump($totalarr);
$totalininfo2 = $orderobj->inserttotal($totalarr2);







if($_POST['fathernum']){



   $fathernum=$_POST['fathernum'];
  //根据userid获取fatherid 
   $upwhere =' id ='.$orderdetail['zt_user_id'];
   $Upinfo  = $orderobj->  slectOne($upwhere);
   
   $fatherid=$Upinfo['zt_father'];
   if($fatherid!=0&&$fatherid!="")
//根据fatherid和fathernum+type 5 插入资金表
       $upfundarr = array(
          "zt_days"=>0,
          "zt_order_tel"=> $orderdetail['zt_tel'],
          "zt_pro_name"=> $title,
          "zt_order_id"=> $id,
          "zt_user_id" => $fatherid,
          "zt_pro_id" => $orderdetail['zt_pro_id'],
          "zt_money" => $fathernum,
          "zt_remark" => $orderdetail['zt_user_id'],
          "zt_type" => '5',
          "zt_datetime" =>date("Y-m-d H:i:s", time())
          );
   $upfund2info = $orderobj->insertfund($upfundarr);

 //根据资金 实际金额+num  虚拟金额+num

 // 真实金额+项目金额额
   //$zt_user_idup = $fathernum;
   $totalinfoup = $orderobj->total_select_truetotal($fatherid,'1');
   if (! $totalinfoup) {
     echo "totalinfoup";
     $totalinfoup['user_e_num'] =0;

 }
//相加
 $new_totalup = intval($totalinfoup['user_e_num'] * 100 + 100 * $fathernum)/ 100;

 if ($new_totalup < 0) {
     echo "new_total";
 }
 // 2 插入数据
 $totalarrup = array(
    "user_e_id" =>  $fatherid,
    "user_e_num" => $new_totalup,
    "datetime" => date("Y-m-d H:i:s", time()),
    "user_e_type" => 1,
    "pro_id" => $id
    );
 $totalininfoup = $orderobj->inserttotal($totalarrup);




 // 虚拟金额+项目金额
 $totalinfo2up = $orderobj->total_select_truetotal($fatherid,'4');
 if (! $totalinfo2up) {
     echo "totalinfo";
     $totalinfo2up['user_e_num'] =0;

 }
 $new_total2up = intval($totalinfo2up['user_e_num'] * 100 + 100 * $fathernum)/ 100;
 if ($new_total2up < 0) {
     echo "new_total2";
 }
        // 2 插入数据
 $totalarr2up = array(
    "user_e_id" =>  $fatherid,
    "user_e_num" => $new_total2up,
    "datetime" => date("Y-m-d H:i:s", time()),
    "user_e_type" => 4,
    "pro_id" => $id
    );
        //var_dump($totalarr);
 $totalininfo2up = $orderobj->inserttotal($totalarr2up);



}

if ($totalininfo&&$totalininfo2) { 
    $mes = M('message');
    $arr=array(
        "zt_mess_type"=>'0',
        "zt_mess_datetime"=>date("Y-m-d H:i:s", time()),
        "zt_mess_title"=>'项目转入',
        "zt_mess_content"=>$title,
        "zt_mess_userid"=>$zt_user_id,
        "zt_mess_status"=>'0',
        );
    $www=$mes->insert($arr);
    
    $this->showmessage('审核通过，资金已转入', 'index.php?c=boss&m=orderpass');
    
} else {
    $this->showmessage('操作失败，请联系管理员', 'index.php?c=boss&m=orderpass');
    
}
}




private function showmessage($info, $url)
{
    echo "<script>alert('$info');window.location.href='$url'</script>";
    exit();
    
}

}
?>