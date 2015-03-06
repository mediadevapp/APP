$(function(){
    $('.dialog').html('<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><link rel="stylesheet" href="css/baoming.css" /><div class="content_black" style="transform:scale(0);opacity:0;"><div class="cancel"></div><div style="top:15%;" class="input_div" >&nbsp;&nbsp;&nbsp;&nbsp;姓名 <input type="text" id="name"/></div><div style="top:29.2%;" class="input_div" >&nbsp;&nbsp;&nbsp;&nbsp;电话 <input type="number"  id="mobile" onkeypress="return IsNum(event)" /></div><textarea id="content_text"  style="" placeholder="&nbsp;说点什么吧"></textarea><div style="position: absolute; left: 25%; top: 76%;"><a href="./copyright.html#shuoming" style="text-decoration:underline;color:#919191;">版权说明</a></div><div style="position: absolute;right: 25%;top: 76%;"><a href="copyright.html#shengming" style="text-decoration:underline;color:#919191;">免责声明</a></div> <div id="submit"><img src="img/submit_btn.png" style=""/></div></div><script type="text/javascript" src="js/baoming.js?v=1"></script>');
    $('.button').on('click',function(e){
        e.stopPropagation();
        $('.dialog').fadeIn();
        $('.content_black').transition({scale:1,opacity:1},800);
    });

    $(document).delegate('.cancel','touchstart',function(){
        $('.content_black').transition({opacity:0,scale:0},500);
        $('.dialog').fadeOut(500);
    });
    $(window).on('scroll.elasticity', function (e) {
        e.preventDefault();
    }).on('touchmove.elasticity', function (e) {
        e.preventDefault();
    });
});
var isaoto = 0;
function stop1(){
    var myVideo = document.getElementById("video1");
    if(!myVideo.paused){
        myVideo.pause();
        $(".music1").find("img").attr("src","./img/music1_stop.png");
    } else {
        myVideo.play();
        $(".music1").find("img").attr("src","./img/music1_play.png");
        var xVideo = document.getElementById("video2");
        xVideo.pause();
        $(".music2").find("img").attr("src","./img/music2_stop.png");
    }
}
function stop2(){
    var myVideo = document.getElementById("video2");
    if(!myVideo.paused){
        myVideo.pause();
        $(".music2").find("img").attr("src","./img/music2_stop.png");
    } else {
        myVideo.play();
        $(".music2").find("img").attr("src","./img/music2_play.png");
        var xVideo = document.getElementById("video1");
        xVideo.pause();
        $(".music1").find("img").attr("src","./img/music1_stop.png");
    }
}
function play(){
    var myVideo = document.getElementById("video1");
    myVideo.play();
    var myVideo2 = document.getElementById("video2");
    myVideo2.pause();
}
document.ontouchstart = function(e){
    if(isaoto ===0){
        play();
        isaoto = 1;
    }
};
setTimeout(play,100);
$('.music1').click(stop1);
$('.music2').click(stop2);
