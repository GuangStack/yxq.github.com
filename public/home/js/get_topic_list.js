/*
*    	首页 最新话题、精华、
*	发现 全部 精华推荐 本周热议  点击标签父分类 点击标签分类
*    	显示话题列表
*    	type   	1 导航   2  父标签  3 标签
*    	id     	当type= 1时 1首页最新话题显示 2首页精华3发现本周热议4获取全部话题列表
*    		当type=2或type=3时  id为标签父分类的id 或 标签分类的id
*    	obj   	当前节点
*    	url   	获取数据的地址
*/
function show(type,id,obj,wd,url)
{
	if (url==undefined) {
		url = ""+need_url+"/ajax/get_topics_list.php";
	}
	//一级导航
	if(type == 1) {
	    $(obj).parent().siblings().find('a').removeClass('cn-a-active');
	    $(obj).addClass('cn-a-active');
	    //当前页面为 发现中 全部页面时  显示 父标签
	    if (id == 4) {
		//改变标题
		document.title = '发现交友_缘分圈_世纪佳缘交友网';
		$('.unfold').removeClass('fn-hide');
		$('.tofold').addClass('fn-hide');
		$('.find-ad-list').removeClass('fn-hide');
		//$('.find-ad-list ul li').removeClass('active');
	    }
	    else
	    {
		if (id == 2) {
			document.title = '精华推荐话题_发现交友_缘分圈_世纪佳缘交友网';
		}
		else if (id == 3) {
			document.title = '本周热议话题_发现交友_缘分圈_世纪佳缘交友网';
		}
		$('.tofold').addClass('fn-hide');
		$('.unfold').addClass('fn-hide');
		$('.find-ad-list').addClass('fn-hide');
		$('.find-label').addClass('fn-hide');
	    }
	    get_hot_tags();
	}
	///点击父标签
	else if (type == 2) {
		$('.con-nav li').find('a').removeClass('cn-a-active');
		$('.con-nav li').find('a').eq(0).addClass('cn-a-active');
		$('.unfold').removeClass('fn-hide');
		$('.tofold').addClass('fn-hide');
		get_tags(type,id,obj);
		get_uid_from_tag(type,id);
		$('.find-ad-list').removeClass('fn-hide');
		$('.find-label').removeClass('fn-hide');
	}
	//点击标签
	else if (type == 3) {
		$('.con-nav li').find('a').removeClass('cn-a-active');
		$('.con-nav li').find('a').eq(0).addClass('cn-a-active');
		$(obj).addClass('user-labeled').siblings().removeClass('user-labeled');
		get_tags(type,id,obj);
		get_uid_from_tag(type,id);
		$('.unfold').removeClass('fn-hide');
		$('.tofold').addClass('fn-hide');
		$('.find-ad-list').removeClass('fn-hide');
	    //$(obj).parent().siblings().removeClass('cn-a-active');
	    //$(obj).parent().addClass('cn-a-active');
	}
	//搜索
	else if (type == 4) {
		//code<p class="nothing-c">暂时没有数据</p>
		//var word = ur
	}
	else
	{
	    tishi(0,'','参数错误！','提示：参数错误！');
	    return false;
	}
	$.ajax({
		type:"get",
		url:url,
		data:{
			type:type,
			id:id,
			wd:wd
		},
		dataType:"json",
		beforeSend:function(xmlHttpObj){$('.con-detail').html('<p class="loging">正在加载，请稍候...</p>');},
		success:function(msg)
		{
			//如果有数据返回
			if(msg.status == 1 && msg.data != null) {
				var html = '';
				$.each(msg.data,function(index,array){
					html += '<div class="topic-box"><div class="user-pic">';
					if (array['is_anonymous'] == 1)
					{
						html += '<a class="user-photo40 user-default"><img src="'+array['avatar']+'" alt=""/><span pid="1" class="bg-radius40"></span></a>';
					}
					else
					{
						//如果不显示弹层
						if (array['switch_flag'] == 1) {
							html += '<a href="'+need_url+'/myfate.php?hash='+array['hash']+'" class="user-photo40"><img src="'+array['avatar']+'" alt=""/><span class="bg-radius40" pid="1"></span></a>';
						}
						else
						{
							html += '<a href="'+need_url+'/myfate.php?hash='+array['hash']+'" class="user-photo40"><img src="'+array['avatar']+'" alt=""/><span class="bg-radius40" id="'+array['hash']+'_'+array['is_system']+'_'+index+'"></span></a>';
						}
						
					}
					html += '<div class="u-detail fn-hide"></div></div>';
					html += '<div class="user-con">';
					html += '<h3 class="u-question fn-clear"><a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'" target="_blank">'+array['title']+'</a>';
					//如果是精华
					if (array['is_marrow'] == 1) {
						html += ' <span class="st-span">精华</span>';
					}
					//如果是置顶
					if (type == 1 && id == 4 && array['is_top'] == 1) {
						html += ' <span class="stickspan">置顶</span>';
					}
					html += '</h3>';
					html += '<p class="u-answer"><a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'" target="_blank">'+array['description']+'</a></p>';
					//如果返回的话题分类是PK话题
					if(array['type']==2)
					{
						html += '<div class="u-pk  fn-clear">';
						$.each(array['topic_arr'],function(i,arr){
							if(arr['listorder'] == 1)
							{
								html += '<div class="pk-red"><p>'+arr['option_vote_number']+'</p><dl><dt><a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'" target="_blank">支持红方</a></dt><dd>'+arr['option']+'</dd></dl></div>';
							}
							if(arr['listorder'] == 2)
							{
								html += '<img src="http://images1.jyimg.com/w4/fate/i/PK.jpg" class="pk-PK" /><div class="pk-blue"><p>'+arr['option_vote_number']+'</p><dl><dd>'+arr['option']+'</dd><dt><a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'"  target="_blank">支持蓝方</a></dt></dl></div></div>';
							}
						})
					}
					
					//如果话题中有图片
					if(array['img'].length > 0)
					{
					    html += '<ul class="u-photo fn-clear">';
					    $.each(array['img'],function(i,arr){
							html += '<li><a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'" target="_blank"><img src="'+arr+'" alt="" onload="cutImage($(this), 100, 100);"/></a></li>';
						})
					    html += '</ul>';
					}
					html += '<div class="u-handle">';
					html += '<p class="h-time">发布于 <span>'+array['publish_time']+'</span></p>';
					html += '<ul class="h-list"><li><a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'" target="_blank" class="h-focus">'+array['look_number']+'</a></li><li><a href="'+need_url+'/topic_detail.php?id='+array['topic_id']+'" target="_blank" class="h-ping">'+array['comment_number']+'</a></li></ul>';
					html += '</div></div></div>';    
				})
				//将数据插入
				$('.con-detail').html(html);
				//插入分页
				if (id == 3 && type==1) {
					$('.turn-page').html('');
				}
				else
				{
					$('.turn-page').html(msg.page);
				}
				//给分页绑定click事件，获取数据，阻止分页跳转
				$('.turn-page a').each(function(){
				    $(this).live('click',function(){
						show(type,id,obj,wd,$(this).attr('href'));
						//返回顶部
						query_tip_top();
						return false;
					})
				})
				
			}
			else
			{
				if (type == 4)
				{
					$('.con-detail').html('<p class="nothing-c">抱歉，没有找到相关的话题。</p>');
				}
				else
				{
					$('.con-detail').html('<p class="nothing-c">暂时没有数据</p>');
				}
				//插入分页
				$('.turn-page').html('');
			}
		},
		error:function(response)
		{
			$('.con-detail').html('<p class="nothing-c">数据加载失败，请重试！</p>');
			$('.turn-page').html('');
		}
		});
	
}


/*
 *	发现页面  全部 时候
 *	点击 标签父分类 获取 标签
 *	id父标签的id
 *	obj为当前节点
 *
 */
function get_tags(type,id,obj)
{
	
	//$(obj).parent().siblings().removeClass('active');
	//$(obj).parent().addClass('active');;
	var title = $(obj).find('em').html();
	$.ajax({
		type:"get",
		url:""+need_url+"/ajax/get_tags.php",
		data:{id:id,type:type},
		dataType:"json",
		beforeSend:function(xmlHttpObj){$('.find-label').html('<p class="loging">正在加载，请稍候...</p>');},
		success:function(msg)
		{
		    if (msg.status == 1) {
			var html = '';
			html += '<div class="find-label fn-clear">';
			html += '<div class="fndl-title"><h2>'+msg.name+'<i></i></h2></div>';
			html += '<div class="fndl-list fn-clear">';
			$.each(msg.data,function(index,array){
				var tag_class= "user-label";
				if (type == 3 && id == array['id'])
				{
					tag_class= "user-label user-labeled";
				}
			    html += '<a href="javascript:void(0);" onclick="show(3,'+array['id']+',this);" class="'+tag_class+'"><span>'+array['name']+'</span></a>';
			})
			html += '</div></div>';
			$('.find-label').html(html);
			//$('#tag_show_z_k_'+msg.id).addClass('active');
		    }
		    else
		    {
			$('.find-label').html('<p class="nothing-c">该分类中暂时没有标签。。。。。。</p>');
		    }
		}
	});
}

function get_uid_from_tag(type,id,url)
{
	if (url == undefined) {
		url = ""+need_url+"/ajax/get_uid_from_tag.php";
	}
	$.ajax({
		type:"get",
		url:url,
		data:{type:type,id:id},
		dataType:"json",
		beforeSend:function(xmlHttpObj){$('#show_tags').html('<p class="loging">正在加载，请稍候...</p>');},
		success:function(msg)
		{
		    var html = '';
		    if (type == 2)
		    {
			html += '<div class="tag-wrap fn-clear"><h3 class="tgw-detail">标签：<em>'+msg.name+'</em></h3>';
			html += '<div class="attentiong-btn">';
			if (msg.islogin == 1)
			{
				if (msg.isfocus == 1)
				{
					html += '<a href="javascript:void(0);" onclick="add_focus('+msg.tag_id+',\'tag\',4,this)" class="guanzhu-btn  fn-hide">关注</a><a class="yiguanzhu-btn">已关注</a><a href="javascript:void(0);" onclick="cancel_focus('+msg.tag_id+',\'tag\',4,this)" class="quxiao-btn fn-hide">取消关注</a>';
				}
				else
				{
					html += '<a href="javascript:void(0);" onclick="add_focus('+msg.tag_id+',\'tag\',4,this)" class="guanzhu-btn">关注</a><a class="yiguanzhu-btn fn-hide">已关注</a><a href="javascript:void(0);" onclick="cancel_focus('+msg.tag_id+',\'tag\',4,this)" class="quxiao-btn fn-hide">取消关注</a>';
				}
			}
			else
			{
				html += '<a href="javascript:void(0);" onclick="loginWindow.openlogindiv(\'login\',location.href, function(){location.reload();});" class="guanzhu-btn">关注</a><a class="yiguanzhu-btn fn-hide">已关注</a><a href="javascript:void(0);" onclick="loginWindow.openlogindiv(\'login\',location.href, function(){location.reload();});" class="quxiao-btn fn-hide">取消关注</a>';
			}
			
			html += '</div></div>';
		    }
		    //如果有人关注
			html += '<p class="cr-title" id="show_uid_from_tag_num">TA们都感兴趣（<span>'+msg.num+'</span>人）</p><div class="cr-focht fn-clear" id="show_uid_from_tag">';
			if (msg.status == 1)
			{
				$.each(msg.data,function(index,array){
					html += '<a href="'+need_url+'/myfate.php?hash='+array['hash']+'" target="_blank" class="user-photo25" id="show_tag_uid_'+array['hash']+'"><img src="'+array['avatar']+'" alt=""><span class="bg-radius25"></span></a>';
				})
			}
			html += '</div>';
			if (msg.status == 1)
			{
				html += '<div class="left-page">'+msg.page+'</div>';
			}
			
				html += '</div>';
			$('#show_tags').html(html);
			//给分页绑定click事件，获取数据，阻止分页跳转
			$('.left-page a').each(function(){
			    $(this).live('click',function(){
					get_uid_from_tag(type,id,$(this).attr('href'));
					return false;
				})
			})
			 //鼠标滑过已关注时效果
			$('.attentiong-btn').hover(function(){
				if($(this).find(".guanzhu-btn").hasClass('fn-hide'))
				{
				    $(this).find(".yiguanzhu-btn").addClass('fn-hide');
				    $(this).find(".quxiao-btn").removeClass('fn-hide');
				}
			    },function(){
				if($(this).find(".guanzhu-btn").hasClass('fn-hide'))
				{
				    $(this).find(".quxiao-btn").addClass('fn-hide');
				    $(this).find(".yiguanzhu-btn").removeClass('fn-hide');
				}
			    })
			//document.title = msg.name+'话题_发现交友_缘分圈_世纪佳缘交友网';
		},
		error:function(response)
		{
		   $('#show_tags').html('<p class="nothing-c">加载失败！请稍候重试</p>');
		}
	});
}
///获取热门标签
function get_hot_tags()
{
    $.ajax({
	type:"get",
	url:""+need_url+"/ajax/get_hot_tags.php",
	dataType:'json',
	data:{},
	success:function(msg)
	{
	    var html = '';
	    html += '<p class="cr-title">热门标签</p><div class="user-tags fn-clear">';
	    $.each(msg,function(index,array){
		    html += '<a href="'+need_url+'/show.php?type=list_all&id='+array['id']+'" target="_blank" class="user-label"><span>'+array['name']+'&nbsp;&nbsp;<i>'+array['topic_number']+'</i></span></a>';
	    })
	    html += '</div>';
	    $('#show_tags').html(html);
	}
    })
}
function cutImage(obj, width, height) {
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
