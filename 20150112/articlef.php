<?php


if (empty($_GET['aid'])){
echo "没有输入星文编号";
exit(0);
}
$aid = $_GET['aid'];


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
   
   $coutent = $row['content'];
   $photo = $row['photo'];
   
  }
  
  
  echo "<img width=320 src=".$photo."><br>";
  echo $coutent;
  

  }

mysql_close($con);



?>