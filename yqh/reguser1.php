<?PHP 

if (empty($_GET['mobilenum'])){
echo "没有输入手机号";
exit(0);
} 

$mobilenum = $_GET['mobilenum'];

$smscode = getRandStr($length=6);

$uid = getRandStr($length=10);

	
//echo "".$mb."#";
echo $smscode."";
    
//sendsmscode($smscode,$mobilenum);
    
//putsmscode($uid,$mobilenum,$username,$smscode);



//echo "".$mobilenum;



//验证是否是第一次注册

$mb = ismobilenum($mobilenum);

if(empty($mb)||$mb==""){
	
	//echo "".$mb."#";
	//echo $smscode."";
    sendsmscode($smscode,$mobilenum);
    $username = "new user";
    putsmscode($uid,$mobilenum,$username,$smscode);
   
	
}else{

	echo "#".$mb."#";

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
  
  $sql = "SELECT * FROM  `userinfo` WHERE  `mobilenum` =  '$mobilenum' and `smscodes` =  '$smscode' ";
  
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
 //echo "#".$uid;
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

//echo ">>>>>>>>>>>>";
//echo $url1;
//echo "<<<<<<<<<<<";

$html = file_get_contents($url1);  

echo "#";
echo $html;  
	
}





?>

