<?PHP 




if (empty($_POST['fid'])){

echo "没有输入被关注/取消用户ID";
exit(0);
}


$uuid = $_POST['uid'];
$fuid = $_POST['fid'];
//======================================
//用户之间关注操作




if (isfans($fuid)==''){

echo "#TA不是您的粉丝#";


if (isfollow($fuid)==''){

followuser($fuid,$uuid);
fanuser($fuid,$uuid);


}else{
	
	echo "您已经关注过TA";
	exit(0);
	
}




}else{
	
echo "#TA是您的粉丝#";

fanuser($fuid,$uuid);

frienduser($uuid,$fuid);
} 


//======================================





function followuser($id,$fid){
	
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

$sql = "insert into followinfo (uid,follow_id)  values('$id','$fid')";



 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }

 echo "#您刚刚关注了TA#";
  //关闭连接
  mysql_close($con);

}



function frienduser($id,$fid){
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
$sql = "insert into friendinfo (uid,friend_id,allow)  values('$id','$fid','Y')";
 if (!mysql_query($sql,$con))
 {

   die('Error: ' . mysql_error());

 }

 echo "#互相关注,成为好友#";

  //关闭连接
 mysql_close($con);

}


function fanuser($id,$fid){

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

$sql = "insert into fansinfo (uid,fan_id)  values('$id','$fid')";
 
 if (!mysql_query($sql,$con))
 {

   die('Error: ' . mysql_error());

 }

 echo "#你已经是TA的粉丝#";

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
     $fa = $row['uid'];
    
   }

  }

mysql_close($con);



return $fa;

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
  
     $fr = $row['uid'];
   }

  }

mysql_close($con);



return $fr;

}


function isfollow($fid){



$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("star_app", $con);
  
  $sql = "SELECT * FROM followinfo where follow_id='".$fid."'";
  
  //echo($sql);

  $result = mysql_query( $sql);



  while($row = mysql_fetch_array($result))

  {

  //echo $row['id'] . " " . $row['name'];
  
     $fr = $row['uid'];
   }

  }

mysql_close($con);



return $fl;
	
	
	
}


?>



