<?php

/**
 * 登陆model层
 * @date: 2016年9月2日
 * @author: guyonghao
 * @return:
 */
class authModel
{

   // private $auth = 'zt_userinfo';
    
    

    
    /**
    * 初始化检测登陆状态
    * @param 
    * @return 
    * @author guyonghao
    * @date 2016年9月2日下午1:57:07
    * @version v1.0.0
    */
    public function _construct()
    {
        if (isset($_SESSION['auth']) && (! empty($_SESSION['auth']))) {
            $this->auth = $_SESSION['auth'];
        }
    }
    /**
     * 提交登录的处理 监测当前的账号密码是否争取 并返回
     * @param            
     * @return true/false
     * @author guyonghao
     * @date 2016年9月2日下午1:54:45
     * @version v1.0.0
     *         
     */
    
    public function register(){
        if (empty($_POST['username']) || empty($_POST['password']) ||empty($_POST['repassword']) ||
            empty($_POST['company'] )||empty($_POST['position']) ||empty($_POST['realname']) ||empty($_POST['realname'])
                ){
            
        }
        $username=addslashes($_POST['username']);
        $password=addslashes($_POST['password']);
        $repassword=addslashes($_POST['repassword']);
        $company=addslashes($_POST['company']);
        $position=addslashes($_POST['position']);
        $realname=addslashes($_POST['realname']);
        $realnum=addslashes($_POST['realnum']);
        if ($this->checknouser($username)){
            return false;
        }
        if (($password != $repassword)) {
            return false;
        }
        $arr=array(
            "zt_username"=>$username,
            "zt_password"=>$password,
            "zt_tel"=>$tel,
            "zt_company"=>$company,
            "zt_position"=>$position,
            "zt_realname"=>$realname,
            "zt_realnum"=>$realnum,
            "zt_createtime"=>date("Y-m-d h:i:sa", time())
       
        );
        
        
       
        
        $reginfo=DB::insert($auth, $arr);
        if($reginfo){
            return true;
        }else{
            return false;
        }
       
        
        
       
        
        
        
    }
    
    
  
    function insert($arr){
        return DB::insert('zt_userinfo', $arr);
    }
    
   public  function checknouser($usernam){
       $adminobj = M('index');
       $auth = $adminobj->findOne_nouser($usernam);
       if (! empty($auth)) {
           return $auth;
       } else {
           return false;
       }
   }
    
    
    public function loginsubmit()
    {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            return false;
        }
        $username = addslashes($_POST['username']);
        $password = addslashes($_POST['password']);
        //
        if ($this->auth = $this->checkuser($username, $password)) {
            $_SESSION['auth'] = $this->auth;
            return true;
        } else {
            return false;
        }
    }
    


    /**
     *检测当前的用户输入并且查询数据库
     * @param  $username, $password   用户名，密码
     * @return true/false             成功/失败
     * @author guyonghao
     *         @date 2016年9月2日下午1:52:11
     * @version v1.0.0      
     */
    private function checkuser($username, $password)
    {
        $adminobj = M('index');
        $auth = $adminobj->findOne_by_username($username, $password);
        if ((! empty($auth)) && $auth['zt_password'] == $password) {
            return $auth;
        } else {
            return false;
        }
    }

   
    public function getauth()
    {
        return $this->auth;
    }

}
?>