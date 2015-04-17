<?PHP 



if (empty($_GET['mobilenum'])){
echo "没有输入手机号";
exit(0);
} 


if (empty($_GET['uid'])){
echo "没有uid";
exit(0);
} 

$mobile = $_GET['mobilenum'];
$uid =  $_GET['uid'];


//$smscode = getRandStr($length=6);




//echo $smscode."发送codes短信网关";
// 发送给短信网关 


$mb = ismobile($mobile,$uid);

$smscode = $mb;


if(empty($mb)){
	

$array = array
(
'id'=>'0'

);

echo JSON($array);
    
}else{
    
  sendsmscode($smscode,$mobile);


$array = array
(
'id'=>$smscode

);

echo JSON($array);
  

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
 


function ismobile($mobile,$uid){


$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");
if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("supercard", $con);
  
  $sql = "SELECT * FROM  `userinfo` WHERE  `mobilenum` = '$mobile'  and uid= '$uid' ";
  
  //echo($sql);

  $result = mysql_query($sql);
  
 while($row = mysql_fetch_array($result))

  {

   //echo  " " . $row['uid'] . " " . $row['username'].",";
   $arr =$row["smscodes"];
  
  }
  
  return $arr;
  
  }

mysql_close($con);
	
}


function sendsmscode($smscode,$mobilenum){

	
$url1="http://sdk999ws.eucp.b2m.cn:8080/sdkproxy/sendsms.action?cdkey=9SDK-EMY-0999-JEQPK&password=256564&phone=".$mobilenum."&message="."【超级邀请函】密码重置验证码=".$smscode."&addserial=";

//echo ">>>>>>>>>>>>";
//echo $url1;
//echo "<<<<<<<<<<<";

$html = file_get_contents($url1);  

//echo "#";
//echo  $html;  
	
}








?>

