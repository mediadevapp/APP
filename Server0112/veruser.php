<?php


if (empty($_GET['mobilenum'])){
echo "没有输入手机号码";
exit(0);
} 

$s_name =  $_GET['mobilenum'];

//echo "用户名： ".$s_name." "; 

veruser($s_name);


function veruser($username){
	
	$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("star_app", $con);
  
  $sql = "SELECT * FROM userinfo where username='".$username."'";
  
  //echo($sql);

  $result = mysql_query( $sql);
  



  while($row = mysql_fetch_array($result))

  {

   $uid = $row['uid'];
   
 
   }


 echo  $uid;

  }


mysql_close($con);


return $uid;
	
	
	
}



?>