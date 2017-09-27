<?php

class productModel{
    public $_table='zt_product';
     

function timeortime(){
     $sql='select * from zt_order where id='.$id;
    return DB::findOne($sql); 

}

function index1(){
    $sql='select * from '.$this->_table.' order by zt_pro_datetime';
     return DB::findAll($sql);
  }
function detail($id){
    $sql='select * from '.$this->_table.' where id='.$id;
    return DB::findOne($sql); 
    
    
}  
function allproduct(){
    $sql='select * from '.$this->_table;
    return DB::findAll($sql);
}

function perproduct($userid){
    $sql='select * from zt_order inner join zt_product on zt_product.id=zt_order.zt_pro_id and zt_order.zt_user_id='.$userid.'  order by zt_order.zt_createtime desc';
    return DB::findAll($sql);
}



function shenqinpro($userid){
    $sql='select * from zt_product where id not in(select zt_pro_id from zt_order where zt_user_id='.$userid.')';
    return DB::findAll($sql);
}





function insert($arr){
    return DB::insert('zt_order', $arr);
}
function insertpro($arr){
    return DB::insert('zt_product', $arr);
}
function orderstatus($userid,$proid){
    $sql='select * from  zt_order  where zt_user_id='.$userid.' and zt_pro_id='.$proid.' and zt_status = 0';
    return DB::findOne($sql);
}

function orderstatus2($userid,$proid,$tel,$usernum){
    $sql="select * from  zt_order  where zt_user_id=".$userid." and zt_pro_id='".$proid."'  and zt_status = 2 and zt_tel='".$tel."'  and zt_usernum = ".$usernum;
    return DB::findOne($sql);
}


function selectorder($userid,$proid,$status){
    $sql='select * from  zt_order  where zt_user_id='.$userid.' and zt_pro_id='.$proid.' and zt_status = '.$status;
    return DB::findOne($sql);
    
}

function updateimg($arr,$where){
    return DB::update('zt_order', $arr, $where);
}

  
  
     }   