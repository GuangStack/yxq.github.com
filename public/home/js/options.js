//下拉选项框对象集
var divSelectObjs = {};

//选择层对象集
var popDivObjs = {};


//回调函数集
var valueChangeCallback = {};
valueChangeCallback['search_form'] = {};


//条件选项定义
var searchCondOptions = {
'hot_location':[11,31,4401,4403,5101,50]
};

/**
* 地区选择层
*
* 依赖 LSK 和 LOK
*/
function set_location_value(formId, type, value, noShow)
{
	if(typeof noShow=='undefined'){
		noShow = false;
	}
	var name2 = formId+'_'+type;
	//var oldValue = JY.$('cond_'+name2+'_location_input').value;
	JY.$('cond_'+name2+'_location_input').value = value;
	set_sublocation_value(formId, type, value,"ini");
	hide_location_div(formId, type);
	if(!noShow && !popDivObjs[formId][type+'_location'].notShowSubLoc && value != 0){
		show_sublocation_div(formId, type);
	}
	if(value != 0)
	create_sublocation_options(formId, type, value);
	show_location_cond(formId, type);
	if(typeof valueChangeCallback[formId][type+'_location_loc']=='function'){
		valueChangeCallback[formId][type+'_location_loc'](formId, type+'_location', LSK[value], value);
	}
	//if(oldValue != value)
	connectChange(type,value);
}
//用户点击的"不限"传值为0，省份改变时自动改为"不限"传值为xx
function set_sublocation_value(formId, type, val,flag)
{
	var flag   =arguments[3] ? arguments[3] : "on";
	var name2 = formId+'_'+type;
	//var oldValue = JY.$('cond_'+name2+'_sublocation_input').value;
	//不限城市
	if(val == 0)
	{
		val = JY.$('cond_'+name2+'_location_input').value;
		JY.$('cond_'+name2+'_sublocation_input').value = val*100;
	}else if(val/100 > 1)
	{
		JY.$('cond_'+name2+'_location_input').value = val/100;
		JY.$('cond_'+name2+'_sublocation_input').value = val;
	}else if(val/100 < 1)
	{
		JY.$('cond_'+name2+'_sublocation_input').value = val*100;
	}
	hide_location_div(formId, type);
	hide_sublocation_div(formId, type);
	show_location_cond(formId, type);
	if(typeof valueChangeCallback[formId][type+'_location_subloc']=='function'){
		valueChangeCallback[formId][type+'_location_subloc'](formId, type+'_location', ''+LSK[val]+'', val);
	}
	change_location(type,val,flag);
}
function show_location_div(formId, type)
{
	var name2 = formId+'_'+type;
	var jqDiv = JQ('#'+name2+'_location_select_div');
	var jqPDiv = jqDiv.parent('div');
	if(jqPDiv.length>0){jqPDiv.css('zIndex', 10000);}
	jqDiv.fadeIn("fast");
	popDivObjs[formId][type+'_location'].isShow = true;
	on_all_select_show(formId, type+'_location');
	var oldCityValue 	 = JY.$(type+'_hidden').value;
	var oldProvinceValue =  Math.floor(oldCityValue/100);
	JY.$('cond_'+name2+'_location_input').value = oldProvinceValue;
}
function hide_location_div(formId, type)
{
	var name2 = formId+'_'+type;
	var jqDiv = JQ('#'+name2+'_location_select_div');
	var jqPDiv = jqDiv.parent('div');
	if(jqPDiv.length>0){jqPDiv.css('zIndex', 0);}
	jqDiv.fadeOut("fast");
	popDivObjs[formId][type+'_location'].isShow = false;
}
function show_sublocation_div(formId, type)
{
	var name2 = formId+'_'+type;
	var jqDiv = JQ('#'+name2+'_sublocation_select_div');
	var jqPDiv = jqDiv.parent('div');
	if(jqPDiv.length>0){jqPDiv.css('zIndex', 10000);}
	jqDiv.fadeIn("slow");
	popDivObjs[formId][type+'_location'].isShow = true;
}
function hide_sublocation_div(formId, type)
{
	var name2 = formId+'_'+type;
	var jqDiv = JQ('#'+name2+'_sublocation_select_div');
	var jqPDiv = jqDiv.parent('div');
	if(jqPDiv.length>0){jqPDiv.css('zIndex', 0);}
	jqDiv.fadeOut("fast");
}
function create_sublocation_options(formId, type, value)
{
	if(!LSK[value]){
		hide_sublocation_div(formId, type);
		return;
	}
	if(LOK[value].length<=2){
		hide_sublocation_div(formId, type);
		return;
	}
	var name2 = formId+'_'+type;
	JY.$(name2+'_sublocation_select_title').innerHTML = LSK[value];
	var options = [];
	options.push('<a href="javascript:set_sublocation_value(\''+formId+'\',\''+type+'\',0)">'+LSK[value]+'全部</a>');
	for(var i in LOK[value]){
		if(i%100==0) continue;
		options.push('<a href="javascript:set_sublocation_value(\''+formId+'\',\''+type+'\','+i+')">'+LOK[value][i]+'</a>');
	}
	JY.$(name2+'_sublocation_select_options').innerHTML = options.join('');
}
function switch_location_div_show(formId, type)
{
	var name2 = formId+'_'+type;
	if (JY.$(name2+'_sublocation_select_div').style.display!='none'){
		hide_sublocation_div(type);
	}
	if(JY.$(name2+'_location_select_div').style.display=='none'){
		show_location_div(formId, type);
	}else{
		hide_location_div(formId, type);
	}
}
function show_location_cond(formId, type)
{
	var name2 = formId+'_'+type;
	var loc = JY.$('cond_'+name2+'_location_input').value;
	var subloc = JY.$('cond_'+name2+'_sublocation_input').value, show;
	if(subloc!=0){
		loc = Math.floor(subloc/100);
	}
	if(loc==0){
		show = "不限";
	}else{
		show = LSK[loc];
	}
	if(subloc!=0 && subloc%100!=0){
		show = LOK[loc][subloc];
	}
	JY.$('cond_'+name2+'_location_show').innerHTML = show;
}
//创建地区选择层
function build_location_div(formId, type, hasHotCity,defaultValue)
{
	var html = [], name2 = formId+'_'+type;
	
	html.push('<em id="cond_'+name2+'_location_show" onclick="switch_location_div_show(\''+formId+'\',\''+type+'\')">'+defaultValue+'</em>');
	html.push('<div class="hov_box city_hov" style="width:330px;display:none;z-index:10000" id="'+name2+'_location_select_div">');
	html.push('<div class="selectMask">');
	if (hasHotCity) {
		html.push('	<div class="clear"><span style="text-align:left">热门城市</span><a href="javascript:hide_location_div(\''+formId+'\',\''+type+'\')" class="close_btn"></a></div>');
		html.push('	<div class="s_city">');
		var hotCityHtml = [], no;
		for(var i in searchCondOptions['hot_location']){
			no = searchCondOptions['hot_location'][i];
			if(no>100){
				html.push('<a href="javascript:set_sublocation_value(\''+formId+'\',\''+type+'\','+no+')">'+LOK[Math.floor(no/100)][no]+'</a>');
			}else{
				html.push('<a href="javascript:set_location_value(\''+formId+'\',\''+type+'\','+no+')">'+LSK[no]+'</a>');
			}
		}
		html.push('	</div>');
	} else {
		html.push('	<div class="clear"><span style="text-align:left"></span><a href="javascript:hide_location_div(\''+formId+'\',\''+type+'\')" class="close_btn"></a></div>');
	}
	html.push('	<div class="shengfen">');
	
	html.push('<div class="shengfen_w fn-clear"><input class="sf_text" type="text" value="" /><label class="shengfen_text">多个地区用空格隔开</label><input class="sf_button" name=\''+type+'\' type="button" onclick="locationSearch(this)" /></div>');
	
	html.push('		<span style="text-align:left">选择省份</span><br />');
	html.push('		<div class="fn-clear"><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',0)">不限省份</a></div>');
	html.push('		<strong>A-G</strong><div class="fn-clear">');
	html.push('		<a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',34)">安徽</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',11)">北京</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',50)">重庆</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',35)">福建</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',62)">甘肃</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',44)">广东</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',45)">广西</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',52)">贵州</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',82)">澳门</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',99)">国外</a><br />');
	html.push('		</div><strong>H-J</strong><div class="fn-clear">');
	html.push('		<a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',46)">海南</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',13)">河北</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',41)">河南</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',23)">黑龙江</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',42)">湖北</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',43)">湖南</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',22)">吉林</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',32)">江苏</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',36)">江西</a><br />');
	html.push('		</div><strong>L-S</strong><div class="fn-clear">');
	html.push('		<a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',21)">辽宁</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',15)">内蒙古</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',64)">宁夏</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',63)">青海</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',37)">山东</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',14)">山西</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',61)">陕西</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',31)">上海</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',51)">四川</a><br />');
	html.push('		</div><strong>T-Z</strong><div class="fn-clear">');
	html.push('		<a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',71)">台湾</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',12)">天津</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',54)">西藏</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',81)">香港</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',65)">新疆</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',53)">云南</a><a href="javascript:set_location_value(\''+formId+'\',\''+type+'\',33)">浙江</a>');
	html.push('	</div></div>');
	html.push('	<input type="hidden" name="'+type+'_location" id="cond_'+name2+'_location_input" value=""/>');
	html.push('</div>');
	html.push('<iframe frameborder="0"></iframe>');

	html.push('</div>');
	html.push('');
	html.push('<div class="hov_box city_hov" style="display:none;z-index:10000" id="'+name2+'_sublocation_select_div">');
	html.push('<div class="selectMask">');
	html.push('	<div class="clear shengfen"><div class="f_l"><b id="'+name2+'_sublocation_select_title">北京</b>&nbsp;<a href="javascript:hide_sublocation_div(\''+formId+'\',\''+type+'\');show_location_div(\''+formId+'\',\''+type+'\');" style="float:none;color:#0066cb;">返回其它省市</a></div><a href="javascript:hide_sublocation_div(\''+formId+'\',\''+type+'\')" class="close_btn"></a></div>');
	html.push('	<div class="shengfen fn-clear" id="'+name2+'_sublocation_select_options"></div>');
	html.push('	<input type="hidden" name="'+type+'_sublocation" id="cond_'+name2+'_sublocation_input" value=""/>');
	html.push('</div>');
	html.push('<iframe frameborder="0"></iframe>');
	html.push('</div>');
	
	document.write(html.join("\n"));
}
//地区选择层包装类
function LocationSelect(formId, type,defValue)
{
	this.formId = formId;
	this.type = type;
	this.name = type+'_location';
	this.isShow = false;
	this.notShowSubLoc = false;
	this.hasHotCity = true;
	this.defValue = defValue;
	
	this.build = function()
	{
		build_location_div(this.formId, type, this.hasHotCity,this.defValue);
		if(typeof popDivObjs[this.formId]=='undefined'){
			popDivObjs[this.formId] = {};
		}
		popDivObjs[this.formId][type+'_location'] = this;
		//var defalut_location_value = Math.floor(this.defValue/100);
		var name2 										= this.formId+'_'+this.type;
		//JY.$('cond_'+name2+'_location_input').value 	= this.defValue;
		//JY.$('cond_'+name2+'_sublocation_input').value  = this.defValue;
		//set_location_value(this.formId, type, this.defValue, true);
		//set_sublocation_value(this.formId, type, this.defValue, "off");
	}
	this.show = function()
	{
		show_location_div(this.formId, this.type);
	}
	this.hide = function()
	{
		hide_location_div(this.formId, this.type);
		hide_sublocation_div(this.formId, this.type);
	}
	this.getLocationValue = function()
	{
		var name2 = formId+'_'+type;
		return JY.$('cond_'+name2+'_location_input').value;
	}
	this.getSubLocationValue = function()
	{
		var name2 = formId+'_'+type;
		return JY.$('cond_'+name2+'_sublocation_input').value;
	}
	this.onLocationChange = function(callback)
	{
		if(typeof callback=='function'){
			if(typeof valueChangeCallback[this.formId]=='undefined'){
				valueChangeCallback[this.formId] = {};
			}
			valueChangeCallback[this.formId][this.name+'_loc'] = callback;
		}
	}
	this.onSubLocationChange = function(callback)
	{
		if(typeof callback=='function'){
			if(typeof valueChangeCallback[this.formId]=='undefined'){
				valueChangeCallback[this.formId] = {};
			}
			valueChangeCallback[this.formId][this.name+'_subloc'] = callback;
		}
	}
}

function on_all_select_show(formId, name)
{
	var i, names; 
	if(!names){ names=[name]; }
	for(i in divSelectObjs[formId]){
		if(JQ.inArray(divSelectObjs[formId][i].name, names)>-1){
			continue;
		}
		if(divSelectObjs[formId][i].isShow){
			divSelectObjs[formId][i].hide();
		}
	}
	for(i in popDivObjs[formId]){
		if(JQ.inArray(popDivObjs[formId][i].name, names)>-1){
			continue;
		}
		if(popDivObjs[formId][i].isShow){
			popDivObjs[formId][i].hide();
		}
	}
}

