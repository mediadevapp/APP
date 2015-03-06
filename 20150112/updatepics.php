<?php


if (empty($_POST['uid'])){
echo "请上传用户uid";
exit(0);
} 

if (empty($_POST['path'])){
echo "请上传图片路径path";
exit(0);
} 


$uid = $_POST['uid'];

$path = $_POST['path'];


upldatepic($uid,$path);


function upldatepic($uid,$path){
	
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

$sql = "UPDATE `userinfo` SET `pics` = '$path' WHERE `userinfo`.`uid` = '$uid'";

//echo($sql);

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }

 echo "Success";

  //关闭连接

 mysql_close($con);
 
}


?>