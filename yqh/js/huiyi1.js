        var selector = ".page";
    var loop = false;
    var images = [
            "./img/huiyi1/1.jpg",
            "./img/huiyi1/1-1.png",
            "./img/huiyi1/1-10.png",
            "./img/huiyi1/1-11.png",
            "./img/huiyi1/1-12.png",
            "./img/huiyi1/1-13.png",
            "./img/huiyi1/1-14.png",
            "./img/huiyi1/1-15.png",
            "./img/huiyi1/1-16.png",
            "./img/huiyi1/1-17.png",
            "./img/huiyi1/1-18.png",
            "./img/huiyi1/1-19.png",
            "./img/huiyi1/1-2.png",
            "./img/huiyi1/1-3.png",
            "./img/huiyi1/1-4.png",
            "./img/huiyi1/1-5.png",
            "./img/huiyi1/1-6.png",
            "./img/huiyi1/1-7.png",
            "./img/huiyi1/1-8.png",
            "./img/huiyi1/1-9.png"];

            
        function init(){

            init_all();

        }

        
            function init_layer1(){
				var w_16 = $(".layer1 .layer1-16").width();
				var h_16 = $(".layer1 .layer1-16").height();
				var w_6 = $(".layer1 .layer1-6").width();
				var h_6 = $(".layer1 .layer1-6").height();
				var w_19 = $(".layer1 .layer1-19").width();
				var h_19 = $(".layer1 .layer1-19").height();
				var w_8 = $(".layer1 .layer1-8").width();
                $(".layer1 .layer1-1").css({opacity:0});
                $(".text1").css({y:'-80%',opacity:0});
				$(".text2").css({y:'-80%',opacity:0});
				$(".text3").css({y:'-80%',opacity:0});
				$(".text4").css({y:'-80%',opacity:0});
				$(".text5").css({y:'-80%',opacity:0});
				$(".text6").css({y:'-80%',opacity:0});
				$(".text7").css({y:'300px',opacity:0});
                $(".layer1 .layer1-2").css({transformOrigin:'50% 100%',scale:0,opacity:0});
                $(".layer1 .layer1-3").css({scale:0,opacity:0});
                $(".layer1 .text_contents").css({scale:0,opacity:0});
                var h = $(".layer1-4").height();
                $(".layer1-4").css({lineHeight:h+'px'});
                $(".layer1 .layer1-9").css({scale:0,opacity:0});
                $(".layer1 .layer1-10").css({scale:0,opacity:0});
                $(".layer1 .layer1-11").css({opacity:0});
				$(".layer1 .layer1-13").css({opacity:0});
                $(".layer1 .layer1-7").css({opacity:0});
                $(".layer1 .layer1-8").css({y:"100%",clip:'rect(0px,'+w_8+'px,0px,0px)'});
                $(".layer1 .layer1-6").css({x:"-100%",clip:'rect(0px,'+w_6+'px,'+h_16+'px,'+w_6+'px)'});
                $(".layer1 .layer1-4").css({opacity:0,x:'100%'});
                $(".layer1 .layer1-16").css({x:"-100%",clip:'rect(0px,'+w_16+'px,'+h_16+'px,'+w_16+'px)'});
                $(".layer1 .layer1-17").css({opacity:0,x:'100%'});
                $(".layer1 .layer1-18").css({opacity:0});
                $(".layer1 .layer1-19").css({y:"100%",clip:'rect(0px,'+w_19+'px,0px,0px)'});
            }

            function layer1_in(){
				var w = $(".layer1 .layer1-16").width();
				var h = $(".layer1 .layer1-16").height();
				var w_19 = $(".layer1 .layer1-19").width();
				var h_19 = $(".layer1 .layer1-19").height();
                $(".layer1 .layer1-1");
                $(".layer1 .layer1-10");
                $(".layer1 .layer1-11");
                $(".layer1 .layer1-12");
                
                $(".layer1 .layer1-14");
                $(".layer1 .layer1-15");
                $(".layer1 .layer1-16").delay(400).transition({x:"0%",clip:'rect(0px,'+w+'px,'+h+'px,0px)'},800);
                $(".layer1 .layer1-17").delay(400).transition({x:"0%",opacity:1},800);
                $(".layer1 .layer1-18").transition({opacity:1},120).transition({opacity:0},120).transition({opacity:1},120).transition({opacity:0},120).transition({opacity:1},120).transition({opacity:0},120).transition({opacity:1},120);
                $(".layer1 .layer1-19").delay(800).transition({y:"0%",clip:'rect(0px,'+w_19+'px,'+h_19+'px,0px)'},800,function(){$(".layer1 .layer1-13").addClass("flush2");});
                $(".layer1 .layer1-2");
                $(".layer1 .layer1-3");
                $(".layer1 .layer1-4");
                $(".layer1 .layer1-5");
                $(".layer1 .layer1-6");
                $(".layer1 .layer1-7");
                $(".layer1 .layer1-8");
                $(".layer1 .layer1-9");
            }
			function nextIn(){
				var w_8 = $(".layer1 .layer1-8").width();
				var h_8 = $(".layer1 .layer1-8").height();
				var w_6 = $(".layer1 .layer1-6").width();
				var h_6 = $(".layer1 .layer1-6").height();
				$(".layer1 .layer1-7").transition({opacity:1},120).transition({opacity:0},120).transition({opacity:1},120).transition({opacity:0},120).transition({opacity:1},120).transition({opacity:0},120).transition({opacity:1},120);
				$(".layer1 .layer1-11").delay(2000).transition({opacity:1},120).transition({opacity:0},120).transition({opacity:1},120).transition({opacity:0},120).transition({opacity:1},120).transition({opacity:0},120).transition({opacity:1},120);
				$(".layer1 .layer1-8").delay(800).transition({y:"0%",clip:'rect(0px,'+w_8+'px,'+h_8+'px,0px)'},800);
				$(".layer1 .layer1-1").transition({opacity:1},200);
				$(".layer1 .layer1-6").delay(400).transition({x:"0%",clip:'rect(0px,'+w_6+'px,'+h_6+'px,0px)'},800);
				$(".layer1 .layer1-4").delay(400).transition({x:"0%",opacity:1},800);
				$(".text1").delay(700 ).transition({opacity:1,y:'0%'},800);
				$(".text2").delay(1300 ).transition({opacity:1,y:'0%'},800);
				$(".text3").delay(1600 ).transition({opacity:1,y:'0%'},800);
				$(".text4").delay(1900).transition({opacity:1,y:'0%'},800);
				$(".text5").delay(2200).transition({opacity:1,y:'0%'},800);
				$(".text6").delay(2500).transition({opacity:1,y:'0%'},800);
				$(".text7").transition({opacity:1,y:'0%'},1000);
	
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
			touch.on(".layer1 .layer1-3", 'swipeleft', function(){
				mySwiper.swipeNext();
			});
			touch.on(".layer1 .layer1-3", 'swiperight', function(){
				mySwiper.swipePrev();
			});
			touch.on(".layer1 .layer1-10", 'tap', function(){
				mySwiper.swipeNext();
			});
			touch.on(".layer1 .layer1-9", 'tap', function(){
				mySwiper.swipePrev();
			});

			touch.on(".layer1 .layer1-12", 'tap', function(){
				$(".layer1 .layer1-13").fadeOut(100);	
				$(".layer1 .layer1-14").fadeOut(100);	
				$(".layer1 .layer1-15").fadeOut(500,function(){
                    $('#container1').hide();
                });	
				$(".layer1 .layer1-12").transition({scale:0,opacity:0},500,function(){
					$(".layer1 .layer1-16").transition({y:'-300px',opacity:0},500);
					$(".layer1 .layer1-17").transition({y:'-300px',opacity:0},500);
					$(".layer1 .layer1-18").transition({y:'-300px',opacity:0},500);
					$(".layer1 .layer1-19").transition({y:'-300px',opacity:0},500);
					$(".layer1 .layer1-2").transition({opacity:1,scale:1},700,'easeOutBack');
					$(".layer1 .layer1-3").delay(500).transition({opacity:1,scale:1},800,'easeOutBack');
					$(".layer1 .text_contents").delay(500).transition({opacity:1,scale:1},800,'easeOutBack');
					$(".layer1 .layer1-9").delay(500).transition({opacity:1,scale:1},500);
					$(".layer1 .layer1-10").delay(500).transition({opacity:1,scale:1},500,function(){
						nextIn();
					});
				});	
			});
        });
        response.config({
            width:640,
            height:1138
        });
        response.setBoxCenter('#container1,#container2');
        response.setBoxResponse('#container3');
    });
