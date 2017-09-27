<?php
class fundModel{
    public $_table = 'zt_fund';

  public $_totaltable = 'zt_user_total';


    function fundone_ALL($id){
        $sql = 'select * from ' . $this->_table.' where  zt_user_id='.$id.' and zt_cool = 0 ' ;
        return DB::findAll($sql);
    }

    
    
    function fundhis($id){
        $sql = 'select * from ' . $this->_table.' where  zt_user_id='.$id.' order by zt_datetime desc ' ;
        return DB::findAll($sql);
        
    }
    function fund_id_select($user_id){
       $sql = 'select * from zt_fund where  zt_user_id='. $user_id.' and zt_pro_id= 0  and zt_type= 3  order by zt_datetime desc ' ;
        return DB::findOne($sql);
    }
    
  
    
    
    function fundtotallast($id){
        $sql = 'select * from  ' . $this->_totaltable.' where   user_e_type= 4 and  user_e_id='.$id.' order by datetime desc' ;
        return DB::findOne($sql);
    
    }

 function total_true_last($id){
        $sql = 'select * from ' . $this->_totaltable.' where   user_e_type= 1 and  user_e_id='.$id.' order by datetime desc' ;
        return DB::findOne($sql);
    
    }

    
    function fundshenhe($id){
        $sql = 'select * from ' . $this->_totaltable.' where   user_e_type= 3  and  user_e_id='.$id.' and pro_id = 0 order by datetime desc' ;
        return DB::findOne($sql);
    
    }

 function invitel($userid,$type){
        $sql = 'select * from  zt_fund  where     zt_user_id='.$userid.' and zt_type = '.$type.' order by zt_datetime desc' ;
        return DB::findAll($sql);
    
    }

    function insertfund($arr){
        //$sql='Insert into '
        return DB::insert($this->_totaltable,$arr);
    }
    
    function infund($arr){
        //$sql='Insert into '
        return DB::insert($this->_table,$arr);
    }

    function up_fund($arr,$where){
return DB::update('zt_fund', $arr, $where);
    }
    

    
}
    
  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
