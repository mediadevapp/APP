 var selector = ".page";
    var loop = false;
    var images = [
            "./img/one-piece/1.jpg",
            "./img/one-piece/1-1.png",
            "./img/one-piece/1-10.png",
            "./img/one-piece/1-11.png",
            "./img/one-piece/1-12.png",
            "./img/one-piece/1-13.png",
            "./img/one-piece/1-14.png",
            "./img/one-piece/1-15.png",
            "./img/one-piece/1-16.png",
            "./img/one-piece/1-2.png",
            "./img/one-piece/1-3.png",
            "./img/one-piece/1-4.png",
            "./img/one-piece/1-5.png",
            "./img/one-piece/1-6.png",
            "./img/one-piece/1-7.png",
            "./img/one-piece/1-8.jpg",
            "./img/one-piece/1-9.png"];

            
        function init(){

            init_all();

        }

			function nextIn(){
			$(".layer1 .layer1-3").delay(0).transition({scale:1,opacity:1},800,'easeOutBack');
			$(".layer1 .layer1-4").delay(200).transition({scale:1,opacity:1},800,'easeOutBack');
			$(".layer1 .layer1-5").delay(400).transition({scale:1,opacity:1},800,'easeOutBack');
			$(".layer1 .layer1-6").delay(600).transition({scale:1,opacity:1},800,'easeOutBack');
			$(".layer1 .layer1-7").delay(800).transition({scale:1,opacity:1},800,'easeOutBack');
			$(".layer1 .text2").delay(200).transition({x:'0%',opacity:1},400);
			$(".layer1 .text3").delay(400).transition({x:'0%',opacity:1},400);
			$(".layer1 .text4").delay(600).transition({x:'0%',opacity:1},400);
			$(".layer1 .text5").delay(800).transition({x:'0%',opacity:1},400);
			$(".layer1 .text6").delay(1000).transition({x:'0%',opacity:1},400);
			$(".layer1 .text7").delay(1200).transition({x:'0%',opacity:1},400);
			$(".layer1 .text1").delay(1400).transition({opacity:1},100).transition({opacity:0},100).transition({opacity:1},100).transition({opacity:0},100).transition({opacity:1},100).transition({opacity:0},100).transition({opacity:1},100);
			}
            function init_layer1(){
                $(".layer1 .layer1-3").css({scale:0,opacity:0});
                $(".layer1 .layer1-4").css({scale:0,opacity:0});
                $(".layer1 .layer1-5").css({scale:0,opacity:0});
                $(".layer1 .layer1-6").css({scale:0,opacity:0});
                $(".layer1 .layer1-7").css({scale:0,opacity:0});
                $(".layer1 .layer1-10").css({x:'-100%'});
                $(".layer1 .layer1-11").css({y:'-40',opacity:0});
                $(".layer1 .layer1-12").css({y:'-40',opacity:0});
                $(".layer1 .layer1-13").css({y:'-40',opacity:0});
                $(".layer1 .layer1-14").css({scale:0,opacity:0});
                $(".layer1 .layer1-15").css({transformOrigin:'50% 0%'});
                $(".layer1 .layer1-16").css({transformOrigin:'50% 100%'});
			    $(".layer1 .text2").css({x:'-80%',opacity:0});
                $(".layer1 .text3").css({x:'-80%',opacity:0});
                $(".layer1 .text4").css({x:'-80%',opacity:0});
                $(".layer1 .text5").css({x:'-80%',opacity:0});
                $(".layer1 .text6").css({x:'-80%',opacity:0});
                $(".layer1 .text7").css({x:'-80%',opacity:0});
                $(".layer1 .text1").css({opacity:0});
            }

            function layer1_in(){
                $(".layer1 .layer1-10").transition({x:'0%'},600);
                $(".layer1 .layer1-11").delay(600).transition({y:'0%',opacity:1},600,'easeOutBack');
                $(".layer1 .layer1-12").delay(800).transition({y:'0%',opacity:1},600,'easeOutBack');
                $(".layer1 .layer1-13").delay(1000).transition({y:'0%',opacity:1},600,'easeOutBack');
                $(".layer1 .layer1-14").delay(800).transition({scale:1,opacity:1},600);;
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
			touch.on(".layer1 .layer1-1", "swipeleft", function(){
				mySwiper.swipeNext();
			});
			touch.on(".layer1 .layer1-1", "swiperight", function(){
				mySwiper.swipePrev();
			});

			touch.on(".page1", "swipeup", function(){
				$('.layer1 .layer1-8').fadeOut(1);
				$('.page1').fadeOut(1);
				$('.layer1 .layer1-15').transition({y:'-100%',opacity:0.5},1200,function(){$(this).fadeOut();});
				$('.layer1 .layer1-16').transition({y:'100%',opacity:0.5},1200,function(){$(this).fadeOut();});
				nextIn();
			});
        });
    });
