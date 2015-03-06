  var selector = ".page";
    var loop = false;
    var images = [
            "./img/huiyi2/1.jpg",
            "./img/huiyi2/1-1.png",
            "./img/huiyi2/1-10.png",
            "./img/huiyi2/1-11.png",
            "./img/huiyi2/1-2.png",
            "./img/huiyi2/1-3.png",
            "./img/huiyi2/1-4.png",
            "./img/huiyi2/1-5.png",
            "./img/huiyi2/1-6.png",
            "./img/huiyi2/1-7.png",
            "./img/huiyi2/1-8.png",
            "./img/huiyi2/1-9.jpg"];

            
        function init(){

            init_all();

        }

        
            function init_layer1(){
                $(".layer1 .layer1-1").css({opacity:0});
                $(".layer1 .layer1-2").css({opacity:0,scale:2});
				$(".layer1 .layer1-3").css({opacity:0,scale:0});
				$(".layer1 .layer1-4").css({opacity:0,scale:0});
                $(".layer1 .layer1-5").css({opacity:0,scale:0});
                $(".layer1 .layer1-6").css({opacity:0,scale:0});
                $(".layer1 .layer1-7").css({opacity:0});
                $(".layer1 .layer1-8").css({opacity:0,scale:0});
                $(".layer1 .layer1-b1").css({y:'-100%'});
                $(".layer1 .layer1-b2").css({y:'-200%'});
                $(".layer1 .layer1-b3").css({y:'-300%'});
                $(".layer1 .layer1-11");
				$(".text1").css({x:'-80%',opacity:0});
				$(".text2").css({x:'-80%',opacity:0});
				$(".text3").css({x:'-80%',opacity:0});
				$(".text4").css({x:'-80%',opacity:0});
				$(".text5").css({x:'-80%',opacity:0});
				$(".text6").css({x:'-80%',opacity:0});
				$(".text7").css({y:'300px',opacity:0});
            }

            function layer1_in(){
                $(".layer1 .layer1-1");
                $(".layer1 .layer1-10");
                $(".layer1 .layer1-11");
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
            var mySwiper = $(".texts").swiper({
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
			touch.on(".layer1 .layer1-text", 'swipeleft', function(){
				mySwiper.swipeNext();
			});
			touch.on(".layer1 .layer1-text", 'swiperight', function(){
				mySwiper.swipePrev();
			});
			touch.on(".layer1 .layer1-6", 'tap', function(){
				mySwiper.swipeNext();
			});
			touch.on(".layer1 .layer1-5", 'tap', function(){
				mySwiper.swipePrev();
			});
		touch.on(".swiper_up", 'swipeup', function(){
			$(".layer1 .layer1-9").transition({y:'300%'},1200,'ease');
			$(".layer1 .layer1-10").transition({y:'-700%'},1500,'ease');
			$(".layer1 .layer1-11").removeClass('flush').transition({y:'-700%',opacity:0},500,'ease');
			$(".layer1 .layer1-b1").transition({y:'200%'},1200,'ease');
			$(".layer1 .layer1-b2").transition({y:'100%'},1200,'ease');
			$(".layer1 .layer1-b3").transition({y:'0%'},1200,'ease',function(){
                $('.layer1-10').appendTo('#container2');
                $('#container1').hide();
            });
			$(".layer1 .layer1-1").delay(500).transition({opacity:1},500);
			$(".layer1 .layer1-2").delay(500).transition({opacity:1,scale:1},500);
			$(".layer1 .layer1-7").delay(500).transition({opacity:1,scale:1},200,function(){
				$(".layer1 .layer1-3").transition({opacity:1,scale:1},500,'easeOutBack');
				$(".layer1 .layer1-5").transition({opacity:1,scale:1},300,'easeOutBack');
				$(".layer1 .layer1-6").transition({opacity:1,scale:1},300,'easeOutBack');
				$(".layer1 .layer1-4").delay(300).transition({opacity:1,scale:1},500,'easeOutBack',function(){
					$(".text1").delay(0).transition({opacity:1,x:'0%'},600);
					$(".text2").delay(300).transition({opacity:1,x:'0%'},600);
					$(".text3").delay(600).transition({opacity:1,x:'0%'},600);
					$(".text4").delay(900).transition({opacity:1,x:'0%'},600);
					$(".text5").delay(1200).transition({opacity:1,x:'0%'},600);
					$(".text6").delay(1500).transition({opacity:1,x:'0%'},600);
					$(".text7").transition({opacity:1,y:'0%'},600);
					$(".layer1 .layer1-8").transition({opacity:1,scale:1},500);
				});
			});
			
		});
        });
        response.config({
            width:640,
            height:1138
        });
        // response.setBoxCenter('#container1,#container2');
        response.setBoxResponse('#container1,#container2');
        // response.setBoxCenter('#container2');
        response.setCenter('.layer1-9,.layer1-b1,.layer1-b2,.layer1-b3');
    });