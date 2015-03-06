<?php


if (empty($_GET['eventsid'])){
echo "请上传eventsid";
exit(0);
} 

$eid = $_GET['eventsid'];



if (empty($_GET['voicepath'])){
echo "please voicepath";
exit(0);
} 



$voicepath = $_GET['voicepath'];









	
//地址
$url = "120.131.70.218";
//账号
$user = "root";
//密码
$password = "1q2w3e4r5t6yJUSHI$";
//连接
$con = mysql_connect($url,$user,$password);
//设置编码机
mysql_query("set names 'utf8'");
//连接数据库
mysql_select_db("supercard");

$sql = "UPDATE `eventsinfo` SET `voice1` = '$voicepath' WHERE  `eventsid` = '$eid'";

//echo($sql);


 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }

 echo "Sucess";

  //关闭连接

 mysql_close($con);
 



	
	




?>