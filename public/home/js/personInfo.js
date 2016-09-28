$(function(){
	$('.user-pic .user-photo40').live({
		mouseenter:function(){
			if ($(this).find('.bg-radius40').attr('pid') == 1) {
				return false;
			}
			$('.u-detail').addClass('fn-hide');
			if(typeof(window.t1)!='undefined') clearTimeout(window.t1);
			var obj = $(this);
			var ids = $(this).find('.bg-radius40').attr('id');
			
			//var imgW = $('#'+ids).parents('.topic-box').find('.user-con').css('height');
			//alert($('#'+ids).offset().top);
			//alert($(window).height());
			var idArr = ids.split('_');
			var oid = idArr[0];
			//var oid = ids;
			var is_sys = idArr[1];
			//var d = getPos($(this));
			//var left = parseInt(d.l);
			//alert(left);
			///var top = parseInt(d.t);
			//alert(top);
			//var leftUpTop = top + parseInt(imgW) + 12;
			//var rightDownLeft = left + parseInt(imgW) - 366;
			//var rightDownTop = top - 166 - 28 - 12;
			$.ajax({
				type:"get",
				url:""+need_url+"/ajax/get_user_info.php",
				data:"oid="+oid+"&type="+is_sys,
				dataType:"json",
				beforeSend:function(xmlHttpObj){
					/*if(pos == 1){
						$('#position_show_before').attr('class','popTriangleLeftTop');
						$('#before').css({left: left,top: leftUpTop}).show();
					}else if(pos == 4){
						$('#position_show_before').attr('class','popTriangleRightBottom');
						$('#before').css({left: rightDownLeft,top: rightDownTop}).show();
					}	*/				},
				success:function(msg){
					var html ='';
					html += '<dl class="fp-dl">';
					html += '<dt class="fp-dl-dt"><a href="'+need_url+'/myfate.php?hash='+oid+'" target="_blank"><img src="'+msg.avatar+'" /></a></dt>';
					html += '<dd class="fp-dl-dd">';
					html += '<p class="fp-dl-name fn-clear"><span class="username"><a href="'+need_url+'/myfate.php?hash='+oid+'" target="_blank">'+msg.nickname+'</a></span>';
					//如果是小编
					if (is_sys == 1)
					{
						html += '<i class="editor-name">小编</i>';
					}
					html += '</p>';
					html += '<a href="'+need_url+'/myfate.php?hash='+oid+'" target="_blank" class="fp-dl-data"><span>'+msg.age+'岁</span>,<span>'+msg.height+'cm</span>,<span>'+msg.marriage+'</span>,<span>'+msg.location+'</span></a>';
						html += '<p class="fp-dl-achieve">成就<a class="fp-dl-chengjiu">参与话题<i>'+msg.topic+'</i></a><a class="fp-dl-chengjiu">赞<i>'+msg.praised+'</i></a></p>';
						html += '<div class="fp-dl-send">';
					       //判断显示  关注 还是已关注 默认显示关注
						var statu1 = '';
						var statu2 = 'fn-hide';
						if(msg.isfocus == 1) {
							statu1 = 'fn-hide';
							statu2 = '';
						}
						//如果不是小编 则显示 关注和发信
						if (is_sys == 0) {
							//如果是登录状态
							if(msg.islogin == 1) {
								//如果是异性
								if (msg.sex == 1)
								{
									html += '<div class="attention-btn"><a onclick="add_attention(\''+oid+'\',3,this)" class="guanzhu-btn '+statu1+'">关注</a><a class="yiguanzhu-btn '+statu2+'">已关注</a><a onclick="cancel_attention(\''+oid+'\',3,this)" class="quxiao-btn fn-hide">取消关注</a></div>';
									html += '<a href="'+jy_site_url+'/msg/send.php?uhash='+msg.uhash+'&fxly=cp_yfq" class="fp-dl-smsg" onmousedown="send_pv_by_letter(\''+oid+'\')" target="_blank">发信</a>';
									
								}	
							}
							else
							{
								html += '<div class="attention-btn"><a onclick="loginWindow.openlogindiv(\'login\',location.href, function(){location.reload();});" class="guanzhu-btn">关注</a></div>';
								html += '<a onmousedown="send_pv_by_letter(\''+oid+'\')" onclick="loginWindow.openlogindiv(\'login\',location.href, function(){location.reload();});" class="fp-dl-smsg">发信</a>';
							}
						}
						html += '</div></dd></dl>';
					$('#'+ids).parents('.user-pic').find('.u-detail').html(html);
					$('#'+ids).parents('.user-pic').find('.u-detail').removeClass('fn-hide');
					//鼠标滑过已关注时效果
					$('.attention-btn').hover(function(){
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
						
				},
				error:function(response){
				   //alert("加载失败");
				}
			});
		},
		mouseleave:function(){
			var ids = $(this).find('.bg-radius40').attr('id');
			window.t1 = setTimeout(function(){ $('#'+ids).parents('.user-pic').find('.u-detail').addClass('fn-hide');}, 500);
			  $('#'+ids).parents('.user-pic').find('.u-detail').mouseenter(function(){
				  if(typeof(window.t1)!='undefined') clearTimeout(window.t1);
				  $('#'+ids).parents('.user-pic').find('.u-detail').removeClass('fn-hide');
			  });
			  $('#'+ids).parents('.user-pic').find('.u-detail').mouseleave(function(){
				  $('#'+ids).parents('.user-pic').find('.u-detail').addClass('fn-hide');
			  });
		}
		
		})
})
//统计发信pv
function send_pv_by_letter(uid){
    //发信按钮点击人数
    send_jy_pv2('|1022112_4|'+uid);
}
  