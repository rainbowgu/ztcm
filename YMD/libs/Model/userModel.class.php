<?php

class userModel
{

    public $_table = 'zt_userinfo';

    public $_ordertable = 'zt_order';

    public $_producttable = 'zt_product';

    public $_fundtable = 'zt_fund';

    public $_usertotaltable = 'zt_user_total';

function ins_bank($arr){
 return DB::insert('zt_bank', $arr);

}

function upd_bank($arr,$where){
    return DB::update('zt_bank', $arr, $where);
}

function sel_bank($userid){
 $sql = 'select * from zt_bank where zt_user_id=' . $userid;
        return DB::findOne($sql);
}

function ins_zfpay($arr){
 return DB::insert('zt_zfpay', $arr);

}

function upd_zfpay($arr,$where){
    return DB::update('zt_zfpay', $arr, $where);
}

function sel_zfpay($userid){
 $sql = 'select * from zt_zfpay where zt_user_id=' . $userid;
        return DB::findOne($sql);
}



  function ins_tuidan($arr){
    return DB::insert('zt_tuidan', $arr);
}

    function userinfo($id)
    {
        $sql = 'select * from ' . $this->_table . ' where id=' . $id;
        return DB::findOne($sql);
    }
    function slectOne($where){
        $sql = 'select * from ' . $this->_table . ' where ' . $where;
        return DB::findOne($sql);
    }

    function allproduct()
    {
        $sql = 'select * from ' . $this->_table;
        return DB::findAll($sql);
    }

    function update($arr, $where)
    {
        return DB::update($this->_table, $arr, $where);
    }

    function findOne_by_userpwd($username, $password)
    {
        $sql = 'select * from '.$this->_table.'  where zt_tel = ' . $username . ' and zt_password = '.$password;
        return DB::findOne($sql);
    }

    function invite_select($fatherid){
         $sql = 'select * from zt_userinfo  where  zt_father='.$fatherid;
        return DB::findAll($sql);

    }

     function fanli_select($fatherid){
         $sql = "select  *  from  zt_fund   JOIN   zt_userinfo  ON   zt_fund.zt_type= 5 and zt_fund.zt_remark=zt_userinfo.id and  zt_user_id=".$fatherid."  order by zt_datetime desc";
        return DB::findAll($sql);

    }

  
    
    
}   