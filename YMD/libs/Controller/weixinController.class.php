<?php
//error_reporting(E_ALL);
define('APPID','wx62bbb296b4159e8d');
define('APPSECRET','524435fd6cd1034a3126bc68f28d516d');
define('TOKEN','weixin');
class weixinController{
  function __construct()
    {
       //parent::__construct();
        //echo "1000000000000";
        $this->_appid = APPID;
    $this->_appsecret =APPSECRET;
    $this->_token = TOKEN;
    }

/*function createCode($userId)  
{  
    static $sourceString = array(
              0,1,2,3,4,5,6,7,8,9,10,  
              'a','b','c','d','e','f',  
              'g','h','i','j','k','l',  
              'm','n','o','p','q','r',  
              's','t','u','v','w','x',  
              'y','z'  
            );  
  
    $num = $userId;  
    $code = '';  
    while($num)  
    {  
        $mod = $num % 36;  
        $num = (int)($num / 36);  
        $code = "{$sourceString[$mod]}{$code}";  
    }  
      
    //判断code的长度  
    if( empty($code[4]))  
        str_pad($code,5,'0',STR_PAD_LEFT);  
  
    return $code;  
}  
function getInviteCode() { 
list($s1, $s2) = explode(' ', microtime()); 
return sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000); 
}

function ttt(){
  echo "111";
  $a=$this-> getInviteCode();
  $b=$this->createCode($a);
  var_dump($b);
  var_dump($a);
}*/

  function make_coupon_card() {
        $code = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $rand = $code[rand(0,25)]
        .strtoupper(dechex(date('m')))
        .date('d').substr(time(),-5)
        .substr(microtime(),2,5)
        .sprintf('%02d',rand(0,99));
        for(
            $a = md5( $rand, true ),
            $s = '0123456789ABCDEFGHIJKLMNOPQRSTUV',
            $d = '',
            $f = 0;
            $f < 8;
            $g = ord( $a[ $f ] ),
            $d .= $s[ ( $g ^ ord( $a[ $f + 8 ] ) ) - $g & 0x1F ],
            $f++
            );
        return $d;
    }
    
    function adc(){
        echo $this->make_coupon_card();
    }


function telsure(){



$tel=$_POST["tel"];
//$yanzhengma=$_POST["yanzhengma"];
$yanzhengma=isset($_POST['yanzhengma'])?addslashes($_POST['yanzhengma']):'0';
$yaoqingma=isset($_POST['yaoqing'])?addslashes($_POST['yaoqing']):'0';
if(!$tel||$tel=='0'){
  $this->showmessage('手机号未填写', 'index.php?c=weixin&m=usertel');
}
if($_SESSION['yanzhenma']!=$yanzhengma){
  $this->showmessage('验证码错误', 'index.php?c=weixin&m=usertel');
}

if($_SESSION['tel']!=$tel){
  $this->showmessage('手机号不一致', 'index.php?c=weixin&m=usertel');
}


$user_id = $_SESSION['auth']['id'];
$where="id =". $user_id;
$yanzhengma=$this->make_coupon_card();

if($yaoqingma){
$arr=array(
     "zt_tel"=>$tel,
     "zt_yaoqingma"=>$yanzhengma,
"zt_father"=>$yaoqingma
  );
}else{

$arr=array(
     "zt_tel"=>$tel,
     "zt_yaoqingma"=>$yanzhengma,
     "zt_father"=>0
  );
}

 $userobj = M('user');




 
  $telinfo=$userobj->slectOne($where);
  if($telinfo['zt_tel']!='2'){
    $this->showmessage('系统手机号出错', 'index.php?c=index&m=index');
  }
 




 $userinfo = $userobj->update($arr, $where);
  
  $arrwhere="id =". $user_id." and zt_tel=".$tel;
  $bandinfo=$userobj->slectOne($arrwhere);

  if($bandinfo){
           
    $userinfo2=$userobj->userinfo($user_id);
          
      $_SESSION['auth']=$userinfo;




    $this->showmessage('绑定成功', 'index.php?c=index&m=index');
}else{
  $this->showmessage('绑定失败', 'index.php?c=weixin&m=usertel');
}


}
    function usertel(){
    VIEW::display('user/user_tel');

    }
    function getUserDetail(){
    //1.获取到code
    //$appid = 'wxaa0a903750480aa8';
    //$appsecret =  '94065e69c390cceaa2bf5d1895858387';
    $redirect_uri = urlencode(_APP_."/index.php?c=weixin&m=_getopenId");
    $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$this->_appid."&redirect_uri=".$redirect_uri."&response_type=code&scope=snsapi_base&state=123#wechat_redirect";
    //echo $url;
    header('location:'.$url);
  }

  public function _getopenId(){
      
       
        //通过code换取token  
      //$code =$codecode; 
      $code =$_GET['code']; 
    //echo "<br><br><br><br><br>11333333333333";
      $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$this->_appid."&secret=".$this->_appsecret."&code=$code&grant_type=authorization_code"; 
    
      $json = file_get_contents($url);

      $arr = json_decode($json,true);  
      $token = $arr['access_token'];  
      $openid = $arr['openid']; 
      $userobj=M('weixin');

            $userinfo=$userobj->useropenid($openid);

            if($userinfo){
            $_SESSION['auth']=$userinfo;
              // if(!$_SESSION['theurl']){
               // echo "<script>alert('地址不存在'); </script>";
//$_SESSION['theurl']='index.php?c=user&m=index';
               //  header('location:'.$_SESSION['theurl']);
              // }else{
                  header('location:'.$_SESSION['theurl']);
              // }


          
            }else{

             $this->getUserinfo();
            }


      }

  function getUserinfo(){
    $redirect_uri = urlencode(_APP_."/index.php?c=weixin&m=_getUserInfo");
    $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$this->_appid."&redirect_uri=".$redirect_uri."&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";
    //echo $url;
    header('location:'.$url);
  }

        public function _getUserInfo(){
        //echo "gyhgyh";
          $code =$_GET['code']; 
      $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$this->_appid."&secret=".$this->_appsecret."&code=$code&grant_type=authorization_code";  
      $json = file_get_contents($url);  
      $arr = json_decode($json,true);  
      $token = $arr['access_token'];  
      $openid = $arr['openid']; 
      $ucl="https://api.weixin.qq.com/sns/userinfo?access_token=".$token."&openid=".$openid."&lang=zh_CN";
            $json2= file_get_contents($ucl);  
      $arr2 = json_decode($json2,true); 

        $userobj=M('weixin');

$userarr=array(

'zt_username'=>$arr2["nickname"],
'zt_wechat_openid'=>$arr2["openid"],
'zt_wechat_touimg'=>$arr2["headimgurl"],
'zt_sex'=>$arr2["sex"],
'zt_createtime'=>date("Y-m-d G:i:s")
  );
if($arr2["nickname"]==""||$arr2["nickname"]=NULL){
   $this->showmessage('系统错误，请重试', 'index.php?c=index&m=index');
}


$chongfu=$userobj->useropenid($arr2["openid"]);
if($chongfu){
  $this->showmessage('帐户已存在', 'index.php?c=index&m=index');
}


            $userinfo=$userobj->insert($userarr);
    header('location:'.$_SESSION['theurl']);
    }


  //获取菜单
function getMenu(){
return file_get_contents("https://api.weixin.qq.com/cgi-bin/menu/get?access_token=".$this->_getAccessToken());

}

   public function _getQRCode($sceneid, $type = 'temp', $expire_seconds = 604800){//获取二维码
     $ticket = $this->_getTicket($sceneid, $type, $expire_seconds); //获取 Ticket
     $content = $this->_request('https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket='.urlencode($ticket));
     return $content;
   }

   function erweima(){
     $user_id = $_SESSION['auth']['id'];
         $a=$this->saveqrcode($user_id,'11');
       // var_dump($a);
VIEW::assign(array(
        'a'=>$a
      
        
        ));
    VIEW::display('user/erweima');


   }


   function saveqrcode($sceneid, $type, $expire_seconds){
    
    $ticket1 = $this->_getTicket($sceneid, $type, $expire_seconds); 
    $ticket = urlencode($ticket1);
    $url = "https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket={$ticket}";
    $filee = file_get_contents($url);
    //把该二维码文件保存到空间里的rqcode文件夹内，如果是linux系统要要修改下文件权限 chown -R www:www ./rqcode/
    $file_name = "qrcode{$sceneid}.jpg";
    file_put_contents("public/qrcode/".$file_name,$filee);
    //$rqcode_url = "http://ym.showtp.com/qrcode/{$file_name}";
    return $file_name;
   }

    


  public function _getTicket($sceneid, $type='temp', $expire_seconds=604800){ //获取Ticket，用于换取二维码
    if($type=='temp'){ //临时二维码
      $data = '{"expire_seconds": %s, "action_name": "QR_SCENE", "action_info": {"scene": {"scene_id": %s}}}';
      $data = sprintf($data, $expire_seconds, $sceneid);
    } else {//永久二维码
      $data = '{"action_name": "QR_LIMIT_SCENE", "action_info": {"scene": {"scene_id": %s}}}';
      $data = sprintf($data, $sceneid);
    }
    $curl = 'https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token='.$this->_getAccessToken();  //通过该URL 获取 Ticket 
    $content = $this->_request($curl, true, 'POST', $data); 
    $content = json_decode($content);
    return $content->ticket;
  }



    public function _CreateMenu(){

$data = '{
     "button":[
       {
           "type":"view",
           "name":"金融汇",
           "url":_APP_."/index.php?c=index&m=index"
       },
   
        {
          "type":"view",
           "name":" 商户合作",
           "url":_APP_."/index.php?c=index&m=swhz"
        
       }]
}';
//创建菜单
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$this->_getAccessToken());
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$tmpInfo = curl_exec($ch);
if (curl_errno($ch)) {
  return curl_error($ch);
}

curl_close($ch);
return $tmpInfo;
}

  public function _getAccessToken(){ //获取Access Token
    $file = './accesstoken';  //设置Access Token的存放位置
    if(file_exists($file)){
      $content = file_get_contents($file); //读取文档
      $content = json_decode($content); //解析json数据
      if(time() - filemtime($file) < $content->expires_in) //判断access token是否过期
        return $content->access_token;
    }
    $curl = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$this->_appid.'&secret='.$this->_appsecret; //通过该 URL 获取Access Token
    $content = $this->_request($curl);  //发送请求
    file_put_contents($file, $content);//保存Access Token 到文件
    $content = json_decode($content); //解析json
    return $content->access_token; 
  }

  private function checkSignature()
  {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
    $token = $this->_token;
    $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
    $tmpStr = implode( $tmpArr );
    $tmpStr = sha1( $tmpStr );
    
    if( $tmpStr == $signature ){
      return true;
    }else{
      return false;
    }
  }
    private function showmessage($info, $url)
    {
        echo "<script>alert('$info');window.location.href='$url'</script>";
        exit();
    }
  public function _request($curl, $https = true, $method = 'GET', $data = null){
    $ch = curl_init(); // 初始化curl
    curl_setopt($ch, CURLOPT_URL, $curl); //设置访问的 URL
    curl_setopt($ch, CURLOPT_HEADER, false); //放弃 URL 的头信息
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //返回字符串，而不直接输出
    if($https){ //判断是否是使用 https 协议
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //不做服务器的验证
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  //做服务器的证书验证
    }
    if($method == 'POST'){ //是否是 POST 请求
      curl_setopt($ch, CURLOPT_POST, true); //设置为 POST 请求
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data); //设置POST的请求数据
    }
    $content = curl_exec($ch); //开始访问指定URL
    curl_close($ch);//关闭 cURL 释放资源
    return $content;
  }
  //验证
  public function valid()
    {
        $echoStr = $_GET["echostr"];
        //valid signature , option
        if($this->checkSignature()){
          echo $echoStr;
          exit;
        }
    }



}
?>