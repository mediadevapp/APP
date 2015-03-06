<?PHP 

if (empty($_GET['uid'])){
echo "没有输入用户名称";
exit(0);
} 

if (empty($_GET['cname'])){
echo "没有输入分类";
exit(0);
} 

if (empty($_GET['content'])){
echo "没有输入内容";
exit(0);
} 




  $uid = $_GET['uid'];
  $cname = $_GET['cname'];
  $content = $_GET['content'];
  $fid =getRandStr($length=10);
  



  addevents($fid,$uid,$cname,$content);



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



function addevents($fid,$uid,$cname,$content){
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
mysql_select_db("supercard");

$sql = "insert into feedback (fid,uuid,sortname,content)  values('$fid','$uid','$cname','$content')";

//echo $sql;

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }
 //echo "Success";
 echo $uid;
  //关闭连接
 mysql_close($con);
 
}




?>

