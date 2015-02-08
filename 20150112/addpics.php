<?php


if (empty($_POST['uid'])){
echo "请上传用户id";
exit(0);
} 

$uid = $_POST['uid'];


if (empty($_POST['uploadN'])){
echo "请上传t图片个数";
exit(0);
} 




//文件上传的个数 application/octet-stream
$uploadN = $_POST['uploadN']; 

$pp=getpicspath($uid);

//echo "Type: " . $_FILES["file"]["type"] . "<br />";


for($x=0;$x<$uploadN;$x++){

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
      
      
      $_picpath .= "http://star.allappropriate.com/" . "pics/" . $_FILES["file"]["name"]."#".$pp;  

      
      uploadpic($uid,$_picpath);
      
      echo  $_picpath;
      
   
      }
    else
      {
      
  
      move_uploaded_file($_FILES["file"]["tmp_name"],
      
      "pics/" . $_FILES["file"]["name"]);
      
      
      $_picpath .= "http://star.allappropriate.com/" . "pics/" . $_FILES["file"]["name"]."#".$pp;  
      
      uploadpic($uid,$_picpath);
      
      echo  $_picpath;
      
      }
    }
  }
else
  {
  echo "Invalid file";
  }
  
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

$sql = "UPDATE `userinfo` SET `pics` = '$path' WHERE `userinfo`.`uid` = '$uid'";

//echo($sql);

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }

 echo "Success";

  //关闭连接

 mysql_close($con);
 
}


function getpicspath($uid){

$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("star_app", $con);
  
  $sql = "SELECT * FROM userinfo where uid='".$uid."'";
  
  //echo($sql);

  $result = mysql_query( $sql);



  while($row = mysql_fetch_array($result))

  {

  //echo $row['id'] . " " . $row['name'];
  
  $pics = $row['pics'];

  
   }
  
  return $pics ;

  }

mysql_close($con);


	
	
	
	
}




?>