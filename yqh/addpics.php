<?php


if (empty($_POST['eventsid'])){
echo "请上传eventsid";
exit(0);
} 

$eid = $_POST['eventsid'];
//echo  $eid;

$op = getpicspath($eid);


if (empty($_POST['uploadN'])){
echo "请上传t图片个数";
exit(0);
} 
//文件上传的个数
$uploadN = $_POST['uploadN']; 



for($x=0;$x<$uploadN;$x++){

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/bmp")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 50000000))
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
      
      
      $_picpath .= "http://card.allappropriate.com/" . "pics/" . $_FILES["file"]["name"]."#".$op;  

   
      
      uploadpic($eid,$_picpath);
      
   
      }
    else
      {
      
      $_FILES["file"]["name"] = date("Y-m-d") . rand() . ".png";
       
      move_uploaded_file($_FILES["file"]["tmp_name"],
      
      "pics/" . $_FILES["file"]["name"]);
      
      
      $_picpath .= "http://card.allappropriate.com/" . "pics/" . $_FILES["file"]["name"]."#".$op;  
      
      uploadpic($eid,$_picpath);
      
      echo  $_picpath;
      
      }
    }
  }
else
  {
  echo "Invalid file";
  }
  
}





function uploadpic($eid,$path){
	
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
mysql_select_db("supercard");

$sql = "UPDATE `eventsinfo` SET `pic` = '$path' WHERE  `eventsid` = '$eid'";

//echo($sql);

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }

 echo "Success";

  //关闭连接

 mysql_close($con);
 
}


function getpicspath($eid){

$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("supercard", $con);
  
  $sql = "SELECT * FROM eventsinfo where eventsid='".$eid."'";
  
  //echo($sql);

  $result = mysql_query( $sql);



  while($row = mysql_fetch_array($result))

  {

  //echo $row['id'] . " " . $row['name'];
  
  $pics = $row['pic'];

  
   }
  
  return $pics ;

  }

mysql_close($con);


	
	
	
	
}




?>