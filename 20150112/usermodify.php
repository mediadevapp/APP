<?PHP 

if (empty($_POST['uid'])){echo "请上传用户id";exit(0);} 

//if (empty($_POST['mobilenum'])){echo "用户手机号为空";exit(0);} 

if (empty($_POST['password'])){echo "用户密码为空";exit(0);} 




$uid = $_POST['uid'];
$pwd = $_POST['password'];

//$username = $_POST['mobilenum'];

$nickname = $_POST['nickname'];
$phrase = $_POST['phrase'];


//$xing = $_POST['xing'];

$sex = $_POST['sex'];
$jobs = $_POST['jobs'];
$face = $_POST['face'];
$personal = $_POST['personal'];



//$userAge = $_POST['userage'];
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


$sql = "UPDATE `userinfo` SET `password` = '$pwd',`nickname` = '$nickname', `phrase` = '$phrase',`jobs` = '$jobs',`face` = '$face',`personal` = '$personal' WHERE `userinfo`.`uid` = '$uid'";


 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }

 //echo $uid;

 $message = '{"id":"'.$uid.'"}';
 
 echo $message;
 
  //关闭连接

mysql_close($con)





?>

