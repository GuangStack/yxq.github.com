
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Language" content="zh-cn" />

<title>成功故事_世纪佳缘交友网</title>
<script type="text/javascript" src="{{ url('/home/js/jroot.js') }}"></script>
<script type="text/javascript" src="{{ url('/home/js/sucstory_common.js') }}"></script>
<!-- <script type="text/javascript" src="http://images1.jyimg.com/w4/jsLib/JY.login.js"></script> -->
<link type="text/css" href="http://images1.jyimg.com/w4/sucstory/c/reset10   0330.css?123456" rel="stylesheet" media="all" />
<link type="text/css" href="http://images1.jyimg.com/w4/sucstory/c/space100330.css?123456" rel="stylesheet" media="all" />
<style>
html,body{*height:auto;_height:100%;}
</style>
</head>
<script type="text/javascript">
var browse = window.navigator.appName.toLowerCase();
var Speed = 10; //速度(毫秒)
Speed = (browse.indexOf("opera") > -1) ? Speed/2 : Speed; //opera速度加倍
var Space = 10; //每次移动(px)
var PageWidth = 137; //翻页宽度
var fill = 0; //整体移位
var MoveLock = false; //移动锁
var MoveTimeObj; //移动对象
var MoveWay="right"; //移动方向
var photoNum = 1;//照片数量
var showNumMax = 4;//最大小照片显示数量
var Comp = 0;
var no_change_left = 0;
var no_change_right = 0;
var showArea_width = PageWidth * photoNum;
var photo = [{"src":"http:\/\/photos11.jiayuan.com\/9a\/b0\/79b031c9a74b66e3331baac303fb\/s_428666b_0.jpg","small_src":"http:\/\/photos11.jiayuan.com\/9a\/b0\/79b031c9a74b66e3331baac303fb\/s_428666m_0.jpg","url":"http:\/\/love.jiayuan.com\/photo_detail.php?pid=212095","title":"hunsha"}];//所有图片链接
var curNum = 0;//当前图片的位置

//设置域 为了弹出页面的js操作
var reg_host_const_flag = 0;
var reg_host_const_test = 0;

function setDomainForIframe(){ 
   if(reg_host_const_flag == 0 || reg_host_const_flag == 7) {
	  if(reg_host_const_test == 1){ 
		 document.domain = 'miuu.cn';
	  }else{
		 document.domain = 'jiayuan.com';
	  }
   }else{
	  if(reg_host_const_test == 1){ 
		 document.domain = 'miuu.cn';
	  }else{
		 document.domain = 'msn.com.cn';
	  }
   }
}


function $(objId)
{
	if(document.getElementById)
	{
		return eval('document.getElementById("'+objId+'")')
	}
	else
	{
		return eval('document.all.'+objId)
	}
}
//解决和jquery冲突
function getE(objId){
	if(document.getElementById){
		return eval('document.getElementById("'+objId+'")')
	}
	else{
		return eval('document.all.'+objId)
	}
}

function goleft_start()
{
	clearInterval(MoveTimeObj);
	if(MoveLock)
		return;
		change_over_class(getE('goright'), 'goright_s');
		MoveLock=true;
	MoveWay="left";
	goleft();
	MoveTimeObj=setInterval('goleft();',Speed);
}

function goleft_stop()
{
	if(MoveWay == "right")
	{
		return
	}
	clearInterval(MoveTimeObj);
	if((getE('photos').scrollLeft - fill) % PageWidth != 0)
	{
		Comp=fill - (getE('photos').scrollLeft % PageWidth);
		CompScr();
	}
	else
	{
		MoveLock=false;
	}
}

function goleft()
{
	getE('photos').scrollLeft -= Space;
	if(getE('photos').scrollLeft == 0){
		change_over_class(getE('goleft'), 'goleft_s_end');
	}
}

function goright_start()
{
	clearInterval(MoveTimeObj);
	if(MoveLock)
		return;
		change_over_class(getE('goleft'), 'goleft_s');
		MoveLock=true;
	MoveWay="right";
	goright();
	MoveTimeObj=setInterval('goright()',Speed);
}

function goright_stop()
{
	if(MoveWay == "left")
		return;
	clearInterval(MoveTimeObj);
	if(getE('photos').scrollLeft % PageWidth - (fill >= 0 ? fill : fill + 1) != 0)
	{
		Comp = PageWidth - getE('photos').scrollLeft % PageWidth + fill;
		CompScr();
	}
	else
	{
		MoveLock=false
	}
}

function goright()
{
	getE('photos').scrollLeft += Space;
	if(getE('photos').scrollLeft == (showArea_width - PageWidth*showNumMax)){
		change_over_class(getE('goright'), 'goright_s_end');
	}
}

function CompScr()
{
	if(Comp==0)
	{
		MoveLock=false;
		return;
	}
	var num, TempSpeed=Speed , TempSpace=Space;
	if(Math.abs(Comp) < PageWidth/2)
	{
		TempSpace = Math.round(Math.abs(Comp/Space));
		if(TempSpace<1)
			TempSpace=1;
	}
	if(Comp<0)
	{
		if(Comp<-TempSpace)
		{
			Comp += TempSpace;
			num = TempSpace;
		}
		else
		{
			num =- Comp;
			Comp = 0;
		}
		getE('photos').scrollLeft -= num;
		if(getE('photos').scrollLeft == 0){
			change_over_class(getE('goleft'), 'goleft_s_end');
		}
		setTimeout('CompScr()', TempSpeed)
	}
	else
	{
		if(Comp>TempSpace)
		{
			Comp -= TempSpace;
			num = TempSpace;
		}
		else
		{
			num = Comp;
			Comp = 0;
		}
		getE('photos').scrollLeft += num;
		if(getE('photos').scrollLeft == (showArea_width - PageWidth*showNumMax)){
			change_over_class(getE('goright'), 'goright_s_end');
		}
		setTimeout('CompScr()', TempSpeed);
	}
}

function setclassname(obj)
{
	var p = getE('showArea').getElementsByTagName('span');
	for (var i=0; i<p.length; i++) {
		if(obj.id!=p[i].id)
		{
			p[i].className='';
		}
		else
		{
			p[i].className='imgon';
		}
	}
}

var _flag=false;
function DrawImage(ImgD,iwidth,iheight){
	var image=new Image();
	//var iwidth = 700; //定义允许图片宽度，当宽度大于这个值时等比例缩小
	//var iheight = 700; //定义允许图片高度，当宽度大于这个值时等比例缩小
	image.src=ImgD.src;
	if(image.width>iwidth || image.height>iheight){
		_flag=true;
		if(image.width/image.height>= iwidth/iheight){
			if(image.width>iwidth){ 
				ImgD.width=iwidth;
				ImgD.height=(image.height*iwidth)/image.width;
			}else{
				ImgD.width=image.width; 
				ImgD.height=image.height;
			}

			ImgD.alt=image.width+"×"+image.height;
		}else{
			if(image.height>iheight){ 
				ImgD.height=iheight;
				ImgD.width=(image.width*iheight)/image.height; 
			}else{
				ImgD.width=image.width; 
				ImgD.height=image.height;
			}
			ImgD.alt=image.width+"×"+image.height;
		}
	}
	if(ImgD.id == 'mainImg'+curNum){
		ImgD.style.display = 'block';
		getE('loadingTip').style.display = 'none';
	}
}

function change_over_class(_obj, _classname){
	_obj.className = _classname;
}

function left_mouseout(){
	if(getE('goleft').className == 'goleft_s_end'){
		
	}else{
		if(no_change_left == 0){
			change_over_class(getE('goleft'), 'goleft_s')
		}else{
			no_change_left = 0;
		}
	}
}

function right_mouseout(){
	if(getE('goright').className == 'goright_s_end'){
		
	}else{
		if(no_change_right == 0){
			change_over_class(getE('goright'), 'goright_s')
		}else{
			no_change_right = 0;
		}
	}
}

function left_mouseover(){
	if(getE('goleft').className == 'goleft_s_end'){
		no_change_left = 1;
	}else{
		change_over_class(getE('goleft'), 'goleft_s_over')
	}
}

function right_mouseover(){
	if(getE('goright').className == 'goright_s_end'){
		no_change_right = 1;
	}else{
		change_over_class(getE('goright'), 'goright_s_over')
	}
}

function changeFocusImage(_focusNum){
	for(var i=0; i<photoNum; i++){
		getE("small_img_span_"+i).className = "";
	}
	getE("small_img_span_"+_focusNum).className = "imgon";
}

function imgChangeClick(to){
	getE("mainImg"+curNum).style.display = 'none';
	curNum = to;
	changeFocusImage(to);
	//更改大图宽高
	var curId = "mainImg"+to;
	if(getE(curId)){
		getE(curId).style.display = 'block';
	}else{
		getE("loadingTip").style.display = "block";
		var html = '<img  id="'+curId+'" src="'+photo[to].src+'?123456" onload="DrawImage(this,500,375)" style="cursor:pointer;display:none" title="'+photo[to].title+'" />';
		getE("big_photo_list").innerHTML += html;
	}
}

function closeBodytopbg()
{ 
	getE("boxgbbj").className = 'container confix container2';
}
//add by ly for pre or next cur begin

function getCookieS(c_name)
{
	if (document.cookie.length>0)
  {
		c_start=document.cookie.indexOf(c_name + "=");
		if (c_start!=-1)
		{ 
			c_start=c_start + c_name.length+1;
			c_end=document.cookie.indexOf(";",c_start);
			if (c_end==-1)
				c_end=document.cookie.length;
			return decodeURIComponent(document.cookie.substring(c_start,c_end));
		}
	}
	return null;
}

function setCookieS(c_name,value,expiredays)
{
	var exdate=new Date();
	exdate.setDate(exdate.getDate()+expiredays);
	document.cookie=c_name+ "=" +escape(value)+((expiredays==null) ? "" : ";expires="+exdate);
}

window.onload = function(){
	var clicktag = 0;
	getE("spanL").onclick = function () {
		if(clicktag == 1) return;
		clicktag = 1;
		if(curNum>0){
			var toNum = curNum-1;
			if(toNum+1<photoNum-showNumMax+1){
				getE("goleft").onmousedown();
				getE("goleft").onmouseup();
			}
			imgChangeClick(toNum);
		}
		setTimeout(function () { clicktag = 0 }, 500);  
	} ;
	getE("spanL").style.cursor = "url('http://images1.jyimg.com/w4/service/i/pre1.cur'),auto";
	getE("spanL").title = "上一张";

	getE("spanR").onclick = function () {
		if(clicktag == 1) return;
		clicktag = 1;
		if(curNum+1<photoNum){
			var toNum = curNum+1;
			if(toNum+1>showNumMax){
				getE("goright").onmousedown();
				getE("goright").onmouseup();
			}
			imgChangeClick(toNum);
		}
		setTimeout(function () { clicktag = 0 }, 500);  
	} ;
	getE("spanR").style.cursor = "url('http://images1.jyimg.com/w4/service/i/next1.cur'),auto";
	getE("spanR").title = "下一张";

}
function addFavorite_xj(){  
    if (document.all){  
        try{  
			window.external.AddFavorite('http://love.jiayuan.com/myspace.php?id=428666','世纪佳缘（平平淡淡才是真）www.jiayuan.com');
        }catch(e){  
            alert( "收藏本页失败，请使用Ctrl+D进行添加" );  
        }  
          
    }else if (window.sidebar){  
		try{  
			window.external.addPanel('世纪佳缘（平平淡淡才是真）www.jiayuan.com','http://love.jiayuan.com/myspace.php?id=428666','');
        }catch(e){  
            alert( "收藏本页失败，请使用Ctrl+D进行添加" );  
        } 
    }else{  
        alert( "收藏本页失败，请使用Ctrl+D进行添加" );
    }  
} 
function setData_xj(){  
    if (navigator.userAgent.indexOf("MSIE") == -1)
	{
		alert("您的浏览器不支持此功能,请手工复制文本框中内容");
		return false;
	}else{
		window.clipboardData.setData('Text','http://love.jiayuan.com/myspace.php?id=428666');alert('空间地址（http://love.jiayuan.com/myspace.php?id=428666）已复制，您可以在QQ、MSN、邮箱或论坛上直接粘贴，向朋友推荐本爱情空间！');
	}
}   
//add by ly for pre or next cur end
</script>

<body>
<script type="text/javascript" src="http://images1.jyimg.com/js/header/head_white.js"></script>
<!--msn交友流量统计代码-->
<script type="text/javascript">
	if(document.domain == 'msn.jiayuan.com' || document.domain == 'jiayuan.msn.com.cn') {	
		var cImage; 
		cImage = new Image; 
		cImage.src = "http://c.msn.com.cn/c.gif?DI=6685&PI=33235&TP=http://www.msn.com.cn/msnmobile/msnfashiontemplate/Default.asp&PS=70635&NA=1154&NC=10009";
	}
 </script>
 
<div class="container confix">
<!-- kuangjia top -->
<div class="story_all">
<div class="spacebanner">
<img src="http://images1.jyimg.com/w4/sucstory/i/space_banner1.jpg" />
<p class="p1"><font class="font14b654688">
平平淡淡才是真
</font></p>
<p class="p2"><font class="font12654688">http://love.jiayuan.com/myspace.php?id=428666 > <a href="javascript:;" onclick="setData_xj();" class="a2">发给朋友</a> > <a href="javascript:;" onclick="addFavorite_xj();" class="a2">收藏本页</a></font></p>
</div>
</div>

<!-- kuangjia left -->
<div class="story_left">


<div class="box">
<h2><span><a href="http://xingfu.jiayuan.com/" class="a2">返回频道首页</a>>><a href="http://love.jiayuan.com/result.php?from_search=28&list=1" class="a2">最新上传故事列表页</a>>>空间页</span><font class="font14b654688">成功故事相册</font>&nbsp;&nbsp;（共&nbsp;1&nbsp;张，点击小图，查看大图）</h2>
<div class="content">

<div id="tbody">

<div id="b_box">
<a name="maodian_photo" style="float:left; width:100%; height:0; line-height:0; overflow:hidden;">&nbsp;</a>
<div id="mainbody" style="position:relative;">
<!-- add by ly begin-->
<div id="spanL" style="position:absolute;height:395px;top:0px;left:84px;z-index:1001;width:250px;background:#fff;filter:alpha(Opacity=0);opacity:0;">&nbsp;</div>
<div id="spanR" style="position:absolute;height:395px;top:0px;left:334px;z-index:1001;width:250px;background:#fff;filter:alpha(Opacity=0);opacity:0;">&nbsp;</div>
<!-- add by ly end -->
<table border="0" cellspacing="0" cellpadding="0" width="500" height="375"><tr><td id="big_photo_list" valign="middle" align="center">
<p align="center" id="loadingTip"><img src="http://images1.jyimg.com/w4/search/v2_1/i/loadingTip.gif">&nbsp;&nbsp;照片加载中……</p>
<img  id="mainImg0" src="http://photos11.jiayuan.com/9a/b0/79b031c9a74b66e3331baac303fb/s_428666b_0.jpg?123456" onload="DrawImage(this,500,375)" style="cursor:pointer;display:none" title="hunsha" />
<!--<div id="spanR" style="position:absolute;top:308px;left:335px;z-index:1001;width:335px;background:#fff;filter:alpha(Opacity=0);opacity:0;">&nbsp;</div>-->
</td></tr></table>
</div>
</div>

<div id="s_box">
<span id="goleft" onmousedown="goleft_start()" onmouseup="goleft_stop()" onmouseout="goleft_stop();left_mouseout();" onmouseover="left_mouseover()" class="goleft_s_end"></span>

<div id="photosbg">
<div id="photos">
<div id="showArea">
<!--小图列表-->
<span id="small_img_span_0" class="imgon"><table width="100" height="75"><tr><td valign="middle" align="center"><a href="javascript:void(0);" onclick="imgChangeClick(0);"><img src="http://photos11.jiayuan.com/9a/b0/79b031c9a74b66e3331baac303fb/s_428666m_0.jpg?123456" onload="DrawImage(this,100,75)" id="small_img_0" title="hunsha" style="cursor:pointer;" /></a></td></tr></table></span>
</div>
</div>
</div>
<span id="goright" onmousedown="goright_start()" onmouseup="goright_stop()" onmouseout="goright_stop();right_mouseout();" onmouseover="right_mouseover()" class="goright_s_end"></span>
</div>
<script type="text/javascript">
	getE('showArea').style.width = showArea_width + 'px';
</script>
</div>

</div>
<b class="l4"></b><b class="l3"></b><b class="l2"></b><b class="l1"></b>
</div>

<div class="box aqgs">
<h2><font class="font14b654688">我们的爱情故事</font></h2>
<div class="content">
<div class="contentlist">
<p><font class="font14b654688"><span>2016-03-06 21:38:16</span>缘来是你</font></p>
<div class="aqgscon">
<p>　　2015年11月7日，我在世纪佳缘认识了他。在网上我们就聊的挺好的，有约见面的想法。想起我们第一次见面的场景，一辈子也忘不了。她的出现，让我认定这就是今生注定的缘分。<br />
<br />
　　说起来不好意思，我们见了3次面，就确定了恋爱关系。恋爱的时候，亲手为我做饭菜。就是他做过最浪漫的事儿了，哈哈日常生活中免不了分歧或争执，我们也常会因为一些鸡毛蒜皮的小事而争执，但很快就过去了。家人现在还不知道我们的事情，我们…</p>
</div>
<p><span><font class="font14b654688">评论(0)&nbsp;&nbsp;阅读(580)&nbsp;&nbsp;<a href="http://www.jiayuan.com/story/story_detail.php?sid=428667" class="a2" target="_blank">点击此处查看原文>></a></font></span></p>
</div> 

<div class="pageclass">

</div>

</div>
<b class="l4"></b><b class="l3"></b><b class="l2"></b><b class="l1"></b>
</div>

<div class="box aqgs">
	<h2><font class="font14b654688">更多幸福故事</font></h2>
    <div class="content">
		<div class="content_like">
        	<ul>
            	            	<li><a href="myspace.php?id=75139" target="_blank"><img src="http://images1.jyimg.com/w4/global/cms/uploadfile/2010/0818/20100818091102512.jpg" /><span>09年一场大病 见证了我们坚贞的爱情</span></a></li>
				            	<li><a href="subject/julifufu.html?id=75590" target="_blank"><img src="http://images4.jyimg.com/w4/global/cms/uploadfile/2011/0303/20110303093531660.jpg" /><span>独家曝光：大龄宅男女婚后爆笑生活</span></a></li>
				            	<li><a href="myspace.php?id=47918" target="_blank"><img src="http://images2.jyimg.com/w4/global/cms/uploadfile/2010/0623/20100623090733281.jpg" /><span>撕毁婚约到佳缘 对阳光男一见钟情</span></a></li>
				            	<li><a href="subject/the_three.html?id=57977" target="_blank"><img src="http://images.jiayuan.com/w4/global/cms/i/2010/05/20100510022235372.jpg" /><span>我们是不离不弃的半路夫妻</span></a></li>
				            </ul>
        </div>
    </div>
	<b class="l4"></b><b class="l3"></b><b class="l2"></b><b class="l1"></b>
</div>

<div class="box">
<a name="zhufu"></a>
<h2><font class="font14b654688">祝福留言</font></h2>
<div class="content">

<p id="zf01" class="words">
<a href="http://www.jiayuan.com/156189501?from=story&fxly=cp-pd-cggs"><img src="http://a1.jyimg.com/65/e5/c94de2faq6edf3e4b9ff91664b8a/c94de2fad_1_avatar_p.jpg" alt="" /></a><span><a href="http://www.jiayuan.com/156189501?from=story&fxly=cp-pd-cggs" class="a3">金浩泽&nbsp;&nbsp;23岁&nbsp;&nbsp;吉林 长春&nbsp;&nbsp;&nbsp;&nbsp;本科&nbsp;&nbsp;质控/安检</a>&nbsp;&nbsp;2016年09月11日 19:05:21<br/>　　祝你们幸福长久</span>
</p>

<div class="pageclass">

</div>

<div id="fbzf">
<p><font class="font14b654688">发表祝福</font></p>

<form id="post_form" name="post_form" method="post" action="">
<p class="zcyx">昵称:<input id="name" name="name" type="text" class="inputstyle1" disabled="disabled" value="哈哈"/></p>
<textarea name="comment_content" id="comment_content" cols="" rows="" onclick="if(this.value=='内容为100汉字以内，欢迎发表！')this.value='';" onblur="if(this.value=='')this.value='内容为100汉字以内，欢迎发表！';">内容为100汉字以内，欢迎发表！</textarea>
<p class="yzfb">验证码:<input name="veri_code" id="veri_code" type="text" class="inputstyle2" size="4" />
<img src="/antispam_v2.php?hash=" style="width:75px;height:18px;vertical-align: middle;" alt="" id="antispam_v2"/><script type="text/javascript">function con_code(){var ran= Math.round((Math.random()) * 100000000);document.getElementById("antispam_v2").src = "/antispam_v2.php?r=" + ran;}</script><input type="hidden" name="hash" value="" />
<a href="javascript:send();" class="a5"><span>发表</span></a></p>
</form>
<script language="javascript">
function login()
{
	  //登录条登录表单
  JY.login.submit(document.getElementById("login_form"), function(user){
	if(user && user['uid']>0){
		if(user['errno']==-5){
		location.href=user['url'];
		return false;
		}else if(user['type']==20){//完善资料
		location.href=user['url'];
		return true;
		}
		window.setTimeout(function(){
			location.href= location.href;
		},100);
        
	 }else if(user && user['errno']==-1){
		location.href=user['url'];
		return false;
	 }else if(user && user['errno']==-2){
		alert('登录失败，该用户资料已关闭');
		}else{
		alert('密码错误，请核实您的登录密码');
	 }
	 //无限次尝试登录；
	 JY.login.tryTimes=0;
	});
}
function send()
{
	var password = document.getElementById("veri_code").value;
	var	content = document.getElementById("comment_content").value;

	if(password == '')
	{
		alert("请输入验证码，谢谢！");
		return;
	}

	if(password.length != 5)
	{
		alert("验证码错误！");
		return;
	}

	if(content.length<1 || content=='内容为100汉字以内，欢迎发表！')
	{
		alert("请输入祝福留言！");
		return;
	}

	if(getlength(content) > 200)
	{
		alert("内容为100汉字以内！");
		return;
	}
	document.post_form.submit();
}

function con_code()
{
	var ran= Math.round((Math.random()) * 100000000);
	document.getElementById("antispam_v2").src = "/antispam_v2.php?r=" + ran;
}

function getlength(str)
{
	var	d = (str.match(/[\x00-\xff]/g)||" ").length;
	var	s = str.length-d;
	var	alllen = d+s*2;
	return alllen;
 }

</script>
</form>
</div>

</div>
<b class="l4"></b><b class="l3"></b><b class="l2"></b><b class="l1"></b>
</div>


</div>

<!-- kuangjia right -->
<div class="story_right">

<div class="box">
<h3><em></em><font class="font14b654688">成功故事主人公</font></h3>
<dl class="zrg">

<dd><img src="http://images1.jyimg.com/w4/story/i/baomi_f.jpg" /><font class="font12b654688">保密</font></dd>
<dd><a href="http://www.jiayuan.com/120699148?from=story&fxly=cp-pd-cggs" target="_blank"><img width="65" src="http://a2.jyimg.com/9a/b0/79b031c9a74b66e3331baac303fb/79b031c9a_1_avatar_p.jpg" alt="" /></a><font class="font12b654688"><a href="http://www.jiayuan.com/120699148?from=story&fxly=cp-pd-cggs" target="_blank">路人甲</a></font><br/>30岁<br/>湖南<br/>2014年09月<br/>注册世纪佳缘</dd>
<dt>2016年03月06日 他们宣布：<br/><span>我们热恋了</span></dt>
</dl>
</div>

<div class="box box1">
<div class="content">
<p class="con14">已有 <font class="fontbFF3366">506</font> 位朋友访问过我们的空间，其中，有 <font class="fontbFF3366">1</font> 人留下了他们的祝福！</p>
<p class="btn"><a href="#fbzf" class="a5 a7">留下我的祝福</a></p>
</div>
<b class="l4"></b><b class="l3"></b><b class="l2"></b><b class="l1"></b>
</div>

<div class="box">
<h3><em></em><font class="font14b654688">我们的故事列表</font></h3>
<div class="content">
<ul class="con" style="height:auto;">
<li><a href="http://www.jiayuan.com/story/story_detail.php?sid=428667" class="a3">缘来是你</a></li>
</ul>
</div>
<b class="l4"></b><b class="l3"></b><b class="l2"></b><b class="l1"></b>
</div>

<div class="box" style="position:relative">
<div class="ad_common_icon ad_common_rt"></div> 
	<iframe src="http://images.jiayuan.com/w4/html/sucstory_3_1_5.html"
			width="250px"
			height="250px"
			scrolling="no"
			frameborder="0">
	</iframe>
</div>

<script src="http://images1.jyimg.com/w4/sucstory/j/login_banner.js" type="text/javascript"></script>

<div class="box">
<h3><em></em><font class="font14b654688">小龙女祝福留言</font></h3>
<div class="content">
<p class="con">祝你们永结同心，百年好合！新婚愉快，甜甜蜜蜜！ </p>
<p class="conr">小龙女</p>
</div>
<b class="l4"></b><b class="l3"></b><b class="l2"></b><b class="l1"></b>
</div>

<div class="box">
<h3><em></em><font class="font14b654688">最新的访客</font></h3>
<div class="content">
<ul class="sex">
<li class="m"><a href="http://www.jiayuan.com/156189501?from=story&fxly=cp-pd-cggs" target="_blank">金浩泽</a></li>
</ul>
</div>
<b class="l4"></b><b class="l3"></b><b class="l2"></b><b class="l1"></b>
</div>

<div class="box" style="position:relative">
<div class="ad_common_icon ad_common_rt"></div>
	<iframe src="http://images.jiayuan.com/w4/html/sucstory_3_2_5.html"
			width="250px"
			height="100px"
			scrolling="no"
			frameborder="0">
	</iframe>
</div>

<div class="box">
    <h3><em></em><font class="font14b654688">关键词</font></h3>
	<script type="text/javascript">
    //字符转换为UTF-8编码
    function EncodeUtf8(s1)
    {
          var s = escape(s1);
          var sa = s.split("%");
          var retV ="";
          if(sa[0] != "")
          {
             retV = sa[0];
          }
          for(var i = 1; i < sa.length; i ++)
          {
               if(sa[i].substring(0,1) == "u")
               {
                   retV += Hex2Utf8(Str2Hex(sa[i].substring(1,5)));
                  
               }
               else retV += "%" + sa[i];
          }
         
          return retV;
    }
    function Str2Hex(s)
    {
          var c = "";
          var n;
          var ss = "0123456789ABCDEF";
          var digS = "";
          for(var i = 0; i < s.length; i ++)
          {
             c = s.charAt(i);
             n = ss.indexOf(c);
             digS += Dec2Dig(eval(n));
              
          }
          //return value;
          return digS;
    }
    function Dec2Dig(n1)
    {
          var s = "";
          var n2 = 0;
          for(var i = 0; i < 4; i++)
          {
             n2 = Math.pow(2,3 - i);
             if(n1 >= n2)
             {
                s += '1';
                n1 = n1 - n2;
              }
             else
              s += '0';
             
          }
          return s;
         
    }
    function Dig2Dec(s)
    {
          var retV = 0;
          if(s.length == 4)
          {
              for(var i = 0; i < 4; i ++)
              {
                  retV += eval(s.charAt(i)) * Math.pow(2, 3 - i);
              }
              return retV;
          }
          return -1;
    }
    function Hex2Utf8(s)
    {
         var retS = "";
         var tempS = "";
         var ss = "";
         if(s.length == 16)
         {
             tempS = "1110" + s.substring(0, 4);
             tempS += "10" + s.substring(4, 10);
             tempS += "10" + s.substring(10,16);
             var sss = "0123456789ABCDEF";
             for(var i = 0; i < 3; i ++)
             {
                retS += "%";
                ss = tempS.substring(i * 8, (eval(i)+1)*8);
               
               
               
                retS += sss.charAt(Dig2Dec(ss.substring(0,4)));
                retS += sss.charAt(Dig2Dec(ss.substring(4,8)));
             }
             return retS;
         }
         return "";
    }
    
    function jump(_num){
    	var encode_str = EncodeUtf8(document.getElementById('keywords' + _num).getElementsByTagName("font")[0].innerHTML);
    	window.open('http://'+mydomain+'/story/keywords.php?from_search=2&keywords=' + encode_str);
    }
    </script>
    <div class="content">
        <div class="tags">
            <a id="keywords2" onClick="jump('2')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#636363">再婚</font></a>
            <a id="keywords3" onClick="jump('3')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#009900">异地恋</font></a>
            <a id="keywords4" onClick="jump('4')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#636363">80后</font></a>
            <a id="keywords5" onClick="jump('5')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#636363">浪漫</font></a>
            <a id="keywords6" onClick="jump('6')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#0066CC">钻石男</font></a>
            <a id="keywords7" onClick="jump('7')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#FF6600">家长反对</font></a>
            <a id="keywords8" onClick="jump('8')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#990099">一波三折</font></a>
            <a id="keywords9" onClick="jump('9')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#636363">闪婚</font></a>
            <a id="keywords10" onClick="jump('10')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#636363">感人</font></a>
            <a id="keywords11" onClick="jump('11')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#FF0099">凤凰男</font></a>
            <a id="keywords12" onClick="jump('12')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#009900">巧合</font></a>
            <a id="keywords13" onClick="jump('13')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#636363">姐弟恋</font></a>
            <a id="keywords14" onClick="jump('14')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#636363">浪漫婚礼</font></a>
            <a id="keywords15" onClick="jump('15')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#0066CC">郎才女貌</font></a>
            <a id="keywords16" onClick="jump('16')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#FF6600">一见钟情</font></a>
            <a id="keywords17" onClick="jump('17')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#990099">跨国恋</font></a>
            <a id="keywords18" onClick="jump('18')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#636363">坚持</font></a>
            <a id="keywords19" onClick="jump('19')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#009900">平凡</font></a>
            <a id="keywords20" onClick="jump('20')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#0066CC">单亲爸爸</font></a>
            <a id="keywords21" onClick="jump('21')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#FF6600">三高女</font></a>
            <a id="keywords22" onClick="jump('22')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#990099">单亲妈妈</font></a>
            <a id="keywords23" onClick="jump('23')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#009900">70后</font></a>
            <a id="keywords24" onClick="jump('24')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#636363">型男</font></a>
            <a id="keywords25" onClick="jump('25')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#990099">缘分</font></a>
            <a id="keywords26" onClick="jump('26')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#636363">黄昏恋</font></a>
            <a id="keywords27" onClick="jump('27')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#009900">90后</font></a>
            <a id="keywords28" onClick="jump('28')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#990099">经济适用男</font></a>
            <a id="keywords29" onClick="jump('29')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#636363">小女人</font></a>
            <a id="keywords30" onClick="jump('30')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#0066CC">裸婚</font></a>
            <a id="keywords31" onClick="jump('31')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#009900">60后</font></a>
            <a id="keywords32" onClick="jump('32')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#990099">求婚</font></a>
            <a id="keywords33" onClick="jump('33')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#636363">海归男</font></a>
            <a id="keywords34" onClick="jump('34')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#990099">倒追</font></a>
            <a id="keywords35" onClick="jump('35')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#636363">忘年恋</font></a>
            <a id="keywords36" onClick="jump('36')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#990099">宅男</font></a>
            <a id="keywords37" onClick="jump('37')" href="#" onmouseover="send_jy_pv2('story_count_04');"><font color="#0066CC">海归女</font></a>
        </div>
    </div>
    <b class="l4"></b><b class="l3"></b><b class="l2"></b><b class="l1"></b>
</div>


</div>

</div>
<div style="width:930px; height:90px; padding:0px 10px; margin:10px auto 0 ;position:relative" ><div class="ad_common_icon ad_common_rt" style="right:10px"></div><iframe height="90px" width="930px" scrolling="no" frameborder="0" src="http://images.jiayuan.com/w4/html/sucstory_1_15_5.html"></iframe></div>

<!--注册弹窗，开始-->
<script src="http://images2.jyimg.com/w4/login/j/popupLogin_v2.js?d=1227" type="text/javascript"></script>
<script type="text/javascript">
if(getParam('fromad') == '58'){
	loginWindow.loadResource('http://images1.jyimg.com/w4/login/c/popupLogin_20110321.css?d=0701','css');
	loginWindow.openTPL({tplconfig:{key:555, callback:function(){
		location.reload();
	}}, initForm:true});
}
//获取URL参数
function getParam(paramName)
{
	paramValue = "";
	isFound = false;
	if(this.location.search.indexOf("?") == 0 && this.location.search.indexOf("=")>1){
		arrSource = unescape(this.location.search).substring(1,this.location.search.length).split("&");
		i = 0;
		while(i < arrSource.length && !isFound){
			if(arrSource[i].indexOf("=") > 0){
				 if(arrSource[i].split("=")[0].toLowerCase()==paramName.toLowerCase()){
					paramValue = arrSource[i].split("=")[1];
					isFound = true;
				 }
			}
			i++;
		}   
	}
   return paramValue;
}
</script>
<!--注册弹窗，结束-->

<script type="text/javascript" src="http://images1.jyimg.com/w4/sucstory/j/sucstory_footer.js"></script>

<script type="text/javascript"> 
function checkRealName(){
	var data = jy_head_function.check_real_name('real_name_deal');
	if(data==false) {send();}
}

function real_name_deal() {
	jy_head_function.lbg_hide();
	jy_head_function.del_real_name_cookie();
	send();
}

  var _gaq = _gaq || []; 
  _gaq.push(['_setAccount', 'UA-23142821-1']); 
  _gaq.push(['_trackPageview']); 

  (function() { 
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; 
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; 
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s); 
  })(); 

</script>
</body>
</html>