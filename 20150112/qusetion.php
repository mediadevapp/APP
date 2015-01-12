<?PHP 



  $qtitel = $_POST['title'];
  $contentA = $_POST['contentA'];  $contentB = $_POST['contentB'];
  $contentC = $_POST['contentC'];
  $contentD = $_POST['contentD'];
  
  $answerA = $_POST['answerA'];
  $answerB = $_POST['answerB'];
  $answerC = $_POST['answerC'];
  $answerD = $_POST['answerD'];
  
  $qpics = $_POST['pics'];
  
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

$sql = "insert into question (uid,title,contentA,contentB,contentC,contentD,answerA,answerB,answerC,answerD,pics)  values('$userId','$qtitel','$contentA','$contentB','$contentC','$contentD','$answerA','$answerB','$answerC','$answerD','$qpics')";

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
<form action="qusetion" method="post">

题目<br><textarea rows="3" cols="20" name="title" value="" size="50" ></textarea><br>
内容A<br><textarea rows="3" cols="20" name="contentA" value=""size="50" ></textarea><br>
内容B<br><textarea rows="3" cols="20" name="contentB" value=""size="50" ></textarea><br>
内容C<br><textarea rows="3" cols="20" name="contentC" value=""size="50" ></textarea><br>
内容D<br><textarea rows="3" cols="20" name="contentD" value=""size="50" ></textarea><br>
答案A<br><textarea rows="3" cols="20" name="answerA" value="" size="50" ></textarea><br>
答案B<br><textarea rows="3" cols="20" name="answerB" value="" size="50" ></textarea><br>
答案C<br><textarea rows="3" cols="20" name="answerC" value="" size="50" ></textarea><br>
答案D<br><textarea rows="3" cols="20" name="answerD" value="" size="50" ></textarea><br>
配图地址<br><textarea rows="3" cols="20"name="pics" value="" size="50"></textarea><br>


<input type="submit" name="btn_submit" value="提交" width="20"/>
</form> 