接口名称：十二星座宝典
接口地址：http://star.allappropriate.com/book.php
支持格式：JSON
请求方式：HTTP GET
请求示例：http://star.allappropriate.com/book.php?name=1
接口备注：content1 传说 content2 特点 content3 爱情
白羊座＝1
金牛座＝2
－－－－－
双鱼座＝12

请求参数：
  	名称 	类型 	必填 	说明
  	name    int  Yes     

＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝

接口名称：十二星座星文
接口地址：http://star.allappropriate.com/article.php
支持格式：JSON
请求方式：HTTP GET
请求示例：http://star.allappropriate.com/article.php
接口备注：count1:点赞计数 count2:评论计数 count3:转发计数
请求参数：
  	名称 	类型 	必填 	说明

＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ 	   

接口名称：星座达人秀用户列表
接口地址：http://star.allappropriate.com/userlist.php
支持格式：JSON
请求方式：HTTP GET
请求示例：http://star.allappropriate.com/userlist.php
接口备注：order 排名顺序 uid主键
请求参数：
  	名称 	类型 	必填 	说明
 
 
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ 	   

接口名称：星座APP用户详细信息
接口地址：http://star.allappropriate.com/userdetail.php
支持格式：JSON
请求方式：HTTP GET
请求示例：http://star.allappropriate.com/userdetail.php?uid=6283429397 
接口备注：pics 用户资料图片';'分割 返回用户所有个人信息
请求参数：
  	名称 	类型 	必填 	说明
  	uid     INT     YES
  	
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ 	   

接口名称：星座APP用户好友列表
接口地址：http://star.allappropriate.com/userfriend.php
支持格式：JSON
请求方式：HTTP GET
请求示例：http://star.allappropriate.com/userfriend.php?uid=6283429397  	
接口备注：
请求参数：
  	名称 	类型 	必填 	说明
  	uid     INT     YES  	
  	
  	
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ 	   

接口名称：星座APP用户粉丝列表
接口地址：http://star.allappropriate.com/userfans.php
支持格式：JSON
请求方式：HTTP GET
请求示例：http://star.allappropriate.com/userfans.php?uid=6283429397  	
接口备注：
请求参数：
  	名称 	类型 	必填 	说明
  	uid     INT     YES  	
  	
  	
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ 	   

接口名称：星座APP用户关注列表
接口地址：http://star.allappropriate.com/userfollow.php
支持格式：JSON
请求方式：HTTP GET
请求示例：http://star.allappropriate.com/userfollow.php?uid=6283429397  	
接口备注：
请求参数：
  	名称 	类型 	必填 	说明
  	uid     INT     YES  	
  	
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ 	   
	  
接口名称：星座APP好友圈内容列表
接口地址：http://star.allappropriate.com/friendcontent.php
支持格式：JSON
请求方式：HTTP GET
请求示例：http://star.allappropriate.com/friendcontent.php?id=6283429397 	
接口备注： 
请求参数：
  	名称 	类型 	必填 	说明
  	id     string     YES  	
  	
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝  

接口名称：星座APP用户朋友圈权限接口 不让他看我的朋友圈
接口地址：http://star.allappropriate.com/nolookf.php
支持格式：JSON
请求方式：HTTP GET
请求示例：http://star.allappropriate.com/nolookf.php
接口备注：返回值 当前被操作的用户fid,可以是数组分割符“:”
请求参数：
  	名称 	    类型 	  必填 	说明
  	uid                YES  	当前用户ID
  	fid                YES      被操作用户ID
  	allow                        Y or N
  	
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ 	   



接口名称：星座APP用户朋友圈权限接口 我不看TA的朋友圈
接口地址：http://star.allappropriate.com/nolook.php
支持格式：JSON
请求方式：HTTP GET
请求示例：http://star.allappropriate.com/nolook?fid=6283429397&uid=5110891531&allow=N
接口备注：返回值 当前被操作的用户fid,可以是数组分割符“:” fid=6283429397:9726040990
请求参数：
  	名称 	    类型 	  必填 	说明
  	uid                YES  	当前用户ID
  	fid                YES      被操作用户ID
  	allow                        Y or N
  	
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ 	
接口名称：星座APP用户运势接口 //演示接口
接口地址：http://star.allappropriate.com/getall
支持格式：JSON
请求方式：HTTP GET
请求示例：http://star.allappropriate.com/getall
接口备注：
请求参数：
  	名称 	类型 	必填 	说明
  	
  	
  	
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ 	   

接口名称：星座APP用户获取验证码接口
接口地址：http://star.allappropriate.com/mobilesms?mobnum=13800000000
支持格式：JSON
请求方式：HTTP GET
请求示例：http://star.allappropriate.com/mobilesms?mobnum=13800000000
接口备注：
请求参数：
  	名称 	类型 	必填 	说明
	
  	
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ 	   

接口名称：星座APP发现用户接口
接口地址：http://star.allappropriate.com/finduser
支持格式：JSON
请求方式：HTTP GET
请求示例：http://star.allappropriate.com/finduser?uid=6283429397
接口备注：
请求参数：
  	名称 	类型 	必填 	说明
	uid
  	
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ 	   

接口名称：星座APP用户测试题目内容接口
接口地址：http://star.allappropriate.com/testlist
支持格式：JSON
请求方式：HTTP GET
请求示例：http://star.allappropriate.com/testlist
接口备注：
请求参数：
  	名称 	类型 	必填 	说明

＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ 	   

接口名称：星座APP用户个人修改头像接口
接口地址：http://star.allappropriate.com/uploader/uppoo
支持格式：JSON
请求方式：HTTP POST
请求示例：http://star.allappropriate.com/uploader/uppoo
接口备注：enctype="multipart/form-data"  uid=6283429397
请求参数：
  	名称 	类型 	必填 	说明
        uid             YES      
        file            YES 
        
        
        
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ 	   

接口名称：星座APP用户信息修改接口
接口地址：http://star.allappropriate.com/usermodify
支持格式：JSON
请求方式：HTTP POST
请求示例：http://star.allappropriate.com/usermodify
接口备注：修改数据项需要注意，每一个字段需要做处理，不能为空
请求参数：
  	名称 	类型 	必填 	说明
        uid             YES
        
        mobilenum
        nickname
        phrase
        xing
        birthday      
        password

        
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ 	   

接口名称：星座APP查找用户接口
接口地址：http://star.allappropriate.com/finduserbyname
支持格式：JSON
请求方式：HTTP POST
请求示例：http://star.allappropriate.com/finduserbyname?name=游民
接口备注：
请求参数：
  	名称 	类型 	必填 	说明
        name             YES      
        
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ 	   

接口名称：星座APP用户关注接口
接口地址：http://star.allappropriate.com/follow
支持格式：JSON
请求方式：HTTP POST
请求示例：http://star.allappropriate.com/follow
接口备注：
请求参数：
  	名称 	类型 	必填 	说明
       uid             YES      
       fid             YES
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ 	 


接口名称：星座APP用户取消关注接口
接口地址：http://star.allappropriate.com/qfollow
支持格式：JSON
请求方式：HTTP POST
请求示例：http://star.allappropriate.com/qfollow
接口备注：
请求参数：
  	名称 	类型 	必填 	说明
       uid             YES      
       fid             YES
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ 	  

接口名称：星座APP用户反馈内容接口
接口地址：http://star.allappropriate.com/feedback
支持格式：JSON
请求方式：HTTP POST
请求示例：http://star.allappropriate.com/feedback
接口备注：
请求参数：
  	名称 	类型 	必填 	说明
       nickname         YES      
       content          YES
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ 	
接口名称：星座APP用户朋友圈内容发布接口[图文]
接口地址：http://star.allappropriate.com/addpiccontent
支持格式：JSON
请求方式：HTTP POST
请求示例：http://star.allappropriate.com/addpiccontent
接口备注：发布图片 可选项
请求参数：
  	名称 	类型 	必填 	说明
       uid                   
       content
       file          YES
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ 	


接口名称：星座APP用户活动列表接口
接口地址：http://star.allappropriate.com/eventslist
支持格式：JSON
请求方式：HTTP GET
请求示例：http://star.allappropriate.com/eventslist
接口备注：title 活动标题 content 活动内容 photo 活动图片
请求参数：
  	名称 	类型 	必填 	说明
   
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ 	


接口名称：星座APP用户增加活动接口
接口地址：http://star.allappropriate.com/addevents
支持格式：JSON
请求方式：HTTP POST
请求示例：http://star.allappropriate.com/addevents
接口备注：
请求参数：
  	名称 	类型 	必填 	说明
   
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝




接口名称：星座APP星友圈点赞功能接口
接口地址：http://star.allappropriate.com/addcount
支持格式：JSON
请求方式：HTTP POST
请求示例：http://star.allappropriate.com/addcount?cid=3&zcount=1&uid=2696868409
接口备注：返回点赞数
请求参数：
  	名称 	类型 	必填 	说明
    uid                     点赞用户ID
    zcount                  初始赞点数
    cid                     内容ID
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ 

接口名称：星座APP星友圈评论功能接口
接口地址：http://star.allappropriate.com/addcomment
支持格式：JSON
请求方式：HTTP GET
请求示例：http://star.allappropriate.com/addcomment?uid=2696868409&cid=3&comment=好好好&nickname=大个头
接口备注：返回当前评论内容CID
请求参数：
  	名称 	类型 	必填 	说明
    nickname                点赞用户昵称
    comment                 评论内容
    cid                     文章ID
    uid                     用户ID
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ 

接口名称：星座APP登录验证功能接口
接口地址：http://star.allappropriate.com/veruser
支持格式：JSON
请求方式：HTTP GET
请求示例：http://star.allappropriate.com/veruser?mobilenum=13988888888&password=123
接口备注：返回UID
请求参数：
  	名称 	类型 	必填 	说明
    mobilenum                    用户注册手机号
    password

＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ 

接口名称：星座APP注册用户接口
接口地址：http://star.allappropriate.com/userregistered
支持格式：JSON
请求方式：HTTP POST
请求示例：http://star.allappropriate.com/userregistered
接口备注：返回UID
请求参数：
  	名称 	类型 	必填 	说明
    mobilenum                    用户注册手机号(必填)
    nickname                     用户昵称
    phrase                       签名
    sex                          性别
    xing                         星座
    birthday                     生日
    password                     密码


＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ 

接口名称：星座APP用户添加多个照片
接口地址：http://star.allappropriate.com/addpics
支持格式：JSON
请求方式：HTTP POST
请求示例：http://star.allappropriate.com/addpics
接口备注：返回Invalid file 上传错误  返回Success 上传成功 
请求参数：
	名称 	类型 	必填 	说明
    uid                     用户UID(必填)
    uploadN                 上传文件个数(必填)

＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ 

接口名称：星座APP用户 星文转发请求数据接口
接口地址：http://star.allappropriate.com/articlef
支持格式：JSON
请求方式：HTTP GET
请求示例：http://star.allappropriate.com/articlef?aid=0134429197
接口备注：
请求参数：
	名称 	类型 	必填 	说明
    aid                     星文编号ID(必填)

    
    
    
    