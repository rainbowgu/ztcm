<?php
class init_Controller{
   //public $auth;
  /* public function __construct()
    {
        $authobj = M('auth');
        $this->auth = $authobj->getauth();
       // if (empty($this->auth) && (gyh::$method != 'login')) {
       //     $this->showmessage('���ȵ�¼', 'index.php?c=index&m=login');
       // }
        if (!isset($_SESSION['auth'])&& (gyh::$method != 'login')){
            $this->showmessage('请登录', 'index.php?c=index&m=login');
        }
    }*/
    public function __construct()
    {
    
     if(!$_SESSION['auth']['zt_wechat_openid']){
      //echo "1111";
         $theurl='http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
         $_SESSION['theurl']=$theurl;
        $getopidurl=_APP_."/index.php?c=weixin&m=getUserDetail";
        header('Location:'.$getopidurl);
      }






      //判断手机号
   
    }



    private function showmessage($info, $url)
    {
        echo "<script>alert('$info');window.location.href='$url'</script>";
        exit();
    }
}