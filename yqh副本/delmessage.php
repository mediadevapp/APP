<?php

if (empty($_GET['uid'])){
echo "没有输入uid";
exit(0);
} 

$uid = $_GET['uid'];

delmessage($uid);




function delmessage($uid){
	
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


if($uid == "all"){
	

$sql = "DELETE FROM `joinusertmp` ";
	
	
}else {

$sql = "DELETE FROM `joinusertmp` WHERE  `uid` =  '$uid' ";

}


//echo $sql;

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }
 echo "Success";
 //echo $uid;
  //关闭连接
 mysql_close($con);

}


?>