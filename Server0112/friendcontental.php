<?php

if (empty($_GET['id'])){
echo "没有当前用户ID";
exit(0);
} 

if (empty($_GET['fid'])){
echo "没有被操作用户ID";
exit(0);
} 

if (empty($_GET['allow'])){
echo "权限参数输入错误";
exit(0);
} 

$uuid =  $_GET['id'];
$f_uid = $_GET['fid'];
$allow = $_GET['allow'];





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
mysql_select_db("star_app");

//$sql = "insert into userinfo (uid,username,nickname,phrase,xing,photo,userage)  values('$userId','$username','$nickname','$phrase','$xing','$photo','$userAge')";

 $sql = "UPDATE `star_app`.`friendinfo` SET `allow` = '$allow' WHERE  `friendinfo`.`friend_id` = '$f_uid' AND `friendinfo`.`uid` = '$uuid'";
  


 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }

 echo "修改一条记录";

  //关闭连接

 mysql_close($con)



?>