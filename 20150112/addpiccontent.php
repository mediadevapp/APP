<?php

if (empty($_POST['uid'])){
echo "请上传用户id";
exit(0);
} 



if (empty($_POST['nickname'])){
echo "请输入nickname";
exit(0);
} 



if (empty($_POST['content'])){
echo "请输入内容";
exit(0);
} 


$uid = $_POST['uid'];
$content = $_POST['content'];
$nickename = $_POST['nickname'];


if ((($_FILES["file"]["type"] == "image/gif")|| ($_FILES["file"]["type"] == "image/jpeg")||($_FILES["file"]["type"] == "application/octet-stream")|| ($_FILES["file"]["type"] == "image/bmp")|| ($_FILES["file"]["type"] == "image/jpg")|| ($_FILES["file"]["type"] == "image/png")|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 50000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "";
    }
 
  else
    {
    
    /*
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
    echo "file: " .$_FILES["file"]["name"]. "<br />";
   */
    
    
    if (file_exists("pics/" . $_FILES["file"]["name"]))
      {
   
   
      //echo $_FILES["file"]["name"] . " already exists auto rename by the time ";
      
      $_FILES["file"]["name"] = date("Y-m-d") . rand() . ".png";
      
       move_uploaded_file($_FILES["file"]["tmp_name"],
      
      "pics/" . $_FILES["file"]["name"]);
      
      
      $_picpath = "http://star.allappropriate.com/" . "pics/" . $_FILES["file"]["name"];  

      
      uploadpic($uid,$content,$_picpath);
      
   
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      
      "pics/" . $_FILES["file"]["name"]);
      
      
      $_picpath = "http://star.allappropriate.com/" . "pics/" . $_FILES["file"]["name"];  
      
      uploadpic($uid,$content,$_picpath);
      
      echo  $_picpath;
      
      }
    }
  }
else
  {
  echo "no file";
  uploadpic($uid,$content,$_picpath);
  
  }
  
function uploadpic($uid,$content,$path){
	
	
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

//$sql = "UPDATE `frcontent` SET `photo` = '$path',`content` = '$content' WHERE `uid` = '$uid'";

$sql ="INSERT INTO  `frcontent` (`cid` ,`uid`,`nickname`,`content` ,`photo` ,`crtime`)VALUES (NULL,'$uid','$nickename','$content','$path', CURRENT_TIMESTAMP)";

//echo($sql);

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }

 echo "Success";

  //关闭连接

 mysql_close($con);
 
}

?>