//全局配置
var fKeyDefault     = "请输入要搜索的条件";
var mKeyDefault     = "请输入要搜索的条件";
var savaTagDefault  = "请为本组搜索条件起个名字";
var taskSendMsg 	= new DelayedTask(function () {});
var delayTime 		= 1000;
var bShow           = true;
var is_bl_hello		= false;

function  _hidden_batch() {	
		$("#batch_hello").css("display","none");
        $("#batch_hello_gray").css("display","none");	
}
function setCookie(name,value,days){
    if(days == 0){
        document.cookie = name + "="+ escape (value);
    }else{
        var exp = new Date();
        exp.setTime(exp.getTime() + days*24*60*60*1000);
        document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
    }
}
function delCookie(name,value,days){
    var exp = new Date();
    exp.setTime(exp.getTime() + days*24*60*60*1000);
    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString()+"; path=/";
}
function delHistoryCookie(name,value,days){
    var exp = new Date();
    exp.setTime(exp.getTime() + days*24*60*60*1000);

    var domain = search_domain;
    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString()+"; path=/;domain="+domain;
}
function getCookie(name){
    var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
    if(arr != null) return unescape(arr[2]); return null;
}
function getHistoryCookie(c_name)
{
    var domain = search_domain;
    document.domain = domain;
    if (document.cookie.length>0)
    {
        c_start=document.cookie.indexOf(c_name + "=")
        if (c_start!=-1)
        {
            c_start=c_start + c_name.length+1
            c_end=document.cookie.indexOf(";",c_start)
            if (c_end==-1) c_end=document.cookie.length
            return unescape(document.cookie.substring(c_start,c_end));
        }
    }
    return ""
}
//隐藏提示框
function hideTip(thisTip)
{
    $("#"+thisTip).hide();
    setCookie(thisTip,'1',365);
}
function trim(str)
{
    //   用正则表达式将前后空格
    //   用空字符串替代
    return str.replace(/(^\s*)|(\s*$)/g,"");
}

//标签是否已存在，如果存在返回标签的index，否则返回-1
function is_exit(id,mark)
{
    var mark_array 	= [];
    mark_array		= mark.split(",");
    var needle      = id+":";
    for(var i=0;i<mark_array.length;i++)
    {
        if(mark_array[i].indexOf(needle) == 0)
        {
            return i;
        }
    }
    return -1;
}
//拼接搜索条件,返回固定的格式
function pushMark(key,value){
    var pre_mark 	= $("#selectedMark").val();
    var now_mark	= "";
    var exit_index  = is_exit(key,pre_mark);
    //添加条件已经存在
    if(exit_index != -1)
    {
        var mark_array 	= [];
        mark_array		= pre_mark.split(",");
        var replace_val	= key +":"+value;
        mark_array.splice(exit_index,1);
        mark_array.push(replace_val);
        now_mark 		= mark_array.join(",");
        //	$("#selectedMark").val("");
    }else{
        //条件不存在
        if(pre_mark == '')
        {
            now_mark	= key+":"+value;
        }else{
            pre_mark  	+=  "," +key+":"+value;
            now_mark	= pre_mark;
        }
    }
    $("#selectedMark").val(now_mark);
}
//已有的mark替换
function replaceMark(key,value){
    var str = $("#selectedMark").val();
    var new_str = key+":"+value;
    var res = '';
    var ori_key = 0;
    str = str.split(',');
    for(var i=0;i<str.length;i++){
        if(str[i].indexOf(key+':') != -1){
            var ori_key = str[i].split(':');
            ori_key = ori_key[0];
            if(ori_key == key){
                str[i] = key+':'+value;
            }  
        }
        res += str[i]+',';
    }
    res = res.substring(0,res.length-1);
    $("#selectedMark").val(res);
    return true;
}
//从搜索字符串中删除某个搜索条件
function pullMark(id)
{
    var pre_mark 	= $("#selectedMark").val();
    var mark_array 	= [];
    mark_array		= pre_mark.split(",");
    var mark_index  = is_exit(id,pre_mark);
    if(mark_index != -1)
    {
        mark_array.splice(mark_index,1);
        now_mark 		= mark_array.join(",");
        $("#selectedMark").val(now_mark);
        return now_mark;
    }
}

function getProfile(isLogin,page,realUid)
{
    var profileArr = new Array();
    if(isLogin)
    {

        profileArr[0] = "";
        profileArr[1] = "onclick='openBoxClick("+realUid+","+page+","+isLogin+")'";

    }else
    {
        profileArr[0] = "_blank";
        if(parseInt(page) == 1)
        {
            profileArr[1] = "href='http://www.jiayuan.com/"+realUid+"?fxly=search_v2_index'";
        }else
        {
            profileArr[1] = "href='http://www.jiayuan.com/"+realUid+"?fxly=search_v2'";
        }
    }
    if(parseInt(page) == 1)
    {
        profileArr[2] = "http://www.jiayuan.com/"+realUid+"?fxly=search_v2_index";
    }else
    {
        profileArr[2] = "http://www.jiayuan.com/"+realUid+"?fxly=search_v2";
    }
    return profileArr;
}
//悬停用户框事件
function userDivOver(this_item,is_online){
    if($("#batch_hello").is(":hidden") && sys_hidden_batch=="0")
    {
        $("#"+this_item).parent().parent().addClass("hy_box_add");
        $("#"+this_item).parent().next('.hy_box_bg').show();
    }else
    {
        if(is_online == "1")
        {
            $("#"+this_item).attr("style", "display: block;");
        }
    }
}
//移除用户框事件
function userDivOut(this_item,is_online){
    if($("#batch_hello").is(":hidden")  && sys_hidden_batch=="0")
    {
        $("#"+this_item).parent().parent().removeClass("hy_box_add");
        $("#"+this_item).parent().next().hide();
    }else
    {
        if(is_online == "1")
        {
            $("#"+this_item).hide();
        }
    }
}
//收集搜索参数传递
function getSearchResult(pageFlag,flag,attation)
{
    var params          = new iniParam();
    //初始化各项参数
    var flag		    = arguments[1] ? arguments[1] : $("#flag").val();
    var pageItem        = arguments[2] ? arguments[2] : null;
    var keyDefault      = params.keyDefault;
    var sTNameDefault   = params.sTNameDefault;
    var keyword	    	= params.keyword;
    var sTId 			= params.sTId ;
    var sTName 			= params.sTName ;
    var sex	        	= params.sex;
    var selectedMark   = params.selectedMark;
    var orderType      = params.orderType;
    var orderValue     = params.orderValue;
    var pageTotal      = params.pageTotal;
    var type 	       = $("#listStyle").val();
    //var prePage		   = params.prepage;
    var normalUserCount = params.normalUserCount;
    var recommendUserCount = params.recommendUserCount;
    var sexName			= sex == "f" ? "她" : "他";
    //获得分页信息
    if(pageFlag == "ini"){
        var realPage = $("#pageCache").val();
    }else{
        var realPage = getRealPage(pageFlag,pageItem);
    }
    $("#normal_user_container").children().remove();
    $("#note_user_container").children().remove();
    //加载中提示
    $("#loadingTip").show();
    //修复锚点bug
    if(pageFlag == "page" || pageFlag == "next" || pageFlag == "pre" || pageFlag == "fir")
    {
        if($('#s_nick').val()==''){
            var default_top = $("#JY-px-id").offset().top;
            $(document).scrollTop(default_top);
        }else{
            var default_top = $(".JY-selected").offset().top;
            $(document).scrollTop(default_top);
        }
    }
    //退出批量打招呼
    //$("#exit_batch_greet").click();
    //批量打招呼现场恢复
    var surl = 'search_v2.php';
    var nick = $('#s_nick').val();
    if( nick != ''){
        surl = 'nicks.php';
        keyword = nick;
    }else{
        //排名提前展示特殊情况
        var pri_uid = $('#pri_uid').val();
        if(pri_uid != 0 ){
            $('#pri_uid').val(0);
        }
        //end
    }
    $.ajax({
        url : surl,
        data : {'sex':sex,'key':keyword,'stc':selectedMark,'sn':orderType,'sv':orderValue,'p':realPage,'f':flag,'listStyle':type,'pri_uid':pri_uid,'jsversion':'v5'},
        type : 'POST', 
        success : function(response){
            try{
                //##jiayser## 防止dns，tcp劫持加代码，导致不能解析 前端js解析json内容
                if(response.indexOf('##jiayser##') != -1){
                    response = response.replace(/[\s\S]*##jiayser##([\s\S]*)##jiayser##[\s\S]*/ig, "$1"); 
                }
                var jsonRes = eval('('+response+')');
            }catch(e){
                return false;
            }
            if(jsonRes == null)return false;
            var count =jsonRes.count;
            var pageTotal = jsonRes.pageTotal;
            // 搜索结果为空
            if(count == 0){
                $("#loadingTip").hide();
                $(".ls_dzh_add").hide();
                $(".pageclass").hide();
                //标签筛选
                if(flag == "select"){
                    var end_search_count_tip = '<div class="resultTips user0"><strong>30天内登录过的会员中，共<font class="a_pink">0</font>人符合条件，请您放宽搜索条件重试。</strong></div>';
                    $("#tipContent").children().remove(".resultTips");
                    $("#tipContent").append(end_search_count_tip);
                    return false;
                }
                $(".mixedType").hide();
                $(".relatedSearch").hide();
                $(".filter").hide();
                $("#normal_user_container").hide();
                $("#note_user_container").hide();
                $(".search_end").show();
                $(".fixed_heigh").attr("style",'');
                //隐藏批量打招呼
                $("#batch_hello").css("display","none");
                $("#batch_hello_gray").css("display","none");
                synchronizationHeight();//同步右侧高度
                if(keyword  != ''){
                    $(".endTipContent").find(".tip_h").text("很抱歉，没有找到与'"+decodeURIComponent(keyword)+"'相关的会员");
                }else{
                    $(".endTipContent").find(".tip_h").text("很抱歉，没有找到相关的会员");
                }
                var end_search_count_tip = '<div><a class="investigate" href="http://www.jiayuan.com/helpcenter/postmail2.php?refresh=1&pid=417&id=439" target="_blank">问题反馈</a></div><div class="count">30天内登录过的会员中，找到相关符合条件的会员<i>0</i>人</div>';
                $("#endTipCount").children().remove(".count");
                $("#endTipCount").append(end_search_count_tip);
                //清理搜索总数和批量打招呼
                $("#tipContent").remove();
                return false;
            }
            var data 			= jsonRes.userInfo;
            var express_search 	= jsonRes.express_search;
            //二次搜索
            var second_search 	= jsonRes.second_search;

            if(second_search != 0 && realPage == 1){
                var second_html = '<div class="resultTips">抱歉！没有找到与"<strong>'+second_search.s+'</strong>"相关的会员，我们为您找到了“<strong>'+second_search.m+'</strong>”的搜索结果</div>';
                $("#tipContent").children().remove(".resultTips");
                $("#tipContent").append(second_html);
                $(".keyword").val(second_search.m);
            }else{
                $("#tipContent").find(".resultTips").remove();
            }
            //设置搜索人数
            $(".ls_dzh_add").show();
            $(".ls_dzh_add").find("i").text(count);
            var userIdCollection = userIdExpressCollection = '';
            var isLogin 		= jsonRes.isLogin;
            var face_site = "http://case.jiayuan.com/face/";
            
            
			// --- 隐藏喜鹊...
			
            // 当前日期
            var thisDate = new Date();
            // 结束日期
			var endDate = new Date("2016-08-15");
			endDate.setHours(23); 
			endDate.setMinutes(59); 
			endDate.setSeconds(59);  
			
			var is_hide_xq = false;
			if (Date.parse(thisDate) > Date.parse(endDate))
			{
				is_hide_xq = true;
			}
            
            //生成新的搜索结果
            for(var i=0;i<data.length;i++)
            {
                var online 			= data[i].online;
                var realUid 		= parseInt(data[i].realUid);
                var profileUrl 		= "http://www.jiayuan.com/"+realUid;
                var chatId 			= "'chatbut_"+realUid+"'";
                var sex_self        = '她';
                if(data[i].sexValue == 'm') sex_self = '他';
                var face_img        = face_site+'?s=0&url='+data[i].image+'&sex='+data[i].sexValue+'&fr=search';
                if(type=="bigPhoto"){
                    var face_div        = '<div class="search_userHead" onmouseover="show_face_jump(this);" onmouseout="hide_face_jump(this);"><a target="_blank" href="'+face_img+'" class="search_sameUser">找像'+sex_self+'的人</a>';
                }else{
                    var face_div        = '<a target="_blank" href="'+face_img+'" class="search_sameUser">找像'+sex_self+'的人&gt;&gt;</a>';
                }
                if(data[i].randAttr == "priority")
                {
                    var randAttr  = '<a class="set_top" target="_blank" href="http://www.jiayuan.com/usercp/service/priority.php?pv.mark=1006346_25"><span class="set_top_icon"></span><span>排名提前</span></a>';
                    //首页非首页发信来源统计
                    if(isLogin)
                    {
                        var login_uid 	= JY.login.getUser()['uid'];
                        var attach_fxly = '&pv.mark=s_p_c|'+realUid+'|'+login_uid;
                    }else
                    {
                        var attach_fxly = '&pv.mark=s_p_c|'+realUid+'|0';
                    }
                    var attachUrl 		= parseInt(realPage) == 1 ? "?fxly=pmtq-ss-210"+attach_fxly : "?fxly=pmtq-ss-211"+attach_fxly;
                    var helloAttachUrl 	= parseInt(realPage) == 1 ? "&fxly=pmtq-ss-210" : "&fxly=pmtq-ss-211";
                }
                else
                {
                    var randAttr  = '';
                    //首页非首页发信来源统计
                    var attachUrl 		= parseInt(realPage) == 1 ? "?fxly=search_v2_index" : "?fxly=search_v2";
                    var helloAttachUrl 	= parseInt(realPage) == 1 ? "&fxly=search_v2_index" : "&fxly=search_v2";
					//职业标签
					if (selectedMark.indexOf("28:") >= 0 && selectedMark.indexOf("28:0")==-1){
						attachUrl = attachUrl+"_28";
						helloAttachUrl = helloAttachUrl+"_28";
					}
                }

                userIdCollection +=","+ realUid;
                var userInfoHtml 		= new Array();
                
                var xqHtml = '<a href="javascript:void(0);" onclick="sendXq(this, '+realUid+')" class="szh" foo="0"><span class="xique">送喜鹊</span></a>';
				var lt_class = '';
				if (is_hide_xq)
				{
					xqHtml = '';
					lt_class = 'only';
				}
                
                if(type == "bigPhoto")
                {
                    //批量打招呼
                    if($("#batch_hello").is(":hidden") && is_checked_exit(realUid) == 1 && sys_hidden_batch=="0")
                        userInfoHtml[i] = '<li style="z-index: 1;"><div class="hy_box hy_box_add2" onclick="dzhsingleSel(this,\'parent\');" onmouseover="userDivOver('+chatId+','+online+');" onmouseout="userDivOut('+chatId+','+online+')">'+face_div+randAttr+'<a  target="_blank" href="'+profileUrl+attachUrl+'"  class="openBox os_stat"><img src="'+data[i].image+'"></a></div><div class="user_name">'+data[i].userIcon+'<a target="_blank" class="os_stat" title="'+data[i].nickname+'"  href="'+profileUrl+attachUrl+'">'+data[i].nickname+'</a></div> <p class="user_info">'+data[i].age+'岁 '+data[i].work_location+'</p><p class="zhufang">'+data[i].randTag+'</p><div class="zh_btn"><a href="javascript:void(0);" class="dzh" foo="1" ><span class="dzh_text1" onclick="show_hello_div_v2(\'\',\''+data[i].helloUrl+helloAttachUrl+'\');" style="display:none;">打招呼</span><span class="dzh_text2" style="display:block">已选</span><span class="dzh_text3 displayBlock" onclick="dzhCancle(this)">取消</span><span class="dzh_text4 dzh_add2"  style="display:none;">选择'+sexName+'</span></a>'+xqHtml+'<a id="chatbut_'+data[i].realUid+'"   href="#" class="lt '+lt_class+'" style="display:none;">聊天</a></div><div class="hy_box_bg"></div><div class="hy_box_bg2" style="display:block;"></div></div></li>';
                    else if($("#batch_hello").is(":hidden") && sys_hidden_batch=="0")
                        userInfoHtml[i] = '<li style="z-index: 1;"><div class="hy_box hy_box_add" onclick="dzhsingleSel(this,\'parent\');" onmouseover="userDivOver('+chatId+','+online+');" onmouseout="userDivOut('+chatId+','+online+')">'+face_div+randAttr+'<a  target="_blank" href="'+profileUrl+attachUrl+'"  class="openBox os_stat"><img src="'+data[i].image+'"></a></div><div class="user_name">'+data[i].userIcon+'<a target="_blank" class="os_stat" title="'+data[i].nickname+'"   href="'+profileUrl+attachUrl+'">'+data[i].nickname+'</a></div> <p class="user_info">'+data[i].age+'岁 '+data[i].work_location+'</p><p class="zhufang">'+data[i].randTag+'</p><div class="zh_btn"><a href="javascript:void(0);" class="dzh" foo="0" ><span class="dzh_text1" onclick="show_hello_div_v2(\'\',\''+data[i].helloUrl+helloAttachUrl+'\');" style="display:none;">打招呼</span><span class="dzh_text2">已选</span><span class="dzh_text3" onclick="dzhCancle(this)">取消</span><span class="dzh_text4 dzh_add2" onclick="dzhsingleSel(this,\'other\');"  style="display:block;">选择'+sexName+'</span></a>'+xqHtml+'<a id="chatbut_'+data[i].realUid+'"   href="#" class="lt '+lt_class+'" style="display:none;">聊天</a></div><div class="hy_box_bg"></div><div class="hy_box_bg2"></div></div></li>';
                    else
                        userInfoHtml[i] = '<li style="z-index: 1;"><div class="hy_box" onclick="dzhsingleSel(this,\'parent\');" onmouseover="userDivOver('+chatId+','+online+');" onmouseout="userDivOut('+chatId+','+online+')">'+face_div+randAttr+'<a  target="_blank" href="'+profileUrl+attachUrl+'"  class="openBox os_stat" onclick="profileClickCount('+isLogin+','+realPage+')"><img src="'+data[i].image+'"></a></div><div class="user_name">'+data[i].userIcon+'<a target="_blank" class="os_stat" title="'+data[i].nickname+'"   href="'+profileUrl+attachUrl+'" onclick="profileClickCount('+isLogin+','+realPage+')">'+data[i].nickname+'</a></div> <p class="user_info">'+data[i].age+'岁 '+data[i].work_location+'</p><p class="zhufang">'+data[i].randTag+'</p><div class="zh_btn"><a href="javascript:void(0);"  class="dzh" foo="0" ><span class="dzh_text1" onclick="show_hello_div_v2(\'\',\''+data[i].helloUrl+helloAttachUrl+'\');">打招呼</span><span class="dzh_text2">已选</span><span class="dzh_text3" onclick="dzhCancle(this)">取消</span><span class="dzh_text4" onclick="dzhsingleSel(this,\'other\');">选择'+sexName+'</span></a>'+xqHtml+'<a id="chatbut_'+data[i].realUid+'"   href="javascript:openChatWindow('+data[i].realUid+',\''+data[i].sexValue+'\');" class="lt '+lt_class+'" style="display:none;">聊天</a></div><div class="hy_box_bg"></div><div class="hy_box_bg2"></div></div></li>';
                    var innerHtml = userInfoHtml.join('');

                    //隐藏列表父框体显示当前大图窗体
                    $("#normal_user_container").show();
                    $("#note_user_container").hide();
                    $("#normal_user_container").append(innerHtml);
                }else
                {
                    userInfoHtml[i] = '<li class="hov"> <div class="pic">'+randAttr+'<a target="_blank" href="'+profileUrl+attachUrl+'"  class="openBox os_stat" onclick="profileClickCount('+isLogin+','+realPage+')"><img src="'+data[i].image+'"></a></div> <div class="conts"><div class="user_name clear">'+face_div+data[i].userIcon+'<a target="_blank" class="os_stat" title="'+data[i].nickname+'" href="'+profileUrl+attachUrl+'" onclick="profileClickCount('+isLogin+','+realPage+')">'+data[i].nickname+'</a>'+data[i].randListTag+'</div><div class="tit"><strong>'+data[i].sex+','+data[i].age+','+data[i].work_sublocation+'</strong>&nbsp;&nbsp;&nbsp;<a  target="_blank" onclick="profileClickCount('+isLogin+','+realPage+')"  href="'+profileUrl+attachUrl+'">更多&gt;&gt;</a></div><p>'+data[i].shortnote+'</p><div><strong>择友要求</strong>: '+data[i].matchCondition+'</div><div class="btn_box"><a class="orange_btn" href="javascript:void(0);" onclick="javascript:onClickMsgButton_v2(\'\',\''+data[i].sendMsgUrl+helloAttachUrl+'\')"><em class="fx_ico"></em>发信</a><a class="orange_btn"  href="javascript:void(0);"  onclick="show_hello_div_v2(\'\',\''+data[i].helloUrl+helloAttachUrl+'\');" ><em class="dzh_ico"></em>打招呼</a><a class="gray_btn" href="javascript:openChatWindow('+data[i].realUid+',\''+data[i].sexValue+'\');"><em class="lt_ico"></em>聊天</a><a class="gray_btn" href="javascript:void(0);" onclick="javascript:sendGift_v2('+data[i].realUid+')"><em class="slw_ico"></em>送礼物</a><a href="javascript:void(0);" class="gray_btn" onclick="javascript:addFriend(\''+data[i].realUid+'\')"><em class="gz_ico"></em>关注</a></div></div></li>';
                    var innerHtml = userInfoHtml.join('');
                    //隐藏大图父框体显示当前列表窗体
                    $("#note_user_container").show();
                    $("#normal_user_container").hide();
                    $("#note_user_container").append(innerHtml);
                }
            }
            //超级聚光灯
            var expressUserInfoHtml = new Array();
            var attach_photo = '';
            for(var j=0;j<express_search.length;j++)
            {
            	var realUid         = express_search[j].realUid;
                userIdExpressCollection  +=","+ realUid;
                var chatId 			= "'chatbut_"+express_search[j].realUid+"'";
                var face_site       = "http://case.jiayuan.com/face/";
                var sex_self        = (express_search[j].sex == 'm') ? '他' : '她' ;
                var face_img        = face_site+'?s=0&url='+express_search[j].image+'&sex='+express_search[j].sex+'&fr=search';
                var list_exp = 0;
                if(type != 'bigPhoto') list_exp = 11;
                var face_div        = '<div class="search_userHead" onmouseover="show_face_jump(this,'+list_exp+');" onmouseout="hide_face_jump(this);"><a class="search_sameUser" target="_blank" href="'+face_img+'" class="search_sameUser">找像'+sex_self+'的人</a>';
                
                if(type == "bigPhoto")
                {
                    attach_photo = '<p class="user_info">'+express_search[j].age+'岁 '+express_search[j].work_location+'</p><p class="zhufang"><span>'+express_search[j].ex_mark+'</span></p>';
                    if($("#batch_hello").is(":hidden") && is_checked_exit(realUid) == 1)
                        expressUserInfoHtml[j] = '<li class="" style="z-index: 1;"><div class="hy_box hy_box_add2" onclick="dzhsingleSel(this,\'parent\');" onmouseover="userDivOver('+chatId+',0);" onmouseout="userDivOut('+chatId+',0)">'+face_div+'<a  target="_blank" class="os_stat" onclick="profileClickCount('+isLogin+','+realPage+')" href="http://www.jiayuan.com/'+realUid+'?fxly='+express_search[j].fxly+'"><img src="'+express_search[j].image+'"></a><a href="http://www.jiayuan.com/usercp/fate_express.php?pv.mark=1009818_1" target="_blank" class="icon_ju">超级聚光灯</a></div><div class="user_name"><a class="os_stat" target="_blank" onclick="profileClickCount('+isLogin+','+realPage+')"  title="'+express_search[j].nickname+'" href="http://www.jiayuan.com/'+realUid+'?fxly='+express_search[j].fxly+'">'+express_search[j].nickname+'</a></div>'+attach_photo+'<div class="zh_btn showRecommend"><a  class="dzh"   href="javascript:void(0);"  onclick="show_hello_div_v2(\'\',\''+express_search[j].helloUrl+'&fxly='+express_search[j].fxly+'\');"><span class="dzh_text1" style="display: none;">打招呼</span></a></div><div class="zh_btn displayNone hiddenRecommend"><a  class="dzh"   href="javascript:void(0);" foo="0"><span class="dzh_text1" style="display: none;" onclick="show_hello_div_v2(\'\',\''+express_search[j].helloUrl+'&fxly='+express_search[j].fxly+'\');">打招呼</span><span class="dzh_text2" style="display:block">已选</span><span class="dzh_text3 displayBlock" onclick="dzhCancle(this,\'recommend\')">取消</span><span class="dzh_text4 dzh_add2" onclick="dzhsingleSel(this,\'recommend\')"  style="display:none;">选择'+sexName+'</span></a><a id="chatbut_'+express_search[j].realUid+'" class="lt" style="display:none;"></a></div><div class="hy_box_bg" style="display: none;"></div><div class="hy_box_bg2" style="display: block;"></div></li>';
                    else if($("#batch_hello").is(":hidden"))
                        expressUserInfoHtml[j] = '<li class="" style="z-index: 1;"><div class="hy_box hy_box_add" onclick="dzhsingleSel(this,\'parent\');" onmouseover="userDivOver('+chatId+',0);" onmouseout="userDivOut('+chatId+',0)">'+face_div+'<a  target="_blank" class="os_stat" onclick="profileClickCount('+isLogin+','+realPage+')" href="http://www.jiayuan.com/'+realUid+'?fxly='+express_search[j].fxly+'"><img src="'+express_search[j].image+'"></a><a href="http://www.jiayuan.com/usercp/fate_express.php?pv.mark=1009818_1" target="_blank" class="icon_ju">超级聚光灯</a></div><div class="user_name"><a class="os_stat" target="_blank" onclick="profileClickCount('+isLogin+','+realPage+')"  title="'+express_search[j].nickname+'" href="http://www.jiayuan.com/'+realUid+'?fxly='+express_search[j].fxly+'">'+express_search[j].nickname+'</a></div>'+attach_photo+'<div class="zh_btn showRecommend"><a  class="dzh"   href="javascript:void(0);"  onclick="show_hello_div_v2(\'\',\''+express_search[j].helloUrl+'&fxly='+express_search[j].fxly+'\');"><span class="dzh_text1" style="display: block;">打招呼</span></a></div><div class="zh_btn displayNone hiddenRecommend"><a  class="dzh"   href="javascript:void(0);" foo="0"><span class="dzh_text1" style="display: none;" onclick="show_hello_div_v2(\'\',\''+express_search[j].helloUrl+'&fxly='+express_search[j].fxly+'\');">打招呼</span><span class="dzh_text2" >已选</span><span class="dzh_text3 displayBlock" onclick="dzhCancle(this,\'recommend\')">取消</span><span class="dzh_text4 dzh_add2" onclick="dzhsingleSel(this,\'recommend\')"  style="display:block;">选择'+sexName+'</span></a><a id="chatbut_'+express_search[j].realUid+'" class="lt" style="display:none;"></a></div><div class="hy_box_bg" style="display: none;"></div><div class="hy_box_bg2" style="display: block;"></div></li>';
                    else
                        expressUserInfoHtml[j] = '<li class="" style="z-index: 1;"><div class="hy_box" onclick="dzhsingleSel(this,\'parent\');" onmouseover="userDivOver('+chatId+',0);" onmouseout="userDivOut('+chatId+',0)">'+face_div+'<a  target="_blank" class="os_stat" onclick="profileClickCount('+isLogin+','+realPage+')" href="http://www.jiayuan.com/'+realUid+'?fxly='+express_search[j].fxly+'"><img src="'+express_search[j].image+'"></a><a href="http://www.jiayuan.com/usercp/fate_express.php?pv.mark=1009818_1" target="_blank" class="icon_ju">超级聚光灯</a></div><div class="user_name"><a class="os_stat" target="_blank" onclick="profileClickCount('+isLogin+','+realPage+')"  title="'+express_search[j].nickname+'" href="http://www.jiayuan.com/'+realUid+'?fxly='+express_search[j].fxly+'">'+express_search[j].nickname+'</a></div>'+attach_photo+'<div class="zh_btn showRecommend"><a  class="dzh"   href="javascript:void(0);"  onclick="show_hello_div_v2(\'\',\''+express_search[j].helloUrl+'&fxly='+express_search[j].fxly+'\');"><span class="dzh_text1">打招呼</span></a></div><div class="zh_btn displayNone hiddenRecommend"><a  class="dzh"   href="javascript:void(0);" foo="0"><span class="dzh_text1" style="display: none;" onclick="show_hello_div_v2(\'\',\''+express_search[j].helloUrl+'&fxly='+express_search[j].fxly+'\');">打招呼</span><span class="dzh_text2" >已选</span><span class="dzh_text3 displayBlock" onclick="dzhCancle(this,\'recommend\')">取消</span><span class="dzh_text4 dzh_add2" onclick="dzhsingleSel(this,\'recommend\')"  style="display:none;">选择'+sexName+'</span></a><a id="chatbut_'+express_search[j].realUid+'" class="lt" style="display:none;"></a></div><div class="hy_box_bg" style="display: none;"></div><div class="hy_box_bg2" style="display: block;"></div></li>';
                }else
                {
                    expressUserInfoHtml[j] = '<li class="" style="z-index: 1;"><div class="hy_box">'+face_div+'<a  target="_blank" class="os_stat" onclick="profileClickCount('+isLogin+','+realPage+')" href="http://www.jiayuan.com/'+realUid+'?fxly='+express_search[j].fxly+'"><img src="'+express_search[j].image+'"></a><a href="http://www.jiayuan.com/usercp/fate_express.php?pv.mark=1009818_1" target="_blank" class="icon_ju">超级聚光灯</a></div><div class="user_name"><a target="_blank" class="os_stat" onclick="profileClickCount('+isLogin+','+realPage+')"  title="'+express_search[j].nickname+'" href="http://www.jiayuan.com/'+realUid+'?fxly='+express_search[j].fxly+'">'+express_search[j].nickname+'</a></div>'+attach_photo+'<div class="zh_btn showRecommend"><a  class="dzh"   href="javascript:void(0);"  onclick="show_hello_div_v2(\'\',\''+express_search[j].helloUrl+'&fxly='+express_search[j].fxly+'\');"><span class="dzh_text1">打招呼</span></a></div><div class="zh_btn displayNone hiddenRecommend"><a  class="dzh"   href="javascript:void(0);" foo="0"><span class="dzh_text1" style="display: none;" onclick="show_hello_div_v2(\'\',\''+express_search[j].helloUrl+'&fxly='+express_search[j].fxly+'\');">打招呼</span><span class="dzh_text2" >已选</span><span class="dzh_text3 displayBlock" onclick="dzhCancle(this,\'recommend\')">取消</span><span class="dzh_text4 dzh_add2" onclick="dzhsingleSel(this,\'recommend\')"  style="display:none;">选择'+sexName+'</span></a><a id="chatbut_'+express_search[j].realUid+'" class="lt" style="display:none;"></a></div><div class="hy_box_bg" style="display: none;"></div><div class="hy_box_bg2" style="display: block;"></div></li>';
                }
            }
            var expressInnerHtml = expressUserInfoHtml.join('');
            //var input_html = '<input type="hidden" name="hiddenRecommendUserId" value="" class="hiddenRecommendUserId" >';
            $(".love_cont").find("ul").children().remove();
           // $(".love_cont").find("ul").append(input_html);
            $(".love_cont").find("ul").append(expressInnerHtml);
            /*js冗余代码*/
            $(".dzh").hover(function(){
                if(($(this).attr("foo") == 1) && ($(".dzh_text3").is(":hidden"))){
                    $(this).removeClass("dzh_add2");
                    $(this).find("span").css("display","none");
                    $(this).find(".dzh_text3").css("display","block");
                }
            },function(){
                if(($(this).attr("foo") == 1) && ($(".dzh_text2").is(":hidden"))){
                    $(this).addClass("dzh_add2");
                    $(this).find("span").css("display","none");
                    $(this).find(".dzh_text2").css("display","block");
                }
            });
            //阻止事件冒泡
            $(".hy_box a").click(function(event){
                event.stopPropagation();
            });
            /***/
            if($("#batch_hello").is(":hidden") && type == "bigPhoto" && is_bl_hello)
            {

                //恢复批量现场
                fixed_anchor("new_header_scroll");
                $(".user_list li").addClass("show_gray");
                $(".dzh").addClass("dzh_add");
                batchClickShow($("#batch_hello"),$("#new_batch_header"),$("#normal_user_container"));//显示批量打招呼头部
                batchFixed($(window),$("#new_batch_header"),$("#new_header_scroll"),"batchfix");//批量打招呼头部位置固定
                
                synchronizationHeight();//同步右侧高度
                //保存筛选过用户入缓存
                getUnionUserId();

                //判断当页是否是全选
                var pageHelloUserId = $(".say_hello_userId_list").val();
                var pageNum 		 =	getHelloUserCount(pageHelloUserId);
                if(pageNum == parseInt(normalUserCount) + parseInt(recommendUserCount))
                    $("#show_this_page").attr("checked",'true');
                else
                    $("#show_this_page").removeAttr("checked");
                //侧边缘分速递切换模式
                $(".showRecommend").hide();
                $(".hiddenRecommend").show();

            }
            getPageInfo(pageTotal);
            $("#loadingTip").hide();
            //统计左侧正常用户的人数人次
            search_send_pv("search_v2|dispuid|"+userIdCollection.substr(1));
            //统计右侧聚光灯用户人数人次
            search_send_pv("search_v2|dispRecUid|"+userIdExpressCollection.substr(1));
            

            //2015-8-17 为七夕送玫瑰按钮的批量删除做修改;
            // if( $('#normal_user_container').find('.show_gray').length > 0 ){
            //     $('.songxique').removeClass('dzh');
            //     $('.songxique').hide();

            // }



        }
    });
}
//搜索按钮点击
function searchResult(pageFlag,flag,pageAttation,delay){
    var flag		   		= arguments[1] ? arguments[1] : $("#flag").val();
    var pageItem        	= arguments[2] ? arguments[2] : null;
    var delay        		= arguments[3] ? arguments[3] : 20;
    taskSendMsg.delay(delay, function () {
        var params 			= new iniParam();
        var keyDefault      = params.keyDefault;
        var sTNameDefault   = params.sTNameDefault;
        var keyword	    	= params.keyword;
        var searchCache	    = params.searchCache;
        var sTId 			= params.sTId ;
        var sTName 			= params.sTName ;
        var sex	        	= params.sex;
        var selectedMark    = params.selectedMark;
        var orderType       = params.orderType;
        var orderValue      = params.orderValue;
        var pageTotal       = params.pageTotal;
        //var prePage         = params.prePage;
        var realPage        = getRealPage(pageFlag,pageItem);
        var singleFilter    = params.singleFilter;
        //关键词为空阻止search搜索
        if(flag == "search" && trim(decodeURIComponent(keyword)) == searchCache){
            return false;
        }
        //搜索统计
        var selectedMarkArr = selectedMark.split(",");
        var selectStatistics= selectedMarkArr.join("|");
        if(orderType != "default")
        {
            selectStatistics = orderType+":"+orderValue+"|"+selectStatistics;
        }
        var pv_str 			= '|search_v2|'+sex+'|f:'+flag+'|'+selectStatistics;
        search_send_pv(pv_str);
        if(flag == 'search'){
            $('#s_nick').val('');
        }
        var mt = $('#more_tag').val();
        //uid直接搜索入口
        var nick = $('#s_nick').val();
        var del_nick = $('#nick_condi').val();
        if(pageAttation == 'from_nick'){
            var head_type = $('#head_type').val();
            window.location.href="./index.php?key="+keyword+'&ht='+head_type;
        }else if(del_nick != ''){
            keyword = '';
            window.location.href=encodeURI("./index.php?key="+keyword+"&osex="+sex+'&nc='+del_nick+'&onick='+pageAttation);
        }else if( nick != ''){
            var j_url = encodeURI("./index.php?key="+keyword+"&sex="+sex+"&stc="+selectedMark+"&sn="+orderType+"&sv="+orderValue+"&p="+realPage+"&pt="+pageTotal+"&ft="+singleFilter+"&f="+flag+'&mt='+mt+"&nick="+nick);
            window.location.href=j_url;
        }else if(sTId == 0 && sTName == ''){
            window.location.href="./index.php?key="+keyword+"&sex="+sex+"&stc="+selectedMark+"&sn="+orderType+"&sv="+orderValue+"&p="+realPage+"&pt="+pageTotal+"&ft="+singleFilter+"&f="+flag+'&mt='+mt;
        }else{
            window.location.href="./index.php?key="+keyword+"&sex="+sex+"&stc="+selectedMark+"&sn="+orderType+"&sv="+orderValue+"&p="+realPage+"&sTId="+sTId+"&sTName="+sTName+"&pt="+pageTotal+"&ft="+singleFilter+"&f="+flag+'&mt='+mt;
        }
        return false;
    });
}
function iniParam()
{
    //默认照片选中
    this.flag		     = arguments[1] ? arguments[1] : $("#flag").val();
    this.pageItem        = arguments[2] ? arguments[2] : null;
    var keywordRow	   	 = ($(".keyword").val() == fKeyDefault || $(".keyword").val() == mKeyDefault)  ? '' : $(".keyword").val() ;
    this.keyword		 = encodeURIComponent(keywordRow);
    this.sTNameDefault   = savaTagDefault;
    this.sTId 			 = $(".hiddenSearchTagId").val() ;
    this.sTName 		 = $(".searchSave").val() == this.sTNameDefault ? '' : $(".searchSave").val() ;
    this.sex	         = trim($(".selectedSex").val());
    this.selectedMark   = $('#selectedMark').val();

    this.orderType 	= $(".sortName").val();
    this.orderValue 	= 1;
    //this.prePage       = $("#pageCache").val();
    this.pageTotal     = $("#pageTotal").val();
    this.singleFilter   = $(".singleFilter").val();
    this.searchCache   = $("#searchCache").val();
    this.normalUserCount    = 25;
    this.recommendUserCount = 5;
}
//得到真实的page
function getRealPage(pageFlag,pageItem)
{
    var now_page 	= $("#pageCache").val();
    var page_total 	= $("#pageTotal").val();
    var sex	        = trim($(".selectedSex").val());
    var statistic   = sex == "f" ? "|search_v2|f|page" : "|search_v2|m|page"
    if(pageFlag =="first")
    {
        var realPage = 1;
    }else
    {
        if(pageFlag == "fir")
        {
            var realPage = 1;
        }
        if(pageFlag == "pre")
        {
            var realPage = (parseInt(now_page) -1) > 0 ? parseInt(now_page) -1 : 1;

        }
        if(pageFlag == "next")
        {
            var  realPage         = parseInt(now_page)+1 > page_total ? page_total : parseInt(now_page)+1 ;
        }
        if(pageFlag == 'page')
        {
            var page_text      =$(pageItem).html();
            var page_reg       = /\d+/g;
            var now_page      = page_reg.exec(page_text);
            var realPage = parseInt(now_page) > page_total ? page_total : parseInt(now_page) ;
        }
        search_send_pv(statistic);
    }
    if(isNaN(now_page)) {var realPage = 1;}
    $("#pageCache").val(realPage);
    return realPage;
}
//恢复批量打招呼复选
function is_checked_exit(realUid)
{
    var realPage 			= $("#pageCache").val();
    var userId_str_cache	= $(".say_hello_userId_list_cache").val();
    var userId_arr			= userId_str_cache.split(",");
    var exit_index 			= is_exit(realPage,userId_str_cache);
    if(exit_index != -1)
    {
        if( userId_arr[exit_index].indexOf(realUid) != -1)
        {
            return 1;
        }else{
            return -1;
        }
    }else
    {
        return -1;
    }
}
function moveRecUser(page)
{
    var userId_str_cache	= $(".say_hello_userId_list_cache").val();
    var userId_arr			= userId_str_cache.split(",");
    var exit_index 			= is_exit(page,userId_str_cache);
    if(exit_index != -1)
        var againUserId			= userId_arr.splice(exit_index,1);
    else
        var againUserId         = '';
    //重置打招呼用户cache
    $(".say_hello_userId_list_cache").val(userId_arr.join(","));
    return againUserId;
}
//复选单选筛选按钮
function singleCheck(id,idName)
{
    if(typeof($("#"+idName).attr("checked")) == "undefined")
    {
        pullMark(id);
        $(".singleFilter").val("on");
        searchResult("first","select",'',delayTime);
    }else if($("#"+idName).attr("checked")  == "checked"){
        pushMark(id,1);
        $(".singleFilter").val("on");
        searchResult("first","select",'',delayTime);
    }
}
//登陆框弹出
function loginWindowPop()
{
    if(JY.login.getUser()['uid']<1){
        loginWindow.openlogindiv('login',location.href, function(){location.reload();});
        return;
        //_showLoginDiv();return;
    }
}
//删除标签
function removeSearchTagNew(thisItem,tagId){
    if(confirm("确认删除此条搜索条件？"))
    {
        var thisDom = $(thisItem).parent('p');
        $.ajax({
            url : 'ajaxSeparate.php',
            data : {'sTId':tagId,'f':"deleteSearchTag"},
            type : 'get',
            success : function(response){
                var jsonRes = eval('('+response+')');
                if(jsonRes == null)return false;
                if(jsonRes.result == "1")
                {
                    $(".arrow2").removeClass("on2");
                    thisDom.remove();
                    if($("#save_tag_list").find('p').length == 0){
                         $(".JY-bc span").removeClass("hov");
                         $(".JY-bc-con").hide();
                    }
                    search_v2_alert("删除搜索条件成功！");
                }
            }
        })
    }else
    {
        return false;
    }
}
//转义url
function URLencode(sStr)
{
    return escape(sStr).replace(/\+/g, '%2B').replace(/\"/g,'%22').replace(/\'/g, '%27').replace(/\//g,'%2F');
}
// 分页信息加载
function getPageInfo(page_total)
{
    var pageSelect 		= "";
    var pageDiv 		= "";
    var page_tmp = "";
    $(".pageclass").children().show();
    var pageCache 		= $("#pageCache").val();
    $("#select_box").children().remove();
    if(parseInt(pageCache)>5){
        for(var i =parseInt(pageCache)-5; (i<parseInt(pageCache)+5) && (i<= page_total); i++){
            if(i == parseInt(pageCache)){
                pageSelect += "<strong>第"+i+"页</strong><div class='pageNo' onmousemove='pageMouseOver()' onmouseout='pageMouseOut()' >";
                page_tmp = "<a href='javascript:void(0);' class='pageDefault' onclick=\"getSearchResult('page','',this);\">第"+i+"页</a>";
                pageDiv = page_tmp+pageDiv;
            }else{
                page_tmp = "<a href='javascript:void(0);' onclick=\"getSearchResult('page','',this);\">第"+i+"页</a>";
                pageDiv = page_tmp+pageDiv;
            }
        }
    }else{
        for(var i =1; (i<11) && (i <= page_total); i++ ){
            if(i == parseInt(pageCache)){
                pageSelect += "<strong>第"+i+"页</strong><div class='pageNo' onmousemove='pageMouseOver()' onmouseout='pageMouseOut()'>";
                page_tmp = "<a href='javascript:void(0);' class='pageDefault' onclick=\"getSearchResult('page','',this);\">第"+i+"页</a>";
                pageDiv = page_tmp+pageDiv;
            }else{
                page_tmp = "<a href='javascript:void(0);' onclick=\"getSearchResult('page','',this);\">第"+i+"页</a>";
                pageDiv = page_tmp+pageDiv;
            }
        }
    }
    pageDiv += "</div>";
    var unionPage = pageSelect + pageDiv;
    $("#select_box").append(unionPage);
    $("#pageTotal").val(page_total);
}
//统计个人资料点击量
function saveTagClickCount(sex,flag){
    search_send_pv("|search_v2_saveTagClick|"+sex+"|"+flag);
}
//打招呼人数限制
function limitHelloUserCount(limitCount)
{
    var userId_str = getUnionUserId();
    var num 		= getHelloUserCount(userId_str);
    //限制一次打招呼人数30人
    if(parseInt(num) > parseInt(limitCount))
    {
        $("#show_this_page").removeAttr("checked");
        search_v2_alert("一次打招呼人数不能超过30人！");
        return false;
    }else
    {
        return 1;
    }
}
//获得选中打招呼用户数目
function getHelloUserCount(userId_str)
{
    if(userId_str != '')
    {
        var num = 0;
        var userId_cache_arr = userId_str.split(",");
        for(var i=0;i<userId_cache_arr.length;i++)
        {
            num += parseInt(userId_cache_arr[i].split(".").length);
        }
    }else
    {
        var num 	= 0;
    }
    return num;
}

//选中复选框
function countChecked(){
    var say_hello_userId_list_cache = $(".say_hello_userId_list_cache").val();
    var num 	= getHelloUserCount(say_hello_userId_list_cache);
    var  userId = uuserId  = recommendUserId = urecommendUserId = unionUserId = '';
    var recommendPage = 0;
    $("#normal_user_container").find("li .dzh").each(function(){
        if($(this).attr("foo") == 1)
        {
            var eachIdStr = $(this).siblings(".lt").attr("id");

            var eachId    = eachIdStr.substr(eachIdStr.indexOf("_")+1);

            userId 		 += "."+eachId;
            num++;
        }
    });
    $(".hiddenRecommend").each(function(){
        if($(this).find(".dzh").attr("foo") == 1)
        {

            var eachIdStr = $(this).find(".lt").attr("id");
            var eachId    = eachIdStr.substr(eachIdStr.indexOf("_")+1);
            userId  += "."+eachId;
            num++;
        }
    });
    $("#select_num").text(num);
    //组合打招呼人
    if(userId != '' || recommendUserId != '')
    {
        if(userId != '')
        {
            var pageCache = $("#pageCache").val();
            var uuserId = pageCache+":"+userId.substr(1);

        }
        if(recommendUserId != '')
        {
            var urecommendUserId = recommendPage+":"+recommendUserId.substr(1);
        }
        var unionUserId = getHelloUnion(uuserId,urecommendUserId);

        $(".say_hello_userId_list").val(unionUserId);

    }else
    {
        $(".say_hello_userId_list").val('');
    }
}
//单击显示批量打招呼
function batchClickShow(bh,nhs,nuc){
    bh.hide();
    nhs.show();
    nuc.find("input").show();
}
//隐藏批量打招呼头部
function batchHidden(bh,nhs,nuc){
    bh.show();
    nhs.hide();
    nuc.find("input").hide();
    $("#show_selected").removeAttr("checked");
    nuc.find("li").show();
}
//批量打招呼固定位置
function batchFixed(ws,nbh,nhs,classname){
    if(parseInt(ws.scrollTop()) >= parseInt(nbh.offset().top)){
		nbh.addClass(classname);
    }
    if(parseInt(ws.scrollTop()) < parseInt(nhs.offset().top)){
     	nbh.removeClass(classname);	   
    }
    	
}
//显示隐藏未选择会员
function noSelect(ss,nuc,nhs){
    if(ss.is(":checked")){
        nuc.find("li").each(function(){
            if($(this).attr("check") != 1){
                $(this).hide();
            }
        });
    }else{
        nuc.find("li").show();
    }
    var t = parseInt(nhs.offset().top);
    var st = parseInt($(window).scrollTop());
    if(st > t){
        $("html,body").animate({scrollTop:t},800);
    }
}
//取消选择
function Deselect(ss,nuc,flag){
    var flag = arguments[2] ? arguments[2] : "normal";
    var say_hello_userId_list_cache = $(".say_hello_userId_list_cache").val();
    if(say_hello_userId_list_cache != '' && flag != "all")
    {
        var num = 0;
        var userId_cache_arr = say_hello_userId_list_cache.split(",");
        for(var i=0;i<userId_cache_arr.length;i++)
        {
            num = parseInt(num) + parseInt(userId_cache_arr[i].split(".").length);
        }
    }else
    {
        var num 	= 0;
    }
    nuc.find("input").each(function(){
        if($(this).is(":checked")){
            $(this).removeAttr("checked");
            $(this).parent().removeAttr("check");
        }
        if(ss.is(":checked")){
            $(this).parent().hide();
        }
    });
    $(".say_hello_userId_list").val('');
    if(flag == "all")
        $(".say_hello_userId_list_cache").val('');
    $("#select_num").text(num);
}
//批量打招呼弹框

function batSayHello()
{
	var r = limitHelloUserCount(30);
	if (r == false)
	{
		return false;
	}
	
    loginWindowPop();
    var userId_str_union = getUnionUserId();
    if(userId_str_union != '')
    {
        var user_id_union_array = user_id_array = [];
        user_id_union_array		= userId_str_union.split(",");
        for(var i=0;i<user_id_union_array.length;i++)
        {
            var eachUserId = user_id_union_array[i];
            user_id_array.push(eachUserId.substr(eachUserId.indexOf(":")+1));
        }
        var userId_str_row = user_id_array.join(".");
        var userId_str	   =  userId_str_row.replace(/\./gi,",");
    }else
    {
        search_v2_alert("请选择打招呼的人！");
        return false;
    }
    var say_hello_base_url   = $(".say_hello_url").val();
	//职业标签
	var fxly = "seach_v2_pl";
	var params          = new iniParam();
	var selectedMark   = params.selectedMark;
	if (selectedMark.indexOf("28:") >= 0 && selectedMark.indexOf("28:0")==-1){
		fxly = fxly+"_28";		
	}
    //批量打招呼确定量
    search_send_pv("search_v2|pl_btn");
    show_hello_div_v2('',say_hello_base_url+"/hello_bat.php?userId_str="+userId_str+"&fxly="+fxly);
}
function iniUserId()
{
    var page_cache 			 = $("#pageCache").val();
    var userId_cache		 = $(".say_hello_userId_list_cache").val();
    if(is_exit(page_cache,userId_cache) != -1)
        var userId_page_cache	 = moveRecUser(page_cache);
    else
        var userId_page_cache	 = '';

    var userId_rec_cache	 = moveRecUser(0);
    var userId_str 			 = getHelloUnion(userId_rec_cache,userId_page_cache);
    var userId_str_cache     = $(".say_hello_userId_list_cache").val();
    var iniUserArr			 = new Array();
    if(userId_str != '')
    {
        iniUserArr[0] = userId_str_cache;
        iniUserArr[1] = userId_str;
        return iniUserArr;
    }else
    {
        return '';
    }
}
function getHelloUnion(userId_rec_cache,userId_page_cache)
{
    if(userId_rec_cache != '' &&  userId_page_cache == '')
    {
        var userId_str 		 = userId_rec_cache;
    }else
    {
        var reg=/^,/gi;
        var userId_str_union = userId_rec_cache +","+userId_page_cache;
        var userId_str 		 = userId_str_union.replace(reg,"");
    }
    return userId_str;
}
function getUnionUserId()
{
    var flag = arguments[0] ? arguments[0] : "normal";
    var userId_str_cache     = $(".say_hello_userId_list_cache").val();
    var userId_str_now    	 = $(".say_hello_userId_list").val();
    var userId_str			 = getHelloUnion(userId_str_cache,userId_str_now);
    $(".say_hello_userId_list_cache").val(userId_str);
    $(".say_hello_userId_list").val('');
    var iniUserIdRes = iniUserId();
    if(iniUserIdRes != '')
    {
        $(".say_hello_userId_list").val(iniUserIdRes[1]);
        $(".say_hello_userId_list_cache").val(iniUserIdRes[0]);

    }
    return  userId_str;
}
//延迟出发事件
function DelayedTask (fn, scope, args) {
    var me = this, id, call = function () {
        clearInterval(id);
        id = null;
        fn.apply(scope, args || []);
    };
    me.delay = function (delay, newFn, newScope, newArgs) {
        me.cancel();
        fn = newFn || fn;
        scope = newScope || scope;
        args = newArgs || args;
        id = setInterval(call, delay);
    };
    /** 	 * Cancel the last queued timeout 	 */
    me.cancel = function () {
        if (id) {
            clearInterval(id);
            id = null;
        }
    };
};
function addCur(thisItem)
{
    $(thisItem).addClass("cur");
}
function removeCur(thisItem){
    $(thisItem).removeClass("cur");
}
function clickdd(thisItem){
    $(".keyword").val($(thisItem).text());
    statisticsComplete();
    mainResult();
}
function getSearchDropDown(){
    var keywordTip 	=  $(".keyword").val();
    var sex	        = trim($(".selectedSex").val());
    var txt 		= trim(encodeURIComponent($(".keyword").val()));//这里是取得他的输入框的值

    if(trim(keywordTip) == '')
    {
        var search_tip_json = $(".search_tip_json").val();
        var data 			=  eval('('+search_tip_json+')');
        //得到历史搜索和热门搜索词
        getHistoryHotKey(data);
    }else
    {
        if(keywordTip.length > 20)
        {
            return false;
        }
        //拼装数据
        $.ajax({
            url : "ajaxSeparate.php",//从后台取得json数据
            type : "post",
            data : {"keyword":txt,"sex":sex},
            success : function(response) {
                $(".searchUser_tip_json").val(response);
                var data = eval('('+response+')');
                getSearchKey(keywordTip,data);
            }
        });
        //设置搜索缓存
        var keywordNow  = $(".keyword").val();
        $("#searchAutoComplete").val(trim(keywordNow));
        //关联词搜索总展示量
        search_send_pv("search_v2|relation_display");
    }
}
//得到搜索历史和热门记录
function getHistoryHotKey(data)
{
    if(data.history && data.hot)
    {
        var sex	       	 	= trim($(".selectedSex").val());
        $("#search_drop_down").show();
        $("#search_hot").show();
        $("#search_user").hide();
        //清楚上次搜索结果
        $(".autoCompleteSearch").nextAll().remove();
        var innerHtmlHistory 	= innerHtmlHot ='';
        var searchHistory 		= data.history;
        var searchHot	  		= data.hot;

        var cookieHistory 		= "skhistory_"+sex;
        if(getHistoryCookie(cookieHistory))
        {
            $("#search_history").show();
            for(var i in searchHistory)
            {
                innerHtmlHistory += "<dd onmouseover='addCur(this);' onmouseout='removeCur(this);' onclick='clickdd(this);'>"+searchHistory[i]+"</dd>"
            }
            $("#search_history_remove").parent().nextAll().remove();
            $("#search_history_remove").parent().after(innerHtmlHistory);
        }
        for(var i=0; i<searchHot.length ;i++)
        {
            innerHtmlHot += "<dd onmouseover='addCur(this);' onmouseout='removeCur(this);' onclick='clickdd(this);'>"+searchHot[i]+"</dd>"
        }
        $(".search_hot_dt").nextAll().remove();
        $(".search_hot_dt").after(innerHtmlHot);
    }
}
//得到搜索关联词
function getSearchKey(keywordTip,data)
{
    if(data == null || (typeof(data) == "object" && data == '' ))
    {
        $("#search_drop_down").hide();
    }else if(data.history && data.hot)
    {
        getHistoryHotKey(data);
    }
    else if(!data.history && !data.hot)
    {
        $("#search_drop_down").show();
        $("#search_history").hide();
        $("#search_hot").hide();
        $("#search_user").show();
        var innerHtml = '<dd class="fir cur"><b>'+keywordTip+'</b></dd>';
        for(var i in data)
        {
            innerHtml += "<dd onmouseover='addCur(this);' onmouseout='removeCur(this);' onclick='clickdd(this);'>"+data[i]+"</dd>";
        }
        $(".autoCompleteSearch").nextAll().remove();
        $(".autoCompleteSearch").after(innerHtml);
    }
}
//上下键
function getIndexDown(flag) {
    var obj = $("#search_"+flag+" dd");
    var index =  0;
    var len = obj.size();
    for(var i = 0; i < len; i++) {
        if (obj.eq(i).hasClass("cur")){
            obj.eq(i % len).removeClass("cur");
            index = i + 1;
            //循环
            if((flag == "user" || (($("#search_history").is(":hidden") || $("#search_history").length == 0 ) && $("#search_hot").is(":visible"))) && index == len)
                index = 0;
        }
    }
    var dd_val = obj.eq(index).text();
    $(".keyword").val(dd_val);
    return index > (len-1) ? 0 : (index % len);
}
function getIndexUp(flag) {
    var obj = $("#search_"+flag+" dd");
    var len = obj.size();
    var index = len - 1;
    for(var i = 0; i < len; i++) {
        if (obj.eq(i).hasClass("cur")){
            obj.eq(i % len).removeClass("cur");
            index = i - 1;
        }
    }
    var dd_val = obj.eq(index).text();
    $(".keyword").val(dd_val);
    return(index < 0) ? (len - 1) : (index % len);
}
//热门标签
function hotTagClick(thisItem){
    var hotTag = $(thisItem).text();
    $(".keyword").val(hotTag);
    var from = '';
    var nick = $('#s_nick').val();
    if(nick != '') from = 'from_nick';
    searchResult("first","search",from);
}
//分页默认样式设置
function pageMouseOver() {
    $('.pageNo a').removeClass("pageDefault");
}
function  pageMouseOut() {
    var pageCache =  $("#pageCache").val();
    var pageStr   = "第"+pageCache+"页";
    $(".pageNo a").each(function(){
        if($(this).text() == pageStr)
        {
            $(this).addClass("pageDefault");
        }
    });
}

function delayGetSearchDown(){
    taskSendMsg.delay(500, function () {
        var keywordNow  = $(".keyword").val();
        var searchAuto  = $("#searchAutoComplete").val();
        if(searchAuto != '' && trim(keywordNow) == searchAuto)
        {
            var searchUser_tip_json =  $(".searchUser_tip_json").val();
            var data = eval('('+searchUser_tip_json+')');
            getSearchKey(keywordNow,data);
        }
        else
            getSearchDropDown();
    });
}
function new_show_dzh_1(obj){
    obj.parent().parent().addClass("hy_box_add2");
    obj.parent().next().next().css("display","block");
    obj.addClass("dzh_add2").attr("foo",1);
    obj.find("span").css("display","none");
    obj.find(".dzh_text2").css("display","block");
}
function new_show_dzh_2(obj){
    obj.parent().parent().removeClass("hy_box_add2");
    obj.parent().next().next().css("display","none");
    obj.removeClass("dzh_add2").attr("foo",0);
    obj.find("span").css("display","none");
    obj.find(".dzh_text3").next().css("display","block");

}
function stopBubble(event)
{
    //阻止事件冒泡
    var e = event || window.event;
    if(e.stopPropagation) { //W3C阻止冒泡方法
        e.stopPropagation();
    } else {
        e.cancelBubble = true; //IE阻止冒泡方法
    }
}
//批量打招呼选择
function dzhsingleSel(thisItem,flag)
{
    var oEvent = dzhsingleSel.caller.arguments[0];
    stopBubble(oEvent);
    if($("#batch_hello").is(":hidden"))
    {
        var flag = arguments[1] ? arguments[1] : '';
        if(limitHelloUserCount(30) == 1)
        {
            if(flag == 'recommend')
            //重置推荐用户缓存
                moveRecUser(0);
            if(flag == "parent")
                var thisItemParent = $(thisItem).find('.dzh');
            else
                var thisItemParent = $(thisItem).parent();
            new_show_dzh_1(thisItemParent);
            countChecked();
        }
    }
}
//取消打招呼选择
function dzhCancle(thisItem,flag)
{
    var oEvent = dzhCancle.caller.arguments[0]
    stopBubble(oEvent);
    var flag = arguments[1] ? arguments[1] : '';
    if(flag == 'recommend')
    //重置推荐用户缓存
        moveRecUser(0);
    var thisItemParent = $(thisItem).parent();
    new_show_dzh_2(thisItemParent);
    $(this).parent().attr("foo",0);
    $("#show_this_page").attr("checked", false);
    countChecked();
}
//打招呼按钮hover模拟
function dzhOver(thisItem){
    if(($(thisItem).attr("foo") == 1) && ($(thisItem).find(".dzh_text3").is(":hidden")))
    {
        $(thisItem).removeClass("dzh_add2");
        $(thisItem).find("span").css("display","none");
        $(thisItem).find(".dzh_text3").css("display","block");
    }
}
function dzhOut(thisItem)
{
    if(($(thisItem).attr("foo") == 1) && ($(thisItem).find(".dzh_text2").is(":hidden")))
    {
        $(thisItem).addClass("dzh_add2");
        $(thisItem).find("span").css("display","none");
        $(thisItem).find(".dzh_text2").css("display","block");
    }
}
function fixed_anchor(anchorId){
    try{
       var t = parseInt($("#"+anchorId).offset().top);
        $("html,body").animate({scrollTop:t},800);
        $("#"+anchorId).height(35).css("margin-bottom","15px"); 
    }catch(e){
        return false;
    }
    
}
//热门榜单热门词点击量
function statisticsHot()
{
    search_send_pv("|search_v2|hotSearchRankingList");
}
//统计历史,热门,相关的搜索补全
function statisticsComplete()
{
    var isHistorySearchKey 	= $("#search_history dd").filter(".cur").length;
    var isHotSearchKey 		= $("#search_hot dd").filter(".cur").length;
    var isUserSearchKey 	= $("#search_user dd").filter(".cur").length;
    $("#search_drop_down").hide();
    //历史热门和关联词使用量统计
    if(isHistorySearchKey > 0)
        search_send_pv("search_v2|history_use");
    if(isHotSearchKey > 0)
        search_send_pv("search_v2|hot_use");
    if(isUserSearchKey > 0)
        search_send_pv("search_v2|relation_use");
}
//地区搜索触发
function locationSearch(this_item)
{
    var locationType  = $(this_item).attr("name");
    if(locationType ==  "work") var location = 1;
    if(locationType ==  "love") var location = 9;
    if(locationType ==  "home") var location = 10;

    var locationValue = $(this_item).parent().find(".sf_text").val();
    if(locationValue.indexOf("不限") != -1)
    {
        pullMark(location);
    }
    else
    {
        var locationArr	  = locationValue.split(" ");
        //获得搜索地区数组
        if(locationArr.length > 0)
        {
            var locationSearch =  getEachLocation(locationArr);
        }
        if(locationSearch.length > 0)
        {
            pullMark(location);
            var locationStr =  locationSearch.join(".");
            pushMark(location,locationStr);
        }else{
            pullMark(location);
        }
        //return false;
    }
    //统计点击量
    search_send_pv("|search_v2|locationSearch|");
    searchResult('first','select');
}
function getEachLocation(locationArr)
{
    var locationSearch= [];
    var index = 0;

    var locationLength = locationArr.length;
    for(var i = 11; i<100 ;i++)
    {
        if(LSK[i] != undefined)
        {
            var locationIndex = getMatchLocation(LSK[i],locationArr);
            if( locationIndex != -1)
            {
                locationSearch[index] = i;
                locationArr.splice(locationIndex,1);
                index++;
                if(index == locationLength) return locationSearch;
            }
        }

    }
    for(var i = 11; i<100 ;i++)
    {
        if(LSK[i] != undefined)
        {
            var province_id = i*100;
            if(LSK[i] != undefined)
            {
                for(var j = 1 ; j< 41; j++)
                {
                    var sublocationIndex = getMatchLocation(LOK[i][province_id+j],locationArr);
                    if(sublocationIndex != -1)
                    {
                        locationSearch[index] = i*100+j;
                        locationArr.splice(sublocationIndex,1);
                        index++;
                        if(index == locationLength) return locationSearch;
                    }
                }
            }
        }
    }
    return locationSearch;
}
function getMatchLocation(locationValue,locationArr)
{
    if(locationArr.length > 0)
    {
        for(var m=0;m<locationArr.length;m++)
        {
            if(locationValue == trim(locationArr[m]))
            {
                return m;
            }
        }
    }
    return -1;
}
function batchHelloCallBack()
{
    //初始化清理
    $("#show_this_page").attr("checked", false);
    $("#select_num").text(0);
    $(".say_hello_userId_list").val('');
    $(".say_hello_userId_list_cache").val('');
    //重置会员状态
    $("#normal_user_container").find("li .dzh").each(function(){
        if($(this).attr("foo") == 1)
        {
            $(this).parent().parent().removeClass("hy_box_add2");
            $(this).removeClass("dzh_add2").attr("foo",0);
            $(this).find("span").css("display","none");
            $(this).children(".dzh_text4").css("display","block");
        }
    });
    //重置推荐会员状态
    $(".hiddenRecommend").find(".dzh").each(function(){
        if($(this).attr("foo") == 1)
        {
            $(this).parent().parent().removeClass("hy_box_add2");
            $(this).removeClass("dzh_add2").attr("foo",0);
            $(this).find("span").css("display","none");
            $(this).children(".dzh_text4").css("display","block");
        }
    });
}
//锚点滚动
function scrollAnchor(id){
    var scroll_anchor =  $(".singleFilter").val();
    if(scroll_anchor == "on")
    {
        fixed_anchor(id);
        $(".singleFilter").val("off");
    }
}
//face++显示
function show_face_jump(o,from){
    var img = $(o).find('img').attr('src');
    if($("#batch_hello").is(":hidden") && from != 11) return true;
    var reg = /global\/i\/(zwzp|xyaqmm|xjhykj|xxzgxz|yzphykj|zchykj)/;
    if(reg.test(img)) return true;
    $(o).find('.search_sameUser').show();
}
function hide_face_jump(o){
    $(o).find('.search_sameUser').hide();
}

$(document).ready(function(){

    var sex	         = trim($(".selectedSex").val());
    var	keyDefault 	 = sex == "f" ? fKeyDefault : mKeyDefault;
    init_show();
    back_to_nick();
    nick_init();
    vip_users();
    //关闭 title 有昵称和没有昵称之分
    if($('#s_nick').val() != ''){
        var close_title =  '点击"x"退出昵称搜索'
    }else{
        var close_title =  '点击"x"取消此项限制'
    }
    $('.JY-close').each(function(){
        $(this).attr('title',close_title);
    });
    //初始化查询
    getSearchResult("ini");
    //性别选择标签
    /* 2013-12-2改
    $("#sex_select li").bind('click', function() {
        var sex_str = $(this).text();
        var sex_val = sex_str == "男朋友" ? "m"  :  "f";
        $(this).parent().find("li").removeAttr("class");
        $(this).addClass("cur");
        $(this).parent().find("input").val(sex_val);
        window.location.href="./index.php?sex="+sex_val;
        return false;
    });
    */
    
    //搜索框tip显示隐藏
    $(".keyword").focus(function(){
        $(this).css("color","black");
        var keywordFocus = $(this).val();
        if(keywordFocus == keyDefault ){
            $(this).val('');
            $("#search_drop_down").show();
        }else if(keywordFocus == ''){
            $("#search_drop_down").show();
        }else {
            delayGetSearchDown();
        }
    }).keyup(function(e){
            var key = (window.event) ? e.which : e.keyCode;
            if (key == 38 || key == 40)
            {
                return ;
            }
            delayGetSearchDown();
            if (key == 13)
            {
                return ;
            }
        }).blur(function(){
            $(this).css("color","black");
            var keywordNow = $(".keyword").val();
            if(keywordNow == ''){
                $(this).css("color","");
                $(this).val(keyDefault);
            }else
            {
                $(".keyword").val(trim(keywordNow));
            }
        }).keydown(function(e){
            var key =  (window.event) ? e.which : e.keyCode;
            if(key == 38){
                if($("#search_user").is(":visible"))
                    $("#search_user dd").eq(getIndexUp("user")).addClass("cur");
                else if($("#search_history").is(":visible") && $("#search_hot").is(":visible"))
                {
                    var findHotCur 		= $("#search_hot dd").index($("#search_hot dd").filter(".cur"));
                    var findHistoryCur  = $("#search_history dd").index($("#search_history dd").filter(".cur"));
                    if(findHistoryCur == 0 && findHotCur == -1)
                    {
                        $("#search_history dd").eq(0).removeClass("cur");
                        $("#search_hot dd").eq(getIndexUp("hot")).addClass("cur");
                    }
                    else if(findHistoryCur == -1 && findHotCur == 0)
                    {
                        $("#search_hot dd").eq(0).removeClass("cur");
                        $("#search_history dd").eq(getIndexUp("history")).addClass("cur");
                    }
                    else if(findHistoryCur == -1)
                        $("#search_hot dd").eq(getIndexUp("hot")).addClass("cur");
                    else if(findHotCur == -1)
                        $("#search_history dd").eq(getIndexUp("history")).addClass("cur");
                }
                else if(($("#search_history").is(":hidden")|| $("#search_history").length == 0 ) && $("#search_hot").is(":visible"))
                    $("#search_hot dd").eq(getIndexUp("hot")).addClass("cur");
                return ;
            }
            if(key == 40){
                if($("#search_user").is(":visible"))
                    $("#search_user dd").eq(getIndexDown("user")).addClass("cur");
                else if($("#search_history").is(":visible") && $("#search_hot").is(":visible"))
                {
                    var findHotCur 		= $("#search_hot dd").index($("#search_hot dd").filter(".cur"));
                    var findHistoryCur  = $("#search_history dd").index($("#search_history dd").filter(".cur"));

                    if(findHistoryCur == -1 && findHotCur == $("#search_hot dd").length-1)
                    {
                        $("#search_hot dd").eq($("#search_hot dd").length-1).removeClass("cur");
                        $("#search_history dd").eq(getIndexDown("history")).addClass("cur");
                    }
                    else if(findHotCur == -1 && findHistoryCur == $("#search_history dd").length-1)
                    {
                        $("#search_history dd").eq($("#search_history dd").length-1).removeClass("cur");
                        $("#search_hot dd").eq(getIndexDown("hot")).addClass("cur");
                    }
                    else if (findHotCur == -1)
                    {
                        $("#search_history dd").eq( getIndexDown("history")).addClass("cur");
                    }
                    else if (findHistoryCur == -1)
                    {
                        $("#search_hot dd").eq( getIndexDown("hot")).addClass("cur");
                    }
                }
                else if(($("#search_history").is(":hidden") || $("#search_history").length == 0 ) && $("#search_hot").is(":visible"))
                    $("#search_hot dd").eq(getIndexDown("hot")).addClass("cur");
                return ;
            }
            if(key == 13)
            {
                //统计
                statisticsComplete();
                searchResult('first','search');
            }
        });

    //新加搜索下拉框效果
    $("#search_drop_down dt").bind("click",function(){
        $("#search_drop_down").hide();
    });
    $("#search_history_remove").click(function(){
        $("#search_history").hide();
        $("#search_hot").css("background","none");
        var sex	  = trim($(".selectedSex").val());
        if(sex == "f" || sex == "m")
        {
            var cookieHistory = "skhistory_"+sex;
            delHistoryCookie(cookieHistory,'',-10);
        }
        //统计清除历史记录使用量
        search_send_pv("search_v2|clear_use");

        $(".keyword").focus();

    }).hover(function(){
            $(this).addClass("cur");
            $("#search_drop_down dt").unbind("click");
        },function(){
            $(this).removeClass("cur");
            $("#search_drop_down dt").bind("click",function(){
                $("#search_drop_down").hide();
            });
        });
    $(".search_i").hover(function(){
        $("body").unbind("click");
    },function(){
        $("body").bind("click",function(){
            $("#search_drop_down").hide();
        });
    });
    //阻止事件冒泡
    $(".hy_box a").click(function(event){
        event.stopPropagation();
    });
    $("#batch_hello").click(function(){
        if($('#is_login').val() == 0){
            loginWindowPop();
            return true;
        }
        var self_sex = $('#user_sex').val();
        var sel_sex = $('.selectedSex').val();
        if(self_sex == sel_sex){
            search_v2_alert("抱歉！世纪佳缘只提供异性间的交友服务，您不能给同性会员发信，请联系其他会员。");
            return false;
        }
        is_bl_hello = true;
        //阻止无会员条件下批量打招呼的触发
        var userListCount = $("#normal_user_container").find("li").length;
        if(userListCount == 0)
        {
            search_v2_alert("30天登录的会员中没有符合条件的会员，请重新选择!");
            return false;
        }
        fixed_anchor("new_header_scroll");
        $(".dzh span").css("display","none");
        $('.szh span').css("display","none");
        $(".dzh_text4").css("display","block");

        $(".user_list li").addClass("show_gray");

        $(".dzh").addClass("dzh_add");


        if( $('.songxique').length > 0 ){

            $('.songxique').removeClass('dzh dzh_add');

        }



        batchClickShow($(this),$("#new_batch_header"),$("#normal_user_container"));//显示批量打招呼头部
        batchFixed($(window),$("#new_batch_header"),$("#new_header_scroll"),"batchfix");//批量打招呼头部位置固定
        
        //推荐联系人切换模式
        $(".showRecommend").hide();
        $(".hiddenRecommend").show();

        //右侧聚光灯定位
        //setTimeout(function () {oSide_space.css({height: tmp +  50})}, 10);

        //统计批量打招呼按钮点击量
        search_send_pv("search_v2|pl_modelbtn");
        
        $(".JY-select").hide();
        $("#JY-more").parent().show();
        synchronizationHeight();//同步右侧高度

    }).hover(function(){
            $(this).addClass("batch_hello_a");
        },function(){
            $(this).removeClass("batch_hello_a");
        });
    $("#exit_pl").click(function(){
        batchHidden($("#batch_hello"),$("#new_batch_header"),$("#normal_user_container"));//隐藏批量打招呼头部
        Deselect($("#show_selected"),$("#normal_user_container"),"all");//取消选择
        $(".user_list li").removeClass("show_gray");
        $(".dzh").removeClass("dzh_add dzh_add2");
        $(".hy_box").removeClass("hy_box_add hy_box_add2");
        $("#show_this_page").attr("checked", false);
        $(".dzh").removeAttr("foo");
        $("#new_header_scroll").height(0).css("margin-bottom",0);
        $(".dzh").find("span").hide();
        $(".dzh_text1").css("display","inline-block");
        is_bl_hello = false;
        //统计退出点击量
        search_send_pv("search_v2|pl_exit");

        //判断是否有 送喜鹊按钮
        if( $('.xique').length>0 ){
            $('.xique').css("display","inline-block");
        }

        //右侧聚光灯定位
        //setTimeout(function () {oSide_space.css({height: tmp - 50})}, 10);
        
        synchronizationHeight();//同步右侧高度
        return false;
    });
    $("#show_this_page").click(function(){
        if($(this).attr("checked"))
        {
            if(limitHelloUserCount(30) == 1)
            {
                new_show_dzh_2($(".dzh"));
                new_show_dzh_1($(".dzh"));
                var page = $("#pageCache").val();
                //重置当前页的选中项
                moveRecUser(page);
                moveRecUser(0);
            }
            //统计全选中点击量
            search_send_pv("search_v2|pl_fullselect");
        }else{
            new_show_dzh_2($(".dzh"));
            //统计反选点击量
            search_send_pv("search_v2|pl_notselect");
        }
        countChecked();
    });
    $(window).scroll(function(){
        batchFixed($(this),$("#new_batch_header"),$("#new_header_scroll"),"batchfix");//批量打招呼头部位置固定
    });
    $("#show_selected").click(function(){
        noSelect($(this),$("#normal_user_container"),$("#new_header_scroll"));//只显示选择
    });
    $("#new_deselect").click(function(){
        Deselect($("#show_selected"),$("#normal_user_container"));//取消选择
        return false;
    });
    //保存搜索条件
    // var searchSaveDefault = "请为本组搜索条件起个名字";
    $(".searchSave").focus(function(){
        if($(this).val() == savaTagDefault ){
            $(this).val('');
        }
    }).blur(function(){
            if( $(".searchSave").val() == ''){
                $(this).val(savaTagDefault);
            }
        });
    //排列方式new
    $(".JY-fs a").bind('click',function(){
        var styleName = $(this).attr("name");
        var nowStyle  = $("#listStyle").val();
        if(nowStyle == "bigPhoto" && $("#batch_hello").is(":hidden") && sys_hidden_batch =="0" ){
            search_v2_alert("批量打招呼模式不支持列表方式！");
            return false;
        }
        var sex = trim($(".selectedSex").val());
        if(nowStyle != styleName){
            var changeStyle = nowStyle== "list" ? "bigPhoto" : "list";
            $("#listStyle").val(changeStyle);
            //排列方式统计和批量打招呼
            if(changeStyle == "bigPhoto"){
                //显示批量打招呼                
				if(sys_hidden_batch == "1") {
					_hidden_batch();
				} else {					
					$("#batch_hello").css("display","block");
				}
                search_send_pv("|search_v2|"+sex+"|bigPhoto");
            }else if(changeStyle == "list")
            {
                //隐藏批量打招呼
                $("#batch_hello").css("display","none");
                $("#batch_hello_gray").css("display","none");

                search_send_pv("|search_v2|"+sex+"|list");
            }
            //加样式如cookie
            setCookie('listStyle',changeStyle,365);
            getSearchResult("first","select");
        }
    })
    //热门标签
    $(".hotTag").bind("click",function(){
        var hotTag = $(this).text();
        $(".keyword").val(hotTag);
        searchResult("first","search");
    })
    //选中标签事件
    $(".item>input").bind("click",function(){
        if($(this).attr("checked") == "checked")
        {
            $(this).parent().find("a").css("color","#F03B85");
        }else{
            $(this).parent().find("a").css("color","");
        }
    })
    //标签退出回滚
    $(".closeItem").bind("click",function(){
        var click_div_id = $(this).parent().attr("id");
        $("#"+click_div_id).find(".item>input").removeAttr("checked");
        $("#"+click_div_id).find(".item>a").css("color",'');
    })
    /*搜索标签保存*/
    //添加搜索标签
    $(".btn_save").bind("click",function(){
        var keyword	    = $(".keyword").val() == keyDefault ? '' : encodeURIComponent($(".keyword").val());
        var updateSearchTagId = $(".hiddenSearchTagId").val() ;
        var searchTagId 	= updateSearchTagId > 0 ? updateSearchTagId : 0;
        var tipStr      	= updateSearchTagId > 0 ? "修改搜索条件成功！" : "保存搜索条件成功！";
        var selectedMark   = $('#selectedMark').val();

        var orderType 		= $(".sortName").val();
        var orderValue 	= 1;
        var type 	        = $("#listStyle").val();
        var search_name    = $(".btn_save").prev().val();
        if(search_name == "" || search_name == savaTagDefault)
        {
            search_v2_alert("请输入正确搜索条件的名称");
            return false;
        }
        var search_content = URLencode(selectedMark+",listStyle:"+type);
        $.ajax({
            url : 'ajaxSeparate.php',
            data : {'sTId':searchTagId,'stk':keyword,'stc':search_content,'sTName':search_name,'sn':orderType,'sv':orderValue,'f':'addSearchTag','p':1},
            type : 'get',
            success : function(response){
                var jsonRes = eval('('+response+')');
                if(jsonRes == null)return false;
                var tagId  = jsonRes.result;
                if(parseInt(tagId) > 0)
                {
                    $(".saveSelect").removeClass("on");
                    $("#checkbox_save").removeAttr("checked");
                    $(".searchSave").val(savaTagDefault);
                    //重置更新标志位为初始状态
                    $(".hiddenSearchTagId").val('0');
                    search_v2_alert(tipStr);
                }
            }
        })
        //标签保存统计
        var sex	        = trim($(".selectedSex").val());
        search_send_pv("|search_v2|"+sex+"|save_tag");
    })
    $(".arrow2").bind("hover",function(){
        $.ajax({
            url : 'ajaxSeparate.php',
            data : {'f':"iniSearchTag"},
            type : 'get',
            success : function(response){
                var jsonRes = eval('('+response+')');
                if(jsonRes == null)return false;
                var data = jsonRes.searchTagInfo;
                var count = jsonRes.count;
                var innerHtml = "";
                if(parseInt(count) > 0)
                {
                    for(var i=0;i<data.length;i++)
                    {
                        var search_tag_keyword = data[i].search_tag_keyword == false ? '' : encodeURIComponent(data[i].search_tag_keyword);
                        var search_tag_content = data[i].search_tag_content == false ? '' : data[i].search_tag_content;
                        var sex	       		   = trim($(".selectedSex").val());
                        innerHtml += "<p><span class='fn-left'>"+data[i].search_tag_name+"</span><span class='fn-right'><input type='hidden' name='search_tag_input' class='search_tag_input' value="+data[i].id+" /><a href='index.php?sTId="+data[i].id+"&stk="+search_tag_keyword+"&stc="+search_tag_content+"&f=directSearch' onclick='saveTagClickCount(\""+sex+"\",\"directSearch\")'  class='f_12 a_blue a_line searchTag'>直接搜索</a>|<a href='index.php?sTId="+data[i].id+"&stk="+search_tag_keyword+"&sTName="+data[i].search_tag_name+"&stc="+search_tag_content+"&f=updateSearchTag' onclick='saveTagClickCount(\""+sex+"\",\"updateSearch\")' class='f_12 a_blue a_line updateSearchTag'>修改</a>|<a href='javascript:void(0);' onclick='removeSearchTag(this,"+data[i].id+")' class='f_12 a_blue a_line reomoveSearchTag'>删除</a></span></p>";
                    }
                }
                else
                {
                    innerHtml += "<span>暂时你没有保存搜索条件</span>";
                }
                innerHtml += "<div class='line'></div>";
                $(".popbox2").children().remove();
                $(".popbox2").append(innerHtml);
            }
        })
    })
    /*DOM载入完成后自动加载部分*/
    //更新保存条件
    var sTName= $(".searchSave").val();
    if(sTName != savaTagDefault)
    {
        $(".JY-bb-t label").click();
        $(".JY-bb-t label").parent().addClass("hov");
        $('.JY-bb-con').show();
    }

    //户口籍贯民族信仰的隐藏
    var love_hidden 		= $("#love_hidden").val();
    var home_hidden 		= $("#home_hidden").val();
    if(love_hidden > 0 && home_hidden > 0)
    {
        $("#li6").remove();
    }

    window.onload = function() {
        //滚动锚点
        scrollAnchor("jy-filter-main");

        var guider_quick_search_cache = getCookie("guider_quick_search");
        //search_v2_alert("a"+guider_quick_search_cache);
        if(guider_quick_search_cache == null)
            setCookie('guider_quick_search','on',365);
        //统计推荐部分人数人次
        // var hiddenRecommendUserId = $(".hiddenRecommendUserId").val();
        // search_send_pv("search_v2|dispRecUid|"+hiddenRecommendUserId);

        //UV统计
        var sessionId = getCookie("PHPSESSID");
        search_send_pv('search_v2_uv|'+sessionId);
    }
    //二级搜索的cookie
    //一级加减收放

    //wlf 增加右侧优化
    var oSide_space = $('#side_space'),
        oShowType = $('#showType'),
        oMixedTyp = $('.mixedType'),
        oBatch_hello = $('#batch_hello'),
        oExit_pl = $('#exit_pl'),
        oMascot = oSide_space.find('.mascot').eq(0),
        iSpace = function (){
            var s1 = $('#tipContent').get(0).children.length ? 58 : 0;
            return s1 + $('#new_header_scroll').height() + parseInt($('#new_header_scroll').css('marginBottom'));
        },
        isMixedTypShow = function (){
            return  oMixedTyp.css('display') == 'block' ? 1 : 0
        },
        tmp = 0;
    var side_default = {
        min_height : 107,         //默认高度
        showMascot : 300
    };

    //获取类别高度
    function getTypeHeight (obj){
        if(oMixedTyp.css('display') == 'none'){
            return 0
        }else{
            return parseInt(obj.height());
        }
    }

    oldHeight = getTypeHeight(oMixedTyp);

    function setSide(iSpace){

        var newHeight = getTypeHeight(oMixedTyp) + iSpace;
        var oSideHeight = newHeight - oldHeight + side_default.min_height;

        oSide_space.css({height : oSideHeight});

        if(parseInt(oSide_space.css('height')) <= side_default.showMascot){
            oMascot.hide();
        }else{
            oMascot.show();
        }
    }

    if(isMixedTypShow()){
        //setSide(iSpace() + getTypeHeight(oMixedTyp) + 17);
    }else{
        //setSide(iSpace());
    }

    oBatch_hello.bind('mouseenter', function (){
        tmp = parseInt(oSide_space.css('height'));
    });

    oExit_pl.bind('mouseenter', function (){
        tmp = parseInt(oSide_space.css('height'));
    });

    $("#showType").bind("click",function(){
        var sex	        	= trim($(".selectedSex").val());
        var showTypeValue  	= getCookie('showType');
        if(showTypeValue == null)
        {
            //默认为收起状态
            setCookie('showType',"down",0);
            oMixedTyp.show();
            $(this).addClass('jian').removeClass('jia');
            search_send_pv("|search_v2|"+sex+"|jia");
            oldHeight = getTypeHeight(oMixedTyp);
            if(isMixedTypShow()){
                //setSide(iSpace() + getTypeHeight(oMixedTyp) + 17);
            }else{
                //setSide(iSpace() + 17);
            }

        }else if(showTypeValue == "up")
        {
            setCookie('showType','down',0);
            oMixedTyp.show();
            $(this).addClass('jian').removeClass('jia');
            //统计加操作
            search_send_pv("|search_v2|"+sex+"|jia");
            oldHeight = getTypeHeight(oMixedTyp);
            if(isMixedTypShow()){
                //setSide(iSpace() + getTypeHeight(oMixedTyp) + 17);
            }else{
                //setSide(iSpace() + 17);
            }
        }else if(showTypeValue == "down")
        {
            setCookie('showType',"up",0);
            oMixedTyp.hide();
            $(this).addClass('jia').removeClass('jian');
            //统计减操作
            search_send_pv("|search_v2|"+sex+"|jian");
            oldHeight = getTypeHeight(oMixedTyp);
            //setSide(iSpace());
        }
        //tip 的引导展示
        if($("#tips_3").css("display") == "none")
        {
            hideTip('tips_1');
            $("#tips_3").removeClass("displayNone");
        }else
        {
            hideTip('tips_3');
        }
    });

    $('.mixedType ul li img').each(function (index, ele){
        $('.mixedType').delegate('img', 'mouseenter', function (){
            oldHeight = parseInt(oMixedTyp.css('height'));
            tmp = parseInt(oSide_space.css('height'));
        });

        $(this).bind('click', function (){
            setTimeout(function(){oSide_space.css({height: getTypeHeight(oMixedTyp) - oldHeight + tmp})},10)
        })
    });

    $('.closeItem').each(function (index, ele){
        $('.mixedType').delegate('.closeItem', 'mouseenter', function (){
            oldHeight = parseInt(oMixedTyp.css('height'));
            tmp = parseInt(oSide_space.css('height'));
        });
        $(this).bind('click', function (){
            setTimeout(function(){oSide_space.css({height: getTypeHeight(oMixedTyp) - oldHeight + tmp})},10)
        })
    });

    $('.fixed a').each(function (index, ele){
        $('.mixedType').delegate('.fixed a', 'mouseenter', function (){
            oldHeight = parseInt(oMixedTyp.css('height'));
            tmp = parseInt(oSide_space.css('height'));
        });
        $(this).bind('click', function (){
            setTimeout(function(){oSide_space.css({height: getTypeHeight(oMixedTyp) - oldHeight + tmp})},10)
        })
    });

    //热门关键词换一组
    $("#hot_last").bind("click",function() {
        var sex	  		= trim($(".selectedSex").val());
        var randHotTag 	= "<dt>热门搜索词：</dt>";
        $.ajax({
            url : "ajaxSeparate.php",//从后台取得json数据
            type : "get",
            data : {"f":"randTag","sex":sex},
            success : function(response) {
                var data = eval('('+response+')');
                if(data == null)return false;
                for(var i=0 ; i< data.length;i++)
                {
                    randHotTag += "<dd><a class='hotTag' onclick='hotTagClick(this)' href='javascript:void(0);'>"+data[i]+"</a> </dd>";
                }
                $("#hot_last").parent().prevAll().remove();
                $("#hot_last").parent().before(randHotTag);
            }
        });
        //换一组使用量统计
        search_send_pv("search_v2|huanyizu");
    });

    //省份文本框
    $(".sf_text").focus(function(){
        if($(this).val() == ''){
            $(".shengfen_text").hide();
        }
    }).blur(function(){
            if($(this).val() == ''){
                $(".shengfen_text").show();
            }
        });
    $(".sf_button").hover(function(){
        $(this).addClass("cur");
    },function(){
        $(this).removeClass("cur");
    });
    //寻缘小秘籍
    $(".s_cheat_5 a").click(function(){
        $(".s_cheat").hide();
        $(".s_cheat_1").hide();
        $(".s_cheat_2").hide();
        setCookie('guider_quick_search','off',365);
        //统计点击量
        search_send_pv("|search_v2|guiderQuickSearch|");

        return false;
    });
    //排序
    $(".os_sel_new_a p").click(function(){
        $(".os_sel_new>p").text($(this).text());
        var sortNameSelect = $(this).attr("id").substr(5);
        var sortNameCache  = $(".sortName").val();
        $(".os_sel_new_a").hide();
        if(sortNameSelect != sortNameCache)
        {
            $(".sortName").val(sortNameSelect);
            //重新排序
            searchResult("first",'select');
        }

    });
    $(".os_sel_new_a").mouseover(function(){
        $(".os_sel_new p").removeClass('cur')
    });
    $(".os_sel_new").hover(function(){
        $(".os_sel_new_a").show();
    },function(){
        $(".os_sel_new_a").hide();
    });
})

//2014-1-10改（新搜索页-标签样式调整）
$(function(){
	
	$("#normal_user_container").delegate(".hy_box", "mouseover", function(){
		$(this).find(".set_top").width(110).children("span:last-child").show();	
	});
	$("#normal_user_container").delegate(".hy_box", "mouseout", function(){
		$(this).find(".set_top").width(37).children("span:last-child").hide();	
	});
	
	$(".user_list").delegate(".hy_box", "mouseover", function(){
		$(this).find(".icon_ju").css({"backgroundPosition":"0 -33px","textIndent":0});	
	});
	$(".user_list").delegate(".hy_box", "mouseout", function(){
		$(this).find(".icon_ju").css({"backgroundPosition":"0 0","textIndent":"-999em"});	
	});
	
	$("#note_user_container").delegate("li", "mouseover", function(){
		$(this).find(".set_top").width(110).children("span:last-child").show();
	});
	
	$("#note_user_container").delegate("li", "mouseout", function(){
		$(this).find(".set_top").width(37).children("span:last-child").hide();
	});

});





//2013-12-2新加
$(function(){

    //顶部搜索框
    $("#sex_select").on("click", "li", function(){
        $(this).addClass("cur").siblings("li").removeClass("cur");
    });

    //点击页面隐藏弹层
    $("body").bind("click", function(){
        $(".JY-sp").hide().parent().removeClass("JY-cur");
        $(".JY-id-con").hide().prev().removeClass("hov");
        $(".JY-bc-con").hide().prev().removeClass("hov");
    });

    //鼠标经过取消事件
    $(".JY-id").hover(function(){
        $("body").unbind("click");
    }, function(){
        $("body").bind("click", function(){
            $(".JY-id-con").hide().prev().removeClass("hov");
        });
    });
    $(".JY-bc").hover(function(){
        $("body").unbind("click");
    }, function(){
        $("body").bind("click", function(){
            $(".JY-bc-con").hide().prev().removeClass("hov");
        });
    });
    
    
    $(".JY-id-con dl.iese1 select").click(function(e){
    	e.stopPropagation();
    });

    //鼠标经过更多选择
    $(".JY-sc").delegate(".JY-item", "mouseover", function(){
        if(!$(this).hasClass("JY-cur")){
            $(this).addClass("JY-hov");
        }
        $("body").unbind("click");
    });
    $(".JY-sc").delegate(".JY-item", "mouseout", function(){
        $(this).removeClass("JY-hov");
        $("body").bind("click", function(){
            $(".JY-sp").hide().parent().removeClass("JY-cur");
        });
    });

    //选择弹层
    $(".JY-item").live("click", function(){
        $(".JY-item").removeClass("JY-cur");
        if($(this).hasClass('JY-hov')){
            var dataType = $(this).find('button').attr('info');
            search_send_pv(dataType,'hov');
        }
        $(this).addClass("JY-cur").removeClass("JY-hov");
        $(this).siblings("div").find(".JY-sp").hide();
        $(this).parents("dl").siblings("dl").find(".JY-sp").hide();
        $(this).find(".JY-sp").show();

        //2015/6/25 解决ie6下hover 变宽bug;
        var ie6=!-[1,]&&!window.XMLHttpRequest;
        if( ie6 ){
             var w = $(this).find(".JY-sp").width();
             var dataFlag = $(this).find(".JY-sp").attr('data-flag',true);
             if( !!dataFlag ){

                $(this).find(".JY-sp").css({
                    'width' : w
                });   
                
                $(this).find(".JY-sp").attr('data-flag',false); 
            }
        }
        
    });

    //地区连动
    $("select[name='dq-Province']").live("change", function(){
        addressLink($(this), $("select[name='dq-City']"));
    });
    //户口地区连动
    $("select[name='hkdq-Province']").live("change", function(){
        addressLink($(this), $("select[name='hkdq-City']"));
    });
    //籍贯
    $("select[name='jg-Province']").live("change", function(){
        addressLink($(this), $("select[name='jg-City']"));
    });
    //用佳缘ID/昵称搜索地区连动
    $("select[name='id-Province']").live("change", function(){
        addressLink($(this), $("select[name='id-City']"));
    });

    //年龄
    $("select[name='age1']").live("change", function(){
        var val1 = $(this).val(),
            val2 = $("select[name='age2']").val();
        $("select[name='age2']").empty().append(ageLink(val1));
        if( val1 <= val2 ){
            $("select[name='age2'] option[value=" + val2 + "]").attr("selected","selected");
        }
    });
    //用佳缘ID/昵称搜索年龄
    $("select[name='id-age1']").change(function(){
        var val1 = $(this).val(),
            val2 = $("select[name='id-age2']").val();
        $("select[name='id-age2']").empty().append(ageLink(val1));
        if( val1 <= val2 ){
            $("select[name='id-age2'] option[value=" + val2 + "]").attr("selected","selected");
        }
    });

    //年龄对应生肖
    $("select[name='age1'],select[name='age2']").live("change", function(){
        $("#zodiac").empty().append(zodiac());
    });

    //身高
    $("select[name='height1']").live("change", function(){
        var val1 = $(this).val(),
            val2 = $("select[name='height2']").val();
        $("select[name='height2']").empty().append(heightLink(val1));
        if( val1 <= val2 ){
            $("select[name='height2'] option[value=" + val2 + "]").attr("selected","selected");
        }
    });

    //确定按钮鼠标经过效果
    $(".JY-sc dl dd").delegate(".JY-sp-b", "mouseover", function(){
        $(this).addClass("hov");
    });
    $(".JY-sc dl dd").delegate(".JY-sp-b", "mouseout", function(){
        $(this).removeClass("hov");
    });
    //已选择确定按钮
    $(".JY-selected-list").on("click", ".JY-sp-b", function(){
        //var dataType = $(this).parents(".JY-item").attr("data-type");
        var dataType = $(this).attr('info');
        //关键字直接搜
        if(dataType == 'key' && searchItemKey()){
            return true;
        }
        if(dataType == 'nc'){
            nickSearchItem();
        }else{
            $(this).parents(".JY-item").find(".JY-title-val").text(confirmSelect($(this), dataType));
            $(this).parent().hide().parent().removeClass("JY-cur");
            if(dataType != 'key'){
                search_send_pv(dataType,'new');
                selectResult('selected_btn');
            }
        }
        return false;
    });
    //已选择删除
    $(".JY-selected-list").delegate(".JY-close", "mouseover", function(){
        $(this).addClass("hov");
    });
    $(".JY-selected-list").delegate(".JY-close", "mouseout", function(){
        $(this).removeClass("hov");
    });
    $(".JY-selected-list").delegate(".JY-close", "click", function(){
        var par = $(this).parent(),
            index = parseInt(par.attr("data-index")),
            dataType = par.attr("data-type");
        if(index == 0){
            $('.keyword').val('');
            par.remove();
            searchResult("first","select");
            return true;
        }
        par.removeClass("JY-cur JY-hov").find(".JY-title-val").text(closeSelect(dataType));
        $(this).next().hide();
        if(dataType === 'sx' || dataType === 'xz'){
            $(this).next().find("input[type='checkbox']").attr("checked", false);
        }
        var pHtml = par.clone();
        par.remove();
        $(".JY-select-list .JY-item").each(function(){
            var curIndex = parseInt($(this).attr("data-index"));
            if( curIndex > index){
                $(this).before(pHtml);
                return false;
            }else{
                $(".JY-select-list").append(pHtml);
            }
        });
        synchronizationHeight();//同步右侧高度
        //deleteResult(dataType);
        return false;
    });
    //更多选择确定按钮
    $(".JY-select-list").delegate(".JY-sp-b", "click", function(){
        var par = $(this).parents(".JY-item"),
            index = parseInt(par.attr("data-index")),
            dataType = par.attr("data-type");
        if(dataType === 'sx' || dataType === 'xz'){
            if($(this).prev().find("input:checked").length <= 0){
                $(this).parent().hide();
                par.removeClass("JY-cur")
                return false;
            }
        }
        par.removeClass("JY-cur").find(".JY-title-val").text(confirmSelect($(this), dataType,'sel'));
        $(this).parent().find("select option:selected").attr("selected","selected");
        $(this).parent().hide();
        var pHtml = par.clone();
        par.remove();
        //把照片放到最后一个
        var zpHtml = '';
        var zpDiv = $(".JY-selected-list").find('#ihasPhoto');
        if(parseInt(zpDiv.attr('info')) == 23){
            zpHtml = zpDiv.clone();
            zpDiv.remove();
        }
        //end
        $(".JY-selected-list").append(pHtml);
        $(".JY-selected-list").append(zpHtml);
        synchronizationHeight();//同步右侧高度
        search_send_pv(dataType,'new');
        selectResult();
        return false;
    });

    //设置更多条件
    $("#JY-more").click(function(){
        $(this).parent().hide();
        $(".JY-select").show();
        $('#more_tag').val('d');
        search_send_pv('more','new');
        synchronizationHeight();//同步右侧高度
        return false;
    });

    //收起
    $("#JY-collapse").click(function(){
        $(".JY-select").hide();
        $("#JY-more").parent().show();
        $('#more_tag').val('u');
        search_send_pv('less','new');
        synchronizationHeight();//同步右侧高度
        return false;
    });

    //
    $(".JY-filter-2 a").click(function(){
        $(this).addClass("cur").siblings("a").removeClass("cur");
        return false;
    });

    //用佳缘ID/昵称搜索
    $(".JY-id span.t").click(function(){
        if($(".JY-id-con").is(":hidden")){
            search_send_pv('cnick','new');
            $(this).addClass("hov");
            $(".JY-id-con").show();
        }else{
            $(this).removeClass("hov");
            $(".JY-id-con").hide();
        }
    });

    //我保存的条件
    $(".JY-bc span").click(function(){
        //隐藏保存条件
        $(".JY-bb-t label").find('input').attr('checked',false);
        $(".JY-bb-t label").parent().removeClass("hov");
        $(".JY-bb-con").hide();
        if($(".JY-bc-con").is(":hidden")){
            $(this).addClass("hov");
            search_send_pv('getsave','new');
            getSaveTag();
            $(".JY-bc-con").show();
        }else{
            $(this).removeClass("hov");
            $(".JY-bc-con").hide();
        }
    });
    function getSaveTag(){
        $.ajax({
            url : 'ajaxSeparate.php',
            data : {'f':"iniSearchTag"},
            type : 'get',
            success : function(response){
                var jsonRes = eval('('+response+')');
                if(jsonRes == null)return false;
                var data = jsonRes.searchTagInfo;
                var count = jsonRes.count;
                var innerHtml = "";
                if(parseInt(count) > 0)
                {
                    for(var i=0;i<data.length;i++)
                    {
                        var search_tag_keyword = data[i].search_tag_keyword == false ? '' : encodeURIComponent(data[i].search_tag_keyword);
                        var search_tag_content = data[i].search_tag_content == false ? '' : data[i].search_tag_content;
                        var sex                = trim($(".selectedSex").val());
                        innerHtml += '<p class="JY-ssl clear"> <span class="l">'+data[i].search_tag_name+'</span><input type="hidden" name="search_tag_input" class="search_tag_input" value='+data[i].id+' /> <a href="javascript:void(0);" onclick="removeSearchTagNew(this,'+data[i].id+')">删除</a><span class="r">|</span> <a href="index.php?sTId='+data[i].id+'&stk='+search_tag_keyword+'&sTName='+data[i].search_tag_name+'&stc='+search_tag_content+'&f=updateSearchTag" onclick="saveTagClickCount(\'+sex+"\',\'updateSearch\')">修改</a> <span class="r">|</span> <a href="index.php?sTId='+data[i].id+'&stk='+search_tag_keyword+'&stc='+search_tag_content+'&f=directSearch" onclick="saveTagClickCount(\''+sex+'\',\'directSearch\')">直接搜索</a> </p>'; }
                }
                else
                {
                    innerHtml += "<p>暂时你没有保存搜索条件</p>";
                }
                innerHtml += "<div class='line'></div>";
                $("#save_tag_list").html('');
                $("#save_tag_list").html(innerHtml);
            }
        })
    }
    //添加搜索标签
    $("#btn_save").bind("click",function(){
        var keyDefault = '请输入要搜索的条件';
        var keyword     = $(".keyword").val() == keyDefault ? '' : encodeURIComponent($(".keyword").val());
        var updateSearchTagId = $(".hiddenSearchTagId").val() ;
        var searchTagId     = updateSearchTagId > 0 ? updateSearchTagId : 0;
        var tipStr          = updateSearchTagId > 0 ? "修改搜索条件成功！" : "保存搜索条件成功！";
        var selectedMark   = $('#selectedMark').val();
        var orderType       = $(".sortName").val();
        var orderValue  = 1;
        var type            = $("#listStyle").val();
        var search_name    = $("#btn_save").prev().val();
        search_name = delHtmlTag(search_name);
        if(search_name == "" || search_name == savaTagDefault)
        {
            search_v2_alert("请输入搜索条件的名称");
            return false;
        }
        var search_content = URLencode(selectedMark+",listStyle:"+type);
        $.ajax({
            url : 'ajaxSeparate.php',
            data : {'sTId':searchTagId,'stk':keyword,'stc':search_content,'sTName':search_name,'sn':orderType,'sv':orderValue,'f':'addSearchTag','p':1},
            type : 'get',
            success : function(response){
                var jsonRes = eval('('+response+')');
                if(jsonRes == null)return false;
                var tagId  = jsonRes.result;
                if(parseInt(tagId) > 0)
                {
                    //保存搜索条件
                    $(".JY-bb-t label").find("input").attr('checked',false);
                    $(".JY-bb-t label").parent().removeClass("hov");
                    $(".JY-bb-con").hide();
                    $(".saveSelect").removeClass("on");
                    $("#checkbox_save").removeAttr("checked");
                    $(".searchSave").val(savaTagDefault);
                    //重置更新标志位为初始状态
                    $(".hiddenSearchTagId").val('0');
                    search_v2_alert(tipStr);
                }
            }
        })
        //标签保存统计
        var sex         = trim($(".selectedSex").val());
        search_send_pv("savebtn",'new');
    })
    //保存搜索条件
    $(".JY-bb-t label").click(function(){
        //隐藏我的条件
        $(".JY-bc span").removeClass("hov");
        $(".JY-bc-con").hide();
        if($(this).find("input").is(":checked")){
            search_send_pv('tosave','new');
            $(this).parent().addClass("hov");
            $(".JY-bb-con").show();
        }else{
            $(this).parent().removeClass("hov");
            $(".JY-bb-con").hide();
            $(".searchSave").val(savaTagDefault);
            //重置更新标志位为初始状态
            $(".hiddenSearchTagId").val('0');
        }
    });
    $(".JY-bb-con button").hover(function(){
        $(this).addClass("hov");
    },function(){
        $(this).removeClass("hov");
    });

    //特殊字符点击这里
    $("#clickhere").click(function(){
        $(".JY-clh-c").show();
        return false;
    });
    $(".JY-clh-c a").click(function(){
        var _val = $(this).text(),
            oldv = $(".JY-id-3 input").val() == "请输入佳缘昵称" ? "" : $(".JY-id-3 input").val();
        $(".JY-id-3 input").val(oldv + " " + _val);
        return false;
    });

    //
    $(".JY-id-con input").focus(function(){
        if($(this).val() == this.defaultValue){
            $(this).val("");
        }
    }).blur(function(){
        if ($(this).val() == '') {
            $(this).val(this.defaultValue);
        }
    });

    $(".JY-filter-1 li").click(function(){
        if($(this).hasClass("gray")){
            if($(this).find(".JY-vip-tip").is(":hidden")){
                $(".JY-vip-tip").hide();
                $(this).find(".JY-vip-tip").show();
            }else{
                $(this).find(".JY-vip-tip").hide();
            }

        }
    });
    $(".JY-vip-tip .m h3 a").click(function(){
        $(this).parents(".JY-vip-tip").hide();
        return false;
    });
    //点击搜索
    // $(".search_button").bind("click", function(){
    //     clicksearchItem();
    //     //searchResult('first','search');   
    //     return false;
    // });
    //直接搜索
    $('#search_btn_id').click(function(){
        var def = '请输入佳缘ID';
        var id = $('#sear_id').val();
        var reg = new RegExp("^[0-9]*$");
        search_send_pv('toid','new');
        if(id == def || !reg.test(id)){
            $('#sear_id').val(def);
            search_v2_alert("请输入正确的佳缘ID再进行搜索");
            return false;
        }
        $(".JY-id span.t").click();
        window.open("http://www.jiayuan.com/"+id+"?fxly=search_v2_id");
    });
});
//地区连动函数
function addressLink(obj1, obj2){
    var index = obj1.find("option:selected").val(),
        html = "";
    if(typeof COK !== 'undefined'){
        for(var i in COK[index]){
            html += '<option value="';
            html += i;
            html += '">';
            html += COK[index][i];
            html += '</option>';
        }
        obj2.empty().append(html);
    }
}
//年龄
function ageLink(min){
    var ageHtml = "",
        ageMin = min,
        ageMax = 99;
    ageHtml += '<option value="0">不限</option>';
    for(ageMin; ageMin <= ageMax; ageMin++){
        ageHtml += '<option value="';
        ageHtml += ageMin;
        ageHtml += '">';
        ageHtml += ageMin;
        ageHtml += '</option>';
    }
    return ageHtml;
}
//年龄
function heightLink(min){
    var ageHtml = "",
        ageMin = min,
        ageMax = 260;
    ageHtml += '<option value="0">不限</option>';
    for(ageMin; ageMin <= ageMax; ageMin++){
        ageHtml += '<option value="';
        ageHtml += ageMin;
        ageHtml += '">';
        ageHtml += ageMin;
        ageHtml += '</option>';
    }
    return ageHtml;
}

//更多选择title值
function confirmSelect(obj, dataType,type){
    var txt = "";
    var tmp_txt = '';
    switch(dataType){
        case 'dq': //地区
            txt += "(来自)";
            txt += $("select[name='dq-Province']").find("option:selected").text();
            if($("select[name='dq-City']").find("option:selected").val() === "0"){
                txt += "";
            }else{
                txt += $("select[name='dq-City']").find("option:selected").text();
            }
            tmp_txt = dataType+':'+$("select[name='dq-Province']").find("option:selected").val() +','+ $("select[name='dq-City']").find("option:selected").val();
            break;
        case 'nl': //年龄
            txt += $("select[name='age1']").find("option:selected").text();
            if($("select[name='age2']").val() === "0"){
                txt += "岁";
                txt += "以上";
            }else{
                txt += "到";
                txt += $("select[name='age2']").find("option:selected").text();
                txt += "岁";
            }
            tmp_txt = dataType+':'+$("select[name='age1']").find("option:selected").val() +','+ $("select[name='age2']").find("option:selected").val();
            break;
        case 'sg': //身高
            txt += $("select[name='height1']").find("option:selected").text();
            if($("select[name='height2']").val() === "0"){
                txt += "厘米";
                txt += "以上";
            }else{
                txt += "到";
                txt += $("select[name='height2']").find("option:selected").text();
                txt += "厘米";
            }
            tmp_txt = dataType+':'+$("select[name='height1']").find("option:selected").val() +','+ $("select[name='height2']").find("option:selected").val();
            break;
        case 'hkdq': //户口地区
            txt += "(户口)";
            txt += $("select[name='hkdq-Province']").find("option:selected").text();
            if($("select[name='hkdq-City']").find("option:selected").val() === "0"){
                txt += "";
            }else{
                txt += $("select[name='hkdq-City']").find("option:selected").text();
            }
            tmp_txt = dataType+':'+$("select[name='hkdq-Province']").find("option:selected").val() +','+ $("select[name='hkdq-City']").find("option:selected").val();
            break;
        case 'jg': //籍贯
            txt += "(籍贯)";
            txt += $("select[name='jg-Province']").find("option:selected").text();
            if($("select[name='jg-City']").find("option:selected").val() === "0"){
                txt += "";
            }else{
                txt += $("select[name='jg-City']").find("option:selected").text();
            }
            tmp_txt = dataType+':'+$("select[name='jg-Province']").find("option:selected").val() +','+ $("select[name='jg-City']").find("option:selected").val();
            break;
        case 'sx': //生肖
            var vsx = $("input[name='sx']"),
                vArr1 = [];
            vsx.each(function(){
                if($(this).attr("checked")){
                    vArr1.push($(this).attr("value"));
                }
            });
            txt += vArr1.join("、");
            tmp_txt = dataType+':'+vArr1.join(",");
            break;
        case 'xz': //星座
            var vxz = $("input[name='xz']"),
                vArr2 = [];
            vxz.each(function(){
                if($(this).attr("checked")){
                    vArr2.push($(this).attr("value"));
                }
            });
            txt += vArr2.join("、");
            tmp_txt = dataType+':'+vArr2.join(",");
            break;
        case 'yx': //月薪
            txt += obj.parent().find("select option:selected").text();
            var vlu = obj.parent().find("select option:selected").val();
            var ck_more = 0;
            if($("#select-sal").attr("checked")=="checked"){
                ck_more = 1;
            }
            if(ck_more == 1 && type == 'sel'){
                 if(vlu != 50) txt += '及以上';
            }
            tmp_txt = dataType+':'+obj.parent().find("select option:selected").val()+','+ck_more;
            break;
        case 'xl': //学历
            txt += obj.parent().find("select option:selected").text();
            var vlu = obj.parent().find("select option:selected").val();
            var ck_more = 0;
            if($("#select-edu").attr("checked")=="checked"){
                ck_more = 1;
            }
            if(ck_more == 1 && type == 'sel'){
                if(vlu != 70) txt += '及以上';
            }
            tmp_txt = dataType+':'+obj.parent().find("select option:selected").val()+','+ck_more;
            break;
        case 'nc': //昵称
        	txt += $("#nick_input").val();
        	break;
        case 'key': //关键字
            var words =  $("input[id='ss_input']").val();
            words = make_short_word(words);
            txt += "搜索：" + words;
            break;
        case 'zp': //有无照片
            txt += obj.parent().find("select option:selected").text();
            var zp_val = obj.parent().find("select option:selected").val();
            tmp_txt = dataType+':'+zp_val;
            break;
        default:
            txt += obj.parent().find("select option:selected").text();
            tmp_txt = dataType+':'+obj.parent().find("select option:selected").val();
    }
    //if(type) return txt;
    $('#once_sel').val(tmp_txt);
    return txt;
}
//已选择title值
function closeSelect(dataType){
    var txt = "";
    switch(dataType){
        case 'xb':
            txt += "性别";
            break;
        case 'dq':
            txt += "地区";
            break;
        case 'nl':
            txt += "年龄";
            break;
        case 'sg':
            txt += "身高";
            break;
        case 'hs':
            txt += "婚史";
            break;
        case 'xl':
            txt += "学历";
            break;
        case 'yx':
            txt += "月薪";
            break;
        case 'zf':
            txt += "住房";
            break;
        case 'gc':
            txt += "购车";
            break;
        case 'ywzn':
            txt += "有无子女";
            break;
        case 'zy':
            txt += "职业";
            break;
        case 'gslx':
            txt += "公司类型";
            break;
        case 'hkdq':
            txt += "户口地区";
            break;
        case 'jg':
            txt += "籍贯";
            break;
        case 'mz':
            txt += "民族";
            break;
        case 'xx':
            txt += "血型";
            break;
        case 'sx':
            txt += "生肖";
            break;
        case 'xz':
            txt += "星座";
            break;
        case 'zjxy':
            txt += "宗教信仰";
            break;
        case 'cxdj':
            txt += "诚信等级";
            break;
        case 'zp':
            txt += "照片";
            break;
        default:
            txt += "";
    }
    return txt;
}
//生肖
function zodiac(){
    var start = 1901,
        today = new Date(),
        year = parseInt(today.getFullYear()),
        age2 = year - parseInt($("select[name='age2']").val()),
        age1 = year - parseInt($("select[name='age1']").val()),
        cycle,
        zHtml = "",
		z_arr = new Array();
        
    if(parseInt($("select[name='age2']").val()) === 0){
    	cycle = ( age1 - year + 99 >= 12 ) ? age1 - 11 :  year - 99;
    	
    }else{
    	cycle = ( age1 - age2 >= 12 ) ? age1 - 11 : age2 - 1;	
    }    
        
    for(age1; age1 >= cycle; age1--){
        var _v = ( start - age1 ) % 12;
            if (z_arr[_v] === 1) {                
                continue;
            } else {
                z_arr[_v] = 1;
            }
            if(_v === 0){
                //牛
                zHtml += '<label><input type="checkbox" name="sx" value="牛"><span>牛</span></label>';
            }
            if(_v === 1 || _v === -11){
                //鼠
                zHtml += '<label><input type="checkbox" name="sx" value="鼠"><span>鼠</span></label>';
            }
            if(_v === 2 || _v === -10){
                //猪
                zHtml += '<label><input type="checkbox" name="sx" value="猪"><span>猪</span></label>';
            }
            if(_v === 3 || _v === -9){
                //狗
                zHtml += '<label><input type="checkbox" name="sx" value="狗"><span>狗</span></label>';
            }
            if(_v === 4 || _v === -8){
                //鸡
                zHtml += '<label><input type="checkbox" name="sx" value="鸡"><span>鸡</span></label>';
            }
            if(_v === 5 || _v === -7){
                //猴
                zHtml += '<label><input type="checkbox" name="sx" value="猴"><span>猴</span></label>';
            }
            if(_v === 6 || _v === -6){
                //羊
                zHtml += '<label><input type="checkbox" name="sx" value="羊"><span>羊</span></label>';
            }
            if(_v === 7 || _v === -5){
                //马
                zHtml += '<label><input type="checkbox" name="sx" value="马"><span>马</span></label>';
            }
            if(_v === 8 || _v === -4){
                //蛇
                zHtml += '<label><input type="checkbox" name="sx" value="蛇"><span>蛇</span></label>';
            }
            if(_v === 9 || _v === -3){
                //龙
                zHtml += '<label><input type="checkbox" name="sx" value="龙"><span>龙</span></label>';
            }
            if(_v === 10 || _v === -2){
                //兔
                zHtml += '<label><input type="checkbox" name="sx" value="兔"><span>兔</span></label>';
            }
            if(_v === 11 || _v === -1){
                //虎
                zHtml += '<label><input type="checkbox" name="sx" value="虎"><span>虎</span></label>';
            }
    }
    return zHtml;
}
//右侧高度同步
function synchronizationHeight(){
    var obj = $("#side_space"),
        h = parseInt(obj.height()),
        change_h1 = $(".JY-select").is(":hidden") ? 0 : parseInt($(".JY-select").height() + 10),
        change_h2 = parseInt($(".JY-selected").height() - 61),
        minH = 230,
        defaultH = 228,
        change_h3 = $("#new_batch_header").is(":hidden") ? 0 : 50;
    obj.height(defaultH + change_h1 + change_h2 + change_h3);
    var finallyHeight = obj.height();
    if(finallyHeight > minH){
        obj.find(".mascot").show();
    }else{
        obj.find(".mascot").hide();
    }
}
//选择条件后搜索
function selectResult(type){
    var txt = $('#once_sel').val();
    txt = makeParamNew(txt);
    if(txt ==false) return false;
    if(txt === true){
       searchResult("first","select",'');
       return true;
    }
    if(type == 'selected_btn'){
        replaceMark(txt.id,txt.val);
    }else{
        pushMark(txt.id,txt.val);
    }
    searchResult("first","select",'');
    return true;
}
//主搜索
function mainResult(){
    var from = '';
    var nick = $('#s_nick').val();
    if(nick != ''){
        from  = 'from_nick';
    }
    searchResult("first","search",from);
}
//删除条件后搜索
var url_item_ids = {'dq':1,'nl':2,'sg':3,'hs':6,'xl':4,'zf':7,'ywzn':13,'gslx':15,'jg':9,'xx':18,'yx':5,'gc':8,'hkdq':10,'zy':14,'sx':16,'zjxy':12,'cxdj':22,'xz':17,'mz':11,'all':1000,'online':24,'new':27,'zp':23,'zybq':28};
var xzs = {"白羊座":1,"金牛座":2,"双子座":3,"巨蟹座":4,"狮子座":5,"处女座":6,"天秤座":7,"天蝎座":8,"射手座":9,"魔羯座":10,"水瓶座":11,"双鱼座":12};
var sxs = {"鼠":1,"牛":2,"虎":3,"兔":4,"龙":5,"蛇":6,"马":7,"羊":8,"猴":9,"鸡":10,"狗":11,"猪":12};
function deleteResult(type){
    if(url_item_ids[type]){
        var nick = $('#s_nick').val();
        if(nick){
            $('#s_nick').val('');
            $('#nick_condi').val($('#selectedMark').val());
        }
        pullMark(url_item_ids[type]);
        $('#more_tag').val('d');
        searchResult("first","select",nick);
    }
    return true;
}
//改版后的url条件梳理
function makeParamNew(txt){
    var res = {};
    var id = 0;
    var val = '';
    txt = txt.split(':');
    if(url_item_ids[txt[0]]){
        id = url_item_ids[txt[0]];
    }
    switch(txt[0]){
        case 'xb':
            $('.selectedSex').val('f');
            if(txt[1] == '1') $('.selectedSex').val('m');
            return true;
            break;
        case 'dq':
            var loc = txt[1].split(',');
            if(loc[1] == 0){
                val = loc[0];
            }else{
                val = loc[1];
            }
            break;
        case 'nl':
            val = txt[1].replace(',','.');
            if(val == '0.0'){
                pullMark(2);
                return true;
            } 
            break;
        case 'sg':
            val = txt[1].replace(',','.');
            if(val == '0.0'){
                pullMark(3);
                return true;
            }
            break;
        case 'hs':
            val = txt[1];
            break;
        case 'xl':
            val = txt[1].replace(',','.');
            break;
        case 'zf':
            val = txt[1];
            break;
        case 'ywzn':
            val = txt[1];
            break;
        case 'gslx':
            val = txt[1];
            break;
        case 'jg':
            var loc = txt[1].split(',');
            if(loc[1] == 0){
                val = loc[0];
            }else{
                val = loc[1];
            }
            break;
        case 'xx':
            val = txt[1];
            break;
        case 'yx':
            val = txt[1].replace(',','.');
            break;
        case 'gc':
            val = txt[1];
            break;
        case 'hkdq':
            var loc = txt[1].split(',');
            if(loc[1] == 0){
                val = loc[0];
            }else{
                val = loc[1];
            }
            break;
        case 'zy':
            val = txt[1];
            break;
        case 'sx':
            var items = txt[1].split(',');
            for(var i=0 ;i<items.length;i++){
                if(sxs[items[i]]) val += sxs[items[i]]+'.';
            }
            if(val != ''){
                val = val.substring(0,val.length-1);
            }
            break;
        case 'zjxy':
            val = txt[1];
            break;
        case 'cxdj':
            val = txt[1];
            break;
        case 'xz':
            var items = txt[1].split(',');
            for(var i=0;i<items.length;i++){
                if(xzs[items[i]]) val += xzs[items[i]]+'.';
            }
            if(val != ''){
                val = val.substring(0,val.length-1);
            }
            break;
        case 'mz':
            val = txt[1];
            break;
        case 'zp':
            val = txt[1];
            break;
		 case 'zybq':
			val = txt[1];
			break;
        default: 
            return false;
            break;
    }
    res.id = id;
    res.val = val;
    return res;
}
function newSingClick(id,idName){
    if($('#s_nick').val() != ''){
        window.location.href="./index.php?key=&ht=1000";
        return true;
    }
    search_send_pv(idName,'new');
    if(typeof($("#"+idName).attr("checked")) == "undefined"){
        pullMark(id);
        //if(idName == 'pho') return true;
        $(".singleFilter").val("on");
        searchResult("first","select",'');
    }else if($("#"+idName).attr("checked")  == "checked"){
        pushMark(id,1);
        $(".singleFilter").val("on");
        //if(idName == 'pho') return true;
        searchResult("first","select",'');
    }
}
function vip_users(){
    var vip = $('#vip_ser').val();
    if(vip == 0){
        $('.JY-filter-1').find('li').each(function(){
        	if ($(this).attr("id") != "filter-lx")
        	{
	            $(this).addClass('gray');
	            $(this).find('input').attr('disabled','disabled');
	            $(this).find('input').attr('checked',false);
        	}
        });
    }
    return true;
}
function headSearchType(type){
    var nick = $('#s_nick').val();
    $('#s_nick').val('');
    if(url_item_ids[type]){
        var old = $('#head_type').val();
        if(old == url_item_ids[type]) return false;
        $('#head_type').val(url_item_ids[type]);
        pullMark(24);
        pullMark(27);
        if(type != 'all'){
            pushMark(url_item_ids[type],1);
        }
        var from = '';
        if(nick != '') from = 'from_nick';
        search_send_pv(type,'new'); 
        searchResult("first","select",from);
    }
    return false;
}
function newSort(type){
    var old = $(".sortName").val();
    if(type == 'log'){
        if(old == 'last_login') return false;
        $(".sortName").val('last_login');
    }else if(type == 'ml'){
        if(old == 'charm') return false;
        $(".sortName").val('charm');
    }else{
        if(old == 'default') return false;
        $(".sortName").val('default');
    }
    //统计用，修改统计的键值
    if(type == 'all'){
        type = 'default';
    }
    search_send_pv(type,'new');
    searchResult("first","select",'');
}
//搜索框增加已选择项
var defaultKeyWord = '请输入要搜索的条件';
function clicksearchItem(){
    var val = $(".keyword").val();
    if(val == '请输入要搜索的条件') return false;
    var old_val = val;
    val = make_short_word(val);
    var html = '';
    html += '<div data-type="ss" data-index="0" class="JY-item JY-sea" id="fksearch" ><span class="JY-title JY-seat"><b class="JY-title-val">搜索：';
    html += val;
    html += '</b><i class="JY-item-arr"></i></span><span class="JY-close"></span><div id="key_display" class="JY-sp ss" style="display: none;">';
    html += '<h6 class="JY-sp-t">请输入搜索关键词</h6><div class="JY-sp-i clear"><input maxlength="50" type="text" name="" class="JY-text" value="'+old_val+'" id="ss_input" /></div>';
    html += '<button class="JY-sp-b" info="key" id="key_btn" >确认</button></div></div>';
    if(delHtmlTag(val) != '' && val != defaultKeyWord){
        $(".JY-selected-list").prepend(html);
    }   
}
//截断关键字
function make_short_word(w){
    if(w.length>5){
        w = w.substr(0,5)+'...';
    }
    return w;
}
//已选择请输入搜索关键词
function searchItemKey(){
    var _new = $("#ss_input").val();
    var old = $('.keyword').val();
    if(old != _new){
       $('#key_display').remove();
       $('.keyword').val(_new);
       search_send_pv('key','new');
       searchResult("first","search");
       return true;
    }
    return false;          
}
//初始化时的显隐规则
function init_show(){
    //列表模式
    var tmp_listStyle = $('#listStyle').val();
    $('#s_'+tmp_listStyle).addClass('cur');
    if(tmp_listStyle == 'list'){
        //隐藏批量打招呼
        $("#batch_hello").css("display","none");
        $("#batch_hello_gray").css("display","none");
        synchronizationHeight();//同步右侧高度
    }
    //sort条件的初始化
    var sort = $('.sortName').val();
    $('#sort_'+sort).addClass('cur');
    //根据搜索条件初始化页面
    var stc = $('#selectedMark').val();
    if(stc != ''){
        var r = findEasyItem(stc);
        sort_arr = r['s'];
        r = r['r'];
        //有照片初始化
        if(r[23]){
            pushMark(23,1);
            //$('#pho').attr('checked','checked');
        }else{
            if($('#flag').val() == ''){
                pushMark(23,1);
                r[23] = 1;
            }
        }
        //全部会员，在线，最新3
        if(r[24]){
            $('#head_type').val(24);
            $('#online_user').addClass('cur');
        }else if(r[27]){
            $('#head_type').val(27);
            $('#new_user').addClass('cur');
        }else{
            $('#head_type').val(1000);
            $('#all_user').addClass('cur');
        }
        //筛选区域
        if(r[26]){
            $('#vips').attr('checked','checked');
        }
        if(r[21]){
            $('#remove_contact').attr('checked','checked');
        }
        if(r[20]){
            $('#match_type').attr('checked','checked');
        }
        //选择区域初始化
        allSelectUp(r,sort_arr);
    }else if(stc == '' && $('.keyword').val() != ''){
        clicksearchItem();
        $('#head_type').val(1000);
        $('#all_user').addClass('cur');
    }else{
        $('#pho').attr('checked',false);
        $('#head_type').val(1000);
        $('#all_user').addClass('cur');
    }
    var mt = $('#more_tag').val();
    var nick = $('#s_nick').val();
	if (nick !== ''){
		$(".hot-selected").hide();
	}
    if(mt == 'd' && nick == ''){
        $("#JY-more").parent().hide();
        $(".JY-select").show();
        synchronizationHeight();//同步右侧高度
    }else{
        $(".JY-select").hide();	
        $("#JY-more").parent().show();
        synchronizationHeight();//同步右侧高度
    }
    //生肖初始化
    if(typeof(r) !== 'undefined' && r[2]){
        $("#zodiac").empty().append(zodiac());
    }
    if(typeof(r) !== 'undefined' && r[16]){
        var arr_s = r[url_item_ids['sx']].split('.');
        var arr = sxs;
        $('#zodiac').find('input').each(function(){
            var v = $(this).val();
            for(i=0;i<arr_s.length;i++){
                if(arr_s[i] == arr[v])
                $(this).attr('checked','checked');
            }
        });
    }
    //如果全选条件，隐藏收起连接
    if($('#more_to_sel').find('div').length == 0){
        $('.JY-select').hide();
    }
    return true;
}

function allSelectUp(ids,sort_arr){
    var sort = {};
    //已选择的条件
    $(".JY-select-list .JY-item").each(function(i){
        var btn = $(this).find('.JY-sp-b');
        var par = $(this);
        var index = parseInt(par.attr("data-index"));
        var dataType = par.attr("data-type");
        if(ids[url_item_ids[dataType]] || dataType == 'xb'){
            //生肖星座选择
            if(dataType == 'xz' || dataType == 'sx'){
                var area = $(this).find('.JY-sp-i');
                if(dataType == 'xz') var arr = xzs;
                else var arr = sxs;
                var arr_s = ids[url_item_ids[dataType]].split('.');
                area.find('input').each(function(){
                    var v = $(this).val();
                    for(i=0;i<arr_s.length;i++){
                        if(arr_s[i] == arr[v])
                        $(this).attr('checked','checked');
                    }
                });
            }else{
                makeSelectOne(ids[url_item_ids[dataType]],dataType,$(this).find('.JY-sp-i'));
            }
            var add_title = '';
            if(dataType == 'yx' || dataType == 'xl'){
                var value = ids[url_item_ids[dataType]].split('.');
                var is_check = value[1];
                if(is_check == 1 && dataType == 'yx'  && value[0] != 50) add_title = '及以上';
                if(is_check == 1 && dataType == 'xl' && value[0] != 70) add_title = '及以上';
            }
            par.removeClass("JY-cur").find(".JY-title-val").text(confirmSelect(btn, dataType)+add_title);
            btn.parent().find("select option:selected").attr("selected","selected");
            btn.parent().hide();
            var pHtml = par.clone();
            par.remove();
            sort[url_item_ids[dataType]] = pHtml;
            synchronizationHeight();//同步右侧高度
        }
    });
    //关键字优先显示
    if($('.keyword').val() != ''){
        clicksearchItem();
    }
    //渲染已选择的item
    for(var i in sort_arr){
        if(sort[sort_arr[i]]){
            $(".JY-selected-list").append(sort[sort_arr[i]]);
        }
    }
    //照片放最后
    if(sort[23]){
        $(".JY-selected-list").append(sort[23]);
    }
    //年龄，身高联动
    //年龄
        var val1 = $("select[name='age1']").val(),
            val2 = $("select[name='age2']").val();
        $("select[name='age2']").empty().append(ageLink(val1));
        if( val1 <= val2 ){
            $("select[name='age2'] option[value=" + val2 + "]").attr("selected","selected");
        }
    //身高
        var val1 = $("select[name='height1']").val(),
            val2 = $("select[name='height2']").val();
        $("select[name='height2']").empty().append(heightLink(val1));
        if( val1 <= val2 ){
            $("select[name='height2'] option[value=" + val2 + "]").attr("selected","selected");
        }

}

function makeSelectOne(value,type,obj){
    if(type == 'yx' || type == 'xl'){
        value = value.split('.');
        var is_check = value[1];
        value = value[0];
        if(is_check == 1){
            var id = 'sal';
            if(type == 'xl') id = 'edu';
            $('#select-'+id).attr('checked',true);
        }
    }
    if(typeof(obj.find('select')[1]) != 'undefined'){
        if(type == 'hkdq' || type == 'dq' || type == 'jg'){
            value = value.toString();
            if(value.length == 4){
                value = value.substr(0,2)+'.'+value;
            }else{
                value = value+'.'+'0';
            }
        }
        value = value.split('.');
        var i = 0;
        obj.find('select').each(function(){
            $(this).find("option[value='"+value[i]+"']").attr("selected","selected");
            if(i == 0){
                addressLink($(this), $("select[name='"+type+"-City']"));
            }
            i++;
        });
        return true;
    }
    if(type == 'xb'){
        value = 1;
        var sex = $('.selectedSex').val();
        if(sex == 'f') value = 2;
    }
    obj.find('select').find("option[value='"+value+"']").attr("selected","selected");
    return true;
}
function findEasyItem(selectedMark){
    var stc_arr = {"r":{},'s':[]};
    var selectedMarkArr = selectedMark.split(',');
    for(var i = 0; i  < selectedMarkArr.length; i ++) {
        var selectedMarkKeyArr   = selectedMarkArr[i].split(":");
        if(selectedMarkKeyArr[0]){
            stc_arr['r'][selectedMarkKeyArr[0]] = selectedMarkKeyArr[1];
            if(selectedMarkKeyArr[0] != 23){ //照片特殊处理
                stc_arr['s'][i] = selectedMarkKeyArr[0];
            }
            
        }
    }
    return stc_arr;
}
function nickSearchItem(){
    $("#nick-item").removeClass("JY-cur");
    $("#nick-item").find(".JY-sp").hide();
    var nick = $('#nick_input').val();
    var old_nick = $('#s_nick').val();
    nick = delHtmlTag(nick);
    if(nick == '' || nick == old_nick){
        $('#nick_title').html("昵称："+old_nick);
        $('#nick_input').val(old_nick);
        $('#s_nick').val(old_nick);
        return false;
    } 
    $('#nick_title').html("昵称："+nick);
    $('#s_nick').val(nick);
    searchResult("first","select",'',10);
}

function nickSearch(){
    var def = '请输入佳缘昵称';
    var nick = $('#nick_txt').val();
    search_send_pv('tonick','new');
    nick = delHtmlTag(nick);
    if(nick == '' || nick == def){
        $('#nick_txt').val(def);
        search_v2_alert("请输入正确的佳缘昵称再进行搜索");
        return false;
    } 
    var age = '';
    var loc = [];
    var sex = $('#nick_sel_sex').val();
    $('#nick-age').find('select').each(function(i){
        var tmp_age = $(this).find('option:selected').val();
        age += tmp_age+".";
    });
    $('#nick-dq').find('select').each(function(i){
        loc.push($(this).find('option:selected').val());
    });
    age = age.substring(0,age.length-1);
    if(loc[1] && loc[1]>0){
        loc = loc[1];
    }else{
        loc = loc[0];
    }
    if(loc == 0){
        var condi = '2:'+age;
    }else{
        var condi = '1:'+loc+',2:'+age;
    }
    $('.selectedSex').val(sex);
    $('#s_nick').val(nick);
    $('.sortName').val('default');
    $(".singleFilter").val('');
    $('#selectedMark').val(condi);
    $(".JY-id span.t").click();

    $('.keyword').val('');
    searchResult("first","select",'');
    return true;
}
function nick_sel_sex(sex){
    $('#nick_sel_sex').val('f');
    if(sex == 'm') $('#nick_sel_sex').val('m');

}
function search_v2_alert(msg){
    JY_Alert('温馨提示',msg);
}
function nick_init(){
    var nick = $('#s_nick').val();
    if(nick == '') return true;
    $('#nick-item').show();
    $('#JY-more').hide();
    $('#more_to_sel').find('.JY-item').each(function(){
        var t = $(this).attr('data-type');
        if(t!= 'nl' && t!='dq') $(this).remove();
    });
    $('.JY-filter').hide();
}
function back_to_nick(){
    var condi = $('#nick_condi').val();
    //性别
    if(condi == ''){
        var sex = $('.selectedSex').val();
    }else{
        var sex = $('#old_sex').val();
    }
    //性别
    var val = 2;
    if(sex == 'f') val = 1;
    $('#nick-sex').find('input[value='+val+']').attr('checked','checked');
    $('#nick_sel_sex').val(sex);
    if(condi == '') return true;
    $('#nick_condi').val('');
    var nick = $('#old_nick').val();
    $('#s_nick').val('');
    $('#nick_txt').val(nick);
    condi = condi.split(',');
    var tmp = '';
    for (var i in condi){
        tmp = condi[i].split(':');
        if(tmp[0] == 2){
            var tmp1 = tmp[1].split('.');
            $("select[name='id-age1'] option[value=" + tmp1[0] + "]").attr("selected","selected");
            $("select[name='id-age2'] option[value=" + tmp1[1] + "]").attr("selected","selected");
        }else if(tmp[0] == 1){
            if(tmp[1].length == 4){
                var tmp2 = tmp[1].substring(0,tmp[1].length-2);
                var tmp3 = tmp[1];
            }else{
                var tmp2 = tmp[1];
            }
            $("select[name='id-Province'] option[value=" + tmp2 + "]").attr("selected","selected");
            addressLink($('#nick-dq-s'),$('#nick-city-s'));
            $("select[name='id-Province'] option[value=" + tmp2 + "]").attr("selected","selected");
            if(tmp3){
                $("select[name='id-City'] option[value=" + tmp3 + "]").attr("selected","selected");
            }
        }
    }
    $('#nick-title-btn').addClass('hov');
    $('#nick-block').show();
    return true;
}
function delete_nick(){
    var nick = $('#s_nick').val();
    $('#s_nick').val('');
    if($('#selectedMark').val()){
        $('#nick_condi').val($('#selectedMark').val());
    }else{
        $('#nick_condi').val('2:0.0');
    }
    
    searchResult("first","select",nick);
    return false;
}
function delHtmlTag(str){
    //var str=str.replace(/<\/?[^>]*>/gim,"");//去掉所有的html标识表记标帜
    var result=str.replace(/(^\s+)|(\s+$)/g,"");//去掉前后空格
    return result;//.replace(/\s/g,"");//去除文章中心空格
}
//IE下clone  BUG
(function (original) {  
  jQuery.fn.clone = function () {  
    var result           = original.apply(this, arguments), 
        my_selects       = this.find('select').add(this.filter('select')),  
        result_selects   = result.find('select').add(result.filter('select'));  
 
    for (var i = 0, l = my_selects.length;   i < l; ++i) result_selects[i].selectedIndex = my_selects[i].selectedIndex;  
  
    return result;  
  };  
}) (jQuery.fn.clone);

//统计集中处理
function search_send_pv(msg,type){
    if(type == 'new' || type == 'hov'){
        var sex = 'm';
        if($('#selectedSex').val() == 'f') sex = 'f';
        msg = 'search_'+type+'_'+msg+'_'+sex;
    }
    send_jy_pv2(msg);
}

// 喜鹊...
function sendXq(obj, uid)
{
    var url = 'http://www.' + jy_top_domain + '/parties/app/xique/';
    
    $.ajax({
        url : '/dynmatch/xique/ajax/ajax-send-xique.php?uid='+uid,
        data : {},
        type : 'get',
        success : function(response)
        {
            switch(response)
            {
                case '1':
                    PromptAnimate($(obj),'送只喜鹊支持你~');
                    break;
                case '-1':
                    search_v2_alert("抱歉，活动已结束。");
                    break;
                case '-2':
                    search_v2_alert("参数错误，请刷新页面后重试。");
                    break;
                case '-3':
                    search_v2_alert("您不能送给同性哦~");
                    break;
                case '-5':
                    search_v2_alert("不能送给自己哦~");
                    break;
                case '-41':
                    search_v2_alert("您的喜鹊已送完，请明日再来签到送喜鹊吧。");
                    break;
                case '-42':
                    search_v2_alert("您的喜鹊已送完，去 <a href='"+url+"' target='_blank' class='a-blue'>补签</a> 继续送喜鹊吧。");
                    break;
                case '-43':
                    search_v2_alert("您的喜鹊已送完，等待大礼包的降临吧。");
                    break;
                case '-44':
                    search_v2_alert("您的喜鹊已送完，去 <a href='"+url+"' target='_blank' class='a-blue'>补签</a> 继续送喜鹊吧。");
                    break;
            }
            
        }
    })
}


//提示文字效果方法;
function PromptAnimate( obj,text ){
   
    var objT = obj.offset().top;
    var ojbL = obj.offset().left;
    var objW = obj.width();
    var objH = obj.height();
    var $body = $('body');
    var timestamp = new Date().getTime();

    var html = '<div class="prompt-txt" id="prompt'+timestamp+'">'+ text +'</div>';

    $body.append( html );

    var $prompt = $('#prompt'+timestamp);
    var sizes = parseInt($('.prompt-txt').css('fontSize'));
    var lastW = text.length * sizes;
    var lastL = ojbL + (objW/2) - (lastW/2);
    var lastT = objT - 25;

    $prompt.css({
        'width': lastW,
        'left' : lastL,
        'top'  : lastT
    });

    
    $prompt.animate({
        'opacity' : 1
    },800,function(){

        $prompt.animate({
            'opacity' : 0,
            'top'     : lastT-30
        },1500,function(){

            $prompt.remove();

        });
    });
    
}





