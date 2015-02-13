 response = {
        option:{
            width:2,
            height:3
        },
        config:function(option){
            this.option = $.extend(this.option,option);
        },
        setCenter:function(selector){
            var w_w = $(window).width();
            var w_h = $(window).height();
            if(w_w/w_h>this.option.width/this.option.height){
                $(selector).css({backgroundSize:'100% auto',backgroundPosition:'center center'});
            }else{
                $(selector).css({backgroundSize:'auto 100%',backgroundPosition:'center center'});
            }
        },
        setXCenter:function(selector){
            var w_w = $(window).width();
            var w_h = $(window).height();
            $(selector).css({backgroundSize:(this.option.width*w_h)/(this.option.height*w_w)*w_w+'px '+w_h+'px',backgroundPosition:'center top'});
        },
        setTop:function(selector){
            $(selector).css({backgroundSize:'100%',backgroundPosition:'center top'});
        },
        setTopLeft:function(selector){
            $(selector).css({backgroundSize:'100%',backgroundPosition:'left top'});
        },
        setTopRight:function(selector){
            $(selector).css({backgroundSize:'100%',backgroundPosition:'right top'});
        },
        setBottom:function(selector){
            $(selector).css({backgroundSize:'100%',backgroundPosition:'center bottom'});
        },
        setBottomLeft:function(selector){
            $(selector).css({backgroundSize:'100%',backgroundPosition:'left bottom'});
        },
        setBottomRight:function(selector){
            $(selector).css({backgroundSize:'100%',backgroundPosition:'right bottom'});
        },
        setBoxCenter:function(selector){
            var w_w = $(window).width();
            var w_h = $(window).height();
            if(w_w/w_h>this.option.width/this.option.height){
                $(selector).css({width:w_w,height:w_w*this.option.height/this.option.width,y:-(w_w*this.option.height/this.option.width-w_h)/2});
            }else{
                $(selector).css({height:w_h,width:w_h*this.option.width/this.option.height,x:-(w_h*this.option.width/this.option.height-w_w)/2});
            }
        },
        setBoxResponse:function(selector){
            var w_w = $(window).width();
            var w_h = $(window).height();
            if(w_w/w_h>this.option.width/this.option.height){
                $(selector).css({height:w_h,width:w_h*this.option.width/this.option.height,left:(w_w-w_h*this.option.width/this.option.height)/2});
            }else{
                $(selector).css({width:w_w,height:w_w*this.option.height/this.option.width});
            }
        },
        setBoxXCenter:function(selector){
            var w_w = $(window).width();
            var w_h = $(window).height();
            if(w_w/w_h>this.option.width/this.option.height) {
                $(selector).css({height:w_h,width:w_h*this.option.width/this.option.height,left:(w_w-w_h*this.option.width/this.option.height)/2});
            }else{
                $(selector).css({height:w_h,width:w_h*this.option.width/this.option.height,left:(w_w-w_h*this.option.width/this.option.height)/2});
            }
        },
        setBoxXRight:function(selector){
            var w_w = $(window).width();
            var w_h = $(window).height();
            if(w_w/w_h>this.option.width/this.option.height) {
                $(selector).css({height:w_h,width:w_h*this.option.width/this.option.height,right:0});
            }else{
                $(selector).css({height:w_h,width:w_h*this.option.width/this.option.height,right:0});
            }
        },
        setImageXCenter:function(selector){
            var w_w = $(window).width();
            var w_h = $(window).height();
            if(w_w/w_h>this.option.width/this.option.height){
                $(selector).css({width:w_w,height:w_w*this.option.height/this.option.width});
            }else{
                $(selector).css({height:w_h,width:w_h*this.option.width/this.option.height,marginLeft:(w_w-w_h*this.option.width/this.option.height)/2});
            }
        },
    };