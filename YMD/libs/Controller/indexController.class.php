<?php
include 'libs/Common/init_Controller.php';
error_reporting(E_ALL);
class indexController extends init_Controller
{

  function tsss(){
       



    }


    function swhz(){
        if($_POST){
           if (empty($_POST['tel']) || empty($_POST['name']) ||empty($_POST['quyu'])){
               $this->showmessage('有未填写', 'index.php?c=index&m=swhz');
           }

           $tel=isset($_POST['tel'])?addslashes($_POST['tel']):'0';
           $name=isset($_POST['name'])?addslashes($_POST['name']):'0';
           $quyu=isset($_POST['quyu'])?addslashes($_POST['quyu']):'0';
           $mark=isset($_POST['mark'])?addslashes($_POST['mark']):'0';
           $swobj=M('index');

           $arr=array(
            "username"=>$name,
            "usertel"=>$tel,
            "quyu"=>$quyu,
            "beizhu"=>$mark


            );
           $seinfo=$swobj->insertswhz($arr);

           if($seinfo){
            $this->showmessage('已提交申请', 'index.php?c=index&m=swhz');
        }else{
            $this->showmessage('已提交申请', 'index.php?c=index&m=swhz');
        }





    }else{
        VIEW::display('index/swhz');
    }






}

    /**
    * 初始化登录状态监测
    * @author guyonghao
    * @date 2016年9月2日下午2:01:00
    * @version v1.0.0
    */
//rent::__construct();
    
    /*public function Register()
    {
        if ($_POST) {
            $auobj=M('auth');
            if (empty($_POST['username']) || empty($_POST['password']) ||empty($_POST['repassword'])||empty($_POST['tel']
               )
                ){
                    $this->showmessage('账号或 密码错误', 'index.php?c=index&m=login');
            }
            
            $username=addslashes($_POST['username']);
            $password=addslashes($_POST['password']);
            $repassword=addslashes($_POST['repassword']);
            $tel=addslashes($_POST['tel']);
            if ($auobj->checknouser($username)){
                $this->showmessage('账号或 密码错误', 'index.php?c=index&m=login');
            }
            if (($password != $repassword)) {
                $this->showmessage('账号或 密码错误', 'index.php?c=index&m=login');
            }
            $arr=array(
                "zt_username"=>$username,
                "zt_password"=>$password,
                "zt_tel"=>$tel,
                "zt_createtime"=>date("Y-m-d h:i:s", time())
                 
            );
          
            $reginfo=$auobj-> insert($arr);
            if($reginfo){
                $this->showmessage('注册成功', 'index.php?c=index&m=login');
            }else{
                $this->showmessage('账号或 密码错误', 'index.php?c=index&m=login');
            }
             
            
            
         
        } else {
            VIEW::display('index/register');
        }
    }*/
    /**
    * 登录主程序
    * @author guyonghao
    * @date 2016年9月2日下午2:01:22
    * @version v1.0.0
    */
    public function login()
    {
        if ($_POST) {
            $this->checklogin();
        } else {
            VIEW::display('index/login');
        }
    }
    /**
    * 退出登录 清楚session
    * @author guyonghao
    * @date 2016年9月2日下午2:02:00
    * @version v1.0.0
    */
    public function logout()
    {
        $authobj = M('auth');
        $authobj->logout();
        $this->showmessage('退出成功', 'index.php?c=index&m=login');
    }
    
    /**
    * 调用model层的数据返回 监测登录状态
    * @author guyonghao
    * @date 2016年9月2日下午2:03:34
    * @version v1.0.0
    */
    private function checklogin()
    {
        $authobj = M('auth');
        if ($authobj->loginsubmit()) {
            $this->showmessage('登陆成功', 'index.php?c=index&m=index');
        } else {
            $this->showmessage('账号或 密码错误', 'index.php?c=index&m=login');
        }
    }
    //输出对话框
    private function showmessage($info, $url)
    {
        echo "<script>alert('$info');window.location.href='$url'</script>";
        exit();
        
    }





    public function index(){
        $indexobj = M('product');
        $product=$indexobj->index1();

        VIEW::assign(array(
            'product'=>$product,
            'footer'=>1
            ));
        VIEW::display('index/index');
    }
    public function index2(){
      
     VIEW::display('index/index2');
 }
}
