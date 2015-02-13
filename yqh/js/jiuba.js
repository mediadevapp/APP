    var selector = ".page";
    var loop = false;
    var images = [
            "./img/jiuba/1.jpg",
            "./img/jiuba/1-1.png",
            "./img/jiuba/1-10.png",
            "./img/jiuba/1-11.png",
            "./img/jiuba/1-12.png",
            "./img/jiuba/1-13.png",
            "./img/jiuba/1-14.png",
            "./img/jiuba/1-15.png",
            "./img/jiuba/1-16.png",
            "./img/jiuba/1-2.png",
            "./img/jiuba/1-3.png",
            "./img/jiuba/1-4.png",
            "./img/jiuba/1-5.png",
            "./img/jiuba/1-6.png",
            "./img/jiuba/1-7.png",
            "./img/jiuba/1-8.png",
            "./img/jiuba/meng.png",
            "./img/jiuba/1-9.jpg"];

            
        function init(){

            init_all();

        }

        
            function init_layer1(){
				var w = $(".layer1 .layer1-8").width();
				var h = $(".layer1 .layer1-8").height();
                $(".layer1 .layer1-1").css({opacity:0,y:'-100%'});
                $(".layer1 .layer1-1s").css({opacity:0,y:'-100%'});
                $(".layer1 .layer1-3").css({scale:0});
                $(".layer1 .layer1-4").css({opacity:0});
                $(".layer1 .layer1-5").css({opacity:0});
                $(".layer1 .layer1-6").css({opacity:0});
                $(".layer1 .layer1-8").css({clip:'rect(0px,0px,'+h+'px,0px)'});
                setTimeout(function(){$(".layer1 .layer1-10").addClass('huang');},500)
                setTimeout(function(){$(".layer1 .layer1-11").addClass('huang');},200)
                $(".layer1 .layer1-14").css({opacity:0});
				$(".text1").css({x:"-100%",opacity:0});
				$(".text2").css({y:"-80%",opacity:0});
				$(".text3").css({y:"-80%",opacity:0});
				$(".text4").css({y:"-80%",opacity:0});
				$(".text5").css({y:"-80%",opacity:0});
				$(".text6").css({y:"-80%",opacity:0});
				$(".text7").css({y:"-80%",opacity:0});
            }

            function layer1_in(){

                $(".layer1 .layer1-14").transition({opacity:1},200).transition({opacity:0},200).transition({opacity:1},200).transition({opacity:0},200).transition({opacity:1},200);
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
            var mySwiper = $(".images").swiper({
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

            init_all();
            setTimeout(function(){
                layer1_in();
            }, 500);

			touch.on(".layer1 .layer1-16", "tap", function(){
				mySwiper.swipeNext();
			});
			touch.on(".layer1 .layer1-15", "tap", function(){
				mySwiper.swipePrev();
			});
			touch.on(".layer1 .layer1-13", "tap", function(){
				var w = $(".layer1 .layer1-8").width();
				var h = $(".layer1 .layer1-8").height();
				$(".layer1 .layer1-14").fadeOut(1);
				$(".layer1 .layer1-15").fadeOut(1);
				$(".layer1 .layer1-16").fadeOut(1);
				$(".page2").delay(400).fadeOut(400);
				$(".layer1 .layer1-10").removeClass('huang').transition({scale:5},1200);
                $(".layer1 .layer1-11").removeClass('huang').delay(400).transition({scale:10,opacity:0},1200);
                $(".layer1 .layer1-12").removeClass('huang').delay(400).transition({scale:10,opacity:0},1200);
                $(".layer1 .layer1-3").delay(600).transition({scale:1},600,function(){
					$(".layer1 .layer1-8").transition({clip:'rect(0px,'+w+'px,'+h+'px,'+0.8*w+'px)'},1000).transition({clip:'rect(0px,'+0.3*w+'px,'+h+'px,'+0*w+'px)'},800).transition({clip:'rect(0px,'+w+'px,'+h+'px,'+w+'px)'},600).transition({clip:'rect(0px,'+w+'px,'+h+'px,0px)'},600);
					$(".layer1 .layer1-1").transition({y:'0%',opacity:1},800);
					$(".layer1 .layer1-1s").transition({y:'0%',opacity:1},800).addClass("flush2");
					$(".layer1 .layer1-4").delay(0).transition({opacity:1},200).transition({opacity:0},200).transition({opacity:1},200).transition({opacity:0},200).transition({opacity:1},200);
					$(".layer1 .layer1-5").delay(500).transition({opacity:1},200).transition({opacity:0},200).transition({opacity:1},200).transition({opacity:0},200).transition({opacity:1},200);
					$(".layer1 .layer1-6").delay(1000).transition({opacity:1},200).transition({opacity:0},200).transition({opacity:1},200).transition({opacity:0},200).transition({opacity:1},200);
					$(".text1").transition({x:'0%',opacity:1},1000);
					$(".text2").delay(200).transition({y:'0%',opacity:1},1000);
					$(".text3").delay(400).transition({y:'0%',opacity:1},1000);
					$(".text4").delay(600).transition({y:'0%',opacity:1},1000);
					$(".text5").delay(800).transition({y:'0%',opacity:1},1000);
					$(".text6").delay(1000).transition({y:'0%',opacity:1},1000);
					$(".text7").delay(1200).transition({y:'0%',opacity:1},1000);
				});
				
			});
        });
    response.config({
        width:640,
        height:1138
    });
    response.setBoxResponse('#container1,#container2');
    });