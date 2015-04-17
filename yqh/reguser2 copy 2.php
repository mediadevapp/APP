<?PHP 



if (empty($_GET['mobilenum'])){
echo "没有输入手机号";
exit(0);
} 


if (empty($_GET['smscode'])){
echo "没有输入验证码";
exit(0);
} 


  $smscodes = $_GET['smscode'];
  $mobile = $_GET['mobilenum'];
  $username = "new user";
  
  
    
  




//echo $smscode."发送codes短信网关";
// 发送给短信网关 


$mb = issmscode($smscodes,$mobile);


if(empty($mb)){
	
 echo "0#fail";
 
    
}else{
    
  echo $mb."#"."Success";
  
  $pwd = $_GET['password'];
  $uid = $mb;

  
  if(strlen($pwd)<6){
  
  echo "密码位数小于6";
  exit(0);
  }
 
  if(strlen($pwd)>18){
  
  echo "密码位数大于18";
  exit(0);
  }


  
  insertuserinfo($uid,$mobile,$username,$smscodes,$pwd); 

}






 


function issmscode($smscode,$mobile){



	$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("supercard", $con);
  
  $sql = "SELECT * FROM  `usertmp` WHERE  `smscodes` =  '$smscode' and `mobilenum` = '$mobile' ";
  
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



function insertuserinfo($uid,$mobile,$username,$smscodes,$pwd){
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

$sql = "insert into userinfo (uid,mobilenum,username,smscodes,password)  values('$uid','$mobile','$username','$smscodes','$pwd')";

//echo $sql;

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }
 //echo "Success";
 echo $uid."#"."Success";
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






?>

