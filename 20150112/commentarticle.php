<?PHP 

if (empty($_GET['articleid'])){
echo "请输入articleid";
exit(0);
} 


if (empty($_GET['comment'])){
echo "请评论内容comment";
exit(0);
} 





if (empty($_GET['userid'])){
echo "请输入userid";
exit(0);
} 


$cid = getRandStr($length=10);

$articleid = $_GET['articleid'];

$comment = $_GET['comment'];



$userid= $_GET['userid'];
$userphotos= getuserphoto($userid);


addcomment($cid,$articleid,$comment,$userphotos,$userid);






function addcomment($cid,$articleid,$comment,$path,$userid){
	
	
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
mysql_select_db("star_app");

$sql = "insert into comment (commentid,articleid,comment,userphotos,userid)values('$cid','$articleid','$comment','$path','$userid')";

//echo($sql);

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }

 echo "Success";

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




function getuserphoto($userid){

$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("star_app", $con);
  
  $sql = "SELECT * FROM userinfo where  uid= ".$userid." ";
  
 // echo($sql);

  $result = mysql_query( $sql);

 while($row = mysql_fetch_array($result))

  {

   //echo  " " . $row['uid'] . " " . $row['username'].",";
   //echo  $row["comment"];
   
   $userphoto = $row["photo"];
   
 }
  
 return $userphoto;
  
  

  }

mysql_close($con);

}




?>

