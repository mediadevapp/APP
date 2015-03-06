    var selector = ".page";
    var loop = false;
    var images = [
        "./img/activity/1.jpg",
        "./img/activity/1-1.png",
        "./img/activity/1-16.png",
        "./img/activity/1-17.png",
        "./img/activity/1-18.png",
        "./img/activity/1-19.png",
        "./img/activity/1-2.png",
        "./img/activity/1-20.png",
        "./img/activity/1-21.png",
        "./img/activity/1-22.png",
        "./img/activity/1-23.png",
        "./img/activity/1-3.png",
        "./img/activity/1-4.png",
        "./img/activity/1-5.png",
        "./img/activity/1-6.png",
        "./img/activity/1-7.png"];
    function init(){

        init_all();

    }
	
    function init_layer1(){
        $(".layer1 .layer1-8").css({x:"-100%",opacity:0});
        $(".layer1 .layer1-9").css({x:"-100%",opacity:0});
        $(".layer1 .layer1-10").css({x:"-100%",opacity:0});
        $(".layer1 .layer1-11").css({x:"-100%",opacity:0});
        $(".layer1 .layer1-12").css({x:"-100%",opacity:0});
        $(".layer1 .layer1-13").css({x:"-100%",opacity:0});
        $(".layer1 .layer1-14").css({x:"-100%",opacity:0});
        $(".layer1 .layer1-15").css({x:"-100%",opacity:0});
        $(".layer1 .layer1-16").addClass('right');
        $(".layer1 .layer1-17").css({x:'-100%'});
        $(".layer1 .layer1-18").css({x:'-100%',opacity:0});
        $(".layer1 .layer1-19").css({y:'-100%',opacity:0});
        $(".layer1 .layer1-20").css({y:'-100%',opacity:0});
        $(".layer1 .layer1-21").css({y:'-100%',opacity:0});
        $(".layer1 .layer1-22").css({y:'-100%',opacity:0});

    }

    function layer1_in(){
        $(".layer1 .layer1-4").css({opacity:0,scale:0});
        $(".layer1 .layer1-5").css({opacity:0,scale:0});
        $(".layer1 .layer1-6").css({opacity:0,scale:0});
        $(".layer1 .layer1-17").transition({x:'0%'},300);
        $(".layer1 .layer1-18").transition({x:'0%',opacity:1},500);
        $(".layer1 .layer1-19").transition({y:'0%',opacity:1},400);
        $(".layer1 .layer1-20").delay(300).transition({y:'0%',opacity:1},400);
        $(".layer1 .layer1-21").delay(600).transition({y:'0%',opacity:1},400);
        $(".layer1 .layer1-22").delay(900).transition({y:'0%',opacity:1},400);
  

    }
    function init_all(index){
        if(typeof index != "undefined"){
            for(var i=1;i<=1;i++){
                if(i == index+1 || i == index-1){
                    eval("init_layer"+i+"();");
                }
            }
        }else{
            if( typeof init_layer1 == "function")init_layer1();
            if( typeof init_layer2 == "function")init_layer2();
        }
    }

    $(function(){
        var w = $(window).width(), h = $(window).height();
        $(".page").width(w).height(h);
        PreLoadImg(images,function(){
            $(".loadingCls").hide();
            mySwiper = $(".images").swiper({
                speed : 500 ,
				loop : true,
                resistance :false,
                releaseFormElements:true,
                simulateTouch: false,
                followFinger:false,
                noSwiping:true,
                noSwipingNext:true,
                noSwipingPrev:true
            });
            touch.on(".layer1 .layer1-18", 'swiperight', function(){
                $(".layer1 .layer1-18").transition({x:"320px"},1500,function(){
                    $(".layer1 .layer1-16").fadeOut(1);
                    $(".layer1 .layer1-17").fadeOut(1);

                    $(".layer1 .layer1-19").fadeOut(1);
                    $(".layer1 .layer1-20").fadeOut(1);
                    $(".layer1 .layer1-21").fadeOut(1);
                    $(".layer1 .layer1-22").fadeOut(1);
                    $(".layer1 .layer1-24").fadeOut(1);
                    
                    $(".layer1 .layer1-23").transition({y:'-110%'},400,function(){
                        $(".layer1 .layer1-4").transition({scale:1,opacity:1},500);
                        $(".layer1 .layer1-5").transition({scale:1,opacity:1},500,function(){
                            $(".layer1 .layer1-5").addClass("flush");
                        });
                        $(".layer1 .layer1-6").transition({scale:1,opacity:1},500);
                        $(".layer1 .layer1-8").delay(0).transition({x:'0%',opacity:1},500);
                        $(".layer1 .layer1-9").delay(300).transition({x:'0%',opacity:1},500);
                        $(".layer1 .layer1-10").delay(600).transition({x:'0%',opacity:1},500);
                        $(".layer1 .layer1-11").delay(900).transition({x:'0%',opacity:1},500);
                        $(".layer1 .layer1-12").delay(1200).transition({x:'0%',opacity:1},500);
                        $(".layer1 .layer1-13").delay(1500).transition({x:'0%',opacity:1},500);
                        $(".layer1 .layer1-14").delay(1800).transition({x:'0%',opacity:1},500);
                        $(".layer1 .layer1-15").delay(2100).transition({x:'0%',opacity:1},500);
                        $('#container1').hide();
                    });
                });
            });
			touch.on("#container2", 'swipeleft', function(){
				mySwiper.swipeNext();
			});
			touch.on("#container2", 'swiperight', function(){
				mySwiper.swipePrev();
			});
            init_all();
            setTimeout(function(){
                layer1_in();
            }, 500);

        });
        response.config({width:640, height:1138 });
        response.setBoxXCenter('#container1');
        response.setBoxXRight('#container2');
        response.setImageXCenter('.images .swiper-slide img');
    });