//弹出层

//$(function(){
//	$('.openBox').click(function(){
//		var iWidth=$(window).width();
//		var iHeight=$(window).height();
//		var iTop=(iHeight-$('.popBox').height())/2
//		var iLeft=(iWidth-$('.popBox').width())/2
//		
//		$('#popBg').css({opacity:0.5,height:$(document).height()}).show();
//		$('.popBox').fadeIn().css({top:iTop,left:iLeft})
//	})
//	$('.close').click(function(){
//		$('.popBox').hide();
//		$('#popBg').hide();
//	})
//})


function openBoxClick(uid,page,isLogin) {
	var oEvent = openBoxClick.caller.arguments[0];
	stopBubble(oEvent);
	$('#popBoxUrl').attr("src","#");
	var iWidth=$(window).width();
	var iHeight=$(window).height();
	 if (document.documentElement && document.documentElement.scrollTop) {
	var	s_h = document.documentElement.scrollTop;
	 } else {
	var	s_h = document.body.scrollTop;
	 }
	var iTop=(iHeight-$('.spopBox').height())/2+s_h;
	var iLeft=(iWidth-$('.spopBox').width())/2;
	$('#popBoxUrl').attr("src","pop.php?uid="+uid+"&page="+page) ;
	$('#spopBg').css({opacity:0.5,height:$(document).height()}).show();
	$('.spopBox').fadeIn().css({top:iTop,left:iLeft});
	if (location.href.indexOf('msn') < 0)
	{
		document.domain = JY.url.getSiteInfo()['topDomain']; //msg iframe要调close_popup
	}
	else
	{
		document.domain = 'msn.com.cn';
	}
	var profileStr = parseInt(page) == 1 ? "_index" : "";
	var loginVar   = isLogin ? 1 : 0;
	send_jy_pv2("|search_v2_profileClick_"+loginVar+profileStr);
}
function openBoxClose() {
		$('.spopBox').hide();
		$('#spopBg').hide();
}
function cutImage(obj,width,height){
	var img = new Image();
	img.src = obj.attr('src');
	var old_width = img.width;
	var old_height = img.height;
	var flag = (old_width/width) > (old_height/height) ? old_height/height : old_width/width;

	var this_width = old_width/flag;
	var this_height = old_height/flag;
	
	if(this_width < width) this_width = width;
	if(this_height < height) this_height = height;
	
	obj.width(this_width);
	obj.height(this_height);
	
	var offset_height = obj.height()*0.1;//距离顶部的高度百分比10%
	var offset_width = (obj.width() - width)/2;
	
	if(old_width < old_height){
		obj.css('left','0px');
		if(obj.height()*0.9 > height){
			obj.css('top','-'+offset_height+'px');
		}else{
			obj.css('top','0px');
		}
	}else if(old_width > old_height){
		obj.css('left','-'+offset_width+'px');
		obj.css('top','0px');
	}else{
		obj.css('left','0px');
		obj.css('top','0px');
	};
}

//统计个人资料点击量
 function profileClickCount(isLogin,page){
	var profileStr = parseInt(page) == 1 ? "_index" : "";
	var loginVar   = isLogin ? 1 : 0;
	send_jy_pv2("|search_v2_profileClick_"+loginVar+profileStr);
 }
//统计弹出层中资料点击量
 function PopProfileClickCount(isLogin,page){
	var profileStr = parseInt(page) == 1 ? "_index" : "";
	var loginVar   = isLogin ? 1 : 0;
	send_jy_pv2("|search_v2_PopProfileClick_"+loginVar+profileStr);
 }
//照片播放
$(function(){
	var len=$('.smallPhoto li').length;
	var index=0;
	
	//设置宽度
	$('.photoList>ul').css('width',len*210);
	$('.smallList>ul').css('width',len*72);
	
	$('.photoList li').eq(0).show().css('opacity',1);
	$('.smallList li').eq(0).addClass('curr');
	
	$('.smallPhoto li').click(function(){
		var i=$('.smallPhoto li').index(this);
		movePhoto(i);
		index=i;
		if(i==0){
			$('.leftArrow').addClass('leftArrow_none');
		}else if(i==len-1){
			$('.rightArrow').addClass('rightArrow_none');
		}else{
			$('.leftArrow').removeClass('leftArrow_none');
			$('.rightArrow').removeClass('rightArrow_none');
		}
	})
	$('.leftArrow').click(function(){
		$('.rightArrow').removeClass('rightArrow_none');
		if(index==0){
			$(this).addClass('leftArrow_none');
		}else{
			index--;
			movePhoto(index);
		}
	})
	$('.rightArrow').click(function(){
		$('.leftArrow').removeClass('leftArrow_none');
		if(index==len-2){
			index++;
			movePhoto(index);
			$(this).addClass('rightArrow_none');
			//index=-1;
		}
		else if(index==len-1){
			return;
		}
		else{
			index++;
			movePhoto(index);
		}
	})
	
	function movePhoto(n){
		$('.photoList li').eq(n).fadeIn().siblings().fadeOut();
		$('.smallList li').eq(n).addClass('curr').siblings().removeClass('curr');
		if(n<2){
			$('.smallList ul').css({left:0});
		}else if(n==len-1){
			$('.smallList ul').animate({left:(n-2)*-72},300);
		}else {
			$('.smallList ul').animate({left:(n-1)*-72},300);
		}
	}
})