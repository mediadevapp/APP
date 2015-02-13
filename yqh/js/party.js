var selector = ".page";
    var loop = false;
    var images = [
            "./img/party/1.jpg",
            "./img/party/1-1.png",
            "./img/party/1-10.png",
            "./img/party/1-11.png",
            "./img/party/1-12.png",
            "./img/party/1-13.png",
            "./img/party/1-14.png",
            "./img/party/1-15.png",
            "./img/party/1-2.png",
            "./img/party/1-3.png",
            "./img/party/1-4.png",
            "./img/party/1-5.png",
            "./img/party/1-6.png",
            "./img/party/1-7.png",
            "./img/party/1-8.png",
            "./img/party/1-9.png"];

            
        function init(){

            init_all();

        }

        
            function init_layer1(){
                $(".layer1 .layer1-10").css({x:"100%",y:"-100%"});
                $(".layer1 .layer1-11").css({x:"-100%",y:"100%"});
                $(".layer1 .layer1-3").css({opacity:0,y:"100%"});
                $(".layer1 .layer1-5").css({x:"-100%"});
                $(".layer1 .layer1-6").css({x:"100%",y:"-100%"});
                $(".layer1 .layer1-7").css({x:"-100%",y:"-100%"});
                $(".layer1 .layer1-8").css({opacity:0,scale:0});
                $(".layer1 .layer1-9").css({x:"-100%",y:"100%"});
				$(".text1").css({x:"-80%",opacity:0});
				$(".text2").css({x:"-80%",opacity:0});
				$(".text3").css({x:"-80%",opacity:0});
				$(".text4").css({x:"-80%",opacity:0});
				$(".text5").css({x:"-80%",opacity:0});
				$(".text6").css({x:"-80%",opacity:0});
				$(".text7").css({x:"-80%",opacity:0});
            }

            function layer1_in(){
				$(".layer1 .layer1-9").delay(500).transition({x:'0',y:'0'},500);
                $(".layer1 .layer1-10").delay(500).transition({x:'0',y:'0'},500);
                $(".layer1 .layer1-11").transition({x:'0',y:'0'},1000);
                
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
function textIn(){
	$(".text1").delay(300 ).transition({opacity:1,x:'0%'},1000);
	$(".text2").delay(600 ).transition({opacity:1,x:'0%'},1000);
	$(".text3").delay(900 ).transition({opacity:1,x:'0%'},1000);
	$(".text4").delay(1200).transition({opacity:1,x:'0%'},1000);
	$(".text5").delay(1500).transition({opacity:1,x:'0%'},1000);
	$(".text6").delay(1800).transition({opacity:1,x:'0%'},1000);
	$(".text7").delay(0).transition({opacity:1,x:'0%'},1000);
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

            init_all();
            setTimeout(function(){
                layer1_in();
            }, 500);
			touch.on(".next", 'tap', function(){
				$(".layer1 .layer1-14").transition({rotate:'8deg'},300);
				$(".layer1 .layer1-15").transition({rotate:'-8deg'},300,function(){
				$(".layer1 .layer1-9").delay(0).transition({x:"-100%",y:"100%"},400);
					$(".layer1 .layer1-10").delay(0).transition({x:"100%",y:"-100%"},400);
					$(".layer1 .layer1-11").transition({x:"-100%",y:"100%"},800,function(){
						$(".layer1 .layer1-5").delay(0).transition({x:'0',y:'0'},1000);
						$(".layer1 .layer1-6").delay(300).transition({x:'0',y:'0'},1000);
						$(".layer1 .layer1-7").delay(600).transition({x:'0',y:'0'},1000,function(){});
						$(".layer1 .layer1-16").delay(1100).fadeOut(500,function(){
							$(".layer1 .layer1-3").transition({y:'0%',opacity:1},900);
							$(".layer1 .layer1-8").transition({scale:1,opacity:1},900).transition({scale:1.1},200).transition({scale:1},200).transition({scale:1.1},200).transition({scale:1},200).transition({scale:1.1},200).transition({scale:1},200);
                            $('#container1').fadeOut();
							textIn();
						});
						
					});

					$(".next").animate({scale:0},800);
					$(".layer1 .layer1-17").transition({scale:8},1000,function(){$(this).fadeOut();});
				});
				
			});
        });
    touch.on(document,'swipeleft',function(){
        mySwiper.swipeNext();
    });
    touch.on(document,'swiperight',function(){
        mySwiper.swipePrev();
    });
    response.config({
        width:640,
        height:1138
    });
    response.setBoxXCenter('#container1');
    // response.setTop(".layer1-16");
    });