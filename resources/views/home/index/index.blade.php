
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="交友,交友网,征婚交友,网上交友,征婚,征婚网,征婚交友网,交友中心,婚恋交友,同城交友,离异征婚,同城约会吧,约会吧征婚,约会吧交友,北京交友,上海交友,广州交友,深圳交友,重庆交友,沈阳交友,南京交友,济南交友,郑州交友,成都交友,西安交友" />
<meta name="description" content="世纪佳缘交友网：致力于打造严肃婚恋的交友平台，数百万会员在这里找到对象。现1.7亿注册会员，让缘分千万里挑一！" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>一线牵婚恋交友网：严肃婚恋交友网站，免费注册马上寻缘</title>
<link type="text/css" rel="stylesheet" href="{{ asset('/home/css/reset.css') }}" />
<link type="text/css" rel="stylesheet" href="{{ asset('/home/css/index.css') }}" />
<link type="text/css" rel="stylesheet" href="{{ asset('/home/css/index-POP.css') }}" />
<link type="text/css" rel="stylesheet" href="{{ asset('/home/css/jy_ad.css') }}" />
<link type="text/css" rel="stylesheet" href="{{ asset('/home/css/base.css') }}" />
<style type="text/css">
        *{margin: 0;padding: 0;list-style:none;}
        .banner{width: 650px;height:250px;margin: 10px;
            position: relative;overflow: hidden;}
        .img{position: absolute;width:3500px;left:0px;top:0px;}
        .img li{float: left;}
        .img li img{width:650px;}
        .btn{width: 30px;height: 50px;position: absolute;top:50%;
        background: rgba(0,0,0,0.5);text-align:center;line-height:50px;
        margin-top: -25px;
        color:#fff;font-size:40px;font-family:'宋体';cursor:pointer;
        }
        .btn_l{left:0px;}
        .btn_r{right:0px;}
        .num{position: absolute;width: 100%;bottom:10px;text-align:center;}
        .num li{width: 10px;height: 10px;border-radius:50%;
            background: #369;margin: 0 3px;display:inline-block;}
        .num .on{background: #f39;}
    </style>
<!--[if lte IE 6]>
<script type="text/javascript" src="http://images2.jyimg.com/w4/profile_new/j/dd_belatedpng.js"></script>
<script>
    DD_belatedPNG.fix('.pngfix,.sprite,.credit_bg'); 
</script>
<![endif]-->
<script type="text/javascript" src="{{ asset('/home/js/pv.js') }}"></script>
 <script type="text/javascript" src="{{ asset('/home/js/JY.login.js') }}"></script>
<script type="text/javascript" src="{{ asset('/home/js/jy_ad.js') }}"></script>
<script type="text/javascript" src="{{ asset('/home/js/jquery-1.4.2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/home/js/mosaic.1.0.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('/home/js/JY_Alert.js') }}"></script> 
<script type="text/javascript" src="{{ asset('/home/js/love_location_array.js') }}"></script>
<script type="text/javascript" src="{{ asset('/home/js/head_main.js') }}"></script>
<script type="text/javascript" src="{{ asset('/home/js/jiayuan_logo_config.js') }}"></script>


<script type="text/javascript" src="{{ asset('/home/ajax/story_ajax_data.html') }}"></script>
<script type="text/javascript">
/**********定义全局配置变量**********/
//定义默认年纪
DEFAULT_SEARCH_BEGIN_AGE	= 18;
DEFAULT_SEARCH_MIN_AGE		= 20;	//默认选中小年龄
DEFAULT_SEARCH_MAX_AGE		= 28;	//默认选中大年龄
DEFAULT_REG_YEAR			= 1990;
DEFAULT_REG_MONTH			= 1;
DEFAULT_REG_DAY				= 1;
DEFAULT_REG_HEIGHT_M		= '170厘米';
DEFAULT_REG_HEIGHT_F		= '160厘米';
DEFAULT_REG_EDUCATION		= 30;	//默认本科
DEFAULT_REG_EDUCATION_TEXT	= '本科';//默认本科
//540红娘注册链接，541首页第一屏注册标记，542幸福弹层注册标记，543VIP推荐弹层注册标记
/**********定义全局变量**********/
//增加去空格函数
String.prototype.trim = function()
{
return this.replace(/(^\s*)|(\s*$)/g, "");
} 
window.alert=function(msg){JY_Alert('温馨提示', msg);};
index_visit	= 1;									//没有记录登陆过佳缘站
reg_flag = 0;										//注册标志
all_xingfu_tags_flag = get_rand_xingfu_tag_no();	//获取晒幸福随即后的数组下标
height_offset = 862;								//身高下拉项位置偏移定位
is_change_reg_default = 0;							//默认没有修改过注册表单项
/**********定义全局变量**********/
if(getCookie('myuid')){
index_visit = 1;		//登陆过佳缘站
}
//通过知道广告ID跳入佳缘的情况
if(getCookie('FROM_ST_ID')){
var from_st_id = getCookie('FROM_ST_ID');	//获取ST的值
}else{
var from_st_id = 0;
}
session_hash_first = getCookie('SESSION_HASH');

function wait(cond, exec){setTimeout(function(){ if(!cond()) { setTimeout(arguments.callee, 25); return; } exec(); },0);}
function ljf(obj){return document.getElementById(obj);}	//返回指定对象
//获取指定名称的cookie的值
function getCookie(objName)
{
var arrStr = document.cookie.split("; ");
for(var i = 0;i < arrStr.length;i ++){
var temp = arrStr[i].split("=");
if(temp[0] == objName) return unescape(temp[1]);
}
return '';
}
//随机获取幸福标签下标
function get_rand_xingfu_tag_no()
{
count_xingfu_types = new Array();
xingfu_i = 0;
for(var xingfu_types in XF_data){
if(XF_data.hasOwnProperty(xingfu_types)){

count_xingfu_types[xingfu_i] = xingfu_types;	//取出幸福所有标签的数组下标
xingfu_i++;
}
}
count_xingfu_types.sort(randomsort);
return count_xingfu_types;
}
function randomsort(a, b)
{
return Math.random()>.5 ? -1 : 1;//用Math.random()函数生成0~1之间的随机数与0.5比较，返回-1或1
}
登录弹出回调  --- 登录弹出模块唯一对外接口
以下为登录弹出模块
var hder = {};
function header_login_pop_call(popInfo)
{
hder.loginPopInfo = popInfo; 
if(JY.url.getChannel() == "index"){
location.href = JY.url.getChannelUrl('usercp') + '?from=login';
}else{
location.reload(); 
}
}
//获取当前地域
function get_ip_loc()
{
var loc = JY.tool.cookie.get('ip_loc');
if(loc == null){
jQuery.ajax({ url:'/getprofile.php', type:'GET', async:false,
success:function(data){
var domain_suffix = ['com','cn','net'];
var host_arr = location.hostname.toLowerCase().split('.');
var host_len = host_arr.length;
var index_top_domain = '';
for(var i=host_len-1; i>=0; i--){
if(jy_head_function.in_array(domain_suffix, host_arr[i])){
index_top_domain = host_arr[i] + index_top_domain;
break;
}else{
index_top_domain = '.' + host_arr[i] + index_top_domain;
}
}
var num = parseInt(data);
if(!isNaN(num) && num)
JY.tool.cookie.set('ip_loc', num, 10*24*60, '/', index_top_domain);
loc = num;
}
});
}
if(!loc) loc = 11;
return loc;
}
//获取地域
function get_loc()
{
var l = JY.tool.cookie.get("selloc");
if(!l){
   l = get_ip_loc();
}
return l;
}
//去空格
String.prototype.trim = function()
{
return this.replace(/(^\s*)|(\s*$)/g, "");
}
function saveName(e)
{ 
if(e.checked == true) {
var r = false;
r = confirm("为了您的账号安全，请不要在网吧等公用电脑上使用此功能！\n手动退出后，此功能自动失效。");
if(r){
e.checked = true;
}else{
e.checked = false;
}
return false;
}
}
</script>
<meta name="baidu-site-verification" content="0oZpJ1ccMn" />
</head>
<body>

<script type="text/javascript">
if(index_visit === 0){window.location.href="denglu.html";}//未登录过，隐藏旧首页
</script>
    <script type="text/javascript">
var from_site = document.referrer;
if(from_site.indexOf('hao123') != -1){
var from_st_id = jy_head_function.get_cookie('FROM_ST_ID');
if(from_st_id != '1735351'){
jy_head_function.set_cookie('FROM_ST_ID', '3', '1h');
}
}
</script>
<style type="text/css">
/* 地区切换弹层 */
#jycm_head{}
#jycm_head .jycm_head_top{width:970px;height:70px;margin:0px auto}
#jycm_head .jycm_head_selectCity{display:inline;float:left;position:relative;width:60px;height:70px;z-index:2}
#jycm_head .jycm_head_clickCity{width:58px;height:40px;overflow:hidden;font-size:12px;margin-top:20px}
#jycm_head .jycm_head_clickCity p{width:58px;height:20px;line-height:20px;white-space:nowrap;text-align:center;overflow:hidden}
#jycm_head .jycm_head_clickCity p.jycm_head_nowCity{background:url(./img/jycm_head_point.png) no-repeat right center}
#jycm_head .jycm_head_clickCity a{color:#666;text-decoration:none}
#jycm_head .jycm_head_clickCity a:hover{color:#e7417f;text-decoration:underline}
#jycm_head .jycm_head_showCity{width:602px;border:1px solid #ccc;background:url(./img/jycm_city_map.jpg) no-repeat right bottom #fff;position:absolute;top:62px;left:0px;font-size:14px;color:#333;z-index:99999;display:none}
#jycm_head .jycm_city_close{height:20px;line-height:20px;padding:5px 10px 5px 0px}
#jycm_head .jycm_city_close a{float:right;line-height:20px;font-size:12px;color:#666;text-decoration:none;background:url(./img/jycm_city_close.gif) no-repeat 0px 4px;padding:0px 0px 0px 15px}
#jycm_head .jycm_city_close a:hover{color:#e7417f;text-decoration:underline}
#jycm_head .jycm_head_showCity dl{overflow:hidden;zoom:1;margin:0px;padding:0px 15px;line-height:40px}
#jycm_head .jycm_head_showCity dt{width:65px;text-align:right;height:40px;overflow:hidden;white-space:nowrap;display:inline;float:left;font-weight:bold}
#jycm_head .jycm_head_showCity dd{display:inline;float:left;width:505px;margin:0px}
#jycm_head .jycm_head_showCity dd p{overflow:hidden;zoom:1}
#jycm_head .jycm_head_showCity dd p span{display:inline;float:left;width:55px;height:40px;overflow:hidden;zoom:1;white-space:nowrap;cursor:pointer}
/* 地区切换弹层 */
/*弹层样式*/
*{margin:0;padding:0}
.IndexPop-Album-big-p{ position:relative}
.IndexPop-Album-big-p .box{ position:absolute;left:0px;top:8px}
.s_img_box,.b_img_box{overflow:hidden;position:relative;left:0px;top:0px}
.s_img_box img,.b_img_box img{position:absolute;left:0px;top:0px}
.s_img_box{width:50px;height:50px}
.b_img_box{width:210px;height:210px;margin-left:13px;display:block}

span.home_top_other_login{margin:0 -10px 0 5px}
span.home_top_other_login a{position:relative;margin:0 10px 0 0;top:3px}
</style>
    <!--S popa-->
    <div id="pop_index_div" class="IndexPop-wrapper" style="display:none">
      <div class="IndexPop-content">
        <!--男女第一处不同 女性使用IndexPop-pnga，男性使用IndexPop-pnga-man，晒幸福IndexPop-pnga-showhappiness-->
        <p id="pop_class_1" class="IndexPop-pnga-man"></p>
        <p class="IndexPop-pngb"></p>
        <p class="IndexPop-top"><a href="javascript:CloseDiv('pop_index_div');">X</a></p>
        <!--男女第二处不同 女性和晒幸福使用IndexPop-cnt-top-girl，男性使用IndexPop-cnt-top-->
        <div id="pop_class_2" class="IndexPop-cnt-top">
            <div class="IndexPop-Album">
                <div class="IndexPop-Album-big">
                    <p class="IndexPop-Album-big-p">
                        <span class="box">
                            <a id="b_photo0" class="b_img_box"><img id="b_img0" src="./img/block_1x1.gif" /></a>
                            <a id="b_photo1" style="display:none" class="b_img_box"><img id="b_img1" src="./img/block_1x1.gif" /></a>
                            <a id="b_photo2" style="display:none" class="b_img_box"><img id="b_img2" src="./img/block_1x1.gif" /></a>
                            <a id="b_photo3" style="display:none" class="b_img_box"><img id="b_img3" src="./img/block_1x1.gif" /></a>
                        </span>
                    </p>
                </div>
                <table width="0" border="0" cellspacing="6" cellpadding="0" class="IndexPop-Album-small">
                  <tr>
                    <td><div class="s_img_box"><img id="s_img0" onclick="show_photo(0);" src="./img/block_1x1.gif" /></div></td>
                    <td><div class="s_img_box"><img id="s_img1" onclick="show_photo(1);" src="./img/block_1x1.gif" /></div></td>
                    <td><div class="s_img_box"><img id="s_img2" onclick="show_photo(2);" src="./img/block_1x1.gif" /></div></td>
                    <td><div class="s_img_box"><img id="s_img3" onclick="show_photo(3);" src="./img/block_1x1.gif" /></div></td>
                  </tr>
                </table>
            </div>
            <div class="IndexPop-PersonalInformation">
                <div class="fn-clear">
                    <!--用户信息使用class="colorE7417F"，晒幸福使用class="colorE7417F fn-left"-->
                    <h2 id="pop_title" class="colorE7417F"></h2>
                    <!--用户信息使用class="IndexPop-User-profile"，晒幸福使用class="IndexPop-broadcast IndexPop-broadcast-girl fn-right"-->
                    <p id="pop_intro" class="IndexPop-User-profile"></p>
                </div>
                <div class="IndexPop-PersonalInformationBottom">
                    <!--晒幸福多出H3这一行，个人信息此行隐藏style.display:none-->
                    <h3 id="pop_space_name"></h3>
                    <p id="pop_content" class="color666">数据载入中.....</p>
                </div>
            </div>
        </div>
        <iframe id="pop_register_form" frameborder="0" scrolling="no" name="pop_register_form" style="position:static" src=""></iframe>
      </div>
      <!--[if IE 6]><iframe class="div_iframe" src="javascript:'';"></iframe><![endif]-->
    </div>
    <!--E popb-->
    <script type="text/javascript">
    //获取UID
    if(typeof HEAD_USER != "undefined"){
        user_uid = HEAD_USER.uid;
    }else{
        user_uid = 0;
    }
    //页面弹层JS开始
    //显示表单（弹层类型，空间ID或者用户UID，性别）
    function show_div(type, id, sex)
    {
        var reg_bd = '';
        var total_tag = '';
        //初始化照片区域
        for(var i=0; i<4; i++){
            ljf('b_img'+i).src = './img/block_1x1.gif';
            ljf('s_img'+i).src = './img/block_1x1.gif';
            //ljf('s_img'+i).style.cursor = "pointer";
        }
        //弹层样式处理
        if(type == 2){
            //按性别设置弹层的样式
            if(sex == 'm'){
                ljf('pop_class_1').className = 'IndexPop-pnga-man';
                ljf('pop_class_2').className = 'IndexPop-cnt-top';
                reg_bd = 206;
                total_tag = '|index2012_search_pop_img_m|';
                send_jy_pv2('|search_male|');
            }else{
                ljf('pop_class_1').className = 'IndexPop-pnga';
                ljf('pop_class_2').className = 'IndexPop-cnt-top-girl';
                reg_bd = 207;
                total_tag = '|index2012_search_pop_img_f|';
                send_jy_pv2('|search_female|');
            }
            //为4个小图增加统计标签
            for(var tt=0; tt<3; tt++){
                ljf('s_img' + tt).setAttribute("onmousedown", "javascript:send_jy_pv2('"+total_tag+"');");
                //ljf('s_img'+tt).style.cursor = "pointer";
            }
            ljf('pop_title').className = 'colorE7417F';
            ljf('pop_intro').className = 'IndexPop-User-profile';
            ljf('pop_space_name').style.display = 'none';
            ljf('pop_register_form').src = '/register/promise/reg.html?bd=' + reg_bd + '&pre_url=http://www.jiayuan.com/' + id;
            get_profile_infos(id);
        }else if(type == 1){
reg_bd = 208;
            ljf('pop_class_1').className = 'IndexPop-pnga-showhappiness';
            ljf('pop_class_2').className = 'IndexPop-cnt-top-girl';
            ljf('pop_title').className = 'colorE7417F fn-left';
            ljf('pop_intro').className = 'IndexPop-broadcast IndexPop-broadcast-girl fn-right';
            ljf('pop_space_name').style.display = '';
            ljf('pop_register_form').src = '/register/promise/reg.html?s=2&bd=' + reg_bd + '&pre_url=http://love.jiayuan.com/myspace.php?id=' + id;
            //为4个小图增加统计标签
            for(var tt=0; tt<3; tt++){
                ljf('s_img' + tt).setAttribute("onmousedown", "javascript:send_jy_pv2('|index2012_xf_pop_img|');");
                //ljf('s_img'+tt).style.cursor = "pointer";
            }
            send_jy_pv2('|shaixingfu_show|');
            get_xingfu_infos(id);
        }
    }
    //最终显示弹层
    function show_div_now()
    {
        jy_head_function.lbg_show('pop_index_div');
        jQuery('#pop_class_2 img').load(function(){
show_photo(0);
        });
    }
    //关闭层
    function CloseDiv(div_id)
    {
        jy_head_function.lbg_hide();
    }
    //照片截取
    function cutImage(obj,size){
    
        var img = new Image(); 
        img.src = jQuery('#'+obj).attr('src');
    
        var old_width = img.width;
        var old_height = img.height;
        var flag = old_width > old_height ? old_height/size :old_width/size;
    
        var this_width = old_width/flag;
        var this_height = old_height/flag;
    
        if(this_width < size) this_width = size;
        if(this_height < size) this_height = size;
    
        jQuery('#'+obj).width(this_width);
        jQuery('#'+obj).height(this_height);
    
        var offset_height = jQuery('#'+obj).height()*0.1;//距离顶部的高度百分比10%
        var offset_width = (jQuery('#'+obj).width() - size)/2;
    
        if(old_width < old_height){
            jQuery('#'+obj).css('left','0px');
            if(jQuery('#'+obj).height()*0.9 > size){
                jQuery('#'+obj).css('top','-'+offset_height+'px');
            }else{
                jQuery('#'+obj).css('top','0px');
            }
        }else if(old_width > old_height){
            jQuery('#'+obj).css('left','-'+offset_width+'px');
            jQuery('#'+obj).css('top','0px');
        }else{
            jQuery('#'+obj).css('left','0px');
            jQuery('#'+obj).css('top','0px');
        }
    
        if(jQuery('#'+obj).attr('src') != './img/block_1x1.gif') jQuery('#'+obj).css('cursor','pointer');
        else jQuery('#'+obj).css('cursor','default');
    
    }
    //获取个人弹层相关信息
    function get_profile_infos(id)
    {
        var url = "/dynmatch/ajax/index_new.php?type=2&id=" + id;
        jQuery.ajax({ url:url, type:'GET', async:false,
            success:function(data){
                var obj_datas = eval("(" + data + ")");
                ljf('pop_title').innerHTML = obj_datas[0]['nickname'];
                str_pop_intro = obj_datas[0]['age']+'，'+obj_datas[0]['marriage']+'，'+obj_datas[0]['work_location'];
                if(obj_datas[0]['work_sublocation']){
                    str_pop_intro += obj_datas[0]['work_sublocation']+'，';
                }
                if(obj_datas[0]['education']){
                    str_pop_intro += obj_datas[0]['education']+'，';
                }
                str_pop_intro += obj_datas[0]['height']+'，'+obj_datas[0]['income'];
                ljf('pop_intro').innerHTML = str_pop_intro;
                ljf('pop_content').innerHTML = obj_datas[0]['shortnote'];
                for(pkey in obj_datas[0]['photos']){
if(obj_datas[0]['photos'].hasOwnProperty(pkey)){
if(pkey > 3){break;}
//按比例缩放
ljf('b_img' + pkey).src = obj_datas[0]['photos'][pkey]['burl'];
ljf('s_img' + pkey).src = obj_datas[0]['photos'][pkey]['url'];
//ljf('s_img'+pkey).style.cursor = "pointer";
}
                }
                show_div_now();
            }
        });
    }
    //获取晒幸福弹层相关信息
    function get_xingfu_infos(id)
    {
        var url = "/dynmatch/ajax/index_new.php?type=1&id=" + id;
        jQuery.ajax({ url:url, type:'GET', async:false,
            success:function(data){
                if(data == 'nothing'){
                    alert('抱歉，此空间已经被用户关闭！');
                    return;
                }
                var obj_datas = eval("(" + data + ")");
                ljf('pop_space_name').innerHTML = obj_datas['space_name'];
                ljf('pop_title').innerHTML = obj_datas['nickname_f'] + '&nbsp;<span>&</span>&nbsp;' + obj_datas['nickname_m'];
                ljf('pop_intro').innerHTML = obj_datas['diff_date'] + '他们宣布：<br /><span class="colorE7417F">' + obj_datas['date_type'] + '</span>';
                ljf('pop_content').innerHTML = obj_datas['content'];
                for(pkey in obj_datas['photos']){
if(obj_datas['photos'].hasOwnProperty(pkey)){
if(pkey > 3){break;}
ljf('b_img' + pkey).src = obj_datas['photos'][pkey]['src'];
ljf('s_img' + pkey).src = obj_datas['photos'][pkey]['small_src'];
//ljf('s_img'+pkey).style.cursor = "pointer";
}
                }
                if(!pkey){
                    //如果空间没有照片，就使用展示图片
                    ljf('b_img' + pkey).src = obj_datas['photos'][pkey]['src'];
                    ljf('s_img' + pkey).src = obj_datas['photos'][pkey]['small_src'];
                    //ljf('s_img'+pkey).style.cursor = "pointer";
                }
                show_div_now();
            }
        });
    }
    //展示照片
    function show_photo(v)
    {
        if(ljf('b_img' + v).src == './img/block_1x1.gif') return false;//无照片
        for(var i=0; i<4; i++){
            ljf('b_photo' + i).style.display = 'none';
            cutImage('s_img' + i,50);
        }
        ljf('b_photo' + v).style.display = '';
        cutImage('b_img' + v,210);
    }
    //页面弹层JS结束
    </script>
    
    
    <!--S 网站顶部-->
    <script type="text/javascript">
//拼接城市选择HTML
var NewLine = '\n';
var select_city = '';
select_city+='<div id="jycm_head_clickCity" class="jycm_head_clickCity">'+NewLine;
select_city+='    <p class="jycm_head_nowCity" id="show_loc_div"><a href="javascript:;" id="city_text"></a></p>'+NewLine;
select_city+='    <p class="jycm_head_qieCity"><a href="javascript:;" id="open1">[切换城市]</a></p>'+NewLine;
select_city+='</div>'+NewLine;
select_city+='<div id="jycm_head_showCity" class="jycm_head_showCity">'+NewLine;
select_city+='    <div class="jycm_city_close" id="closepop"><a href="javascript:;" onclick="return false;">关闭</a></div>'+NewLine;
select_city+='    <dl>'+NewLine;
select_city+='        <dt><span>华　北：</span></dt>'+NewLine;
select_city+='        <dd><p><span class="citylist" id="a11">北京市</span><span class="citylist" id="a12">天津市</span><span class="citylist" id="a13">河北</span><span class="citylist" id="a14">山西</span><span class="citylist" id="a15">内蒙古</span></p></dd>'+NewLine;
select_city+='    </dl>'+NewLine;
select_city+='    <dl>'+NewLine;
select_city+='        <dt><span>东　北：</span></dt>'+NewLine;
select_city+='        <dd><p><span class="citylist" id="a23">黑龙江</span><span class="citylist" id="a22">吉林</span><span class="citylist" id="a21">辽宁</span></p></dd>'+NewLine;
select_city+='    </dl>'+NewLine;
select_city+='    <dl>'+NewLine;
select_city+='        <dt><span>华　东：</span></dt>'+NewLine;
select_city+='        <dd><p><span class="citylist" id="a31">上海市</span><span class="citylist" id="a32">江苏</span><span class="citylist" id="a33">浙江</span><span class="citylist" id="a34">安徽</span><span class="citylist" id="a35">福建</span><span class="citylist" id="a36">江西</span><span class="citylist" id="a37">山东</span></p></dd>'+NewLine;
select_city+='    </dl>'+NewLine;
select_city+='    <dl>'+NewLine;
select_city+='        <dt><span>中　南：</span></dt>'+NewLine;
select_city+='        <dd><p><span class="citylist" id="a41">河南</span><span class="citylist" id="a42">湖北</span><span class="citylist" id="a43">湖南</span><span class="citylist" id="a44">广东</span><span class="citylist" id="a45">广西</span><span class="citylist" id="a46">海南</span></p></dd>'+NewLine;
select_city+='    </dl>'+NewLine;
select_city+='    <dl>'+NewLine;
select_city+='        <dt><span>西　南：</span></dt>'+NewLine;
select_city+='        <dd><p><span class="citylist" id="a50">重庆市</span><span class="citylist" id="a51">四川</span><span class="citylist" id="a52">贵州</span><span class="citylist" id="a53">云南</span><span class="citylist" id="a54">西藏</span></p></dd>'+NewLine;
select_city+='    </dl>'+NewLine;
select_city+='    <dl>'+NewLine;
select_city+='        <dt><span>西　北：</span></dt>'+NewLine;
select_city+='        <dd><p><span class="citylist" id="a61">陕西</span><span class="citylist" id="a62">甘肃</span><span class="citylist" id="a63">青海</span><span class="citylist" id="a64">宁夏</span><span class="citylist" id="a65">新疆</span></p></dd>'+NewLine;
select_city+='    </dl>'+NewLine;
select_city+='    <dl>'+NewLine;
select_city+='        <dt><span>港澳台：</span></dt>'+NewLine;
select_city+='        <dd><p><span class="citylist" id="a81">香港</span><span class="citylist" id="a82">澳门</span><span class="citylist" id="a71">台湾</span></p></dd>'+NewLine;
select_city+='    </dl>'+NewLine;
select_city+='    <dl>'+NewLine;
select_city+='        <dt><span>国　外：</span></dt>'+NewLine;
select_city+='        <dd><p><span class="citylist" id="a99">国外</span></p></dd>'+NewLine;
select_city+='    </dl>'+NewLine;
select_city+='</div>'+NewLine;
//修改地区显示的效果，将地区弹层写入地区标签里
document.getElementById('jy_head_city_select').className = 'jycm_head_selectCity';
document.getElementById('jy_head_city_select').innerHTML = select_city;
//切换地区
    wait(function(){return typeof $ != "undefined" && typeof JY != "undefined"}, function(){
        //地区标红和点击
        jQuery("#city_text").html(jQuery("#a"+get_loc()).addClass("red").html());
        jQuery("#jycm_head_clickCity").show();
        jQuery("#jycm_head_showCity dl dd p .citylist").click(function(){
            JY.tool.cookie.set("selloc", this.id.match(/\d+/)[0], 10*24*60);
            set_index_search_cookie();
            window.location.reload();
        });
        //隐藏地区层
        jQuery("#closepop").click(function(){
            jQuery("#jycm_head_clickCity").removeClass('Indexcity-Selected-after').addClass('Indexcity-Selected-before');
            jQuery("#jycm_head_showCity").hide();
        });
        //显示地区层
        jQuery("#jycm_head_clickCity").click(function(){
            jQuery("#jycm_head_showCity").show();
            jQuery("#jycm_head_clickCity").removeClass('Indexcity-Selected-before').addClass('Indexcity-Selected-after');
        });
    });
    jQuery(document).ready(function(){
        jQuery('#jycm_head_clickCity a').click(function(){
            jQuery('#jycm_head_showCity').show();
        });
        jQuery('#jycm_head_showCity div.jycm_city_close a').click(function(){
            jQuery('#jycm_head_showCity').hide();
        });
        jQuery('#jycm_head_showCity dd span').click(function(){
            var _thisHtml = jQuery(this).html();
            jQuery('#jycm_head_clickCity a').eq(0).html(_thisHtml);
            jQuery('#jycm_head_showCity').hide();
        });
    });
//设置地区
    function set_loc(loc_id)
    {
        jQuery("#a"+get_loc()).removeClass("red");
        JY.tool.cookie.set("selloc", loc_id);
        jQuery("#city_text").html(jQuery("#a"+get_loc()).addClass("red").html());
    }
    //向COOKIE里写标志，用于按地区搜索数据
    function set_index_search_cookie()
    {
        JY.tool.cookie.set('index_loc_default', 'hi');
    }
    //选中指定的下拉列表项
    function jsSelectItem(objSelect, objItemValue)
    {
        for(var i=0; i<objSelect.options.length; i++){
            if (objSelect.options[i].value == objItemValue){
                objSelect.options[i].selected = true;
                break;
            }
        }
    }
</script>
    <!--E 网站顶部-->
<!--E 临时提示信息-->
    <style type="text/css">
    .tixingText{width:968px;background:#FEFFE5;border:solid 1px #F9F2A7;margin:0 auto;height:24px;line-height:24px;overflow:hidden}
    .tixingTextdiv{float:left;width:940px;text-align:center}
    a:link.tixingTextClose,a:active.tixingTextClose,a:visited.tixingTextClose{width:20px;height:23px;display:block;background:url(./img/tixingTextClose.jpg);float:right}
    a:hover.tixingTextClose{background:url(./img/tixingTextClose2.jpg);}
    </style>
    <div id="tixingText" class="tixingText" style="display:none">
        <div class="tixingTextdiv">2013年12月18日凌晨02:00--05:00，世纪佳缘将进行系统升级。在此期间，短暂影响您的发信、看信和支付，会员数据不会丢失，给您带来的不便，敬请谅解！</div>
        <a class="tixingTextClose" onclick="javascript:document.getElementById('tixingText').style.display='none'" href="javascript:"></a>
    </div>
    <!--E 临时提示信息-->
    <script type="text/javascript">
    //按钮点击统计
    function header_login_pop_click_stat(detailUrl)
    {
        var user = JY.login.user;
        var url='http://59.151.18.14/call/v.gif?w=1&location=';
        url+=user['work_location']+"&sex="+user['sex']+"&age="+user['age']+"&uid="+user['uid']+"&pv=c_login";
        url+='&url='+detailUrl;
        var img = new Image();
        img.src = url;
    }    
    //切换城市统计标签切换
    function set_selcity_tag_total()
    {
        if(user_uid > 0){
            ljf('city_text').setAttribute("onmousedown","javascript:send_jy_pv2('|index2012_selcity_login|');");
            ljf('open1').setAttribute("onmousedown","javascript:send_jy_pv2('|index2012_selcity_login|');");
        }else{
            ljf('city_text').setAttribute("onmousedown","javascript:send_jy_pv2('|index2012_selcity_logout|');");
            ljf('open1').setAttribute("onmousedown","javascript:send_jy_pv2('|index2012_selcity_logout|');");
        }
    }
    set_selcity_tag_total();
    </script>
    <!--E 网站头部-->
    <!--S Indexcontent-->
    <div class="Indexcontent">
      <div class="fn-clear">
        <div class="fn-left">
            <!-- ==S RegisterArea-->
            <div class="RegisterArea">
              <!-- 登录前  star-->
              <div id="index_reg_div">
                  <p class="IPOImg"><img src="{{ asset('/home/img/Index_img01.gif') }}" alt="" width="278" height="90"/></p>
                  <p class="ui-btn-IndexReg">
                  	<a onmousedown="send_jy_pv2('|index2012_reg_right1|');" href="http://reg.jiayuan.com/?bd=204" target="_blank">免费注册</a>
                  </p>
                  <p class="IndexMember ui-link-underline ui-link-333toE7417F">
                    <a onmousedown="send_jy_pv2('|index2012_login_link|');" href="{{ url('/home/myqianyuan/index')}}" target="_blank">我的佳缘</a>
                
                  </p>
                  <span class="IndexMember ui-link-underline ui-link-333toE7417F">
                    <a onmousedown="send_jy_pv2('|index2012_login_link|');" href="{{ url('/home/msg/index')}}" target="_blank">消息中心</a>
                    
                  </span>
                  <span class="IndexMember ui-link-underline ui-link-333toE7417F">
                    <a onmousedown="send_jy_pv2('|index2012_login_link|');" href="{{ url('/home/search/index')}}" target="_blank">会员搜索</a>
                    
                  </span><span class="IndexMember ui-link-underline ui-link-333toE7417F">
                    <a onmousedown="send_jy_pv2('|index2012_login_link|');" href="{{ url('/home/user/index')}}" target="_blank">个人中心</a>
                    
                  </span>
                  </span><span class="IndexMember ui-link-underline ui-link-333toE7417F">
                    <a onmousedown="send_jy_pv2('|index2012_login_link|');" href="{{ url('/home/activity/index')}}" target="_blank">活动中心</a>
                    
                  </span>

              </div>
              <!-- 登录前  end-->
              <!-- 登录切换  star-->
              <div id="index_login_form" style="display:none">
                  <script type="text/javascript">
                  function check_form()
                  {
                      if(ljf('login_email').value == '' || ljf('login_email').value == '邮箱/手机号/佳缘ID'){
                          alert('请输入登录帐号！');
                          ljf('login_email').focus();
                          return false;
                      }
                      if(ljf('login_password').value == ''){
                          alert('请输入登录密码！');
                          ljf('login_password').focus();
                          return false;
                      }
  ljf('login_email').action = 'http://' + mydomain + '/login/dologin.php';
  ljf('login_email').submit();
                  }
                  </script>
                  
              </div>
              <!-- 登录切换  end-->
              <!-- 登录后  star-->
              <div id="index_login_div" class="WelcomeMemberArea" style="display:none">
                  <div class="WelcomeMember-P fn-clear">
                      <p class="WelcomeMember fn-left">
                          欢迎您：<span class="ui-link-Nounderline"><a onmousedown="send_jy_pv2('|index2012_login_nickname|');" href="/usercp/" class="colorE7417F" target="_blank">昵称</a></span>
                      </p>
                      <p class="ui-link-underline ui-link-333toE7417F fn-right"><a onmousedown="send_jy_pv2('|index2012_login_tuichu|');" href="/login/logout.php">退出</a></p>
                  </div>
                  <div class="fn-clear">
                      <div class="ShadowB fn-left" id="zhima_credit">
                          <p class="ShadowB-bg"></p>
                          <a id="touxiang" onmousedown="send_jy_pv2('|index2012_login_|index2012_login_photo|');" href="" target="_blank"><img src="./img/img02.jpg" alt="" width="90" height="110" /></a>
  <!-- 首页芝麻信用分 start  -->
    <script>
    if( HEAD_USER.uid > 0 )
    {
$.ajax({
    type:"get",
    url:"/usercp/zhima_credit.php",
    async: false,
    data:{},
    success:function(msg)
    {
if (msg == -1) {
    $('#zhima_credit').append('<a href="/usercp/approve/zmxyentity.php" onmousedown="'+send_jy_pv2('|profile_credit_clicknum|')+';" target="_blank" class="credit_bg credit_no">芝麻信用分</a>');
}
else if (msg == -2) {
    
    $('#zhima_credit').append('<a href="/usercp/approve/zmxyentity.php" target="_blank" onmousedown="'+send_jy_pv2('|profile_credit_clicknum|')+';" class="credit_bg credit_no">芝麻信用分</a>');
    
}
else
{
    $('#zhima_credit').append('<a href="/usercp/approve/zmxyentity.php" onmousedown="'+send_jy_pv2('|profile_credit_clicknum|')+';" target="_blank" class="credit_bg credit_yes">芝麻信用分<span>'+msg+'</span></a>');
}
    }
});
    }
    
    </script>
<!-- 首页芝麻信用分 end -->
                      </div>
                      <ul id="index_userinfo" class="WelcomeMember-ul color666 fn-right">
                          <li>邮件：<span class="ui-link-2C81D6toE7417F ui-link-underline"><a onmousedown="send_jy_pv2('|index2012_login_mail|');" href="http://www.jiayuan.com/msg/" target="_blank">查看邮件</a></span></li>
                          <li>礼物：<span class="ui-link-2C81D6toE7417F ui-link-underline"><a onmousedown="send_jy_pv2('|index2012_login_gift|');" href="http://gift.jiayuan.com/" target="_blank">查看礼物</a></span></li>
                          <li>资料：<span id="ziliao" class="colorE7417F"></span>&nbsp;<span class="ui-link-2C81D6toE7417F ui-link-underline"><a onmousedown="send_jy_pv2('|index2012_login_profile|');" href="/usercp/profile.php" target="_blank">完善</a></span></li>
                          <li>照片：<span id="zhaopian" class="colorE7417F"></span>&nbsp;<span class="ui-link-2C81D6toE7417F ui-link-underline"><a onmousedown="send_jy_pv2('|index2012_login_upload|');" href="/usercp/photo.php" target="_blank">上传</a></span></li>
                          <li><script>if(HEAD_USER.uid > 0 && HEAD_USER.type == 10){document.write('佳缘宝');}else{document.write('邮票');}</script>：<span id="youpiao" class="colorE7417F"></span>&nbsp;<span class="ui-link-2C81D6toE7417F ui-link-underline"><a onmousedown="send_jy_pv2('|index2012_login_stamp|');" href="/usercp/center/charge.php#author_wp" target="_blank">充值</a></span></li>
                      </ul>
                  </div>
                  <p class="ui-btn-ComeintomyJY"><a href="http://usercp.jiayuan.com/" target="_blank">进入我的佳缘</a></p>
                  <p id="tuijian_block" class="Referral-service">
                      推荐服务：
                      <span class="ui-link-underline ui-link-E7417FtoE7417F"></span>
                  </p>
              </div>
              <!-- 登录后  end-->
            </div>
            <!-- ==E RegisterArea-->
        </div>
        <div class="fn-right">
            <!-- ==S Focus-->
            <!--焦点图 开始-->
            <div class="banner">
                <ul class="img">
                    <li style="float:left;"><img src="{{ $data -> image1}}"></li>
                    <li style="float:left;"><img src="{{ $data -> image2}}"></li>
                    <li style="float:left;"><img src="{{ $data -> image3}}"></li>
                    <li style="float:left;"><img src="{{ $data -> image4}}"></li>
                  
                    
                </ul>
                <ul class="num">
                    <li class="on"></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    
                </ul>
                <div class="btn btn_l">&lt;</div>
                <div class="btn btn_r">&gt;</div>
            </div>
           
                    <script type="text/javascript">
                            //定义全局变量
                            var i = 0;
                            //第一步 先克隆图片
                            var cloneimg = $('.banner .img li').first().clone();
                            //第二步
                            $('.banner .img').append(cloneimg);
                            //获取图片个数
                            var length = $('.banner .img li').length;

                            //绑定单击事件
                            $('.banner .btn_l').click(function(){
                                //图片移动
                                moveL();
                            })
                            //绑定单击事件
                            $('.banner .btn_r').click(function(){
                                //图片移动
                                moveR();
                            })

                            //启动定时器
                             var inte = setInterval(moveR,3000);

                            //鼠标悬停效果
                            $('.banner').hover(function(){
                                //清除定时器
                                clearInterval(inte);
                            },function(){
                                //启动
                                inte = setInterval(moveR,3000);
                            })

                            //给小圆点绑定鼠标划入事件
                            $('.banner .num li').hover(function(){
                                //获取当前的索引
                                var index = $(this).index();
                                i = index;
                                newLeft = i*650;
                                $('.banner .img').animate({left:-newLeft+'px'},650);
                                $('.banner .num li').eq(i).addClass('on').siblings().removeClass('on');
                            })


                            //封装向右移动的方法
                            function moveR(){
                                i++;
                                //判断越界
                                if(i == length){
                                    // i=0;
                                    //第三步 用css快速把位置跳到0
                                    $('.banner .img').css({left:0});
                                    i = 1;
                                }
                                //计算left
                                var newLeft = i*650;
                                //设置样式
                                $('.banner .img').animate({left:-newLeft+'px'},650);
                                //设置圆点
                                if(i == length-1){
                                    $('.banner .num li').eq(0).addClass('on').siblings().removeClass('on');
                                }else{
                                    $('.banner .num li').eq(i).addClass('on').siblings().removeClass('on'); 
                                }
                            }

                            //封装向左移动的方法
                            function moveL(){
                                i--;
                                //判断越界
                                if(i == -1){
                                    // i = length-1;
                                    $('.banner .img').css({left:-(length-1)*650});
                                    i = length-2;
                                }
                                //计算left
                                var newLeft = i*650;
                                //设置样式
                                $('.banner .img').animate({left:-newLeft+'px'},1300);
                                $('.banner .num li').eq(i).addClass('on').siblings().removeClass('on');
                            }
                            </script>
                                            
                    
                            <!--焦点图 结束-->
                            <!-- ==E Focus-->
        </div>
   
                      <div class="fn-clear">
                        <!-- =S Indexleft-->
                        <div class="fn-left">
                            <!-- ==S ShowHappinessArea-->
                            <div class="ShowHappinessArea">
                                <div class="fn-clear">
                                
                                  <h2 class="ui-link-333toE7417F fn-left ui-link-Nounderline"><a id="xf_title" href="{{ url('/home/success/index') }}" target="_blank">晒幸福</a></h2>
                                  <ul class="ui-tab-underBg fn-left" id="kk">
                                    <li class="tabactive" id="tablink0" value="0" data="0">一波三折</li>
                                    <li id="tablink1" value="1" data="1">郎才女貌</li>
                                    <li id="tablink2" value="2" data="2">一见钟情</li>
                                    <li id="tablink3" value="3" data="3">90后</li>
                                  </ul>
                                  <span class="more Indexmore ui-link-underline ui-link-2C81D6toE7417F fn-right"><a id="xf_more" href="{{ url('/home/success/index') }}" target="_blank">更多&gt;&gt;</a></span>
                                </div>
                                <div>
                                    <div class="ui-tab-underBg-content">
                                        <ul id="tabcontent0"><!-- <li class="ShadowA bar">
                                               <p class="ShadowA-bg"></p> 
                                               <a onmousedown="send_jy_pv2(\'|index2012_xf_link|\');" href="http://love.jiayuan.com/myspace.php?id='+XF_data[data_key]['data'][sub_key]['sid']+'" id="open_pop" target="_blank"><img id="xf_pic_'+XF_data[data_key]['data'][sub_key]['sid']+'" src="'+XF_data[data_key]['data'][sub_key]['pic_url']+'" alt="" width="120" height="120"/></a>
                                               <div class="ShadowA-Hover mosaic-overlay">
                                                    <span class="ShadowA-HoverBg"></span>
                                                    <div class="ShadowA-Hover-p">
                                                        <p>'+XF_data[data_key]['data'][sub_key]['love1']+'&'+XF_data[data_key]['data'][sub_key]['love2']+'</p>
                                                        <p class="colorccc">'+XF_data[data_key]['data'][sub_key]['love_data']+'</p>
                                                    </div>
                                                </div>
                                            </li> -->
                                            </ul>
                                       <!--  <ul id="tabcontent1" style="display:none"></ul>
                                        <ul id="tabcontent2" style="display:none"></ul>
                                        <ul id="tabcontent3" style="display:none"></ul> -->
                                    </div>
                                </div>
                            </div>
            <script type="text/javascript">
            //处理晒幸福
              window.onload=function(){
             $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
         
      
         //添加事件
          shaixingfu(); //调用数据ss
        $('#tablink0').click(shaixingfu);
        $('#tablink1').click(shaixingfu);
        $('#tablink2').click(shaixingfu);
        $('#tablink3').click(shaixingfu);
        function shaixingfu(){

            var type = $(this).attr("data");
            
           // alert(type == undefined);
            if(type == undefined)
            {
                type = '0';
            }
            else
            {
                $(this).addClass("tabactive");
                $(this).siblings().removeClass('tabactive');
            }
            //发送ajax
            $.get('/home/index/ajaxSuccess',{type:type},function(data){
                $('#tabcontent0').empty();
                    var   txt = "";
                     jQuery.each(data, function(i,item){  
                       
                        txt += '<li class="ShadowA bar">';
                        txt += '  <p class="ShadowA-bg"></p>';
                        
                        txt += '  <a  href="http://love.jiayuan.com/myspace.php?id='+item.id+'" id="open_pop" target="_blank">';
                       
                        txt += '      <img id="xf_pic_" src="'+(item.image)+'" alt="" width="120" height="120"/>';
                        txt += '  </a>';
                        txt += '  <div class="ShadowA-Hover mosaic-overlay">';
                        txt += '      <span class="ShadowA-HoverBg"></span>';
                        txt += '      <div class="ShadowA-Hover-p">';
                        txt += '          <p>'+item.manname+'&'+item.womanname+'</p>';
                        txt += '          <p class="colorccc">'+(new Date(item.time))+'</p>';
                        txt += '      </div>';
                        txt += '  </div>';
                        txt += '</li>';  
                    });  
                        
                      $('#tabcontent0').append(txt);    //设置内容
            },'json');
        }
       
                for (var i=18;i<=99;i++){
                    var val = i;
                    var txt = i;
                    var sel = document.getElementById("common_search_bar_min_age");
                    var option = new Option(txt, val);      
                    sel.options.add(option);  
                }
                for (var i=22;i<=99;i++){
                    var val = i;
                    var txt = i;
                    var sel = document.getElementById("common_search_bar_max_age");
                    var option = new Option(txt, val);      
                    sel.options.add(option);  
                }
              
               
                //页面滚动加载用户
                // $(window).scroll(uplode)
                // function  uplode(){
                //     //alert(111);
                //     $.get('/home/index/ajaxSearch',function(data){
                //         alert(data);
                //         $('#search_result').empty();
                //             var txt = "";
                       
                //             jQuery.each(data, function(i,result){ 

                            
                //             }
                //             $('#search_result').append(txt);   
                //   },'json');  
              
                // }
                
           
        }   
            </script>
            <!-- ==E ShowHappinessArea-->
            <!--S 搜缘分-->
            <script type="text/javascript">
            /*
            获取数据
            参数：v=-1,未登录默认搜索,v=UID,登录默认搜索,v=0,手动按条件搜索；p,页码
            */
            //获取晒幸福弹层相关信息
//             function search_info(v, p)
//             {
//                 var url = "/dynmatch/ajax/index_new.php";
//                 if(v==0){
//                     url = get_search_url(url, p);
//                     set_page_class(p);		//设置页码样式

//                     show_index_search(0);	//显示搜索条件
//                 }
//                 jQuery.ajax({ url:url, type:'GET', async:false,
//                     success:function(data){
//                         var datas = data;
//                         var search_result = '';
//                         var profile_url = '';
//                         var info_target = '';
//                         var total_tag 	= '';
//                         var total_tag2	= '';
//                         if(datas != ''){

//                             var objData = eval("(" + datas + ")");	//接收返回的数据
//                             var right_class = '';
//                             for(var key in objData){
// if(objData.hasOwnProperty(key)){
// if(key == 9){
// right_class = 'FindLover-cnt-block-itemB FindLover-cnt-block-item-last';
// }else if(key == 8){
// right_class = 'FindLover-cnt-block-item-last';
// }else if(key % 2 != 0){
// right_class = 'FindLover-cnt-block-itemB';
// }else{
// right_class = '';
// }
// if(user_uid > 0){
// profile_url = 'http://www.jiayuan.com/' + objData[key]['uid_disp'];
// info_target = 'target="_blank"';
// total_tag 	= 'onmousedown="send_jy_pv2(\'|index2012_search_link_' + objData[key]['sex'] + '|\')"';	//登录后，跳转链接的点击统计
// total_tag2	= 'onmousedown="send_jy_pv2(\'|index2012_search_service_login|\')"';					//会员用友服务的链接点击统计
// }else{
// profile_url = 'javascript:show_div(2, ' + objData[key]['uid_disp'] + ', \'' + objData[key]['sex'] + '\')';
// total_tag2	= 'onmousedown="send_jy_pv2(\'|index2012_search_service_logout|\')"';
// }
// search_result += '<li class="FindLover-cnt-block-item ' + right_class + '">';
// search_result += '	<div class="ShadowB fn-left">';
// search_result += '		<p class="ShadowB-bg"></p>';
// search_result += '		<a ' + total_tag + ' href="' + profile_url + '" ' + info_target + '><img src="' + objData[key]['avatar_url'] + '" alt="" width="90" height="110"/></a>';
// search_result += '	</div>';
// search_result += '	<div class="User-data fn-left">';
// search_result += '		<div class="fn-clear">';
// search_result += '			<p class="User-name ui-link-Nounderline ui-link-E7417FtoE7417F fn-left"><a ' + total_tag + ' href="' + profile_url + '" ' + info_target + '>' + objData[key]['nickname'] + '</a></p>';
// search_result += '			<p class="ui-link-999toE7417F ui-link-underline fn-right DiamondsMember">';
// if(objData[key]['service'] && objData[key]['service']['url']){
// search_result += '			<a ' + total_tag2 + ' href="' + objData[key]['service']['url'] + '" target="_blank"><img src="' + objData[key]['service']['icon'] + '" alt="" width="14" height="14"/></a><a ' + total_tag2 + ' href="' + objData[key]['service']['url'] + '" target="_blank">' + objData[key]['service']['name'] + '</a>';
// }
// search_result += '			</p>';
// search_result += '		</div>';
// search_result += '		<p class="Brief-introduction color333">' + objData[key]['age'] + '，' + objData[key]['work_location'] + '，' + objData[key]['height'] + '，';
// if(objData[key]['education']){
// search_result += 	objData[key]['education'] + '，';
// }
// search_result += 		objData[key]['income'] + '</p>';
// search_result += '		<p class="Inner-soliloquy color999">' + objData[key]['shortnote'] + '</p>';
// search_result += '		<p class="fn-right ui-link-underline ui-link-2C81D6toE7417F View-details"><a ' + total_tag + ' href="' + profile_url + '" ' + info_target + '>查看详情>></a></p>';
// search_result += '	</div>';
// search_result += '</li>';
// }
//                             }
//                             ljf('search_result').innerHTML = search_result;
//                         }
//                     }
//                 });
//                 set_more_search('http://search.jiayuan.com/');
//             }
//             //获取搜索URL
//             function get_search_url(url, p)
//             {
//                 var sex_array = new Array;
//                 sex_array['f'] = '女';
//                 sex_array['m'] = '男';
//                 //获取搜索条件
//                 var search_sex = ljf('common_search_bar_sex').value;
//                 var search_min_age = ljf('common_search_bar_min_age').value;
//                 var search_max_age = ljf('common_search_bar_max_age').value;
//                 var search_work_location = ljf('common_search_bar_work_location').value;
//                 var search_condition =  sex_array[search_sex] + '，';
//                 if(search_min_age > search_max_age){
//                     search_condition += search_min_age + '岁以上';
//                 }else{
//                     search_condition += search_min_age + '-' + search_max_age + '岁';
//                 }
//                 //拼Ajax的URL
//                 url += '?ss=1';
//                 url += '&sex='+search_sex;
//                 url += '&min_age='+search_min_age;
//                 url += '&max_age='+search_max_age;
//                 if(p > 0){
//                     url += '&p='+p;
//                 }
//                 if(search_work_location > 0){
//                     url += '&work_location='+search_work_location;
//                     search_condition += '，' + LSK[search_work_location];
//                 }
//                 ljf('search_condition').innerHTML = '<span>已选条件：</span>' + search_condition;
//                 return url;
//             }
//             //交互展示搜索条和搜索条件
//             function show_index_search(v)
//             {
//                 if(v == 0){
//                     ljf('search_bar').style.display = 'none';
//                     ljf('search_show').style.display = '';
//                 }else{
//                     ljf('search_show').style.display = 'none';
//                     ljf('search_bar').style.display = '';
//                 }
//             }
//             //设置页码特效
//             function set_page_class(page)
//             {
//                 if(page == 0) page = 1;
//                 for(i=1;i<=3;i++){
//                     ljf('search_page_' + i).className = '';
//                 }
//                 ljf('search_page_' + page).className = 'ui-page-IndexSearch-item-currnet';
//             }
//             //设置更多搜索链接
//             function set_more_search(url)
//             {
//                 ljf('more_search').href = get_search_url(url, 0);
//             }
//             //设置搜缘分统计标签
//             function set_search_tag_total()
//             {
//                 if(user_uid > 0){
//                     ljf('search_title').setAttribute("onmousedown","javascript:send_jy_pv2('|index2012_search_title_login|');");
//                     ljf('search_btn').setAttribute("onmousedown","javascript:send_jy_pv2('|index2012_search_btn_login|');");
//                     ljf('search_adv').setAttribute("onmousedown","javascript:send_jy_pv2('|index2012_search_adv_login|');");
//                     ljf('search_mdy').setAttribute("onmousedown","javascript:send_jy_pv2('|index2012_search_mdy_login|');");
//                     ljf('more_search').setAttribute("onmousedown","javascript:send_jy_pv2('|index2012_search_more_login|');");
//                     ljf('search_p1').setAttribute("onmousedown","javascript:send_jy_pv2('|index2012_search_p1_login|');");
//                     ljf('search_p2').setAttribute("onmousedown","javascript:send_jy_pv2('|index2012_search_p2_login|');");
//                     ljf('search_p3').setAttribute("onmousedown","javascript:send_jy_pv2('|index2012_search_p3_login|');");
//                 }else{
//                     ljf('search_title').setAttribute("onmousedown","javascript:send_jy_pv2('|index2012_search_title_logout|');");
//                     ljf('search_btn').setAttribute("onmousedown","javascript:send_jy_pv2('|index2012_search_btn_logout|');");
//                     ljf('search_adv').setAttribute("onmousedown","javascript:send_jy_pv2('|index2012_search_adv_logout|');");
//                     ljf('search_mdy').setAttribute("onmousedown","javascript:send_jy_pv2('|index2012_search_mdy_logout|');");
//                     ljf('more_search').setAttribute("onmousedown","javascript:send_jy_pv2('|index2012_search_more_logout|');");
//                     ljf('search_p1').setAttribute("onmousedown","javascript:send_jy_pv2('|index2012_search_p1_logout|');");
//                     ljf('search_p2').setAttribute("onmousedown","javascript:send_jy_pv2('|index2012_search_p2_logout|');");
//                     ljf('search_p3').setAttribute("onmousedown","javascript:send_jy_pv2('|index2012_search_p3_logout|');");
//                 }
//             }

           
            </script>
          <div class="FindLoverArea">
            <form id="common_search_bar_form" >
             {{csrf_field()}}

            <div class="IndexCommonTitle">
            <h2 class="ui-link-333toE7417F fn-left ui-link-Nounderline"><a id="search_title" href="#" target="_blank">交友搜缘分，就在眼前</a></h2>
              <!-- 修改开始 -->
              <div id="search_bar">
                <ul class="IndexSearch fn-left">
                    <li>我要找
                        <select name="sex" id="common_search_bar_sex">
                            <option value="1" data="1">女</option>
                            <option value="0" data="0">男</option>
                        </select>
                    </li>
                    <li>年龄
                        <select name="min_age" id="common_search_bar_min_age" onchange="set_max_age_by_min_age(this.value);"></select>
                        <select name="max_age" id="common_search_bar_max_age"><option value="0">不限</option></select>岁
                    </li>
                  <!-- <li>地区
                    <select name="province" id="common_search_bar_work_location"></select>
                  </li> -->
                  <!-- <li class="FindLover-btn"><a id="search_btn" href="" onclick="search_info(0, 0);">搜索</a></li> -->
                 <li class="FindLover-btn"><button id="search_btn" href="#" onclick="">搜索</button></li>
                </ul>
                <span class="more Indexmore ui-link-underline ui-link-2C81D6toE7417F fn-right"><a id="search_adv" href="#" target="_blank">高级搜索&gt;&gt;</a></span>
              </div>
              <!-- 修改结束 -->
              <!-- 修改开始 -->
              <div id="search_show" style="display:none">
                <ul class="IndexSearch fn-left">

                  <li id="search_condition"><span>已选条件：</span></li>
                  <li class="FindLover-Modify ui-link-2C81D6toE7417F ui-link-underline"><a id="search_mdy" href="javascript:" onclick="show_index_search(1);">[修改]</a></li>
                </ul>
                <ul class="more Indexmore fn-right ui-page-IndexSearch">
                  <li id="search_page_1" class="ui-page-IndexSearch-item-currnet"><a id="search_p1" href="javascript:" onclick="search_info(0, 1);">1</a></li>
                  <li id="search_page_2"><a id="search_p2" href="javascript:" onclick="search_info(0, 2);">2</a></li>
                  <li id="search_page_3"><a id="search_p3" href="javascript:" onclick="search_info(0, 3);">3</a></li>
                  <li class="ui-page-fate"><a id="more_search" href="javascript:ljf('common_search_bar_form').submit();" target="_blank">更多缘分</a></li>
                </ul>
              </div>
              <!-- 修改结束 -->
            </div>
            </form>
            <script type="text/javascript">
            //初始化搜缘分统计标签
            set_search_tag_total();
            // 初始化年龄选项
            (function(){ 
            var idmin = ljf('common_search_bar_min_age');
            var idmax = ljf('common_search_bar_max_age');
idmax.options[idmax.length] = new Option('不限', 0);
            for(var i=18;i<100;i++){
                idmin.options[idmin.length] = new Option(i, i);
                idmax.options[idmax.length] = new Option(i, i);
            }
            })();
//根据最小年龄设置最大年龄的限制
function set_max_age_by_min_age(age)
{
var idmax = ljf('common_search_bar_max_age');
var o_max_age = idmax.value;//获取原来最大年龄的值
idmax.length = 1;	//删除原来的年龄数据
for(var i=age;i<100;i++){
idmax.options[idmax.length] = new Option(i, i);
}
if(o_max_age < age){
o_max_age = age;
}
idmax.value = o_max_age;
}
            // 初始化地区
            function init_location(location, sub_location, select_id)
            {
                var province= ljf(select_id + '_location');
                //var city	= ljf(select_id + '_sublocation');
                for(i=0;i<100;i++){
                    if(LSK[i] != undefined){
                        province.options[province.length] = new Option(LSK[i],i);
                    }
                }
                province.value = location;
                
            }
            // 初始化默认值
            wait(function(){return typeof LSK != "undefined" && typeof JY != "undefined"}, function(){
            var Form_sex = 'f';
            var Form_min_age = 0;
            var Form_max_age = 0;
            var Form_work_location = 0;

            var Form_work_sublocation = 0;
            var Form_avatar = true;
            var search_cookie = JY.tool.cookie.get('SEARCH_CUSTOM');
            var InitArr = search_cookie ? search_cookie.split('|') : [];
            
            //根据COOKIE中的地区，设置默认搜索地区
            Form_work_location = get_loc();
            
            //根据搜索条件设置搜索条
            if (InitArr.length>18) {
                Form_sex = InitArr[0]=='m' ? 'm' : 'f';
                if (InitArr[1] > InitArr[2]) {
                    var temp = InitArr[1];
                    InitArr[1] = InitArr[2];
                    InitArr[2] = temp;
                }
                Form_min_age = InitArr[1]>18 ? InitArr[1] : 0;
                Form_max_age = InitArr[2]>18 ? InitArr[2] : 0;
                //Form_work_location = InitArr[16]>0 ? parseInt(InitArr[16].substr(0,2)) : 0;
                //Form_work_sublocation = InitArr[17]>0 ? parseInt(InitArr[17]) : 0;
                Form_avatar = InitArr[7]>0 ? true :false;
            }
            if (Form_min_age==0) {
                Form_min_age = Form_sex=='f' ? 22 : 25;
            }
            if (Form_max_age==0) {
                Form_max_age = Form_sex=='f' ? 28 : 32;
            }
            var Form = ljf('common_search_bar_form'); 
            Form.sex.value = Form_sex;
            Form.min_age.value = Form_min_age;
set_max_age_by_min_age(Form_min_age);	//更新max_age的起始年龄数
            Form.max_age.value = Form_max_age;
            Form.work_location.value = Form_work_location;
            init_location(Form_work_location, 0, 'common_search_bar_work');
            }); 
            </script>

            <div class="FindLover-cnt">
              <div class="fn-clear">
              <!--搜索结果-->
              <ul class="FindLover-cnt-allul" id="search_result">
                @foreach($result as $rest)
                    <li class="FindLover-cnt-block-item ' + right_class + '">
                        <div class="ShadowB fn-left">
                            <p class="ShadowB-bg"></p>
                            <a ' + total_tag + ' href="" ' + info_target + '><img src="{{ $rest -> img }}" alt="" width="90" height="110"/></a>
                        </div>
                        <div class="User-data fn-left">
                            <div class="fn-clear">
                                <p class="User-name ui-link-Nounderline ui-link-E7417FtoE7417F fn-left">{{ $rest -> realname }}<a ' + total_tag + ' href="" ' + info_target + '> </a>
                                </p>
                                
                            </div>
                            <p class="Brief-introduction color333">{{ $rest ->age }}岁,{{ $rest ->province }},{{ $rest ->height }}cm
                                </p>
                            
                            <p class="Inner-soliloquy color999">@if($rest ->education==0)
                                '高中中专及以下'
                            @elseif($rest ->education==1)
                                '大专'
                            @elseif($rest ->education==2)
                                '本科'
                            @elseif($rest ->education==3)
                                '双学士'
                            @elseif($rest ->education==4)
                                '双学士'
                            @elseif($rest ->education==5)
                                '博士'
                            @elseif($rest ->education==6)
                                '博士后'
                            @endif</p>
                            <p class="fn-right ui-link-underline ui-link-2C81D6toE7417F View-details"><a ' + total_tag + ' href="" ' + info_target + '>查看详情>></a></p>
                        </div>
                    </li>
                    @endforeach
              </ul>
              <script type="text/javascript">
if(index_visit === 1){
if(user_uid > 0){	//登录
search_info(user_uid, 0);
}else{				//未登录
search_info(-1, 0);
}
}
                
                function send_email()
                {
                    var email = ljf('email').value;
                    email = email.replace(/\s+/g,"");
                    if(email == ""){
                        alert("请输入邮箱！");
                        ljf('email').focus();
                        return false;
                    }
                    if(email.match(/^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/) == null){
                        alert("请输入正确的邮箱！");
                        ljf('email').focus();
                        return false;
                    }
    
                    var url = "/dynmatch/ajax/index_new.php?type=3&mail=" + email;
                    jQuery.ajax({ url:url, type:'GET', async:false,
                        success:function(data){
                            var obj_datas = data;
                            switch(obj_datas)
                            {
                                case '1':
                                    ljf('email_form').style.display = 'none';
                                    ljf('email_suc').style.display = '';
                                    break;
                                case '-1':
                                    alert('请填写邮箱地址！');
                                    break;
                                case '-2':
                                    alert('请正确填写邮箱地址的格式！');
                                    break;
                                default:
                                    alert('订阅失败，请重试！');
                            }
                        }
                    });
                }
              </script>
              <!--搜索结果-->
              </div>
              <!-- 登录前  star-->
              <div id="email_form" class="Subscribe" style="display:none">
                <input id="email" type="text" class="ui-input-email" value="填写 E-mail" onfocus="if(value=='填写 E-mail') {value=''}" onblur="if (value=='') {value='填写 E-mail'}" />
                <p class="Subscribe-btn"><a href="javascript:" onclick="send_email();">订阅你的缘分</a></p>
              </div>
              <!-- 登录前  end-->
              <!-- 订阅成功  star-->
              <div id="email_suc" class="Subscribe Subscribe-b color2C81D6" style="display:none">订阅成功</div>
              <!-- 订阅成功  end-->
              <!-- 登录后  star-->
              <div id="email_login" class="Subscribe Subscribe-c" style="display:none"></div>
              <!-- 登录后  end-->
                <script type="text/javascript">
                //根据登录情况，展示不同的效果
                function change_email_area()
                {
                    if(user_uid > 0){
                        ljf('email_login').style.display = '';
                        ljf('email_form').style.display = 'none';
                        ljf('email_suc').style.display = 'none';
                    }else{
                        ljf('email_login').style.display = 'none';
                        ljf('email_form').style.display = '';
                        ljf('email_suc').style.display = 'none';
                    }
                }
                change_email_area();
                </script>
            </div>
          </div>
          <!--E 搜缘分-->
        </div>
        <!-- =E Indexleft-->
        <!-- =S Indexright-->
        <div class="fn-right">
          <!-- 登录后  star-->
          <!-- ==S MeetLove-->
          <div id="service_list_common" class="MeetLove" style="display:none">
            <div class="IndexCommonTitle fn-clear">
              <h2 class="ui-link-333toE7417F fn-left ui-link-Nounderline"><a onmousedown="send_jy_pv2('|index2012_service_bar|');" href="http://www.jiayuan.com/usercp/service/servicenew.php" target="_blank">佳缘帮你遇见爱</a></h2>
              <span class="more Indexmore ui-link-underline ui-link-2C81D6toE7417F fn-right"><a onmousedown="send_jy_pv2('|index2012_service_bar|');" href="http://www.jiayuan.com/usercp/service/servicenew.php" target="_blank">更多&gt;&gt;</a></span> </div>
              <div class="MeetLove-block">
<script type="text/javascript">
                if(HEAD_USER.uid > 0){
if(HEAD_USER.type == 10){
document.write('\
<div class="Honorable-member"> \
<span class="MeetLove-blockIcon"><a onmousedown="send_jy_pv2(\'|index2012_service_kanxinbao|\');" href="http://www.jiayuan.com/usercp/center/" target="_blank">佳缘宝</a></span> \
<h3 class="ui-link-underline"><a onmousedown="send_jy_pv2(\'|index2012_service_kanxinbao|\');" href="http://www.jiayuan.com/usercp/center/" target="_blank" class="colorE7417F">佳缘宝&gt;&gt;</a></h3> \
<ul> \
<li class="color666">看信仅需4佳缘宝</li> \
<li class="color666">世纪佳缘通用货币</li> \
</ul> \
</div>\
');
}else{
document.write('\
<div class="JY-stamp"> \
<span class="MeetLove-blockIcon"><a onmousedown="send_jy_pv2(\'|index2012_service_stamp|\');" href="http://www.jiayuan.com/usercp/center/" target="_blank">佳缘邮票</a></span> \
<h3 class="ui-link-underline"><a onmousedown="send_jy_pv2(\'|index2012_service_stamp|\');" href="http://www.jiayuan.com/usercp/center/" target="_blank" class="colorE7417F">佳缘邮票&gt;&gt;</a></h3> \
<ul> \
<li class="color666">看信仅需一张佳缘邮票</li> \
<li class="color666">世纪佳缘通用货币</li> \
</ul> \
</div> \
');
}
                }
                </script>
              </div>
              <div class="MeetLove-block">
                <div class="Diamonds-member">
                    <span class="MeetLove-blockIcon"><a onmousedown="send_jy_pv2('|index2012_service_diamond|');" href="http://www.jiayuan.com/usercp/service/bmsg_tg2.php" target="_blank">钻石会员</a></span>
                    <h3 class="ui-link-underline"><a onmousedown="send_jy_pv2('|index2012_service_diamond|');" href="http://www.jiayuan.com/usercp/service/bmsg_tg2.php" target="_blank" class="colorE7417F">钻石会员&gt;&gt;</a></h3>
                    <ul>
                        <li class="color666">看信、发信全部免费</li>
                        <li class="color666">个人资料页面优先强力展示</li>
                    </ul>
                </div>
              </div>
              <div class="MeetLove-block MeetLove-block-last">
                <div class="VIP-member">
                    <span class="MeetLove-blockIcon"><a onmousedown="send_jy_pv2('|index2012_service_vip|');" href="http://www.jiayuan.com/usercp/service/upgrade.php" target="_blank">vip会员</a></span>
                    <h3 class="ui-link-underline"><a onmousedown="send_jy_pv2('|index2012_service_vip|');" href="http://www.jiayuan.com/usercp/service/upgrade.php" target="_blank" class="colorE7417F">vip会员&gt;&gt;</a></h3>
                    <ul>
                        <li class="color666">
                        谁看过我，掌握谁对我钟情
                        </li>
                        <li class="color666">
                        享23项特权，
<script type="text/javascript">
                        if(HEAD_USER.uid > 0){
                        	if(HEAD_USER.type == 10){
document.write('仅16佳缘宝/月');
}else{
document.write('仅16元/月');
}
}
                        </script>
</li>
                    </ul>
                </div>
              </div>
          </div>
          <!-- ==E MeetLove-->
          <!-- 登录后  end-->
  
          <!-- 登录前  star-->
           <div id="index_ad_before" class="IndexAd" style="display:none">
            <div id="ad_pos_35"></div>
          </div>
          <!-- 登录前  end-->
          <!--广告-->
          <div class="IndexAd">
            <div id="ad_pos_51"></div>
          </div>
          <div class="IndexAd">
            <div id="ad_pos_34"></div>
          </div>
          <!--广告-->
          <!--S 媒体节目-->
          <div class="MediaArea">
            <div class="IndexCommonTitle fn-clear">
                <h2 class="ui-link-333toE7417F fn-left ui-link-Nounderline"><a onmousedown="send_jy_pv2('|index2012_media_title|');" href="/parties/2010/all_videos/" target="_blank">媒体节目</a></h2>
                <span class="more Indexmore ui-link-underline ui-link-2C81D6toE7417F fn-right"><a onmousedown="send_jy_pv2('|index2012_media_more|');" href="/parties/2010/all_videos/" target="_blank">更多&gt;&gt;</a></span>
            </div>
            <div id="ifocus">
                <div id="ifocus_pic">
                    <div id="ifocus_piclist">
                        <ul id="video_img"></ul>
                    </div>
                    <div id="ifocus_opdiv"></div>
                    <div id="ifocus_tx">
                        <ul id="video_txt"></ul>
                    </div>
                    <script type="text/javascript">
                    var video_datas = [
                                                                            {'title':'FM凤凰音频电台节目邀您参与','url':'http://qinggan.jiayuan.com/zhuanti/fenghuang/index.html','img':'./img/20150804094554862.jpg','loc':[11,12,13,14,15,21,22,23,31,32,33,34,35,36,37,41,42,43,44,45,46,50,51,52,53,54,61,62,63,64,65,71,81,82,99]}
                                                ,                            {'title':'佳缘电台《爱倾听》节目欢迎投稿','url':'http://qinggan.jiayuan.com/zhuanti/ximalaya1/','img':'./img/20160520043011873.gif','loc':[11,12,13,14,15,21,22,23,31,32,33,34,35,36,37,41,42,43,44,45,46,50,51,52,53,54,61,62,63,64,65,71,81,82,99]}
                                                ,                            {'title':'缘来非诚勿扰招募嘉宾','url':'http://party.jiayuan.com/party_info.php?pid=5745','img':'./img/20160120054455725.jpg','loc':[11,12,13,14,15,21,22,23,31,32,33,34,35,36,37,41,42,43,44,45,46,50,51,52,53,54,61,62,63,64,65,71,81,82,99]}
                                                ,                            {'title':'《魅力野兽》','url':'http://qinggan.jiayuan.com/zhuanti/yeshou/','img':'./img/20150817103714622.jpg','loc':[11,12,13,14,15,21,22,23,31,32,33,34,35,36,37,41,42,43,44,45,46,50,51,52,53,54,61,62,63,64,65,71,81,82,99]}
                                                ,                            {'title':'十周嫁出去','url':'http://party.jiayuan.com/party_memberlist.php?pid=8166','img':'./img/20150729053639710.jpg','loc':[11,12,13,14,15,21,22,23,31,32,33,34,35,36,37,41,42,43,44,45,46,50,51,52,53,54,61,62,63,64,65,71,81,82,99]}
                                                ,                            {'title':'乡约','url':'http://party.jiayuan.com/party_info.php?pid=2557','img':'./img/20150520022011194.jpg','loc':[44]}
                                                ,                            {'title':'百里挑一','url':'http://www.jiayuan.com/parties/2012/blty/','img':'./img/20131125042307737.jpg','loc':[11,12,13,14,15,21,22,23,31,32,33,34,35,36,37,41,42,43,44,45,46,50,51,52,53,54,61,62,63,64,65,71,81,82,99]}
                                                ,                            {'title':'谈婚论嫁','url':'http://subject.jiayuan.com/2014Q4/dianshitai/','img':'./img/20141120044100951.jpg','loc':[11,12,13,14,15,21,22,23,31,32,33,34,35,36,37,41,42,43,45,46,50,51,52,53,54,61,62,63,64,65,71,81,82,99]}
                                                ,                            {'title':'招募情侣拍电影','url':'http://subject.jiayuan.com/2015Q2/aiqingdamaoxian/','img':'./img/20150825044954619.jpg','loc':[11,12,13,14,15,21,22,23,31,32,33,34,35,36,37,41,42,43,44,45,46,50,51,52,53,54,61,62,63,64,65,71,81,82,99]}
                                        ];
                    
                    var video_result_img = '';
                    var video_result_txt = '';
                    var ip_loc = get_loc();
                    
                    var video_result_array = new Array();
                    //按地区筛选数据保存到数组
                    for(v_key in video_datas){
if(video_datas.hasOwnProperty(v_key)){
if(video_result_array.length >= 3){break;}
if(!video_datas[v_key].loc.length){
video_result_array.push(video_datas[v_key]);
}else{
for(var j = 0; j < video_datas[v_key].loc.length; j++){
if(video_datas[v_key].loc[j] == ip_loc) {
video_result_array.push(video_datas[v_key]);
break;
}
}
}
}
                    }
                    //将数组生成最终输出代码
                    for(v_key in video_result_array){
if(video_result_array.hasOwnProperty(v_key)){
video_result_img += '<li><a onmousedown="send_jy_pv2(\'|index2012_media_link|\');" href="'+video_result_array[v_key]['url']+'" target="_blank"><img src="'+video_result_array[v_key]['img']+'" alt="" width="248" height="170"/></a></li>';
txt_class = 'normal'
if(v_key == 0){
txt_class = 'current';
}
video_result_txt += '<li class="'+txt_class+'">'+video_result_array[v_key]['title']+'</li>';
}
                    }
                    
                    jQuery(document).ready(function(){
                        ljf('video_img').innerHTML = video_result_img;
                        ljf('video_txt').innerHTML = video_result_txt;
                    });
jQuery('.jy-sel-i').click(function(){
this.blur();
});
                    </script>
                    <div id="ifocus_btn">
                        <ul>
                            <li class="current">1</li>
                            <li class="normal">2</li>
                            <li class="normal">3</li>
                        </ul>
                    </div>
                </div>
            </div>
          </div>
          <!--E 媒体节目-->
          <!--S 举报app-->
  <div class="IndexAd">
            <a href="http://www.12377.cn/node_548446.htm" target="_blank"><img src="{{ asset('/home/img/wljb.jpg') }}" width="280" /></a>
          </div>
  <!--E 举报app-->
  <!--S 关注-->
          <!--<div class="Attention" id="index_guanzhu" style="display:none">
            <span>关注：</span>
            <p id="guanzhu"></p>
          </div>-->
          <script type="text/javascript">
//登录间距调整
if(user_uid > 0){
  document.write('<style>.FindLover-cnt-block-item {padding:24px 0}.FindLoverArea {height:888px;}</style>');
}
//关注
//ljf('guanzhu').innerHTML = '<a target="_blank" href="http://weibo.com/shijijiayuanwang" onmousedown="send_jy_pv2(\'|index_follow_1|\');"><img width="20" height="20" alt="新浪微博" src="http://images1.jyimg.com/w4/index_new/i/sina_img.gif" /></a><a target="_blank" href="http://t.qq.com/shijijiayuanguanfang?preview" onmousedown="send_jy_pv2(\'|index_follow_2|\');"><img width="20" height="20" alt="腾讯微博" src="http://images1.jyimg.com/w4/index_new/i/qqwb_img.gif" /></a><a target="_blank" href="http://t.163.com/shijijiayuanwang" onmousedown="send_jy_pv2(\'|index_follow_3|\');"><img width="20" height="20" alt="网易微博" src="http://images1.jyimg.com/w4/index_new/i/douban_img.gif" /></a><a target="_blank" href="http://shijijiayuanwang.t.sohu.com" onmousedown="send_jy_pv2(\'|index_follow_4|\');"><img width="20" height="20" alt="搜狐微博" src="http://images1.jyimg.com/w4/index_new/i/qqkj_img.gif" /></a><a target="_blank" href="http://www.kaixin001.com/home/?uid=118511484" onmousedown="send_jy_pv2(\'|index_follow_5|\');"><img width="20" height="20" alt="开心网" src="http://images1.jyimg.com/w4/index_new/i/kaixin_img.gif" /></a><a target="_blank" href="http://page.renren.com/601297062?id=601297062" onmousedown="send_jy_pv2(\'|index_follow_6|\');"><img width="20" height="20" alt="人人网" src="http://images1.jyimg.com/w4/index_new/i/renren_img.gif" /></a>';
          </script>
          <!--E 关注-->
        </div>
        <script type="text/javascript">
//注册到登录切换
function show_index_RegisterArea(v)
{
ljf('index_reg_div').style.display = 'none';
ljf('index_login_div').style.display = 'none';
ljf('index_login_form').style.display = 'none';
ljf('index_' + v).style.display = '';
}
function show_right_change()
{
if(user_uid > 0){
//登录，显示登录用户信息
show_index_RegisterArea('login_div');

//获取登录后数据
(function($){
var u = HEAD_USER;
if(u.uid){
var index_nickname = jy_head_function.html_decode(u.nickname);

if(jy_head_function.strlen_ch(index_nickname) > 16){
index_nickname = jy_head_function.substr_ch(index_nickname, 14) + '...';
}
jQuery("#index_login_div").show().find(".ui-link-Nounderline a").text(index_nickname).attr("href","http://usercp.jiayuan.com/");	//设置昵称
jQuery("#touxiang").html('<img src="'+u.avatar+'" width="90" height="110" />').attr("href","http://usercp.jiayuan.com/");	//设置头像
$.getJSON("/dynmatch/ajax/index_uinfo.php", function(data){ //ajax
if(!data) return;
//jQuery("#info_before").hide();
jQuery("#index_userinfo").show();
jQuery("#ziliao").html(data.ziliao);
if(parseInt(data.ziliao) < 100){
jQuery("#ziliao").parent().append('<div class="info_note"><div class="info_note_tc" style="display:none;">资料越完善，同等条件我们将优先推荐您~<em></em></div></div>');
jQuery('.info_note').hover(function(){
jQuery('.info_note_tc').show();
},function(){
jQuery('.info_note_tc').hide();	
})
}
jQuery("#zhaopian").html(data.photo_num + "张");
var currency_unit = HEAD_USER.type == 10 ? '个' : '张';
jQuery("#youpiao").html(data.stamp_num + currency_unit);
/*
var child = jQuery("#index_userinfo li span");
child.eq(0).html(data.mail_num);
child.eq(1).html(data.gift_num);
child.eq(2).html(data.ziliao);
child.eq(3).html(data.photo_num+"张");
child.eq(4).html(data.stamp_num+"张");
child = jQuery("#reg_login .bottom .right img");
var se = ['钻石会员','高级会员', '看信包月', '在线聊天', '发信包月'];
$.each(data.service, function(i,n){
var src = child.eq(n).attr("src");
child.eq(n).attr("src", src.replace(/(_\d).jpg/,'.jpg')).attr("title", se[n]+"：已开通");
});
*/
if(data.tuijian.length) {
jQuery("#tuijian_block").show();
var e = jQuery("#tuijian_block .ui-link-underline");
$.each(data.tuijian, function(i,n){
var tmp = jQuery('<a onmousedown="send_jy_pv2(\'|index2012_login_service|\');" target="_blank"></a>');
tmp.attr("href", n[0]).html(n[1]);
e.append(tmp);
if(i == 1) {
e.append("<br />");
}
});
}
});
}
})(jQuery);

ljf('index_ad_before').style.display = 'none';
ljf('service_list_common').style.display = '';
//ljf('ali_ad_before').style.display = 'none';
//ljf('index_guanzhu').style.display = '';
}else{
//未登录显示注册信息
show_index_RegisterArea('reg_div');

ljf('index_ad_before').style.display = '';
ljf('service_list_common').style.display = 'none';
//ljf('ali_ad_before').style.display = '';
//ljf('index_guanzhu').style.display = 'none';
}
}
if(index_visit === 1){
show_right_change();
}
</script>
        <!-- =E Indexright-->
      </div>
      <!--底通广告1-->
      <div class="IndexAd">
        <div id="ad_pos_33"></div>
      </div>
      <!--底通广告1-->
      <!--S IndexBottom-->
      <style type="text/css">
  .IndexBottom{height:200px}
  .IndexBottom dl{display:inline;float:left;margin-left:15px;margin-top:22px;width:128px}
  .IndexBottom .IndexBottom-help{margin-left:50px}
  .IndexBottom .aboutjy{margin-left:60px}
  </style>
      <div class="IndexBottom">
      	<dl class="IndexBottom-help">
          <dt class="color333">婚恋交友</dt>
          <dd> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_search|');" class="color999" href="http://search.jiayuan.com/v2/" target="_blank">找对象</a></span> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_fate|');" class="color999" href="http://fate.jiayuan.com/show.php" target="_blank">缘分圈</a></span> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_love|');" class="color999" href="http://love.jiayuan.com/" target="_blank">成功交友</a></span> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_chat|');" class="color999" href="http://search.jiayuan.com/v2/online.php" target="_blank">聊天交友</a></span> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_new|');" class="color999" href="http://search.jiayuan.com/v2/new.php" target="_blank">最新会员</a></span> </dd>
        </dl>
        <dl>
          <dt class="color333">新手上路</dt>
          <dd> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_1|');" class="color999" href="/helpcenter/list.php?type1=1&type2=1&type3=16" target="_blank">如何注册</a></span> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_2|');" class="color999" href="http://www.jiayuan.com/usercp/newbie_3th/step_1.php" target="_blank">新手上路</a></span> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_3|');" class="color999" href="/usercp/center/zengsong.php" target="_blank"><script>if(HEAD_USER.uid > 0 && HEAD_USER.type == 10){document.write('获赠佳缘宝');}else{document.write('获赠邮票');}</script></a></span> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_4|');" class="color999" href="/usercp/service/servicenew.php" target="_blank">购买服务</a></span> <span class="ui-link-Nounderline ui-link-999toE7417F"><script>if(HEAD_USER.uid > 0 && HEAD_USER.type == 10){document.write('<a onmousedown="send_jy_pv2(\'|index2012_m_5|\');" class="color999" href="/helpcenter/list.php?type1=1&type2=3&type3=25" target="_blank">佳缘货币</a>');}else{document.write('<a onmousedown="send_jy_pv2(\'|index2012_m_5|\');" class="color999" href="/helpcenter/list.php?type1=1&type2=3&type3=25" target="_blank">邮票规则</a>');}</script></span> </dd>
        </dl>
        <dl>
          <dt class="color333">佳缘服务</dt>
          <dd> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_6|');" class="color999" href="/helpcenter/list.php?type1=1&type2=3&type3=24" target="_blank">线上服务</a></span> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_7|');" class="color999" href="http://3g.jiayuan.com" target="_blank">手机佳缘</a></span> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_8|');" class="color999" href="/party/" target="_blank">交友活动</a></span> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_9|');" class="color999" href="http://vip.jiayuan.com/" target="_blank">红娘一对一</a></span> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_10|');" class="color999" href="http://date.jiayuan.com/" target="_blank">佳缘约会吧</a></span></dd>
        </dl>
        <dl>
          <dt class="color333">帮助中心</dt>
          <dd> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_11|');" class="color999" href="/helpcenter/" target="_blank">使用指南</a></span> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_12|');" class="color999" href="/helpcenter/list.php?type1=1&type2=3&type3=94" target="_blank">支付方式</a></span> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_13|');" class="color999" href="/helpcenter/list.php?type1=2&type2=1&type3=133" target="_blank">常见问题</a></span> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_14|');" class="color999" href="/helpcenter/postmail.php" target="_blank">联系客服</a></span> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_wentifankui|');" class="color999" href="/helpcenter/feedback.php" target="_blank">技术支持</a></span> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_15|');" class="color999" href="/sitemap/" target="_blank">网站地图</a></span> </dd>
        </dl>
        <dl>
          <dt class="color333">对外商务合作</dt>
          <dd> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_16|');" class="color999" href="/party/media.php" target="_blank">媒体节目合作</a></span> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_17|');" class="color999" href="/party/party_coop.php?cooptype=7" target="_blank">企业交友专场</a></span> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_18|');" class="color999" href="/bottom/business.html" target="_blank">无线业务合作</a></span> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_24|');" class="color999" href="http://vip.jiayuan.com/shop/jiameng.html" target="_blank">VIP业务招商合作</a></span> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_24|');" class="color999" href="http://vip.jiayuan.com/shop/cooperation.html " target="_blank">实体婚恋商务合作</a></span> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_datezs|');" class="color999" href="http://date.jiayuan.com/potentialinvestors.php" target="_blank">佳缘约会吧招商合作</a></span> </dd>
        </dl>
        <dl class="aboutjy">
          <dt class="color333">关于世纪佳缘</dt>
          <dd><span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_19|');" class="color999" href="http://www.jiayuan.com/news/dynamics/" target="_blank">佳缘动态</a></span> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_20|');" class="color999" href="/bottom/index.html" target="_blank">世纪佳缘介绍</a></span> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_22|');" class="color999" href="/bottom/jobs.html" target="_blank">招聘信息</a></span> <span class="ui-link-Nounderline ui-link-999toE7417F"><a onmousedown="send_jy_pv2('|index2012_m_23|');" class="color999" href="/news/" target="_blank">媒体联系方式</a></span></dd>
        </dl>
      </div>
      <!--E IndexBottom-->
    </div>
    <!--E Indexcontent-->


<script type="text/javascript">
if(index_visit === 1){document.writeln('<div id="new_index" style="display:none">');}//如果已经登陆过，隐藏新首页

<!--S Footer-->
<script type="text/javascript" src="http://images1.jyimg.com/w/index/j/refer.js"></script>
<!--版权 开始-->
<script type="text/javascript" src="http://images1.jyimg.com/js/footer/w4-simple.js"></script>

<!--版权 结束-->
<!--E Footer-->
<script type="text/javascript" src="http://images1.jyimg.com/w4/index_new/j/mediaAd.js"></script>
<!-- <script type='text/javascript' src='http://ads.jiayuan.com/ad.php?pd_id=24'></script> -->
<script type="text/javascript">
<!--
var head = document.getElementsByTagName("head")[0];       
var js = document.createElement("script");       
js.src = "http://ads.jiayuan.com/adajax.php?pd_id=24";       
js.onload = js.onreadystatechange = function()       
{       
    if (!this.readyState || this.readyState == "loaded" || this.readyState == "complete")       
    {   
         head.removeChild(js);  
    }       
}       
head.appendChild(js);  	
//-->
</script>
<div style='text-align:center;position:relative;'>
<a href='http://www.sgs.gov.cn/lz/licenseLink.do?method=licenceView&entyId=20120416163653405' target='_blank'><img src='./img/icon_sh.gif' border='0'></a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <script src="http://kxlogo.knet.cn/seallogo.dll?sn=e13090211010042252l1a5000000&size=0"></script>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a href='http://about.58.com/fqz/index.html?utm_source=market&spm=b-31580022738699-pe-f-829.hao360_101' target='_blank'><img src='./img/bjwj.jpg' border='0'></a>
&nbsp;&nbsp;&nbsp;&nbsp;
    <a href='http://www.shjbzx.cn/' target='_blank'><img src='./img/shjb.jpg' border='0'></a>
&nbsp;&nbsp;&nbsp;&nbsp;
<a href='http://www.12377.cn/' target='_blank'><img src='./img/zghlw.jpg' border='0' height="40"></a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a href='http://bj429.com.cn/' target='_blank'><img src='/home/img/bj_safe_20160429.jpg' border='0'></a>
</div>



<!--左下角弹窗 防诈骗提示语 结束-->
</body>
</html>
<!-- released time 2016-09-02 16:38:52 -->