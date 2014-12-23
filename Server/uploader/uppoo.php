<?php


if (empty($_POST['uid'])){
echo "请上传用户id";
exit(0);
} 

$uid = $_POST['uid'];

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 10000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "";
    }
  else
    {
    //echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    //echo "Type: " . $_FILES["file"]["type"] . "<br />";
    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
    //echo "file: " .$_FILES["file"]["name"]. "<br />";
      
    
    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
   
      echo $_FILES["file"]["name"] . " already exists. ";
      
   
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      
      $_picpath = "http://120.131.70.218/uploader/" . "upload/" . $_FILES["file"]["name"];  
      
      uploadpic($uid,$_picpath);
      //echo  $_picpath;
      
      }
    }
  }
else
  {
  echo "Invalid file";
  }
  
function uploadpic($uid,$path){
	
	
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

$sql = "UPDATE `userinfo` SET `photo` = '$path' WHERE `userinfo`.`uid` = '$uid'";

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