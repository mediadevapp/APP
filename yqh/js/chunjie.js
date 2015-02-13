    var selector = ".page";
    var loop = false;
    var images = [
            "./img/chunjie/1.jpg",
            "./img/chunjie/1-1.png",
            "./img/chunjie/1-10.png",
            "./img/chunjie/1-11.png",
            "./img/chunjie/1-12.png",
            "./img/chunjie/1-13.png",
            "./img/chunjie/1-14.png",
            "./img/chunjie/1-15.png",
            "./img/chunjie/1-16.png",
            "./img/chunjie/1-17.png",
            "./img/chunjie/1-2.png",
            "./img/chunjie/1-3.png",
            "./img/chunjie/1-4.png",
            "./img/chunjie/1-5.png",
            "./img/chunjie/1-6.png",
            "./img/chunjie/1-7.png",
            "./img/chunjie/1-8.png",
            "./img/chunjie/1-19.png",
            "./img/chunjie/1-18.png",
            "./img/chunjie/1-9.png"
			];

            
        function init(){

            init_all();

        }
		function height_to_x(selecter,x){
			var h = $(selecter).height();
			h = h*x;
			return h;
		}
		function width_to_x(selecter,x){
			var w = $(selecter).width();
			w = w*x;
			return w;
		}
        
            function init_layer1(){
				var w_19 = width_to_x(".layer1 .layer1-19",0.13);
				var h_19 = height_to_x(".layer1 .layer1-19",1);
				var w_17 = width_to_x(".layer1 .layer1-17",0);
				var h_17 = height_to_x(".layer1 .layer1-17",1);
				var w_16 = width_to_x(".layer1 .layer1-16",1);
				var h_16 = height_to_x(".layer1 .layer1-16",0);
				var w_14 = width_to_x(".layer1 .layer1-14",1);
				var h_14 = height_to_x(".layer1 .layer1-14",1);
				var w_p1 = width_to_x(".page1",1);
				var h_p1 = height_to_x(".page1",1);
				var w_p2 = width_to_x(".page2",1);
				var h_p2 = height_to_x(".page2",1);
				var w_2 = width_to_x(".layer1 .layer1-2",1);
				var h_2 = height_to_x(".layer1 .layer1-2",0);
				var w_4 = width_to_x(".layer1 .layer1-4",1);
				var h_4 = height_to_x(".layer1 .layer1-4",1);
				var w_6 = width_to_x(".layer1 .layer1-6",1);
				var h_6 = height_to_x(".layer1 .layer1-6",1);
				$(".layer1 .layer1-19").css({clip:'rect(0px,'+w_19+'px,'+h_19+'px,0px)'});
				$(".layer1 .layer1-2").css({y:"70%",clip:'rect(0px,'+w_2+'px,'+h_2+'px,0px)'});
                $(".layer1 .layer1-4").css({x:"100%",clip:'rect(0px,0px,'+h_4+'px,0px)'});
                $(".layer1 .layer1-6").css({x:"-100%",clip:'rect(0px,'+w_6+'px,'+h_6+'px,'+w_6+'px)'});
                $(".page1").css({clip:'rect('+h_p1*0.455+'px,'+w_p1+'px,'+h_p1+'px,0px)'});
                $(".page2").css({clip:'rect(0px,'+w_p2+'px,'+h_p2*0.555+'px,0px)'});
                $(".layer1 .layer1-9").css({scale:0,opacity:0});
                $(".layer1 .layer1-10").css({scale:0,opacity:0});
                $(".layer1 .layer1-11").css({scale:0,opacity:0});
                $(".layer1 .layer1-14").css({transformOrigin:"50% -150%",y:"-100%",clip:'rect('+h_14+'px,'+w_14+'px,'+h_14+'px,0px)'});
                $(".layer1 .layer1-15").css({transformOrigin:"50% -5000%"});
                $(".layer1 .layer1-16").css({transformOrigin:"50% 0%",y:"70%",clip:'rect(0px,'+w_16+'px,'+h_16+'px,0px)'});
                $(".layer1 .layer1-17").css({clip:'rect(0px,'+w_17+'px,'+h_17+'px,0px)'});
                $(".text1").css({y:"-100%",opacity:0});
				$(".text2").css({y:"-100%",opacity:0});
				$(".text3").css({y:"-100%",opacity:0});
				$(".text4").css({y:"-100%",opacity:0});
				$(".text5").css({y:"-100%",opacity:0});
				$(".text6").css({y:"-100%",opacity:0});
				$(".text7").css({y:"-100%",opacity:0});
			
            }

            function layer1_in(){
				var w_17 = width_to_x(".layer1 .layer1-17",1);
				var h_17 = height_to_x(".layer1 .layer1-17",1);
				var w_16 = width_to_x(".layer1 .layer1-16",1);
				var h_16 = height_to_x(".layer1 .layer1-16",1);
				var w_14 = width_to_x(".layer1 .layer1-14",1);
				var h_14 = height_to_x(".layer1 .layer1-14",1);
                $(".layer1 .layer1-14").transition({y:"0%",clip:'rect(0px,'+w_14+'px,'+h_14+'px,0px)'},1000);
                $(".layer1 .layer1-16").transition({y:"-30%",clip:'rect(0px,'+w_16+'px,'+h_16+'px,0px)'},800,'linear').transition({y:"0%",clip:'rect(0px,'+w_16+'px,'+h_16*0.7+'px,0px)'},400);
                $(".layer1 .layer1-17").transition({clip:'rect(0px,'+w_17+'px,'+h_17+'px,0px)'},1000);
                
            }
			function nextIn(){
				var w_2 = width_to_x(".layer1 .layer1-2",1);
				var h_2 = height_to_x(".layer1 .layer1-2",1);
				var w_4 = width_to_x(".layer1 .layer1-4",1);
				var h_4 = height_to_x(".layer1 .layer1-4",1);
				var w_6 = width_to_x(".layer1 .layer1-6",1);
				var h_6 = height_to_x(".layer1 .layer1-6",1);
				$(".layer1 .layer1-2").transition({y:"-30%",clip:'rect(0px,'+w_2+'px,'+h_2+'px,0px)'},800,'linear').transition({y:"0%",clip:'rect(0px,'+w_2+'px,'+h_2*0.7+'px,0px)'},400);
				$(".layer1 .layer1-4").transition({x:"0%",clip:'rect(0px,'+w_4+'px,'+h_4+'px,0px)'},1600);
				$(".layer1 .layer1-6").transition({x:"0%",clip:'rect(0px,'+w_6+'px,'+h_6+'px,0px)'},1000);
				$(".layer1 .layer1-9").transition({scale:1,opacity:1},800,'easeOutBack');
			    $(".layer1 .layer1-10").delay(200).transition({scale:1,opacity:1},800,'easeOutBack');
				$(".text1").delay(300 ).transition({opacity:1,y:'0%'},800,"easeOutBack");
				$(".text2").delay(600 ).transition({opacity:1,y:'0%'},800,"easeOutBack");
				$(".text3").delay(900 ).transition({opacity:1,y:'0%'},800,"easeOutBack");
				$(".text4").delay(1200).transition({opacity:1,y:'0%'},800,"easeOutBack");
				$(".text5").delay(1500).transition({opacity:1,y:'0%'},800,"easeOutBack");
				$(".text6").delay(1800).transition({opacity:1,y:'0%'},800,"easeOutBack");
				$(".text7").delay(2100).transition({opacity:1,y:'0%'},800,"easeOutBack",function(){
					$(".layer1 .layer1-11").transition({scale:1,opacity:1},800,'easeOutBack');
				});
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
	function tiao(selecter){
		$(selecter).transition({y:'-40%',x:'30%'},100,'easeInQuart').transition({y:'0%',x:'60%'},100,"easeOutQuart");
		$(selecter).transition({y:'-40%',x:'90%'},100,'easeInQuart').transition({y:'0%',x:'120%'},100,"easeOutQuart");
		$(selecter).transition({y:'-40%',x:'150%'},100,'easeInQuart').transition({y:'0%',x:'180%'},100,"easeOutQuart");
		$(selecter).transition({y:'-40%',x:'210%'},100,'easeInQuart').transition({y:'0%',x:'240%'},100,"easeOutQuart");
		$(selecter).transition({y:'-40%',x:'270%'},100,'easeInQuart').transition({y:'0%',x:'300%'},100,"easeOutQuart");
		$(selecter).transition({y:'-40%',x:'330%'},100,'easeInQuart').transition({y:'0%',x:'360%'},100,"easeOutQuart");
		$(selecter).transition({y:'-40%',x:'390%'},100,'easeInQuart').transition({y:'0%',x:'420%'},100,"easeOutQuart");
		$(selecter).transition({y:'-40%',x:'450%'},100,'easeInQuart').transition({y:'0%',x:'480%',opacity:'0'},100,"easeOutQuart");
	}

    $(function(){
	var w_19 = width_to_x(".layer1 .layer1-19",1);
	var h_19 = height_to_x(".layer1 .layer1-19",1);
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
			
        });
        touch.on(".layer1 .layer1-10", 'swipeleft', function(){
        	mySwiper.swipeNext();
        });
        touch.on(".layer1 .layer1-10", 'swiperight', function(){
        	mySwiper.swipePrev();
        });
        touch.on(".layer1 .layer1-8", 'tap', function(){
        	mySwiper.swipeNext();
        });
        touch.on(".layer1 .layer1-7", 'tap', function(){
        	mySwiper.swipePrev();
        });
        var w_19 = width_to_x(".layer1 .layer1-19",1);
        var h_19 = height_to_x(".layer1 .layer1-19",1);
        touch.on(".layer1 .layer1-18", 'swiperight tap', function(){
        	tiao('.layer1 .layer1-18');
        	$(".layer1 .layer1-19").transition({clip:'rect(0px,'+w_19+'px,'+h_19+'px,0px)'},1500,"linear",function(){
        		$(".layer1 .layer1-17").transition({rotate:'5deg'},200).transition({rotate:'-5deg'},200).transition({rotate:'5deg'},200).transition({rotate:'-5deg'},200);
        		$(".layer1 .layer1-14").transition({rotate:'-5deg'},200).transition({rotate:'5deg'},200).transition({rotate:'-5deg'},200).transition({rotate:'5deg'},200);
        		$(".layer1 .layer1-15").transition({rotate:'-5deg'},200).transition({rotate:'5deg'},200).transition({rotate:'-5deg'},200).transition({rotate:'5deg'},200);
        		$(".layer1 .layer1-16").transition({rotate:'-5deg'},200).transition({rotate:'5deg'},200).transition({rotate:'-5deg'},200).transition({rotate:'5deg'},200,function(){});
        		var w_p1 = width_to_x(".page1",1);
        		var h_p1 = height_to_x(".page1",1);
        		var w_p2 = width_to_x(".page2",1);
        		var h_p2 = height_to_x(".page2",1);
        		$(".page1").delay(600).transition({clip:'rect('+h_p1+'px,'+w_p1+'px,'+h_p1+'px,0px)'},1000);
        		$(".page2").delay(600).transition({clip:'rect(0px,'+w_p2+'px,0px,0px)'},1000,function(){nextIn();});	
        	
        		$(this).fadeOut();
        		$(".layer1 .layer1-18").fadeOut();
        		
        	});
        });
	    response.config({
	        width:640,
	        height:1138
	    });
	    response.setBoxXCenter('#container1,#container2,#container3');
	    $(window).resize(function(){
	    	response.setBoxXCenter('#container1,#container2,#container3');
	    });
    });