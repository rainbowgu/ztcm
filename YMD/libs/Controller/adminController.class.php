<?php

class adminController
{
	 function tsss(){
       


        header("Content-type:text/html; charset=utf-8");
        $user_agent = $_SERVER['HTTP_USER_AGENT'];//返回手机系统、型号信息
        if(stristr($_SERVER['HTTP_USER_AGENT'], 'Android')){//返回值中是否有Android这个关键字
          $a =  explode(" ",$user_agent);
          $b = $a[6].$a[7];
            echo json_encode(array('model' =>$b));
        }else{
            if(stristr($_SERVER['HTTP_USER_AGENT'], 'iPhone')){
                $a =  explode(" ",$user_agent);
                echo json_encode(array('model' => $a[3]));
            }else{
                echo json_encode(array('model' => 'win系统'));
            }
        }
    

    }
function tixian(){


    $fundobj=M('boss');

    $fundinfo=$fundobj->fund_select_atm();
    $fundinfo2=$fundobj->fund_user_sel();

   //var_dump($fundinfo2);
    VIEW::assign(array(
        'fundinfo' => $fundinfo2

        ));
    VIEW::display('boss/tixian');
}
   
}