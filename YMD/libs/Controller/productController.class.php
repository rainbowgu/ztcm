<?php
include 'libs/Common/init_Controller.php';
class productController   extends init_Controller
{
    function __construct()
    {
       
     parent::__construct();

      /* if($_SESSION['auth']['zt_tel']=='2'){
       //var_dump($_SESSION['auth']['zt_tel']);
        // echo "<br><br><br><br><br>122333";
       $geturl=_APP_."/index.php?c=weixin&m=usertel";
       echo "<script>alert('请绑定手机号');window.location.href='$geturl'</script>";
   }*/
   
   
}
public function test(){
    VIEW::display('product/test');
}
    /**
     *
     * @author guyonghao
     *         @date 2016��9��6������10:15:09
     * @version v1.0.0
     */
    function attend()
    {
        if (isset($_SESSION['auth']) && (! empty($_SESSION['auth']))) {
            $zt_user_id = $_SESSION['auth']['id'];
            $zt_pro_id =isset($_POST['proid'])?addslashes($_POST['proid']):'0';
            $zt_status = 0;
            $zt_money = - 1;
            // $zt_createtime = time();
            $arr = array(
                'zt_user_id' => $zt_user_id,
                'zt_pro_id' => $zt_pro_id,
                'zt_status' => $zt_status,
                'zt_money' => $zt_money,
                'zt_createtime' => date("Y-m-d h:i:sa", time())

                );
            $allobj = M('product');
            $selectinfo = $allobj->orderstatus($zt_user_id, $zt_pro_id);
            
            
            if ($selectinfo) {
                $this->showmessage('申请失败，已申请', 'index.php?c=index&m=index');
            }




            $tel=$_POST["tel"];
            $yanzhengma=$_POST["yanzhengma"];
            if(!$tel||$tel=='0'){
                $this->showmessage('手机号未填写', 'index.php?c=index&m=index');
            }
            if($_SESSION['yanzhenma']!=$yanzhengma){
                $this->showmessage('验证码错误', 'index.php?c=index&m=index');
            }

            if($_SESSION['tel']!=$tel){
                $this->showmessage('手机号不一致', 'index.php?c=index&m=index');
            }




            $zt_username= isset($_POST['name'])?addslashes($_POST['name']):'0';
            $zt_usernum=isset($_POST['num'])?$_POST['num']:'0';
            $zt_usertel= isset($_POST['tel'])?addslashes($_POST['tel']):'0';

            
            
            $arrinsert=array(
                'zt_user_id' => $zt_user_id,
                'zt_pro_id' => $zt_pro_id,
                'zt_status' => $zt_status,
                'zt_money' => $zt_money,
                'zt_createtime' => date("Y-m-d h:i:sa", time()),
                'zt_usernum'=>$zt_usernum,
                'zt_tel'=>$zt_usertel,
                'zt_usernumtype'=>1,
                'zt_username'=>$zt_username


                );

            $selectinfo2 = $allobj->orderstatus2($zt_user_id,$zt_pro_id,$zt_usertel,$zt_usernum);
            
            if ($selectinfo2) {
                $this->showmessage('申请失败，已申请', "index.php?c=product&m=detail&id=".$zt_pro_id);
            }




            $allinfo = $allobj->insert($arrinsert);



            if ($allinfo) {
                $mes = M('message');
                $arr = array(
                    "zt_mess_type" => '0',
                    "zt_mess_datetime" => date("Y-m-d h:i:sa", time()),
                    "zt_mess_title" => '项目申请',
                    "zt_mess_content" => '项目申请',
                    "zt_mess_userid" => $zt_user_id,
                    "zt_mess_status" => '0'
                    );
                $www = $mes->insert($arr);
                $this->showmessage('申请成功', "index.php?c=product&m=detail&id=".$zt_pro_id);
            } else {
                $this->showmessage('申请失败', "index.php?c=product&m=detail&id=".$zt_pro_id);
            }
        } else {
            $this->showmessage('申请失败', "index.php?c=product&m=detail&id=".$zt_pro_id);
        }
    }
    
    public function sqsure(){
        $proid=$_GET['id'];
        $zt_user_id = $_SESSION['auth']['id'];
        $zt_user_name=$_SESSION['auth']['zt_username'];
        $zt_realnum=$_SESSION['auth']['zt_realnum'];
        $zt_tel=$_SESSION['auth']['zt_tel'];
        $userobj = M('user');
        $userinfo = $userobj->userinfo($zt_user_id);
        
        
       // var_dump($userinfo);
        VIEW::assign(array(
            'userinfo'=>$userinfo,
            'proid' => $proid,
            'user_name' => $zt_user_name,
            'realnum' => $zt_realnum,
            'tel' => $zt_tel
            ));
        
        
        
        VIEW::display('product/sqsure');
        
        
    }

    
    function detail()
    {

     $jsobj = M('js');
        //$detailinfo = $jsobj->getSignPackage();
     
     $signPackage = $jsobj->GetSignPackage();
        //var_dump($signPackage);
     $user_id = $_SESSION['auth']['id'];
     $pro_id = $_GET['id'];
     $detailobj = M('product');
     $detailinfo = $detailobj->detail($pro_id);
     if($detailinfo["zt_pro_status"]=='2'){
        $pro_status="0";
    }else{
        $pro_status="1";
    }
        //var_dump($pro_status);
    
    $title = $detailinfo['zt_pro_title'];
    $allobj = M('product');
    
    
    
    $selectinfo = $allobj->orderstatus($user_id, $pro_id);
    if($selectinfo){
        $status = '0';
    }else{
        $status = '1';
    }
    
    
        //$selectinfo = $allobj->selectorder($user_id, $pro_id);
    
    
    
    
        /*if ($selectinfo) {
            switch ($selectinfo['zt_status']) {
                case 0:
                    $status = '0';
                    break;
                case 1:
                    $status = '1';
                    break;
                case 2:
                    $status = '2';
                    break;
                default:
                    $status = '-1';
            }
        } else {
            $status = '-1';
        }*/
        //var_dump($detailinfo);
    $_app_=_APP_;
    //    $_app_="http://ym.njztcm.cn";

        VIEW::assign(array(
            'detailinfo' => $detailinfo,
            'title' => $title,
            'status' => $status,
            'pro_status'=>$pro_status,
            'signPackage'=>$signPackage,
            '_app_'=>$_app_
            ));
        VIEW::display('product/detail');
    }

    /**
     *
     * @author guyonghao
     *         @date 2016��9��5������3:53:15
     * @version v1.0.0
     */
    function index()
    {
        $allobj = M('product');
        $allinfo = $allobj->allproduct();
        VIEW::assign(array(
            'allinfo' => $allinfo,
            
            ));
        VIEW::display('product/index');
    }

    /**
     *
     * @author guyonghao
     *         @date 2016 2:01:58
     * @version v1.0.0
     */
    private function showmessage($info, $url)
    {
        echo "<script>alert('$info');window.location.href='$url'</script>";
        exit();
    }

    
    
    
    
    function updateorder()
    {
        if (isset($_FILES['pictures']) && $_POST) {
            ///index.php?c=product&m=updateorder&id=17&status=0
             $zt_pro_id = $_POST['proid'];
                 // echo "<script>alert('".$_POST['ordernum']."')";
       /* if($_POST['ordernum']==NULL || $_POST['ordernum']==""){

             echo "<script>alert('订单号未填写');window.location.href='index.php?c=product&m=updateorder&id=".$zt_pro_id."&status=0'</script>";
             exit();
    
        }*/

            $num=isset($_POST['num'])?addslashes($_POST['num']):'0';
         $ordernum=isset($_POST['ordernum'])?addslashes($_POST['ordernum']):'0';
      

            $tel=isset($_POST['tel'])?addslashes($_POST['tel']):'0';
            $zt_user_id = $_SESSION['auth']['id'];
           // $zt_pro_id = $_POST['proid'];
            $ctime = date('Y-m-d H:i:s', time());
            $fileArray = $_FILES['pictures'];
       // var_dump($fileArray);
          //var_dump($fileArray["tmp_name"]["1"]);
          //    echo "<script>alert('".$fileArray."')";
       if($fileArray['tmp_name']["0"]==NULL ||$fileArray['tmp_name']["0"]==""){
           echo "<script>alert('未选择图片');window.location.href='index.php?c=product&m=updateorder&id=".$zt_pro_id."&status=0';</script>";
           exit();
        }
         if($fileArray['type']["0"]==NULL ||$fileArray['type']["0"]==""){
           echo "<script>alert('图片格式出错');window.location.href='index.php?c=product&m=updateorder&id=".$zt_pro_id."&status=0';</script>";
           exit();
        }

            $upload_dir = _URL_.'/public/upimg/';
            foreach ($fileArray['error'] as $key => $error) {
                if ( '0' == UPLOAD_ERR_OK) {
                    $temp_name = $fileArray['tmp_name'][$key];
                    $strr = explode('/', $fileArray['type'][$key]);
                    if($strr[1] == NULL ||$strr[1]="" ){
                        $strr[1]='png';
                    }
                    $file_name = time() . $key . '.' . $strr[1];
                    move_uploaded_file($temp_name, $upload_dir . $file_name);

//var_dump($temp_name);
//var_dump($strr);
//var_dump($file_name);
                    // exit;
                } else {
                    echo '图片上传错误';
                    echo 'error';
                    echo  UPLOAD_ERR_OK;
                    exit;
                }
                if ($key == 0) {
                    $imagename = $file_name;
                }


                if(!$imagename){
                   $this->showmessage('图片未上传', 'index.php?c=user&m=order');
                   exit();
               }

           }

           $allobj = M('product');

           $arr = array(
            "zt_upload" => $imagename,
            "zt_status" => '1',
            "zt_ordernum" => $ordernum,
            "zt_tel" => $tel，
            "zt_updatetime"=>date("Y-m-d h:i:s", time())
            );
                //$reuploadinfo = $allobj->selectorder($zt_user_id, $zt_pro_id);

           if($_POST['status']=='0'){

            $where = "zt_pro_id='" . $zt_pro_id . "'and zt_user_id='" . $zt_user_id . "' and zt_status= 0";
        }

        if($_POST['status']=='3'){

            $where = "zt_pro_id='" . $zt_pro_id . "'and zt_user_id='" . $zt_user_id . "' and zt_status= 3";
        }

        


        

        $allobj->updateimg($arr, $where);
        
        $uploadinfo = $allobj->selectorder($zt_user_id, $zt_pro_id,'0');


        if ($uploadinfo['zt_upload']) {
            $mes = M('message');
            $arr = array(
                "zt_mess_type" => '0',
                "zt_mess_datetime" => date("Y-m-d h:i:sa", time()),
                "zt_mess_title" => '成功上传',
                "zt_mess_content" => '上传凭证成功',
                "zt_mess_userid" => $zt_user_id,
                "zt_mess_status" => '0'
                );
            $www = $mes->insert($arr);

            

            $this->showmessage('上传成功，等待审核', 'index.php?c=user&m=order');
        } else {
            $this->showmessage('上传成功，等待审核', 'index.php?c=index&m=index');
        }
        
    } else {
        if(isset($_GET['id'])){
           $zt_user_id = $_SESSION['auth']['id'];
           $zt_pro_id = $_GET['id'];
         $status=$_GET['status'];
           $orderobj = M('product');
               // echo "<br><br><br><br>";
            //var_dump($zt_user_id);
           $orderinfo=$orderobj->selectorder($zt_user_id,$zt_pro_id,'0');
           if($_GET['status']=='0'){
               $orderinfo=$orderobj->selectorder($zt_user_id,$zt_pro_id,'0');
           }

           if($_GET['status']=='3'){
               $orderinfo=$orderobj->selectorder($zt_user_id,$zt_pro_id,'3');
           }
           

           
     

          //echo "<br><br><br><br>";
           // var_dump($status);var_dump($zt_pro_id);
           VIEW::assign(array(
            'proid' => $zt_pro_id,
            'status' => $status,
            'orderinfo'=>$orderinfo
            ));
       }
       VIEW::display('product/test');
   }
}


}
