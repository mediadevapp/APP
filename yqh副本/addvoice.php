<?php


if (empty($_POST['eventsid'])){
echo "请上传eventsid";
exit(0);
} 

$eid = $_POST['eventsid'];
//echo  $eid;




if (empty($_POST['uploadN'])){
echo "请上传文件个数";
exit(0);
} 
//文件上传的个数
$uploadN = $_POST['uploadN']; 

//echo "Type: " . $_FILES["file"]["type"] . "<br />";






for($x=0;$x<$uploadN;$x++){

if ((($_FILES["file"]["type"] == "audio/amr")|| ($_FILES["file"]["type"] == "audio/aac")||($_FILES["file"]["type"] == "audio/vnd.dlna.adts")||($_FILES["file"]["type"] == "audio/x-wav")||($_FILES["file"]["type"] == "application/octet-stream")|| ($_FILES["file"]["type"] == "audio/x-m4a"))&& ($_FILES["file"]["size"] < 50000000)){
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

   
    


    if (file_exists("voice/" . $_FILES["file"]["name"]))
    
      {
      
       $filename = date("Y-m-d").rand().$_FILES["file"]["name"];
       
       move_uploaded_file($_FILES["file"]["tmp_name"],"voice/". $filename);
   
      //echo $_FILES["file"]["name"] . " already exists auto rename by the time ";
      
      $vname=ffmpeg($filename);
      
      $_voicepath = "http://card.allappropriate.com/" .$vname."";  
      
      uploadvoice($eid,$_voicepath);
      
      echo  $_voicepath."";
      
     }
    
    else{
      
      
      //$_FILES["file"]["name"] = date("Y-m-d") . rand() . ".mp3";
       
      move_uploaded_file($_FILES["file"]["tmp_name"],"voice/" . $_FILES["file"]["name"]);
      
      $filename= $_FILES["file"]["name"];
     
      $vname=ffmpeg($filename);
      
      $_voicepath = "http://card.allappropriate.com/" .$vname."";  

   
      uploadvoice($eid,$_voicepath);
      
    
      
      echo  $_voicepath."";
      
 
      
      }
    }
  }
else
  {
  echo "Invalid file";
  
  }
  
}





function uploadvoice($eid,$path){
	
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

$sql = "UPDATE `eventsinfo` SET `voice1` = '".$path."' WHERE  `eventsid` = '$eid'";

//update set  from xsb name='1231' where sex= '女'

//$sql = "update set  from eventsinfo  `voice1` = '$path'  where  `eventsid` = '$eid'";

//echo $sql;


 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }

 //echo "Success";

  //关闭连接

 mysql_close($con);
  //关闭连接
 
}




function ffmpeg($filename){

       $vname =  "voice/".date("Y-m-d") . rand() . ".mp3";
      
       $cmd ="ffmpeg -i "."voice/".$filename." ".$vname;
       
       //echo $cmd;
      
       $a = exec($cmd,$out,$status);  
       
       //print_r($a);  
       //print_r($out);  
       //print_r($status);       
       return $vname;
 
}



?>