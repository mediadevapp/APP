<?PHP 



if (empty($_GET['moblilenum'])){
echo "没有输入手机号";
exit(0);
} 


if (empty($_GET['password'])){
echo "没有输入验证码";
exit(0);
} 


if (empty($_GET['devicetype'])){
echo "没有设备类别";
exit(0);
} 

if (empty($_GET['deviceid'])){
echo "没有设备id";
exit(0);
} 



$password = $_GET['password'];

$mobile = $_GET['moblilenum'];
	
$devicetype = $_GET['devicetype'];

$deviceid = $_GET['deviceid'];


//echo $smscode."发送codes短信网关";
// 发送给短信网关 


$mb = issmscode($password,$mobile);


if(empty($mb)){
	
  echo '{"id":"'.'0'.'"}';
    
}else{
    
  //return uid  
  echo '{"id":"'.$mb.'"}';
  
  getdeviceinfo($deviceid,$devicetype,$mb);  

}






 


function issmscode($password,$mobile){



	$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("supercard", $con);
  
  $sql = "SELECT * FROM  `userinfo` WHERE  `password` =  '$password' and `mobilenum` = '$mobile' ";
  
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


function getdeviceinfo($deviceid,$devicetype,$uid){
	
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

$sql = "UPDATE  `userinfo` SET  `device` =  '$devicetype' , `deviceid` =  ' $deviceid '  WHERE  `uid` ='$uid' ";

//echo $sql;

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }
 //echo "Success";
 //echo $uid."#"."Success";
  //关闭连接
 mysql_close($con);

}



?>

