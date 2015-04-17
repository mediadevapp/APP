<?php


if (empty($_GET['articleid'])){
echo "请输入articleid";
exit(0);
} 

$articleid = $_GET['articleid']; 




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


$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("star_app", $con);
  
  $sql = "SELECT * FROM comment where  articleid=".$articleid."";
  
  //echo($sql);

  $result = mysql_query( $sql);
  $json=array();
  $arr=array(); 

 while($row = mysql_fetch_array($result))

  {

   //echo  " " . $row['uid'] . " " . $row['username'].",";
 
   
   $arr["commentid"]=$row["commentid"];
   
   $originator = getoriginator($row["commentid"]);
   
   $arr["originator"]= $originator;
   
   $arr["userid"]=$row["userid"];
   $arr["nickname"]= getnickname($row["userid"]);
   $arr["userphotos"]= $row["userphotos"];
   $arr["comment"]=$row["comment"];
   $arr["replaycomment"]=$row["replaycomment"];
   $arr["articleid"]=$row["articleid"];
   
   $arr["replyid"]=$row["replyid"];
   
   
   $arr["zancount"]=$row["zancount"];
   $arr["crtime"]=$row["crtime"];
   
   $time = $row["crtime"];
   
   $arr["status"]=gettimestatus($time);
   
   $json[]=$arr; 
   
  }
  

  
  echo JSON($json); 

  }

mysql_close($con);






function getnickname($userid){

$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("star_app", $con);
  
  $sql = "SELECT * FROM userinfo where  uid= ".$userid." ";
  
 // echo($sql);

  $result = mysql_query( $sql);

 while($row = mysql_fetch_array($result))

  {

   //echo  " " . $row['uid'] . " " . $row['username'].",";
   //echo  $row["comment"];
   
   $nickname = $row["nickname"];
   
 }
  
 return $nickname;
  
  

  }

mysql_close($con);

}






function gettimestatus($time){

// echo "它们相差的时间值是：".(strtotime($time)-strtotime($times,$now))."";

//echo "====================================================";
//echo "评论或回复的时间是".$time;

$times = date('Y-m-d H:i:s');

//echo "评论时间:".strtotime($time);
//echo "系统时间:".strtotime($times);

$tt = (strtotime($time)-strtotime($times));

//echo "时间比较进行ing".$tt;

//echo "====================================================";




if( (int)$tt > 0){

 //echo "时间：".$time." 早于时间：".$times;
 return "时光倒流了么";


}else if( -100< (int)$tt ){
	
 //一分钟内
 $message = "刚刚";
 //echo "".$message;
 return $message;
	
}else if( -3506 < (int)$tt ){
	
 //一个小时内
 $message =hours_min(strtotime($times),strtotime($time))."分钟前";
 //echo "".$message;
 return $message;
	
}else if( -83586<(int)$tt){
	
 //一天内
 
  
 
 $message =hours_min(strtotime($times),strtotime($time))."小时前";
 
 //echo "".$message;
 return $message;
	
}else if( (int)$tt < -83586 ){
	
 //超过一天
 $message = $time;
 //echo "".$message;
 return $message;
	
}


}


function getoriginator($commentid){

	$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("star_app", $con);
  
  $sql = "SELECT * FROM userinfo where  uid in (SELECT userid FROM comment where  commentid= ".$commentid." and replyid= 'N')";
  
  //echo($sql);

  $result = mysql_query( $sql);

 while($row = mysql_fetch_array($result))

  {

   //echo  " " . $row['uid'] . " " . $row['username'].",";
   //echo  $row["comment"];
   
   $nickname = $row["nickname"];
   
 }
  
 return $nickname;
  
  

  }

mysql_close($con);
	
	
	
}

//输入两个时间戳，计算差值，也就是相差的小时数，如返回2:10，则表示输入的两个时间相差2小时10分钟
function hours_min($start_time,$end_time){
if (strtotime($start_time) > strtotime($end_time)) list($start_time, $end_time) = array($end_time, $start_time);
$sec = $start_time - $end_time;
$sec = round($sec/60);
$min = str_pad($sec%60, 2, 0, STR_PAD_LEFT);
$hours_min = floor($sec/60);
$min != 0 && $hours_min .= ':'.$min;
return $hours_min;
} 






?>