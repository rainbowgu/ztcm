<?php
class weixinModel{
    public $_usertable='zt_userinfo';
     function useropenid($openid){
       $sql="select * from  zt_userinfo  where zt_wechat_openid= '".$openid."'";
    return DB::findOne($sql);
}

  function insert($arr){
        return DB::insert('zt_userinfo', $arr);
    }




















}