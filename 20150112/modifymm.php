<?PHP 

if (empty($_GET['uid'])){echo "请上传用户id";exit(0);} 

//if (empty($_POST['mobilenum'])){echo "用户手机号为空";exit(0);} 

$uid = $_GET['uid'];


if (empty($_GET['mobilenum'])){

echo "必须输入绑定手机号";
exit(0);

}


$smscode = getRandStr($length=6);

$mobilenum = $_GET['mobilenum'];

sendsmscode($smscode,$mobilenum);

$iscodes = $_GET['smscodes'];



if(empty($iscodes)){

echo "验证码为空";
	
}else if($iscodes == $smscode){
	
updatemobilenum($uid,$mobilenum);

	
echo "验证码正确修改成功";
	
}







//updatemobilenum($uid,$mobilenum);



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

 echo $uid;

  //关闭连接

mysql_close($con);
}




function getRandStr($length) {  

$str = '0123456789'; 
$randString = ''; 
$len = strlen($str)-1; 
for($i = 0;$i < $length;$i ++)
{ 
$num = mt_rand(0, $len); 
$randString .= $str[$num];
 } 
 return $randString ; 
}


function sendsmscode($smscode,$mobilenum){

	
$url1="http://sdk999ws.eucp.b2m.cn:8080/sdkproxy/sendsms.action?cdkey=9SDK-EMY-0999-JEQLT&password=730520&phone=".$mobilenum."&message="."【星上人】短信验证码=".$smscode."&addserial=";

$html = file_get_contents($url1);  


return $url1;  



	
}




?>
