<?php
    //smarty_function_�����
    function smarty_function_test($params){
        //array('��ʳ1'=��������ֵ����)
       
        //$����1=$params['����1'];
        //$����2=$params['����2'];
        $width=$params['width'];
        $height=$params['height'];
        $area=$width*$height;
        return $area;
        
        
    }





?>