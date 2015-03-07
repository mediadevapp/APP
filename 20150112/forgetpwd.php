<?PHP 



if (empty($_GET['mobilenum'])){
echo "没有输入手机号###";
exit(0);
} 



$mobile = $_GET['mobilenum'];

$smscode = getRandStr($length=6);




//echo $smscode."发送codes短信网关";
// 发送给短信网关 


$mb = ismobile($mobile);



if($mb ==''){
	
 $message = '{"id":"'.'0'.'"}';
 
 echo $message;
 
}else{

 $message = '{"id":"'.$mb.'","smscodes":"'.$smscode.'"}';
 
 echo $message;
 
 sendsmscode($smscode,$mobile);
  
  
  	
}






 


function ismobile($mobile){



	$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("star_app", $con);
  
  $sql = "SELECT * FROM  `userinfo` WHERE  `username` = '$mobile' ";
  
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


function sendsmscode($smscode,$mobilenum){

	
$url1="http://sdk999ws.eucp.b2m.cn:8080/sdkproxy/sendsms.action?cdkey=9SDK-EMY-0999-JEQLT&password=730520&phone=".$mobilenum."&message="."【星上人】忘记密码手机验证码=".$smscode."&addserial=";

//echo ">>>>>>>>>>>>";
//echo $url1;
//echo "<<<<<<<<<<<";

$html = file_get_contents($url1);  

//echo "#";
//echo $html;  
	
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





?>

