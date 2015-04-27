<?php


//echo "adaf";

getevents();




function getevents(){
	
	
$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("supercard", $con);
  
  $sql = "SELECT userid,status,username,title,content,mobile,startime,endtime, datediff(startime,NOW()) as dayFactor,TIMESTAMPDIFF(hour,NOW(),startime)as hourFactor,locations  FROM  `eventsinfo` WHERE  `startime` >= NOW()  and status = 'Y' ORDER BY  `hourFactor` ASC ";
  
  //echo($sql)."<br>";

  $result = mysql_query($sql);
  
   
 while($row = mysql_fetch_array($result))

  {

   //echo  " " . $row['uid'] . " " . $row['username'].",";
   
   $hours = $row['hourFactor']; 
   $userid = $row['userid'];
   $title = $row['title'];
   $startime = $row['startime'];
   $days = $row['dayFactor'];
   

   
   //echo $days."<br>";
   /*
   if($days == 1){
   
   
      echo $days."天<br>";
 
    }
   
    if($hours == 5){
    
       echo $hours."小时<br>";
   
    } 
   
   */
   
       
     if($hours == 1){
     
     
   echo "============================="; 
   echo "<br>".$userid."<br>";
   echo $startime."<br>";
   echo $hours."<br>";
       
       
       $econtent = "距离您发起的活动".$title."还有1小时，不要放鸽子哟";
       
       //echo $econtent;
       
       $token = getdeviceid($userid);
       
    echo "my token is=>".$token."<br>";
       
       //echo "DeviceID:".$token."<br>";
       
       pushAPNS($token,$econtent);
     
      }
   
  
  
  
  }
  
  
    

  }

mysql_close($con);

}





function getdeviceid($uid){

	$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("supercard", $con);
  
  $sql = "SELECT * FROM  `userinfo` WHERE   uid = '$uid'";
  
  //echo($sql);

  $result = mysql_query($sql);
  

 while($row = mysql_fetch_array($result))

  {

   //echo  " " . $row['uid'] . " " . $row['username'].",";
   $arr =$row["deviceid"];
  
  }
  
  return $arr;
  
  }

mysql_close($con);
	
	
	
}


function pushAPNS($tokenid,$econtent){

// Put your device token here (without spaces):
//$deviceToken = '4e0d77217608a1ffffc34f8cf64c70c878de28b1763ba8f8280f9cd31914229a';

$deviceToken = $tokenid;

// Put your private key's passphrase here:
$passphrase = '123456';

// Put your alert message here:
$message = $econtent;

////////////////////////////////////////////////////////////////////////////////

$ctx = stream_context_create();
stream_context_set_option($ctx, 'ssl', 'local_cert', 'PK.pem');
stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

// Open a connection to the APNS server
$fp = stream_socket_client(
	'ssl://gateway.sandbox.push.apple.com:2195', $err,
	$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

if (!$fp)
	exit("Failed to connect: $err $errstr" . PHP_EOL);

echo 'Connected to APNS' . PHP_EOL;

// Create the payload body
$body['aps'] = array(
	'alert' => $message,
	'sound' => 'default'
	);

// Encode the payload as JSON
$payload = json_encode($body);

// Build the binary notification
$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

// Send it to the server
$result = fwrite($fp, $msg, strlen($msg));

if (!$result)
	echo 'Message not delivered' . PHP_EOL;
else
	echo 'Message successfully delivered' . PHP_EOL;
	echo "<br>";

// Close the connection to the server
fclose($fp);

}





?>