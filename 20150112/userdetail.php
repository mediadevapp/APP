<?php

if (empty($_GET['uid'])){

echo "没有输入当前用户uid";
exit(0);
} 
$n_uid =  $_GET['uid'];



if (empty($_GET['uuid'])){

echo "没有输入选择用户uuid";
exit(0);
} 

$c_uid =  $_GET['uuid'];

//echo "星座名： ".$s_name." "; 



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
 
/**************************************************************
生日计算年龄方法 
$birth='1985.6.23';
list($by,$bm,$bd)=explode('.',$birth);
$cm=date('n');
$cd=date('j');
$age=date('Y')-$by-1;
if ($cm>$bm || $cm=$bm && $cd>$$bd) $age++;
echo "生日:$birth\n";
echo "年龄:$age\n";
 *************************************************************/


$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("star_app", $con);
  
  $sql = "SELECT * FROM userinfo where uid='".$n_uid."'";
  
  //echo($sql);

  $result = mysql_query( $sql);



  while($row = mysql_fetch_array($result))

  {

  //echo $row['id'] . " " . $row['name'];

  
  
  $array = array
       (
          'id'=>$row['uid'],
          'username'=> $row['username'],
          'nickname'=> $row['nickname'],
          'sex'=> $row['sex'],
          'phrase'=> $row['phrase'],
          'photo'=> $row['photo'],
          
          'userage'=> $row['userage'],
          
          'birthday'=> $row['birthday'],
          
          'fans'=> getfans($n_uid),
          'follow'=> getfollow($n_uid),
          
          'relation'=> getrelation($n_uid,$c_uid),
          
          'regtime'=> substr($row['crtime'],0,10),
          
          'xing'=> $row['xing'],
          
          'jobs'=> $row['jobs'],
          
          'face'=> $row['face'],
          
          'personal'=> $row['personal'],
          
           'crtime'=> $row['crtime'],
          
          'pics'=>$row['pics']
          
          
       );
  
  
  echo JSON($array);

  
   }

  }

mysql_close($con);


//getfans($n_uid);
//getfollow($n_uid);


function getfans($uid){

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

$sql = "SELECT COUNT(DISTINCT fan_id) AS count FROM  `fansinfo` WHERE  `uid` =".$uid."";

//echo $sql;

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






function getfollow($uid){


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

$sql = "SELECT COUNT(DISTINCT follow_id) AS count FROM  `followinfo` WHERE  `uid` =".$uid."";

//echo $sql;

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



function getrelation($uid,$cid){

//function getrelation(){

$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("star_app", $con);
  
  $sql = "(SELECT * FROM  `fansinfo` where uid = '$uid' and fan_id = '$cid') union (SELECT * FROM  `followinfo`  where uid='$uid' and follow_id = '$cid') union (SELECT * FROM  `friendinfo` where uid='$uid' and friend_id='$cid' )";
  
  //echo($sql);

  $result = mysql_query( $sql);
 

 while($row = mysql_fetch_array($result))

  {

   //echo  " " . $row['uid'] . " " . $row['username'].",";
   
   $relation=$row["relation"];


   
  }
  
  return $relation; 

  }

mysql_close($con);
	
	
}



?>