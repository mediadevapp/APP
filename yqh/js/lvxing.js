 var selector = ".page";
 var con_plan = 1;
 var con_up = 1;
    var loop = false;
    var images = [
            "./img/lvxing/1.jpg",
            "./img/lvxing/1-1.png",
            "./img/lvxing/1-10.png",
            "./img/lvxing/1-11.png",
            "./img/lvxing/1-12.png",
            "./img/lvxing/1-13.png",
            "./img/lvxing/1-14.png",
            "./img/lvxing/1-15.png",
            "./img/lvxing/1-16.png",
            "./img/lvxing/1-17.png",
            "./img/lvxing/1-2.png",
            "./img/lvxing/1-3.png",
            "./img/lvxing/1-4.png",
            "./img/lvxing/1-5.png",
            "./img/lvxing/1-6.png",
            "./img/lvxing/1-7.png",
            "./img/lvxing/1-8.jpg",
            "./img/lvxing/1-9.png"];

            
        function init(){

            init_all();

        }

        
            function init_layer1(){
				var w_14 = $(".layer1 .layer1-14").width();
				var h_14 = $(".layer1 .layer1-14").height();
                $(".layer1 .layer1-1").css({opacity:0,y:'-80px'});
                $(".layer1 .text2").css({opacity:0,y:'-80px'});
                $(".layer1 .text3").css({opacity:0,y:'-80px'});
                $(".layer1 .text4").css({opacity:0,y:'-80px'});
                $(".layer1 .text5").css({opacity:0,y:'-80px'});
                $(".layer1 .text6").css({opacity:0,y:'-80px'});
                $(".layer1 .text7").css({opacity:0,y:'-80px'});
                $(".layer1 .text1").css({opacity:0,y:'-20px'});
                $(".layer1 .layer1-14").css({clip:'rect(0px,'+w_14+'px,'+h_14+'px,0px)',opacity:0});
                $(".layer1 .layer1-15").css({y:'2600%',scale:0,opacity:0});
                $(".layer1 .layer1-16").css({y:'90%',opacity:0});
                $(".layer1 .layer1-3").css({opacity:0});
                $(".layer1 .layer1-4").css({y:'10px',opacity:0});
                $(".layer1 .layer1-5").css({scale:0,y:'10px',opacity:0});
                $(".layer1 .layer1-6").css({y:'-10px',opacity:0});
                $(".layer1 .layer1-7").css({scale:0,opacity:0});
                $(".layer1 .layer1-8a").css({y:'-100%'});
                $(".layer1 .layer1-8b").css({y:'-200%'});
                $(".layer1 .layer1-8c").css({y:'-300%'});
                $(".layer1 .layer1-9").css({transform:'scale(0)',opacity:0});
            }
			function plan(){
				if(con_plan == 1){
			
				$(".layer1 .layer1-10").addClass('flush2');
                $(".layer1 .layer1-11").delay(200).transition({scale:0,opacity:0},500);
                $(".layer1 .layer1-12").delay(500).transition({scale:0,opacity:0},500);
				$(".layer1 .layer1-13").delay(800).transition({scale:0,opacity:0},500,function(){
					$(".layer1 .layer1-11").delay(200).transition({scale:1,opacity:1},500);
					$(".layer1 .layer1-12").delay(500).transition({scale:1,opacity:1},500);
					$(".layer1 .layer1-13").delay(800).transition({scale:1,opacity:1},500,function(){plan();});
				});
				}
			}
			function nextUping(){
				$(".layer1 .layer1-8").transition({y:'300%'},1600);
				$(".layer1 .layer1-8a").transition({y:'200%'},1600);
				$(".layer1 .layer1-8b").transition({y:'100%'},1600);
				$(".layer1 .layer1-8c").transition({y:'0%'},1600);
				var hh = $(".layer1 .layer1-8").height();
				con_plan = 0;
				if(con_up == 1){
					con_up = 0;
					$(".layer1 .layer1-10").removeClass('flush2').transition({y:"0%"},100);
					$(".layer1 .layer1-11").stop(1).transition({y:"0%",scale:1,opacity:1},100);
					$(".layer1 .layer1-12").stop(1).transition({y:"0%",scale:1,opacity:1},100);
					$(".layer1 .layer1-13").stop(1).transition({y:"0%",scale:1,opacity:1},110,function(){
						$(".layer1 .layer1-10").animate({y:-hh*0.75+'px'},1200);
						$(".layer1 .layer1-11").animate({y:-hh*0.75+'px'},1200);
						$(".layer1 .layer1-12").animate({y:-hh*0.75+'px'},1200);
						$(".layer1 .layer1-13").animate({y:-hh*0.75+'px'},1200);
					});
					$(".layer1 .layer1-14").delay(400).transition({opacity:0,scale:0},400);
					$(".layer1 .layer1-15").delay(400).transition({opacity:0,scale:0},400);
					$(".layer1 .layer1-16").delay(400).transition({opacity:0,scale:0},400);
					$(".layer1 .layer1-9").delay(800).transition({opacity:0,scale:0},400);
					$(".layer1 .layer1-17").delay(1200).transition({opacity:0,scale:0},400,function(){nextIn();});
				}
			}
			function nextIn(){
				var w_4 = $(".layer1 .layer1-4").width();
				var h_4 = $(".layer1 .layer1-4").height();
				$(".layer1 .layer1-7").transition({scale:1,opacity:1},800).addClass('flush');
				$(".layer1 .layer1-3").delay(200).transition({opacity:1},1000);
				$(".layer1 .layer1-1").transition({opacity:1,y:'0px'},800);
                $(".layer1 .text2").transition({opacity:1,y:'0px'},800);
                $(".layer1 .text3").transition({opacity:1,y:'0px'},800);
                $(".layer1 .text4").transition({opacity:1,y:'0px'},800);
                $(".layer1 .text5").transition({opacity:1,y:'0px'},800);
                $(".layer1 .text6").transition({opacity:1,y:'0px'},800);
                $(".layer1 .text7").transition({opacity:1,y:'0px'},800,function(){
					$(".layer1 .text1").transition({opacity:1,y:'0px'},800);
					$(".layer1 .layer1-5").transition({scale:1,opacity:1},600).delay(600).transition({y:'0%'},800);
					$(".layer1 .layer1-4").delay(600).transition({y:'0%',opacity:1},600,'easeOutBack').transition({clip:'rect(0px,'+w_4+'px,'+0.8*h_4+'px,0px)'},1200);
					$(".layer1 .layer1-6").delay(1800).transition({y:'0%',opacity:1},600,'easeOutBack');
				});
				
			}
            function layer1_in(){
				var w_14 = $(".layer1 .layer1-14").width();
				var h_14 = $(".layer1 .layer1-14").height();
                $(".layer1 .layer1-14").delay(400).transition({opacity:1},600);
                $(".layer1 .layer1-15").delay(700).transition({scale:1,opacity:1},600);
                $(".layer1 .layer1-16").delay(1000).transition({opacity:1},600,function(){
					$(".layer1 .layer1-14").transition({clip:'rect(0px,'+w_14+'px,'+h_14*0.745+'px,0px)'},600);
					$(".layer1 .layer1-15").transition({y:'0'},600);
					$(".layer1 .layer1-16").transition({y:'0'},600,function(){
						
					});
				});
				plan();
                $(".layer1 .layer1-9").transition({scale:1,opacity:1},800);
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
			touch.on(".layer1 .layer1-9", "swipeleft", function(){
				$(".layer1 .layer1-9").transition({scale:0,opacity:0},400);	
				mySwiper.swipeNext();
				$(".layer1 .layer1-9").transition({scale:1,opacity:1},400);	
			});
			touch.on(".layer1 .layer1-9", "swiperight", function(){
				$(".layer1 .layer1-9").transition({scale:0,opacity:0},400);
				mySwiper.swipePrev();
				$(".layer1 .layer1-9").transition({scale:1,opacity:1},400);	
			});
			touch.on(".layer1 .layer1-10", "swipeup", function(){
				nextUping();
			});
			
		
        });
    });
