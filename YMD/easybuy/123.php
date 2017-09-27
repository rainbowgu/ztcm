<?php 
include('conn.php');


//$sql = "insert into " . $table . "(" . $keys . ") values(" . $values . ")";
//echo json_encode($insertarr);
//$RES=new Response();
//return $RES::show(401,'sxcsa');
  $sql = "insert into eb_info(eb_tel,eb_qudao,eb_quanhao) values('1222','2','3')";
 // echo $sql;
  mysqli_query($conn,$sql);

?>