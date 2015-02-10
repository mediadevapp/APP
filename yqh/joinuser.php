<?PHP 

if (empty($_GET['mobilenum'])){
echo "没有输入手机号";
exit(0);
} 

if (empty($_GET['username'])){
echo "没有输入用户名";
exit(0);
} 

if (empty($_GET['eid'])){
echo "没有输入活动ID";
exit(0);
}

if (empty($_GET['econtent'])){
echo "没有输入活动内容";
exit(0);
}  



$uid = getRandStr($length=10);
$username=$_GET['username'];
$eid=$_GET['eid'];

//echo "现在已经报名人数".getcount($eid);



$econtent=$_GET['econtent'];


//echo $econtent;

$mobilenum = $_GET['mobilenum'];




$mb = ismobilenum($mobilenum,$eid);


if(empty($mb)){
	
   //echo "未报名用户";
   
   adduser($uid,$mobilenum,$username,$eid,$econtent);
   
   addusertmp($uid,$mobilenum,$username,$eid,$econtent);
   
   $ncount = getcount($eid)+1;
   
   $array = array
(
'code'=>$ncount,
'message'=> "报名成功"
);
echo JSON($array);
   
   
   
   addcount($ncount,$eid);


}else{
	
$array = array
(
'code'=>"0",
'message'=> "报名失败，您已经报名"
);

echo JSON($array);
	
}






 


function ismobilenum($mobilenum,$eid){



	$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("supercard", $con);
  
  $sql = "SELECT * FROM  `joinuser` WHERE  `mobilenum` =  '$mobilenum' and  `eventsid`='$eid' ";
  
  //echo($sql);

  $result = mysql_query($sql);
  

 while($row = mysql_fetch_array($result))

  {

   //echo  " " . $row['uid'] . " " . $row['username'].",";
   $arr =$row["uid"];
  
  }
  
  return $arr;
  
  }

mysql_close($con);
	
	
}



function adduser($uid,$mobilenum,$username,$eid,$econtent){

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

$sql = "insert into joinuser (uid,mobilenum,username,eventsid,evencontent)  values('$uid','$mobilenum','$username','$eid','$econtent')";

//echo $sql;

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }
 echo "";
 //echo $uid;
  //关闭连接
 mysql_close($con);

}

function addusertmp($uid,$mobilenum,$username,$eid,$econtent){

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

$sql = "insert into joinusertmp (uid,mobilenum,username,eventsid,evencontent)  values('$uid','$mobilenum','$username','$eid','$econtent')";

//echo $sql;

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }
 echo "";
 //echo $uid;
  //关闭连接
 mysql_close($con);

}







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




function getcount($eid){

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

$sql = "SELECT COUNT(*) AS count FROM  `joinuser` WHERE  `eventsid` =".$eid."";


$query=mysql_query($sql);

	if($rs=mysql_fetch_array($query)){

     $count=$rs[0];

	}else{
	
	    $count=0;
	}


 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }


 //echo $uid;
  //关闭连接
 mysql_close($con);

	
return  $count;

}


function addcount($count,$eid){

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

$sql = " UPDATE  `eventsinfo` SET  `ucount` =  '$count' WHERE `eventsid` = $eid ";

//echo $sql;

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }
 echo "";
 //echo $uid;
  //关闭连接
 mysql_close($con);


}

/**************************************************************
*
* 使用特定function对数组中所有元素做处理
* @param string &$array 要处理的字符串
* @param string $function 要执行的函数
* @return boolean $apply_to_keys_also 是否也应用到key上
* @access public
*
*************************************************************/
function arrayRecursive(&$array, $function, $apply_to_keys_also = false)
{
static $recursive_counter = 0;
if (++$recursive_counter > 1000) {
die('possible deep recursion attack');
}
foreach ($array as $key => $value) {
if (is_array($value)) {
arrayRecursive($array[$key], $function, $apply_to_keys_also);
} else {
$array[$key] = $function($value);
}
if ($apply_to_keys_also && is_string($key)) {
$new_key = $function($key);
if ($new_key != $key) {
$array[$new_key] = $array[$key];
unset($array[$key]);
}
}
}
$recursive_counter--;
}
/**************************************************************
*
* 将数组转换为JSON字符串（兼容中文）
* @param array $array 要转换的数组
* @return string 转换得到的json字符串
* @access public
*
*************************************************************/
function JSON($array) {
arrayRecursive($array, 'urlencode', true);
$json = json_encode($array);
return urldecode($json);
}
/**************************************************************
$array = array
(
'name'=>'白羊座',
'content1'=>123456,
'content2'=>123456,
'content3'=>123456
);
echo JSON($array);
*************************************************************/


?>

