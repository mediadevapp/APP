<?php

$bbb="CCCCC";

$html=<<<EOT
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" " http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns=" http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
</head>


<body>
<h1>测试</h1>$bbb

</body>
</html>
EOT;


file_put_contents("template.html",$html);

///===========================
function toAge($birth){
	//$birth='1985.6.23';
list($by,$bm,$bd)=explode('.',$birth);
$cm=date('n');
$cd=date('j');
$age=date('Y')-$by-1;
if ($cm>$bm || $cm=$bm && $cd>$$bd) $age++;
echo "生日:$birth\n";
echo "年龄:$age\n";
return $age;
}


?>