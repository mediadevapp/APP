    var selector = ".page";
    var loop = false;
    var images = [
    "./img/recital/1.jpg",
    "./img/recital/1-1.png",
    "./img/recital/1-2.png",
    "./img/recital/1-3.png",
    "./img/recital/1-4.png",
    "./img/recital/1-5.jpg",
    "./img/recital/1-6.png",
    "./img/recital/1-7.png",
    "./img/recital/2.jpg",
    "./img/recital/2-1.png",
    "./img/recital/2-2.png"];

    $('.layer1-4,.layer1-3').css({x:'-100%',opacity:0});
    $('.layer1-2').css({x:'100%',opacity:0});
    $('.layer1-7,.layer1-6').css({opacity:0,display:'none'});
    $('.layer1-5 .layer').css('boxShadow','#000000 1px 1px 5px');
    $('.layer2-2,.layer2-1').css({y:'-100%',opacity:0});
    $('.layer2-3').css({y:'100%'});

    $(function(){
        var w = $(window).width(), h = $(window).height();
        $(".page").width(w).height(h);
        PreLoadImg(images,function(){
            $(".loadingCls").hide();
            setTimeout(function(){
                $('.layer1-5').transition({x:'-5%'},1000,'linear',function(){});
                $('.layer1-5 .layer').each(function(i){
                    $(this).transition({x:-(i*5)+'%'},1000,'linear');
                });
                $('.layer1-4').delay(500).transition({x:'0%', opacity:1}, 500, function(){
                    $('.layer1-2').transition({x:'0%',opacity:1}, 500, function(){
                        $('.layer1-3').transition({x:'0%',opacity:1}, 500,function(){
                            $('.layer1-6').css({display:'block'}).transition({opacity:1}, 500, function(){
                                $(".layer1-7").css({display:'block'}).transition({opacity:1}, 500);
                            });
                        });
                    });
                });
            },500);
        });
        touch.on('.layer1-7,.layer1-6','swipe',function(){
            $('.layer1-7').removeClass('cut1').transition({top: '39.54%', left: '94.41%',opacity:0.5},800,function(){
                $(this).fadeOut();
                $('.layer1').transition({opacity:0,scale:1.5},800,function(){
                    $(this).hide();
                    $('.layer2-2,.layer2-1').transition({opacity:1,y:'0%'}, 500);
                    $('.layer2-3').transition({opacity:1,y:'0%'}, 500);
                });    
            });
        });
        touch.on('.accept_cut,#accept','swipe',function(){
            $('.accept_cut').removeClass('cut2').transition({x:'250px',opacity:0},800,function(){
                $("#accept").transition({height:'30px',background:'#ddd'}, 500, function(){
                   $(this).find('span').transition({scale:1,opacity:1}).addClass('flush'); 
                });
            });
        });
        response.config({
            width:640,
            height:1138
        });
        response.setBoxResponse('#container1,#container2');
    });