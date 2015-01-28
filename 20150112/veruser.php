<?php


if (empty($_GET['mobilenum'])){
echo "没有输入手机号码";
exit(0);
} 



if (empty($_GET['password'])){

$s_name =  $_GET['mobilenum'];
veruseru($s_name,"");


} else{
	
$s_name =  $_GET["mobilenum"];
$s_pwd =  $_GET["password"];

//echo $s_name.">>>>>>>>>";
veruser($s_name,$s_pwd);	
	
} 



//echo "用户名： ".$s_name." "; 









function veruser($username,$s_pwd){
	
	$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("star_app", $con); 
  
  $sql = "SELECT * FROM userinfo where  password = '".$s_pwd."' and username='".$username."'";
  
  echo($sql);

  $result = mysql_query( $sql);

while($row = mysql_fetch_array($result))
{
//echo $row['id'] . " " . $row['name'];

 $uid=$row['uid'];



}

if(empty($uid)){

    $message= '{"id":"0"}';
	
	echo $message;
	
}else{

    $message= '{"id":"'.$uid.'"}';
	
	echo $message;
	
}




}
mysql_close($con);
return $uid;
}




function veruseru($username){
	
	$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("star_app", $con); 
  
  $sql = "SELECT * FROM userinfo where  username='".$username."'";
  
  //echo($sql);

  $result = mysql_query( $sql);

while($row = mysql_fetch_array($result))
{
//echo $row['id'] . " " . $row['name'];

 $uid=$row['uid'];



}

if(empty($uid)){

    $message= '{"id":"0"}';
	
	echo $message;
	
}else{

    $message= '{"id":"'.$uid.'"}';
	
	echo $message;
	
}




}
mysql_close($con);
return $uid;
}





?>