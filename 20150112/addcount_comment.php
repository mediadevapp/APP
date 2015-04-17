<?PHP 

if (empty($_GET['commentid'])){
echo "没有输入commentid";
exit(0);
} 


if (empty($_GET['uid'])){
echo "点赞用户ID";
exit(0);
} 





$commentid=$_GET['commentid'];
$uid=$_GET['uid'];


$username = getusername($uid);
//echo $count;






$ccount = getcount($commentid) + 1;
$zed = getzanuser($uid,$commentid);


//echo ">>>>>>".$ccount;

//echo ">>>>>>".$zed;



if($zed == ""){
	

 $message= '{"id":"您还没赞过了"}';
 echo $message;
 
 
 autocount($ccount,$commentid);
 addzanuser($commentid,$uid,$username);
 

	
}else{

  $message= '{"id":"您已经赞过了"}';
	
  echo $message;
	
}


exit(0);




function autocount($count,$commentid){
	
	
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

$sql = "UPDATE  `comment` SET  `zancount` =  '$count' WHERE  `commentid` =  '$commentid' ";

//echo($sql);

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }

 //echo "Success";

  //关闭连接

 mysql_close($con);
	
	
}


function addzanuser($commentid,$uid,$username){
	
	
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

$sql = "insert into zanuser (userid,username,articleid)values('$uid','$username','$commentid')";

//echo($sql);

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }

 //echo "Success";

  //关闭连接

 mysql_close($con);
	
}



function getcount($commentid){

$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");
if (!$con)
{
die('数据库连接失败: ' . mysql_error());
}
else
{
mysql_select_db("star_app", $con);

$sql = "SELECT * FROM  `comment` WHERE commentid =  '$commentid'";

//echo($sql);

$result = mysql_query( $sql);

while($row = mysql_fetch_array($result))
{
//echo $row['id'] . " " . $row['name'];

$zcount = $row['zancount'];

}

//echo $zcount;

return $zcount;

}
mysql_close($con);

}


function getzanuser($uid,$articleid){


$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");
if (!$con)
{
die('数据库连接失败: ' . mysql_error());
}
else
{
mysql_select_db("star_app", $con);

$sql = "SELECT * FROM  `zanuser` WHERE articleid = '$articleid' and userid='$uid' ";

//echo($sql);

$result = mysql_query( $sql);


while($row = mysql_fetch_array($result))
{
//echo $row['id'] . " " . $row['name'];


    $userid = $row['userid'];

}


return $userid;



}
mysql_close($con);

}



function getusername($uid){

$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");
if (!$con)
{
die('数据库连接失败: ' . mysql_error());
}
else
{
mysql_select_db("star_app", $con);

$sql = "SELECT * FROM  `userinfo` WHERE uid = '$uid' ";

//echo($sql);

$result = mysql_query( $sql);


while($row = mysql_fetch_array($result))
{
//echo $row['id'] . " " . $row['name'];


    $username = $row['username'];

}


return $username;



}
mysql_close($con);



}





?>

