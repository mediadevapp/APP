    var selector = ".page";
    var loop = false;
    var images = [
            "./img/hunli1/1.jpg",
            "./img/hunli1/1-1.png",
            "./img/hunli1/1-10.png",
            "./img/hunli1/1-11.png",
            "./img/hunli1/1-12.png",
            "./img/hunli1/1-13.png",
            "./img/hunli1/1-14.jpg",
            "./img/hunli1/1-2.png",
            "./img/hunli1/1-3.png",
            "./img/hunli1/1-4.png",
            "./img/hunli1/1-5.png",
            "./img/hunli1/1-6.png",
            "./img/hunli1/1-7.png",
            "./img/hunli1/1-8.png",
            "./img/hunli1/1-9.jpg"];

            
        function init(){

            init_all();

        }

        
            function init_layer1(){
				var w = $(".layer1 .layer1-13").width();
				var h = $(".layer1 .layer1-13").height();
                $(".layer1 .layer1-1");
				$(".layer1 .layer1-2");
                $(".layer1 .layer1-3");
                $(".layer1 .layer1-4");
                $(".layer1 .layer1-5").css({opacity:0,scale:0});
                $(".layer1 .layer1-6");
                $(".layer1 .layer1-7");
                $(".layer1 .layer1-8");
                $(".layer1 .layer1-9");
				$(".layer1 .layer1-14");
                $(".layer1 .layer1-10").css({opacity:0,scale:0});
                $(".layer1 .layer1-11").css({y:'80%',opacity:0});
                $(".layer1 .layer1-12").css({y:'-80%',opacity:0});
                $(".layer1 .layer1-13").css({clip:"rect(0px,"+w*0.75+"px,"+h+"px,0px)"});
				$(".text1").css({y:"100%",opacity:0});
				$(".text2").css({y:"-80%",opacity:0});
				$(".text3").css({y:"-80%",opacity:0});
				$(".text4").css({y:"-80%",opacity:0});
				$(".text5").css({y:"-80%",opacity:0});
				$(".text6").css({y:"-80%",opacity:0});
				$(".text7").css({y:"-80%",opacity:0});
               
            }

            function layer1_in(){
                $(".layer1 .layer1-1");
                $(".layer1 .layer1-10").transition({scale:1,opacity:1},800);
                $(".layer1 .layer1-11").transition({y:'0px',opacity:1},500);
                $(".layer1 .layer1-12").transition({y:'0px',opacity:1},500);
                $(".layer1 .layer1-13");
                $(".layer1 .layer1-14");
                $(".layer1 .layer1-2");
                $(".layer1 .layer1-3");
                $(".layer1 .layer1-4");
                $(".layer1 .layer1-5");
                $(".layer1 .layer1-6");
                $(".layer1 .layer1-7");
                $(".layer1 .layer1-8");
                $(".layer1 .layer1-9");
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

			touch.on(".layer1 .layer1-4", "tap", function(){
				mySwiper.swipeNext();
			});
			touch.on(".layer1 .layer1-3", "tap", function(){
				mySwiper.swipePrev();
			});
			touch.on(".layer1 .layer1-13", 'swiperight', function(){
				var w = $(".layer1 .layer1-13").width();
				var h = $(".layer1 .layer1-13").height();
				$(".layer1 .layer1-13").removeClass("flush").transition({x:'80%',clip:"rect(0px,"+w+"px,"+h+"px,0px)"},800,function(){
					$(this).hide();
					$(".layer1 .layer1-10").hide();
					$(".layer1 .layer1-11").hide();
					$(".layer1 .layer1-12").hide();
					$(".layer1 .layer1-14").transition({y:'110%'},1000);
					$(".layer1 .layer1-9").transition({y:'-110%'},1000,function(){
						$(".layer1 .layer1-5").delay(1800).transition({opacity:1,scale:1},800);
						$(".text1").transition({opacity:1,y:'0%'},800);
						$(".text2").delay(0 ).transition({opacity:1,y:'0%'},800);
						$(".text3").delay(300 ).transition({opacity:1,y:'0%'},800);
						$(".text4").delay(600).transition({opacity:1,y:'0%'},800);
						$(".text5").delay(900).transition({opacity:1,y:'0%'},800);
						$(".text6").delay(1200).transition({opacity:1,y:'0%'},800);
						$(".text7").delay(1500).transition({opacity:1,y:'0%'},800);
					});
				});
			});
        });
    response.config({
        width:640,
        height:1138
    });
    response.setBoxResponse('#container1');
    });
