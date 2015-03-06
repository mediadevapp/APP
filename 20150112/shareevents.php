<?php

if (empty($_GET['eid'])){
echo "请上传eid";
exit(0);
} 
 
$eid = $_GET['eid'];
 
echo shareevnet($eid);
 
 
function shareevnet($eid){
	
	$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("star_app", $con);
  
  $sql = "SELECT * FROM eventsinfo where  `eid` = '$eid' ";
  
  //echo($sql);

  $result = mysql_query( $sql);


 while($row = mysql_fetch_array($result))

  {

   //echo  " " . $row['eid'] . " " . $row['title'].",";
   
   $eid =$row["eid"];
   
   $titel = $row["title"];
   
   $content = $row["content"];
   
   $pic = $row["pics"];
  
  }
  
//echo $pic;


$html=<<<EOT

<!DOCTYPE html>
<html class="ks-webkit533 ks-webkit">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>$titel</title>
</head>


<body>
<h1>$titel</h1>
<h2>$content</h2>
<img src ="$pic"/>
</body>
</html>
EOT;

$tmpname = "http://star.allappropriate.com/share_evnets.html";

file_put_contents("share_evnets.html",$html);

return $tmpname;

  
  }

mysql_close($con);


	
	
}




?>