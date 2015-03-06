 var selector = ".page";
    var loop = false;
    var images = [
            "./img/yedian/1.jpg",
            "./img/yedian/1-1.png",
            "./img/yedian/1-10.png",
            "./img/yedian/1-2.png",
            "./img/yedian/1-3.png",
            "./img/yedian/1-4.png",
            "./img/yedian/1-5.jpg",
            "./img/yedian/1-6.jpg",
            "./img/yedian/1-7.png",
            "./img/yedian/1-8.png",
            "./img/yedian/1-9.png"];

            
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
		function zhuan(selecter,x,time){
			//$(selecter).css({rotate:'0deg'});
			if(!time){
				time=600;
			}
			if(x==1){
				$(selecter).transition({rotate:'+=30deg'},time,'linear',function(){zhuan(this,1)});
			}else{
				$(selecter).transition({rotate:'-=30deg'},time,'linear',function(){zhuan(this,0)});
			}	
		}
            function init_layer1(){
                $(".layer1 .layer1-1").css({opacity:0});
                $(".layer1 .layer1-2").css({x:'-130%'});
			    $(".layer1 .text2").css({opacity:0,scale:0});
                $(".layer1 .text3").css({opacity:0,scale:0});
                $(".layer1 .text4").css({opacity:0,scale:0});
                $(".layer1 .text5").css({opacity:0,scale:0});
                $(".layer1 .text6").css({opacity:0,scale:0});
                $(".layer1 .text7").css({opacity:0,scale:0});
                $(".layer1 .text1").css({opacity:0,scale:0});
                yuangui(".layer1 .layer1-7");
                yuangui(".layer1 .layer1-8");
                yuangui(".layer1 .layer1-9");
				$(".layer1 .layer1-9").css({scale:0,opacity:0});
				$(".layer1 .layer1-8").css({opacity:0.6});
				$(".layer1 .layer1-7").css({scale:0,opacity:0});
            }
			function nextIn(){
				$(".layer1 .layer1-1").transition({opacity:1},100).transition({opacity:0},100).transition({opacity:1},100).transition({opacity:0},100).transition({opacity:1},100).transition({opacity:0},100).transition({opacity:1},100);
				$(".layer1 .layer1-2").transition({x:'0%'},800,function(){
				$(".layer1 .text2").delay(0).transition({opacity:1,scale:1},600,'easeOutBack');
                $(".layer1 .text3").delay(200).transition({opacity:1,scale:1},600,'easeOutBack');
                $(".layer1 .text4").delay(400).transition({opacity:1,scale:1},600,'easeOutBack');
                $(".layer1 .text5").delay(600).transition({opacity:1,scale:1},600,'easeOutBack');
                $(".layer1 .text6").delay(800).transition({opacity:1,scale:1},600,'easeOutBack');
                $(".layer1 .text7").delay(1000).transition({opacity:1,scale:1},600,'easeOutBack');
                $(".layer1 .text1").delay(1200).transition({opacity:1,scale:1},600,'easeOutBack');
				});
			}
            function layer1_in(){
                $(".layer1 .layer1-7").delay(300).transition({opacity:1,scale:1},500,'easeOutBack');
                $(".layer1 .layer1-9").transition({scale:1,opacity:0.6},500);
				zhuan('.layer1 .layer1-9',0);
				zhuan('.layer1 .layer1-8',1);
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


            init_all();
            setTimeout(function(){
                layer1_in();
            }, 500);
			touch.on(".layer1 .layer1-8,.layer1 .layer1-10", "tap swipe", function(){
				$(".layer1 .layer1-8").transition({opacity:1},100).transition({rotate:'+=360deg'},1000);
				$(".layer1 .layer1-9").transition({opacity:1},100).transition({rotate:'-=360deg'},1000,function(){
					$(".layer1 .layer1-8,.layer1 .layer1-9,.layer1 .layer1-7,.layer1 .layer1-10").transition({opacity:0},500,function(){
					$(this).hide();
					});
				});
				
				$(".layer1 .layer1-5").delay(1100).transition({y:'-100%'},800);
				$(".layer1 .layer1-6").delay(1100).transition({y:'100%'},800,function(){
				$(".layer1 .layer1-8").stop();
				$(".layer1 .layer1-9").stop();
				nextIn();
				});
			});
			touch.on(".button","tap",function(){
				$(this).transition({scale:1.3},300).transition({scale:1},200);
			});
        });
    });