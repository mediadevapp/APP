<?PHP 

if (empty($_GET['mobilenum'])){
echo "没有输入手机号";
exit(0);
} 

$smscode = getRandStr($length=6);

$uid = getRandStr($length=10);

$mobilenum = $_GET['mobilenum'];


echo "mobile==".$mobilenum;





// 发送给短信网关 

$mb = ismobilenum($mobilenum);


echo "手机验证>>>".$mb."<<<<";

if(empty($mb)||$mb==""){
	
	$username = "new users";
    
    echo $smscode."发送codes短信网关";
    
    sendsmscode($smscode,$mobilenum);
    
    
    putsmscode($uid,$mobilenum,$username,$smscode);
    
    
}else{
	
	echo "[已注册用户]";
	
}






 


function ismobilenum($mobilenum){



	$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("supercard", $con);
  
  $sql = "SELECT * FROM  `userinfo` WHERE  `mobilenum` =  '$mobilenum' ";
  
  //echo($sql);

  $result = mysql_query($sql);
  
 while($row = mysql_fetch_array($result))

  {

   //echo  " " . $row['uid'] . " " . $row['username'].",";
   $arr =$row["uid"];
  
  }
  
  return $arr;
  
  }

mysql_close($con);
	
	
}



function putsmscode($uid,$mobilenum,$username,$smscodes){
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

$sql = "insert into userinfo (uid,mobilenum,username,smscodes)  values('$uid','$mobilenum','$username','$smscodes')";

//echo $sql;

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }
 //echo "Success";
 echo "uid=".$uid;
  //关闭连接
 mysql_close($con);

}






function getRandStr($length) {  

$str = '0123456789'; 
$randString = ''; 
$len = strlen($str)-1; 
for($i = 0;$i < $length;$i ++)
{ 
$num = mt_rand(0, $len); $randString .= $str[$num];
 } 
 return $randString ; 
}



function sendsmscode($smscode,$mobilenum){

	
$url1="http://sdk999ws.eucp.b2m.cn:8080/sdkproxy/sendsms.action?cdkey=9SDK-EMY-0999-JEQPK&password=256564&phone=".$mobilenum."&message="."【超级邀请函】短信验证码=".$smscode."&addserial=";

echo ">>>>>>>>>>>>";
echo $url1;
echo "<<<<<<<<<<<";

$html = file_get_contents($url1);  
echo $html;  
	
}





?>

