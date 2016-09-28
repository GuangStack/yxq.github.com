/*
	JTOOL Ver:xxxxx.x
	JScript实用函数包
	ZhuShunqing
	最后更新: 2009-1-9
	http://www.flashman.com.cn/jtool/
*/

if(!JTOOL){

var JTOOL = {

	_JTOOL_INNER_CONTAINER	: '_JTOOL_INNER_CONTAINER',

	_JTOOL_JSON_LOADER		: '_JTOOL_JSON_LOADER',

	_JTOOL_WINDOW_OPENER	: '_JTOOL_WINDOW_OPENER',

	_JTOOL_WINDOW_FRAME		: '_JTOOL_WINDOW_FRAME',

	_JTOOL_WINDOW_POPDIV	: '_JTOOL_WINDOW_POPDIV',

	popdivobject	: null,

	containerRoot	: null,

	imgpreloader	: null,

	/*
		取得元素引用
		id		元素id或name名称
	*/
	$ : function(id){
		var obj = document.getElementsByName(id);
		if(obj.length == 1)
			obj = obj[0];
		else if(obj.length == 0)
			obj = document.getElementById(id);
		return obj;
	}
,
	/*
		去除字符串两端空格
	*/
	trim : function(string){
		if(string){
			string = string.replace(/^\s+/, '');
			string = string.replace(/\s+$/, '');
		}
		return string;
	}
,
	/*
		字符替换，可使用正则表达式
		string	源字符
		search	查找字符或表达式
		replace	替换字符
	*/
	replace : function(string, search, replace){
			if(string)
				return string.replace(new RegExp(search ,'ig'), replace);
			else
				return string;
	}
,
	//中文字符长度*2
	strlen : function(str){
		str = str.replace(/[^\x00-\xff]/g, '**');
		return str.length;
	}
,
	//以字符串起始
	String : {

		startWith : function(s1, s2, icase){
			if(!s1 || !s2) return false;
			if(icase){
				s1 = s1.toLowerCase();
				s2 = s2.toLowerCase();
			}
			return (s1.indexOf(s2) == 0);
		}
	,
		//以字符串结束
		endWith : function(s1, s2, icase){
			if(!s1 || !s2) return false;
			if(icase){
				s1 = s1.toLowerCase();
				s2 = s2.toLowerCase();
			}
			return (s1.lastIndexOf(s2) == s1.length - s2.length);
		}
	,
		//包含字符串
		containWith	: function(s1, s2, icase){
			if(!s1 || !s2) return false;
			if(icase){
				s1 = s1.toLowerCase();
				s2 = s2.toLowerCase();
			}
			return (s1.indexOf(s2) != -1);
		}

	}
,
	//获取地址参数
	request : function(key){
		var result = null;
		var rs = new RegExp(key + "=([^&]+)","g").exec(self.location.toString());
		if(rs)
			result = rs[1];
		rs = null;
		return result;
	}
,
	//得到当前路径位置
	urlpath : function(){
		var path = window.location.toString();
		path = path.match(/^[^\?#&]+\//);
		return path;
	}
,
	dump : function(obj){
		var buff = "";
		for(var key in obj)
			buff += key + ' ' + obj[key] + "\n";
		return buff;
	}
,

	//html特殊字符转码
	htmlCharEncode : function(str){
		var c = null, a = null, buff = '';
		if(str)
			for(var i = 0; i < str.length; i ++){
				c = str.substr(i, 1);
				a = c.charCodeAt(0);
				if((a >= 32 && a <= 47) || (a >= 58 && a <= 64) || (a >= 123 && a <= 127) || (a >= 161 && a <= 255)){
					a = (a == 32) ? 160 : a;
					buff += '&#' + a + ';';
				}else
					buff += c;
			}
		return buff;
	}
,
	//html特殊字符解码
	htmlCharDecode : function(str){
		var p = 0, q = 0, r = null, code = null, buff = '';
		while((p = str.indexOf('&#', p)) >= 0){
			buff += str.substring(q, p);
			code = str.substr(p + 2, 4);
			if((r = code.indexOf(';')) >= 2){
				code = code.substr(0, r);
				if(code.match(/^\d{2,3}/)){
					code = (code == 160) ? 32 : code;
					buff += String.fromCharCode(code);
				}else{
					buff += '&#' + code + ';';
				}
				p += 3 + r;
			}else{
				buff += '&#';
				p += 2;
			}
			q = p;
		}
		buff += str.substring(q);
		return buff;
	}
,
	//模板工具
	Template : {

		//<--方法1 innerHTML替换方式
		innerHTML : null,
		setTmpl : function(element){
			this.innerHTML = element.innerHTML;
		},
		
		/*
			tag			标签名|标签集{'标签1':'替换值1', '标签2':'替换值2'...}
			value		替换值
		*/
		setVar : function(tag, value){
			var tagSet = (typeof(tag) == 'object') ? tag : null;
			if(tagSet)
				for(var k in tagSet)
					this.innerHTML = JTOOL.replace(this.innerHTML, '({|\%7B)' + k + '(}|\%7D)', tagSet[k]);
			else
				this.innerHTML = JTOOL.replace(this.innerHTML, '({|\%7B)' + tag + '(}|\%7D)', value);
		},
		parse : function(element){
			element.innerHTML = this.innerHTML;
		},
		//-->

		
		//<--方法2 遍历元素替换方式

		//需要替换标签的属性名称
		rplables : ['title', 'href', 'onclick', 'className', 'value', 'style', 'src'],

		//设置替换标签
		setLables : function(lables){
			this.rplables = lables;
		},

		//替换元素中的模板标签
		/*
			element		元素
			tag			标签名|标签集{'标签1':'替换值1', '标签2':'替换值2'...}
			value		替换值
		*/
		setVarElement : function(element, tag, value){
			var childs = element.childNodes;
			var tagSet = (typeof(tag) == 'object') ? tag : null;
			var tmpstr = null;

			if(childs)
			for(var i = 0; i < childs.length; i ++){

				//替换属性中的标签
				for(var j = 0; j < this.rplables.length; j ++)
					if(childs[i][this.rplables[j]]){


						//数据类型差异化处理
						switch(typeof(childs[i][this.rplables[j]])){
							case 'string':
								tmpstr = childs[i][this.rplables[j]];
								if(tagSet)
									for(var k in tagSet)
										tmpstr = JTOOL.replace(tmpstr, '({|\%7B)' + k + '(}|\%7D)', tagSet[k]);
								else
									tmpstr = JTOOL.replace(tmpstr, '({|\%7B)' + tag + '(}|\%7D)', value);
								try{childs[i][this.rplables[j]] = tmpstr;}catch(ex){}
								break;

							case 'function':
								var script = childs[i][this.rplables[j]].toString();
								if(tagSet)
									for(var k in tagSet)
										script = JTOOL.replace(script, '({|\%7B)' + k + '(}|\%7D)', tagSet[k]);
								else
									script = JTOOL.replace(script, '({|\%7B)' + tag + '(}|\%7D)', value);

								eval('script = ' + script);
								childs[i][this.rplables[j]] = script;
								break;

							default:
								//alert(typeof(childs[i][this.rplables[j]]));
						}

						//节点属性差异化处理
						switch(this.rplables[j]){
							//处理href属性
							case 'href':
								tmpstr = childs[i]['href'];
								tmpstr = JTOOL.replace(tmpstr, '/+$', '');
								tmpstr = JTOOL.replace(tmpstr, '^about:(blank)?', '');
								tmpstr = JTOOL.replace(tmpstr, JTOOL.urlpath(), '');
								//if(!JTOOL.String.startWith(tmpstr, 'http://'))
								//	tmpstr = 'http://' + tmpstr;
								try{childs[i]['href'] = tmpstr;}catch(ex){}

							break;

							case 'style':
								tmpstr = childs[i]['style'].cssText;
								if(tagSet)
									for(var k in tagSet)
										tmpstr = JTOOL.replace(tmpstr, k, tagSet[k]);
								else
									tmpstr = JTOOL.replace(tmpstr, tag, value);
								childs[i]['style'].cssText = tmpstr;
							break;

							default:
						}

						//元素差异化处理
						switch(childs[i].nodeName){
							case 'IMG':
								tmpstr = childs[i]['src'];
								tmpstr = JTOOL.replace(tmpstr, JTOOL.urlpath(), '');
								childs[i]['src'] = tmpstr;
							break;
						}
					}

				//替换文本中的标签
				if(childs[i].nodeName == '#text')
					tmpstr = childs[i].data;
					if(tagSet)
						for(var k in tagSet)
							tmpstr = JTOOL.replace(tmpstr, '({|\%7B)' + k + '(}|\%7D)', tagSet[k]);
					else
						tmpstr = JTOOL.replace(tmpstr, '({|\%7B)' + tag + '(}|\%7D)', value);
					childs[i].data = tmpstr;

				this.setVarElement(childs[i], tag, value);
			}
		}
		//-->
	}
,
	/*
		生成元素容器引用
	*/
	setContainerRoot : function(){
		//for(var i = 0; i < document.childNodes.length; i ++)
		//	if(document.childNodes[i].nodeType == 1){
		//		this.containerRoot = document.childNodes[i];
		//		break;
		//	}
		document.writeln("<DIV ID='" + this._JTOOL_INNER_CONTAINER + "' style='display:none'>&nbsp;</DIV>");
		this.containerRoot = this.$(this._JTOOL_INNER_CONTAINER);
	}
,
	/*
		跨域载入json数据
		url			程序url
		get			传递参数
		callback	回调函数
		method		插入元素方法
					0 添加子元素appendChild
					1 直接document.write	用于页面打开时执行，此时浏览器正载入页面，appendChild方法IE下会报错。
	*/
	loadJson : function(url, get, callback, method){

		//var loader = null;
		//loader = this.$(this._JTOOL_JSON_LOADER);
		//if(loader)
		//	this.containerRoot.removeChild(loader);
		var loader = document.createElement("script");
		loader.type = "text/javascript";
		//loader.id = this._JTOOL_JSON_LOADER;
		if(!JTOOL.String.containWith(url, '?')) url += '?';
		if(get) url += get;
		url += '&fun=' + callback + '&' + new Date().getTime();
		loader.src = url;

		if(method == 1)
			document.write("<script type='" + loader.type + "' src='" + loader.src + "'>< /script>");
		else
			this.containerRoot.appendChild(loader);
		loader = null;

	}
,
	/*
		不被拦截的新开窗口链接
		url		新开窗口地址
	*/
	openWindow : function(url){

		var opener = null;
		opener = this.$(this._JTOOL_WINDOW_OPENER);
		if(!opener){
			opener = document.createElement("form");
			opener.id = this._JTOOL_WINDOW_OPENER;
			opener.method = 'post';
			opener.target = '_blank';
			this.containerRoot.appendChild(opener);
		}
		opener.action = url;
		opener.submit();

		opener = null;
	}
,
	
	//获取控件位置
	getPosition : function(obj){

		var p = Array();

		//宽高
		p['w'] = obj.offsetWidth;
		p['h'] = obj.offsetHeight;

		//绝对位置
		p['x'] = obj.offsetLeft;
		p['y'] = obj.offsetTop;
		while(obj = obj.offsetParent){
			p['x'] += obj.offsetLeft;
			p['y'] += obj.offsetTop;
		}

		//相对可视位置
		p['rx'] = p['x'] - document.body.scrollLeft;
		p['ry'] = p['y'] - document.body.scrollTop;

		//四向点
		p['top'] = p['y'];
		p['bottom'] = p['y'] + p['h'];
		p['left'] = p['x'];
		p['right'] = p['x'] + p['w'];

		p.toString = function(){
			var attr = ['w', 'h', 'x', 'y', 'rx', 'ry', 'top', 'bottom', 'left', 'right'];
			var str = "";
			for(var i = 0; i < attr.length; i ++)
				str += attr[i] + ":" + p[attr[i]] + " ";
			return str;
		}

		return p;
	}
,
	//设置对象是否显示
	setDisplay : function(obj, bool){
		if(obj)
			if(bool)
				obj.style.display = '';
			else
				obj.style.display = 'none';
	}
,
	disableSelectText : function(obj){
		obj.onselectstart = function(){
			return false;
		}
		obj.style.MozUserSelect = "none";
	}
,
	//得到name名称指定子元素
	findChild : function(src, name){
		var child = [];
		childNodes = src.getElementsByTagName('*');
		for(var i = 0; i < childNodes.length; i ++)
			if(childNodes[i].id == name || childNodes[i].name == name || childNodes[i].className == name)
				child[child.length] = childNodes[i];
		childNodes = null;
		return (child.length == 0) ? null : ((child.length == 1) ? child[0] : child);
	}
,
	//增加事件
	addEvent : function(element, event, handle){
		if(element.attachEvent)
			element.attachEvent("on" + event, handle);
		else
			element.addEventListener(event, handle, false);
	}
,
	//删除事件
	removeEvent :function(element, event, handle){
		if(element.detachEvent)
			element.detachEvent("on" + event, handle);
		else
			element.removeEventListener(event, handle, false);
	}
,
	//得到图片大小
	getImgSize : function(src, onload){
		var img = new Image();
		img.src = src;
		this.containerRoot.appendChild(img);
		this.Thread.start();
		this.Thread.addTask(onload, img);
	}
,
	//限制元素在一区域内
	rectangleLimit : function(rect, obj){

		//宽
		if(obj.offsetWidth > rect.w)
			obj.style.width = rect.w;

		//高
		if(obj.offsetHeight > rect.h)
			obj.style.height = rect.h;

		//左
		if(obj.offsetLeft < rect.x)
			obj.style.left = rect.x;

		//上
		if(obj.offsetTop < rect.y)
			obj.style.top = rect.y;

		//右
		if((obj.offsetLeft + obj.offsetWidth) > (rect.x + rect.w))
			obj.style.left = rect.x + rect.w - obj.offsetWidth;
		
		//下
		if((obj.offsetTop + obj.offsetHeight) > (rect.y + rect.h))
			obj.style.top = rect.y + rect.h - obj.offsetHeight;

	}
,

	//线程工具
	Thread : {

		threadList : [],
		ready : 0,
		ontaskdone : null,
		intervalID : null,

		//启动线程监控
		/*
			interval		监控间隔时间
			ontaskdone		任务完成事件
		*/
		start : function(interval, ontaskdone){
			this.clear();
			interval = interval ? interval : 100;
			this.ontaskdone = ontaskdone;
			this.intervalID = setInterval("JTOOL.Thread.monitor()", interval);
		},

		monitor : function(){

			for(var i = 0; i < this.threadList.length; i ++)
				if(this.threadList[i])
					if(this.threadList[i].run()){
						this.threadList[i] = null;
						this.ready ++;
					}

			if(this.ready > 0 && this.ready == this.threadList.length){
				this.ready = 0;
				this.threadList = [];
				if(this.ontaskdone)
					this.ontaskdone();
			}

		},

		//添加进程任务
		/*
			args[0]		任务对象
			args1...N	代入参数
		*/
		addTask : function(){
			var args = arguments;
			var task = {
				run : function(){
					if(args.length > 0)
						return args[0](args);
				}
			};
			this.threadList[this.threadList.length] = task;
		},

		//清理任务
		clear : function(){
			if(this.intervalID){
				clearInterval(this.intervalID);
				for(var i = 0; i < this.threadList.length; i ++)
					this.threadList[i] = null;
				this.threadList = [];
				this.ontaskdone = null;
				this.ready = 0;
				this.intervalID = null;
			}
		}

	},

	//计时工具
	Timer : {
		timerCounter : [],
		setTimer : function(idx){
			this.timerCounter[idx] = new Date().getTime();
		},
		getTimer : function(idx){
			return new Date().getTime() - this.timerCounter[idx];
		},
		destroy : function(idx){
			this.timerCounter[idx] = null;
		}
	}

,

	//上传按纽
	UploadButton : function(input){

		var box = document.createElement("div");
		var button = document.createElement("input");
		
		box.style.cssText = "overflow:hidden;" + input.style.cssText;
		button.type = "file";
		button.name = input.name;
		button.style.cssText = "position: relative; font-size:200px;filter: Alpha(opacity=0); -moz-opacity:0; opacity:0; cursor:pointer;";

		box.appendChild(button);
		input.parentNode.insertBefore(box, input);
		button.onchange = function(){
			if(input.onchange)
				input.onchange(this.value);
		}

		//IF IE
		//button.style.left = - (button.offsetWidth / 3 * 2);
		button.style.left = - (button.offsetWidth / 3 * 2 + button.offsetWidth / 10);
		button.style.top = - input.offsetHeight;
		button.style.height = input.offsetHeight;

		box.style.width = input.offsetWidth;
		box.style.height = input.offsetHeight;
		box.style.height = input.offsetHeight;

		input.parentNode.removeChild(input);
		box.insertBefore(input, button);
	}
,
	disableSelectIMG : function(img){
		var box = document.createElement("div");
		var mask = document.createElement("div");
		box.style.cssText = "width:100%; height:100%; overflow:hidden;" + img.style.cssText;
		mask.style.cssText = "width:100%; height:100%; position:relative; background-image: url(about:blank); /* border: 1px solid #669900; filter: Alpha(opacity=80); -moz-opacity:0.8; opacity:0.8; background-color: #D4D4D4;*/";
		img.parentNode.insertBefore(box, img);
		img.parentNode.removeChild(img);
		box.appendChild(img);
		box.appendChild(mask);

		img.width = box.offsetWidth;
		img.height = box.offsetHeight;
		mask.style.top = - box.offsetHeight;
/*
		box.onmouseover = function(){
			img.width = box.offsetWidth;
			img.height = box.offsetHeight;
			mask.style.top = - box.offsetHeight;
		}
*/
		return {"box":box, "mask":mask, "img":img};
	}

,

	//遮罩提示
	Mask : {
		mask : null,
		content : null,
		init : function(){
			if(!this.mask){
				this.mask = document.createElement("div");
				this.content = document.createElement("div");
				this.mask.style.cssText = "position:absolute; left:0px; top:0px; filter: Alpha(opacity=50); -moz-opacity:0.5; opacity:0.5; background-color: #CCFF00; display:none; z-index:999;";
				this.content.style.cssText = "width:100%; position:absolute; left:0px; text-align:center; display:none; z-index:999;/*border: 1px solid #000000;*/";
				document.body.appendChild(this.mask);
				document.body.appendChild(this.content);
			}
		},
		resize : function(){
			this.mask.style.width = document.body.scrollWidth;
			this.mask.style.height = document.body.scrollHeight;
			this.content.style.top = (document.body.clientHeight / 2) - (this.content.clientHeight / 2) + document.body.scrollTop;
		},
		setText : function(text, width){
			width = (width) ? width : 400;
			this.content.innerHTML = "<center><div style='color: gray; width: " + width + "px; padding: 10px; background-color:#FFFFFF; font-size: 14px;'>" + text + '</div></center>';
		},
		showLoading : function(text, idx){
			text = (text) ? '<br>' + text : '';
			idx = (idx) ? idx : '';
			this.show();
			this.setText("<img src='images/loading" + idx + ".gif'>" + text, 150);
			this.resize();
		},
		showAlert : function(text){
			this.show();
			this.setText(text + "<p>&nbsp;</p><div style='cursor: pointer' onclick='JTOOL.Mask.close()'>确 定</div>");
			this.resize();
		},
		show : function(){
			this.init();
			JTOOL.setDisplay(this.mask, true);
			JTOOL.setDisplay(this.content, true);
		},
		close : function(){
			this.init();
			JTOOL.setDisplay(this.mask, false);
			JTOOL.setDisplay(this.content, false);
		}
	}

,

	//表单实用函数
	form : {
		input : {

			//设置表单允许输入的值类型
			setType : function(element, type){
				element._parent = this;
				element.onkeydown = function(event){
					return this._parent.limit(type, event);
				};
				element.onchange = function(event){
					this.value = this._parent.fixValue(type, this.value);
				};
			},

			//限制输入类型
			limit : function(type, event){
				if(!event) event = window.event;
				event.cancelBubble = true;
				var keycode = event.keyCode;
				if(type == 'int')
					return this.isInt(keycode);
				else if(type == 'float')
					return this.isFloat(keycode);
				else if(type == 'date')
					return this.isDate(keycode);
				else
					return true;
			},

			//允许数字键
			isInt : function(keycode){
				return (this.isNumKey(keycode) || this.isEditKey(keycode));
			},

			//允许小数点和数值
			isFloat : function(keycode){
				return (this.isNumKey(keycode) || this.isEditKey(keycode) || keycode == 190);
			},

			//允许日期分隔符和数值
			isDate : function(keycode){
				return (this.isNumKey(keycode) || this.isEditKey(keycode) || keycode == 189);
			},

			//是否数字键
			isNumKey : function(keycode){
				return ((keycode >= 48 && keycode <= 57) || (keycode >= 96 && keycode <= 105));
			},

			//是否其它功能键
			isEditKey : function(keycode){
				var keys = new Array(8, 9, 13, 33, 34, 35, 36, 37, 38, 39, 40, 45, 46); 
				for(var i = 0; i < keys.length; i++)
					if (keycode == keys[i])
						return true;
				return false;
			},

			//是否光标键
			isArrowKey : function(keycode){
				return (keycode >= 37 && keycode <= 40);
			},

			//是否左右光标键
			isArrowKey_h : function(keycode){
				return (keycode == 37 || keycode == 39);
			},

			//是否上下光标键
			isArrowKey_v : function(keycode){
				return (keycode == 38 || keycode == 40);
			},

			//是否回车键
			isEnterKey : function(keycode){
				return keycode == 13;
			},

			//表单输入值校验
			fixValue : function(type, value){
				if(type == 'int')
					return this.fixInt(value);
				else if(type == 'float')
					return this.fixFloat(value);
				else if(type == 'date')
					return this.fixDate(value);
			},

			//校验浮点数
			fixFloat : function(value){

				value = value.replace(/[^0-9.]/g, '');
				var match = value.match(/\./g);
				if(match)
					for(var i = 0; i < match.length - 1; i ++)
						value = value.replace('.', '');

				value = parseFloat(value);
				if(!value)
					value = '';

				return value;
			},

			//校验日期格式
			fixDate : function(value){
				value = value.replace(/[^0-9-]/g, '');
				value = value.match(/[12]\d{3}-\d{1,2}-\d{1,2}/);
				if(!value)
					value = '1970-01-01';
				return value;
			},

			//校验整数
			fixInt : function(value){

				value = value.replace(/[^0-9]/g, '');
				if(value.match(/^0+/))
					value = value.replace(/^0+/, '');

				value = parseInt(value);
				if(!value)
					value = 0;

				return value;
			}

		}
	}
,
	
	//弹出浮窗iframe
	popFrame : function(obj, src, w, h){
		JTOOL.setDisplay(JTOOL.popdivobject, false);

		var frame = null;
		frame = this.$(this._JTOOL_WINDOW_FRAME);
		if(!frame){
			frame = document.createElement("div");
			frame.id = this._JTOOL_WINDOW_FRAME;
			frame.innerHTML = '<iframe width="100%" height="100%" frameborder="0" src="about:blank"></iframe>';
			frame.style.cssText = 'BORDER-RIGHT: #999999 1px solid; BORDER-TOP: #999999 1px solid; FONT-SIZE: 12px; BORDER-LEFT: #999999 1px solid; BORDER-BOTTOM: #999999 1px solid; POSITION: absolute; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: left';
			document.body.appendChild(frame);
		}
		var linker = frame.childNodes[0];
		if(linker.src != src)
			linker.src = src;
		linker.width = w;
		linker.height = h;
		frame.style.width = w;
		frame.style.height = h;
		JTOOL.floatFlow(frame, obj);
		JTOOL.popdivobject = frame;
		JTOOL.addEvent(document, 'mousemove', JTOOL.popDivEvent);
	}
,
	//弹出浮层
	popDiv : function(obj, text, w, h){
		JTOOL.setDisplay(JTOOL.popdivobject, false);

		var pdiv = null;
		pdiv = this.$(this._JTOOL_WINDOW_POPDIV);
		if(!pdiv){
			pdiv = document.createElement("div");
			pdiv.id = this._JTOOL_WINDOW_POPDIV;
			pdiv.style.cssText = 'BORDER-RIGHT: #999999 1px solid; BORDER-TOP: #999999 1px solid; FONT-SIZE: 12px; BORDER-LEFT: #999999 1px solid; BORDER-BOTTOM: #999999 1px solid; POSITION: absolute; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: left';
			document.body.appendChild(pdiv);
		}
		pdiv.style.width = w;
		pdiv.style.height = h;
		pdiv.innerHTML = text;
		JTOOL.floatFlow(pdiv, obj);
		JTOOL.popdivobject = pdiv;
		JTOOL.addEvent(document, 'mousemove', JTOOL.popDivEvent);
	}
,
	//鼠标移出浮层后关闭
	popDivEvent : function(fev){
		var mousePostion = Array(), expand = 30;
		if(fev && fev.pageX && fev.pageY){
			mousePostion = { 
				'x':fev.pageX, 
				'y':fev.pageY
			}; 
		}else{
			mousePostion = { 
				'x':event.clientX + document.body.scrollLeft - document.body.clientLeft, 
				'y':event.clientY + document.body.scrollTop  - document.body.clientTop
			}; 
		}
		if(
			mousePostion.x < JTOOL.popdivobject.offsetLeft - expand || 
			mousePostion.x > JTOOL.popdivobject.offsetLeft + JTOOL.popdivobject.offsetWidth + expand ||
			mousePostion.y < JTOOL.popdivobject.offsetTop - expand ||
			mousePostion.y > JTOOL.popdivobject.offsetTop + JTOOL.popdivobject.offsetHeight + expand
		){
			JTOOL.setDisplay(JTOOL.popdivobject, false);
			JTOOL.removeEvent(document, 'mousemove', JTOOL.popDivEvent);
		}
	}
,

	//漂浮跟随对象
	floatFlow : function(src, obj, over){

		//src.style.left = -10000;
		JTOOL.setDisplay(src, true);

		var p = JTOOL.getPosition(obj);

		//窗口有效区域
		var winWidth = document.body.clientWidth;
		var winHeight = document.body.clientHeight;

		//检测左右边界
		if(
			(p['rx'] - src.offsetWidth - winWidth / 4) 
			> 
			(winWidth - (p['rx'] + src.offsetWidth)))
		{
			//向左显示
			p['x'] -= src.offsetWidth - obj.offsetWidth;
			//x -= src.offsetWidth;
		}else{
			//向右显示
		}

		//检测上下边界
		if(
			(p['ry'] - src.offsetHeight - winHeight / 4) 
			> 
			(winHeight - (p['ry'] + src.offsetHeight)))
			//(winHeight - (p['ry'] + obj.offsetHeight + src.offsetHeight)))
		{
			//向上显示
			if(!over)
				p['y'] -= src.offsetHeight;
			else
				p['y'] -= src.offsetHeight - obj.offsetHeight;
		}else{
			//向下显示
			if(!over)
				p['y'] += obj.offsetHeight;
		}

		src.style.left = p['x'];
		src.style.top = p['y'];
	}
,

	//取色器
	ColorPick : {

		target	: null,
		priview	: null,
		panel	: null,

		ishow	: false,
		value	: null,

		init	: function(){

			var RGB = ['00','33','66','99','CC','FF'];
			var html = "<iframe style=\"position:absolute; z-index:-1; width:100%; height:100%; top:0; left:0; scrolling:no;\" frameborder=\"0\"></iframe>";
			html += '<table cellspacing="0">'; 
			var i = 0;
			for(r in RGB)
				for(g in RGB)
					for(b in RGB){
						var c = RGB[r] + RGB[g] + RGB[b];
						if(i % 18 == 0) html += '<tr>';
						html += '<td style="cursor:pointer;height:6px;width:6px;padding:0;background: #' + c + ';" title="#' + c + '" onclick="JTOOL.ColorPick.pick(\'#' + c + '\')"><\/td>';
						i ++;
					}
			html += '<\/table>';
			
			var panel = document.createElement("DIV");
			panel.style.cssText = "height:90px;border:1px solid black;position:absolute;z-index:999;";
			panel.innerHTML = html;

			var priview = document.createElement("SPAN");
			priview.style.cssText = "width:39px;height:15px;border:1px solid #000000;font-size:10px;";
			priview.innerHTML = '#000000';
			panel.appendChild(priview);

			var enter = document.createElement("SPAN");
			enter.style.cssText = "border:1px solid #000000;cursor: hand;width:35px;height:15px;text-align:center;font-size:10px;cursor:pointer;";
			enter.innerHTML = "&nbsp;确定&nbsp;";
			enter.onclick = this.enter;
			enter.handle = this;
			panel.appendChild(enter);

			var cancel = document.createElement("SPAN");
			cancel.style.cssText = "border:1px solid #000000;cursor: hand;width:35px;height:15px;text-align:center;font-size:10px;cursor:pointer;";
			cancel.innerHTML = "&nbsp;取消&nbsp;";
			cancel.onclick = this.cancel;
			cancel.handle = this;
			panel.appendChild(cancel);

			document.body.appendChild(panel);

			this.panel = panel;
			this.priview = priview;

			panel = null;
			priview = null;
		},

		open : function(element){
			if(!this.ishow || this.target != element){
				this.target = element;
				this.value = element.value;
				if(!this.panel)
					this.init();
				else
					JTOOL.setDisplay(this.panel, true);
				JTOOL.floatFlow(this.panel, element);
				this.ishow = true;
			}else{
				this.close();
			}
		},

		close : function(){
			if(this.panel){
				JTOOL.setDisplay(JTOOL.ColorPick.panel, false);
				this.ishow = false;
			}
		},

		pick : function(color){
			var priview = this.priview;
			var target = this.target;

			priview.innerHTML = color;
			priview.style.backgroundColor = color;
			target.value = color;
			if(target.onchange)
				target.onchange();
				
			priview = null;
			target = null;
		},

		enter : function(){
			this.handle.close();
			if(this.handle.target.onchange)
				this.handle.target.onchange();
		},

		cancel : function(){
			this.handle.target.value = this.handle.value;
			this.handle.close();
			if(this.handle.target.onchange)
				this.handle.target.onchange();
		}
	}

,	//Cookie操作
	Cookie : {

		//设置Cookie值
		set : function(name, value, hours, path, domain, secure){
			var str = "";
			var date = new Date();
			date.setHours(date.getHours() + hours);
			str = name + "=" + escape(value);
			if(hours)
				str += ";expires=" + date.toGMTString();
			if(path)
				str += ";path=" + path;
			if(domain)
				str += ";domain=" + domain;
			if(secure)
				str += ";secure";
			document.cookie = str;

			str = null;
			date = null;
			return value;
		},

		//取出Cookie值
		get : function(name){
			var result = null;
			var rs = new RegExp("(^|)" + name + "=([^;]*)(;|$)","gi").exec(document.cookie);
			if(rs)
				result = unescape(rs[2]);
			rs = null;
			return result;
		}

	}
,
	//发送请求
	sendAction : function(src){
		var sender = new Image();
		sender.src = src;
		sender.onload = function(){clear(this, 1);};
		sender.onerror = function(){clear(this, -1);};
		sender.onabort = function(){clear(this, -2);};
		function clear(obj, code){
			obj.onerror = null;
			obj.onload = null;
			obj.onabort = null;
			obj = null;
		}
	}
,
	////预载入图像
	preloadImg : function(src){
		this.sendAction(src);
	}

}

//生成脚本容器
JTOOL.setContainerRoot();

}