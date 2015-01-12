<?PHP 
 
 
if (empty($_POST['nickname'])){
echo "没有输入用户昵称";
exit(0);
} 


if (empty($_POST['content'])){
echo "没有输入内容";
exit(0);
} 



  $nickname = $_POST['nickname'];
  $content = $_POST['content'];
  
  $userId =getRandStr($length=10);
  echo "昵称".$nickname;
  echo "内容".$content;
  
  
  feedback($userId,$nickname,$content);
  
  
  

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


function feedback($uid,$nickname,$content){

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

$sql = "insert into feedback (id,nickname,comment)  values('$userId','$nickname','$content')";

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }

 echo "谢谢反馈";

  //关闭连接

 mysql_close($con)


	
	
}



?>

