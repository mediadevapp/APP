    var selector = ".page";
    var loop = false;
    var images = [
            "./img/luntan2/1.jpg",
            "./img/luntan2/1-1.png",
            "./img/luntan2/1-10.png",
            "./img/luntan2/1-11.png",
            "./img/luntan2/1-12.png",
            "./img/luntan2/1-13.png",
            "./img/luntan2/1-14.png",
            "./img/luntan2/1-15.png",
            "./img/luntan2/1-2.png",
            "./img/luntan2/1-3.png",
            "./img/luntan2/1-4.png",
            "./img/luntan2/1-6.png",
            "./img/luntan2/1-7.png",
            "./img/luntan2/1-8.png",
            "./img/luntan2/1-9.png"];

            
        function init(){

            init_all();

        }

        
            function init_layer1(){
                var h_7 = $(".layer1 .layer1-7").height();
				h_7 *= 0.325;
				$(".layer1 .layer1-1");
                $(".layer1 .layer1-11").css({opacity:0,scale:0});
                $(".layer1 .layer1-12").css({opacity:0,scale:0});
                $(".layer1 .layer1-3").css({transformOrigin:'50% 100%',opacity:0,scale:0});
                $(".layer1 .layer1-4").css({transformOrigin:'50% 0%',opacity:0,scale:0});
                $(".layer1 .layer1-6").css({transformOrigin:'50% 100%',opacity:0,scale:0});
                $(".layer1 .layer1-7").css({y:-h_7+'px',scale:0,opacity:0});
                $(".layer1 .layer1-8").css({y:-h_7+'px',opacity:0});
                $(".layer1 .layer1-9").css({y:-h_7+'px',x:'100%'}); 
			   $(".layer1 .layer1-10").css({y:-h_7+'px',opacity:0});
			    $(".layer1 .text2").css({opacity:0,x:'-80px'});
                $(".layer1 .text3").css({opacity:0,x:'-80px'});
                $(".layer1 .text4").css({opacity:0,x:'-80px'});
                $(".layer1 .text5").css({opacity:0,x:'-80px'});
                $(".layer1 .text6").css({opacity:0,x:'-80px'});
                $(".layer1 .text7").css({opacity:0,x:'-80px'});
                $(".layer1 .text1").css({opacity:0});
            }

            function layer1_in(){
                $(".layer1 .layer1-13").delay(1500).transition({scale:1.2},20000);
                $(".layer1 .layer1-14");
                $(".layer1 .layer1-15").delay(1500).transition({scale:0.7},20000);
                $(".layer1 .layer1-7").delay(1000).transition({opacity:1,scale:1},500);
                $(".layer1 .layer1-8").delay(1500).transition({opacity:1},100).transition({opacity:0},100).transition({opacity:1},100).transition({opacity:0},100).transition({opacity:1},100).transition({opacity:0},100).transition({opacity:1},100);
                $(".layer1 .layer1-9").transition({x:'0%'},500);
				$(".layer1 .layer1-10").transition({y:'+=20%'},500).transition({y:'-=20%',opacity:1},500);
            }
			function nextIn(){
				$(".layer1 .layer1-7").transition({y:'0px'},500);
                $(".layer1 .layer1-8").transition({y:'0px'},500);
                $(".layer1 .layer1-9").transition({y:'0px'},500); 
			   $(".layer1 .layer1-10").transition({y:'0px'},500);
			   $(".layer1 .layer1-11").delay(1000).transition({opacity:1,scale:1},500);
			   $(".layer1 .layer1-12").delay(1000).transition({opacity:1,scale:1},500);
			   $(".layer1 .layer1-14").transition({scale:0,opacity:0},500);
			   $(".layer1 .layer1-3").delay(300).transition({scale:1,opacity:1},800);
			   $(".layer1 .layer1-6").delay(700).transition({scale:1,opacity:1},800);
			   $(".layer1 .layer1-4").delay(100).transition({scale:1,opacity:1},800);
			   $(".layer1 .text2").delay(300).transition({x:'0px',opacity:1},500);
			   $(".layer1 .text3").delay(300).transition({x:'0px',opacity:1},500);
			   $(".layer1 .text4").delay(300).transition({x:'0px',opacity:1},500);
			   $(".layer1 .text5").delay(500).transition({x:'0px',opacity:1},500);
			   $(".layer1 .text6").delay(500).transition({x:'0px',opacity:1},500);
			   $(".layer1 .text7").delay(500).transition({x:'0px',opacity:1},500);
			   $(".layer1 .text1").delay(300).transition({opacity:1},100).transition({opacity:0},100).transition({opacity:1},100).transition({opacity:0},100).transition({opacity:1},100).transition({opacity:0},100).transition({opacity:1},100).transition({opacity:0},100).transition({opacity:1},100);
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
			touch.on(".layer1 .layer1-7", "swipeleft", function(){
				mySwiper.swipeNext();
			});
			touch.on(".layer1 .layer1-7", "swiperight", function(){
				mySwiper.swipePrev();
			});
			touch.on(".layer1 .layer1-12", "click", function(){
				mySwiper.swipeNext();
			});
			touch.on(".layer1 .layer1-11", "click", function(){
				mySwiper.swipePrev();
			});
			touch.on(".layer1 .layer1-14", "click", function(){
				nextIn();
			});
        });
    });
