<?PHP 

if (empty($_GET['uid'])){echo "请上传用户id";exit(0);} 

//if (empty($_POST['mobilenum'])){echo "用户手机号为空";exit(0);} 

if (empty($_GET['mobilenum'])){

echo "必须输入绑定手机号";
exit(0);

}


$uid = $_GET['uid'];
$mobilenum = $_GET['mobilenum'];








	
$remess = updatemobilenum($uid,$mobilenum);


if($remess != ""){
	
$message= '{"id":"'.'1'.'"}';
 
echo $message;
	
	
}

	










function updatemobilenum($uid,$mobilenum){
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

$sql = "UPDATE `userinfo` SET `username` = '$mobilenum' WHERE `userinfo`.`uid` = '$uid'";

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }

 return $uid;

  //关闭连接

mysql_close($con);

}







?>

