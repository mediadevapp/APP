<?PHP 

if (empty($_GET['smscode'])){
echo "没有输入手机号";
exit(0);
} 

$smscode = $_GET['smscode'];
$username = $_GET['username'];
	


//echo $smscode."发送codes短信网关";
// 发送给短信网关 


$mb = issmscode($smscode);

if(empty($mb)){
	
 echo "错误的验证码";
    
}else{
    
  echo "验证码正确=>";
  
  updateusername($username,$smscode); 
    
}






 


function issmscode($smscode){



	$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("supercard", $con);
  
  $sql = "SELECT * FROM  `userinfo` WHERE  `smscodes` =  '$smscode' ";
  
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



function updateusername($username,$smscode){
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

$sql = "UPDATE  `userinfo` SET  `username` =  '$username' WHERE  `smscodes` ='$smscode' ";

//echo $sql;

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }
 //echo "Success";
 echo "完成操作";
  //关闭连接
 mysql_close($con);

}










?>

