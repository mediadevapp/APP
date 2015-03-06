<?PHP 



if (empty($_GET['moblilenum'])){
echo "没有输入手机号";
exit(0);
} 


if (empty($_GET['password'])){
echo "没有输入验证码";
exit(0);
} 




$password = $_GET['password'];

$mobile = $_GET['moblilenum'];
	


//echo $smscode."发送codes短信网关";
// 发送给短信网关 


$mb = issmscode($password,$mobile);


if(empty($mb)){
	
 echo "0#fail";
    
}else{
    
  echo $mb."#Success";
  
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











?>

