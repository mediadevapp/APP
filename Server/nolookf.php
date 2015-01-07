<?PHP 




if (empty($_GET['fid'])){
echo "没有输入被操作用户ID";
exit(0);
}


if (empty($_GET['uid'])){
echo "没有输入用户ID";
exit(0);
}


if (empty($_GET['allow'])){
echo "没有输入操作类型";
exit(0);
}



$uid = $_GET['uid'];
$fuid = $_GET['fid'];

//allow=0 不准看 allow=1 可以看
$allow = $_GET['allow'];

//echo 'allow='.$allow.'uid='.$uid.'fid='.$fuid;

//echo $allow ='N';

//======================================


$pf = explode(":", $fuid);

if($allow =='N'){
	
	
	foreach ($pf as &$value) {

    //echo "|fid:".$value;
    
    nolook($value,$uid);
    
    //nolook($uid,$value);
    
    }

unset($value); // 最后取消掉引用

//nolook($uid,$fuid);
	
}

if($allow =='Y'){

	foreach ($pf as &$value) {

    //echo "|fid:".$value;
    
    islook($value,$uid);
    
    }
// $arr is now array(2, 4, 6, 8)
unset($value); // 最后取消掉引用

//nolook($uid,$fuid);
	
}






function nolook($id,$fid){
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
$sql = "UPDATE `friendinfo` SET `allow` = 'N' WHERE  `friend_id` = '$fid' AND `uid` = '$id'";

//echo $sql;

 if (!mysql_query($sql,$con))
 {

   die('Error: ' . mysql_error());

 }

  echo "我不看".$id."的好友圈";

  //关闭连接
 mysql_close($con);

}



function islook($id,$fid){
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

$sql = "UPDATE `friendinfo` SET `allow` = 'Y' WHERE  `friend_id` = '$fid' AND `uid` = '$id'";
 
 if (!mysql_query($sql,$con))
 {

   die('Error: ' . mysql_error());

 }

 echo "我可以看".$id."的好友圈";

  //关闭连接
 mysql_close($con);

}






?>



