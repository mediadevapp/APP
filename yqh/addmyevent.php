<?PHP 

if (empty($_POST['templateid'])){
echo "没有输入模版ID";
exit(0);
}



if (empty($_POST['username'])){
echo "没有输入用户名称";
exit(0);
} 


if (empty($_POST['userid'])){
echo "没有输入用户ID";
exit(0);
} 

if (empty($_POST['title'])){
echo "没有输入活动标题";
exit(0);
} 


if (empty($_POST['mobilenum'])){
echo "没有输入联系人电话号码";
exit(0);
} 


if (empty($_POST['bgmusic'])){
echo "没有选择默认背景音乐";
exit(0);
} 



 $photo = "";
 
 

  $userid = $_POST['userid'];

  $username = $_POST['username'];
  $username2 = $_POST['username2'];
  
  $title = $_POST['title'];
  
  if(strlen($title)>30){
	  
	  echo "活动标题超出限制";
      exit(0);
	  
  }
  
  
  
  $content = $_POST['content'];
  
  
  $mobile = $_POST['mobilenum'];
  
  
  
  $eventid =getRandStr($length=10);
  
  $templateid = $_POST['templateid'];
  
  preg_match('/^\d+$/i', $templateid) or die('模版参数必须是数字1-20');
  



  
  
  $startime = $_POST['startime'];
  $endtime = $_POST['endtime'];
  
  $longitude = $_POST['longitude'];
  $latitude = $_POST['latitude'];
  
  $locations = $_POST['location'];
  
  
  
  
  $bgmusic = $_POST['bgmusic'];
  
  $status ='N';



  addevents($eventid,$userid,$username,$username2,$title,$content,$mobile,$photo,$templateid,$startime,$endtime,$locations,$longitude,$latitude,$bgmusic,$status);



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



function addevents($eid,$userid,$username,$username2,$title,$content,$mobile,$photo,$templateid,$startime,$endtime,$locations,$longitude,$latitude,$bgmusic,$status){
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

$sql = "insert into eventsinfo (eventsid,userid,username,username2,title,content,mobile,pic,templateid,startime,endtime,locations,longitude,latitude,bgmusic,status)  values('$eid','$userid','$username','$username2','$title','$content','$mobile','$photo','$templateid','$startime','$endtime','$locations','$longitude','$latitude','$bgmusic','$status')";

//echo $sql;

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }
 //echo "Success";
 echo trim($eid);
  //关闭连接
 mysql_close($con);
 
}



function gettmpinfo($tmpid){

$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("supercard", $con);
  
  $sql = "SELECT * FROM  `templateinfo` WHERE  `templateid` =  '$tmpid' ";
  
  echo($sql);

  $result = mysql_query($sql);
  

   
 while($row = mysql_fetch_array($result))

  {

   //echo  " " . $row['uid'] . " " . $row['username'].",";
   
   $templateid = $row["templateid"];
   $templatename = $row["templatename"];

}


return $templatename;


}

mysql_close($con);
	
}





?>

