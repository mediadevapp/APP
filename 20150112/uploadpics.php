<?php


if (empty($_POST['uid'])){
echo "请上传用户id";
exit(0);
} 

$uid = $_POST['uid'];



//echo "Type: " . $_FILES["file"]["type"] . "<br />";



if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "application/octet-stream")|| ($_FILES["file"]["type"] == "image/bmp")|| ($_FILES["file"]["type"] == "image/jpg")|| ($_FILES["file"]["type"] == "image/png")|| ($_FILES["file"]["type"] == "image/pjpeg"))&& ($_FILES["file"]["size"] < 50000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    //echo "Return Code: " . $_FILES["file"]["error"] . "";
    }
 
  else
    {
    //echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    //echo "Type: " . $_FILES["file"]["type"] . "<br />";
    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
    //echo "file: " .$_FILES["file"]["name"]. "<br />";

    
    if (file_exists("pics/" . $_FILES["file"]["name"]))
      {
   
   
   
      //echo $_FILES["file"]["name"] . " already exists auto rename by the time ";
      
      $_FILES["file"]["name"] = date("Y-m-d") . rand() . ".png";
      
       move_uploaded_file($_FILES["file"]["tmp_name"],
      
      "pics/" . $_FILES["file"]["name"]);
      
      
      $_picpath = "http://star.allappropriate.com/" . "pics/" . $_FILES["file"]["name"]."#";  
      
      
      
      $array = array(
     
     'path'=> $_picpath
      
      );
      
      echo JSON($array); 

      //echo  $_picpath;
      
   
      }
    else
      {
      
  
      move_uploaded_file($_FILES["file"]["tmp_name"],
      
      "pics/" . $_FILES["file"]["name"]);
      
      
      $_picpath = "http://star.allappropriate.com/" . "pics/" . $_FILES["file"]["name"]."#"; 
      
      
      
      $array = array(
     
     'path'=> $_picpath
      
      );
      
      echo JSON($array); 
     
      //echo  $_picpath;
      
      }
    }
  }
else
  {
  echo "Invalid file";
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