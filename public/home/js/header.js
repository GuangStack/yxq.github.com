(function($){
	// hover delay
	$.fn.hoverDelay = function(options){
		var defaults = {
			hoverEvent: function(){
				$.noop();
			},
			outEvent: function(){
				$.noop();
			}
		};
		var sets = $.extend(defaults,options || {});
		var hoverTimer, outTimer;
		return $(this).each(function(){
			$(this).hover(function(){
				clearTimeout(outTimer);
				hoverTimer = setTimeout(sets.hoverEvent, sets.hoverDuring);
			},function(){
				clearTimeout(hoverTimer);
				outTimer = setTimeout(sets.outEvent, sets.outDuring);
			});
		});
	}
})(jQuery);
$(function(){
	var Header_zx_loc = [11,12,31,50,'11','12','31','50'];
	var Header_my_domain = "";
	var Header_my_host_name = location.hostname;
	var Header_my_host_arr = Header_my_host_name.split(".");
	var Header_my_host_length = Header_my_host_arr.length;
	var Header_my_loc = jy_head_function.get_cookie('DATE_SHOW_LOC');
	var Header_my_loc_name = '';
	if(Header_my_loc){
		if($.inArray(Header_my_loc,Header_zx_loc) == -1){
			Header_my_loc_name = LOK[parseInt(Header_my_loc/100)][Header_my_loc];
		}else{
			Header_my_loc_name = LSK[Header_my_loc];
		}
	}
	if(HEAD_USER.uid){
		for(var i=1; i<Header_my_host_length; i++){
			Header_my_domain += "." + Header_my_host_arr[i];
		}
        $('.nav_login').html('<div class="login_user">hi~ <a class="user_name" href="http://'+Header_my_host_name+'/usercenter.php'+'" target="_blank"  onmousedown="send_jy_pv2(\'|1031771_18|'+HEAD_USER.uid+'\')">'+HEAD_USER.nickname+'</a></div><span>丨</span><a href="http://login'+Header_my_domain+'/logout2.php" onmousedown="send_jy_pv2(\'|1031771_20|'+HEAD_USER.uid+'\')">退出</a>');

        //发送问候消息
        $.ajax({
            url: 'http://'+Header_my_host_name+'/ajax/msg.php',
            type: 'GET',
            success: function(res){
            }
        });

    }else{
		$('.nav_login').html('<a href="http://'+Header_my_host_name+'/login.php"  onmousedown="send_jy_pv2(\'|1031771_22|\'+HEAD_USER.uid);">登录</a><span>丨</span><a href="http://reg.jiayuan.com/?bd=65" onmousedown="send_jy_pv2(\'|1031771_24|\'+HEAD_USER.uid);" target="_blank">注册</a>');
	}
	var Header_city_html = '';
	var Header_city_html1 = '';
	var Header_city_html2 = '';
	$.post('http://'+Header_my_host_name+'/ajax/citys.php',{},function(data){
		data = eval("("+data+")");
		//导航
		if(data.have_shop){
			$('.nav_list').children().css('display','block');
		}else{
			if($('.nav_list').children().length>6){
				$('.nav_list').children().eq(5).css('display','block');
				$('.nav_list').children().eq(8).css('display','block');
			}else{
				$('.nav_list').children().eq(3).css('display','block');
				$('.nav_list').children().eq(4).css('display','block');
			}
		}
		if(!Header_my_loc_name){
			Header_my_loc = data.localtion;
			if(Header_my_loc){
				if($.inArray(Header_my_loc,Header_zx_loc) == -1){
					Header_my_loc_name = LOK[parseInt(Header_my_loc/100)][Header_my_loc];
				}else{
					Header_my_loc_name = LSK[Header_my_loc];
				}
			}
		}
		var date_w_loc = '';
		var date_w_subloc = '';
		var loc_is_true = 0;
		$.each(data.citys, function(l_id, sl_arr) {
			date_w_loc = LSK[l_id];
			Header_city_html2 += '<li>'+date_w_loc+'：';
			if($.inArray(l_id,Header_zx_loc) == -1){
				$.each(sl_arr.list, function(sl_id,sl_val){
					date_w_subloc = LOK[l_id][sl_id];
					if(Header_my_loc_name == date_w_subloc){
						loc_is_true = 1;
					}
					Header_city_html2 += '<a href="javascript:date_header_chenge_loc('+sl_id+');">'+date_w_subloc+'</a>';		
				});
			}else{
				date_w_subloc = date_w_loc;
				if(Header_my_loc_name == date_w_subloc){
					loc_is_true = 1;
				}
				Header_city_html2 += '<a href="javascript:date_header_chenge_loc('+l_id+');">'+date_w_subloc+'</a>';			
			}
			Header_city_html2 += '</li>';
		});
		Header_city_html2 += '<a href="javascript:;" class="city_close"></a></ul>';
		if(!loc_is_true){
			Header_my_loc_name = '北京';
		}
		Header_city_html1 = '<p class="city_now"><a href="javascript:;" class="city_default">'+Header_my_loc_name+'</a><br><a href="javascript:;">[切换城市]</a></p><ul class="city_check fn-hide">';
		Header_city_html = Header_city_html1 + Header_city_html2;
		$('.header_city').html(Header_city_html);
		// 城市切换
		var cityWrap = $('.header_city'),
			cityChangeBtn = cityWrap.find('.city_now a'),
			cityCheck = cityWrap.find('.city_check')
			cityClose = cityCheck.find('.city_close');
		cityChangeBtn.on('click',function(e){
			cityCheck.stop(false,true).slideToggle(300);
			e.stopPropagation();
		})
		cityWrap.on('click',function(e){
			e.stopPropagation();
		})
		$(document).add(cityClose).on('click',function(){
			cityCheck.stop(false,true).slideUp(300);
		});
	});
	
	// 下拉列表
	var slideFn = {
		init : function(obj){
			var that = this;
			this.objName = obj.children('a'),
			this.objSlide = obj.children('div'),
			this.objSlideBtn = this.objSlide.find('a');
			this.objSlideBtn.hover(function(){
				$(this).addClass('cur');
			},function(){
				$(this).removeClass('cur');
			})
		},
		inFn : function(obj){
			this.init(obj);
			this.objSlide.stop(false,true).fadeIn(200);
		},
		outFn : function(obj){
			this.init(obj);
			this.objSlide.stop(false,true).fadeOut(200);
		}
	}
	$('.login_user').hoverDelay({
		hoverDuring : 300,
		outDuring : 100,
		hoverEvent : function(){
			slideFn.inFn($('.login_user'));
		},
		outEvent : function(){
			slideFn.outFn($('.login_user'));
		}
	});
	$('.address_check').hoverDelay({
		hoverDuring : 300,
		outDuring : 100,
		hoverEvent : function(){
			slideFn.inFn($('.address_check'));
		},
		outEvent : function(){
			slideFn.outFn($('.address_check'));
		}
	});
})
function date_header_chenge_loc(l_id){
	jy_head_function.set_cookie('DATE_SHOW_LOC', l_id, '30d');
	//一旦更改城市则清除店铺cookie
	jy_head_function.set_cookie('DATE_SHOW_SHOP', '');
	location.reload();
}
function date_header_chenge_shop(s_id){
	jy_head_function.set_cookie('DATE_SHOW_SHOP', s_id, '30d');
	location.reload();
}
//弹出弹层
function Date_show_tc(tc_type,hd_id,uid,other_id,sw_type){
	var Date_my_host_name = location.hostname;
	var tc_arr = {
		'mflq':{'tc_id':1,'hd_id':hd_id,'width':520,'height':350},
		'mfty':{'tc_id':2,'hd_id':hd_id,'hd_id_old':other_id,'width':520,'height':350},
		'hdgd':{'tc_id':3,'hd_id':hd_id,'goto':Date_my_host_name+'/eventslist.php','width':520,'height':350},
		'hdxq':{'tc_id':3,'hd_id':hd_id,'goto':Date_my_host_name+'/eventsdetail.php?id='+other_id,'width':520,'height':350},
		'hdxq_old':{'tc_id':3,'hd_id':hd_id,'goto':Date_my_host_name+'/activityreviewdetail.php?id='+other_id,'width':520,'height':350},
		'hygd':{'tc_id':3,'hd_id':hd_id,'goto':Date_my_host_name+'/userlist.php','width':520,'height':350},
		'djhy':{'tc_id':4,'hd_id':hd_id,'user_id':uid,'width':720,'height':470}
	}
	var url = "tc_type="+tc_arr[tc_type]['tc_id'];
	if(tc_arr[tc_type]['hd_id']){
		url += "&hd_id="+tc_arr[tc_type]['hd_id'];
	}
	if(tc_arr[tc_type]['hd_id_old']){
		url += "&hd_id_old="+tc_arr[tc_type]['hd_id_old'];
	}
	if(tc_arr[tc_type]['goto']){
		url += "&goto="+tc_arr[tc_type]['goto'];
	}
	if(tc_arr[tc_type]['user_id']){
		url += "&user_id="+tc_arr[tc_type]['user_id']; 
	}
	if(sw_type){
		url += "&sw_type="+sw_type; 
	}
	jy_head_function.lbg_tpl = '<iframe id="date_enroll_tc" src="" width="'+tc_arr[tc_type]['width']+'" height="'+tc_arr[tc_type]['height']+'" scrolling="no" frameborder="no"></iframe>';
	jy_head_function.lbg_show({lbg_z_index:'10000'});
	$("#date_enroll_tc").attr("src","http://"+Date_my_host_name+"/enroll_tc.php?"+url);
}
//领取成功后设置页面的跳转链接
function change_gda_href(){
	$('.change_href_a').each(function(){
		$(this).attr('href',$(this).attr('_href'));
	});
}
//照片切割
function Date_cutImage(obj, width, height) {
	obj.css({ width: width+'px', height: height+'px'});
	var img = new Image();
	img.src = obj.attr('src');
	var old_width = img.width,
		old_height = img.height,
		flag = old_width < old_height ? old_width / width : old_height / height,
		this_width = old_width / flag,
		this_height = old_height / flag;

	if (this_width < width)
		this_width = width;
	if (this_height < height)
		this_height = height;

	obj.css({ width: this_width, height: this_height});
	var iTop = (this_height - height) * 0.3,
		iLeft = (this_width - width) * 0.5;

	if (old_width < old_height) {
		obj.css('left', '0px');
		obj.css('top', '-' + iTop + 'px');
	} else if (old_width > old_height) {
		obj.css('left', '-' + iLeft + 'px');
		obj.css('top', 0);
	} else {
		obj.css('left', 0);
		obj.css('top', 0);
	}
	$(obj).fadeIn();
}
//照片加载
function loadImg(src, callBak) {
	var newImg = new Image();
	newImg.src = src;

	if (newImg.complete) {
		callBak.call(newImg)
	} else {
		newImg.onload = function () {
			callBak.call(newImg);
			newImg.onload = null;
		};
	}
}
// 活动信息浮层
function floatFn(obj){
	var floatBox = $('#date_float_box'),
		floatTop = obj.offset().top,
		scrollTop = $(window).scrollTop();
	if(scrollTop>=floatTop){
		floatBox.fadeIn(200);
	}else{
		floatBox.fadeOut(200);
	}
}
// 回到顶部
function floatTop(obj){
	var scrollTop = $(window).scrollTop();
	if(scrollTop>0){
		obj.fadeIn(200);
	}else{
		obj.fadeOut(200);
	}
}
// 阅读全文
function show_all(obj){
	obj.siblings('span').toggle();
	if(obj.text()=='【阅读全文】'){
		obj.text('【收起全部】');
	}else{
		obj.text('【阅读全文】');
	}
}