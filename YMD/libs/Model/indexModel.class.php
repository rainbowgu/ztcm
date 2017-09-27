<?php
class indexModel{
//  public $_table='zt_userinfo';
  function findOne_by_username($username,$password){
      $sql = 'select * from '.$this->_table.' where zt_tel="'.$username.'" and zt_password="'.$password.'" ';
      return DB::findOne($sql);
  }
  
  function count(){
      $sql = 'select count(*) from '.$this->_table;
      return DB::findResult($sql, 0, 0);
  }
  
  function findOne_nouser($username){
      $sql = 'select * from '.$this->_table.' where zt_tel="'.$username.'"';
      return DB::findOne($sql);
  }
  
  function  insertswhz($arr){
    return DB::insert('zt_shenqing', $arr);
  }
  
  
  
}?>