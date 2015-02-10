<?php

if (empty($_GET['eid'])){
echo "没有输入活动id";
exit(0);
} 


if (empty($_GET['tmpid'])){

echo "没有输入活动相关模版id";
exit(0);

} 


$tmpid = $_GET['tmpid'];

$tmpname = gettmpinfo($tmpid);




if (empty($tmpname)){

echo "sorry";

exit(0);

}



$eid = $_GET['eid'];


$pics = getpicpath($eid);

//echo $pics;

$picsArray = explode("#", $pics);



$swiperslide = "<div class=swiper-slide><img src='".$picsArray[0]."' style='height:100%;width:100%;'/></div>"."<div class=swiper-slide><img src='".$picsArray[1]."' style='height:100%;width:100%;'/></div>"."<div class=swiper-slide><img src='".$picsArray[2]."' style='height:100%;width:100%;'/></div>"; 

//echo $swiperslide;



/*
	
	            <div class=swiper-slide>
                    <img src='img/party/15-4.png' style='height:100%;width:100%;'/>
                </div>
	
	
*/



geteventdetails($eid,trim($tmpname));




//===============================

function gettmpinfo($tmpid){

$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("supercard", $con);
  
  $sql = "SELECT * FROM  `templateinfo` WHERE  `templateid` =  '$tmpid' ";
  
  //echo($sql);

  $result = mysql_query($sql);
  

   
 while($row = mysql_fetch_array($result))

  {

   //echo  " " . $row['uid'] . " " . $row['username'].",";
   
   $templateid = $row["templateid"];
   $templatename = $row["templatename"];

}


return $templatename;


}

mysql_close($con);
	
}




function geteventdetails($eid,$tmpname){
	
	
$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("supercard", $con);
  
  $sql = "SELECT * FROM  `eventsinfo` WHERE  `eventsid` =  '$eid' ";
  
  //echo($sql);

  $result = mysql_query($sql);
  

   
 while($row = mysql_fetch_array($result))

  {

   //echo  " " . $row['uid'] . " " . $row['username'].",";
   
   $eid = $row["eventsid"];
   $userid = $row["userid"];
   $username = $row["username"];
   $title = $row["title"];
   $content = $row["content"];
   $mobile = $row["mobile"];
   $startime = $row["startime"];
   $endtime = $row["endtime"];
   $pics = $row["pic"];
   $location =$row["locations"];
   $music = $row["bgmusic"];
   $lng = $row["longitude"];
   $lat = $row["latitude"];
   $voice = $row["voice1"];
   
 }


//echo $eid.$userid.$username.$mobile.$title.$content.$startime.$endtime.$pics.$location.$music;

$count = getcount($eid);

//echo $count;
//echo $tmpname;

Global $swiperslide;
//echo $swiperslide;  
	
crh5($eid,$title,$startime,$endtime,$location,$username,$mobile,$count,$tmpname,$lng,$lat,$music,$voice,$swiperslide);
	

}

mysql_close($con);

}


function getcount($eid){

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
mysql_select_db("supercard");

$sql = "SELECT COUNT(*) AS count FROM  `joinuser` WHERE  `eventsid` =".$eid."";


$query=mysql_query($sql);

	if($rs=mysql_fetch_array($query)){

     $count=$rs[0];

	}else{
	
	    $count=0;
	}


 if (!mysql_query($sql,$con))

 {

   die('Error: ' . mysql_error());

 }


 //echo $uid;
  //关闭连接
 mysql_close($con);

	
return  $count;

}






function crh5($eid,$title,$startime,$endtime,$location,$username,$mobile,$count,$tmpname,$lng,$lat,$music,$voice,$swiperslide){




if(trim($tmpname) == trim("sport")){

$html=<<<EOT
<!DOCTYPE html>

<html class="ks-webkit533 ks-webkit">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>超级邀请函</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/mobi.css" />
    <link rel="stylesheet" href="css/tongyong.css" />
    <link rel="stylesheet" href="css/activity.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">

</head><meta name="author" content="超级邀请函"> <meta name="Copyright" content="超级邀请函">
<body cz-shortcut-listen="true" title="" icon="" link="" desc="">
    <div class="loadingCls">
        <div class="loading">
            <img src="img/loading.gif" width="15%">
        </div>
        <div class="loadingText" style="color:#000;">
            <p>Loading</p><p></p>
        </div>
    </div>

    <div class="swiper-container" style="position: relative;width:100%;height:100%;overflow: hidden;">
        <div class="swiper-wrapper">
            <div class="swiper-slide page layer1">
                <div class="layer layer1-1">
                    <div class="swiper-container images" style="z-index:0;position: relative;width:100%;height:100%;overflow: hidden;">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide ">
                                <img src="img/activity/1-1.png" style="height:100%;width:100%;"/>
                            </div>
                            <div class="swiper-slide ">
                                <img src="img/activity/1-1.png" style="height:100%;width:100%;"/>
                            </div>
                            <div class="swiper-slide ">
                                <img src="img/activity/1-1.png" style="height:100%;width:100%;"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="layer layer1-2"></div>
                <div class="layer layer1-3"></div>
                <div class='pageContainer' id='container2'>
                    <div class="layer layer1-4"></div>
                    <div class="layer layer1-5 button"></div>
                    <div class="layer layer1-6 button"></div>
                    <div class="layer layer1-8 text8-14">主题:&nbsp;$title</div>
                    <div class="layer layer1-9 text8-14">时间:&nbsp;$startime</div>
                    <div class="layer layer1-10 text8-14">$endtime</div>
                    <div class="layer layer1-11 text8-14"><a href="http://api.map.baidu.com/marker?location=$lat,$lng&title=$title&content=$title&output=html"><img src="img/activity/1-7.png" style="width:8.66%;height:100%;"/></a> 地址:$location</div>
                    <div class="layer layer1-12 text8-14">联系人:$username</div>
                    <div class="layer layer1-13 text8-14">联系方式:&nbsp;$mobile</div>
                    <div class="layer layer1-14 text8-14">报名人数:$count</div>                
                </div>
                <div class="layer layer1-23"></div>
                <div class="layer layer1-24"></div>
                <div class="layer layer1-17"></div>
                <div class='pageContainer' id='container1'>
                    <div class="layer layer1-16"></div>
                    <div class="layer layer1-18"></div>
                    <div class="layer layer1-19"></div>
                    <div class="layer layer1-20"></div>
                    <div class="layer layer1-21"></div>
                    <div class="layer layer1-22"></div>                
                </div>
                <div class="dialog"></div>
            </div>

        </div>
    </div>
    <script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="js/idangerous.swiper/idangerous.swiper-2.6.1.min.js"></script>
    <link rel="stylesheet" href="js/idangerous.swiper/idangerous.swiper.css" />
    <script type="text/javascript" src="js/jquery.transit.min.js"></script>
    <script type="text/javascript" src="js/touch-0.2.13.min.js"></script>
    <script type="text/javascript" src="js/weiyaoqing.mobile.js"></script>
    <script type="text/javascript" src="js/preload.js"></script>
    <script type="text/javascript" src="js/response.js"></script>


    <div class="music1">
        <img src="img/music1_play.png" style="width: 100%">
        <audio id="video1" autoplay="false" loop style="display:none;">
            <source src="$music" id="video1_url_mp3" type="audio/mpeg">
            </audio>
        </div>
        <div class="music2">
            <img src="img/music2_stop.png" style="width: 100%">
            <audio id="video2" autoplay="false" loop style="display:none;">
                <source src="$voice" id="video2_url_mp3" type="audio/mpeg">
                </audio>
            </div>

            <script type="text/javascript" src="js/tongyong.js"></script>
            <script type="text/javascript" src="js/activity.js"></script>
            <script>
                var eid = $eid;
            </script>
        </body>
        </html>


EOT;

$templatename =  $tmpname."_".date("Y-m-d") . rand() . ".html";

//$templatename =  $tmpname. ".html";

file_put_contents($templatename,$html);

echo "http://card.allappropriate.com/h5/".$templatename; 

}


if (trim($tmpname) == trim("newyear")){

$html=<<<EOT
<!DOCTYPE html>
<html class="ks-webkit533 ks-webkit">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>超级邀请函</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/mobi.css" />
	<link rel="stylesheet" href="css/tongyong.css" />
	<link rel="stylesheet" href="css/chunjie.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
	<style>
		

	</style>
</head><meta name="author" content="超级邀请函"> <meta name="Copyright" content="超级邀请函">
<body cz-shortcut-listen="true" title="" icon="" link="" desc="">
	<div class="loadingCls">
		<div class="loading">
			<img src="img/loading.gif" width="15%">
		</div>
		<div class="loadingText" style="color:#000;">
			<p>Loading...</p><p> </p>
		</div>
	</div>
	<div class="swiper-container" style="position: relative;width:100%;height:100%;overflow: hidden;">
		<div class="swiper-wrapper">
			<div class="swiper-slide page layer1">
				<div class="dialog"></div>
				<div class='pageConainter' id='container3'>
					<div class="layer layer1-2"></div>
					<div class="layer layer1-3"></div>
					<div class="layer layer1-4"></div>
					<div class="layer layer1-5"></div>
					<div class="layer layer1-6"></div>
					<div class="layer layer1-7"></div>
					<div class="layer layer1-8"></div>
					<div class="layer layer1-9"></div>
					<div class="layer layer1-10">
						<div class="swiper-container images" style="z-index:0;position: relative;width:100%;height:100%;overflow: hidden;">
							<div class="swiper-wrapper">
								<div class="swiper-slide ">
									<img src="img/chunjie/1-10.png" style="height:100%;width:100%;"/>
								</div>
								<div class="swiper-slide ">
									<img src="img/chunjie/1-10.png" style="height:100%;width:100%;"/>
								</div>
								<div class="swiper-slide ">
									<img src="img/chunjie/1-10.png" style="height:100%;width:100%;"/>
								</div>
							</div>
						</div>
					</div>
					<div class="layer layer1-11 button"></div>
				</div>

				<p class="text1-7 text1">主题：$title</p>
				<p class="text1-7 text2">时间：$startime  </p>
				<p class="text1-7 text3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$endtime </p>
				<p class="text1-7 text4"><a href="http://api.map.baidu.com/marker?location=$lat,$lng&title=$title&content=$title&output=html">
					<img src="img/chunjie/1-1.png" style="width:6.66%;height:80%;"/></a>
					地址：$location</p>
					<p class="text1-7 text5">联系人:$username </p>
					<p class="text1-7 text6">联系方式：$mobile</p>
					<p class="text1-7 text7">已报名人数：<span style="font-size:18px;">$count</span></p>

					<div class="page1" style="position:absolute;width:100%;height:100%;">
						<div class="layer layer1-13"></div>
						<div class='pageConainter' id='container1'>
							<div class="layer layer1-14"></div>
							<div class="layer layer1-15"></div>
							<div class="layer layer1-16"></div>							
						</div>
					</div>
					<div class="page2" style="position:absolute;width:100%;height:100%;">
						<div class="layer layer1-12"></div>
						<div class='pageConainter' id='container2'>
							<div class="layer layer1-17"></div>
						</div>
					</div>
					<div class="layer layer1-18"></div>
					<div class="layer layer1-19"></div>
				</div>

			</div>
		</div>
		<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
		<script type="text/javascript" src="js/idangerous.swiper/idangerous.swiper-2.6.1.min.js"></script>
		<link rel="stylesheet" href="js/idangerous.swiper/idangerous.swiper.css" />
		<script type="text/javascript" src="js/jquery.transit.min.js"></script>
		<script type="text/javascript" src="js/touch-0.2.13.min.js"></script>
		<script type="text/javascript" src="js/weiyaoqing.mobile.js"></script>
		<script type="text/javascript" src="js/preload.js"></script>
		<script type="text/javascript" src="js/response.js"></script>

  <script>
                var eid = $eid;
            </script>
            
            
		<div class="music1">
		<img src="img/music1_play.png" style="width: 100%">
		<audio id="video1" autoplay="false" loop style="display:none;">
			<source src="$music" id="video1_url_mp3" type="audio/mpeg">
			</audio>
		</div>
		<div class="music2">
		<img src="img/music2_stop.png" style="width: 100%">
		<audio id="video2" autoplay="false" loop style="display:none;">
			<source src="$voice" id="video2_url_mp3" type="audio/mpeg">
			</audio>
		</div>



				<script type="text/javascript" src="js/tongyong.js"></script>
				<script type="text/javascript" src="js/chunjie.js"></script>
			</body>
			</html>

EOT;

//$templatename =  $tmpname. ".html";

$templatename =  $tmpname."_".date("Y-m-d") . rand() . ".html";

file_put_contents($templatename,$html);

echo "http://card.allappropriate.com/h5/".$templatename; 
}


if (trim($tmpname) == trim("restaurant")){

$html=<<<EOT
<!DOCTYPE html>
<html class="ks-webkit533 ks-webkit">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>超级邀请函</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/mobi.css" />
    <link rel="stylesheet" href="css/tongyong.css" />
    <link rel="stylesheet" href="css/eat.css?v=2" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">

</head><meta name="author" content="超级邀请函"> <meta name="Copyright" content="超级邀请函">
<body cz-shortcut-listen="true" title="" icon="" link="" desc="">
    <div class="loadingCls">
        <div class="loading">
            <img src="img/loading.gif" width="15%">
        </div>
        <div class="loadingText" style="color:#000;">
            <p>Loading...</p><p> </p>
        </div>
    </div>
    <div class="swiper-container" style="position: relative;width:100%;height:100%;overflow: hidden;">
        <div class="swiper-wrapper">
            <div class="swiper-slide page layer1">
                <div class="layer layer1-1"></div>
                <div class="layer layer1-2"></div>
                <div class="dialog"></div>
                <div class="page3" id="container1">
                    <div class="layer layer1-3"></div>
                    <div class="layer layer1-4"></div>
                    <div class="layer layer1-5"></div>
                    <div class="layer layer1-6 button"></div>
                    <p class="text1-7 text1">已报名人数：<span style="font-size:18px;">$count</span></p>
                    <p class="text1-7 text2">主题：$title</p>
                    <p class="text1-7 text3">时间：$startime </p>
                    <p class="text1-7 text4">           $endtime </p>
                    <p class="text1-7 text5"><a href="http://api.map.baidu.com/marker?location=$lat,$lng&title=$title&content=$title&output=html">
											<img src="img/love/1-24.png" style="width:6.66%;height:80%;"/></a>
											地址：$location</p>
                    <p class="text1-7 text6">联系人：$username </p>
                    <p class="text1-7 text7">联系方式：$mobile</p>
                </div>
                <div class="page2" style="position:absolute;width:100%;height:100%;">
                    <div class="layer layer1-17"></div>
                    <div class="layer layer1-18"></div>
                    <div class="layer layer1-19" id="bar" style="width:33%;"></div>
                    <div class="layer layer1-21 right"></div>
                </div>
                <div class="layer layer1-7"></div>
                <div class="page1" style="position:absolute;width:100%;height:100%;">
                    <div class="layer layer1-8"></div>
                    <div class="layer layer1-9"></div>
                    <div class="layer layer1-10"></div>
                    <div class="layer layer1-11">
                        <div class="swiper-container images" style="z-index:0;position: relative;width:100%;height:100%;overflow: hidden;">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide ">
                                    <img src="img/eat/1-11.png" style="height:100%;width:100%;"/>
                                </div>
                                <div class="swiper-slide ">
                                    <img src="img/eat/1-11.png" style="height:100%;width:100%;"/>
                                </div>
                                <div class="swiper-slide ">
                                    <img src="img/eat/1-11.png" style="height:100%;width:100%;"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="layer layer1-meng"></div>
                    <div class="layer layer1-12"></div>
                    <div class="layer layer1-13"></div>
                    <div class="layer layer1-14"></div>
                    <div class="layer layer1-15"></div>
                    <div class="layer layer1-16"></div>
                    <div class="layer layer1-22"></div>
                    <div class="layer layer1-23"></div>
                </div>
                <div class="layer layer1-20" id="target"></div>
            </div>

        </div>
    </div>
    <script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="js/idangerous.swiper/idangerous.swiper-2.6.1.min.js"></script>
    <link rel="stylesheet" href="js/idangerous.swiper/idangerous.swiper.css" />
    <script type="text/javascript" src="js/jquery.transit.min.js"></script>
    <script type="text/javascript" src="js/touch-0.2.13.min.js"></script>
    <script type="text/javascript" src="js/weiyaoqing.mobile.js"></script>
    <script type="text/javascript" src="js/weiyaoqing.mobile.js"></script>
    <script type="text/javascript" src="js/preload.js"></script>
    <script type="text/javascript" src="js/response.js"></script>
  <script>
                var eid = $eid;
    </script>

		<div class="music1">
		<img src="img/music1_play.png" style="width: 100%">
		<audio id="video1" autoplay="false" loop style="display:none;">
			<source src="$music" id="video1_url_mp3" type="audio/mpeg">
			</audio>
		</div>
		<div class="music2">
		<img src="img/music2_stop.png" style="width: 100%">
		<audio id="video2" autoplay="false" loop style="display:none;">
			<source src="$voice" id="video2_url_mp3" type="audio/mpeg">
			</audio>
		</div>



            <script type="text/javascript" src="js/tongyong.js"></script>
            <script type="text/javascript" src="js/eat.js?v=4"></script>
        </body>
        </html>
EOT;

$templatename =  $tmpname."_".date("Y-m-d") . rand() . ".html";

//$templatename =  $tmpname. ".html";

file_put_contents($templatename,$html);

echo "http://card.allappropriate.com/h5/".$templatename; 

}





if (trim($tmpname) == trim("valentine")){

$html=<<<EOT
<!DOCTYPE html>
<html class="ks-webkit533 ks-webkit">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>超级邀请函</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/mobi.css" />
	<link rel="stylesheet" href="css/tongyong.css" />
	<link rel="stylesheet" href="css/love.css?v=2" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
    <style>
	
    </style>
</head><meta name="author" content="超级邀请函"> <meta name="Copyright" content="超级邀请函">
<body cz-shortcut-listen="true" title="" icon="" link="" desc="">
<div class="loadingCls">
    <div class="loading">
        <img src="img/loading.gif" width="15%">
    </div>
    <div class="loadingText" style="color:#000;">
        <p>Loading...</p><p> </p>
    </div>
</div>
<div class="swiper-container" style="position: relative;width:100%;height:100%;overflow: hidden;">

    <div class="swiper-slide page layer1">
 		<div class="page_2" style="width:100%;height:100%;opacity:0;">
		<div class="layer layer1-16">
			<div class="swiper-container images" style="z-index:0;position: relative;width:100%;height:100%;overflow: hidden;">
				<div class="swiper-wrapper">
					<div class="swiper-slide ">
						<img src="img/love/1-16.png" style="height:100%;width:100%;"/>
					</div>
					<div class="swiper-slide ">
						<img src="img/love/1-16.png" style="height:100%;width:100%;"/>
					</div>
					<div class="swiper-slide ">
						<img src="img/love/1-16.png" style="height:100%;width:100%;"/>
					</div>
				</div>
			</div>
		</div>
		<div class="layer layer1-17"></div>
		<div class="layer layer1-18"></div>
		<div class="layer layer1-19"></div>
		<div class="layer layer1-20"></div>
		<div class="layer layer1-23 button"></div>
		<div class="layer layer1-21 button"></div>
		<div class="text1-10 text1">报名人数：$count</div>
		<div class="text1-10 text2">Dear</div>
		<div class="text1-10 text3">we accompanied the most beautiful time</div>
		<div class="text1-10 text4">亲爱的——我们相伴最美的时光</div>
		<div class="text1-10 text5">主题： $title</div>
		<div class="text1-10 text6">时间：$startime</div>
		<div class="text1-10 text7">$endtime</div>
		<div class="text1-10 text8">
			<a href="http://api.map.baidu.com/marker?location=$lat,$lng&title=$title&content=$title&output=html">
                    <img src="img/love/1-24.png" style="width:6.66%;height:80%;"/></a>
					地址：$location
		</div>
		<div class="text1-10 text9">联系人：$username</div>
		<div class="text1-10 text10">联系方式：$mobile</div>
		</div>
		 <div class="dialog"></div>
		<div class="page_1" style="width:100%;height:100%;position:absolute;top:0;">
			
			<div class="layer layer1-1"></div>
			<div class="layer layer1-2"></div>
			<div class="layer layer1-3"></div>
			<div class="layer layer1-4"></div>
			<div class="layer layer1-5"></div>
			<div class="layer layer1-6"></div>
			<div class="layer layer1-7"></div>
			<div class="layer layer1-8"></div>
			<div class="layer layer1-9"></div>
			<div class="layer layer1-10"></div>
			<div class="layer layer1-11"></div>
			<div class="layer layer1-12"></div>
			<div class="layer layer1-13"></div>
			<div class="layer layer1-14"></div>
			<div class="layer layer1-15"></div>
			
		</div>
		</div>

 
</div>
<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="js/idangerous.swiper/idangerous.swiper-2.6.1.min.js"></script>
<link rel="stylesheet" href="js/idangerous.swiper/idangerous.swiper.css" />
<script type="text/javascript" src="js/jquery.transit.min.js"></script>
<script type="text/javascript" src="js/touch-0.2.13.min.js"></script>
<script type="text/javascript" src="js/weiyaoqing.mobile.js"></script>
<script type="text/javascript" src="js/preload.js"></script>
<script type="text/javascript" src="js/response.js"></script>
<script type="text/javascript" src="js/love.js"></script>
<script>var eid = $eid;</script>

<div class="music1">
<img src="img/music1_play.png" style="width: 100%">
<audio id="video1" autoplay="false" loop style="display:none;">
	<source src="$music" id="video1_url_mp3" type="audio/mpeg">
	</audio>
</div>
<div class="music2">
<img src="img/music2_stop.png" style="width: 100%">
<audio id="video2" autoplay="false" loop style="display:none;">
	<source src="$voice" id="video2_url_mp3" type="audio/mpeg">
	</audio>
</div>

<script type="text/javascript" src="js/tongyong.js"></script>
</body>
</html>

EOT;

$templatename =  $tmpname."_".date("Y-m-d") . rand() . ".html";
//$templatename =  $tmpname. ".html";

file_put_contents($templatename,$html);

echo "http://card.allappropriate.com/h5/".$templatename; 
}




if (trim($tmpname) == trim("Party")){

$html=<<<EOT



<!DOCTYPE html>
<html class="ks-webkit533 ks-webkit">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>超级邀请函</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/mobi.css" />
    <link rel="stylesheet" href="css/tongyong.css" />
    <link rel="stylesheet" href="css/party.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
</head><meta name="author" content="超级邀请函"> <meta name="Copyright" content="超级邀请函">
<body cz-shortcut-listen="true" title="" icon="" link="" desc="">
    <div class="loadingCls">
        <div class="loading">
            <img src="img/loading.gif" width="15%">
        </div>
        <div class="loadingText" style="color:#000;">
            <p>Loading...</p><p> </p>
        </div>
    </div>
    <div class="swiper-container" style="position: relative;width:100%;height:100%;overflow: hidden;">
        <div class="swiper-wrapper">
            <div class="swiper-slide page layer1">
                <div class="layer layer1-4">
                 <div class="swiper-container images" style="z-index:0;position: relative;width:100%;height:100%;overflow: hidden;">
                  <div class="swiper-wrapper">
                  
                  
                   <div class="swiper-slide ">
                    <img src="img/party/1-4.png" style="height:100%;width:100%;"/>
                </div>
      
                $swiperslide
                
            </div>
        </div>

    </div>
    <div class="layer layer1-1"></div>
    <div class="layer layer1-3"></div>
    <div class="layer layer1-16"></div>
	<div class="layer layer1-5"></div>
    <div class="layer layer1-6"></div>
    <div class="layer layer1-7"></div>
    <p class="text1-7 text1">主题：$title</p>
    <p class="text1-7 text2">时间：<span>$startime</span>  </p>
    <p class="text1-7 text3">       <span>$endtime</span></p>
    <p class="text1-7 text4"><a href="http://api.map.baidu.com/marker?location=$lat,$lng&title=$title&content=$title&output=html"><img src="img/party/1-2.png" class="layer1-2"/></a>地址：<span>$location</span></p>
    <p class="text1-7 text5"><span>联系人：$username</span> </p>
    <p class="text1-7 text6"><span>联系方式：$mobile</span></p>
    <p class="text1-7 text7">已报名人数：<span style="font-size:18px;">$count</span></p>
   
    <div class="layer layer1-8 button"></div>    
    <div class="layer layer1-9"></div>
    <div class="layer layer1-10"></div>
    <div class="layer layer1-11"></div>
    <div class="pageContainer" id='container1'>
        <div class="layer layer1-17"></div>
        <div class="layer layer1-12 next"></div>
        <div class="layer layer1-13 next"></div>
        <div class="layer layer1-14 next"></div>
        <div class="layer layer1-15 next"></div>
    </div>
    <div class="dialog"></div>

</div>

</div>
</div>
<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="js/idangerous.swiper/idangerous.swiper-2.6.1.min.js"></script>
<link rel="stylesheet" href="js/idangerous.swiper/idangerous.swiper.css" />
<script type="text/javascript" src="js/jquery.transit.min.js"></script>
<script type="text/javascript" src="js/touch-0.2.13.min.js"></script>
<script type="text/javascript" src="js/weiyaoqing.mobile.js"></script>
<script type="text/javascript" src="js/preload.js"></script>
<script type="text/javascript" src="js/response.js"></script>

<script>
var eid = $eid;
</script>


<div class="music1">
<img src="img/music1_play.png" style="width: 100%">
<audio id="video1" autoplay="false" loop style="display:none;">
	<source src="$music" id="video1_url_mp3" type="audio/mpeg">
	</audio>
</div>
<div class="music2">
<img src="img/music2_stop.png" style="width: 100%">
<audio id="video2" autoplay="false" loop style="display:none;">
	<source src="$voice" id="video2_url_mp3" type="audio/mpeg">
	</audio>
</div>



        <script type="text/javascript" src="js/tongyong.js"></script>
        <script type="text/javascript" src="js/party.js"></script>
    </body>
    </html>

EOT;


//$templatename =  $tmpname. ".html";
$templatename =  $tmpname."_".date("Y-m-d") . rand() . ".html";
file_put_contents($templatename,$html);

echo "http://card.allappropriate.com/h5/".$templatename;
 
}

if (trim($tmpname) == trim("bar")){

$html=<<<EOT

<!DOCTYPE html>
<html class="ks-webkit533 ks-webkit">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>超级邀请函</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/mobi.css" />
	<link rel="stylesheet" href="css/tongyong.css" />
	<link rel="stylesheet" href="css/jiuba.css?v=2" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
	<style>
		

	</style>
</head><meta name="author" content="超级邀请函"> <meta name="Copyright" content="超级邀请函">
<body cz-shortcut-listen="true" title="" icon="" link="" desc="">
	<div class="loadingCls">
		<div class="loading">
			<img src="img/loading.gif" width="15%">
		</div>
		<div class="loadingText" style="color:#000;">
			<p>Loading...</p><p> </p>
		</div>
	</div>
	<div class="swiper-container" style="position: relative;width:100%;height:100%;overflow: hidden;">
		<div class="swiper-wrapper">
			<div class="swiper-slide page layer1">
				<div class="dialog"></div>
				<div class='layer pageConatiner' id='container2'>
					<div class="layer layer1-1s"></div>
					<div class="layer layer1-1 button"></div>
					<div class="layer layer1-3"></div>
					<div class="layer layer1-4"></div>
					<div class="layer layer1-5"></div>
					<div class="layer layer1-6"></div>
					<div class="layer layer1-7"></div>
					<div class="layer layer1-8"></div>
					<p class="text1-7 text1">已报名人数：<span style="font-size:18px;">$count</span></p>
					<p class="text1-7 text2">主题：$title</p>
					<p class="text1-7 text3">时间：$startime  </p>
					<p class="text1-7 text4"><span style="opacity:0;">时间：</span>$endtime</p>
					<p class="text1-7 text5"><a href="http://api.map.baidu.com/marker?location=$lat,$lng&title=$title&content=$title&output=html">
						<img src="img/jiuba/1-2.png" style="width:6.66%;height:80%;"/></a>
						地址：$location</p>
						<p class="text1-7 text6">联系人：$username </p>
						<p class="text1-7 text7">联系方式：$mobile</p>
					
				</div>
					<div class= "page2" style="height:100%;width:100%;position:absolute;top:0%;left:0;">
						<div class="layer layer1-9"></div>
						<div class='layer pageConatiner' id='container1'>
							<div class="layer layer1-10"></div>
							<div class="layer layer1-11"></div>
							<div class="layer layer1-12 huang">
								<div class="swiper-container images" style="z-index:0;position: relative;width:100%;height:100%;overflow: hidden;">
									<div class="swiper-wrapper">
										<div class="swiper-slide ">
											<img src="img/jiuba/1-12.png" style="width:100%;"/>
										</div>
										<div class="swiper-slide ">
											<img src="img/jiuba/1-12.png" style="width:100%;"/>
										</div>
										<div class="swiper-slide ">
											<img src="img/jiuba/1-12.png" style="width:100%;"/>
										</div>
									</div>
								</div>
							</div>
							<div class="layer layer1-13 flush"></div>
							<div class="layer layer1-14"></div>
							<div class="layer layer1-15"></div>
							<div class="layer layer1-16"></div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
		<script type="text/javascript" src="js/idangerous.swiper/idangerous.swiper-2.6.1.min.js"></script>
		<link rel="stylesheet" href="js/idangerous.swiper/idangerous.swiper.css" />
		<script type="text/javascript" src="js/jquery.transit.min.js"></script>
		<script type="text/javascript" src="js/touch-0.2.13.min.js"></script>
		<script type="text/javascript" src="js/weiyaoqing.mobile.js"></script>
		<script type="text/javascript" src="js/preload.js"></script>
		<script type="text/javascript" src="js/response.js"></script>
     	<script>var eid = $eid;</script>


		<div class="music1">
			<img src="img/music1_play.png" style="width: 100%">
			<audio id="video1" autoplay="false" loop style="display:none;">
				<source src="$music" id="video_url_mp3" type="audio/mpeg">
				</audio>
			</div>
			<div class="music2">
				<img src="img/music2_stop.png" style="width: 100%">
				<audio id="video2" autoplay="false" loop style="display:none;">
					<source src="$voice" id="video_url_mp3" type="audio/mpeg">
					</audio>
				</div>



				<script type="text/javascript" src="js/tongyong.js"></script>
				<script type="text/javascript" src="js/jiuba.js"></script>
			</body>
			</html>


EOT;


//$templatename =  $tmpname. ".html";
$templatename =  $tmpname."_".date("Y-m-d") . rand() . ".html";
file_put_contents($templatename,$html);

echo "http://card.allappropriate.com/h5/".$templatename;
 
}


if (trim($tmpname) == trim("weddingtemplate0")){

$html=<<<EOT
<!DOCTYPE html>
<html class="ks-webkit533 ks-webkit">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>超级邀请函</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/mobi.css" />
	<link rel="stylesheet" href="css/tongyong.css" />
	<link rel="stylesheet" href="css/hunli1.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">

</head><meta name="author" content="超级邀请函"> <meta name="Copyright" content="超级邀请函">
<body cz-shortcut-listen="true" title="" icon="" link="" desc="">
<div class="loadingCls">
    <div class="loading">
        <img src="img/loading.gif" width="15%">
    </div>
    <div class="loadingText" style="color:#000;">
        <p>Loading...</p><p> </p>
    </div>
</div>
<div class="swiper-container" style="position: relative;width:100%;height:100%;overflow: hidden;">
    <div class="swiper-wrapper">
    <div class="swiper-slide page layer1">
		<div class="dialog"></div>
		<div class='layer pageContainer' id='container1'>
			<div class="layer layer1-2">
				<div class="swiper-container images" style="z-index:0;position: relative;width:100%;height:100%;overflow: hidden;">
					<div class="swiper-wrapper">
						<div class="swiper-slide ">
							<img src="img/hunli1/1-2.png" style="height:100%;width:100%;"/>
						</div>
						<div class="swiper-slide ">
							<img src="img/hunli1/1-2.png" style="height:100%;width:100%;"/>
						</div>
						<div class="swiper-slide ">
							<img src="img/hunli1/1-2.png" style="height:100%;width:100%;"/>
						</div>
					</div>
				</div>
			</div>
			<div class="layer layer1-3"></div>
			<div class="layer layer1-4"></div>
			<div class="layer layer1-5"></div>
			<div class="layer layer1-6 button"></div>
			<div class="layer layer1-7 flush2 button"></div>
			<p class="text1-7 text1">已报名人数：<span style="font-size:18px;">$count</span></p>
			<p class="text1-7 text2">主题：$title</p>
			<p class="text1-7 text3">时间：$startime  </p>
			<p class="text1-7 text4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$endtime</p>
			<p class="text1-7 text5"><a href="http://api.map.baidu.com/marker?location=$lat,$lng&title=$title&content=$title&output=html">
									<img src="img/hunli1/1-1.png" style="width:6.66%;height:80%;"/></a>
									地址：$location</p>
			<p class="text1-7 text6">联系人：$username </p>
			<p class="text1-7 text7">联系方式：$mobile</p>
			<div class="layer layer1-8"></div>
		</div>
		<div class="layer layer1-9"></div>
		<div class="layer layer1-14"></div>
		<div class="layer layer1-10"></div>
		<div class="layer layer1-11"></div>
		<div class="layer layer1-12"></div>
		<div class="layer layer1-13 flush"></div>

	</div>

    </div>
</div>
<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="js/idangerous.swiper/idangerous.swiper-2.6.1.min.js"></script>
<link rel="stylesheet" href="js/idangerous.swiper/idangerous.swiper.css" />
<script type="text/javascript" src="js/jquery.transit.min.js"></script>
<script type="text/javascript" src="js/touch-0.2.13.min.js"></script>
<script type="text/javascript" src="js/weiyaoqing.mobile.js"></script>
<script type="text/javascript" src="js/preload.js"></script>
<script type="text/javascript" src="js/response.js"></script>
<script>var eid = $eid;</script>


<div class="music1">
<img src="img/music1_play.png" style="width: 100%">
<audio id="video1" autoplay="false" loop style="display:none;">
    <source src="$music" id="video_url_mp3" type="audio/mpeg">
</audio>
</div>
<div class="music2">
<img src="img/music2_stop.png" style="width: 100%">
<audio id="video2" autoplay="false" loop style="display:none;">
    <source src="$voice" id="video_url_mp3" type="audio/mpeg">
</audio>
</div>
<script type="text/javascript" src="js/tongyong.js?v=5"></script>
<script type="text/javascript" src="js/hunli1.js"></script>
</body>
</html>



EOT;


//$templatename =  $tmpname. ".html";
$templatename =  $tmpname."_".date("Y-m-d") . rand() . ".html";
file_put_contents($templatename,$html);

echo "http://card.allappropriate.com/h5/".$templatename;
 
}




if (trim($tmpname) == trim("weddingtemplate1")){

$html=<<<EOT

<!DOCTYPE html>
<html class="ks-webkit533 ks-webkit">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>超级邀请函</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/mobi.css" />
	<link rel="stylesheet" href="css/tongyong.css?v=3" />
	<link rel="stylesheet" href="css/hunli2.css?v=8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
	<style>
		
	</style>
</head><meta name="author" content="超级邀请函"> <meta name="Copyright" content="超级邀请函">
<body cz-shortcut-listen="true" title="" icon="" link="" desc="">
	<div class="loadingCls">
		<div class="loading">
			<img src="img/loading.gif" width="15%">
		</div>
		<div class="loadingText" style="color:#000;">
			<p>Loading...</p><p> </p>
		</div>
	</div>
	<div class="swiper-container" style="position: relative;width:100%;height:100%;overflow: hidden;">
		<div class="swiper-wrapper">
			<div class="swiper-slide page layer1">
				<div class="dialog"></div>
				<div class='layer pageContainer' id='container2'>
					<div class="layer layer1-1 button"></div>
					<div style="position: absolute;left:21.2%;top:7.1%;width:60%;height:44.7%;">
						<div class="swiper-container photos" style="z-index:0;position: relative;width:100%;height:100%;overflow: hidden;">
							<div class="swiper-wrapper">
								<div class="swiper-slide imgContainer">
									<img src="img/hunli2/1-2.png"/>
									<img src="img/hunli2/1-3.png"/>
									<img src="img/hunli2/1-4.png"/>
									<img src="img/hunli2/1-5.png"/>
								</div>
								<div class="swiper-slide imgContainer">
									<img src="img/hunli2/1-2.png"/>
									<img src="img/hunli2/1-3.png"/>
									<img src="img/hunli2/1-4.png"/>
									<img src="img/hunli2/1-5.png"/>
								</div>
								<div class="swiper-slide imgContainer">
									<img src="img/hunli2/1-2.png"/>
									<img src="img/hunli2/1-3.png"/>
									<img src="img/hunli2/1-4.png"/>
									<img src="img/hunli2/1-5.png"/>
								</div>
							</div>
						</div>

					</div>

					<p class="text1-7 text2">主题：$title</p>
					<p class="text1-7 text3">时间：$startime </p>
					<p class="text1-7 text4"><span style="opacity:0;">时间：</span>$endtime </p>
					<p class="text1-7 text5"><a href="http://api.map.baidu.com/marker?location=$lat,$lng&title=$title&content=$title&output=html">
						<img src="img/hunli2/1-6.png" style="position:absolute;left:-8%;width:16px;height:16px;"/></a>
						地址：$location</p>
						<p class="text1-7 text6">联系人：$username </p>
						<p class="text1-7 text7">联系方式：$mobile </p>
						<p class="text1-7 text1">已报名人数：<span style="font-size:18px;">$count</span></p>

						<div class="layer layer1-7"></div>
						<div class="layer layer1-8"></div>
					</div>
					<div class="layer layer1-9"></div>
					<div class="layer layer1-10"></div>
					<div class='layer pageContainer' id='container1'>
						<div class="layer layer1-11"></div>
						<div class="layer layer1-12">
							<div class="swiper-container circle" style="z-index:0;position: relative;width:100%;height:100%;overflow: hidden;">
								<div class="swiper-wrapper">
									<div class="swiper-slide ">
										<img src="img/hunli2/1-12.png" style="width:100%;"/>
									</div>
									<div class="swiper-slide ">
										<img src="img/hunli2/1-12.png" style="width:100%;"/>
									</div>
									<div class="swiper-slide ">
										<img src="img/hunli2/1-12.png" style="width:100%;"/>
									</div>
								</div>
							</div>
						</div>
						<div class="layer layer1-13"></div>
						<div class="layer layer1-15"></div>
						<div class="layer layer1-16"></div>
						<div class="layer layer1-14"></div>
						<div class="layer layer1-17"></div>
						<div class="layer layer1-18"></div>
					</div>
				</div>

			</div>
		</div>
		<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
		<script type="text/javascript" src="js/idangerous.swiper/idangerous.swiper-2.6.1.min.js"></script>
		<link rel="stylesheet" href="js/idangerous.swiper/idangerous.swiper.css" />
		<script type="text/javascript" src="js/jquery.transit.min.js"></script>
		<script type="text/javascript" src="js/touch-0.2.13.min.js"></script>
		<script type="text/javascript" src="js/weiyaoqing.mobile.js"></script>
		<script type="text/javascript" src="js/preload.js"></script>
		<script type="text/javascript" src="js/response.js"></script>
   <script>var eid = $eid;</script>

		<div class="music1">
			<img src="img/music1_play.png" style="width: 100%">
			<audio id="video1" autoplay="false" loop style="display:none;">
				<source src="$music" id="video_url_mp3" type="audio/mpeg">
				</audio>
			</div>
			<div class="music2">
				<img src="img/music2_stop.png" style="width: 100%">
				<audio id="video2" autoplay="false" loop style="display:none;">
					<source src="$voice" id="video_url_mp3" type="audio/mpeg">
					</audio>
				</div>



				<script type="text/javascript" src="js/tongyong.js?v=5"></script>
				<script type="text/javascript" src="js/hunli2.js"></script>
			</body>
			</html>

EOT;


//$templatename =  $tmpname. ".html";
$templatename =  $tmpname."_".date("Y-m-d") . rand() . ".html";
file_put_contents($templatename,$html);

echo "http://card.allappropriate.com/h5/".$templatename;
 
}

if (trim($tmpname) == trim("business01")){

$html=<<<EOT

<!DOCTYPE html>
<html class="ks-webkit533 ks-webkit">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>超级邀请函</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/mobi.css" />
	<link rel="stylesheet" href="css/tongyong.css" />
	<link rel="stylesheet" href="css/huiyi1.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
    <style>
		
    </style>
</head><meta name="author" content="超级邀请函"> <meta name="Copyright" content="超级邀请函">
<body cz-shortcut-listen="true" title="" icon="" link="" desc="">
<div class="loadingCls">
    <div class="loading">
        <img src="img/loading.gif" width="15%">
    </div>
    <div class="loadingText" style="color:#000;">
        <p>Loading...</p><p> </p>
    </div>
</div>
<div class="swiper-container" style="position: relative;width:100%;height:100%;overflow: hidden;">
    <div class="swiper-wrapper">
    <div class="swiper-slide page layer1">
		<div class="dialog"></div>
		<div class='layer pageContainer' id='container3'>
	 			<p class="text1-7 text7" style='z-index:20;'>已报名人数：<span style="font-size:18px;">20</span></p>
	 			<div class="layer layer1-11 button" style='z-index:20;'></div>
	 	</div>	
		<div class='layer pageContainer' id="container2">
			<div class="layer layer1-1"></div>
			<div class="layer layer1-2"></div>
			<div class="layer layer1-3"></div>
			<div class="layer text_contents">
				<div class="swiper-container texts" style="z-index:0;position: relative;width:100%;height:100%;overflow: hidden;">
					<div class="swiper-wrapper" style="width:100%;height:100%;">
						<div class="swiper-slide " style="width:100%;height:100%;">
							<p class="layer layer1-4">$title</p>
							<div class="layer layer1-5"></div>
							<div class="layer layer1-6"></div>
							<div class="layer layer1-7"></div>
							<div class="layer layer1-8"></div>
							<p class="text1-7 text1">主题：$title</p>
							<p class="text1-7 text2">时间：$startime  </p>
							<p class="text1-7 text3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$endtime </p>
							<p class="text1-7 text4">地址：$location
													<a href="http://api.map.baidu.com/marker?location=$lat,$lng&title=$title&content=$title&output=html">
													<img src="img/huiyi1/1-4.png" style="width:16px;height:16px;"/></a></p>
							<p class="text1-7 text5">联系人：$username </p>
							<p class="text1-7 text6">联系方式：$mobile</p>
						</div>
						<div class="swiper-slide ">
							<img src="img/chunjie/1-10.png" style="height:60%;width:100%;"/>
						</div>
						<div class="swiper-slide ">
							<img src="img/chunjie/1-10.png" style="height:60%;width:100%;"/>
						</div>
					</div>
				</div>
				
			</div>
			<div class="layer layer1-9"></div>
			<div class="layer layer1-10"></div>
 		</div>

		<div class="layer pageContainer" id='container1'>
			<div class="layer layer1-15"></div>
			<div class="layer layer1-13"></div>
			<div class="layer layer1-12"></div>
			<div class="layer layer1-14 flush"></div>
			<div class="layer layer1-16"></div>
			<div class="layer layer1-17"></div>
			<div class="layer layer1-18"></div>
			<div class="layer layer1-19"></div>
		</div>
</div>

    </div>
</div>
<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="js/idangerous.swiper/idangerous.swiper-2.6.1.min.js"></script>
<link rel="stylesheet" href="js/idangerous.swiper/idangerous.swiper.css" />
<script type="text/javascript" src="js/jquery.transit.min.js"></script>
<script type="text/javascript" src="js/touch-0.2.13.min.js"></script>
<script type="text/javascript" src="js/weiyaoqing.mobile.js"></script>
<script type="text/javascript" src="js/preload.js"></script>
<script type="text/javascript" src="js/response.js"></script>
<script>var eid = $eid;</script>

<div class="music1">
<img src="img/music1_play.png" style="width: 100%">
<audio id="video1" autoplay="false" loop style="display:none;">
	<source src="$music" id="video1_url_mp3" type="audio/mpeg">
	</audio>
</div>
<div class="music2">
<img src="img/music2_stop.png" style="width: 100%">
<audio id="video2" autoplay="false" loop style="display:none;">
	<source src="$voice" id="video2_url_mp3" type="audio/mpeg">
	</audio>
</div>



<script type="text/javascript" src="js/tongyong.js?v=3"></script>
<script type="text/javascript" src="js/huiyi1.js"></script>
</body>
</html>

EOT;


//$templatename =  $tmpname. ".html";
$templatename =  $tmpname."_".date("Y-m-d") . rand() . ".html";
file_put_contents($templatename,$html);

echo "http://card.allappropriate.com/h5/".$templatename;
 
}




if (trim($tmpname) == trim("business02")){

$html=<<<EOT

<!DOCTYPE html>
<html class="ks-webkit533 ks-webkit">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>超级邀请函</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/mobi.css" />
	<link rel="stylesheet" href="css/tongyong.css" />
	<link rel="stylesheet" href="css/huiyi2.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
</head><meta name="author" content="超级邀请函"> <meta name="Copyright" content="超级邀请函">
<body cz-shortcut-listen="true" title="" icon="" link="" desc="">
<div class="loadingCls">
    <div class="loading">
        <img src="img/loading.gif" width="15%">
    </div>
    <div class="loadingText" style="color:#000;">
        <p>Loading...</p><p> </p>
    </div>
</div>
<div class="swiper-container" style="position: relative;width:100%;height:100%;overflow: hidden;">
    <div class="swiper-wrapper">
    <div class="swiper-slide page layer1">
	<div class="dialog"></div>
	<div class="layer layer1-b1"></div>
	<div class="layer layer1-b2"></div>
	<div class="layer layer1-b3"></div>
	<div class="layer pageContainer" id='container3'>
		<div class="layer layer1-2"></div>
	</div>
	<div class='layer pageContainer' id='container2'>
		<div class="layer layer1-1"></div>
		<div class="layer layer1-3"></div>
		<div class="layer layer1-4"></div>
		<div class="layer layer1-text">
			<div class="swiper-container texts" style="z-index:0;position: relative;width:100%;height:100%;overflow: hidden;">
				<div class="swiper-wrapper" style="width:100%;height:100%;">
					<div class="swiper-slide " style="width:100%;height:100%;">
						<p class="text1-7 text1">主题：$title</p>
						<p class="text1-7 text2">时间：$startime  </p>
						<p class="text1-7 text3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$endtime</p>
						<p class="text1-7 text4">地址：$location
												<a href="http://api.map.baidu.com/marker?location=$lat,$lng&title=$title&content=$title&output=html">
												<img src="img/huiyi1/1-4.png" style="width:6.66%;height:80%;"/></a></p>
						<p class="text1-7 text5">联系人：$username </p>
						<p class="text1-7 text6">联系方式：$mobile</p>
					</div>
					<div class="swiper-slide ">
						<img src="img/chunjie/1-10.png" style="height:60%;width:100%;"/>
					</div>
					<div class="swiper-slide ">
						<img src="img/chunjie/1-10.png" style="height:60%;width:100%;"/>
					</div>
				</div>
			</div>
		</div>
		<p class="text1-7 text7">已报名人数：<span style="font-size:18px;">20</span></p>
		<div class="layer layer1-5"></div>
		<div class="layer layer1-6"></div>
		<div class="layer layer1-7"></div>
		<div class="layer layer1-8 button"></div>
	</div>
	<div class="layer layer1-9"></div>
	<div class='layer pageContainer' id='container1'>
		<div class="layer layer1-10"></div>
		<div class="layer layer1-11 flush swiper_up"></div>		
	</div>
	</div>
    </div>
</div>
<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="js/idangerous.swiper/idangerous.swiper-2.6.1.min.js"></script>
<link rel="stylesheet" href="js/idangerous.swiper/idangerous.swiper.css" />
<script type="text/javascript" src="js/jquery.transit.min.js"></script>
<script type="text/javascript" src="js/touch-0.2.13.min.js"></script>
<script type="text/javascript" src="js/weiyaoqing.mobile.js"></script>
<script type="text/javascript" src="js/preload.js"></script>
<script type="text/javascript" src="js/response.js"></script>

<script>var eid = $eid;</script>

<div class="music1">
<img src="img/music1_play.png" style="width: 100%">
<audio id="video1" autoplay="false" loop style="display:none;">
	<source src="$music" id="video1_url_mp3" type="audio/mpeg">
	</audio>
</div>
<div class="music2">
<img src="img/music2_stop.png" style="width: 100%">
<audio id="video2" autoplay="false" loop style="display:none;">
	<source src="$voice" id="video2_url_mp3" type="audio/mpeg">
	</audio>
</div>



<script type="text/javascript" src="js/tongyong.js?v=3"></script>
<script type="text/javascript" src="js/huiyi2.js"></script>
</body>
</html>


EOT;


//$templatename =  $tmpname. ".html";
$templatename =  $tmpname."_".date("Y-m-d") . rand() . ".html";
file_put_contents($templatename,$html);

echo "http://card.allappropriate.com/h5/".$templatename;
 
}




if (trim($tmpname) == trim("movie")){

$html=<<<EOT

<!DOCTYPE html>
<html class="ks-webkit533 ks-webkit">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>超级邀请函</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/mobi.css" />
    <link rel="stylesheet" href="css/tongyong.css" />
    <link rel="stylesheet" href="css/movie.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
    <style>


    </style>
</head>
<body cz-shortcut-listen="true" title="" icon="" link="" desc="">
    <div class="loadingCls">
        <div class="loading">
            <img src="img/loading.gif" width="15%">
        </div>
        <div class="loadingText" style="color:#000;">
            <p>Loading...</p><p> </p>
        </div>
    </div>
    <div class="swiper-container" style="position: relative;width:100%;height:100%;overflow: hidden;">
        <div class="swiper-wrapper">
            <div class="swiper-slide page layer1">
                <div class="layer layer1-9"></div>
                <div class='layer pageContainer' id='container1'>
                    <div class="layer layer1-10"></div>
                    <div class="layer layer1-11"></div>
                    <div class="layer layer1-12"></div>
                    <div class="layer layer1-13 flush2"></div>
                    <div class="layer layer1-14"></div>
                    <div class="layer layer1-15"></div>
                    <div class="layer layer1-16"></div>
                </div>
                <div class="dialog"></div>
                <div class="layer layer1-b">
                    <div class='layer pageContainer' id='container1'>
                        <div class="layer layer1-2"></div>
                        <div class="layer layer1-3"></div>
                        <div class="layer layer1-4"></div>
                        <div class="layer layer1-5"></div>
						<p class="text1-7 text1">《黑衣人XIX》</p>
                        <div class="layer layer1-6"></div>
                        <div class="layer layer1-7"></div>
                        <div class="layer layer1-8"></div>
						<div class="layer layer1-17 button flush"></div>
                        <p class="text1-7 text8">报名人数：<span style="font-size:18px;">20</span></p>
                        <p class="text1-7 text2">主题：看电影吧</p>
                        <p class="text1-7 text3">时间：$startime </p>
                        <p class="text1-7 text4"><span style="opacity:0;">时间：</span>$endtime </p>
                        <p class="text1-7 text5"><a href="http://api.map.baidu.com/marker?location=$lat,$lng&title=$title&content=$title&output=html">
                          <img src="img/movie/1-1.png" style="width:6.66%;height:80%;"/></a>
                          地址：$location</p>
                          <p class="text1-7 text6">联系人：$username </p>
                          <p class="text1-7 text7">联系方式：$mobile</p>
                      </div>
                  </div>
              </div>

          </div>
      </div>
      <script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
      <script type="text/javascript" src="js/idangerous.swiper/idangerous.swiper-2.6.1.min.js"></script>
      <link rel="stylesheet" href="js/idangerous.swiper/idangerous.swiper.css" />
      <script type="text/javascript" src="js/jquery.transit.min.js"></script>
      <script type="text/javascript" src="js/touch-0.2.13.min.js"></script>
      <script type="text/javascript" src="js/weiyaoqing.mobile.js"></script>
      <script type="text/javascript" src="js/preload.js"></script>
      <script type="text/javascript" src="js/response.js"></script>
      <script>


      </script>

      <div class="music1">
        <img src="img/music1_play.png" style="width: 100%">
        <audio id="video1" autoplay="false" loop style="display:none;">
            <source src="$music" id="video_url_mp3" type="audio/mpeg">
            </audio>
        </div>
        <div class="music2">
            <img src="img/music2_stop.png" style="width: 100%">
            <audio id="video2" autoplay="false" loop style="display:none;">
                <source src="$voice" id="video_url_mp3" type="audio/mpeg">
                </audio>
            </div>



            <script type="text/javascript" src="js/tongyong.js"></script>
            <script type="text/javascript" src="js/movie.js"></script>
        </body>
        </html>


EOT;


//$templatename =  $tmpname. ".html";
$templatename =  $tmpname."_".date("Y-m-d") . rand() . ".html";
file_put_contents($templatename,$html);

echo "http://card.allappropriate.com/h5/".$templatename;
 
}




if (trim($tmpname) == trim("travel")){

$html=<<<EOT

<!DOCTYPE html>
<html class="ks-webkit533 ks-webkit">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>超级邀请函</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/mobi.css" />
	<link rel="stylesheet" href="css/tongyong.css" />
	<link rel="stylesheet" href="css/lvxing.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
    <style>
		
    </style>
</head>
<body cz-shortcut-listen="true" title="" icon="" link="" desc="">
<div class="loadingCls">
    <div class="loading">
        <img src="img/loading.gif" width="15%">
    </div>
    <div class="loadingText" style="color:#000;">
        <p>Loading...</p><p> </p>
    </div>
</div>
<div class="swiper-container" style="position: relative;width:100%;height:100%;overflow: hidden;">
    <div class="swiper-wrapper">
    <div class="swiper-slide page layer1">
<div class="layer layer1-8c"></div>
<div class="layer layer1-1"></div>
<div class="layer layer1-3"></div>
<div class="layer layer1-4"></div>
<div class="layer layer1-5"></div>
<div class="layer layer1-6"></div>
<div class="layer layer1-7 button"></div>
<div class="layer layer1-7s button"></div>
<div class="dialog"></div>
<p class="text1-7 text1">报名人数：<span style="font-size:18px;">20</span></p>
<p class="text1-7 text2">主题：生日快乐</p>
<p class="text1-7 text3">时间：$startime </p>
<p class="text1-7 text4"><span style="opacity:0;">时间：</span>$endtime </p>
<p class="text1-7 text5"><a href="http://api.map.baidu.com/marker?location=$lat,$lng&title=$title&content=$title&output=html">
	  <img src="img/lvxing/1-2.png" style="width:5.66%;height:80%;"/></a>
	  地址：$location</p>
<p class="text1-7 text6">联系人：$username </p>
<p class="text1-7 text7">联系方式：$mobile</p>
<div class="layer layer1-8"></div>
<div class="layer layer1-8a"></div>
<div class="layer layer1-8b"></div>
<div class="layer layer1-9">
	<div class="swiper-container images" style="z-index:0;position: relative;width:100%;height:100%;overflow: hidden;">
		<div class="swiper-wrapper">
			<div class="swiper-slide ">
				<img src="img/lvxing/1-9.png" style="width:100%;height:100%;"/>
			</div>
			<div class="swiper-slide ">
				<img src="img/lvxing/1-9.png" style="width:100%;height:100%;"/>
			</div>
			<div class="swiper-slide ">
				<img src="img/lvxing/1-9.png" style="width:100%;height:100%;"/>
			</div>
		</div>
	</div>
</div>
<div class="layer layer1-10"></div>
<div class="layer layer1-11"></div>
<div class="layer layer1-12"></div>
<div class="layer layer1-13"></div>
<div class="layer layer1-14"></div>
<div class="layer layer1-15"></div>
<div class="layer layer1-16"></div>
<div class="layer layer1-17"></div>
</div>

    </div>
</div>
<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="js/idangerous.swiper/idangerous.swiper-2.6.1.min.js"></script>
<link rel="stylesheet" href="js/idangerous.swiper/idangerous.swiper.css" />
<script type="text/javascript" src="js/jquery.transit.min.js"></script>
<script type="text/javascript" src="js/touch-0.2.13.min.js"></script>
<script type="text/javascript" src="js/weiyaoqing.mobile.js"></script>
<script type="text/javascript" src="js/preload.js"></script>
<script type="text/javascript" src="js/response.js"></script>
   <script>
                var eid = $eid;
            </script>

<div class="music1">
<img src="img/music1_play.png" style="width: 100%">
<audio id="video1" autoplay="false" loop style="display:none;">
    <source src="$music" id="video_url_mp3" type="audio/mpeg">
</audio>
</div>
<div class="music2">
<img src="img/music2_stop.png" style="width: 100%">
<audio id="video2" autoplay="false" loop style="display:none;">
    <source src="$voice" id="video_url_mp3" type="audio/mpeg">
</audio>
</div>



<script type="text/javascript" src="js/tongyong.js"></script>
<script type="text/javascript" src="js/lvxing.js"></script>
</body>
</html>

EOT;


//$templatename =  $tmpname. ".html";
$templatename =  $tmpname."_".date("Y-m-d") . rand() . ".html";
file_put_contents($templatename,$html);

echo "http://card.allappropriate.com/h5/".$templatename;
 
}



if (trim($tmpname) == trim("night")){

$html=<<<EOT

<!DOCTYPE html>
<html class="ks-webkit533 ks-webkit">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>超级邀请函</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/mobi.css" />
	<link rel="stylesheet" href="css/tongyong.css" />
	<link rel="stylesheet" href="css/yedian.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
    <style>
		
        
    </style>
</head>
<body cz-shortcut-listen="true" title="" icon="" link="" desc="">
<div class="loadingCls">
    <div class="loading">
        <img src="img/loading.gif" width="15%">
    </div>
    <div class="loadingText" style="color:#000;">
        <p>Loading...</p><p> </p>
    </div>
</div>
<div class="swiper-container" style="position: relative;width:100%;height:100%;overflow: hidden;">
    <div class="swiper-wrapper">
    <div class="swiper-slide page layer1">
<div class="layer layer1-1"></div>
<div class="layer layer1-2"></div>
<div class="layer layer1-3 button"></div>
<div class="dialog"></div>
<p class="text1-7 text1">报名人数<span style="font-size:18px;">20</span></p>
<p class="text1-7 text2">主题：$title</p>
<p class="text1-7 text3">时间：$startime </p>
<p class="text1-7 text4"><span style="opacity:0;">时间：</span>$endtime </p>
<p class="text1-7 text5"><a href="http://api.map.baidu.com/marker?location=$lat,$lng&title=$title&content=$title&output=html">
	  <img src="img/yedian/1-4.png" style="position:absolute;left:-8%;width:5.66%;height:80%;"/></a>
	  地址：$location</p>
<p class="text1-7 text6">联系人：$username </p>
<p class="text1-7 text7">联系方式：$mobile</p>
<div class="layer layer1-6"></div>
<div class="layer layer1-5"></div>
<div class="layer layer1-7"></div>
<div class="layer layer1-9"></div>
<div class="layer layer1-8"></div>
<div class="layer layer1-10"></div>
</div>

    </div>
</div>
<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="js/idangerous.swiper/idangerous.swiper-2.6.1.min.js"></script>
<link rel="stylesheet" href="js/idangerous.swiper/idangerous.swiper.css" />
<script type="text/javascript" src="js/jquery.transit.min.js"></script>
<script type="text/javascript" src="js/touch-0.2.13.min.js"></script>
<script type="text/javascript" src="js/weiyaoqing.mobile.js"></script>
<script type="text/javascript" src="js/preload.js"></script>
<script type="text/javascript" src="js/response.js"></script>
<script>
   

</script>

<div class="music1">
<img src="img/music1_play.png" style="width: 100%">
<audio id="video1" autoplay="false" loop style="display:none;">
    <source src="$music" id="video_url_mp3" type="audio/mpeg">
</audio>
</div>
<div class="music2">
<img src="img/music2_stop.png" style="width: 100%">
<audio id="video2" autoplay="false" loop style="display:none;">
    <source src="$voice" id="video_url_mp3" type="audio/mpeg">
</audio>
</div>



<script type="text/javascript" src="js/tongyong.js"></script>
<script type="text/javascript" src="js/yedian.js?v=5"></script>
</body>
</html>

EOT;


//$templatename =  $tmpname. ".html";
$templatename =  $tmpname."_".date("Y-m-d") . rand() . ".html";
file_put_contents($templatename,$html);

echo "http://card.allappropriate.com/h5/".$templatename;
 
}





if (trim($tmpname) == trim("night")){

$html=<<<EOT


<!DOCTYPE html>
<html class="ks-webkit533 ks-webkit">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>超级邀请函</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/mobi.css" />
	<link rel="stylesheet" href="css/tongyong.css" />
	<link rel="stylesheet" href="css/sports.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
    <style>
		
       
    </style>
</head>
<body cz-shortcut-listen="true" title="" icon="" link="" desc="">
<div class="loadingCls">
    <div class="loading">
        <img src="img/loading.gif" width="15%">
    </div>
    <div class="loadingText" style="color:#000;">
        <p>Loading...</p><p> </p>
    </div>
</div>
<div class="swiper-container" style="position: relative;width:100%;height:100%;overflow: hidden;">
    <div class="swiper-wrapper">
    <div class="swiper-slide page layer1">
<div class="layer layer1-1"></div>
<div class="layer layer1-2">
	<div class="swiper-container images" style="z-index:0;position: relative;width:100%;height:100%;overflow: hidden;">
		<div class="swiper-wrapper">
			<div class="swiper-slide ">
				<img src="img/sports/1-2.png" style="width:100%;height:100%;"/>
			</div>
			<div class="swiper-slide ">
				<img src="img/sports/1-2.png" style="width:100%;height:100%;"/>
			</div>
			<div class="swiper-slide ">
				<img src="img/sports/1-2.png" style="width:100%;height:100%;"/>
			</div>
		</div>
	</div>
</div>
<div class="layer layer1-3"></div>
<div class="layer layer1-4 button"></div>
<div class="layer layer1-4s button"></div>
<div class="dialog"></div>
<p class="text1-7 text1">报名人数<span style="font-size:18px;">20</span></p>
<p class="text1-7 text2">主题：$title</p>
<p class="text1-7 text3">时间：$startime </p>
<p class="text1-7 text4"><span style="opacity:0;">时间：</span>$endtime </p>
<p class="text1-7 text5"><a href="http://api.map.baidu.com/marker?location=$lat,$lng&title=$title&content=$title&output=html">
	  <img src="img/sports/1-5.png" style="width:8%;height:80%;"/></a>
	  地址：$location</p>
<p class="text1-7 text6">联系人：$username </p>
<p class="text1-7 text7">联系方式：$mobile</p>
<div class="layer layer1-6"></div>
<div class="layer layer1-7"></div>
<div class="layer layer1-7s"></div>
<div class="layer layer1-8"></div>
</div>

    </div>
</div>
<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="js/idangerous.swiper/idangerous.swiper-2.6.1.min.js"></script>
<link rel="stylesheet" href="js/idangerous.swiper/idangerous.swiper.css" />
<script type="text/javascript" src="js/jquery.transit.min.js"></script>
<script type="text/javascript" src="js/touch-0.2.13.min.js"></script>
<script type="text/javascript" src="js/weiyaoqing.mobile.js"></script>
<script type="text/javascript" src="js/preload.js"></script>
<script type="text/javascript" src="js/response.js"></script>
<script>
   

</script>

<div class="music1">
<img src="img/music1_play.png" style="width: 100%">
<audio id="video1" autoplay="false" loop style="display:none;">
    <source src="$music" id="video_url_mp3" type="audio/mpeg">
</audio>
</div>
<div class="music2">
<img src="img/music2_stop.png" style="width: 100%">
<audio id="video2" autoplay="false" loop style="display:none;">
    <source src="$voice" id="video_url_mp3" type="audio/mpeg">
</audio>
</div>



<script type="text/javascript" src="js/tongyong.js"></script>
<script type="text/javascript" src="js/sports.js?v=3"></script>
</body>
</html>



EOT;


//$templatename =  $tmpname. ".html";
$templatename =  $tmpname."_".date("Y-m-d") . rand() . ".html";
file_put_contents($templatename,$html);

echo "http://card.allappropriate.com/h5/".$templatename;
 
}


}

function getpicpath($eid){


$con = mysql_connect("localhost","root","1q2w3e4r5t6yJUSHI$");

if (!$con)

  {

  die('数据库连接失败: ' . mysql_error());

  }

  else

  {

  mysql_select_db("supercard", $con);
  
  $sql = "SELECT pic FROM  `eventsinfo`  WHERE   eventsid  = '$eid' ";
  
  //echo($sql);

  $result = mysql_query($sql);
  
 
   
 while($row = mysql_fetch_array($result))

  {

   //echo  " " . $row['uid'] . " " . $row['username'].",";
   //$arr["uid"]=$row["uid"];
   $picpath = $row["pic"];
   
  }
  
  //echo $picpath."##path=";
  return $picpath; 

  }

mysql_close($con);
	
	
}







?>