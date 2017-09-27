<?php

define("TOKEN", "weixin");
$wechatObj = new wechatCallbackapiTest();
$wechatObj->responseMsg();

class wechatCallbackapiTest
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }
    public function responseMsg()
    {
        //get post data, May be due to the different environments
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        
        //解析XML到对象
        $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
        switch($postObj->MsgType){

            case 'event':
            //echo "nihao";
            $this->_doEvent($postObj);
            exit;
            case 'text':
            $this->_doText($postObj);
            exit;
            case 'image':
            $this->_doImage($postObj);
            exit;
            case 'voice':
            $this->_doVoice($postObj);
            break;
            default:
            ;
        }
    }
    private function _doText($postObj){
     $fromUsername = $postObj->FromUserName;
     $toUsername = $postObj->ToUserName;        
     $time = time();
     $textTpl = "<xml>
     <ToUserName><![CDATA[%s]]></ToUserName>
     <FromUserName><![CDATA[%s]]></FromUserName>
     <CreateTime>%s</CreateTime>
     <MsgType><![CDATA[%s]]></MsgType>
     <Content><![CDATA[%s]]></Content>
     <FuncFlag>0</FuncFlag>
 </xml>";
 $msgType = "text";
 switch($postObj->Content){
    case '这是什么':
    $contentStr='羊毛社区';
    break;
    default:
    $contentStr='羊毛社区';
            /*  $curl = 'http://www.sobot.com/chat/robot/chat.action';
                $data =
'requestText='.$postObj->Content.'&sysNum=4c349791a07b46c1a70b8ac88aa23257&uid=ea24c9b3b0664225af4d21ba94ddbaa0&cid=5347dd7f65b24515b93700ded838d5df';
                $content = $this->_request($curl, false, 'POST', $data);
            //  file_put_contents('./tmp',$content);
                $content = json_decode($content);
                $contentStr = $content->answer;*/
            }
            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
            echo $resultStr;
        }

    private function _doEvent($postObj){ //用于将来处理事件
     $fromUsername = $postObj->FromUserName;
     $toUsername = $postObj->ToUserName;        
     $time = time();
     $textTpl = "<xml>
     <ToUserName><![CDATA[%s]]></ToUserName>
     <FromUserName><![CDATA[%s]]></FromUserName>
     <CreateTime>%s</CreateTime>
     <MsgType><![CDATA[%s]]></MsgType>
     <Content><![CDATA[%s]]></Content>
     <FuncFlag>0</FuncFlag>
 </xml>";
 $msgType = "text";
 $content = ""; 

   if($postObj->MsgType=='event'){
            if($postObj->Event=='subscribe'){
                if($postObj->EventKey!=null){
                  $eventkey=   $postObj->EventKey;
                     $eventnum=substr($eventkey,8);
                     if($eventnum){
  $content="扫码邀请者入>><a href='"._APP_."/index.php?c=user&m=upuser_downuser&up_id=".$eventnum."'> 予人玫瑰，手留余香".$eventnum."</a>";
                     }else{
                         $content="你好，又来了一位志同道合的能人异士。        
    我们随时为您发布智推独家渠道理财产品，为您甄选可靠平台，合理投资，好收益的优质理财产品，愿您喜欢，投资顺利。<a href='"._APP_."/index.php?c=index&m=index'> >>点击进入</a>
      此外，能告诉我是从哪里得知智推传媒理财平台的吗？谢谢你！";
                     }
   
                 
                  
                }
                
            }else{
                  $content="你好，又来了一位志同道合的能人异士。        
    我们随时为您发布智推独家渠道理财产品，为您甄选可靠平台，合理投资，好收益的优质理财产品，愿您喜欢，投资顺利。<a href='"._APP_."/index.php?c=index&m=index'> >>点击进入</a>
      此外，能告诉我是从哪里得知智推传媒理财平台的吗？谢谢你！";
            }
            
        }else{
       $content="你好，又来了一位志同道合的能人异士。        
    我们随时为您发布智推独家渠道理财产品，为您甄选可靠平台，合理投资，好收益的优质理财产品，愿您喜欢，投资顺利。<a href='"._APP_."/index.php?c=index&m=index'> >>点击进入</a>
      此外，能告诉我是从哪里得知智推传媒理财平台的吗？谢谢你！";
        }
 /*switch ($postObj->Event){ 
    case "subscribe": 
    $content = "你好，又来了一位志同道合的能人异士。        
    我们随时为您发布智推独家渠道理财产品，为您甄选可靠平台，合理投资，好收益的优质理财产品，愿您喜欢，投资顺利。<a href='"._APP_."/index.php?c=index&m=index'> >>点击进入</a>
      此外，能告诉我是从哪里得知智推传媒理财平台的吗？谢谢你！";//这里是向关注者发送的提示信息 
      break; 
      case "SCAN": 
      $content = "你好世界"; 
      break; 
  } */

  $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType,$content);

  echo $resultStr;

}

   private function _yaoqing($yaoqingma){
          $user_id = $_SESSION['auth']['id'];




   }


    private function _doImage($postObj){ //用于将来处理用户发送的图像
        ;
    }
    
    private function _doVoice($postObj){ //处理用户的声音信息
        ;
    }














    private function checkSignature()
    {
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
         return true;
     }else{
         return false;
     }
 }
}

?>