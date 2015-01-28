<?php

if (empty($_GET['eid'])){
echo "没有输入活动id";
exit(0);
} 

$eid = $_GET['eid'];
geteventdetails($eid);

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


function geteventdetails($eid){
	
	
$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("supercard", $con);
  
  $sql = "SELECT * FROM  `eventsinfo` WHERE  `eventsid` =  '$eid' ORDER BY  `endtime` ASC ";
  
  //echo($sql);

  $result = mysql_query($sql);
  
  $json=array();
  $arr=array();
   
 while($row = mysql_fetch_array($result))

  {

   //echo  " " . $row['uid'] . " " . $row['username'].",";
   $arr["uid"]=$row["userid"];
   $arr["username"]=$row["username"];
   $arr["mobile"]=$row["mobile"];
   $arr["mobile2"]=$row["mobile2"];
   $arr["title"]=$row["title"];
   $arr["content"]=$row["content"];
   $arr["starttime"]=$row["startime"];
   $arr["endtime"]=$row["endtime"];
   $arr["pics"]=$row["pic"];
   $arr["templateid"]=$row["templateid"];
   $arr["locations"]=$row["locations"];
   $arr["joineusers"] = getuser($eid);
   $arr["status"] = $row["status"];
   $arr["lng"] = $row["longitude"];
   $arr["lat"] = $row["latitude"];

   
   $json[]=$arr; 
   
  }
  
  echo JSON($json); 
 

  }

//mysql_close($con);

}



function getuser($eid){
	
$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("supercard", $con);
  
  $sql = "SELECT * FROM  `joinuser` WHERE  `eventsid` ='$eid'";
  
  //echo($sql);

  $result = mysql_query($sql);
  
  //$json=array();
  
  $arr=array();
   
 while($row = mysql_fetch_array($result))

  {

   //echo  " " . $row['uid'] . " " . $row['username'].",";
   //$arr["uid"]=$row["uid"];
   

   $arr["username&mobile"]=$row["username"]."&".$row["mobilenum"]."#";
  

   $s2 .= implode(',',$arr);

   
   
   //$json[]=$arr; 
   
  }
  
  //echo JSON($json); 
  
      
   return $s2;
  
  

  }

mysql_close($con);

}




?>