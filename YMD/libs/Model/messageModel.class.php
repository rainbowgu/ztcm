<?php

class messageModel
{

    public $_table = 'zt_messages';

    function cleanmess($arr,$where){
        return DB::update($this->_table, $arr, $where);
    }
    
    function user_mesinfo($id)
    {
        $sql = 'select * from ' . $this->_table . ' where zt_mess_userid=' . $id;
        return DB::findOne($sql);
    }
    
    function mes_num($id,$status)
    {
        $sql = 'select * from ' . $this->_table . ' where zt_mess_userid=' . $id.' and zt_mess_status='.$status;
        return DB::findAll($sql);
    }
    function mes_li($id,$type)
    {
        $sql = 'select * from ' . $this->_table . ' where zt_mess_userid=' . $id.' and zt_mess_type='.$type .' order by  zt_mess_datetime desc';
        return DB::findAll($sql);
    }
    
    function insert($arr){
        return DB::insert($this->_table, $arr);
    }
    
    
    
    
    
    
    
    function allmess()
    {
        $sql = 'select * from ' . $this->_table;
        return DB::findAll($sql);
    }

    function pass_update($id)
    {
        $arr = array(
            'zt_mess_status' => '0'
        );
        $where = 'id =' . $id;
        return DB::update($this->_table, $arr, $where);
    }

    function delemess($id)
    {
        $where = 'id =' . $id;
        return DB::del($this->_table, $where);
    }
}