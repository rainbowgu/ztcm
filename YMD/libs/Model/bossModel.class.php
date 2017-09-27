<?php
class bossModel{
    public $_ordertable = 'zt_order';
    public $_producttable='zt_product';
    public $_fundtable='zt_fund';
    public $_usertotaltable='zt_user_total';

     function slectOne($where){
        $sql = 'select * from zt_userinfo where ' . $where;
        return DB::findOne($sql);
    }

    function total_select_if($userid,$id,$newtotalfund){
       $sql = "select * from zt_user_total where    zt_user_id = ".$userid." and zt_pro_id = 0 and fund_id=".$id." and user_e_num= ".$newtotalfund." and user_e_type = 1" ;
    }

    function total_select_shenqin_if($userid,$id){
       $sql = "select * from zt_user_total where   zt_user_id = ".$userid." and zt_pro_id = 0 and fund_id=".$id." and zt_type= 2" ;
    }


//SELECT   t1.id,    t1.name,   t2.lv    FROM   t1   LEFT JOIN   t2   ON   t1.lvid=t2.lv_id
    function fund_user_sel(){
      $sql="select  *,  zt_fund.id as fundee from  zt_fund   JOIN   zt_userinfo  ON   zt_fund.zt_pro_id= 0 and zt_fund.zt_type= 3 and zt_fund.zt_user_id=zt_userinfo.id order by zt_datetime desc";
       return DB::findAll($sql);  
    }

       function over_fund_user_sel(){
      $sql="select  *,  zt_user_total.id as fundee from  zt_user_total   JOIN   zt_userinfo  ON   zt_user_total.pro_id= 0 and zt_user_total.user_e_type= 2 and zt_user_total.user_e_id=zt_userinfo.id order by datetime desc";
       return DB::findAll($sql); 
    }


    function fund_update_atm($arr,$where){
       return DB::update('zt_fund', $arr, $where);

    
    }

  function total_update_atm($arr,$where){
       return DB::update('zt_user_total', $arr, $where);

    
    }

    function total_true_last($id){
        $sql = 'select * from zt_user_total  where   user_e_type= 1 and  user_e_id='.$id.' order by datetime desc' ;
        return DB::findOne($sql);
    
    }
    function total_update_toal($arr,$where){
        return DB::update('zt_user_total', $arr, $where);
    }
    function total_select_update_yue($userid){
        $sql='select * from '.$this->_usertotaltable.' where pro_id=0 and user_e_type=4 and user_e_id='.$userid;
            return DB::findOne($sql); 
    }


    function fund_select_id($id){

      $sql='select * from '.$this->_fundtable.' where id='.$id;
            return DB::findOne($sql); 
    }
    function fund_select_atm(){

 $sql='select * from '.$this->_fundtable.' where zt_pro_id=0 and zt_type=3';
            return DB::findAll($sql); 
    }


    function shenhe($arr,$where){
        return DB::update('zt_order', $arr, $where);
    }
    
    function selectOdetail($proc){
          $sql='select * from '.$this->_ordertable.' where id  ='.$proc;
            return DB::findAll($sql); 
    }


    function shenheallorder($proc){
          $sql='select * from '.$this->_ordertable.' where zt_status ='.$proc.' order by id desc';
            return DB::findAll($sql); 
    }
    //根据订单id 查询具体订单
    function selectorder($id){
        $sql='select * from '.$this->_ordertable.' where id='.$id;
        return DB::findOne($sql);        
    }
      function selectuserinfo($id){
        $sql='select * from zt_userinfo where id='.$id;
        return DB::findOne($sql);        
    }
function detail($id){
    $sql='select * from '.$this->_producttable.' where id='.$id;
    return DB::findOne($sql); 
    
    
}  

function updatepro($arr,$where){
    return DB::update($this->_producttable, $arr, $where);
}
    //根据产品id 查询具体产品
    function selectproduct($id){
        $sql='select * from '.$this->_producttable.' where id='.$id;
        return DB::findOne($sql);
    }

  function selsctallpro(){
 $sql='select * from '.$this->_producttable;
        return DB::findAll($sql);
  }

    //查询最后一次真实金额
    function total_select_truetotal($userid,$type){
        $sql='select * from '.$this->_usertotaltable.'  where user_e_id='.$userid.' and  user_e_type  = '.$type.'   order by datetime desc ' ;
        return DB::findOne($sql);
    }
    
    //
     function inserttotal($arr){
      
             return DB::insert('zt_user_total', $arr);
  
     }
     function insertfund($arr){
     
         return DB::insert($this->_fundtable, $arr);
     
     }
    
    
    
    
    
    
    
    
    
    
}