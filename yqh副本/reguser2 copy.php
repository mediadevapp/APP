<?PHP 



if (empty($_GET['mobilenum'])){
echo "没有输入手机号";
exit(0);
} 


if (empty($_GET['smscode'])){
echo "没有输入验证码";
exit(0);
} 





$smscode = $_GET['smscode'];

$mobile = $_GET['mobilenum'];


	


//echo $smscode."发送codes短信网关";
// 发送给短信网关 


$mb = issmscode($smscode,$mobile);


if(empty($mb)){
	
 echo "0#fail";
    
}else{
    
  echo $mb."#"."Success";
  
  
if (empty($_GET['password'])){
echo "没有输入密码";
exit(0);
}   
  
  
  $pwd = $_GET['password'];
  $uid = $mb;
  
  updateuserinfo($uid,$pwd); 

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
  
  $sql = "SELECT * FROM  `userinfo` WHERE  `smscodes` =  '$smscode' and `mobilenum` = '$mobile' ";
  
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



function updateuserinfo($uid,$pwd){
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

$sql = "UPDATE  `userinfo` SET  `password` =  '$pwd' WHERE  `uid` ='$uid' ";

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










?>

