// JavaScript Document
$(function(){
//俱乐部播报推送
	var scrtime; 
    $(".scrollpic").hover(function(){ 
         clearInterval(scrtime);//停止滚动 
    },function(){ 
        scrtime = setInterval(function(){ 
                var scrollpic = $(".scrollpic ul"); 
                var liHeight =scrollpic.find(" li:last").height();//计算最后一个li元素的高度 
                scrollpic.animate({marginTop : liHeight+40 +"px"},1000,function(){ 
                    scrollpic.find("li:last").prependTo(scrollpic)
                    scrollpic.find("li:first").hide(); 
                    scrollpic.css({marginTop:0}); 
                    scrollpic.find("li:first").fadeIn(1000); 
                });         
        },3000); 
     }).trigger("mouseleave"); 

//签到加分
$(function(){

  $(".qd_btn").click(function(){
      var _this = this;
      var onum = $(this).prev().find('.col_pink');      
	  $(".jd_num").fadeIn();
      setTimeout(function(){
        $(".qd_btn").prev().find('.jd_num').animate({
              top:'-100px',
              left:'150px',
              opacity:'hide'
          },'1500',function(){
              onum.html(onum.html()*1+50);
              $(".jd_num").css("top","8px");
              $(".jd_num").css("left","112px");
          }
        );
      },800);
      
	});
})

//超值li hover;
$('.list_bg li').hover(function() {  

    $(this).addClass('cur');

}, function() {

    $(this).removeClass('cur');

}); 
//超值li hover;
$('.list_bg1 li').hover(function() {  

    $(this).addClass('cur');

}, function() {

    $(this).removeClass('cur');

}); 
//试试手气
$(".cj_list li ").hover(function() {
	$(this).children(".btm_bg,.btm_text").show();
    $(this).addClass('cur');
	}, function() {
	$(this).children(".btm_bg,.btm_text").hide();
    $(this).removeClass('cur');
});	
//限时特惠切换
$(".th_nav li").mouseover(function(){
   $(this).addClass("th_cur ").siblings().removeClass("th_cur");	
   
   $(".th_list").hide().eq($(this).index()).show();
});

$(".th_list li").hover(function(){
   $(this).children(".hide_bg,.hide_con").show();
	},function(){
	$(this).children(".hide_bg,.hide_con").hide();
								
});
//金豆换礼
$(".scroll_list ul li").hover(function(){
   $(this).children(".hide_bg,.hide_con").show();
	   },function(){
   $(this).children(".hide_bg,.hide_con").hide();   
									
});	
})

//倒计时
function lxfEndtime(){
          $(".lxftime").each(function(){
                var lxfday=$(this).attr("lxfday");//用来判断是否显示天数的变量
                var endtime = new Date($(this).attr("endtime")).getTime();//取结束日期(毫秒值)
                var nowtime = new Date().getTime();        //今天的日期(毫秒值)
                var youtime = endtime-nowtime;//还有多久(毫秒值)
                var seconds = youtime/1000;
                var minutes = Math.floor(seconds/60);
                var hours = Math.floor(minutes/60);
                var days = Math.floor(hours/24);
                var CDay= days ;
                var CHour= hours % 24;
                var CMinute= minutes % 60;
                var CSecond= Math.floor(seconds%60);//"%"是取余运算，可以理解为60进一后取余数，然后只要余数。
                if(endtime<=nowtime){
                        $(this).html("已过期")//如果结束日期小于当前日期就提示过期啦
                        }else{
                                if($(this).attr("lxfday")=="no"){
                                        $(this).html("<i>本场还剩：</i><span>"+CHour+"</span>时<span>"+CMinute+"</span>分<span>"+CSecond+"</span>秒");          //输出没有天数的数据
                                        }else{
                        $(this).html("<i>本场还剩：</i><span>"+days+"</span><em>天</em><span>"+CHour+"</span><em>时</em><span>"+CMinute+"</span><em>分</em><span>"+CSecond+"</span><em>秒</em>");          //输出有天数的数据
                                }
                        }
          });
   setTimeout("lxfEndtime()",1000);
  };
$(function(){
      lxfEndtime();
   });

//金豆换礼
(function($){
            $.fn.hoverDelay = function(options){
                var defaults = {
                    hoverDuring: 200,
                    outDuring: 200,
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
                    var that = this;
                    var hoverTimer, outTimer;
                    $(this).hover(
                            function(){
                                clearTimeout(outTimer);
                                hoverTimer = setTimeout(
                                        function(){sets.hoverEvent.apply(that)},
                                        sets.hoverDuring
                                );
                            },

                            function(){
                                clearTimeout(hoverTimer);
                                outTimer = setTimeout(
                                        function(){sets.outEvent.apply(that)},
                                        sets.outDuring
                                );
                            }
                    );
                });
            }
        })(jQuery);


function Scroll(obj){
    this.id = obj.id || 'wg_box';
    this.leftClassName = obj.leftClass || 'prev_btn';
    this.rightClassName = obj.rightClass || 'next_btn';
    this.tarClassName = obj.tarClass || 'scroll_list-box';
    this.ele =  $('#' + this.id);
    this.lBtn = this.ele.find('.' + this.leftClassName);
    this.rBtn = this.ele.find('.' + this.rightClassName);
    this.len = this.ele.find('ul').length;
    this.tar = this.ele.find('.' + this.tarClassName);
    this.oneW = this.ele.find('ul').width();
    this.index = 1;
    this.timer = null;
    this.isdoing = false;
    this.second = obj.second || 3000;
    this.start();
}
Scroll.prototype = {
    setIndex:function(o){
        var index = this.index;
        if(o && o.prev){
            index--
        }
        else{
            index++
        }
        this.index = index;
        return index;
    },
    doIt:function(obj){
        this.isdoing = true;
        var _this = this;
        var tar = this.tar;
        var w = this.oneW;
        var index = this.setIndex(obj);
        var callback = (obj && obj.callback) || function(){};
        if(index == this.len - 1){
            this.index = 1;
            tar.animate({left:-index*w},function(){
                tar.css({left:-_this.index*w});
                if(callback){
                    callback();
                }
                _this.isdoing = false;
            });
        }
        else if(index == 0){
            this.index = this.len - 2;
            tar.animate({left:-index*w},function(){
                tar.css({left:-_this.index*w});
                if(callback){
                    callback();
                }
                _this.isdoing = false;
            });
        }
        else{
            tar.animate({left:-index*w},function(){
                _this.isdoing = false;
            });

        }
    },
    clear:function(){
        if(this.timer){
            clearInterval(this.timer);
        }
    },
    start:function(){
        var _this = this;
        this.bindEvent();
        this.timer = setInterval(function(){
            _this.doIt();
        },this.second);
    },
    bindEvent:function(){
        var _this = this;
        this.lBtn.click(function(){
            if(_this.isdoing) return;
            if(_this.timer){
                clearInterval(_this.timer);
            }
            _this.doIt({prev:true,callback:function(){
                _this.restart();
            }})
        });
        this.rBtn.click(function(){
            if(_this.isdoing) return;
            if(_this.timer){
                clearInterval(_this.timer);
            }
            _this.doIt({
                callback:function(){
                    _this.restart();
                }
            })
        });
        this.ele.mouseover(function(){
            if(_this.timer){
                clearInterval(_this.timer);
            }
        });
        this.ele.mouseout(function(){
            _this.restart();
        });
    },
    restart:function(){
        if(this.timer){
            clearInterval(this.timer);
        }
        var _this = this;
        this.timer = setInterval(function(){
            _this.doIt();
        },this.second);
    }
}