/*
佳缘应用聚合页弹层JS
参数说明：
width		弹层宽度
height		弹层高度
iframe_src	弹层中iframe的src地址（url）
z_index		弹层的高度
transparency弹层背景透明度（0到100）
*/
function jy_COW(width, height, iframe_src, z_index, transparency)
{
	this.open_win_id = 'common_open_win';										//浮层的ID
	this.width = width;															//浮层的宽度
	this.height = height;														//浮层的高度
	this.z_index = z_index ? z_index : 1999;										//浮层浮动高度
	this.iframe_src = iframe_src;												//弹层iframe中的载入的内容地址
	//浮层背景的透明度 默认是50%
	transparency = !isNaN(parseInt(transparency)) ? parseInt(transparency) : 50;
	this.transparency_int = transparency;										//保存整数
	this.transparency_float = parseFloat(transparency / 100);
	//是否隐藏select控件
	this.disabled_select = true;
	this.disable_select = '';
	this.disable_select_flag = false;
	
	this.phone_verif_lastScrollY = 0;
	this.open_win_mask_id = this.open_win_id + '_mask_div';						//遮罩的ID
	
	//定义全局静态变量
	jy_COW.content_iframe = this.open_win_id + '_iframe_content';				//弹层IFRAME的ID
	jy_COW.show_div_count = 0;
}

jy_COW.prototype = {
	
	//开始方法 参数：时间延时（毫秒）
	begin:function(time_delay)
	{
		jy_COW.current = this;
		time_delay = time_delay ? time_delay : 0;
		window.obj = this;	//解决类中不把this当作初始化的类
		window.setTimeout(function(){obj.showOpenWindow();}, time_delay);
	},
	
	//展示弹出层
	showOpenWindow:function()
	{
		//显示遮罩层
		this.showMaskDiv();
		
		if(this.disabled_select && this.myBrowser() == 'IE')
		{
			window.obj = this;	//解决类中不把this当作初始化的类
			this.disable_select = window.setInterval(function(){obj.showHiddenAllSelect('disabled');}, 10);
		}
		var nodeDiv = this.bodyAddNode(this.open_win_id);								//增加弹层DIV
		nodeDiv.innerHTML = this.showOpenDiv(jy_COW.content_iframe);						//添加弹层里的IFRAME
		document.getElementById(jy_COW.content_iframe).src = this.iframe_src;				//设置弹层的默认显示页
		
		//设置弹层相关属性
		showDiv = document.getElementById(this.open_win_id);							//获取刚刚添加的弹层
		showDiv.style.position = "absolute";
		showDiv.style.zIndex = this.z_index;
		showDiv.style.width = this.width + 'px';
		showDiv.style.height = this.height + 'px';
		//获取弹层距离顶部的坐标容错处理
		var div_top = 0;
		if(jy_COW.show_div_count > 0){													//如果不是第一次弹层，则加上下边的属性值，否则不加
			var div_top = document.body.scrollTop + document.documentElement.scrollTop;	//兼容不同浏览器
		}
		jy_COW.show_div_count++;
		showDiv.style.top = (div_top + document.documentElement.clientHeight / 2 - this.height / 2) + "px";
		showDiv.style.left = (document.documentElement.scrollLeft + document.documentElement.clientWidth / 2 - showDiv.scrollWidth / 2) + "px";
		showDiv.style.display = "block";
		
		//启动弹出层自动随滚动条滚动
		this.setScroll();
	},
	
	//设置显示弹层的背景遮罩
	showMaskDiv:function()
	{
		//如果遮罩层已经存在，先删除
		if(document.getElementById(this.open_win_mask_id)) document.body.removeChild(document.getElementById(this.open_win_mask_id));
		
		_scrollWidth = Math.max(document.body.scrollWidth,document.documentElement.scrollWidth);
		_scrollHeight = Math.max(document.body.scrollHeight,document.documentElement.scrollHeight);
		
		//增加遮罩DIV
		var newMask = document.createElement("div");
		newMask.id = this.open_win_mask_id;
		newMask.style.position = "absolute";
		newMask.style.zIndex = this.z_index - 10;
		newMask.style.width = _scrollWidth + "px";
		newMask.style.height = _scrollHeight + "px";
		newMask.style.top = "0";
		newMask.style.left = "0";
		//newMask.style.background = "#33393C";
		 newMask.style.background = "#cccccc";
		newMask.style.opacity = this.transparency_float;
		newMask.style.filter = "alpha(opacity=" + this.transparency_int + ")";
		
		newMask.onclick = function(){app_test.closeDiv();}
		document.body.appendChild(newMask);
	},
		
	//自动处理遮罩层
	autoMaskLoad:function()
	{
		if(document.getElementById(this.open_win_mask_id))
		{
			document.getElementById(this.open_win_mask_id).style.width = Math.max(document.body.scrollWidth,document.documentElement.scrollWidth) + 'px';
			document.getElementById(this.open_win_mask_id).style.height = Math.max(document.body.scrollHeight,document.documentElement.scrollHeight) + 'px';
		}
		showDiv = document.getElementById(this.open_win_id);
		if(document.getElementById(this.open_win_id))
		{
			document.getElementById(this.open_win_id).style.left = (document.documentElement.scrollLeft + document.documentElement.clientWidth / 2 -  showDiv.scrollWidth / 2) + "px";	
		}
	},
		
	//关闭层
	closeDiv:function()
	{
		if(this.disabled_select && this.myBrowser() == 'IE')
		{
			this.showHiddenAllSelect('');
			this.disable_select = false;
		}
		document.getElementById(this.open_win_id).style.display = "none";		//隐藏弹层
		document.getElementById(this.open_win_mask_id).style.display = "none";	//隐藏遮罩层
		document.getElementById(jy_COW.content_iframe).src = '';				//清空弹层内IFRAME的文件

		showDiv.style.position = "absolute";
		showDiv.style.zIndex = this.z_index;
		showDiv.style.width = this.width;
		showDiv.style.height = this.height;
	},
	
	//根据滚动条移动层
	autoScrollDiv:function() {
		var diffY;
		//获取当前scrollTop属性值
		if(document.documentElement && document.documentElement.scrollTop){
			diffY = document.documentElement.scrollTop;
		}else if(document.body){
			diffY = document.body.scrollTop;
		}
	
		//每次变化幅度
		percent = .1 * (diffY - this.phone_verif_lastScrollY);
		if(percent > 0){
			percent = Math.ceil(percent);
		}else{
			percent = Math.floor(percent);
		}
		
		var phone_div = document.getElementById(this.open_win_id);
		if(!phone_div){return;}
		var phone_div_top = isNaN(phone_div.style.top) ? phone_div.style.top : 0;
		phone_div.style.top = (parseInt(phone_div_top) + percent) + 'px';
		this.phone_verif_lastScrollY += percent;
		this.autoMaskLoad();
	},
	
	//实时更新弹出层的位置
	setScroll:function()
	{
		window.obj = this;	//解决类中不把this当作初始化的类
		this.interval = window.setInterval(function(){obj.autoScrollDiv();}, 10);
	},
	
	//输出表单页面
	showOpenDiv:function(iframe_id)
	{
		var templates  = '<iframe id="' + iframe_id + '" width="' + this.width + '" height="' + this.height + '" src="" frameborder="0" scrolling="no" style="background:transparent;position:relative" allowTransparency="true"></iframe>';
		return templates;
	},
	
	//给窗体增加一个节点用于保存表单
	bodyAddNode:function(div_form_id)
	{
		var div = document.createElement("div");
		div.id = div_form_id;
		div.style.display = "none";
		//div.className = "jy_cow_open_div";
		document.body.appendChild(div);
		return div;
	},
	
	//载入CSS文件
	loadCssFile:function(src)
	{
		var objDynamic	= document.createElement("link");
		objDynamic.rel	= "stylesheet";
		objDynamic.type	= "text/css";
		objDynamic.id	= "css_jy_cow";
		objDynamic.href	= src;
		//将创建的CSS对象插入到HEAD中
        document.getElementsByTagName("head")[0].appendChild(objDynamic);
	},
	
	//返回浏览器类型
	myBrowser:function(){
		var userAgent = navigator.userAgent;					//取得浏览器的userAgent字符串
		var isOpera = userAgent.indexOf("Opera") > -1;
		if (isOpera){return "Opera"};							//判断是否Opera浏览器 
		if (userAgent.indexOf("Firefox") > -1){return "FF";} 	//判断是否Firefox浏览器
		if (userAgent.indexOf("Safari") > -1){return "Safari";} //判断是否Safari浏览器
		if (userAgent.indexOf("compatible") > -1 && userAgent.indexOf("MSIE") > -1 && !isOpera){return "IE";} ; //判断是否IE浏览器
	},
	
	//获取节点属性值
	getStyle:function(node, property)
	{
		if(node.style[property]){
			return node.style[property];
		}else if(node.currentStyle){
			return node.currentStyle[property];
		}else if(document.defaultView && document.defaultView.getComputedStyle){
			return document.defaultView.getComputedStyle(node, null)[property];
		}
		return null;
	},
	
	//显示、隐藏所有的select
	showHiddenAllSelect:function(display_text)
	{
		var all_selects = document.getElementsByTagName("select");
		var len = all_selects.length;
		for(var i=0; i<len; i++) {
			if(all_selects[i].disabled != display_text)
			{
				all_selects[i].disabled = display_text;
			}
			this.disable_select_flag = true;
		}
		if(this.disable_select_flag){clearInterval(this.disable_select);}
	}
};