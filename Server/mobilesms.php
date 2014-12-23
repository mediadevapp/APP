<?php


if (empty($_GET['mobnum'])){
echo "没有输入用户手机号";
exit(0);
} 
$mobnum =  $_GET['mobnum'];



function getRandStr($length) {  

$str = '0123456789'; 
$randString = ''; 
$len = strlen($str)-1; 
for($i = 0;$i < $length;$i ++)
{ 
$num = mt_rand(0, $len); 
$randString .= $str[$num];
 } 
 return $randString ; 
}


$smscode =getRandStr($length=6);
echo $smscode;


?>