<?php

if (empty($_GET['aid'])){
echo "没有输入星文编号";
exit(0);
}


$aid = $_GET['aid'];


sharecontent($aid);

$ccount = getcount($aid) + 1;

//echo $ccount;

addsharecount($aid,$ccount);




function sharecontent($aid){
	
	$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("star_app", $con);
  
  $sql = "SELECT * FROM articleinfo where id='".$aid."'";
  
  //echo($sql);

  $result = mysql_query( $sql);


 while($row = mysql_fetch_array($result))

  {

   //echo  " " . $row['uid'] . " " . $row['username'].",";
   
   
   $title = $row['title'];
   $crtime =  $row['crtime'];
   $content = $row['content'];
   $photo = $row['photo'];
   
  }
  
  crh5($title,$crtime,$photo,$content);


  }

mysql_close($con);



}


function crh5($title,$crtime,$photo,$content){

$html=<<<EOT
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>$title </title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/mobi.css" />
	<link rel="stylesheet" href="css/tongyong.css?v=3" />
	<link rel="stylesheet" href="css/recital.css" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">


<div style="padding:10px;height:400px;overflow:auto;">
<p class='attend_num'> $title</p>
<span style="color:cccccc;" >$crtime</span> <br>


<img src="$photo" style="width:100%;height:50%;" /><br><br>

$content

</div>


<!--<div 
  style="position:absolute;  
  bottom:0;  
  padding:20px;  
  background-color:#6495ED;color:#ffffff;text-align:center;font-size:14px;  
  width:100%;height:60px;"> 下载星上人,了解更多</div>-->

EOT;



$templatename =  $tmpname."_".date("Y-m-d") . rand() . ".html";

//$templatename =  $tmpname. ".html";

file_put_contents($templatename,$html);

echo "http://star.allappropriate.com/".$templatename; 

}







function addsharecount($aid,$count){

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

$sql = "UPDATE  `articleinfo` SET  `fcount` =  '$count' WHERE  `id` =  '$aid'";

//echo($sql);

 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }

 //echo "Success";

  //关闭连接

 mysql_close($con);
	
}


function getcount($aid){

$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");
if (!$con)
{
die('数据库连接失败: ' . mysql_error());
}
else
{
mysql_select_db("star_app", $con);

$sql = "SELECT * FROM  `articleinfo` WHERE  `id` =  '$aid'";

//echo($sql);

$result = mysql_query( $sql);

while($row = mysql_fetch_array($result))
{
//echo $row['id'] . " " . $row['name'];

$fcount = $row['fcount'];

}

//echo $zcount;

return $fcount;

}
mysql_close($con);

}



?>