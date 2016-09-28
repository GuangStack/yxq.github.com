<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{config('app.webName')}}</title>
<meta name="keywords" content="交友,交友网,征婚交友,网上交友,征婚,征婚网,征婚交友网,交友中心,婚恋交友" />
<meta name="description" content="青春不常在，抓紧谈恋爱！缘分可遇也可求，该出手时就出手。世纪佳缘是严肃婚恋的交友平台，提供丰富多彩的交友征婚活动，1.7亿会员，让缘分千万里挑一！" />
<link rel="stylesheet" href="/home/css/base.css" />
<link href="/home/css/mydatamain.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="/home/js/jquery-1.4.2.min.js"></script>
<script src="/home/js/pv.js" type="text/javascript"></script>
<script type="text/javascript" src="/home/js/jy_mai.js"></script>
</head>
<body class="my-jiayuan-bodybg">
<div style="overflow:visible" class="jycm_top" id="jycm_top">
    <div style="" id="head_login" class="w1000">
        <div class="jycm_top_wel">
            <p id="head_user_nickname">Hi，<a href="http://www.jiayuan.com/148927769" target="_blank" class="color_fff">夜夜空里</a></p>
            <p id="head_user_level" class="memberIcon iconS1"><a target="_blank" href="http://www.jiayuan.com/club/" title="S1会员" onmousedown="jy_head_function.click_pv('|head_club_level|148927769');"></a></p>
            <p id="head_user_bean">心值<a target="_blank" class="color_fff" href="http://www.jiayuan.com/club/" onmousedown="jy_head_function.click_pv('|head_club_bean|148927769');">607</a><span style="display:none;" class="head_user_dhspan" id="head_user_duihuan"><img src="http://images1.jyimg.com/w4/common/i/head/jy_top_ly_tri.jpg" class="head_user_dhimg"><i class="head_user_dhi"><img onclick="headHideTips();" src="http://images1.jyimg.com/w4/common/i/head/jy_top_ly_close.jpg" id="head_user_dhclo"><b id="head_user_old_bean"></b>金豆即将过期，<a href="http://www.jiayuan.com/club/" target="_blank">马上去兑换超值礼物</a></i></span></p>
            <p id="head_user_uid">牵缘ID<a href="http://www.jiayuan.com/148927769" target="_blank" class="color_fff" onmousedown="jy_head_function.click_pv('|head_navigation_uid|148927769');">148927769</a></p>
            <p id="head_user_logout"><a href="http://login.jiayuan.com/logout2.php" class="color_fff" onmousedown="jy_head_function.click_pv('|head_navigation_logout|148927769');">退出</a></p>
        </div>
        <div class="jycm_top_right">
            
           

            <p class="jycm_top_collect ">
                <a href="javascript:;" onclick="jycm_addFav();" class="color_fff va_middle" id="jycm_top_collect_1"><i class="jy_top_icon jy_icon_collect"></i>收藏本站</a>
            </p>
            <p style="" id="vip_area_tel" class="jycm_top_zx "><i class="jy_top_icon jy_icon_tel"></i><span class="jy_txt"><span>红娘专线</span><strong>17310291681</strong></span></p>
        </div>
    </div>

</div>
<!-- 标准头 开始-->
<script type="text/javascript" src="/home/js/head_main.js"></script> 
<!-- 标准头 结束-->


<!--顶部提示条开始 -->

<style type="text/css">
.cp-menu-index{display:none} /*我的佳缘首页隐藏左菜单头*/
</style>
<!--顶部提示条结束 -->
<!-- 主体 开始 two div-->
<div class="my-jiayuan-doc1000 fn-clear">
    <!-- 左侧菜单 开始-->
    <style type="text/css">
/* 在不引入重置样式文件下保持样式正确兼容 */
.cp-menu,.cp-menu div,.cp-menu p,.cp-menu a,.cp-menu li,.cp-menu span,.cp-menu strong,.cp-menu i{font-family:\5b8b\4f53,simsun,'宋体','Hiragino Sans GB',Arial, Helvetica, sans-serif}
.cp-menu{width:170px;float:left;margin:10px 0 15px;}
.cp-menu li,.cp-menu ul{margin:0;padding:0}
.cp-menu ol,.cp-menu ul{list-style:none}
.cp-menu img{border:0}
.cp-menu a:link,
.cp-menu a:hover,
.cp-menu a:visited,
.cp-menu a:active{outline:none}
.cp-menu .fn-clear:after{visibility:hidden;display:block;font-size:0;content:" ";clear:both;height:0}
.cp-menu .fn-clear{zoom:1}
.cp-menu .fn-hide{display:none}
.cp-menu .fn-left{float:left}
.cp-menu .fn-right{float:right}
.cp-menu .menu-clear{clear:both;height:0;line-height:0;font-size:0}
/*圆角*/
.cp-menu-radius{width:auto;overflow:visible;font-size:12px;height:14px;line-height:14px;cursor:pointer;
background-image:url(/home/img/my-jiayuan-radius.png);
background-image:url(/home/img/my-jiayuan-radius.gif);
background-position:right -15px;
background-repeat:no-repeat}
.cp-menu-radius .cp-menu-radius-num{padding-left:7px;margin-right:6px;color:#fff;white-space:nowrap;text-align:center;line-height:14px;_line-height:15px;font-size:12px;min-width:6px;max-width:48px;
background-image:url(/home/img/my-jiayuan-radius.png);
background-image:url(/home/img/my-jiayuan-radius.gif)\9;
background-position:0 0;
background-repeat:no-repeat}
/*小ICON，new hot 人气 箭头 奖 灯泡*/
.cp-menu-ico-new{width:9px;height:16px;display:block;font-size:0;line-height:0;overflow:hidden;background:url(/home/img/my-jiayuan-left-icon-new.gif) 0 0 no-repeat}
.cp-menu-ico-hot{width:9px;height:12px;display:block;font-size:0;line-height:0;overflow:hidden;background:url(/home/img/my-jiayuan-left-icon-2.gif) 0 -270px no-repeat}
.cp-menu-ico-popularity{width:23px;height:17px;display:block;font-size:0;line-height:0;overflow:hidden;background:url(/home/img/popularity.gif) 0 0 no-repeat}
.cp-menu-ico-specials {width:23px;height:17px;display:block;font-size:0;line-height:0;overflow:hidden;background:url(/home/img/specials.gif) 0 0 no-repeat}
.cp-menu-ico-official{width:23px;height:17px;display:block;font-size:0;line-height:0;overflow:hidden;background:url(/home/img/official.gif) 0 0 no-repeat}
.cp-menu-ico-bulb{width:15px;height:17px;display:block;font-size:0;line-height:0;overflow:hidden;background:url(/home/img/my-jiayuan-left-icon-2.png) 0 -303px no-repeat;_background:url(/home/img/my-jiayuan-left-icon-2.gif) 0 -303px no-repeat}
.cp-menu-ico-arrow{width:7px;height:13px;font-size:0;line-height:12px;overflow:hidden;background:url(/home/img/my-jiayuan-left-icon-2.png) 0 -139px no-repeat;_background:url(/home/img/my-jiayuan-left-icon-2.gif) 0 -139px no-repeat}
/*服务图标*/
.cp-menu-service-ico{width:30px;height:25px;display:block;cursor:pointer;
background:url(/home/img/my-jiayuan-left-icon.png) no-repeat 0 0;_background:url(/home/img/my-jiayuan-left-icon.jpg) no-repeat 0 0}
.cp-menu-ico-zuanshi{background-position:0 0}/*钻石会员*/
.cp-menu-ico-kanxin{background-position:0 -25px}/*看信包月*/
.cp-menu-ico-juguang{background-position:0 -50px}/*聚光灯*/
.cp-menu-ico-paiming{background-position:0 -75px}/*排名提前*/
.cp-menu-ico-vip{background-position:0 -100px}/*VIP会员*/
.cp-menu-ico-gift{background-position:0 -125px}/*礼物商城*/
.cp-menu-ico-paycenter{background-position:0 -150px}/*购买邮票*/
.cp-menu-ico-account{background-position:0 -175px}/*邮票账户*/
.cp-menu-ico-paoxue{background-position:0 -200px}/*恋爱课堂*/
.cp-menu-ico-more{background-position:0 -225px}/*更多应用*/
.cp-menu-ico-lianai{background-position:0 -250px}/*恋爱宝*/
.cp-menu-ico-yue{background-position:0 -278px}/*约会吧*/
/*卡片区：头像*/
.cp-menu-card-user{border:solid 1px #d9d9d9;background:#fff;margin-bottom:15px;font:12px/1.5 tahoma,arial,\5b8b\4f53;padding-top:20px}
.cp-menu-card-user .menu-avatar{width:168px;height:168px;overflow:hidden;position:relative;margin:0 auto 7px}
.cp-menu-card-user .menu-avatar .menu-avatar-mask{width:168px;height:35px;background:#000;-moz-opacity:0.5;opacity:.50;filter:alpha(opacity=50);position:absolute;left:0;bottom:0;z-index:10}
.cp-menu-card-user .menu-avatar-110x168{width:110px;height:135px}
.cp-menu-card-user .menu-avatar-110x168 .menu-avatar-mask{width:110px;height:24px}
.cp-menu-card-user .menu-avatar a.modify-infos:link,
.cp-menu-card-user .menu-avatar a.modify-infos:hover,
.cp-menu-card-user .menu-avatar a.modify-infos:visited,
.cp-menu-card-user .menu-avatar a.modify-infos:active{width:110px;height:24px;line-height:24px;text-align:center;text-decoration:none;color:#aaa;display:block;position:absolute;left:0;bottom:0;z-index:11}
.cp-menu-card-user .menu-avatar a.modify-infos:hover{color:#fff}
/*卡片区：链接*/
.cp-menu-card-link{color:#2c81d6;line-height:26px;text-align:left;margin-bottom:14px;padding-left:27px}
.cp-menu-card-link a.menu:link,
.cp-menu-card-link a.menu:hover,
.cp-menu-card-link a.menu:visited,
.cp-menu-card-link a.menu:active{color:#2c81d6;text-decoration:none;display:inline-block;height:26px;line-height:26px}
.cp-menu-card-link a.menu:hover{text-decoration:underline}
.cp-menu-card-link a.cp-menu-ico-jiang:link,
.cp-menu-card-link a.cp-menu-ico-jiang:hover,
.cp-menu-card-link a.cp-menu-ico-jiang:visited,
.cp-menu-card-link a.cp-menu-ico-jiang:active{background:url(/home/img/my-jiayuan-left-icon-jiang.gif) 97px 6px no-repeat;display:block}
.cp-menu-card-note{width:120px;height:47px;margin:-9px auto 15px;padding:10px 14px 0;background:url(/home/img/no-img-note.png) no-repeat;font:12px/18px 'SimSun';color:#ff687b;}
.menu-status{display:inline-block;color:#666}

/*卡片区：收件箱谁看过我*/
.cp-menu-card-mail{position:relative}
.cp-menu-card-mail span{font-family:Microsoft YaHei;font-size:14px;color:#fff;line-height:36px}
.cp-menu-card-mail a.menu:link,
.cp-menu-card-mail a.menu:hover,
.cp-menu-card-mail a.menu:visited,
.cp-menu-card-mail a.menu:active{display:block;background:#0098c2;height:36px;font-family:Microsoft YaHei;font-size:14px;color:#fff;line-height:36px;text-align:center;text-decoration:none;position:relative}
.cp-menu-card-mail a.menu:hover{background:#008BB1;text-decoration:none}
.cp-menu-card-mail a.menu-left{width:83px;float:left}
.cp-menu-card-mail a.menu-right{width:84px;float:right}
.cp-menu-card-mail .menu-bulb{width:15px;height:17px;position:absolute;cursor:pointer;left:5px;top:-10px;line-height:0}/*灯泡*/
.cp-menu-card-mail .msglayer{background:url(/home/img/sxLayerBg.png) no-repeat 0 0;width:139px;height:86px;position:absolute;top:-90px;left:0px;z-index:31;display:none}/*引导弹层*/
.cp-menu-card-mail .msglayer .sxLayer{width:139px;height:86px;display:inline-block;background:none}
.cp-menu-card-mail .msglayer .sxLayerClose{cursor:pointer;position:absolute;top:3px;right:14px;width:20px;height:20px;background:none;z-index:50}
.cp-menu-card-mail .number{font-family:\5b8b\4f53,simsun,'宋体','Hiragino Sans GB';font-size:12px;height:14px;line-height:14px;position:absolute;right:0;top:-7px;cursor:pointer}
/*我的佳缘左侧栏目导航*/
.cp-menus{border:solid 1px #d9d9d9;background:#fff;padding-bottom:10px;font-family:\5b8b\4f53,simsun,'宋体','Hiragino Sans GB',Arial, Helvetica, sans-serif}/*菜单外框*/
/*菜单头，我的佳缘首页链接*/
.cp-menu-index{height:40px;border-bottom:solid 1px #d9d9d9;margin-bottom:9px}
.cp-menu-index a.menu:link,
.cp-menu-index a.menu:hover,
.cp-menu-index a.menu:visited,
.cp-menu-index a.menu:active{height:40px;display:block;font-family:Microsoft YaHei;font-size:14px;line-height:40px;color:#333;padding:0 0 0 55px;text-decoration:none;background:url(/home/img/my-jiayuan-left-icon-2.gif) 29px -48px no-repeat}
.cp-menu-index a.menu:hover{background-position:29px -88px;color:#ff546a}
/*顶级菜单样式*/
.cp-menu-items .cp-menu-title{display:block;height:34px}
.cp-menu-items .cp-menu-title a.menu:link,
.cp-menu-items .cp-menu-title a.menu:hover,
.cp-menu-items .cp-menu-title a.menu:visited,
.cp-menu-items .cp-menu-title a.menu:active{display:block;height:34px;color:#333;text-decoration:none}
.cp-menu-items .cp-menu-title a.menu:hover{background:#eee}
.cp-menu-items .cp-menu-title span.menuname{padding-left:24px;height:34px;float:left;display:inline-block;font-size:14px;line-height:34px;color:#333;font-weight:bold;font-family:Microsoft YaHei}
.cp-menu-items .cp-menu-title span.namecur{cursor:pointer}
.cp-menus .cp-menu-title a.menu .cp-menu-ico-arrow{display:inline-block;margin:11px 0 0 8px;_margin-top:10px}
/*二级菜单样式，默认效果（文本类型）*/
.cp-menu-items{padding-top:10px;margin-bottom:8px}
.cp-menu-items li{float:left;width:168px;height:32px;font-size:12px;line-height:32px}
.cp-menu-items li.oning{background:#e5e5e5}
.cp-menu-items li a.menu:link,
.cp-menu-items li a.menu:hover,
.cp-menu-items li a.menu:visited,
.cp-menu-items li a.menu:active{height:32px;line-height:32px;display:block;padding:0 10px 0 24px;color:#666;position:relative;text-decoration:none}
.cp-menu-items li a.menu:hover{background:#eee}
.cp-menu-items li .cp-menu-item-name{font-size:12px;height:32px;line-height:32px;text-align:left;color:#666;cursor:pointer}
.cp-menu-items li .cp-menu-link-place{position:absolute;bottom:15px;right:147px;z-index:10}
.cp-menu-items li .cp-menu-item-name{font-size:12px;height:32px;line-height:32px;text-align:left;color:#666;cursor:pointer;_padding-top:3px;_height:29px;_line-height:29px}
.cp-menu-items li .cp-menu-link-place{position:absolute;bottom:15px;right:147px;z-index:10;cursor:pointer}
.cp-menu-items li .cp-menu-item-number{font-family:\5b8b\4f53,simsun,'宋体','Hiragino Sans GB';font-size:12px;height:14px;line-height:14px;position:absolute;right:10px;top:9px;cursor:pointer}
/*二级菜单样式，图片类型*/
.cp-menu-items ul.cp-menu-image{float:left;padding:0 12px}
.cp-menu-items li.cp-menu-service-img{width:72px;height:43px;text-align:center;background-color:#fff;padding:7px 0}
.cp-menu-items li.cp-menu-service-img a.menu:link,
.cp-menu-items li.cp-menu-service-img a.menu:hover,
.cp-menu-items li.cp-menu-service-img a.menu:visited,
.cp-menu-items li.cp-menu-service-img a.menu:active{height:43px;line-height:18px;width:50px;margin:0 auto;padding-left:0;padding-right:0}
.cp-menu-items li.cp-menu-service-img a.menu:hover{background:#fff}
.cp-menu-items li.cp-menu-service-img i.cp-menu-service-ico{display:block;margin:0 auto;cursor:pointer}
.cp-menu-items li.cp-menu-service-img a.menu:hover i.cp-menu-ico-zuanshi{background-position:-30px 0}
.cp-menu-items li.cp-menu-service-img a.menu:hover i.cp-menu-ico-kanxin{background-position:-30px -25px}
.cp-menu-items li.cp-menu-service-img a.menu:hover i.cp-menu-ico-juguang{background-position:-30px -50px}
.cp-menu-items li.cp-menu-service-img a.menu:hover i.cp-menu-ico-paiming{background-position:-30px -75px}
.cp-menu-items li.cp-menu-service-img a.menu:hover i.cp-menu-ico-vip{background-position:-30px -100px}
.cp-menu-items li.cp-menu-service-img a.menu:hover i.cp-menu-ico-gift{background-position:-30px -125px}
.cp-menu-items li.cp-menu-service-img a.menu:hover i.cp-menu-ico-paycenter{background-position:-30px -150px}
.cp-menu-items li.cp-menu-service-img a.menu:hover i.cp-menu-ico-account{background-position:-30px -175px}
.cp-menu-items li.cp-menu-service-img a.menu:hover i.cp-menu-ico-paoxue{background-position:-30px -200px}
.cp-menu-items li.cp-menu-service-img a.menu:hover i.cp-menu-ico-more{background-position:-30px -225px}
.cp-menu-items li.cp-menu-service-img a.menu:hover i.cp-menu-ico-lianai{background-position:-30px -250px}
.cp-menu-items li.cp-menu-service-img a.menu:active i.cp-menu-ico-zuanshi{background-position:-60px 0}
.cp-menu-items li.cp-menu-service-img a.menu:active i.cp-menu-ico-kanxin{background-position:-60px -25px}
.cp-menu-items li.cp-menu-service-img a.menu:active i.cp-menu-ico-juguang{background-position:-60px -50px}
.cp-menu-items li.cp-menu-service-img a.menu:active i.cp-menu-ico-paiming{background-position:-60px -75px}
.cp-menu-items li.cp-menu-service-img a.menu:active i.cp-menu-ico-vip{background-position:-60px -100px}
.cp-menu-items li.cp-menu-service-img a.menu:active i.cp-menu-ico-gift{background-position:-60px -125px}
.cp-menu-items li.cp-menu-service-img a.menu:active i.cp-menu-ico-paycenter{background-position:-60px -150px}
.cp-menu-items li.cp-menu-service-img a.menu:active i.cp-menu-ico-account{background-position:-60px -175px}
.cp-menu-items li.cp-menu-service-img a.menu:active i.cp-menu-ico-paoxue{background-position:-60px -200px}
.cp-menu-items li.cp-menu-service-img a.menu:active i.cp-menu-ico-more{background-position:-60px -225px}
.cp-menu-items li.cp-menu-service-img a.menu:active i.cp-menu-ico-lianai{background-position:-60px -250px}
.cp-menu-items li.cp-menu-service-img a.menu:hover i.cp-menu-ico-yue{background-position:-30px -278px}
.cp-menu-items li.cp-menu-service-img a.menu:active i.cp-menu-ico-yue{background-position:-60px -278px}
.cp-menu-items li.cp-menu-service-img .cp-menu-item-name{width:50px;font-size:12px;height:18px;line-height:18px;text-align:center;color:#666;margin:0 auto;cursor:pointer}
.cp-menu-items li.cp-menu-service-img .cp-menu-link-place{position:absolute;top:-8px;left:-4px;z-index:10;cursor:pointer}
.cp-menu-items li.cp-menu-service-img .cp-menu-item-number{font-family:\5b8b\4f53,simsun,'宋体','Hiragino Sans GB';font-size:12px;height:14px;line-height:14px;position:absolute;right:0px;top:-9px;cursor:pointer;display:none}
/*左侧样式代码结束*/
/*左侧推荐完善资料文字样式开始*/
.cp-menu-card-notes {width: 120px;margin: -9px auto 15px;padding: 10px 14px;background: #f7f7f7;font: 12px/18px 'SimSun';color: #ff687b;border-radius: 3px;}
       
/*左侧推荐完善资料文字样式结束*/
</style>


<div class="cp-menu">
        <!--会员介绍-->
    <div class="cp-menu-card-user">
        <div class="menu-avatar menu-avatar-110x168">
                            <a href="{{url('/home/myqianyuan/details')}}/{{4}}" onmousedown="send_jy_pv2('|cp_menu_photo_upload|135859241');" target="_blank"><img src="/home/img/419628f33a87e950f21c4ff616385343faf2b4bc.jpg" width="110" height="135" id="user_avatar" /></a>
                    </div>
        <div class="cp-menu-card-link">
            <a class="menu" href="{{url('/home/myqianyuan/details')}}/{{4}}" title="立刻提升" target="_blank" >靠谱度综合评分:2.7分</a>
            
                            <a class="menu" href="{{url('/home/myqianyuan/details')}}/{{4}}" onmousedown="send_jy_pv2('|cp_menu_card_mdy|135859241');" target="_blank">我的资料<?php echo rand(50,90)?>分</a>
                [<a class="menu" href="{{url('/home/myqianyuan/details')}}/{{4}}" onmousedown="send_jy_pv2('|cp_menu_card_pre|135859241');" target="_blank">预览</a>]
                    </div>

        <div class="cp-menu-card-mail fn-clear">
            <a class="menu menu-left" href="{{url('/home/msg/index')}}" onmousedown="send_jy_pv2('|cp_menu_area_msg|135859241');" title="未读信件{{$countreceive}}封">
                <span>收件箱</span>
                <div class="cp-menu-radius number fn-right">
                    <div class="cp-menu-radius-num">{{$countreceive}}</div>
                </div>
            </a>
            <a class="menu menu-right" href="{{'/home/msg/seeme'}}/{{4}}" onmousedown="send_jy_pv2('|cp_menu_area_lookedme|135859241');">
                <span>谁看过我</span>
                <div class="cp-menu-radius number" id="menu_looked_me_box" style="display:none">
                    <div class="cp-menu-radius-num" id="menu_looked_me">0</div>
                </div>
            </a>
            <div class="menu-clear"></div>
                        <div class="menu-bulb"><i class="cp-menu-ico-bulb fix-png"></i></div>
            <div class="msglayer fix-png" id="photo_scyd_fc">
                <a class="sxLayer" onmousedown="send_jy_pv2('|cp_menu_area_guide|135859241');" href="http://www.jiayuan.com/usercp/photo.php?no_photo=1&amp;from_type=usercp" target="_blank"></a>
                <a class="sxLayerClose" onClick="javascript:document.getElementById('photo_scyd_fc').style.display='none';" title="关闭"></a>
            </div>
                    </div>
    </div>
    <!--会员介绍 结束-->
          
    <div class="cp-menus">
        <div class="cp-menu-index"><a class="menu" href="http://usercp.jiayuan.com/" onmousedown="send_jy_pv2('|cp_menus_index|');">我的佳缘首页</a></div>
        
                                            
            <div class="cp-menu-items fn-clear">
                <div class="cp-menu-title fn-clear">
                                            <a class="menu" href="{{url('/home/service/index')}}" target="_blank" onmousedown="send_jy_pv2('Usercpn_service_0');">
                            <span class="menuname namecur">服务中心</span>
                            <i class="cp-menu-ico-arrow"></i>
                        </a>
                                    </div>
                
                                
                <ul class="cp-menu-image">
                      <li class=" cp-menu-service-img fn-left">
                                <a class="menu" id="service_1_a_1" target="_blank" href="{{url('/home/service/zuanshi')}}" onmousedown="send_jy_pv2('Usercpn_service_0_0');"  >
                                    <i class="cp-menu-service-ico cp-menu-ico-zuanshi"></i>                                     <div class="cp-menu-item-name">钻石会员</div>                                       <div class="cp-menu-item-number">                                           <div class="cp-menu-radius fn-right">
                                                                                        <div id="s41" class="cp-menu-radius-num" style='display:none'></div>
                                        </div>
                                    </div>
                                                                            <i class="cp-menu-ico-specials cp-menu-link-place"></i>                                                                         </a>
                            </li>
                        
                                                                                                                                                                                                                    
                                                                                                                                                                                                                <li class=" cp-menu-service-img fn-left">
                                <a class="menu" id="service_1_a_2" target="_blank" href="{{url('/home/service/seeinfomation')}}" onmousedown="send_jy_pv2('Usercpn_service_0_1');"  >
                                    <i class="cp-menu-service-ico cp-menu-ico-kanxin"></i>                                      <div class="cp-menu-item-name">看信包月</div>                                       <div class="cp-menu-item-number">                                           <div class="cp-menu-radius fn-right">
                                                                                        <div id="s37" class="cp-menu-radius-num" style='display:none'></div>
                                        </div>
                                    </div>
                                                                    </a>
                            </li>
                        
                                                                                                                                                                                                                    
                                                                                                                                                                                                                <li class=" cp-menu-service-img fn-left">
                                <a class="menu" id="service_4" target="_blank" href="{{url('/home/myqianyuan/recharge')}}" onmousedown="send_jy_pv2('|1000136_0|');"  >
                                    <i class="cp-menu-service-ico cp-menu-ico-juguang"></i>                                     <div class="cp-menu-item-name"><cite style="padding-right:6px">聚</cite><cite style="padding-right:6px">光</cite><cite>灯</cite></div>                                     <div class="cp-menu-item-number">                                           <div class="cp-menu-radius fn-right">
                                                                                        <div id="fate" class="cp-menu-radius-num" style='display:none'></div>
                                        </div>
                                    </div>
                                                                    </a>
                            </li>
                        
                                                                                                                                                                                                                    
                                                                                                                                                                                                                <li class=" cp-menu-service-img fn-left">
                                <a class="menu" id="service_1_a_4" target="_blank" href="" onmousedown="send_jy_pv2('Usercpn_service_3_5');"  >
                                    <i class="cp-menu-service-ico cp-menu-ico-paiming"></i>                                     <div class="cp-menu-item-name">排名提前</div>                                       <div class="cp-menu-item-number">                                           <div class="cp-menu-radius fn-right">
                                                                                        <div id="s5" class="cp-menu-radius-num" style='display:none'></div>
                                        </div>
                                    </div>
                                                                    </a>
                            </li>
                        
                                                                                                                                                                                                                    
                                                                                                                                                                                                                <li class=" cp-menu-service-img fn-left">
                                <a class="menu" id="service_1_a_3" target="_blank" href="/home/service/vip"  >
                                    <i class="cp-menu-service-ico cp-menu-ico-vip"></i>                                     <div class="cp-menu-item-name">VIP 会员</div>                                     <div class="cp-menu-item-number">                                           <div class="cp-menu-radius fn-right">
                                                                                        <div id="s31" class="cp-menu-radius-num" style='display:none'></div>
                                        </div>
                                    </div>
                                                                    </a>
                            </li>
                        
                                                                                                                                                                                                                    
                                                                                                                                                                                                                <li class=" cp-menu-service-img fn-left">
                                <a class="menu" id="service_3" target="_blank" href="{{url('/home/gift/index')}}" onmousedown="send_jy_pv2('Usercpn_service_2');"  >
                                    <i class="cp-menu-service-ico cp-menu-ico-gift"></i>                                        <div class="cp-menu-item-name">礼物商城</div>                                       <div class="cp-menu-item-number">                                           <div class="cp-menu-radius fn-right">
                                                                                        <div id="giftmall" class="cp-menu-radius-num" style='display:none'></div>
                                        </div>
                                    </div>
                                                                    </a>
                            </li>
                        
                                                                                                                                                                                                                    
                                                                                                                                                                                                                <li class=" cp-menu-service-img fn-left">
                                <a class="menu" id="service_1_a_6" target="_blank" href="{{url('/home/myqianyuan/recharge')}}" onmousedown="send_jy_pv2('Usercpn_service_0_3');"  >
                                    <i class="cp-menu-service-ico cp-menu-ico-paycenter"></i>                                       <div class="cp-menu-item-name">充心值</div>                                        <div class="cp-menu-item-number">                                           <div class="cp-menu-radius fn-right">
                                                                                        <div id="23" class="cp-menu-radius-num" style='display:none'></div>
                                        </div>
                                    </div>
                                                                    </a>
                            </li>
                             <a class="menu" id="service_2" target="_blank" href="http://www.jiayuan.com/usercp/center/index.php?from=menu" onmousedown="send_jy_pv2('Usercpn_service_1');"  >
                                    <i class="cp-menu-service-ico cp-menu-ico-account"></i>                                                                             <div class="cp-menu-item-number">                                           <div class="cp-menu-radius fn-right">
                                                                                        <div id="stamps" class="cp-menu-radius-num" style='display:none'></div>
                                        </div>
                                    </div>
                                                                    </a>
                            </li>
                        
                                                                                                                                                                                                                                                                                
                                                                                                                                                                                <li class=" cp-menu-service-img fn-left">
                            <a class="menu" id="menu_id_yue" target="_blank" href="http://date.jiayuan.com/" onmousedown="send_jy_pv2('|cp_menus_yuehuiba|');"  >
                                    <i class="cp-menu-service-ico cp-menu-ico-yue"></i> 
                                    <div class="cp-menu-item-name">约会吧</div>                                        <div class="cp-menu-item-number">                                           <div class="cp-menu-radius fn-right">
                                                                                        <div id="app_id_yue" class="cp-menu-radius-num" style='display:none'></div>
                                        </div>
                                    </div>
                                                                            <i class="cp-menu-ico-popularity cp-menu-link-place"></i>                           
                            </a>
                            </li>
                             
                            </li>
                        
                                                                                                                            </ul>
                
                                
            </div>
            
                                                  
            
                                                        
            <div class="cp-menu-items fn-clear">
                <div class="cp-menu-title fn-clear">
                                            <span class="menuname">交友记录</span>
                                    </div>
                
                                
                <ul >
                                                                                                                                                                                                        
                                                                                                                                                                                                                <li class=" ">
                                <a class="menu" id="friends_1" target="_self" href="{{url('/home/msg/index')}}" onmousedown="send_jy_pv2('Usercpn_friends_0');"  >
                                                                            <div class="cp-menu-item-name">好友与联系人</div>                                     <div class="cp-menu-item-number">                                           <div class="cp-menu-radius fn-right">
                                                                                        <div id="friends" class="cp-menu-radius-num" style='display:none'></div>
                                        </div>
                                    </div>
                                                                    </a>
                            </li>
                        
                                                                                                                                                                                                                    
                                                                                                                                                                                                                <li class=" ">
                                <a class="menu" id="visitor_new_id" target="_self" href="{{url('/home/msg/index')}}" onmousedown="send_jy_pv2('|1012380_0| ');"  >
                                                                            <div class="cp-menu-item-name">谁看过我</div>                                       <div class="cp-menu-item-number">                                           <div class="cp-menu-radius fn-right">
                                                                                        <div id="visitor_new" class="cp-menu-radius-num" style='display:none'></div>
                                        </div>
                                    </div>
                                                                    </a>
                            </li>
                        
                                                                                                                                                                                                                    
                                                                                                                                                                                                                <li class=" ">
                                <a class="menu" id="click_new_id" target="_self" href="{{url('/home/msg/index')}}/{{4}}" onmousedown="send_jy_pv2('|1012380_3| ');"  >
                                                                            <div class="cp-menu-item-name">我看过谁</div>                                       <div class="cp-menu-item-number">                                           <div class="cp-menu-radius fn-right">
                                                                                        <div id="click_new" class="cp-menu-radius-num" style='display:none'></div>
                                        </div>
                                    </div>
                                                                    </a>
                            </li>
                        
                        
                                                                                                                                                                                                                    
                                                                                                                                                                                                                <li class=" ">
                                <a class="menu" id="fans_new_id" target="_self" href="{{url('/home/msg/index')}}/{{4}}" onmousedown="send_jy_pv2('|1012380_2| ');"  >
                                                                            <div class="cp-menu-item-name">谁关注我</div>                                       <div class="cp-menu-item-number">                                           <div class="cp-menu-radius fn-right">
                                                                                        <div id="fans_new" class="cp-menu-radius-num" style='display:none'></div>
                                        </div>
                                    </div>
                                                                    </a>
                            </li>
                        
                                                                                                                                                                                                                    
                                                                                                                                                                                                                <li class=" ">
                                <a class="menu" id="menu_id_fate" target="_blank" href="{{url('/home/yfq/index')}}" onmousedown="send_jy_pv2('|cp_menus_app_fate|');"  >
                                                                            <div class="cp-menu-item-name">话题消息</div>                                       <div class="cp-menu-item-number">                                           <div class="cp-menu-radius fn-right">
                                                                                        <div id="app_id_fate" class="cp-menu-radius-num" style='display:none'></div>
                                        </div>
                                    </div>
                                                                    </a>
                            </li>
                        
                                                                                                                            </ul>
                
                                
            </div>
            
                                                        
            <div class="cp-menu-items fn-clear">
                <div class="cp-menu-title fn-clear">
                                            <span class="menuname">完善资料</span>
                                    </div>
                
                                
                <ul >
                                                                                                                                                <div style="width:120px;height:47px;margin:0px auto 10px;padding:10px 14px 0;background:url(http://images1.jyimg.com/w4/usercp_new/v2/i/no-img-note.png) no-repeat;font:12px/18px;color:#ff687b;line-height:150%">资料越完善同等条件我们将优先推荐您</div>                                                                                                                                                                                                                       
                                                                                                                                                                                                                <li class=" ">
                                <a class="menu" id="info_1" target="_blank" href="{{url('/home/myqianyuan/details')}}/{{4}}" onmousedown="send_jy_pv2('Usercpn_info_0');"  >
                                                                            <div class="cp-menu-item-name">我的资料</div>                                       <div class="cp-menu-item-number">                                           <div class="cp-menu-radius fn-right">
                                                                                        <div id="0" class="cp-menu-radius-num" style='display:none'></div>
                                        </div>
                                    </div>
                                                                    </a>
                            </li>
                        
                                                                                                                                                                                                                    
                                                                                                                                                                                                                <li class=" ">
                                <a class="menu" id="info_1_1" target="_blank" href="{{url('/home/myqianyuan/details')}}/{{4}}" onmousedown="send_jy_pv2('Usercpn_info_0_0');"  >
                                                                            <div class="cp-menu-item-name">我的相册</div>                                       <div class="cp-menu-item-number">                                           <div class="cp-menu-radius fn-right">
                                                                                        <div id="0" class="cp-menu-radius-num" style='display:none'></div>
                                        </div>
                                    </div>
                                                                    </a>
                            </li>
                        
                                                                                                                                                                                                                    
                                                                                                                                                                                                                <li class=" ">
                                <a class="menu" id="info_1_2" target="_blank" href="{{url('/home/yfq/index')}}" onmousedown="send_jy_pv2('Usercpn_info_0_2');"  >
                                                                            <div class="cp-menu-item-name">我的缘分圈</div>                                      <div class="cp-menu-item-number">                                           <div class="cp-menu-radius fn-right">
                                                                                        <div id="111" class="cp-menu-radius-num" style='display:none'></div>
                                        </div>
                                    </div>
                                                                    </a>
                            </li>
                        
                                                                                                                                                                                                                    
                                                                                                                                                                                                                <li class=" ">
                                <a class="menu" id="info_2" target="_self" href="{{url('/home/myqianyuan/identity')}}" onmousedown="send_jy_pv2('Usercpn_info_1');"  >
                                                                            <div class="cp-menu-item-name">身份验证</div>                                       <div class="cp-menu-item-number">                                           <div class="cp-menu-radius fn-right">
                                                                                        <div id="certify" class="cp-menu-radius-num" style='display:none'></div>
                                        </div>
                                    </div>
                                                                    </a>
                            </li>
                     
                        
                                                                                                                                                                                                                    
                                                                                                                                                                                                                <li class=" ">
                                <a class="menu" id="info_2_2" target="_self" href="{{url('/home/myqianyuan/email')}}/{{4}}" onmousedown="send_jy_pv2('Usercpn_info_1_1');"  >
                                                                            <div class="cp-menu-item-name">邮箱认证</div>                                       <div class="cp-menu-item-number">                                           <div class="cp-menu-radius fn-right">
                                                                                        <div id="email" class="cp-menu-radius-num" style='display:none'></div>
                                        </div>
                                    </div>
                                                                    </a>
                            <a class="menu" id="info_4" target="_self" href="{{url('/home/success/send')}}" onmousedown="send_jy_pv2('Usercpn_info_3');"  >
                                                                            <div class="cp-menu-item-name">发表成功故事</div>                                     <div class="cp-menu-item-number">                                           <div class="cp-menu-radius fn-right">
                                                                                        <div id="15" class="cp-menu-radius-num" style='display:none'></div>
                                        </div>
                                    </div>
                                                                    </a>
                            </li>                     
            </div> 
            
                            
    </div>
</div>
<script type="text/javascript">
/*
*/
get_app_num();  //获取佳缘应用的数字
</script>
<!--左侧栏目 结束-->    <!-- ==============================框架内内容========================================= -->
    <link type="text/css" rel="stylesheet" href="/home/css/jy_ad.css"/>

<!--右侧栏目 开始-->

<div class="my-jiayuan-doc815 fn-right fn-marginTop15">
    <!--中间部分-->
    <div class="my-jiayuan-doc560" >
    <div class="my-jiayuan-border">
                            

    <div class="mydata-specials" style="display:none"></div>
  
                <!--今日提醒 结束-->
                <!--今日佳缘速配-->
<div><!--今日佳缘速配-->
<div class="mydata-match"><div class="mydata-match-top fn-clear"><h3>懂你今日推荐</h3><a href="{{url('/home/myqianyuan/match')}}" class="mydata-match-more" onmousedown="if(typeof(send_jy_pv2)=='function'){send_jy_pv2('Usercpn_jrjydj');}" target="_blank">更多 &gt;</a></div><div class="mydata-match-body fn-clear">
<ul>
@if($today)
@foreach($today as $day)
<li><div class="mydata-match-pic"><a href="{{url('/home/myqianyuan/details')}}/{{$day -> user_id}}" target="_blank"  class="fn-public"><img width="100px" height="130px" src="{{$day -> img}}" ></a></div><div class="mydata-match-area">{{$day -> age}}岁</div>
</li>
@endforeach
@endif
</ul>
</div>
</div></div>
               
                <div class="clear_line"></div>
                <!--谁看过我-->     
            <div class="mydata-interest fn-clear"><div class="mydata-interest-top"><h3>哪些人对我感兴趣</h3><a target="_blank"  onmousedown="if(typeof(send_jy_pv2)=='function'){send_jy_pv2('|1012380_7|');}" href="{{url('/home/myqianyuan/more')}}" class="mydata-interest-more">新60人 &gt;</a></div><div class="whoBox fn-clear" id="person"><a href="javascript:;"  onmousedown="send_jy_pv2('|1012380_8|');" class="fn-public person_1 onshow">谁看过我</a><a href="javascript:;" class="fn-public person_3" onmousedown="send_jy_pv2('|1012380_10|');">谁关注我</a></div>
            <div id="whoMatch" class="todayMatch">
                <div class="tabCon" style="display: block;">
                    @if($data)
                    <ul>
                    @foreach($data as $useeid)
                    <li><div class="memberpic"><a onmousedown="send_jy_pv2('|1012380_4|');" target="_blank" href="{{url('/home/myqianyuan/details')}}?uid={{$useeid -> user_id}}"  class="fn-public"><img src="{{$useeid -> img}}" width="74" height="90"/></a></div><div class="mydata-interest-area"><a onmousedown="send_jy_pv2('|1012380_4|');" target="_blank" href="http://www.jiayuan.com/usercp/clicked_new.php?src_key=myjy_lookedme" class="fn-public">{{$useeid -> age}}岁 </a></div><div class="mydata-interest-match">匹配度 <?php echo rand(10,90).'%' ?></div>
                    </li>
                    @endforeach
                    </ul>
                    @else
                    <div class="tabCon personHide" style="display: none;">
                    <ul>
                    <div class="mydata-interest-nobody">
                    <p class="mydata-interest-note">没人看过，赶紧完善资料吧！</p>
                    <a href="http://search.jiayuan.com//v2/" target="_blank" onmousedown="send_jy_pv2('|1013842_1|')" class="mydata-interest-tijiao">搜索伴侣</a>
                    </div>
                    </ul>
                    </div>
                    @endif

                </div>
               
                <div class="tabCon personHide" style="display: none;">
                @if($dataconcern)
                    <ul>
                    @foreach($dataconcern as $useeid)
                    <li><div class="memberpic"><a onmousedown="send_jy_pv2('|1012380_4|');" target="_blank" href="{{url('/home/myqianyuan/details')}}?uid={{$useeid -> user_id}}"  class="fn-public"><img src="{{$useeid -> img}}" width="74" height="90"/></a></div><div class="mydata-interest-area"><a onmousedown="send_jy_pv2('|1012380_4|');" target="_blank" href="http://www.jiayuan.com/usercp/clicked_new.php?src_key=myjy_lookedme" class="fn-public">{{$useeid -> age}}岁 </a></div><div class="mydata-interest-match">匹配度 <?php echo rand(10,90).'%' ?></div>
                    </li>
                    @endforeach
                    </ul>
                    @else
                    <div class="tabCon personHide" style="display: none;">
                    <ul>
                    <div class="mydata-interest-nobody">
                    <p class="mydata-interest-note">一大波关注者还在路上，与其等待，不如出击！</p>
                    <a href="http://search.jiayuan.com//v2/" target="_blank" onmousedown="send_jy_pv2('|1013842_1|')" class="mydata-interest-tijiao">搜索伴侣</a>
                    </div>
                    </ul>
                    </div>
                    @endif
                </div>
            </div>
</div>
<script type="text/javascript">$(function(){var $div_li =$("#person a");$div_li.hover(function(){$(this).addClass("onshow").siblings().removeClass("onshow");var index =  $div_li.index(this);$("#whoMatch .tabCon").eq(index).show().siblings().hide();});});
</script>                          
                <!--谁看过我结束-->
                <!--缘分速递 开始-->
            <div><div class="mydata-lamp"><div class="mydata-lamp-top fn-clear"><h3 >超级聚光灯</h3><a href="{{url('/home/myqianyuan/recharge')}}?user_id={{4}}" class="mydata-lamp-more">我也要出现在这里 &gt;</a>
            </div>
            <div class="mydata-lamp-body">
            <ul>
                @foreach($juguang as $ju)
                <li><div class="mydata-lamp-pic"><a target="_blank" href="{{url('/home/myqianyuan/details')}}?user_id={{$ju -> user_id}}" class="fn-public"><img width="100px" height="120px" src="{{$ju -> img}}" ></a></div><div class="mydata-lamp-name"></div><div class="mydata-lamp-area">{{$ju -> age}}岁</div>
                </li>
                @endforeach
            </ul>
            </div>
</div></div>
                <!--缘分速递 结束-->
                <!--第一印象-->
            <div id="c_dyyx"></div>     
                <!--第一印象结束-->
        </div>
        <div id="ad_pos_115" style="margin-top: 10px;"></div>
</div>

 
               
    <!--中间部分结束-->
    <div class="my-jiayuan-doc240">
        <div class="my-jiayuan-border">
                        <!-- 俱乐部入口 -->
<link rel="stylesheet" href="/home/css/module_open.css" />
<link rel="stylesheet" href="/home/css/club.css" />
<div id="bg" style="z-index:100000"></div>

<!--领取弹窗 结束-->


<!-- 金豆换礼成功弹层结束 -->
<div class="JY_new_club" style="display: block;">
   <!--佳缘入口焦点图111-->
   

    <h5 id="JY_new_clubTabIndex " class=" fn-clear"><!--JY_vipClubTabIndex-->
        <a href="{{url('/home/club/index')}}" target="_blank" id="club_cp" class="curr" >佳缘俱乐部</a>
        <!--<a id="shf_title_cp" class="" style="display:none">买服务送话费</a>注释wangleilei 4/29-->
    </h5>
    <div id="JY_new_club_content"></div>

    <!--送话费部分-->
    <div class="shf_div" id="shf_div" style="display:none;">
   
</div>


</div>
         <!-- 右侧搜索-->
<div id="search_interface" class="fn-marginBottom25"></div>
<!--right search begin-->
          <!-- 一键钟情-->
            <div id="r_yjzq">
            <div class="mydataR-yjzq">
<div class="mydataR-yjzq-top fn-clear">
    <!-- <h3><a onmousedown="if(typeof(send_jy_pv2)=='function'){send_jy_pv2('|1018095_19|');}"  href="http://www.jiayuan.com/parties/2011/yjzq/" target="_blank" class="fn-public">一键钟情</a></h3> -->
    <h3><a href='javascript:;' class="fn-public">一键钟情</a></h3>
    <!-- <a onmousedown="if(typeof(send_jy_pv2)=='function'){send_jy_pv2('|1018095_19|');}"  href="http://www.jiayuan.com/parties/2011/yjzq/index.html" target="_blank" class="mydataR-yjzq-more">更多 ></a> -->
</div>
<div class="mydataR-yjzq-note">提示：点击“不错哦”，查看ta的详细信息</div>
<div class="mydataR-yjzq-info fn-clear">
    <div class="mydataR-yjzq-pic">
        <a href=""  target="_blank" class="fn-public"><img width="95px" src="{{$firstSee['img']}}" ></a>
    </div>
    <div class="mydataR-yjzq-text">
        <ul>
            <input type="hidden" value="{{$firstSee['uid']}}">
            <li class="mydataR-yjzq-name"><a onmousedown="if(typeof(send_jy_pv2)=='function'){send_jy_pv2('|1018095_20|');}"  href="http://www.jiayuan.com/149599207?fxly=cp-uc-yjzq&algorithm=c&src=cp-uc-yjzq" target="_blank"  class="fn-public">{{$firstSee['username']}}</a></li>
            <li>{{$firstSee['age']}}岁 {{$firstSee['height']}}厘米</li>
            
            <li>
                @if($firstSee['income'] == '0')
                   0-2000元以下
                @elseif($firstSee['income'] == '1')
                    2000~5000元
                @elseif($firstSee['income'] == '2')
                    5000~10000元
                @elseif($firstSee['income'] == '3')
                    10000~50000元
                @elseif($firstSee['income'] == '4')
                    50000以上
                @endif
            </li>
        </ul>
    </div>
</div>
<div class="mydataR-yjzq-soliloquy">自我介绍:  {!!$firstSee['detail']!!} ...</div>
<div class="mydataR-yjzq-button fn-clear">
    <a href="{{url('/home/myqianyuan/index')}}" class="mydataR-yjzq-next fn-right ">没兴趣</a>
    <a href="{{ url('/home/myqianyuan/details') }}/{{$firstSee['uid']}}" id="concern" class="mydataR-yjzq-well fn-right">不错哦</a>
</div>

</div>
<script type="text/javascript">
var jy_skip_real_name = true; // 实名认证弹窗 ：true:跳过 | false:拦截
</script>           </div>
            <!-- 一键钟情 结束-->

            </div>
            <!--地图搜索-->
            <div class="clear_line"></div>
            <div class="mydataR-map fn-clear">
    
        
</div>            
            <!--地图搜索 结束-->
            <!--佳缘邮票快速充值-->
                    <!--右侧支付-->
        <style>
        /*快充 验证码添加*/
        .newpay_yanzheng{color:#333;line-height:22px;padding:0 0 15px;display:none}
        .newPay_yanzhengnum{border-color:#abadb3 #dbdfe6 #e3e9ef #e2e3ea;border-style:solid;border-width: 1px;color: #888;height: 20px;margin:0 0 0 5px;padding:0 5px; width:108px;outline: none}
        .newpay_yzgh{padding:5px 0 0}
        .newpay_yzgh a{margin:0 15px 0 0;color:#2b81d4}
        /*快充 验证码添加*/
        </style>
        <div class="mydataR-pay">
            <div class="mydataR-pay-top">
                <h3><a href="###" class="fn-public">快速充值</a></h3>
                </span>
            </div>
            <div class="recharge_content">
                <ul class="list">
                                        <li onmouseover="tab('recharge','1','3')" id="recharge1" class="mydataR-pay-liA on">移动</li>
                    <li onmouseover="tab('recharge','2','3')" id="recharge2" class="mydataR-pay-liB">联通</li>
                    <li onmouseover="tab('recharge','3','3')" id="recharge3" class="mydataR-pay-liC">电信</li>
                                    </ul>
                <div id="rechargeCon1" class="recharge_tab" style="display: block;">
                                        <form name="form_1" id="form_1" method="POST" action="./dynmatch/ajax/dosmsletter.php" target="_blank">
                        <input type="hidden" value="charge" name="use_type">
                        <input type="hidden" name="orderid" id="orderid" value=""/>
                        <input type="hidden" name="is_yd_pay" value="1"/>
                                            <div class="newPay_gmyp paddingB5"><font style="float: right;">1心值=1元</font>购买心值：</div>
                        <div class="newPay_select paddingB5 fn-clear">
                                                        <label class="newPay_selectAll"><input type="radio" name="amount" value="30">300</label>
                            <label class="newPay_select8"><input type="radio"  name="amount" pid="332" value="20" checked>100</label>
                            <label class="newPay_selectAll"><input type="radio"  name="amount" value="4">50</label>
                                                    </div>
                                                
                        <div  class="newpay_mobileNum" id="chinamobile" style="display: block; padding-bottom:15px">手机号码：<input type="text" class="newPay_telnumber" value="请输入您的手机号" id="mobile1" name="mobile"></div>
                        <div class="newpay_yanzheng" id="chinamobile_yanzheng">输入验证码：<input type="text" class="newPay_yanzhengnum" value="请输入收到的验证码" name="yd_code" id="yd_code">
                            <div style="width:auto;display:none" class="f2">*请正确输入您的验证码</div>
                            <div class="newpay_yzgh"><a href="javascript:void(0);" onclick="sendMessage_yd(1)">重新发送短信</a><a href="javascript:void(0);" onclick="changeMobile_yd()">更换手机号</a></div>
                        </div>             
                        <div class="newpay_yzmnext" id="newpay_yzmnext_yd"><a class="newpay_next marginB10" href="{{url('/home/myqianyuan/recharge')}}" >下一步</a></div>
                        
                        <script type="text/javascript">
                        $('#mobile1').click(function(){
                            if($(this).val()=='请输入您的手机号'){
                                $(this).val('');
                            }
                        });
                        $('#mobile1').blur(function(){
                            if($(this).val()==''){
                                $(this).val('请输入您的手机号');
                            }
                        })
                        function changeMobile_yd() {
                            $('#mobile1').val('');
                            $('#mobile1').focus();
                            $('#orderid').val('');
                            $("#newpay_sjnext_yd").css("display","none");
                            $("#newpay_yzmnext_yd").css("display","block");     
                            $("#chinamobile_yanzheng").css("display","none");
                            $("#chinamobile").css("display","block");
                        }
                        function sendMessage_yd(f_id){
                            var mobile =  document.getElementById('mobile1').value;
                            if(!(/^1(34|35|36|37|38|39|47|50|51|52|57|58|59|82|83|84|87|88)\d{8}$/.test(mobile))){
                                alert('请正确输入您的手机号码');
                                return false;
                            }
                            var get_mobile_code = 1;
                            var price = $("#form_"+f_id+" input[name='amount']:checked").val();
                            $.ajax({
                                type:"GET",
                                url:"./dynmatch/ajax/dosmsletter.php",
                                async: false,
                                data:{
                                    get_mobile_code:get_mobile_code,
                                    price:price,
                                    mobile:mobile
                                    },
                                success:function(msg){
                                    if(msg == -100000){
                                        JY_Alert("温馨提示","您的手机号码所在地区暂不支持移动充值");
                                    }else if (msg != '-1'){
                                        //alert("验证码已下发到您手机，请填写您收到的验证码！");
                                        $("#chinamobile").css("display","none");  
                                        $("#chinamobile_yanzheng").css("display","block");  
                                        $("#newpay_yzmnext_yd").css("display","none"); 
                                        $("#newpay_sjnext_yd").css("display","block");
                                        document.getElementById('orderid').value = msg;
                                    }else{
                                        alert('验证码发送失败！请稍后再试');
                                    }
                                }
                            });
                        }
                        $('#yd_code').click(function(){
                            if($(this).val()=='请输入收到的验证码'){
                                $(this).val('');
                            }
                        });
                        $('#yd_code').blur(function(){
                            if($(this).val()==''){
                                $(this).val('请输入收到的验证码');
                            }
                        })
                        function subphone_new_yd(f_id){
                            var obj = document.getElementById('form_'+f_id);
                            var mobile =  document.getElementById('mobile1').value;
                            if(!(/^1(34|35|36|37|38|39|47|50|51|52|57|58|59|82|83|84|87|88)\d{8}$/.test(mobile))){
                                alert('*请正确输入您的手机号码');
                                return false;
                            }
                            var bangding = $('#form_'+f_id+' input[name=bangding_shouji]').attr('checked');
                            var price = $('#form_'+f_id+' input[type=radio]:checked').val();
                            obj.submit();
                            //统计开始
                            if(f_id==1 && price==30){
                                //alert('移动30个');
                                send_jy_pv2('|1018338_4|');
                            }else if(f_id==1 && price==20){
                                //alert('移动20个');
                                send_jy_pv2('|1018338_5|');
                            }else if(f_id==1 && price==2){
                                //alert('移动2个');
                                send_jy_pv2('|1018338_6|');
                            }
                            //统计结束
                            try{
                                if(document.getElementById('anniu_'+f_id))
                                document.getElementById('anniu_'+f_id).disabled=true;
                            }catch(e){};
                        }
                        </script>
                        
                                            </form>
                </div>
                <!--联通-->
                <div id="rechargeCon2" class="recharge_tab" style="display:none;">
                    <div id="lt_new_div">
                        <form name="form_2_new" id="form_2_new" method="POST" action="./dynmatch/ajax/dosmsletter.php" target="_blank">
                            <input type="hidden" value="charge" name="use_type">
                            <input type="hidden" name="orderid2" id="orderid_lt" value=""/>
                            <input type="hidden" name="is_lt_pay" value="1"/>
                            <div class="newPay_gmyp paddingB5"><font style="float: right;">1佳缘宝=1元</font>购买佳缘宝：</div>
                            <div class="newPay_select paddingB5 fn-clear">
                                                        <label class="newPay_selectAll"><input type="radio" name="amount" value="30">30</label>
                            <label class="newPay_select8"><input type="radio"  name="amount" pid="332" value="20" checked>20</label>
                            <label class="newPay_selectAll"><input type="radio"  name="amount" value="4">4</label>
                                                        </div>
                            <div class="newPay_noteText paddingB5">暂不支持北京、河北、重庆、陕西、广东、天津、上海、河南、江苏、吉林、辽宁、湖北、安徽</div>
                            <div  class="newpay_mobileNum" id="chinamobile_lt" style="display: block; padding-bottom:15px">手机号码：<input type="text" class="newPay_telnumber" value="请输入您的手机号" id="mobile1_lt" name="mobile"></div>
                            <div class="newpay_yanzheng" id="chinamobile_yanzheng_lt">输入验证码：<input type="text" class="newPay_yanzhengnum" value="请输入收到的验证码" name="lt_code" id="lt_code">
                                <div style="width:auto;display:none" class="f2">*请正确输入您的验证码</div>
                                <div class="newpay_yzgh"><a href="javascript:void(0);" onclick="sendMessage_lt('2_new')">重新发送短信</a><a href="javascript:void(0);" onclick="changeMobile_lt()">更换手机号</a></div>
                            </div>             
                            <div class="newpay_yzmnext" id="newpay_yzmnext_lt"><a class="newpay_next marginB10"  onclick="sendMessage_lt('2_new')">下一步</a></div>
                            <div class="newpay_sjnext" id="newpay_sjnext_lt" style="display:none"><a class="newpay_next marginB10" id="anniu_2_new" onclick="subphone_new_lt('2_new');">下一步</a></div>
                            <script type="text/javascript">
                            $('#mobile1_lt').click(function(){
                                if($(this).val()=='请输入您的手机号'){
                                    $(this).val('');
                                }
                            });
                            $('#mobile1_lt').blur(function(){
                                if($(this).val()==''){
                                    $(this).val('请输入您的手机号');
                                }
                            })
                            function changeMobile_lt() {
                                $('#mobile1_lt').val('');
                                $('#mobile1_lt').focus();
                                $('#orderid_lt').val('');
                                $("#newpay_sjnext_lt").css("display","none");
                                $("#newpay_yzmnext_lt").css("display","block");     
                                $("#chinamobile_yanzheng_lt").css("display","none");
                                $("#chinamobile_lt").css("display","block");
                            }
                            function sendMessage_lt(f_id){
                                var mobile =  document.getElementById('mobile1_lt').value;
                                if(!(/^1(3[0-2]|5[56]|8[56]|4[5]|7[6])\d{8}$/.test(mobile))){
                                    alert('请正确输入您的手机号码');
                                    return false;
                                }
                                var get_mobile_code = 2;
                                var price = $("#form_"+f_id+" input[name='amount']:checked").val();
                                $.ajax({
                                    type:"GET",
                                    url:"./dynmatch/ajax/dosmsletter.php",
                                    async: false,
                                    data:{
                                        get_mobile_code:get_mobile_code,
                                        price:price,
                                        mobile:mobile
                                        },
                                    success:function(msg){
                                        if(msg == -100000){
                                            JY_Alert("温馨提示","您的手机号码所在地区暂不支持联通充值");
                                        }else if (msg != '-1'){
                                            //alert("验证码已下发到您手机，请填写您收到的验证码！");
                                            $("#chinamobile_lt").css("display","none");  
                                            $("#chinamobile_yanzheng_lt").css("display","block");  
                                            $("#newpay_yzmnext_lt").css("display","none"); 
                                            $("#newpay_sjnext_lt").css("display","block");
                                            document.getElementById('orderid_lt').value = msg;
                                        }else{
                                            alert('验证码发送失败！请稍后再试');
                                        }
                                    }
                                });
                            }
                            $('#lt_code').click(function(){
                                if($(this).val()=='请输入收到的验证码'){
                                    $(this).val('');
                                }
                            });
                            $('#lt_code').blur(function(){
                                if($(this).val()==''){
                                    $(this).val('请输入收到的验证码');
                                }
                            })
                            function subphone_new_lt(f_id){
                                var obj = document.getElementById('form_'+f_id);
                                var mobile =  document.getElementById('mobile1_lt').value;
                                if(!(/^1(3[0-2]|5[56]|8[56]|4[5]|7[6])\d{8}$/.test(mobile))){
                                    alert('*请正确输入您的手机号码');
                                    return false;
                                }
                                obj.submit();
                                try{
                                    if(document.getElementById('anniu_'+f_id))
                                    document.getElementById('anniu_'+f_id).disabled=true;
                                }catch(e){};
                            }
                            </script>
                            <div class="newPay_oldLink paddingB5"><a href="http://www.jiayuan.com/usercp/center/charge.php?src_key=usercp&recharge=1" target="_blank" onmousedown="send_jy_pv2('|1018338_1|');">网上银行</a>、<a href="http://www.jiayuan.com/usercp/center/charge.php?src_key=usercp&show_menu=2&recharge=1" target="_blank" onmousedown="send_jy_pv2('|1018338_2|');">支付宝</a>、<a href="http://www.jiayuan.com/usercp/center/charge.php?src_key=usercp&show_payway=2&recharge=1" target="_blank" onmousedown="send_jy_pv2('|1018338_3|');">信用卡支付</a></div>
                        </form>
                    </div>
                    <div id="lt_old_div" style="display:none;">
                        <form action="http://www.jiayuan.com/msg/v6/dosmsletter.php" method="POST" id="form_2" name="form_2" target="_blank" >
                            <input type="hidden" value="charge" name="use_type">
                            <div class="newPay_gmyp paddingB5"><font style="float: right;">1佳缘宝=1元</font>购买佳缘宝：</div>
                            <div class="newPay_select paddingB5 fn-clear"><label><input type="radio"  name="amount" value="2" checked>2</label></div>
                            <div class="newPay_sendSms paddingB5">发送短信<span>4</span>到<span>10655556011</span></div>
                            <div class="newPay_noteText paddingB5">暂不支持陕西、山西、云南、山东、内蒙古、江西、河北、北京、湖北、天津</div>
                            <div class="newpay_mobileNum paddingB15">充值密码：<input type="text" class="newPay_telnumber" id="code_2" name="code" value="请输入收到的密码"></div>
                            <div><a class="newpay_next marginB10" onclick="mysub(2);" id="anniu_2">确定</a></div>
                            <div class="newPay_oldLink paddingB5"><a href="http://www.jiayuan.com/usercp/center/charge.php?src_key=usercp&recharge=1" target="_blank" onmousedown="send_jy_pv2('|1018338_1|');">网上银行</a>、<a href="http://www.jiayuan.com/usercp/center/charge.php?src_key=usercp&show_menu=2&recharge=1" target="_blank" onmousedown="send_jy_pv2('|1018338_2|');">支付宝</a>、<a href="http://www.jiayuan.com/usercp/center/charge.php?src_key=usercp&show_payway=2&recharge=1" target="_blank" onmousedown="send_jy_pv2('|1018338_3|');">信用卡支付</a></div>
                        </form>
                    </div>
                </div>
                                <div style="display: none;" id="rechargeCon3" class="recharge_tab">
                    <form  name="form_3" id="form_3" method="POST" action="http://www.jiayuan.com/msg/v6/dosmsletter.php" target="_blank">
                        <input type="hidden" value="charge" name="use_type">
                        <div class="newPay_gmyp paddingB5"><font style="float: right;">1佳缘宝=1元</font>购买佳缘宝：</div>
                        <div class="newPay_select paddingB5 fn-clear">
                            <label style="margin-right:10px;"><input type="radio" name="amount" value="30" checked>30</label>
                            <label style="margin-right:10px;"><input type="radio"  name="amount" value="20">20</label>
                                                        <label style="margin-right:10px;"><input type="radio"  name="amount" value="4">4</label>
                                                    </div>
                        <div class="newPay_sendSms paddingB5">发送短信<span>125</span>到<span>1066916508</span></div>
                        <div class="newPay_noteText paddingB5">暂不支持贵州、甘肃、云南、内蒙古、陕西、安徽、北京</div>
                        <div class="newpay_mobileNum paddingB15">充值密码：<input type="text" class="newPay_telnumber" id="code_3" name="code" value="请输入收到的密码"></div>
                        <div><a class="newpay_next marginB10" onclick="mysub(3);" id="anniu_3">确定</a></div>
                        <div class="newPay_oldLink paddingB5"><a href="http://www.jiayuan.com/usercp/center/charge.php?src_key=usercp&recharge=1" target="_blank" onmousedown="send_jy_pv2('|1018338_1|');">网上银行</a>、<a href="http://www.jiayuan.com/usercp/center/charge.php?src_key=usercp&show_menu=2&recharge=1" target="_blank" onmousedown="send_jy_pv2('|1018338_2|');">支付宝</a>、<a href="http://www.jiayuan.com/usercp/center/charge.php?src_key=usercp&show_payway=2&recharge=1" target="_blank" onmousedown="send_jy_pv2('|1018338_3|');">信用卡支付</a></div>
                    </form>
                </div>
                            </div>
        </div>
        <script>
        $(document).ready(function(){
            $('#form_3 input[type=radio]').each(function(){
                $(this).click(function(){
                    var amount_value = $(this).val();
                    if(amount_value==30){
                        $('#form_3 .newPay_sendSms').html('发送短信<span>125</span>到<span>1066916508</span>');
                    }else if(amount_value==20){
                        $('#form_3 .newPay_sendSms').html('发送短信<span>138</span>到<span>1066916506</span>');
                    }else if(amount_value==4){
                        $('#form_3 .newPay_sendSms').html('发送短信<span>104</span>到<span>1066916534</span>');
                    }else{
                        $('#form_3 .newPay_sendSms').html('发送短信<span>114</span>到<span>1066916503</span>');
                    }
                })
            });
            $('#mobile').click(function(){
                document.getElementById('phone_wrong').style.display='none';
                if($(this).val()=='请输入您的手机号'){
                    $(this).val('');
                }
            });
            $('#mobile').blur(function(){
                if($(this).val()==''){
                    $(this).val('请输入您的手机号');
                }
            });
            $('#code_2').click(function(){
                if($(this).val()=='请输入收到的密码'){
                    $(this).val('');
                }
            });
            $('#code_2').blur(function(){
                if($(this).val()==''){
                    $(this).val('请输入收到的密码');
                }
            });
            $('#code_3').click(function(){
                if($(this).val()=='请输入收到的密码'){
                    $(this).val('');
                }
            });
            $('#code_3').blur(function(){
                if($(this).val()==''){
                    $(this).val('请输入收到的密码');
                }
            });
        });
        function mysub(f_id){
            var textt = document.getElementById('code_' + f_id).value;
            var charlist = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
            for(var i=0; i<textt.length; i++){
                var c= textt.charAt(i);
                if(charlist.indexOf(c) == -1){
                    alert("请正确填写密码，密码为数字和字母组合");
                    return false;
                }
            }   
            var obj =   document.getElementById('form_'+f_id);
            //if(typeof(parent.closeMaskDiv)!=='undefined'){
            //  parent.closeMaskDiv('test_iframe');
            //}
            obj.submit();
                //统计开始
                var price = $('#form_'+f_id+' input[type=radio]:checked').val();
                if(f_id==2 && price==2)
                {
                        //alert('联通2个');
                        send_jy_pv2('|1018338_7|');
                }
                else if(f_id==3 && price==30)
                {
                        //alert('电信30个');
                        send_jy_pv2('|1018338_8|');
                }
                else if(f_id==3 && price==20)
                {
                        //alert('电信20个');
                        send_jy_pv2('|1018338_9|');
                }
                else if(f_id==3 && price==2)
                {
                        //alert('电信2个');
                        send_jy_pv2('|1018338_10|');
                }
                var bangding = $('#form_'+f_id+' input[name=bangding_shouji]').attr('checked');
                if(bangding == true && f_id ==2)
                {
                        //alert('联通已经绑定');
                        send_jy_pv2('|1018338_12|');
                }
                if(bangding == true && f_id ==3)
                {
                        //alert('电信已经绑定');
                        send_jy_pv2('|1018338_13|');
                }
                //统计结束
            try{
                if(document.getElementById('anniu_'+f_id))
                document.getElementById('anniu_'+f_id).disabled=true;
            }catch(e){};
        }
        function subphone(f_id){
            var obj = document.getElementById('form_'+f_id);
            var mobile =  document.getElementById('mobile').value;
            if(!(/^1(34|35|36|37|38|39|47|50|51|52|57|58|59|82|83|84|87|88)\d{8}$/.test(mobile))){
                document.getElementById('phone_wrong').style.display='';
                document.getElementById('phone_wrong').innerHTML='*请正确输入您的手机号码';
                return false;
            }
            var bangding = $('#form_'+f_id+' input[name=bangding_shouji]').attr('checked');
            var price = $('#form_'+f_id+' input[type=radio]:checked').val();
            obj.submit();
            //统计开始
            if(f_id==1 && price==30){
                //alert('移动30个');
                send_jy_pv2('|1018338_4|');
            }else if(f_id==1 && price==20){
                //alert('移动20个');
                send_jy_pv2('|1018338_5|');
            }else if(f_id==1 && price==2){
                //alert('移动2个');
                send_jy_pv2('|1018338_6|');
            }
        //统计结束
            try{
                if(document.getElementById('anniu_'+f_id))
                document.getElementById('anniu_'+f_id).disabled=true;
            }catch(e){};
        }
        </script>           
            <!--佳缘邮票快速充值 结束-->
        </div>
    </div>
    <!--右侧 结束-->    
    <!--弹层-->
    

</div>


    <!-- ==============================框架内内容========================================= -->
</div>
<div class="clear_line"></div>
<div id="ad_pos_56" class="advcenter"></div>
<!-- 主体 结束 two div-->
<!-- 标准尾 开始-->

<style type="text/css">
    .user-pop-bg{  position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: black; opacity: 0.6; z-index: 120005;display: none;filter: alpha(opacity=60);}
    .user-pop{ width: 310px; height: 150px; position: absolute; z-index: 120006; top: 210px; left: 50%; margin-left: -320px; background: url(http://images2.jyimg.com/w4/usercp_new/i/newimg.png) no-repeat;display: none; }
    .user-pop .t{ position: absolute; top: 74px; left: -152px; background-color: #f7f7f7; width: 136px; height: 35px; line-height: 35px; text-align: center; }
    .user-pop .t a{ color: #2C81D6; text-decoration: underline; }
    .user-pop .t span{ margin-right: 8px; }
    .user-pop .t a:hover{ color: #dd1764; }
    .user-pop a.ease{position: absolute; top: 96px; left: 90px; width: 165px; height: 39px; color: white; text-align: center; background: url(http://images2.jyimg.com/w4/usercp_new/i/newimg2.jpg) no-repeat; font: bold 14px/39px "宋体"; }
    .countdown{ font: 30px/50px Arail; color: white; position: absolute; top: 28px; right: -30px; width: 50px; height: 50px; text-align: center; }
</style>
<div class="user-pop-bg"></div>
<div class="user-pop">

</div>
<!--加载动态营销数据-->

<!--新用户注册45分钟内 显示新人购买层，隐藏佳缘服务层-->
<!-- <script type="text/javascript" src="http://images1zw.jyimg.com/w4/usercp_new/j/myTagConten.js" ></script>
<script type='text/javascript' src='http://mai.jiayuan.com/mai.php?pd_id=5'></script>
<script type="text/javascript" src="http://images1zw.jyimg.com/w4/usercp_new/v2/j/my-jiayuan.js"></script>
 -->
</body>
</html>