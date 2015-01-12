<?PHP 

  $title = $_POST['title'];
  $content = $_POST['content'];
  $author = $_POST['author'];
  $count1 = $_POST['zcount'];
  $photo = $_POST['photo'];
  $count2 = $_POST['pcount'];
  $count3 = $_POST['fcount'];
  
  $aId =getRandStr($length=10);
  echo  $aId;



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

$sql = "insert into articleinfo (id,title,content,author,photo,zcount,pcount,fcount)  values('$aId','$title','$content','$author','$photo','$count1','$count2','$count3')";

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
<form action="content.php" method="post">

<input type="text" name="title" value="双鱼座女生" id="name"/><br>
<input type="text" name="content" value="作为双鱼座女生，双鱼座女生既有清纯一面，又有可爱大胆的好色一面，集清纯火辣于一身。作为双鱼座女生，你不会轻易地陷入飘浮不定的爱情，但在某些情况下也会显得举棋不定。心软好动感情，会与多个男性谈恋爱，所以感情结束时万不能拖泥带水。结婚后应当继续发展爱好或参加社会活动，如果只呆在家里，会引起健康的失衡。你属于早熟类型，从青春期开始就已经单恋，写情书，但实际经验来得较晚。性生活比较积极主动，不厌其烦，懂得性爱的魅力和快乐所在。
理想的结婚对象是巨蟹座、蝎子座男性，年龄相差越大越好，如果同龄或男方年幼将出现问题。你只有和英俊、知性、大器晚成的男性在一起才会感到幸福，要尽量选择体魄高大的男性。25、35岁时会遇到最理想的男性。虽然等待梦中的白马王子可能会使你贻误婚期，但“好饭不怕晚”，一定要耐心等待。
" id="name"/><br>
<input type="text" name="author" value="raymond" id="name"/><br>
<input type="text" name="photo" value="http://www.sd.xinhuanet.com/news/2014-05/23/1110837824_14008456096091n.jpg" id="name"/><br>
<input type="text" name="zcount" value="123" id="name"/><br>
<input type="text" name="pcount" value="345" id="name"/><br>
<input type="text" name="fcount" value="456" id="name"/><br>

<input type="submit" name="btn_submit" value="提交"/>
</form> 