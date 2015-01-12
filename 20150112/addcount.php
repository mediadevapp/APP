<?PHP 

if (empty($_GET['cid'])){
echo "没有输入内容ID";
exit(0);
} 


if (empty($_GET['uid'])){
echo "点赞用户ID";
exit(0);
} 

if (empty($_GET['zcount'])){
echo "当前点赞次数";
exit(0);
} 


$cid=$_GET['cid'];
$count=$_GET['zcount'];

//echo $count;

$zcount = (int)$count;

$ccount = getcount($cid) + 1;

echo $ccount;



//朋友圈内容字段更新
addcount($ccount,$cid,$uid);




function addcount($count,$cid,$uid){

$con = mysql_connect("120.131.70.218","root","1q2w3e4r5t6yJUSHI$");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("star_app", $con);

$sql1 = "UPDATE  `frcontent` SET  `zcount` =  '$count', `zanuser` =  '$uid'  WHERE  `frcontent`.`cid` = '$cid' ";

 
 if (!mysql_query($sql1,$con))

 {

   die('Error: ' . mysql_error());

 }



mysql_close($con);

}





function getcount($cid){

$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");
if (!$con)
{
die('数据库连接失败: ' . mysql_error());
}
else
{
mysql_select_db("star_app", $con);

$sql = "SELECT * FROM  `frcontent` WHERE cid =  '$cid'";

//echo($sql);

$result = mysql_query( $sql);

while($row = mysql_fetch_array($result))
{
//echo $row['id'] . " " . $row['name'];

$zcount = $row['zcount'];

}

//echo $zcount;

return $zcount;

}
mysql_close($con);

}



?>

