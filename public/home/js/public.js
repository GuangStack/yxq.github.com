$(document).ready(function(){
	//去除IE6,7链接点击虚线框
	var a = $("a");
	a.hideFocus = true;
	complete_url=window.location.href;
	missing_part_url = complete_url.replace(/http:\/\//g,'');
	part_url_arr = missing_part_url.split('.');
	if (part_url_arr[0] == 'fate')
	{
		 need_url = "";
		 suffix = part_url_arr[2].split('/');
		 suffix = suffix[0];
		 jy_site_url = "http://www."+part_url_arr[1]+'.'+suffix;
	}
	else
	{
		 need_url = "/fate";
		 jy_site_url = "";
	}
	//点击导航中的搜索框  搜索框失去焦点
	$('#search_fate').click(function(){
		if ($(this).val() == '搜索话题或者标签') {
		    $(this).val('');
		}
	}).blur(function(){
		if ($(this).val() == '') {
		    $(this).val('搜索话题或者标签');
		}
	});
	//返回顶部
	$(window).scroll(function(){
		if ($(window).scrollTop() >= 100)
		{
			$('#goTop').fadeIn(200);
		}
		else
		{
			$('#goTop').fadeOut(200);
		}
	});
	$('#backTop').click(function(){
		$('body,html').animate({
			scrollTop : 0
			}, 120);
		return false;
		});
	$('.gn-search').mouseleave(function(){
		$('.search_select').html('');
		$('.search_select').css('display','none');
	});
	//进入页面获取一次消息
	get_unread_msg_count();
	//统计一天谁来过缘分圈
	make_statistics();
})

//统计一天谁来过缘分圈
function make_statistics() {
	$.ajax({
		type:"post",
		url:""+need_url+"/ajax/statistics.php",
		data:{},
		success:function(msg)
		{
			
		}
		})
}
///获取未读消息数
function get_unread_msg_count()
{
    $.ajax({
	type:"get",
	url:""+need_url+"/ajax/get_message.php",
	data:{
	    type:2
	    },
	success:function(msg)
	{
	    if (parseInt(msg) > 0) {
		$('#un_read_msg').find('em').html(msg);
		$('#un_read_msg').find('em').show();
	    }
	    else
	    {
		$('#un_read_msg').find('em').html(0);
		$('#un_read_msg').find('em').hide();
	    }
	}
	})
}
//定时获取未读消息数	    
setInterval("get_unread_msg_count()",50000);

//获取未读消息的内容
function get_unread_msg_content() {

	$.ajax({
		type:"get",
		url:""+need_url+"/ajax/get_message.php",
		data:{
		    type:3
		    },
		dataType:'json',
		beforeSend:function(xmlHttpObj){$('.news-box ul').html('<p class="loging">正在加载，请稍候...</p>');},
		success:function(msg)
		{
			if (msg.status == 0) {
				$('.news-box ul').html('<p class="nothing-c">暂时没有消息</p>');
			}
			//如果有消息
			else if (msg.status == 1) {
				var html = '';
				$.each(msg.data,function(index,array){
				  //我发布的话题被人评论
				    if (index == 1) {
					html += '<li class="noborder">';
				    }
				    else
				    {
					html += '<li>';
				    }
				    if (array['type'] == 2) {
					//我发布的话题被人评论
					//如果是评论是活动图片
					if (array['is_activity'] == 1) {
						html += '<span><a href="'+need_url+'/myfate.php?hash='+array['hash']+'" target="_blank">'+array['nickname']+'</a></span>参与了你的话题<span><a href="'+need_url+'/images.php?id='+array['activity_pic_id']+'" target="_blank">'+array['title']+'</a></span>';
					}
					else
					{
						html += '<span><a href="'+need_url+'/myfate.php?hash='+array['hash']+'" target="_blank">'+array['nickname']+'</a></span>评论了你的话题<span><a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'&cid='+array['comment_id']+'" target="_blank">'+array['title']+'</a></span>';
					}
					
				    }
				    //我关注的话题被评论
				    if (array['type'] == 3) {
					//如果是评论是活动图片
					if (array['is_activity'] == 1) {
						html += '<span><a href="'+need_url+'/myfate.php?hash='+array['hash']+'" target="_blank">'+array['nickname']+'</a></span>参与了你关注的话题<span><a href="'+need_url+'/images.php?id='+array['activity_pic_id']+'" target="_blank">'+array['title']+'</a></span>';
					}
					else
					{
						html += '<span><a href="'+need_url+'/myfate.php?hash='+array['hash']+'" target="_blank">'+array['nickname']+'</a></span>评论了你关注的话题<span><a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'&cid='+array['comment_id']+'" target="_blank">'+array['title']+'</a></span>';
					}
				    }
				    //我关注的人评论了某话题
				    if (array['type'] == 4) {
					//如果是评论是活动图片
					if (array['is_activity'] == 1) {
						html += '你关注的<span><a href="'+need_url+'/myfate.php?hash='+array['hash']+'" target="_blank">'+array['nickname']+'</a></span>参与了话题<span><a href="'+need_url+'/images.php?id='+array['activity_pic_id']+'" target="_blank">'+array['title']+'</a></span>';
					}
					else
					{
						html += '你关注的<span><a href="'+need_url+'/myfate.php?hash='+array['hash']+'" target="_blank">'+array['nickname']+'</a></span>评论了话题<span><a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'&cid='+array['comment_id']+'" target="_blank">'+array['title']+'</a></span>';
					}
				    }
				    //我发布的话题被人赞
				    if (array['type'] == 6) {
					if (array['switch_flag'] == 1)
					{
						html += array['nickname']+'赞了你的话题<span><a href="/topic_detail.php?id='+array['topic_id']+'" target="_blank">'+array['title']+'</a></span>';
					}
					else
					{
						html += '<span><a href="'+need_url+'/myfate.php?hash='+array['hash']+'" target="_blank">'+array['nickname']+'</a></span>赞了你的话题<span><a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'" target="_blank">'+array['title']+'</a></span>';
					}
				    }
				    //我关注的话题被赞
				    if (array['type'] == 7) {
					if (array['switch_flag'] == 1)
					{
						html += array['nickname']+'赞了你关注的话题<span><a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'" target="_blank">'+array['title']+'</a></span>';
					}
					else
					{
						html += '<span><a href="'+need_url+'/myfate.php?hash='+array['hash']+'" target="_blank">'+array['nickname']+'</a></span>赞了你关注的话题<span><a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'" target="_blank">'+array['title']+'</a></span>';
					}
				    }
				    //我关注的人赞了某话题
				    if (array['type'] == 8) {
					if (array['switch_flag'] == 1)
					{
						html += '你关注的'+array['nickname']+'赞了话题<span><a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'" target="_blank">'+array['title']+'</a></span>';
					}
					else
					{
						html += '你关注的<span>'+array['nickname']+'</span>赞了话题<span><a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'" target="_blank">'+array['title']+'</a></span>';
					}
				    }
				    //我发布的话题被人关注
				    if (array['type'] == 10) {
					if (array['switch_flag'] == 1)
					{
						html += array['nickname']+'关注了你的话题<span><a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'" target="_blank">'+array['title']+'</a></span>';
					}
					else
					{
						html += '<span><a href="'+need_url+'/myfate.php?hash='+array['hash']+'" target="_blank">'+array['nickname']+'</a></span>关注了你的话题<span><a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'" target="_blank">'+array['title']+'</a></span>';
					}
				    }
				    //我的评论被人赞
				    if (array['type'] == 12) {
					//如果是评论是活动图片
					if (array['is_activity'] == 1)
					{
						html += '<span><a href="'+need_url+'/myfate.php?hash='+array['hash']+'" target="_blank">'+array['nickname']+'</a></span>赞了你<span><a href="'+need_url+'/images.php?id='+array['activity_pic_id']+'" target="_blank">查看</a></span>';
					}
					else
					{
						html += '<span><a href="'+need_url+'/myfate.php?hash='+array['hash']+'" target="_blank">'+array['nickname']+'</a></span>赞了你的评论<span><a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'&cid='+array['comment_id']+'" target="_blank">'+array['comment_content']+'</a></span>';
					}
				    }
				    //我关注的人赞了某评论
				    if (array['type'] == 13) {
					
					html += '你关注的<span><a href="'+need_url+'/myfate.php?hash='+array['hash']+'" target="_blank">'+array['nickname']+'</a></span>赞了评论';
					
					//是否被删除
					if (array['comment_isdelete'] == 1) {
						//如果是评论是活动图片
						if (array['is_activity'] == 1)
						{
							html += '<span><a href="'+need_url+'/images.php?id='+array['activity_pic_id']+'" target="_blank">查看</a></span>';
						}
						else
						{
							html += '<span><a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'&cid='+array['comment_id']+'" target="_blank">'+array['comment_content']+'</a></span>';
						}
					}
					else
					{
					      html += '<span>该评论已被删除</span>';
					}
				    }
				    //我的评论被人回复
				    if (array['type'] == 15) {
					
					html += '<span><a href="'+need_url+'/myfate.php?hash='+array['hash']+'" target="_blank">'+array['nickname']+'</a></span>';
					
					html += '回复了你的评论<span>';
					//是否被删除
					if (array['comment_isdelete'] == 1)
					{
						//如果是评论是活动图片
						if (array['is_activity'] == 1)
						{
							html += '<a href="'+need_url+'/images.php?id='+array['activity_pic_id']+'" target="_blank">查看</a>';
						}
						else
						{
							html += '<a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'&cid='+array['comment_id']+'" target="_blank">'+array['comment_content']+'</a>';
						}
					}
					else
					{
					      html += '该评论已被删除';
					}
					html += '</span>';
				    }
				    //我的回复被人回复
				    if (array['type'] == 17) {
					
					html += '<span><a href="'+need_url+'/myfate.php?hash='+array['hash']+'" target="_blank">'+array['nickname']+'</a></span>';
					
					html += '回复了你的回复<span>';
					//是否被删除
					if (array['comment_isdelete'] == 1) {
						//如果是评论是活动图片
						if (array['is_activity'] == 1)
						{
							html += '<a href="'+need_url+'/images.php?id='+array['activity_pic_id']+'" target="_blank">'+array['huifu_comment_content']+'</a>';
						}
						else
						{
							html += '<a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'&cid='+array['comment_id']+'" target="_blank">'+array['huifu_comment_content']+'</a>';
						}
					}
					else
					{
					      html += '该评论已被删除';
					}
					html += '</span>';
				    }
				    //某人关注了我
				    if (array['type'] == 19) {
					 //如果开关打开
					if (array['switch_flag'] == 1)
					{
						html += array['nickname']+'关注了你<span><a href="'+need_url+'/message.php" target="_blank">查看</a></span>';
					}
					else
					{
						html += '<span><a href="'+need_url+'/myfate.php?hash='+array['hash']+'" target="_blank">'+array['nickname']+'</a></span>关注了你<span><a href="'+need_url+'/message.php" target="_blank">查看</a></span>';
					}
				    }
				    //我发布的话题被删除
				    if (array['type'] == 20) {
					  html += '【系统】你的话题<a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'" target="_blank">'+array['title']+'</a>，因违反缘分圈话题规范，已被小编删除。';
				    }
				    //我关注的话题被删除
				    if (array['type'] == 21) {
					  html += '【系统】你关注的话题<a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'" target="_blank">'+array['title']+'</a>，因违反缘分圈话题规范，已被小编删除。';
				    }
				    //我关注的标签发布了新话题
				    if (array['type'] == 23) {
					if (array['is_system'] == 1)
					{
						html += '【系统】你关注的“'+array['tag_name']+'”有新话题啦<a href="'+need_url+'/show.php?type=list_all&id='+array['tag_id']+'" target="_blank">去看看</a>';
					}
					else
					{
						html += '【系统】你关注的“'+array['tag_name']+'”有新话题啦';
					}
				    }
				    //我关注的人发布了新话题
				    if (array['type'] == 24) {
					 //如果开关打开
					if (array['switch_flag'] == 1)
					{
						html += '你关注的'+array['nickname']+'发布了新话题<span><a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'" target="_blank">'+array['title']+'</a></span>';
						
					}
					else
					{
						html += '你关注的<span><a href="'+need_url+'/myfate.php?hash='+array['hash']+'" target="_blank">'+array['nickname']+'</a></span>发布了新话题<span><a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'" target="_blank">'+array['title']+'</a></span>';
					}
				    }
				    //我关注的人投票了某话题
				    if (array['type'] == 26) {
					 //如果开关打开
					if (array['switch_flag'] == 1)
					{
						html += '你关注的'+array['nickname']+'投票了话题<span><a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'" target="_blank">'+array['title']+'</a></span>';
					}
					else
					{
						html += '你关注的<span><a href="'+need_url+'/myfate.php?hash='+array['hash']+'" target="_blank">'+array['nickname']+'</a></span>投票了话题<span><a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'" target="_blank">'+array['title']+'</a></span>';
					}
				    }
				    //我关注的话题被投票
				    if (array['type'] == 27) {
					  html += '【系统】你关注的<a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'" target="_blank">'+array['title']+'</a>有人投票了<a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'" target="_blank">去看看</a>';
				    }
				    html += '</li>';
				})
				$('.news-box ul').html(html);
				
			    }
			},
			error:function(response)
			{
				$('.news-box ul').html('<p class="nothing-c">加载失败！请稍候重试</p>');
			}
	})
		$('.news-box').removeClass('fn-hide');
}



//点击搜索框搜索
function sub_search()
{
    var keyword = $('#search_fate').val();
    if ($.trim(keyword) == '搜索话题或者标签' || $.trim(keyword) == '') {
	tishi(0,'','','请先输入要搜索的内容。');
	return false;
    }
    var new_keyword = encodeURIComponent(keyword);
    window.location.href=""+need_url+"/search.php?wd="+new_keyword;
}


//公共提示框
/*
 *	flag   	flag 为1的时候  会有确定按钮
 *	fun	当flag 为1时  给确定按钮的 函数
 *	title	提示框标题
 *	content	提示框内容
 *
 */
function tishi(flag,fun,title,content)
{
	var id = 0;
	var type = 0;
	var obj = 0;
	var status = 0;
	if (arguments.length == 7)
	{
	    id = arguments[4];
	    type = arguments[5];
	    obj = arguments[6];
	}
	else if (arguments.length == 8)
	{
	    id = arguments[4];
	    type = arguments[5];
	    obj = arguments[6];
	    status = arguments[7];
	}
	
	$('#j_tishi').find('.cc-title').html(title);
	$('#j_tishi').find('.cc-tishi').html(content);
	if (content == '') {
		$('.cc-title').css('margin','0 0 15px');
		$('.cc-tishi').css('display','none');
	}
	else
	{
		$('.cc-title').css('margin','');
		$('.cc-tishi').css('display','block');
	}
	
	jy_head_function.lbg_show('j_tishi');
	 
	///有取消按钮
	if (flag == 1) {
	   
	    $('#tishi_sure').unbind('click').bind('click',function(){
		
		fun(type,id,obj,status);
	    });
	}
	else if (flag == 2) {
		$('#tishi_cancel').hide();
		$('#tishi_sure').unbind('click').bind('click',function(){
			jy_head_function.lbg_hide('j_tishi');
			window.location.href=""+need_url+"/index.php";
		})
		$('#tishi_close_href').unbind('click').bind('click',function(){
			jy_head_function.lbg_hide('j_tishi');
			window.location.href=""+need_url+"/index.php";
		})
	}
	else
	{
		$('#tishi_cancel').hide();
		$('#tishi_sure').unbind('click').bind('click',function(){
			jy_head_function.lbg_hide('j_tishi');
		})
	}
}

//加关注  人
/*
 *	userid	用户uid
 *	type    加关注的三种样式  
 *	obj	当前节点
 */
function add_attention(hash,type,obj)
{
	//解绑click事件
	$(obj).unbind("click");
	$.ajax({
		type:"get",
		url:""+need_url+"/ajax/attention_add.php",
		data:{
			hash:hash
		},
		success:function(msg)
		{
			//绑定click事件
			$(obj).bind("click",function(){add_attention(hash,type,obj);});
			if(msg == 1) {
				if (type == 1)
				{
					$(obj).parent().find(".at-yiguanzhu").removeClass('fn-hide');
					$(obj).parent().find(".guanzhu").addClass('fn-hide');
					$(obj).parent().find(".at-quxiao").addClass('fn-hide');
				}
				else if (type == 2) {
					$(obj).parent().find(".fs-yiguan").removeClass('fn-hide');
					$(obj).parent().find(".fs-guanzhu").addClass('fn-hide');
					$(obj).parent().find(".fs-quxiao").addClass('fn-hide');
					var num = $('.focus-nav a:eq(1)').find('span').html();
					var new_num = parseInt(num) + 1;
					if (new_num < 0) {
						new_num = 0;
					}
					$('.focus-nav a:eq(1)').find('span').html(new_num);
				}
				else if (type == 3)
				{
					$(obj).parent().find(".yiguanzhu-btn").removeClass('fn-hide');
					$(obj).parent().find(".guanzhu-btn").addClass('fn-hide');
					$(obj).parent().find(".quxiao-btn").addClass('fn-hide');
				}
				else if (type == 4) {
					$(obj).parent().find(".at-focused").removeClass('fn-hide');
					$(obj).parent().find(".guanzhu").addClass('fn-hide');
					$(obj).parent().find(".at-blur").addClass('fn-hide');
				}
				
			}
			else if(msg == 0 || msg == 'uid error')
			{
				tishi(0,'','','加关注失败，参数错误！');
			}
			else if(msg == -1){
				tishi(0,'','','加关注失败，已经在好友列表中！');
			}
			else if(msg == -2){
				tishi(0,'','','加关注失败，在阻止名单里！');
			}
			else if(msg == -3){
				tishi(0,'','','加关注失败，同性不能加关注！');
			}
			else if(msg == -5) {
			    tishi(0,'','','您是黑名单会员，不能关注，请联系客服。');
			}
		}
	    
	})
}
//取消关注
function cancel_attention(hash,type,obj)
{
	//解绑click事件
	$(obj).unbind("click");
	$.ajax({
		type:"post",
		url:""+need_url+"/ajax/attention_del.php",
		data:{
		    hash:hash
		},
		success:function(msg)
		{
			//绑定click事件
			$(obj).bind("click",function(){cancel_attention(hash,type,obj);});
		    if(msg == 1) {
			if (type == 1)
			{
				$(obj).parent().find(".at-yiguanzhu").addClass('fn-hide');
				$(obj).parent().find(".guanzhu").removeClass('fn-hide');
				$(obj).parent().find(".at-quxiao").addClass('fn-hide');
			}
			else if (type == 2) {
				$(obj).parent().find(".fs-yiguan").addClass('fn-hide');
				$(obj).parent().find(".fs-guanzhu").removeClass('fn-hide');
				$(obj).parent().find(".fs-quxiao").addClass('fn-hide');
				var num = $('.focus-nav a:eq(1)').find('span').html();
				var new_num = parseInt(num) - 1;
				if (new_num < 0) {
					new_num = 0;
				}
				$('.focus-nav a:eq(1)').find('span').html(new_num);
			}
			else if (type == 3)
			{
				$(obj).parent().find(".yiguanzhu-btn").addClass('fn-hide');
				$(obj).parent().find(".guanzhu-btn").removeClass('fn-hide');
				$(obj).parent().find(".quxiao-btn").addClass('fn-hide');
			}
			else if (type == 4) {
				$(obj).parent().find(".at-focused").addClass('fn-hide');
				$(obj).parent().find(".guanzhu").removeClass('fn-hide');
				$(obj).parent().find(".at-blur").addClass('fn-hide');
			}
		    }
		    else if(msg == 0) {
			loginWindow.openlogindiv('login',location.href, function(){location.reload();});
		    }
		    else if(msg == -1) {
			tishi(0,'','','取消关注失败，参数错误！');
		    }
		    else if(msg == -2) {
			tishi(0,'','','取消关注失败，关注列表中没有此人！');
		    }
		    else if(msg == -3) {
			tishi(0,'','','取消关注失败，失败！');
		    }
		    else if(msg == -4) {
			tishi(0,'','','取消关注失败，已经取消关注！');
		    }
		   
		}
	    
	})
}



//获取  我感兴趣的人
function get_recommend()
    {
	$.ajax({
	    type:"get",
	    url:""+need_url+"/ajax/get_index_recommend.php",
	    data:{},
	    dataType:"json",
	    beforeSend:function(xmlHttpObj){$('#interested_people').html('<p class="loging">正在加载，请稍候...</p>');},
	    success:function(msg)
	    {
		if(msg.status == 0) {
		    $('#interested_people').remove();
		}
		else if(msg.status == 1) {
		    var html = '';
		    html += '<p class="cr-title"><a href="javascript:void(0);" onclick="get_recommend();" class="fr">换一换</a>你可能感兴趣的人</p>'; 
		    $.each(msg.data,function(index,array){
			html += '<div class="user-insted"><dl class="ui-dl fn-clear">';
                        html += '<dt><a href="'+need_url+'/myfate.php?hash='+array['hash']+'" target="_blank" class="user-photo40"><img src="'+array['avatar']+'" alt="'+array['nickname']+'"/><span class="bg-radius40"></span></a></dt>';
                        html += '<dd class="ui-info"><a href="'+need_url+'/myfate.php?hash='+array['hash']+'" target="_blank" class="ui-name">'+array['nickname']+'</a><br /><a href="'+need_url+'/myfate.php?hash='+array['hash']+'" target="_blank"><span>'+array['age']+'岁</span>，<span>'+array['marriage']+'</span>，<span>'+array['location']+'</span></a></dd>';
			//如果是未登录状态
			if (msg.islogin == 1) {
			    html += '<dd class="attention"> <a href="javascript:void(0);" onclick="add_attention(\''+array['hash']+'\',1,this);" class="guanzhu">关注</a><a href="javascript:void(0);" class="at-yiguanzhu fn-hide">已关注</a><a href="javascript:void(0);" onclick="cancel_attention(\''+array['hash']+'\',1,this);"  class="at-quxiao fn-hide">取消</a></dd></dl>';
			}
			else
			{
			    html += '<dd class="attention"> <a href="javascript:void(0);" onclick="loginWindow.openlogindiv(\'login\',location.href, function(){location.reload();});" class="guanzhu">关注</a><a class="at-yiguanzhu fn-hide">已关注</a><a href="javascript:void(0);" onclick="loginWindow.openlogindiv(\'login\',location.href, function(){location.reload();});"  class="at-quxiao fn-hide">取消</a></dd></dl>';
			}
                        //如果是未登录状态
			if (msg.islogin == 1) {
				html += '<p class="ui-huati">你们共同关注的标签：</p>';
			}
			else
			{
				html += '<p class="ui-huati">关注的标签：</p>';
			}
			html += '<div class="user-tags fn-clear">';
			if (array['tags'])
			{
				$.each(array['tags'],function(i,arr){
					if (arr['is_system'] == 1)
					{
						html += '<a href="'+need_url+'/show.php?type=list_all&id='+arr['id']+'" target="_blank" class="user-label"><span>'+arr['name']+'</span></a>';
					}
					else
					{
						html += '<a href="javascript:;" class="user-label"><span>'+arr['name']+'</span></a>';
					}
			    })
			}
			
			html += '</div></div>';
			})
		     $('#interested_people').html(html);
		      //鼠标滑过已关注时效果
			$('.attention').hover(function(){
				if($(this).find(".guanzhu").hasClass('fn-hide'))
				{
				    $(this).find(".at-yiguanzhu").addClass('fn-hide');
				    $(this).find(".at-quxiao").removeClass('fn-hide');
				}
			    },function(){
				if($(this).find(".guanzhu").hasClass('fn-hide'))
				{
				    $(this).find(".at-quxiao").addClass('fn-hide');
				    $(this).find(".at-yiguanzhu").removeClass('fn-hide');
				}
			    })
		}
	    },
	     error:function(response){
				   $('#interested_people').html('<p class="nothing-c">加载失败！请稍候重试</p>');
				}
	    
	    });
    }



//取消关注 话题 标签

function cancel_focus(id, type,flag, obj)
{
	//解绑click事件
	$(obj).unbind("click");
	$.ajax({
		type:"get",
		url:"/ajax/cancel_focus.php",
		data:{
		    id:id,
		    type:type
		},
		success:function(msg)
		{
			if (msg == 0)
			{
				loginWindow.openlogindiv('login',location.href, function(){location.reload();});
			}
			else if (msg == -1)
			{
				tishi(0,'','','取消关注失败，参数错误！');
			}
			else if (msg == 1)
			{
			    
				if (flag == 1) {
					$(obj).parent().find(".yiguanzhu-btn").addClass('fn-hide');
					$(obj).parent().find(".guanzhu-btn").removeClass('fn-hide');
					$(obj).parent().find(".quxiao-btn").addClass('fn-hide');
					var myhash = $('#myhash').val();
					var num = $('#view_topic_num').find('span').html();
					var new_num = parseInt(num) - 1;
					if (new_num < 0)
					{
						new_num = 0;
					}
					$('#view_topic_num').find('span').html(new_num);
					$('#view_topic_uid_'+myhash+'').remove();
				}
				else if (flag == 2) {
					$(obj).parent().find(".fs-yiguan").addClass('fn-hide');
					$(obj).parent().find(".fs-guanzhu").removeClass('fn-hide');
					$(obj).parent().find(".fs-quxiao").addClass('fn-hide');
					if (type == 'topic') {
						var num = $('.focus-nav a:eq(0)').find('span').html();
						var new_num = parseInt(num) - 1;
						if (new_num < 0) {
							new_num = 0;
						}
						$('.focus-nav a:eq(0)').find('span').html(new_num);
					}
					else if (type == 'tag') {
						var num = $('.focus-nav a:eq(2)').find('span').html();
						var new_num = parseInt(num) - 1;
						if (new_num < 0) {
							new_num = 0;
						}
						$('.focus-nav a:eq(2)').find('span').html(new_num);
					}
				}
				else if (flag == 4) {
					$(obj).parent().find(".yiguanzhu-btn").addClass('fn-hide');
					$(obj).parent().find(".guanzhu-btn").removeClass('fn-hide');
					$(obj).parent().find(".quxiao-btn").addClass('fn-hide');
					var myhash = $('#myhash').val();
					var num = $('#show_uid_from_tag_num').find('span').html();
					var new_num = parseInt(num) - 1;
					if (new_num < 0)
					{
						new_num = 0;
					}
					$('#show_uid_from_tag_num').find('span').html(new_num);
					$('#show_tag_uid_'+myhash+'').remove();
				}
				else if (flag == 3) {
					$(obj).parent().find(".yiguanzhu-btn").addClass('fn-hide');
					$(obj).parent().find(".guanzhu-btn").removeClass('fn-hide');
					$(obj).parent().find(".quxiao-btn").addClass('fn-hide');
					var num = $(obj).parents('.fs-dl').find('.fs-dl-mar').find('i').html();
					var new_num = parseInt(num)-1;
					if (new_num < 0) {
						new_num = 0;
					}
					$(obj).parents('.fs-dl').find('.fs-dl-mar').find('i').html(new_num);
				}
				else
				{
					$(obj).parent().find(".fs-yiguan").addClass('fn-hide');
					$(obj).parent().find(".fs-guanzhu").removeClass('fn-hide');
					$(obj).parent().find(".fs-quxiao").addClass('fn-hide');
				}
				
			}
		//绑定click事件
		$(obj).bind("click",function(){cancel_focus(id, type,flag, obj);});
	    }
	})
}

//关注话题 关注标签
function add_focus(id, type,flag, obj)
{
	//解绑click事件
	$(obj).unbind("click");
	$.ajax({
		type:"get",
		url:""+need_url+"/ajax/add_focus.php",
		data:{
		    tag_topic_id:id,
		    type:type
		},
		success:function(msg)
		{
			
			if (msg == 0) {
				loginWindow.openlogindiv('login',location.href, function(){location.reload();});
			}
			else if (msg == -1) {
				tishi(0,'','','加关注失败，参数错误！');
			}
			else if (msg == -2) {
				tishi(0,'','','加关注失败，已经关注不能重复关注！');
			}
			else if (msg == -3) {
				if (type == 'topic') {
					tishi(0,'','','加关注失败，不能关注自己发布的话题！');
				}
				else
				{
					tishi(0,'','','加关注失败，不能关注分类！');
				}
			}
			else if (msg == -4) {
				tishi(0,'','','加关注失败，请稍候重试！');
			}
			else if(msg == -5) {
			    tishi(0,'','','您是黑名单会员，不能关注，请联系客服。');
			}
			else if (msg == 1) {
				
				if (flag == 1) {
					$(obj).parent().find(".yiguanzhu-btn").removeClass('fn-hide');
					$(obj).parent().find(".guanzhu-btn").addClass('fn-hide');
					$(obj).parent().find(".quxiao-btn").addClass('fn-hide');
					var myavatar = $('#myavatar').val();
					var myhash = $('#myhash').val();
					var num = $('#view_topic_num').find('span').html();
					var new_num = parseInt(num) + 1;
					$('#view_topic_num').find('span').html(new_num);
					$('#view_topic').prepend('<a href="'+need_url+'/myfate.php?hash='+myhash+'" target="_blank" id="view_topic_uid_'+myhash+'" class="user-photo25"><img src="'+myavatar+'" alt=""><span class="bg-radius25"></span></a>');
				}
				else if (flag == 2) {
					$(obj).parent().find(".fs-yiguan").removeClass('fn-hide');
					$(obj).parent().find(".fs-guanzhu").addClass('fn-hide');
					$(obj).parent().find(".fs-quxiao").addClass('fn-hide');
					if (type == 'topic') {
						var num = $('.focus-nav a:eq(0)').find('span').html();
						var new_num = parseInt(num) + 1;
						$('.focus-nav a:eq(0)').find('span').html(new_num);
					}
					else if (type == 'tag') {
						var num = $('.focus-nav a:eq(2)').find('span').html();
						var new_num = parseInt(num) + 1;
						$('.focus-nav a:eq(2)').find('span').html(new_num);
					}
				}
				else if (flag == 4 ) {
					$(obj).parent().find(".yiguanzhu-btn").removeClass('fn-hide');
					$(obj).parent().find(".guanzhu-btn").addClass('fn-hide');
					$(obj).parent().find(".quxiao-btn").addClass('fn-hide');
					var myavatar = $('#myavatar').val();
					var myhash = $('#myhash').val();
					var num = $('#show_uid_from_tag_num').find('span').html();
					var new_num = parseInt(num) + 1;
					$('#show_uid_from_tag_num').find('span').html(new_num);
					$('#show_uid_from_tag').prepend('<a href="'+need_url+'/myfate.php?hash='+myhash+'" target="_blank" id="show_tag_uid_'+myhash+'" class="user-photo25"><img src="'+myavatar+'" alt=""><span class="bg-radius25"></span></a>');
				}
				else if (flag == 3 ) {
					$(obj).parent().find(".yiguanzhu-btn").removeClass('fn-hide');
					$(obj).parent().find(".guanzhu-btn").addClass('fn-hide');
					$(obj).parent().find(".quxiao-btn").addClass('fn-hide');
					var num = $(obj).parents('.fs-dl').find('.fs-dl-mar').find('i').html();
					var new_num = parseInt(num)+1;
					
					$(obj).parents('.fs-dl').find('.fs-dl-mar').find('i').html(new_num);
				}
				else
				{
					
				}
			}
		//绑定click事件
			$(obj).bind("click",function(){add_focus(id, type,flag, obj);});    
		}
	})
}

//页面自动滚动到 元素 的位置
//param obj 元素对象 $('.class')
//param time 时间

function query_tip_top(obj,oldScrollTop)
{
    if(oldScrollTop){
        $(document).scrollTop(oldScrollTop);
    }else{
        $(document).scrollTop(getPos(obj).t - 80);
    };
};

function query_tip_top1(obj,oldScrollTop)
{
    if(oldScrollTop){
        $(document).scrollTop(oldScrollTop);
    }else{
        $(document).scrollTop(getPos(obj).t);
    };
};
///取对象的坐标
//param obj 元素对象 $('.class')

function getPos(obj)
{
	var res={l: 0, t: 0};
	
	if(typeof obj == "object") {
		res.l = parseInt(obj.offset().left);
		res.t = parseInt(obj.offset().top);
	} else {
		while(obj)
		{
			res.l+=obj.offsetLeft||0;
			res.t+=obj.offsetTop||0;
			
			obj=obj.offsetParent;
		}
	}
	return res;
}

//js获取当前时间
function get_now_time() {
	var time = new Date();
	var year = time.getFullYear();
	var month = parseInt(time.getMonth()) + 1;
	var day = time.getDate();
	var hour = time.getHours();
	var minutes = time.getMinutes();
	var new_month = (month >= 10) ? month : '0'+month;
	var new_day = (day >= 10) ? day : '0'+day;
	var new_hour = (hour >= 10) ? hour : '0'+hour;
	var new_min = (minutes >= 10) ? minutes : '0'+minutes;
	return year+'-'+new_month+'-'+new_day+' '+new_hour+':'+new_min;
}

