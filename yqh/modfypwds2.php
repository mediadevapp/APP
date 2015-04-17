<?PHP 



if (empty($_GET['smscode'])){
echo "没有输入验证码";
exit(0);
} 

$smscode = $_GET['smscode'];

$pwd = $_GET['password'];




//echo $smscode."发送codes短信网关";
// 发送给短信网关 


$mb = ismobile($smscode,$pwd);




if(empty($mb)){
	
 echo '{"id":"'.'0'.'"}';
    
}else{
    
  
  echo '{"id":"'.$mb.'"}';
  
  
}






 


function ismobile($smscode,$pwd){


$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");
if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("supercard", $con);
  
  $sql = "SELECT * FROM  `userinfo` WHERE  `smscodes` = '$smscode' and password = '$pwd' ";
  
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

