document.write(unescape("%3Cscript src='http://res.wx.qq.com/open/js/jweixin-1.0.0.js' type='text/javascript'%3E%3C/script%3E"));

var wyq_Service_api = 'http://service.wyaoqing.com';
var wx_js_run = false;
var wx_Interval = null;
var wx_Tickt = null;
function js_weixin(){
    if(typeof wx == "undefined" || wx_js_run === true ){
        return;
    } else {
        wx_js_run = true;
        clearInterval(wx_Interval);
    }
    wx.config({
        debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
        appId: 'wx583ef91b0fe14ef2', // 必填，公众号的唯一标识
        timestamp:wx_Tickt.timestamp , // 必填，生成签名的时间戳
        nonceStr: wx_Tickt.noncestr, // 必填，生成签名的随机串
        signature: wx_Tickt.signature,// 必填，签名，见附录1
        jsApiList: ['onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ','onMenuShareWeibo','startRecord','stopRecord','onVoiceRecordEnd','playVoice','pauseVoice','stopVoice','onVoicePlayEnd','uploadVoice','downloadVoice','chooseImage','previewImage','uploadImage','downloadImage','translateVoice','getNetworkType','openLocation','getLocation','hideOptionMenu','showOptionMenu','hideMenuItems','showMenuItems','hideAllNonBaseMenuItem','showAllNonBaseMenuItem','closeWindow','scanQRCode','chooseWXPay','openProductSpecificView','addCard','chooseCard','openCard'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
    });
    wx.ready(function(){
        var $body = $('body'), appId = '',
            title = $body.attr('title'),
            imgUrl = $body.attr('icon'),
            link = $body.attr('link'),
            desc = $body.attr('desc') || ' ';

        wx.onMenuShareTimeline({
            title: title, // 分享标题
            link: link, // 分享链接
            imgUrl: imgUrl, // 分享图标
            success: function () {
                statics(3);
                if(isExitsFunction('shareTimeLineCallback')){
                    shareTimeLineCallback();
                }
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
                statics(4);
            }
        });
        wx.onMenuShareAppMessage({
            title: title, // 分享标题
            link: link, // 分享链接
            imgUrl: imgUrl, // 分享图标
            desc: desc, // 分享描述
            type: '', // 分享类型,music、video或link，不填默认为link
            dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
            success: function () {
                statics(3);
                if(isExitsFunction('shareTimeLineCallback')){
                    shareTimeLineCallback();
                }
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
                statics(4);
            }
        });

        wx.onMenuShareQQ({
            title: title, // 分享标题
            link: link, // 分享链接
            imgUrl: imgUrl, // 分享图标
            desc: desc, // 分享描述
            success: function () {
                statics(3);
                if(isExitsFunction('shareTimeLineCallback')){
                    shareTimeLineCallback();
                }
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
                statics(4);
            }
        });

        wx.onMenuShareWeibo({
            title: title, // 分享标题
            link: link, // 分享链接
            imgUrl: imgUrl, // 分享图标
            desc: desc, // 分享描述
            success: function () {
                statics(3);
                if(isExitsFunction('shareTimeLineCallback')){
                    shareTimeLineCallback();
                }
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
                statics(4);
            }
        });

    });


}

function isExitsFunction(funcName) {
    try {
        if (typeof(eval(funcName)) == "function") {
            return true;
        }
    } catch(e) {}
    return false;
}

function getJsTicket(){
    var url = window.location.href;
    $.get(wyq_Service_api+'/api/weixinapi/getJsTicket',{url:url},function(msg){
        wx_Tickt = msg.data;
        if(msg.code == 1){
            js_weixin();
            wx_Interval =setInterval(js_weixin,500);
        }
    });
}
getJsTicket();

function statics(type){
    var url = window.location.href;
    console.log(campaign_id);
    $.post(wyq_Service_api+'/api/statics/campaign',{url:url,campaign_id:campaign_id,type:type},function(msg){
        console.log(msg);
    });
}
$(function(){
    //statics(2);
});


var _hmt = _hmt || [];

(function() {
    var hm = document.createElement("script");
    hm.src = "//hm.baidu.com/hm.js?2d76c4203518deeeacf33a50a8f7625e";
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(hm, s);
})();