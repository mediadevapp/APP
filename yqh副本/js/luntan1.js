var selector = ".page";
    var loop = false;
    var images = [
            "./img/luntan1/1.jpg",
            "./img/luntan1/1-1.png",
            "./img/luntan1/1-10.png",
            "./img/luntan1/1-11.png",
            "./img/luntan1/1-12.png",
            "./img/luntan1/1-13.png",
            "./img/luntan1/1-14.png",
            "./img/luntan1/1-15.png",
            "./img/luntan1/1-16.png",
            "./img/luntan1/1-17.png",
            "./img/luntan1/1-18.png",
            "./img/luntan1/1-2.png",
            "./img/luntan1/1-3.png",
            "./img/luntan1/1-4.png",
            "./img/luntan1/1-5.png",
            "./img/luntan1/1-6.png",
            "./img/luntan1/1-7.png",
            "./img/luntan1/1-8.png",
            "./img/luntan1/1-9.png"];

            
        function init(){

            init_all();

        }
			
			function yuangui(selecter,x){
				if(!x){
					x=1;
				}
				var h = $(selecter).height();
				var w = $(selecter).width();
				var t = $(selecter).offset().top;
				var offset = h-w;
				t += offset/2;
				$(selecter).css({top:t+'px'});
				$(selecter).height(w*x+'px');
			}

			function nextIn(){
				$(".layer1 .layer1-2").transition({opacity:1,scale:1},600,'easeOutBack');
				$(".layer1 .layer1-9").transition({opacity:1},600);
				$(".layer1 .layer1-4").delay(200).transition({opacity:1,scale:1},600,'easeOutBack',function(){
					$(".layer1 .layer1-3").transition({opacity:1});
					$(".layer1 .layer1-7").transition({opacity:1});
					$(".layer1 .layer1-8").transition({opacity:1});
				});
				$(".layer1 .layer1-5").transition({opacity:1,scale:1},800,'easeOutBack');
				$(".layer1 .text2").delay(200).transition({x:'0%',opacity:1},600);
                $(".layer1 .text3").delay(400).transition({x:'0%',opacity:1},600);
                $(".layer1 .text4").delay(600).transition({x:'0%',opacity:1},600);
                $(".layer1 .text5").delay(800).transition({x:'0%',opacity:1},600);
                $(".layer1 .text6").delay(1000).transition({x:'0%',opacity:1},600);
                $(".layer1 .text7").delay(1200).transition({x:'0%',opacity:1},600);
                $(".layer1 .text1").delay(1400).transition({opacity:1,y:'0%'},600);
			}
            function init_layer1(){
			
				var w_12 = $(".layer1 .layer1-12").width();
				var h_14 = $(".layer1 .layer1-14").height();
				
				yuangui('.layer1 .layer1-1');
				yuangui('.layer1 .layer1-2');
				yuangui('.layer1 .layer1-4');
				yuangui('.layer1 .layer1-5');
				//yuangui('.layer1 .layer1-9');
				yuangui('.layer1 .layer1-17');
				//yuangui('.layer1 .layer1-3',0.8286);
                $(".layer1 .layer1-1");
                $(".layer1 .layer1-9").css({opacity:0});
				$(".layer1 .layer1-10").css({clip:'rect(0px,auto,0px,0px)',y:'100%'});
                $(".layer1 .layer1-11").css({clip:'rect(0px,auto,0px,0px)',y:'100%'});
                $(".layer1 .layer1-12").css({clip:'rect(0px,auto,auto,'+w_12+'px)',x:'-100%'});
                $(".layer1 .layer1-13").css({opacity:0.5,x:'-150%'});
                $(".layer1 .layer1-14").css({clip:'rect('+h_14+'px,auto,auto,0px)',y:'-100%'});
                $(".layer1 .layer1-15").css({scale:0,opacity:0});
                $(".layer1 .layer1-16").css({scale:0,opacity:0});
                $(".layer1 .layer1-17").css({scale:0,opacity:0});
                $(".layer1 .layer1-18").css({clip:'rect(0px,auto,0px,0px)'});
                $(".layer1 .layer1-2").css({scale:0,opacity:0});
                $(".layer1 .layer1-3").css({opacity:0});
                $(".layer1 .layer1-4").css({scale:0,opacity:0});
                $(".layer1 .layer1-5").css({scale:0,opacity:0});
                $(".layer1 .layer1-7").css({opacity:0});
                $(".layer1 .layer1-8").css({opacity:0});
				$(".layer1 .text2").css({x:'-50%',opacity:0});
                $(".layer1 .text3").css({x:'-50%',opacity:0});
                $(".layer1 .text4").css({x:'-50%',opacity:0});
                $(".layer1 .text5").css({x:'-50%',opacity:0});
                $(".layer1 .text6").css({x:'-50%',opacity:0});
                $(".layer1 .text7").css({x:'-50%',opacity:0});
                $(".layer1 .text1").css({opacity:0,y:'100%'});
                
            }

            function layer1_in(){
                $(".layer1 .layer1-1");
				var h_10 = $(".layer1 .layer1-10").height();
				var h_11 = $(".layer1 .layer1-11").height();
				var h_18 = $(".layer1 .layer1-18").height();
                $(".layer1 .layer1-10").delay(600).transition({clip:'rect(0px,auto,'+h_10+'px,0px)',y:'0%'},600);
                $(".layer1 .layer1-11").delay(300).transition({clip:'rect(0px,auto,'+h_11+'px,0px)',y:'0%'},500);
                $(".layer1 .layer1-12").delay(900).transition({clip:'rect(0px,auto,auto,0px)',x:'0%'},500);
                $(".layer1 .layer1-13").transition({opacity:1,x:'0%'},800);                            
                $(".layer1 .layer1-14").delay(300).transition({clip:'rect(0px,auto,auto,0px)',y:'0%'},500);
                $(".layer1 .layer1-15").delay(500).transition({opacity:1,scale:1},500,'easeOutBack');
                $(".layer1 .layer1-16").delay(1200).transition({opacity:1,scale:1},500,'easeOutBack');
                $(".layer1 .layer1-17").delay(2000).transition({opacity:1,scale:1},500,'easeOutBack');
                $(".layer1 .layer1-18").delay(500).transition({clip:'rect(0px,auto,'+h_18+'px,0px)'},1500);
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
			touch.on(".layer1 .layer1-4,.page1", "swipeleft", function(){
				mySwiper.swipeNext();
			});
			touch.on(".layer1 .layer1-4,.page1", "swiperight", function(){
				mySwiper.swipePrev();
			});
			touch.on(".layer1 .layer1-8", "tap", function(){
				mySwiper.swipeNext();
			});
			touch.on(".layer1 .layer1-7", "tap", function(){
				mySwiper.swipePrev();
			});
			touch.on(".layer1 .layer1-17", "tap", function(){
				$('.page1').transition({scale:0.7,y:'5%'},600);
				$('.page2').transition({scale:0},500,function(){$('.layer1 .layer1-17').transition({opacity:0,scale:0},400)});
				$(".layer1 .layer1-1").transition({scale:0.5,y:'-22%'},600);
				setTimeout(function(){nextIn();},400);
			});
		
        });
    });