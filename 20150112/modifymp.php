<?PHP 

if (empty($_GET['uid'])){echo "请上传用户id";exit(0);} 

//if (empty($_POST['mobilenum'])){echo "用户手机号为空";exit(0);} 


if (empty($_GET['oldpwd'])){

echo "必须输入旧密码";
exit(0);
}


if (empty($_GET['newpwd'])){

echo "必须输入新密码";
exit(0);

}




$uid = $_GET['uid'];
$opwd =  $_GET['oldpwd'];
$npwd = $_GET['newpwd'];


$ispwd = ispassword($uid,$opwd);

//echo $ispwd;


if(empty($ispwd)){

$message= '{"id":"'.'0'.'"}';
echo $message;

}else {

 updatepassword($uid,$npwd);

 $message= '{"id":"'.'1'.'"}';
 
 echo $message;

}



function updatepassword($uid,$pwd){
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

$sql = "UPDATE `userinfo` SET `password` = '$pwd' WHERE `userinfo`.`uid` = '$uid'";

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }

 //echo $uid;

  //关闭连接

mysql_close($con);
}



function ispassword($uid,$pwd){

$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("star_app", $con); 
  
  $sql = "SELECT * FROM userinfo where  password = '".$pwd."' and uid='".$uid."'";
  
  //echo($sql);

  $result = mysql_query( $sql);

while($row = mysql_fetch_array($result))
{
//echo $row['id'] . " " . $row['name'];

 $uuid=$row['uid'];



}

if(empty($uid)){

    $message = "0";
	
	return  $message;
	
}else{

    //$message= '{"id":"'.$uid.'"}';
	
	return $uuid;
	
}


}
}

?>

