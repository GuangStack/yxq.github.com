$(function(){
	$('#select_box').hover(function(){
		var len=$('.pageNo a').length;
		$('.pageNo').show();
		if(len>10){
			$('.pageNo').css({height:250})
		}
	},function(){
		$('.pageNo').hide();	
	})	
})

$(function(){
	$('#checkbox_save').click(function(){
		if($('#checkbox_save').attr("checked")){
			$('.saveSelect').addClass('on');
		}else{
			$('.saveSelect').removeClass('on');
		}
	})
	$('.arrow2').hover(function(){
		$(this).addClass('on2');	
	},function(){
		$(this).removeClass('on2');	
	})
	$('.keyTop').hover(function(){
		$(this).addClass('on');	
	},function(){
		$(this).removeClass('on');	
	})
	$('.topList>ul>li').hover(function(){
		$(this).addClass('on2');	
	},function(){
		$(this).removeClass('on2');
	})
})


$(function(){
	// $('#showType').toggle(
		// function(){
			// $('.mixedType').show();
			// $(this).addClass('jian').removeClass('jia');
		// },
		// function(){
			// $('.mixedType').hide();
			// $(this).addClass('jia').removeClass('jian');
		// }
	// )
	
	$('.mixedType>ul>li').hover(function(){
		if(!$(this).hasClass('selectThis')){
			var index=$('.mixedType>ul>li').index(this);
			if($(this).hasClass('li6') || $(this).hasClass('li7')){
				$(this).css({overflow:'inherit',height:'24px',background:'#fff'});	
			}
			else{
				$(this).css({overflow:'inheri',height:'auto',background:'#F1F8FF'});
			}
		}
	},function(){
		if(!$(this).hasClass('selectThis')){
			var index=$('.mixedType>ul>li').index(this)
			if($(this).hasClass('li6') || $(this).hasClass('li7')){
				$(this).css({overflow:'inherit',background:'#fff'});
			}
			else{
				$(this).css({overflow:'hidden',height:'24px',background:'#fff'});
			}
		}
	})
	  
	$('.mixedType img').click(function(){
		$(this).hide();
		var index=$('.mixedType img').index(this)
		var id=$(this).attr('id').split('_')[1];
		$('#li'+id).addClass('selectThis');
		$('#li'+id).find('.fixed').show();
		$('#li'+id).find('.closeItem').show();
		
		$('#li'+id).find('.fixed').click(function(){
			$('#li'+id).find('.fixed').hide();
			$('#li'+id).find('.closeItem').hide();
			$('#li'+id).removeClass('selectThis');	
			$('#li'+id).css({overflow:'hidden',height:'24px'})
			$('#more_'+id).show();
		})
		$('#li'+id).find('.closeItem').click(function(){
			$('#li'+id).find('.fixed').hide();
			$('#li'+id).find('.closeItem').hide();
			$('#li'+id).removeClass('selectThis');
			$('#li'+id).css({overflow:'hidden',height:'24px'})
			$('#more_'+id).show();
		})
	})

	$('.mixedType>ul>li:gt(4)').hide();
	$(".showAll").toggle(
		function(){
			$(this).addClass('up');
			$('.mixedType>ul>li:gt(4)').show(100,function(){
				if ($.browser.msie && ($.browser.version == "6.0") && !$.support.style) {
					var iTop=470;
				}else{
					var iTop=450	
				}
				$('#tips_4').css('position','absolute').css('left',302).css('top',iTop).css('z-index',999);	
			});
			$('#li5').css('border-bottom-width','0px');
		},
		function(){
			$(this).removeClass('up');
			$('.mixedType>ul>li:gt(4)').hide();
			$('#li5').css('border-bottom-width','1px');
		}
	)
})

function vipIntro(flag) {
	if(flag == 1){
		$('#vip_tip').show().css('top',30).css('left',322);
	}
	else if(flag == 2){
		$('#vip_tip').show().css('top',60).css('left',275);
	}
	$('.close_btn').click(function(){
		$('#vip_tip').hide();
	})
}