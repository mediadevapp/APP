    var selector = ".page";
    var loop = false;
    var images = [
            "./img/birthday2/1.jpg",
            "./img/birthday2/1-1.png",
            "./img/birthday2/1-10.png",
            "./img/birthday2/1-11.png",
            "./img/birthday2/1-12.png",
            "./img/birthday2/1-13.jpg",
            "./img/birthday2/1-14.png",
            "./img/birthday2/1-15.png",
            "./img/birthday2/1-16.png",
            "./img/birthday2/1-17.png",
            "./img/birthday2/1-18.png",
            "./img/birthday2/1-19.png",
            "./img/birthday2/1-2.png",
            "./img/birthday2/1-3.png",
            "./img/birthday2/1-4.png",
            "./img/birthday2/1-5.png",
            "./img/birthday2/1-6.png",
            "./img/birthday2/1-7.png",
            "./img/birthday2/1-8.png",
            "./img/birthday2/1-9.png"];

            
        function init(){

            init_all();

        }

        
            function init_layer1(){
                $(".layer1 .layer1-1").css({opacity:0});
                $(".layer1 .layer1-10").css({y:'-60%',opacity:0});
                $(".layer1 .layer1-11").css({scale:0,opacity:0});
                $(".layer1 .layer1-12");
                $(".layer1 .layer1-13");
                $(".layer1 .layer1-14");
                $(".layer1 .layer1-15").css({y:'-80%',opacity:0});
                $(".layer1 .layer1-16").css({y:'-80%',opacity:0});
                $(".layer1 .layer1-17");
                $(".layer1 .layer1-18").css({scale:0,opacity:0});
                $(".layer1 .layer1-19").css({y:'-80%',opacity:0});
                $(".layer1 .layer1-2").css({opacity:0});
                $(".layer1 .layer1-3").css({opacity:0});
                $(".layer1 .layer1-4").css({y:'-80%',opacity:0});
                $(".layer1 .layer1-5").css({y:'-80%',opacity:0});
                $(".layer1 .layer1-6").css({y:'-80%',opacity:0});
                $(".layer1 .layer1-7").css({scale:0,opacity:0});
                $(".layer1 .layer1-8").css({scale:0,opacity:0});
                $(".layer1 .layer1-9");
				$(".text1").css({y:"-80%",opacity:0});
				$(".text2").css({y:"-80%",opacity:0});
				$(".text3").css({y:"-80%",opacity:0});
				$(".text4").css({y:"-80%",opacity:0});
				$(".text5").css({y:"-80%",opacity:0});
				$(".text6").css({y:"-80%",opacity:0});
				$(".text7").css({y:"-80%",opacity:0});
            }
			function nextIn(){
				$(".layer1 .layer1-10").transition({y:'0%',opacity:1},800);
				$(".layer1 .layer1-11").delay(400).transition({scale:1,opacity:1},800);
				$(".text2").delay(600).transition({y:'0%',opacity:1},1000,'easeOutBack');
				$(".text3").delay(900).transition({y:'0%',opacity:1},1000,'easeOutBack');
				$(".text4").delay(1200).transition({y:'0%',opacity:1},1000,'easeOutBack');
				$(".text5").delay(1500).transition({y:'0%',opacity:1},1000,'easeOutBack');
				$(".text6").delay(1800).transition({y:'0%',opacity:1},1000,'easeOutBack');
				$(".text7").delay(2100).transition({y:'0%',opacity:1},1000,'easeOutBack');
				$(".layer1 .layer1-8").delay(2400).transition({scale:1,opacity:1},1000);
				$(".layer1 .layer1-4").delay(2700).transition({y:'0%',opacity:1},1000,'easeOutBack');
				$(".layer1 .layer1-6").delay(3000).transition({y:'0%',opacity:1},1000,'easeOutBack');
				$(".layer1 .layer1-5").delay(3300).transition({y:'0%',opacity:1},1000,'easeOutBack');
				$(".layer1 .layer1-1").delay(3500).transition({opacity:1},1200);
				$(".layer1 .layer1-2").delay(3500).transition({opacity:1},800);
				$(".layer1 .layer1-3").delay(3500).transition({opacity:1},800);
				$(".layer1 .layer1-7").delay(3500).transition({scale:1,opacity:1},1200,function(){
                    $(this).addClass('flush');  
                });
				$(".text1").delay(3500).transition({y:'0%',opacity:1},1000);
			}
            function layer1_in(){
                $(".layer1 .layer1-15").transition({y:'0',opacity:1},800);
                $(".layer1 .layer1-16").delay(300).transition({y:'0',opacity:1},800);
                $(".layer1 .layer1-18").delay(600).transition({scale:1,opacity:1},800);
                $(".layer1 .layer1-19").delay(900).transition({y:'0',opacity:1},800);
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

			touch.on(".layer1 .layer1-3", "tap", function(){
				mySwiper.swipeNext();
			});
			touch.on(".layer1 .layer1-2", "tap", function(){
				mySwiper.swipePrev();
			});
			touch.on(".layer1 .layer1-14", "click", function(){
				$(".layer1 .layer1-14").removeClass('flush').transition({y:'-500%'},1000);
				$(".page1").transition({scale:3,opacity:0},1000,function(){$(this).fadeOut();nextIn();});
			});
        });
    });