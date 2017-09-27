<?php
class messageController{
    
    function index(){
        $user_id=$_GET['id'];
        $type=$_GET['type'];
        $messobj = M('message');
        $user_id = $_SESSION['auth']['id'];
        $userobj = M('user');
        $userinfo = $userobj->userinfo($user_id);
        $arr=array(
            "zt_mess_status" =>'1'
            );
        $where = "zt_mess_userid='" . $user_id . "'and zt_mess_type= 0 ";
        
        $messobj->cleanmess($arr,$where);
        
        $messinfo=$messobj->mes_li($user_id,$type);
        //var_dump($messinfo);
        //更改状态
        $newarr=array(
            "zt_mess_status" =>'1'
            );







        VIEW::assign(array(
            "username"=>$_SESSION['auth']['zt_username'],
            'userinfo' => $userinfo,
            'messinfo'=>$messinfo
            ));
        VIEW::display('message/index');
    }
    
    function allmess(){
        $messobj = M('message');
        $messinfo=$messobj->allmess();
    }
    
    
    
    
    
    
    
    
    
    
}