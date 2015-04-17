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
  
  $sql = "SELECT * FROM articleinfo where id=".$articleid."";
  
  //echo($sql);

  $result = mysql_query( $sql);
  $json=array();
  $arr=array(); 

 while($row = mysql_fetch_array($result))

  {

   //echo  " " . $row['uid'] . " " . $row['username'].",";
   $arr["aid"]=$row["id"];
   $arr["title"]=$row["title"];
   $arr["subtitle"]=$row["subtitle"];
   $arr["content"]=$row["content"];
   $arr["photo"]=$row["photo"];
   $arr["author"]=$row["author"];
   $arr["zcount"]=$row["zcount"];
   $arr["pcount"]=getzcount($articleid);
   $arr["fcount"]=$row["fcount"];
   $arr["crtime"]= date('Y-m-d H:i',strtotime($row["crtime"]));
   
   $json[]=$arr; 
   
  }
  
  echo JSON($json); 

  }

mysql_close($con);




function getzcount($aid){



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

$sql = "SELECT COUNT(DISTINCT commentid) AS count FROM  `comment` WHERE  `articleid` =".$aid."";

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




?>