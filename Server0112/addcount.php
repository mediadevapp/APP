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

$zcount = $zcount + 1;




$con = mysql_connect("120.131.70.218","root","1q2w3e4r5t6yJUSHI$");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("star_app", $con);

$sql1 = "UPDATE `frcontent` SET `zcount` = '$zcount' WHERE `frcontent`.`cid` ='$cid'";

 
 if (!mysql_query($sql1,$con))

 {

   die('Error: ' . mysql_error());

 }

echo $zcount;

mysql_close($con);


?>

