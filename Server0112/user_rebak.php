<?PHP 



  $username = $_POST['username'];
  $nickname = $_POST['nickname'];
  $phrase = $_POST['phrase'];
  $xing = $_POST['xing'];
  $photo = $_POST['photo'];
  $userAge = $_POST['userAge'];
  
  $userId =getRandStr($length=10);
  echo $userId;



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

$sql = "insert into userinfo (uid,username,nickname,phrase,xing,photo,userage)  values('$userId','$username','$nickname','$phrase','$xing','$photo','$userAge')";

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }

 echo "添加一条记录";

  //关闭连接

 mysql_close($con)



?>

<br>
============================================================
<br>
<form action="user_re.php" method="post">

<input type="text" name="username" value="raymond" id="name"/><br>
<input type="text" name="nickname" value="raymond" id="name"/><br>
<input type="text" name="phrase" value="cccccc" id="name"/><br>
<input type="text" name="xing" value="白羊座" id="name"/><br>
<input type="text" name="photo" value="http://www.sd.xinhuanet.com/news/2014-05/23/1110837824_14008456096091n.jpg" id="name"/><br>
<input type="text" name="userAge" value="22" id="name"/><br>

<input type="submit" name="btn_submit" value="提交"/>
</form> 