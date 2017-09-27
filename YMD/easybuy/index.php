<?php 

include('conn.php');
if($_POST['tel']==""||$_POST['tel']=NULL){
$code='1001';
$message="error";
$info='tel is null';
}
if($_POST['qudao']==""||$_POST['qudao']=NULL){	
$code='1002';
$message="error";
$info="qudao is null";
}
if($_POST['username']==""||$_POST['username']=NULL){
$code='1003';
$message="error";
$info="username is null";
}

$tel=isset($_POST['tel']) ? $_POST['tel'] : 1;
$qudao=isset($_POST['qudao']) ? $_POST['qudao'] : 1;
$username=isset($_POST['username']) ? $_POST['username'] : 1;
$insertarr=array(
    'eb_tel'=>$tel,
    'eb_qudao'=>$qudao,
    'eb_quanhao'=>$username,
    'ec_createtime' => date("Y-m-d h:i:sa", time())
	);
  $sql = "insert into eb_info(eb_tel,eb_qudao,eb_quanhao,ec_createtime) values('" . $tel . "','" . $qudao . "','" . $username . "'," . date("Y-m-d h:i:sa", time()) . ")";
 $insertinfo= mysqli_query($conn,$sql);
  
if($insertinfo){
$code='1111';
$message="success";
$info=$insertarr;
}


$result = array(
			'code' => $code,
			'message' => $message,
			'data' => $info
		);
echo json_encode($result);

?>

