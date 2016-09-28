/**
 * 获取信件分页
 * @param type 类型
 * @param page 分页，默认为第1页
 * @param total 总数
 * @param size 每页显示数量，默认为10个
 * @param func 回调函数，默认为get_list
 * @return html  <ul class="fn-clear"><li><a href="javascript:;" onclick="get_list(type, page)">1</a></li></ul>
 */
function get_list_page(type, page, total, size, func){
	var page_str = '<ul class="fn-clear">';
	var pages = Math.ceil(total/size);
	var page_prev = page-1;
	var page_next = page+1;
	var page_prev_txt = '';
	var li_class = '';
	var more_str = '';
	var more_str2 = '';
	if(pages > 0){
		if(page == pages) page_prev_txt = '<span>上一页</span>';
		if(page_prev > 0)  page_str += '<li class="prev"><a href="javascript:;" onclick="'+func+'(\''+type+'\', '+page_prev+')"><i></i>'+page_prev_txt+'</a></li>';
		for (var i = 1; i <= pages; i++) {
			li_class = i == page ? ' class="on"' : '';
			if(i > 5 && i<pages-2 && (i < page-1 || i > page+1)){
				if(i < page-1 && !more_str){
					more_str = '...';
					page_str += '<li>'+more_str+'</li>';
				}
				if(i > page+1 && !more_str2){
					more_str2 = '...';
					page_str += '<li>'+more_str2+'</li>';
				}
			}
			else page_str += '<li'+li_class+'><a href="javascript:;" onclick="get_list(\''+type+'\', '+i+')">'+i+'</a></li>';
		}
		if(page_next <= pages) page_str += '<li class="next"><a href="javascript:;" onclick="'+func+'(\''+type+'\', '+page_next+')"><span>下一页</span><i></i></a></li>';
	}
	page_str += '</ul>';
	if(pages <= 1) page_str = '';
	if($('#letter_page').length > 0) $('#letter_page').html(page_str);
	return true;
}

/**
 * 获取信件分页,201409改版
 * @param type 类型
 * @param page 分页，默认为第1页
 * @param total 总数
 * @param size 每页显示数量，默认为10个
 * @param func 回调函数，默认为get_list
 * @return html  
 */
function get_list_page_v2(type, page, total, size, func){
	var page_str = '<div class="jyPage"><ul class="fn-clear"> ';
	var pages = Math.ceil(total/size);
	var page_prev = page-1;
	var page_next = page+1;
	var page_prev_txt = '';
	var li_class = '';
	var more_str = '';
	var more_str2 = '';
	
	if(pages > 0){
		
		page_str += '<li><a href="javascript:void(0);" onclick="'+func+'(\''+type+'\', 1)">首页</a></li>';
		
		if(page_prev > 0) page_str += '<li><a href="javascript:void(0);" onclick="'+func+'(\''+type+'\', '+page_prev+')">上一页</a></li>';
		
		page_str += '<li class="selectPage"> <strong>第'+page+'页</strong>';
		
		if(pages>1){
		 page_str += '<div class="pageOuter"><div class="pageList">';
		
			for (var i = 1; i <= pages; i++) {
				if(i!=page)
					page_str += '<a href="javascript:void(0);" onclick="'+func+'(\''+type+'\', '+i+')">第'+i+'页</a> ';
				else
					page_str += '<a href="javascript:void(0);"  class="cur_page">第'+i+'页</a> ';	
			}
			page_str += '</div></div>';
			
			if(page_next <= pages)  //下一页
			page_str += '<li><a href="javascript:void(0);" id="page_btn_next" onclick="'+func+'(\''+type+'\', '+page_next+')">下一页</a></li>';
		}
		if(page < pages)
	  {
			page_str += '<li><a href="javascript:;" onclick="'+func+'(\''+type+'\', '+pages+')">末页</a></li>';
		}
	}
	
	page_str += ' </ul></div>';
	if(pages <= 1) page_str = '';
	if($('#letter_page').length > 0) $('#letter_page').html(page_str);
	

	
	if($('.selectPage').length > 0){
		// 翻页
		$('.selectPage').hover(function () {
        $('.pageList').show();
        	 var len = $('.pageList a').length;
        if (len > 10) {
        	$('.pageList').css({height: 250});
        	$('.pageList').scrollTop(23*$page.now-200);
        }
      else{
      	$('.pageList').css({height: 25*len});
       }
        
    }, function () {
        $('.pageList').hide();
    });
		}
	return true;
}


//提示错误结果
function show_result_error(recode){
	recode = parseInt(recode);
	if(recode == -1){
        JY_Alert('温馨提示', '未登录');
        return false;
    }
    else if(recode == -2){
        JY_Alert('温馨提示', '操作过快');
        return false;
    }
    else if(recode == -10){
        JY_Alert('温馨提示', '您的权限不够');
        return false;
    }
    else if(recode != 0){
        JY_Alert('温馨提示', '获取记录失败，请重试');
        return false;
    }
    return true;
}

//公用
$(function(){

	//排序tab切换
	$('.sort-mod li a').click(function(){
		$(this).parent().addClass('selected');
		$(this).parent().siblings().removeClass('selected');
		if($('.search-txt').length > 0) $('.search-txt').val('');//清除搜索内容
		if(!$(this).parent().hasClass('condition')) $('.ly-close').click();//关闭条件搜索
	});
	
	//昵称搜索
	$('.search-btn').click(function(){
		if($('li.condition').hasClass('selected')) $('.ly-close').click();
		$('.sort-mod li').removeClass('selected');
	});

	//快速充值TAB切换
	var $tab_li =$('.tab-menu ul li');
	$tab_li.mouseover(function(){
		$(this).addClass('selected').siblings().removeClass('selected'); 
		var index = $tab_li.index(this);  
		$('.tab-box>div').eq(index).show().siblings().hide();
	});

	//充值流程弹层
	$('.qa').hover(function(){
		$(this).parents('div').find('.buy_notice').show();	
	},function(){
		$(this).parents('div').find('.buy_notice').hide();
	});

    //搜索框
	$('.search-txt,.pay_text').focus(function(){
		  if($(this).val() ==this.defaultValue){  
			  $(this).val('');           
		  } 
		  $(this).css('color','#5b5b5b');
	}).blur(function(){
		 if ($(this).val() == '') {
			$(this).val(this.defaultValue);
			$(this).css('color','#b5b5b5');
		 }else{
			$(this).css('color','#5b5b5b');
		 }
	});

	//列表区关闭效果
	 $('.close').click(function(){
		$(this).parent().hide();
		return false;
	});
	
	//列表区全选效果
	function checkbox() {
        var $check_all = $('#allInput');
        var $m_input = $('.m-input:checkbox');
		var $item=$('.item').find('.input-mod');
		$check_all.click(function () {
            $m_input.attr('checked',this.checked);
			if(this.checked){
				$item.addClass('visible').find('.refusal').show();
			}else{
				$item.removeClass('visible').find('.refusal').hide();
			}
           
        });
        $m_input.click(function(){
            var flag = true;
            $m_input.each(function () {
                if (!this.checked) {
                    flag = false;
                }
            });
            $check_all.attr('checked', flag);
        });
    }
    checkbox();
	//营销区
	$('#ad_pos_67 .promotions').hover(function(){
		$(this).addClass('on');
	},function(){
		$(this).removeClass('on');
	});
	
	//列表区鼠标经过效果
	var $contact=$('.item');
	$contact.hover(function () {
        if (!$(this).hasClass('promotions')) {
            $(this).addClass('on').find('.input-mod').addClass('visible');
            $(this).find('.refusal').css('display', 'block');
        }
       
    }, function () {
        var $inputmod = $(this).removeClass('on').find('.input-mod');
        var $checkbox = $inputmod.children('input[type=checkbox]:checked');
        if (!($checkbox && $checkbox.length)) {
            $inputmod.removeClass('visible');
            $(this).find('.refusal').css('display', 'none');
        }
       
    });

     //兼容ie7
    $('.item').live('mouseover',function(){

    	if($(this).find('.refusal').length > 0){

	    	if( $.browser.msie ){

	    		if( $.browser.version <= 7 ){
	    			
	    			$(this).find('.msg-btn').css('margin-bottom',0);
	    			$(this).find('.pay_btn').css('margin-bottom',6);
	    			$(this).find('.refusal').css('margin-left',0);
	    			
	    			
	    		}
	    	}
    	}
        
    })
    $('.item').live('mouseout',function(){
    	if($(this).find('.refusal').length > 0){
	    	if( $.browser.msie ){

	    		if( $.browser.version <= 7 ){

	        		$(this).find('.pay_btn').css('margin-bottom',6);
	        		$(this).find('.msg-btn').css('margin-bottom',6);
			    }
			}
		}
    })

	//收信按钮tips
	$('.orange .pay_btn').live('hover',function(){

		$(this).siblings('.replay-btn-layer').toggle();

	});

	//公共弹层
	function layer(ly){
		$('#bg').width($(window).width()).height($(document).height()).show();
		ly.show();
	}
	$('.ly_close').live('click',function() {
		$('#bg,.ly_subbg').hide();
		return false;
	});
	//补贴邮票弹层
	$('.subsidy').click(function(){
		var $ly_height=$('.ly_subbg').height();
		$('.ly_subbg').css('marginTop',-($ly_height/2));
		layer($('.ly_subbg'));
		return false;
	});
	function oHeight(){
		$('.input-txt').height($('.txt').height());
		
	}
	$('.modify').click(function(){
		$(this).parents('.topic-detail').addClass('topic-detail-w');
		var $mo_txt=$(this).siblings('span').text();
		$('.input-txt').val($mo_txt).focus();
		
		oHeight();
		$('.txt span').empty();
		$('.modify').css('display','none');
		return false;
	});
	$('.input-txt').blur(function(){
		var $input_txt=$(this).val();
		$(this).parents('.topic-detail').removeClass('topic-detail-w');
		$('.txt span').text($input_txt);
		$('.modify').css('display','inline');
		oHeight();
		var $ly_height=$('.ly_subbg').height();
		$('.ly_subbg').css('marginTop',-($ly_height/2));
		
	});

	//按条件搜索弹层
	$('.condition').click(function(){
		if($('.condition-layer').is(':hidden')){
			$(this).parents('.sort-nav').addClass('con-nav').find('.condition-layer').show(500,function(){
				$('.condition-layer').css('overflow','visible');
			});
		}else{
			$(this).parents('.sort-nav').removeClass('con-nav').find('.condition-layer').hide(1000);
		}
		return false;
	});
	$('.ly-close').click(function(){
		$(this).parents('.sort-nav').removeClass('con-nav').find('.condition-layer').hide(1000);
	});
	$('.spotlightSelect li').click(function(event){
		event.stopPropagation();
		$(this).children('.selectPopups').show().parent().siblings().children('.selectPopups').hide();
		$(this).find('.triangle').addClass('triangleUp').closest('li').siblings().find('.triangle').removeClass('triangleUp');
		$(this).children('.lightWidth').addClass('lightWidthSelect').parent().siblings().children('.lightWidth').removeClass('lightWidthSelect');
		$(this).css('z-index','10').siblings().css('z-index','2');
	});
	$('body').bind('click',function(event){
		$('.selectPopups').hide();
		$('.lightWidth .triangle').removeClass('triangleUp');
		$('.lightWidth').removeClass('lightWidthSelect');
	});
	//确定按钮关闭弹层
	$('.lySure a').click(function(e){
		var selects = $(this).closest('.selectPopups').find('select'),
			selectTotal = selects.length,
			str;
		if(selectTotal === 1){
			str = selects.val();
		}else{
			str = window.parseInt(selects.eq(0).val(), 10) + '至' + selects.eq(1).val();
		}
		$(this).closest('li').find('.lightWidth span').text(str).siblings('.triangle').removeClass('triangleUp');
		$(this).closest('li').children('.lightWidth').removeClass('lightWidthSelect');
		$(this).closest('.selectPopups').hide();
		
		e.stopPropagation();
	});
	$('.lightWidth').hover(function(){
		$(this).siblings('.selectPopups').is(':visible') ? $(this).removeClass('hover') : $(this).addClass('hover');
	},function(){
			$(this).removeClass('hover');
	});

	$('.range-title').click(function(){
		$('.tr_select').toggle();
	});
	$('.tr_select li').click(function(){
		$('.range-title span').text($(this).text());
		$('.tr_select').hide();
	});

})