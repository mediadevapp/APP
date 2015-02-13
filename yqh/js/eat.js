    var selector = ".page";
    var loop = false;
	var offx = 0;
    var images = [
            "./img/eat/1.jpg",
            "./img/eat/1-1.png",
            "./img/eat/1-10.png",
            "./img/eat/1-11.png",
            "./img/eat/1-12.png",
            "./img/eat/1-13.png",
            "./img/eat/1-14.png",
            "./img/eat/1-15.png",
            "./img/eat/1-16.png",
            "./img/eat/1-17.png",
            "./img/eat/1-18.png",
            "./img/eat/1-19.png",
            "./img/eat/1-2.png",
            "./img/eat/1-20.png",
            "./img/eat/1-21.png",
            "./img/eat/1-22.png",
            "./img/eat/1-23.png",
            "./img/eat/1-3.png",
            "./img/eat/1-4.png",
            "./img/eat/1-5.png",
            "./img/eat/1-6.png",
            "./img/eat/1-7.png",
            "./img/eat/1-8.png",
            "./img/eat/1-9.png"];

            
        function init(){

            init_all();

        }

        
            function init_layer1(){
				$(".layer1 .layer1-8").css({transform:'rotate(-180deg)',opacity:0,transformOrigin:'50% 100%'});
                $(".layer1 .layer1-9").css({transform:'rotate(180deg)',opacity:0,transformOrigin:'50% 100%'});
				$(".layer1 .layer1-22").css({y:'60%',opacity:0});
                $(".layer1 .layer1-23").css({y:'-60%',opacity:0});
                $(".layer1 .layer1-10").css({scale:0});
                $('.layer1 .layer1-12').css({opacity:0});
                $('.layer1 .layer1-13').css({opacity:0});
                $(".layer1 .layer1-11").css({scale:0,opacity:0.5});
                $(".layer1 .layer1-14").css({x:'150%',opacity:0});
                $(".layer1 .layer1-15").css({x:'-150%',opacity:0});
                $(".layer1 .layer1-16").css({y:'100%',opacity:0});
                $(".layer1 .layer1-1").css({opacity:0});
                $(".layer1 .layer1-2").css({opacity:0});
                $(".layer1 .layer1-3").css({opacity:0});
                $(".layer1 .layer1-4").css({opacity:0});
                $(".layer1 .layer1-5").css({x:'-200%'});
                $(".layer1 .layer1-6").css({opacity:0});
                $(".layer1 .layer1-meng").css({opacity:0});
				$('.text1').css({x:'-80%',opacity:0});
				$('.text2').css({x:'-80%',opacity:0});
				$('.text3').css({x:'-80%',opacity:0});
				$('.text4').css({x:'-80%',opacity:0});
				$('.text5').css({x:'-80%',opacity:0});
                $('.text6').css({x:'-80%',opacity:0});
				$('.text7').css({x:'-80%',opacity:0});
			}   

            function layer1_in(){
                $(".layer1 .layer1-10").transition({scale:1},700,"easeOutBack");
                $(".layer1 .layer1-11").delay(500).transition({scale:1,opacity:1},700,"easeOutBack",function(){$(".layer1 .layer1-meng").css({opacity:1});$(".layer1 .layer1-10").css({opacity:0});$('.layer1-12,.layer1-13').transition({opacity:1});});
                $(".layer1 .layer1-14").delay(0).transition({x:'0',opacity:1},800);
                $(".layer1 .layer1-15").delay(0).transition({x:'0',opacity:1},800);
                $(".layer1 .layer1-16").delay(500).transition({y:"0%",opacity:1},600);
                $(".layer1 .layer1-22").delay(400).transition({y:'0%',opacity:1},600);
                $(".layer1 .layer1-23").delay(400).transition({y:'0%',opacity:1},600);
                $(".layer1 .layer1-8").transition({rotate:'0deg',opacity:1},1100);
                $(".layer1 .layer1-9").transition({rotate:'0deg',opacity:1},1100);
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
function next(){
	$('#target').fadeOut();
	$('#bar').fadeOut();
	$('.page1,.layer1-7').transition({y:'-80%'},1000,function(){$(this).fadeOut()});
	$('.page2').transition({y:'30%'},1000,function(){$(this).fadeOut()});
	$(".layer1 .layer1-1").delay(300).transition({opacity:1},800);
	$(".layer1 .layer1-2").delay(300).transition({opacity:1},800,function(){
		$(".layer1 .layer1-3").transition({opacity:1},200).transition({opacity:0},200).transition({opacity:1},200).transition({opacity:0},200).transition({opacity:1},200);
		$(".layer1 .layer1-4").transition({opacity:1},200).transition({opacity:0},200).transition({opacity:1},200).transition({opacity:0},200).transition({opacity:1},200,function(){
			$(".layer1 .layer1-5").transition({x:"0%"},600);
			$(".layer1 .layer1-4").transition({x:"300px",opacity:0},600);
			$(".layer1 .layer1-6").transition({opacity:1},200).transition({opacity:0},200).transition({opacity:1},200);
		});
		$('.text1').delay(0).transition({x:'0%',opacity:1},800);
		$('.text2').delay(400).transition({x:'0%',opacity:1},800);
		$('.text3').delay(800).transition({x:'0%',opacity:1},800);
		$('.text4').delay(1200).transition({x:'0%',opacity:1},800);
		$('.text5').delay(1600).transition({x:'0%',opacity:1},800);
		$('.text6').delay(2000).transition({x:'0%',opacity:1},800);
		$('.text7').delay(2400).transition({x:'0%',opacity:1},800);
	});
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
			touch.on(".layer1 .layer1-meng", 'swipeleft', function(){
				mySwiper.swipeNext();
			});
			touch.on(".layer1 .layer1-meng", 'swiperight', function(){
				mySwiper.swipePrev();
			});
			touch.on(".layer1 .layer1-13", 'tap', function(){
				mySwiper.swipeNext();
			});
			touch.on(".layer1 .layer1-12", 'tap', function(){
				mySwiper.swipePrev();
			});
			var dx, dy;
			var dragLimit = {
					min:0,
					max:$(window).width()*0.6
				};
			var w = $('#bar').width();
			function drag(ev){
				dx = dx || 0;
				offx = dx + ev.x;
				offx = offx < dragLimit.min ? dragLimit.min : (offx > dragLimit.max ? dragLimit.max : offx);
				
				$("#target").get(0).style.webkitTransform = "translate3d(" + offx + "px,0,0)";
				$('#bar').width(offx+w+'px');
				
			}
			touch.on('#target', 'swiperight', function(ev){
                $("#target").transition({x:'300px'},800);
                $('#bar').transition({width:(300+w)+'px'},800,function(){
                    next();
                });
            });
			/*touch.on('#target', 'touchstart', function(ev){
				ev.preventDefault();
			});
			touch.on('#target', 'drag', drag);
			touch.on('#target', 'dragend', function(ev){
				if(offx == dragLimit.max){
					next();
				}
				dx += ev.x;
				dy += ev.y;
			});*/
        });
	   response.config({width:640, height:1138 });
        response.setBoxXCenter('.page1,.page3');
    });