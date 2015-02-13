 var selector = ".page";
    var loop = false;
	var con_bai = 1;
    var images = [
            "./img/sports/1.jpg",
            "./img/sports/1-1.png",
            "./img/sports/1-2.png",
            "./img/sports/1-3.png",
            "./img/sports/1-4.png",
            "./img/sports/1-5.png",
            "./img/sports/1-6.jpg",
            "./img/sports/1-7.png",
            "./img/sports/1-7s.png",
            "./img/sports/1-8.png"];

            
        function init(){

            init_all();

        }

			function yuangui(selecter){
				var h = $(selecter).height();
				var w = $(selecter).width();
				var t = $(selecter).offset().top;
				var offset = h-w;
				t += offset/2;
				$(selecter).css({top:t+'px'});
				$(selecter).height(w+'px');
			}

            function init_layer1(){
                $(".layer1 .layer1-1").css({opacity:0,scale:0});
                $(".layer1 .layer1-2").css({opacity:0,scale:0});
                $(".layer1 .layer1-3").css({opacity:0,scale:0});
                $(".layer1 .layer1-4").css({opacity:0,scale:0});
                $(".layer1 .layer1-4s").css({opacity:0,scale:0});
			    $(".layer1 .text1").css({x:'-100%'});
			    $(".layer1 .text2").css({x:'-100%'});
                $(".layer1 .text3").css({x:'-100%'});
                $(".layer1 .text4").css({x:'-100%'});
                $(".layer1 .text5").css({x:'-100%'});
                $(".layer1 .text6").css({x:'-100%'});
                $(".layer1 .text7").css({x:'-100%'});
                $(".layer1 .text1").css({x:'-100%'});
                yuangui(".layer1 .layer1-7");
                yuangui(".layer1 .layer1-7s");
            }
			
            function layer1_in(){
				zhongbai(".layer1 .layer1-8");
            }
			function zhongbai(selecter){
				if(con_bai==1){
				$(selecter).transition({rotate:'45deg'},500,'easeOutQuart').transition({rotate:'0deg'},500,'easeInQuart').transition({rotate:'-45deg'},500,'easeOutQuart').transition({rotate:'0deg'},500,'easeInQuart',function(){zhongbai(selecter)});
				}
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
			touch.on(".layer1 .layer1-3", "swipeleft", function(){
				$(".layer1 .layer1-2").transition({rotateY:'-90deg'},300);
				mySwiper.swipeNext();
				$(".layer1 .layer1-2").transition({rotateY:'0deg'},300);
			});
			touch.on(".layer1 .layer1-3", "swiperight", function(){
				$(".layer1 .layer1-2").transition({rotateY:'90deg'},300);
				mySwiper.swipePrev();
				$(".layer1 .layer1-2").transition({rotateY:'0deg'},300);
			});
			touch.on('.layer1 .layer1-7s,.layer1 .layer1-8', "swipe", function(){
				con_bai=0;
				$('.layer1 .layer1-8').stop();
				var h = $('.layer1 .layer1-8').height();
				$('.layer1 .layer1-8').transition({clip:'rect('+0.6*h+'px,auto,auto,auto)',y:'-260%'},800);
				setTimeout(function(){
					$('.layer1 .layer1-8').fadeOut(50);
					$('.layer1 .layer1-7').transition({scale:6},800).fadeOut(100);
					$('.layer1 .layer1-7s').transition({scale:0,opacity:0},800);
					$('.layer1 .layer1-6').transition({scale:5,opacity:0},800).fadeOut();
					$('.layer1 .layer1-1').delay(400).transition({scale:1,opacity:1},800);
					$('.layer1 .layer1-2').delay(700).transition({scale:1,opacity:1},800);
					$('.layer1 .layer1-3').delay(700).transition({scale:1,opacity:1},800);
					$(".layer1 .text1").delay(1200).transition({x:'0%'},500);
					$(".layer1 .text2").delay(1400).transition({x:'0%'},500);
					$(".layer1 .text3").delay(1600).transition({x:'0%'},500);
					$(".layer1 .text4").delay(1800).transition({x:'0%'},500);
					$(".layer1 .text5").delay(2000).transition({x:'0%'},500);
					$(".layer1 .text6").delay(2200).transition({x:'0%'},500);
					$(".layer1 .text7").delay(2400).transition({x:'0%'},500);
					$('.layer1 .layer1-4').delay(2400).transition({scale:1,opacity:1},800,'easeOutBack');
					$('.layer1 .layer1-4s').delay(2400).transition({scale:1,opacity:1},800,'easeOutBack',function(){$(this).addClass('flush');});
				},800);
				
			});
		
        });
    });