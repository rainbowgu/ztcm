<?php

class fundtotalModel{
    public $_table = 'zt_user_total';
    
    
    function fundtotallast($id){
        $sql = 'select * from ' . $this->_table.' where  id='.$id.' order by datetime' ;
        return DB::findOne($sql);
        
    }
    function insertfund($arr){
        //$sql='Insert into '
        return DB::insert($this->_table,$arr);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
}