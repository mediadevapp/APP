    var selector = ".page";
    var loop = false;
    var images = [
            "./img/movie/1.jpg",
            "./img/movie/1-1.png",
            "./img/movie/1-10.png",
            "./img/movie/1-11.png",
            "./img/movie/1-12.png",
            "./img/movie/1-13.png",
            "./img/movie/1-14.png",
            "./img/movie/1-15.png",
            "./img/movie/1-16.png",
            "./img/movie/1-2.png",
            "./img/movie/1-3.png",
            "./img/movie/1-4.png",
            "./img/movie/1-5.png",
            "./img/movie/1-6.png",
            "./img/movie/1-17.png",
            "./img/movie/1-7.png",
            "./img/movie/1-8.png",
            "./img/movie/1-9.jpg"];

            
        function init(){

            init_all();

        }

        
            function init_layer1(){
				var w_11 = $(".layer1 .layer1-11").width();
				var w_15 = $(".layer1 .layer1-15").width();
				var h_11 = $(".layer1 .layer1-11").height();
				var w_5 = $(".layer1 .layer1-5").width();
				var w_7 = $(".layer1 .layer1-7").width();
				var h_5 = $(".layer1 .layer1-5").height();
                $(".layer1 .layer1-b").css({transform:"rotateX(90deg)"});
                $(".layer1 .layer1-10").css({scale:0,opacity:0});
                $(".layer1 .layer1-11").css({y:'75%',clip:"rect(0px,"+w_11+"px,0px,0px)"});
                $(".layer1 .layer1-12").css({y:"-100%",opacity:0});
                $(".layer1 .layer1-14").css({scale:0,opacity:0});
                $(".layer1 .layer1-15").css({y:'75%',clip:"rect(0px,"+w_15+"px,0px,0px)"});
                $(".layer1 .layer1-16").css({y:"-100%",opacity:0});
                $(".layer1 .layer1-2").css({scale:0,opacity:0});
                $(".layer1 .layer1-3").css({y:'75%',clip:"rect(0px,"+w_11+"px,0px,0px)"});
                $(".layer1 .layer1-5").css({y:'0%',clip:"rect(0px,"+w_5+"px,"+h_5*0.75+"px,0px)"});
                $(".layer1 .layer1-6").css({scale:0,opacity:0});
                $(".layer1 .layer1-17").css({scale:0,opacity:0});
                $(".layer1 .layer1-7").css({y:'90%',clip:"rect(0px,"+w_7+"px,0px,0px)"});
                $(".layer1 .layer1-8").css({y:"-100%",opacity:0});
				$(".text1").css({y:"-80%",opacity:0});
				$(".text2").css({y:"-80%",opacity:0});
				$(".text3").css({y:"-80%",opacity:0});
				$(".text4").css({y:"-80%",opacity:0});
				$(".text5").css({y:"-80%",opacity:0});
				$(".text6").css({y:"-80%",opacity:0});
				$(".text7").css({y:"-80%",opacity:0});
            }

            function layer1_in(){
				var w_11 = $(".layer1 .layer1-11").width();
				var h_11 = $(".layer1 .layer1-11").height();
				var w_15 = $(".layer1 .layer1-15").width();
				var h_15 = $(".layer1 .layer1-15").height();
				
                $(".layer1 .layer1-10").delay(400).transition({scale:1,opacity:1},800);
                $(".layer1 .layer1-11").delay(800).transition({y:'-25%',clip:"rect(0px,"+w_11+"px,"+h_11+"px,0px)"},800,'linear').transition({y:'0%',clip:"rect(0px,"+w_11+"px,"+h_11*0.75+"px,0px)"},400);
                $(".layer1 .layer1-12").delay(1000).transition({y:'0%',opacity:1},800);
                $(".layer1 .layer1-14").transition({scale:1,opacity:1},800);
                $(".layer1 .layer1-15").delay(400).transition({y:'-25%',clip:"rect(0px,"+w_15+"px,"+h_15+"px,0px)"},800,'linear').transition({y:'0%',clip:"rect(0px,"+w_15+"px,"+h_15*0.75+"px,0px)"},400);
                $(".layer1 .layer1-16").delay(600).transition({y:'0%',opacity:1},800);
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
	function nextIn(){
	var w_5 = $(".layer1 .layer1-5").width();
	var h_5 = $(".layer1 .layer1-5").height();
	var w_3 = $(".layer1 .layer1-3").width();
	var h_3 = $(".layer1 .layer1-3").height();
	var w_7 = $(".layer1 .layer1-7").width();
	var h_7 = $(".layer1 .layer1-7").height();
	$(".layer1 .layer1-17").delay(200).transition({scale:1,opacity:1},800);
	$(".layer1 .layer1-5").transition({y:'-25%',clip:"rect(0px,"+w_5+"px,"+h_5+"px,0px)"},400,'linear').transition({y:'0%',clip:"rect(0px,"+w_5+"px,"+h_5*0.75+"px,0px)"},400);
	$(".text1").delay(200).transition({y:'0%',opacity:1},1000);
	$(".layer1 .layer1-2").delay(0).transition({scale:1,opacity:1},800);
    $(".layer1 .layer1-3").delay(300).transition({y:'-25%',clip:"rect(0px,"+w_3+"px,"+h_3+"px,0px)"},600,'linear').transition({y:'0%',clip:"rect(0px,"+w_3+"px,"+h_3*0.75+"px,0px)"},300);
	$(".layer1 .layer1-6").delay(400).transition({scale:1,opacity:1},800);
	$(".layer1 .layer1-7").delay(1000).transition({y:'-10%',clip:"rect(0px,"+w_7+"px,"+h_7+"px,0px)"},600,'linear').transition({y:'0%',clip:"rect(0px,"+w_7+"px,"+h_7*0.9+"px,0px)"},300);
	$(".layer1 .layer1-8").delay(1000).transition({y:'0%',opacity:1},800);
	$(".text2").delay(200).transition({y:'0%',opacity:1},1000);
	$(".text3").delay(400).transition({y:'0%',opacity:1},1000);
	$(".text4").delay(600).transition({y:'0%',opacity:1},1000);
	$(".text5").delay(800).transition({y:'0%',opacity:1},1000);
	$(".text6").delay(1000).transition({y:'0%',opacity:1},1000);
	$(".text7").delay(1200).transition({y:'0%',opacity:1},1000);
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

			touch.on(".layer1 .layer1-13", "tap", function(){
				$(".layer1 .layer1-b").transition({perspective: '500px',rotateX:'0deg'},800,function(){nextIn();});			
			});
        });
        response.config({
            width:640,
            height:1138
        });
        response.setBoxResponse('#container1,#container2');
    });