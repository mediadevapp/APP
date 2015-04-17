<?PHP 

if (empty($_GET['articleid'])){
echo "没有输入articleid";
exit(0);
} 


if (empty($_GET['uid'])){
echo "点赞用户ID";
exit(0);
} 






$articleid=$_GET['articleid'];
$uid=$_GET['uid'];


$username = getusername($uid);


//echo $count;








$ccount = getcount($articleid) + 1;

$zed = getzanuser($uid,$articleid);


//echo ">>>>>>".$ccount;
//echo ">>>>>>".$zed;



if($zed == ""){
	

 $message= '{"id":"您还没赞过了"}';
 echo $message;
 
 
 autocount($ccount,$articleid);
 addzanuser($articleid,$uid,$username);
 

	
}else{

  $message= '{"id":"您已经赞过了"}';
	
  echo $message;
	
}


exit(0);




function autocount($count,$articleid){
	
	
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

$sql = "UPDATE  `articleinfo` SET  `zcount` =  '$count' WHERE  `id` =  '$articleid' ";

//echo($sql);

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }

 //echo "Success";

  //关闭连接

 mysql_close($con);
	
	
}


function addzanuser($articleid,$uid,$username){
	
	
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

$sql = "insert into zanuser (userid,username,articleid)values('$uid','$username','$articleid')";

//echo($sql);

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }

 //echo "Success";

  //关闭连接

 mysql_close($con);
	
}



function getcount($articleid){

$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");
if (!$con)
{
die('数据库连接失败: ' . mysql_error());
}
else
{
mysql_select_db("star_app", $con);

$sql = "SELECT * FROM  `articleinfo` WHERE id =  '$articleid'";

//echo($sql);

$result = mysql_query( $sql);

while($row = mysql_fetch_array($result))
{
//echo $row['id'] . " " . $row['name'];

$zcount = $row['zcount'];

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

$sql = "SELECT * FROM  `zanuser` WHERE articleid = '$articleid' ";

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

