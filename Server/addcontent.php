<?PHP 

if (empty($_POST['uid'])){
echo "没有输入用户ID";
exit(0);
} 



if (empty($_POST['content'])){
echo "内容不能为空";
exit(0);
} 

if (empty($_POST['nickname'])){
echo "昵称不能为空";
exit(0);
} 




$uid=$_POST['uid'];
$nickname=$_POST['nickname'];
$title=$_POST['title'];
$content=$_POST['content'];


echo "uid=".$uid."nickname=".$nickname."titel=".$title."content=".$content;



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

$sql = "insert into frcontent (uid,nickname,title,content)  values('$uid','$nickname','$title','$content')";

//echo $sql;

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }

 echo "Success";

  //关闭连接

 mysql_close($con)



?>

