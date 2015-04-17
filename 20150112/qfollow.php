<?PHP 




if (empty($_POST['fid'])){

echo "没有输入被取消关注用户fid";
exit(0);
}



if (empty($_POST['uid'])){

echo "没有输入当前用户uid";
exit(0);
}


$uuid = $_POST['uid'];
$fuid = $_POST['fid'];
//======================================
//用户之间取消关注操作

echo isfans($fuid);

if (isfans($fuid) ==''){

echo "#TA不是您的粉丝#";

delfollowuser($uuid,$fuid);
delfollowuser($fuid,$uuid);
delfanuser($fuid,$uuid);
delfanuser($uuid,$fuid);


}else{
	
echo "#TA是您的粉丝#";

delfrienduser($uuid,$fuid);
delfrienduser($fuid,$uuid);

delfanuser($fuid,$uuid);

delfollowuser($uuid,$fuid);


} 


//======================================





function delfollowuser($id,$fid){
	
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

$sql = "DELETE FROM `followinfo` WHERE follow_id ='$fid' and uid ='$id'";

//echo $sql;

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }

 echo "#您对TA已经取消关注#";
  //关闭连接
  mysql_close($con);

}



function delfrienduser($id,$fid){
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

$sql = "DELETE FROM `friendinfo` WHERE friend_id ='$fid' and uid ='$id'";

 if (!mysql_query($sql,$con))
 {

   die('Error: ' . mysql_error());

 }

 echo "#取消关注你们已经不是好友#";

  //关闭连接
 mysql_close($con);

}


function delfanuser($id,$fid){

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

$sql = "DELETE FROM `fansinfo` WHERE fan_id ='$fid' and uid ='$id'";
 
 if (!mysql_query($sql,$con))
 {

   die('Error: ' . mysql_error());

 }

 echo "#取消关注您已经不是TA的粉丝#";

  //关闭连接
 mysql_close($con);

}


function isfans($fid){
	

$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("star_app", $con);
  
  $sql = "SELECT * FROM fansinfo where fan_id='".$fid."'";
  
  //echo($sql);

  $result = mysql_query( $sql);



  while($row = mysql_fetch_array($result))

  {

  //echo $row['uid'] . " " . $row['fan_id'];
     
     //echo $row['uid'];
     $fan = $row['uid'];
    
   }


return $fan;

  }

mysql_close($con);





}


function isfriend($fid){

$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("star_app", $con);
  
  $sql = "SELECT * FROM friendinfo where friend_id='".$fid."'";
  
  //echo($sql);

  $result = mysql_query( $sql);



  while($row = mysql_fetch_array($result))

  {

  //echo $row['id'] . " " . $row['name'];
  
     $friend = $row['uid'];
   }
   
   return $friend;

  }

mysql_close($con);





}

?>



