<?PHP 



if (empty($_GET['username'])){
echo "没有输入第三方登录用户信息";
exit(0);
} 


if (empty($_GET['usertype'])){
echo "用户登录类型";
exit(0);
} 


if (empty($_GET['puid'])){
echo "没有输入第三方登录用户唯一标识";
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


$username = $_GET['username'];

$usertype = $_GET['usertype'];

$puid = $_GET['puid'];


$devicetype = $_GET['devicetype'];

$deviceid = $_GET['deviceid'];



//echo strlen($deviceid);

$uid = getRandStr($length=10);





$mb = ispuser($puid);

//echo $mb;


if(empty($mb)){


 insertuserinfo($username,$usertype,$puid,$uid,$devicetype,trim($deviceid));

 echo '{"id":"'.$uid.'"}';
 
	

}else{

  
  updateuserinfo($username,$usertype,$puid,$uid,$devicetype,trim($deviceid)); 

  echo '{"id":"'.$mb.'"}';



}






 


function ispuser($puid){



	$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("supercard", $con);
  
  $sql = "SELECT * FROM  `userinfo` WHERE  `puid` =  '$puid' ";
  
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



function updateuserinfo($username,$usertype,$puid,$uid,$devicetype,$deviceid){
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

$sql = "UPDATE  `userinfo` SET  `username` =  '$username', usertype = '$usertype', device='$devicetype' , deviceid='$deviceid' WHERE  `puid` ='$puid' ";

//echo $sql;

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }
 //echo "Success";
 //echo $uid."#"."Success";
  //关闭连接
 return $puid;
 
 mysql_close($con);

}




function insertuserinfo($username,$usertype,$puid,$uid,$devicetype,$deviceid){
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

$sql = "insert into userinfo (uid,username,usertype,puid,device,deviceid)  values('$uid','$username','$usertype','$puid','$devicetype','$deviceid')";

//echo $sql;

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }
 //echo "Success";
 //echo $uid."#"."Success";
  //关闭连接
 
 return $puid;
 
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

