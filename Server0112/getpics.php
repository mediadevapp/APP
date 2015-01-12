<?php


if (empty($_POST['uid'])){
echo "请上传用户id";
exit(0);
} 

$uid = $_POST['uid'];


$picspath = getpicspath($uid);

echo $picspath;



function getpicspath($uid){

$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("star_app", $con);
  
  $sql = "SELECT * FROM userinfo where uid='".$uid."'";
  
  //echo($sql);

  $result = mysql_query( $sql);



  while($row = mysql_fetch_array($result))

  {

  //echo $row['id'] . " " . $row['name'];
  
  $pics = $row['pics'];

  
   }
  
  return $pics ;

  }

mysql_close($con);


	
	
	
	
}




?>