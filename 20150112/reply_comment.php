<?PHP 

if (empty($_GET['commentid'])){
echo "请输入commentid";
exit(0);
} 


if (empty($_GET['reply'])){
echo "请回复内容reply";
exit(0);
} 





if (empty($_GET['userid'])){
echo "请输入userid";
exit(0);
} 


$replyid = getRandStr($length=10);

$commentid = $_GET['commentid'];

$reply = $_GET['reply'];

$userid = $_GET['userid'];

$userphotos= getuserphoto($userid);


$comment = getcomment($commentid);

$articleid = getarticleid($commentid);

//echo $comment;
//echo $articleid;
//echo $userphotos;
//exit(0);



addreply($replyid,$commentid,$comment,$reply,$userphotos,$userid,$articleid);



function addreply($replyid,$commentid,$comment,$reply,$path,$userid,$articleid){
	
	
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

$sql = "insert into comment (replyid,commentid,comment,replaycomment,userphotos,userid,articleid)values('$replyid','$commentid','$comment','$reply','$path','$userid','$articleid')";

//echo($sql);

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }

 echo "Success";

  //关闭连接

 mysql_close($con);
 
}




function addreplybb($replyid,$commentid,$comment,$reply,$path,$userid,$articleid){
	
	
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

$sql = "insert into replay (replyid,commentid,comment,replaycomment,userphotos,userid,articleid)values('$replyid','$commentid','$comment','$reply','$path','$userid','$articleid')";

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


function getcomment($commentid){

$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("star_app", $con);
  
  $sql = "SELECT * FROM comment where  commentid=".$commentid." and  replyid='N' ";
  
  //echo($sql);

  $result = mysql_query( $sql);

 while($row = mysql_fetch_array($result))

  {

   //echo  " " . $row['uid'] . " " . $row['username'].",";
   //echo  $row["comment"];
   
   $comment = $row["comment"];
   
 }
  
 return $comment;
  
  

  }

mysql_close($con);

	
}




function getarticleid($commentid){

$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("star_app", $con);
  
  $sql = "SELECT * FROM comment where  commentid=".$commentid." and  replyid='N' ";
  
  //echo($sql);

  $result = mysql_query( $sql);

 while($row = mysql_fetch_array($result))

  {

   //echo  " " . $row['uid'] . " " . $row['username'].",";
   //echo  $row["comment"];
   
   $articleid = $row["articleid"];
   
 }
  
 return $articleid;
  
  

  }

mysql_close($con);

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
  
  //echo($sql);

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

