<?PHP 




if (empty($_POST['fid'])){

echo "没有输入被关注/取消用户ID";

}


$uuid = $_POST['uid'];
$fuid = $_POST['fid'];
//======================================
//用户之间关注操作
if (isfans($fuid)==''){

echo "#TA不是您的粉丝#";

followuser($fuid,$fuid);
fanuser($fuid,$uuid);

exit(0);
}else{
	
echo "#TA是您的粉丝#";

frienduser($uuid,$fuid);
fanuser($fuid,$uuid);

exit(0);
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

 echo "#您已关注了TA#";
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
$sql = "insert into friendinfo (uid,friend_id)  values('$id','$fid')";
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

?>

<br>
==========================测试用户关注单元测试==================================
<br>
<form action="follow.php" method="post">
你的ID<br>
<input type="text" name="uid" value="6283429397" /><br>
被关注的ID<br>
<input type="text" name="fid" value="" /><br>
Follow 
<input type="text" name="u_action" value="follow" /><br>


<input type="submit" name="btn_submit" value="提交"/>
</form> 


<br>
==========================测试用户取消关注单元测试==================================
<br>
<form action="follow.php" method="post">
你的ID<br>
<input type="text" name="uid" value="6283429397" /><br>
被关注的ID<br>
<input type="text" name="fid" value="" /><br>
Canel_Follow 
<input type="text" name="u_action" value="canelfollow" /><br>


<input type="submit" name="btn_submit" value="提交"/>
</form> 