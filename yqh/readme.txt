超级邀请函APP 后台控制系统数据接口

＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝

接口名称：获取邀请函信息 by uid 
接口地址：http://card.allappropriate.com/getmyevents
支持格式：JSON
请求方式：HTTP GET
请求示例：http://card.allappropriate.com/getmyevents?uid=0683300392
接口备注：升序 
请求参数：
  	名称 	类型 	必填 	说明
    uid
    
    
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝


接口名称：发布邀请活动 
接口地址：http://card.allappropriate.com/addmyevent
支持格式：JSON
请求方式：HTTP POST
请求示例：http://card.allappropriate.com/addmyevent
接口备注：模版ID必填项
请求参数：
  	名称 	类型 	必填 	说明
    userid                      0683300392
    username
    title
    content
    mobilenum 
    photo                    
    templateid               1 默认
    startime                 2015-01-14 11:55:52
    endtime                  2015-01-14 11:55:52       
    locations                工人体育场西路西门院内
    longitude
    latitude


＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝

接口名称：邀请函用户验证接口
接口地址：http://card.allappropriate.com/veruser
支持格式：JSON
请求方式：HTTP GET
请求示例：http://card.allappropriate.com/veruser?password=960871&moblilenum=13011101311
接口备注：先验证，手机号和密码
请求参数：
  	名称 	类型 	必填 	说明
    password
    moblilenum
  
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝

接口名称：邀请函用户注册接口step 1
接口地址：http://card.allappropriate.com/reguser1
支持格式：JSON
请求方式：HTTP GET
请求示例：http://card.allappropriate.com/reguser1?mobilenum=13800000000
接口备注：为注册用户返回 uid 和自动发送短信验证码 
请求参数：
  	名称 	类型 	必填 	说明
    mobilenum
    
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝

接口名称：邀请函用户注册接口 step 2
接口地址：http://card.allappropriate.com/reguser2
支持格式：JSON
请求方式：HTTP GET
请求示例：
http://card.allappropriate.com/reguser2?mobilenum=13800000000&smscode=xxxxxx;
http://card.allappropriate.com/reguser2?mobilenum=13800000000&smscode=xxxxxx&password=xxxxxx 
接口备注：为注册用户返回 uid 和自动发送短信验证码 
请求参数：
  	名称 	类型 	必填 	说明
    mobilenum
    smscode
    
    password       不能为空
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝

接口名称：邀请函模版详细信息获取接口
接口地址：http://card.allappropriate.com/gettmpinfo
支持格式：JSON
请求方式：HTTP GET
请求示例：http://card.allappropriate.com/gettmpinfo?templateid=1
接口备注：
请求参数：
  	名称 	类型 	必填 	说明
    templateid      Y
    


＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝

接口名称：邀请函模版获取模版接口
接口地址：http://card.allappropriate.com/gettmpall
支持格式：JSON
请求方式：HTTP GET
请求示例：http://card.allappropriate.com/gettmpall
接口备注：
请求参数：
  	名称 	类型 	必填 	说明
   cname

＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝

接口名称：邀请函活动多图片上传接口
接口地址：http://card.allappropriate.com/addpics
支持格式：JSON
请求方式：HTTP POST
请求示例：http://card.allappropriate.com/addpics
接口备注：
请求参数：
  	名称 	类型 	必填 	说明
  eventsid                  活动ID
  uploadN                   文件个数
  file
  
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝

接口名称：邀请函活动语音上传接口［支持历史语音记录］
接口地址：http://card.allappropriate.com/addvoice
支持格式：JSON
请求方式：HTTP POST
请求示例：http://card.allappropriate.com/addvoice
接口备注：支持amr 和 m4a 手机录音格式
请求参数：
  	名称 	类型 	必填 	说明
  eventsid                  活动ID
  uploadN                   文件个数
  file

＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝

接口名称：邀请函活动小视频上传接口［支持历史视频记录］
接口地址：http://card.allappropriate.com/addmovie
支持格式：JSON
请求方式：HTTP POST
请求示例：http://card.allappropriate.com/addmovie
接口备注：支持mp4 mov手机视频格式
请求参数：
  	名称 	类型 	必填 	说明
  eventsid                  活动ID
  uploadN                   文件个数
  file
  
  
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝

接口名称：邀请函用户活动报名消息列表
接口地址：http://card.allappropriate.com/getmessage
支持格式：JSON
请求方式：HTTP GET
请求示例：http://card.allappropriate.com/getmessage?eventsid=4300527132
接口备注：
请求参数：
  	名称 	类型 	必填 	说明
  eventsid                  活动ID
  
  
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝

接口名称：邀请函用删除用户活动报名消息
接口地址：http://card.allappropriate.com/delmessage
支持格式：JSON
请求方式：HTTP GET
请求示例：http://card.allappropriate.com/delmessage?uid=4300527132
接口备注：
请求参数：
  	名称 	类型 	必填 	说明
  eventsid                  活动ID


＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝

接口名称：邀请函活动详情接口
接口地址：http://card.allappropriate.com/eventdetail
支持格式：JSON
请求方式：HTTP GET
请求示例：http://card.allappropriate.com/eventdetail?eid=4300527132
接口备注：报名的用户＃分割符
请求参数：
  	名称 	类型 	必填 	说明
  eid                  活动ID

＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝

接口名称：邀请函活动H5用户报名接口
接口地址：http://card.allappropriate.com/joinuser
支持格式：JSON
请求方式：HTTP GET
请求示例：http://card.allappropriate.com/joinuser?eid=4300527132&username=TOM&mobilenum=1360000000&eventitle=xxxxxx
接口备注：手机号验证过的用户，不能重复报名 所有数据项目必须填
请求参数：
  	名称 	类型 	必填 	说明


＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝



接口名称：邀请函活动H5用户投诉反馈接口
接口地址：http://card.allappropriate.com/addfeedback
支持格式：JSON
请求方式：HTTP GET
请求示例：http://card.allappropriate.com/addfeedback?uid=4300527132&cname=投诉&content=xxxxxxx
接口备注：用户反馈
请求参数：
  	名称 	类型 	必填 	说明


＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝



接口名称：邀请函活动用户自定义背景音乐接口
接口地址：http://card.allappropriate.com/musiclist
支持格式：JSON
请求方式：HTTP GET
请求示例：http://card.allappropriate.com/musiclist?eventsid=xxxxxx
接口备注：
请求参数：
  	名称 	类型 	必填 	说明


＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝


接口名称：邀请函活动用户自定义背景音乐接口
接口地址：http://card.allappropriate.com/sharemyevents
支持格式：JSON
请求方式：HTTP GET
请求示例：http://card.allappropriate.com/h5/sharemyevents?eid=4300527132&tmpid=12
接口备注：
请求参数：
  	名称 	类型 	必填 	说明

