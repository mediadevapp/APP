function submit(){
	var real_name = $("#name").val();
	var mobile = $("#mobile").val();
	var econtent = $("#content_text").val();

	if(real_name == ""){
		alert("请填写您的姓名");
		return;
	}
	if(mobile == ""){
		alert("请填写您的手机");
		return;
	}

	if(!testMobile(mobile)){
		alert("请填写正确的手机号");
		return;
	}
	$.get("http://card.allappropriate.com/joinuser",
			{
				username: real_name,
				eid :eid,
				mobilenum:mobile,
				econtent:econtent,
				is_ajax:1}, function (data) {
				if(data.code == 0){
					alert(data.message);
				} else {
				    alert("提交成功!");
				    $('.content_black').transition({opacity:0,scale:0},500);
        			$('.dialog').fadeOut(500);
        			$('#attend_num').text(parseInt($('#attend_num').text())+1);
        			$.get('http://card.allappropriate.com/h5/gogogo?eid='+eid+'&tmpid='+tmpid,function(url){
        				if(url !== ''){
        					window.location.href=url;
        				}
        			})
				}
				$(".submit").unbind();
			},"json");
   	
}
function testMobile(str){
	var reg =  /^0?(13[0-9]|15[0-9]|18[0-9]|14[0-9]|17[0-9])[0-9]{8}$/;
	if(reg.test(str)){
		return true;
	}else{
		return false;
	}
}
function IsNum(e) {            
var k = window.event ? e.keyCode : e.which;            
if (((k >= 48) && (k <= 57)) || k == 8 || k == 0) {
            
	} else {
		if (window.event) {
		window.event.returnValue = false;
		}else {
		e.preventDefault(); //for firefox                 
		}            
	}        
} 
$(function(){
	setTimeout(function(){
		var x,y;
		x = $(window).width();
		x = x*0.85;
		y = $(window).height();
		y = y*0.567;
		$(".content_black").css({width:x+"px",height:y+"px"});
		var height=y*0.112;
		$(".input_div").css({lineHeight:height+"px"});
		$(".input_div input").css({lineHeight:height+"px"});
	},100);
	 $(document).delegate('#submit','touchstart',function(e){
		submit();
		e.stopPropagation();
	});
});