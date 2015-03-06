    var selector = ".page";
    var loop = false;
    var images = [
    "./img/ktv/1.jpg",
    "./img/ktv/1-1.png",
    "./img/ktv/1-2.png",
    "./img/ktv/1-3.png",
    "./img/ktv/1-4.png",
    "./img/ktv/1-5.png",
    "./img/ktv/1-6.png",
    "./img/ktv/1-7.png",
    "./img/ktv/2.jpg",
    "./img/ktv/2-1.png",
    "./img/ktv/2-2.png"];

    $('.layer2').css({scale:3});
    $('.groupa p').css({opacity:0,y:'-20%'});
    $('.layer2-3').css({y:'-100%',opacity:0});
    $('.groupb p').css({opacity:0,y:'20%'});


    $(function(){
        var w = $(window).width(), h = $(window).height();
        $(".page").width(w).height(h);
        PreLoadImg(images,function(){
            $(".loadingCls").hide();
            setTimeout(function(){

            },500);
        });

        touch.on('.layer1-5','tap',function(){
            $('.layer1-2').addClass('tada2');
            setTimeout(function(){
                $('.layer1-6').transition({scale:20},function(){
                    $('.layer1').transition({opacity:0},function(){$(this).hide(); });
                    $('.layer2').transition({scale:1},function(){
                        $('.layer2-3').transition({y:'0%',opacity:1}, function(){
                            $('.groupa p').transition({opacity:1,y:'0%'}, function(){
                                $('.groupb p').each(function(i){
                                    $(this).delay(i*150).transition({opacity:1,y:'0%'},function(){
                                        $('.layer2-4').addClass('heartbeat');
                                    });
                                });
                            });
                        });
                    });
                });
            },1000);
            
        });
        
        response.config({
            width:640,
            height:1138
        });
        response.setBoxResponse('#container1,#container2');
    });