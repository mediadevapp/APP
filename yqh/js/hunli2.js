    var selector = ".page";
    var loop = false;
	var num = GetRandomNum(1,2);
    var images = [
            "./img/hunli2/1.jpg",
            "./img/hunli2/1-1.png",
            "./img/hunli2/1-10.jpg",
            "./img/hunli2/1-11.png",
            "./img/hunli2/1-12.png",
            "./img/hunli2/1-13.png",
            "./img/hunli2/1-14.png",
            "./img/hunli2/1-15.png",
            "./img/hunli2/1-16.png",
            "./img/hunli2/1-17.png",
            "./img/hunli2/1-18.png",
            "./img/hunli2/1-2.png",
            "./img/hunli2/1-3.png",
            "./img/hunli2/1-4.png",
            "./img/hunli2/1-5.png",
            "./img/hunli2/1-6.png",
            "./img/hunli2/1-7.png",
            "./img/hunli2/1-8.png",
            "./img/hunli2/1-9.jpg"];

            
        function init(){

            init_all();

        }
		function GetRandomNum(Min,Max)
		{   
		var Range = Max - Min;   
		var Rand = Math.random();   
		return(Min + Math.round(Rand * Range));   
		}   
        
            function init_layer1(){
				var t1 = $(".layer1 .layer1-16").offset().top;
				var t2 = $(".layer1 .layer1-15").offset().top;
				var offset1 = $(".layer1 .layer1-16").height()-$(".layer1 .layer1-16").width();
				var offset2 = $(".layer1 .layer1-15").height()-$(".layer1 .layer1-15").width();
				t1 += offset1/2;
				t2 += offset2/2;
				$(".layer1 .layer1-16").css({top:t1+'px'});
				$(".layer1 .layer1-15").css({top:t2+'px'});
				var w = $(".layer1 .layer1-16").width();
				$(".layer1 .layer1-16").height(w+"px");
				var w = $(".layer1 .layer1-15").width();
				$(".layer1 .layer1-15").height(w+"px");
                $(".layer1 .layer1-17").css({y:'80%',opacity:0});
                $(".layer1 .layer1-18").css({y:'-80%',opacity:0});
				$(".text1").css({y:"100%",opacity:0});
				$(".text2").css({x:"-80%",opacity:0});
				$(".text3").css({x:"80%",opacity:0});
				$(".text4").css({x:"-80%",opacity:0});
				$(".text5").css({x:"80%",opacity:0});
				$(".text6").css({x:"-80%",opacity:0});
				$(".text7").css({x:"80%",opacity:0});
            }

            function layer1_in(){
                $(".layer1 .layer1-17").transition({y:'0%',opacity:1},600);
                $(".layer1 .layer1-18").transition({y:'0%',opacity:1},600);
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
function zhuan(){
	num = GetRandomNum(1,2);
	/*if(num == 1){
		$(".layer1 .layer1-16").addClass('zhuan');
	}else{
		$(".layer1 .layer1-16").addClass('zhuan2');
	}*/
	if(num == 1){
		$(".layer1 .layer1-16").transition({rotate:'+=120deg'},4000,'linear',zhuan);
	}else{
		$(".layer1 .layer1-16").transition({rotate:'-=120deg'},4000,'linear',zhuan);
	}
}
    $(function(){
    var w = $(window).width(), h = $(window).height();
    $(".page").width(w).height(h);
        PreLoadImg(images,function(){
            $(".loadingCls").hide();
            var mySwiper = $(".circle").swiper({
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
			touch.on(".layer1 .layer1-13", "swipeleft", function(){
				mySwiper.swipeNext();
			});
			touch.on(".layer1 .layer1-13", "swiperight", function(){
				mySwiper.swipePrev();
			});
			zhuan();
			var mySwiper2 = $(".photos").swiper({
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
			touch.on(".layer1 .layer1-8", "tap", function(){
				mySwiper2.swipeNext();
			});
			touch.on(".layer1 .layer1-7", "tap", function(){
				mySwiper2.swipePrev();
			});
			zhuan();
			touch.on(".button",'tap',function(){
				$(this).transition({scale:0.8},500).transition({scale:1},400);
			});
			touch.on(".layer1 .layer1-14",'tap',function(){
				$(".layer1 .layer1-14").transition({scale:0.8},800,'easeOutBack',function(){
					$(".layer1 .layer1-14").fadeOut(100);
					$(".layer1 .layer1-15").fadeOut(100,function(){
						$("#container1").fadeOut();
						$(".text2").delay(0 ).transition({opacity:1,x:'0%'},1200,'easeOutBack');
						$(".text3").delay(300 ).transition({opacity:1,x:'0%'},1200,'easeOutBack');
						$(".text4").delay(600).transition({opacity:1,x:'0%'},1200,'easeOutBack');
						$(".text5").delay(900).transition({opacity:1,x:'0%'},1200,'easeOutBack');
						$(".text6").delay(1200).transition({opacity:1,x:'0%'},1200,'easeOutBack');
						$(".text7").delay(1500).transition({opacity:1,x:'0%'},1200,'easeOutBack');
					});
					var hh = $(".layer1 .layer1-9").height();
					$(".layer1 .layer1-9").transition({y:-hh+'px'},800);
					$(".layer1 .layer1-11").transition({y:-hh+'px'},800);
					$(".layer1 .layer1-12").transition({y:-hh+'px'},800);
					$(".layer1 .layer1-13").transition({y:-hh+'px'},800);
					$(".layer1 .layer1-17").transition({y:-hh+'px'},800);
					$(".layer1 .layer1-18").transition({y:-hh+'px'},800);
					$(".layer1 .layer1-10").transition({y:'100%'},800);
					$(".layer1 .layer1-16").fadeOut(1);
				});
				
				if(num == 1){
					$(".layer1 .layer1-16").stop(1).transition({rotate:'+=360deg'},800)
				}else{
					$(".layer1 .layer1-16").stop(1).transition({rotate:'-=360deg'},800)
				}
			})
        });
    response.config({
        width:640,
        height:1138
    });
    response.setBoxResponse('#container1,#container2');
    });