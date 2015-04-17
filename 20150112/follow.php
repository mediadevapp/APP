<?PHP 

if (empty($_POST['fid'])){
echo "没有输入被关注用户ID";
exit(0);
}



if (empty($_POST['uid'])){

echo "没有输入用户ID";
exit(0);
}


$uuid = $_POST['uid'];
$fuid = $_POST['fid'];





//======================================
//用户之间关注操作




$dfollow = didfollow($uuid,$fuid);
$didfans = didfans($uuid,$fuid);


$ff =$dfollow.$didfans;

//exit(0);
/*if($ff =="您已关注TA您是TA的粉丝"){
	
	
	frienduser($uuid,$fuid);
	frienduser($fuid,$uuid);
	
	
}
*/



if($dfollow =="您已关注TA"){

echo "已经关注过了，不能再关注了";


}else if(empty($dfollow)){
	
followuser($fuid,$uuid);
fanuser($fuid,$uuid);


	
}






//粉丝操作



if($didfans =="您是TA的粉丝"){

echo "您已经是TA的粉丝了";

	frienduser($uuid,$fuid);
	frienduser($fuid,$uuid);
	



}else if(empty($didfans)){
	
fanuser($fuid,$uuid);



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

$sql = "insert into followinfo (uid,follow_id,relation)  values('$fid','$id','您已关注TA')";



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

$sql = "insert into friendinfo (uid,friend_id,allow,relation)  values('$id','$fid','Y','互相关注')";

//echo $sql;

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

$sql = "insert into fansinfo (uid,fan_id,relation)  values('$id','$fid','您是TA的粉丝')";
 
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
     $fan = $row['uid'];
    
   }

  }

mysql_close($con);



return $fan;

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
  
  echo($sql);

  $result = mysql_query( $sql);
  while($row = mysql_fetch_array($result))

  {

  //echo $row['id'] . " " . $row['name'];
  
     $follow = $row['uid'];
   }

  }

return $follow;
mysql_close($con);

	
}





function didfollow($uid,$fid){

$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");
if (!$con)
  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {
  mysql_select_db("star_app", $con);

  $sql = "SELECT * FROM followinfo where follow_id = $fid and uid= $uid";
  
  //echo($sql);

  $result = mysql_query( $sql);
 
  while($row = mysql_fetch_array($result))

  {

  //echo $row['id'] . " " . $row['name'];
     
     $fff = $row['relation'];
   }

    return $fff;

  }


mysql_close($con);

}



function didfans($uid,$fid){

$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");
if (!$con)
  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {
  mysql_select_db("star_app", $con);

  $sql = "SELECT * FROM fansinfo  where fan_id = $fid and uid =$uid";
  
  //echo($sql);

  $result = mysql_query( $sql);
 
  while($row = mysql_fetch_array($result))

  {

  //echo $row['id'] . " " . $row['name'];
     
     $aaa = $row['relation'];
   }

    return $aaa;

  }


mysql_close($con);

}





?>



