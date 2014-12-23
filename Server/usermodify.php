<?PHP 

//if (empty($_POST['uid'])){echo "请上传用户id";exit(0);} 

$uid = $_POST['uid'];
echo $userId;

  $username = $_POST['username'];
  $nickname = $_POST['nickname'];
  $phrase = $_POST['phrase'];
  $xing = $_POST['xing'];
  $userAge = $_POST['userAge'];
  
  //$userId =getRandStr($length=10);
  



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

//$sql = "insert into userinfo (uid,username,nickname,phrase,xing,photo,userage)  values('$userId','$username','$nickname','$phrase','$xing','$photo','$userAge')";


$sql = "UPDATE `userinfo` SET `username` = '$username',`nickname` = '$nickname', `phrase` = '$phrase',`xing` = '$xing',  `userage` = '$userAge' WHERE `userinfo`.`uid` = '$uid'";


 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }

 echo "修改一条记录";

  //关闭连接

 mysql_close($con)



?>

