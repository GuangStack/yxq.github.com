var keyDefault    = "请输入要搜索的条件";
var sex           = $("#search_interface_sex").val();
var stastic_pre	  = "search_v2_int";
var taskSendMsg 	= new DelayedTask(function () {});
function get_search_interface(location_id,sex)
{
	var search_interface = '<div class="rightSearch search_i" onmouseover="si_onmouseover();" onmouseout="si_onmouseout();"><img id="submitBtn" class="searchBtn" src="./img/searchIcon_04.jpg" onclick="btn_onclick();" /><form target="_blank" action="index.php" id="search_interface_form" style="display:none;"><input type="hidden" name="key" id="search_interface_key" value="" /><input type="hidden" name="select" id="search_interface_search" value="search" /><input type="hidden" name="sex" value="" id="search_interface_get_sex" /><input type="hidden" name="channel" value="1" id="search_interface_channel" /><input type="submit" id="submit" name="submit" value="" /></form><input  class="keyword" maxlength="20" value="请输入要搜索的条件" type="text" onfocus="k_onfocus(this);" onkeyup="k_onkeyup();" onblur="k_onblur(this);" onkeydown="k_onkeydown();" ><i></i><input value="" name="searchCache" id="searchCache" type="hidden"><input value="" name="searchAutoComplete" id="searchAutoComplete" type="hidden"><input value="'+sex+'" name="search_interface_sex" id="search_interface_sex" type="hidden"><div  class="search_drop_down" id="search_drop_down" style="display:none;"><input type="hidden" name="search_tip_json"  value="" class="search_tip_json" ><input type="hidden" name="searchUser_tip_json"  value="" class="searchUser_tip_json" ><dl style="display:none;" id="search_history"><dt class="fn-clear" onclick="dt_onclick();"><span>历史搜索</span><b id="search_history_remove" onclick="remove_onclick();" onmouseover="remove_onmouseover(this);" onmouseout="remove_onmouseout(this);">清除</b></dt></dl><dl style="display: block;" id="search_hot" class="search_hot"><dt class="search_hot_dt" onclick="dt_onclick();">热门搜索</dt></dl><dl style="display:none;" id="search_user" class="search_user"><dt class="autoCompleteSearch" onclick="dt_onclick();"></dt></dl></div></div>';
	$("#"+location_id).append(search_interface);
}
function k_onfocus(this_item){
	$(this_item).css("color","black");
	var keywordFocus = $(this_item).val();
	if(keywordFocus == keyDefault ){
		$(this_item).val('');
	}
	delayGetSearchDown();
}
function k_onkeyup(){
	var e =  getEvent();
	var key =  e.keyCode||e.which||e.charCode;
	if (key == 38 || key == 40)
	{
		return ;
	}
	delayGetSearchDown();
	if (key == 13)
	{
		return ;
	}
}
function k_onblur(this_item){
	$(this_item).css("color","black");
	var keywordNow = $(".keyword").val();
	if(keywordNow == ''){
	      $(this_item).css("color","");
	      $(this_item).val(keyDefault);
	}else 
	{
		$(".keyword").val(trim(keywordNow));
	}
}
function k_onkeydown(){
	var e =  getEvent();
	var key =  e.keyCode||e.which||e.charCode;
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
		var keywordRow	 = ($(".keyword").val() == keyDefault)  ? '' : $(".keyword").val() ;
		var post_keyword = encodeURIComponent(keywordRow);
		$('.keyword').blur();
		var sex           = $("#search_interface_sex").val();
		if(sex == 'f' || sex == 'm')
    	{
			searchResult(sex,post_keyword);
			//统计
			statisticsComplete();
		}
	}
}
//新加搜索下拉框效果
function dt_onclick(){
	$("#search_drop_down").hide();
}
function remove_onclick(){
	$("#search_history").hide();
	$("#search_hot").css("background","none");
	var sex           = $("#search_interface_sex").val();
	if(sex == "f" || sex == "m")
	{
		var cookieHistory = "skhistory_"+sex;
		delSearchInterfaceCookie(cookieHistory,'',-10);
			//统计清除历史记录使用量
		send_jy_pv2(stastic_pre+"|"+sex+"|clear_use");
	}
	$(".keyword").focus();	
}
function remove_onmouseover(this_item){
	$(this_item).addClass("cur");
	$("#search_drop_down dt").unbind("click");	
}
function remove_onmouseout(this_item){
	$(this_item).removeClass("cur");
	$("#search_drop_down dt").bind("click",function(){
		$("#search_drop_down").hide();
	});
}
function si_onmouseover(){
	$("body").unbind("click");
}
function si_onmouseout(){
	$("body").bind("click",function(){
		$("#search_drop_down").hide();
	});
}
//搜索按钮
function btn_onclick(){
	var keyword 	= $(".keyword").val();
	$('.keyword').blur();
	$("#search_drop_down").hide();
	
	var sex           = $("#search_interface_sex").val();
	if(sex == 'f' || sex == 'm')
    {
    	var post_keyword = encodeURIComponent(keyword);
    	//按钮点击量
		send_jy_pv2(stastic_pre+"|"+sex+"|search_btn");
		searchResult(sex,post_keyword);
	}
}
//搜索按钮点击
function searchResult(sex,keyword){
		var searchCache	    = $("#searchCache").val();
		var sex           = $("#search_interface_sex").val();
		if(decodeURIComponent(keyword) == searchCache)
		{
			return false;
		}
		if(sex == 'f' || sex == 'm')
    	{
			window.open("http://search.jiayuan.com/v2/index.php?key="+keyword+"&sex="+sex+"&channel=1&f=search");	
			//$("#search_interface_key").val(keyword);
			//$("#search_interface_get_sex").val(sex);
			//$("#search_interface_form").submit();
		}
}
function getSearchDropDown(){
	var keywordTip 	= $(".keyword").val();
	var searchAuto  = $("#searchAutoComplete").val();
	if(searchAuto != '' && trim(keywordTip) == searchAuto)
	{
		var searchUser_tip_json =  $(".searchUser_tip_json").val();
		var data = eval('('+searchUser_tip_json+')');
		getSearchKey(keywordTip,data);
	}
	else
	{
		var txt 		= trim(encodeURIComponent($(".keyword").val()));//这里是取得他的输入框的值
		var search_tip_json = $(".search_tip_json").val();
		var sex           = $("#search_interface_sex").val();
		if(!(sex == "f" || sex == 'm'))
		{
			return ;
		}
		if(trim(keywordTip) == '' && search_tip_json.length > 0)
		{
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
			send_jy_pv2(stastic_pre+"|"+sex+"|relation_display");
		}
	}
}
//统计历史,热门,相关的搜索补全
function statisticsComplete()
{
	var isHistorySearchKey 	= $("#search_history dd").filter(".cur").length;
	var isHotSearchKey 		= $("#search_hot dd").filter(".cur").length;
	var isUserSearchKey 	= $("#search_user dd").filter(".cur").length;
	$("#search_drop_down").hide();
	var sex           		= $("#search_interface_sex").val();
	//历史热门和关联词使用量统计
	 if(isHistorySearchKey > 0)
	 	send_jy_pv2(stastic_pre+"|"+sex+"|history_use");
	 if(isHotSearchKey > 0)
	 	send_jy_pv2(stastic_pre+"|"+sex+"|hot_use");
	 if(isUserSearchKey > 0)
		send_jy_pv2(stastic_pre+"|"+sex+"|relation_use");
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

function getEvent(event) {
    var ev = event || window.event;

    if (!ev) {
        var c = this.getEvent.caller;
        while (c) {
            ev = c.arguments[0];
            if (ev && (Event == ev.constructor || MouseEvent  == ev.constructor)) { 
                break;
            }
            c = c.caller;
        }
    }

    return ev;
}
//得到搜索关联词
function getSearchKey(keywordTip,data)
{
	if(data == null || (typeof(data) == "object" && data == '' ))
	{
		$("#search_drop_down").hide();
	}else if(data.hot)
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
			var show_data = selfSubString(data[i],50,true);
			 innerHtml += "<dd onmouseover='addCur(this);' onmouseout='removeCur(this);' onclick='clickdd(this);'>"+show_data+"</dd>";
		}
		$(".autoCompleteSearch").nextAll().remove();
		$(".autoCompleteSearch").after(innerHtml);
		$("#search_drop_down").show();
		//清除历史热门搜索记录的选中状态
		$("#search_history").find("dd").removeClass("cur");
		$("#search_hot").find("dd").removeClass("cur");
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
//得到搜索历史和热门记录
function getHistoryHotKey(data)
{
	if(data.hot)
	{
		$("#search_drop_down").show();
		$("#search_hot").show();
		$("#search_user").hide();
		//清楚上次搜索结果
		$(".autoCompleteSearch").nextAll().remove();
		var innerHtmlHistory 	= innerHtmlHot ='';
		if(data.history)
		{
			var searchHistory 	= data.history;
			var sex          = $("#search_interface_sex").val();
    		if(sex == 'f' || sex == 'm')
    		{
    			var cookieHistory = "skhistory_"+sex;
				//var history_cookie = getSearchInterfaceCookie(cookieHistory);
				var history_cookie = true;
				if(history_cookie)
				{
					$("#search_history").show();
					for(var i in searchHistory)
					{
						innerHtmlHistory += "<dd onmouseover='addCur(this);' onmouseout='removeCur(this);' onclick='clickdd(this);'>"+searchHistory[i]+"</dd>"
					}
					$("#search_history_remove").parent().nextAll().remove();
					$("#search_history_remove").parent().after(innerHtmlHistory);
				}
    		}
			
		}
		
		var searchHot	  		= data.hot;
		for(var i=0; i<searchHot.length ;i++)
		{
			innerHtmlHot += "<dd onmouseover='addCur(this);' onmouseout='removeCur(this);' onclick='clickdd(this);'>"+searchHot[i]+"</dd>"
		}
		$(".search_hot_dt").nextAll().remove();
		$(".search_hot_dt").after(innerHtmlHot);
	}
}
function delSearchInterfaceCookie(name,value,days){
	var exp = new Date(); 
	exp.setTime(exp.getTime() + days*24*60*60*1000);
	var domain = "jiayuan";
	document.cookie = name + "="+ escape(value) + ";expires=" + exp.toGMTString()+"; path=/;domain="+domain+".com";
}
function getSearchInterfaceCookie(c_name)
{
	var domain = "jiayuan";
	document.domain = domain+".com";
	if (document.cookie.length>0)
	{
		c_start=document.cookie.indexOf(c_name + "=")
		if (c_start!=-1)
		{ 
			c_start=c_start + c_name.length+1 
			c_end=document.cookie.indexOf(";",c_start)
		if (c_end==-1) c_end=document.cookie.length
			return unescape(document.cookie.substring(c_start,c_end))
		} 
	}
	return ""
}
function trim(str)
{
	 //   用正则表达式将前后空格
	 //   用空字符串替代
	 return str.replace(/(^\s*)|(\s*$)/g,"");
}
function addCur(thisItem) 
{
	$(thisItem).addClass("cur");
}
function removeCur(thisItem){
	$(thisItem).removeClass("cur");
}
function clickdd(thisItem){
	$(".keyword").val($(thisItem).text());
	var keywordRow	 = ($(".keyword").val() == keyDefault)  ? '' : $(".keyword").val() ;
    var post_keyword = encodeURIComponent(keywordRow);
    var sex          = $("#search_interface_sex").val();
    if(sex == 'f' || sex == 'm')
    {
    	searchResult(sex,post_keyword);
		statisticsComplete();
    }
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
//截取字符串 包含中文处理，参数含义：(字符串,截取长度,是否增加...)
function selfSubString(str, len, hasDot){
    var newLength=0;
    var newStr="";
    var chineseRegex=/[^\x00-\xff]/g;
    var singleChar='';
    var strLength=str.replace(chineseRegex,'**').length;
    for(var i=0;i < strLength;i++){
    	singleChar=str.charAt(i).toString();
    if(singleChar.match(chineseRegex) != null){
        newLength+=2;
    }else{
        newLength++;
    }
    if(newLength>len){
        break;
    }
   	 newStr+=singleChar;
    }
    if(hasDot && strLength>len){
        newStr+='...';
    }
    return newStr;
}