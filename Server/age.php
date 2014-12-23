<?php
  
$birth='1985.6.23';
list($by,$bm,$bd)=explode('.',$birth);
$cm=date('n');
$cd=date('j');
$age=date('Y')-$by-1;
if ($cm>$bm || $cm=$bm && $cd>$$bd) $age++;
echo "生日:$birth\n";
echo "年龄:$age\n";
?>