    var selector = ".page";
    var loop = false;
    var images = [
            "./img/love/1.jpg",
            "./img/love/1-1.png",
            "./img/love/1-10.png",
            "./img/love/1-11.png",
            "./img/love/1-12.png",
            "./img/love/1-13.png",
            "./img/love/1-14.png",
            "./img/love/1-15.png",
            "./img/love/1-16.png",
            "./img/love/1-17.png",
            "./img/love/1-18.png",
            "./img/love/1-19.png",
            "./img/love/1-20.png",
            "./img/love/1-22.png",
            "./img/love/1-23.png",
            "./img/love/1-24.png",
            "./img/love/1-2.png",
            "./img/love/1-20.png",
            "./img/love/1-3.png",
            "./img/love/1-4.png",
            "./img/love/1-5.png",
            "./img/love/1-6.png",
            "./img/love/1-7.png",
            "./img/love/1-8.png",
            "./img/love/1-9.png"];

            
        function init(){

            init_all();

        }

        
            function init_layer1(){
				$(".page_2").css({opacity:1});
				$(".layer1 .layer1-16").css({opacity:0});
                $(".layer1 .layer1-17").css({opacity:0});
                $(".layer1 .layer1-18").css({opacity:0});
                $(".layer1 .layer1-19").css({opacity:0});
                $(".layer1 .layer1-20").css({opacity:0});
				$(".layer1 .layer1-21").css({scale:0,opacity:0});
				$(".layer1 .layer1-23").css({scale:0,opacity:0});
				$(".layer1 .layer1-24").css({opacity:0});
				$(".text1").css({opacity:0});
				$(".text2").css({opacity:0});
				$(".text3").css({opacity:0});
				$(".text4").css({opacity:0});
				$(".text5").css({opacity:0});
				$(".text6").css({opacity:0});
				$(".text7").css({opacity:0});
				$(".text8").css({opacity:0});
				$(".text9").css({opacity:0});
				$(".text10").css({opacity:0});
				
                $(".layer1 .layer1-1").css({opacity:0,y:'-500%'});
				$(".layer1 .layer1-2").css({opacity:0,scale:0});
                $(".layer1 .layer1-3");
                $(".layer1 .layer1-4");
                $(".layer1 .layer1-5").css({opacity:0,y:'100%'});
                $(".layer1 .layer1-6").css({opacity:0,y:'100%'});
                $(".layer1 .layer1-7").css({y:'80%'});
                $(".layer1 .layer1-8").css({opacity:0,x:'230%'});
                $(".layer1 .layer1-9").css({opacity:0,x:'80%'});
                $(".layer1 .layer1-10").css({opacity:0,x:'-58%'});
                $(".layer1 .layer1-11").css({opacity:0,x:'-240%'});
                $(".layer1 .layer1-12").css({y:'-80%'});
                $(".layer1 .layer1-13").css({scale:0,opacity:0,y:'-100%'});
                $(".layer1 .layer1-14").css({opacity:0,y:'-100%'});
                $(".layer1 .layer1-15");
               
                
            }

            function layer1_in(){ 
               
			    $(".layer1 .layer1-12").transition({y:'0%'},1000,'easeOutExpo'); 
				$(".layer1 .layer1-7").transition({y:'0%'},1000,'easeOutExpo');
				$(".layer1 .layer1-14").transition({opacity:1,y:'0%',delay:300},600);
				$(".layer1 .layer1-5").transition({opacity:1,y:'0%',delay:300},600);
				$(".layer1 .layer1-13").transition({scale:1,opacity:1,y:'0%',delay:500},600);
				$(".layer1 .layer1-6").transition({opacity:1,y:'0%',delay:500},600);
				$(".layer1 .layer1-10").transition({x:'0%',opacity:1,delay:500},700);
                $(".layer1 .layer1-11").transition({x:'0%',opacity:1,delay:500},700);
				$(".layer1 .layer1-8").transition({x:'0%',opacity:1,delay:500},700);
                $(".layer1 .layer1-9").transition({x:'0%',opacity:1,delay:500},700);
				$(".layer1 .layer1-1").transition({opacity:1,y:'0%',delay:1300},800,'easeOutBack');
				$(".layer1 .layer1-2").transition({opacity:1,scale:1,delay:1000},1000);
                $(".layer1 .layer1-15");
                $(".layer1 .layer1-16");
                $(".layer1 .layer1-17");
                $(".layer1 .layer1-18");
                $(".layer1 .layer1-19");
                $(".layer1 .layer1-20");
                $(".layer1 .layer1-3");
                $(".layer1 .layer1-4");
                
                
               
                
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
			
            init_all();
            setTimeout(function(){
                layer1_in();
            }, 500);
			touch.on(".layer1 .layer1-17", 'swipeleft', function(){
				mySwiper.swipeNext();
			});
			touch.on(".layer1 .layer1-17", 'swiperight', function(){
				mySwiper.swipePrev();
			});
			touch.on(".layer1 .layer1-18", 'tap', function(){
				mySwiper.swipeNext();
			});
			touch.on(".layer1 .layer1-19", 'tap', function(){
				mySwiper.swipePrev();
			});
			touch.on(".layer1 .layer1-15", 'tap', function(){
				$(".layer1 .layer1-4").transition({x:'236%',y:'100%'},800,function(){
					//$(".layer1 .layer1-22").animate({scale:33,opacity:0.8},3000,"linear",function(){
					//});
					
					$(".page_1").transition({scale:3,opacity:0},1000,function(){
						$('.page_1').fadeOut();
					});
					$(".layer1 .layer1-16").delay(600).transition({opacity:1},400);
					$(".layer1 .layer1-17").delay(600).transition({opacity:1},400,function(){
						$(".layer1 .layer1-18").transition({opacity:1},800);
						$(".layer1 .layer1-19").transition({opacity:1},800);
					});
					$(".layer1 .layer1-23").delay(600).transition({scale:1,opacity:1},800);
					$(".layer1 .layer1-21").delay(600).transition({scale:1,opacity:1},800,function(){
						$(this).addClass('flush');
					});
					$('.text1').delay(1000).transition({opacity:1},800);
					$('.text2').delay(1000).transition({opacity:1},600);
					$('.text3').delay(1200).transition({opacity:1,y:'50%'},600).transition({opacity:1,y:'0'},800);
					$('.text4').delay(1500).transition({opacity:0,y:'50%'},600).transition({opacity:1,y:'0'},800);
					$('.text5').delay(1800).transition({opacity:1,y:'50%'},600).transition({opacity:1,y:'0'},800);
					$('.text6').delay(2100).transition({opacity:0,y:'50%'},600).transition({opacity:1,y:'0'},800);
					$('.text7').delay(2400).transition({opacity:0,y:'50%'},600).transition({opacity:1,y:'0'},800);
					$('.text8').delay(2700).transition({opacity:0,y:'50%'},600).transition({opacity:1,y:'0'},800);
					$('.text9').delay(3000).transition({opacity:0,y:'50%'},600).transition({opacity:1,y:'0'},800);
					$('.text10').delay(3300).transition({opacity:0,y:'50%'},600).transition({opacity:1,y:'0'},800);
				});
			
			});
		});
    	response.config({width:640, height:1138 });
        response.setBoxXCenter('.page_1,.page_2');
	});