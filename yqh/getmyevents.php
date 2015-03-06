<?php

if (empty($_GET['uid'])){
echo "没有输入uid";
exit(0);
} 

$uid = $_GET['uid'];

getevents($uid);

/**************************************************************
 *
 *	使用特定function对数组中所有元素做处理
 *	@param	string	&$array		要处理的字符串
 *	@param	string	$function	要执行的函数
 *	@return boolean	$apply_to_keys_also		是否也应用到key上
 *	@access public
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
 *	将数组转换为JSON字符串（兼容中文）
 *	@param	array	$array		要转换的数组
 *	@return string		转换得到的json字符串
 *	@access public
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


function getevents($uid){
	
	
$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("supercard", $con);
  
  $sql = "SELECT * FROM  `eventsinfo` WHERE  `userid` =  '$uid' and  `status` = 'Y'ORDER BY  `eid` DESC ";
  
  //echo($sql);

  $result = mysql_query($sql);
  
  $json=array();
  $arr=array();
   
 while($row = mysql_fetch_array($result))

  {

   //echo  " " . $row['uid'] . " " . $row['username'].",";
   $arr["uid"]=$row["userid"];
   $arr["eid"]=$row["eventsid"];
   $arr["status"]=$row["status"]; 
   $arr["username"]=$row["username"];
   $arr["title"]=$row["title"];
   $arr["content"]=$row["content"];
   $arr["mobile"]=$row["mobile"];
   $arr["starttime"]=$row["startime"];
   $arr["endtime"]=$row["endtime"];
   $arr["pics"]=$row["pic"];
   $arr["locations"]=$row["locations"];
   $arr["templateid"]=$row["templateid"];
   $arr["Number of people"]= $row["ucount"];;
   
   
   
   
   $json[]=$arr; 
   
  }
  
  echo JSON($json); 

  }

mysql_close($con);

}





?>