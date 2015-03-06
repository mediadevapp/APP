    var selector = ".page";
    var loop = false;
    var images = [
            "./img/birthday1/1.jpg",
            "./img/birthday1/1-1.png",
            "./img/birthday1/1-10.png",
            "./img/birthday1/1-11.png",
            "./img/birthday1/1-12.png",
            "./img/birthday1/1-2.png",
            "./img/birthday1/1-3.png",
            "./img/birthday1/1-4.png",
            "./img/birthday1/1-5.png",
            "./img/birthday1/1-6.png",
            "./img/birthday1/1-7.jpg",
            "./img/birthday1/1-8.png",
            "./img/birthday1/1-9.png"];

            
      
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
			$(".text1").css({x:"-80%",opacity:0});
			$(".text2").css({x:"-80%",opacity:0});
			$(".text3").css({x:"80%",opacity:0});
			$(".text4").css({x:"-80%",opacity:0});
			$(".text5").css({x:"80%",opacity:0});
			$(".text6").css({x:"-80%",opacity:0});
			$(".text7").css({x:"80%",opacity:0});
			touch.on(".layer1 .layer1-1","swipeleft", function(){
				mySwiper.swipeNext();
			});
			touch.on(".layer1 .layer1-1", "swiperight", function(){
				mySwiper.swipePrev();
			});
			touch.on(".layer1 .layer1-6", "tap", function(){
				mySwiper.swipeNext();
			});
			touch.on(".layer1 .layer1-5", "tap", function(){
				mySwiper.swipePrev();
			});
                $('#container1').css({opacity:0});
			touch.on(".layer1 .layer1-9", "swiperight", function(){
				$('#container1').css({opacity:1});
				$('.layer1-3').addClass('flush2');
				$(".layer1 .layer1-9").transition({x:"180%"},800);
				$(".layer1 .layer1-10").fadeOut();
				$(".layer1 .layer1-12").delay(600).transition({scale:10,opacity:0.3,y:'-50%'},800);
				$(".page1").delay(1200).fadeOut(200,function(){
						$(".text3").delay(300).transition({x:'0%',opacity:1},1000,'easeOutBack');
						$(".text4").delay(600).transition({x:'0%',opacity:1},1000,'easeOutBack');
						$(".text5").delay(900).transition({x:'0%',opacity:1},1000,'easeOutBack');
						$(".text6").delay(1200).transition({x:'0%',opacity:1},1000,'easeOutBack');
						$(".text7").delay(1500).transition({x:'0%',opacity:1},1000,'easeOutBack');
						$(".text2").delay(0).transition({x:'0%',opacity:1},1000,'easeOutBack');
						$(".text1").delay(1800).transition({x:'0%',opacity:1},1000,'easeOutBack');
				});
				
			});
        });
    response.config({
        width:640,
        height:1138
    });
    response.setBoxResponse('#container1');
    });