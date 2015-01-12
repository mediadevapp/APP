<?PHP 

if (empty($_GET['cid'])){
echo "没有输入内容ID";
exit(0);
} 

if (empty($_GET['uid'])){
echo "没有输入用户ID";
exit(0);
} 

if (empty($_GET['nickname'])){
echo "当前评论用户昵称";
exit(0);
} 

if (empty($_GET['comment'])){
echo "评论内容";
exit(0);
} 


$cid = $_GET['cid'];
$uid = $_GET['uid']; 
$nickname = $_GET['nickname'];
$ucomment = $_GET['comment'];




$comments = getcomment($cid)."".$nickname.':'.$ucomment."#";

//echo $comments;

addcomment($cid,$comments,$uid,$ucomment);



function getcomment($cid){
	
$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("star_app", $con);
  
  $sql = "SELECT * FROM frcontent WHERE `frcontent`.`cid` ='$cid'";
  //echo($sql);
  $result = mysql_query( $sql);


 while($row = mysql_fetch_array($result))

  {

   //echo  " " . $row['uid'] . " " . $row['username'].",";
   $comment=$row["comments"];
   
   
  }
  
 return $comment;

  }

mysql_close($con);
}



function addcomment($cid,$comments,$uid,$ucomment){

$con = mysql_connect("120.131.70.218","root","1q2w3e4r5t6yJUSHI$");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("star_app", $con);

$sql1 = "UPDATE `frcontent` SET `comments` = '$comments' WHERE `frcontent`.`cid` ='$cid'";

 
 if (!mysql_query($sql1,$con))

 {

   die('Error: ' . mysql_error());

 }



$sql2 = "INSERT INTO `star_app`.`usercomment` (`cid` ,`uid` ,`comments` ,`frcontentid`)VALUES (NULL , '$uid', '$ucomment', '$cid')";

//echo $sql2;

 
 if (!mysql_query($sql2,$con))

 {

   die('Error: ' . mysql_error());

 }

echo $cid;





mysql_close($con);

}

?>

