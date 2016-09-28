
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>一线牵交友网-活动频道</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="世纪佳缘交友网：美国纳斯达克上市公司，股票代码DATE。致力于打造严肃婚恋的交友平台，数百万会员在这里找到对象。现一亿注册会员，让缘分千万里挑一！" />
<link href="{{'/home/css/hd_base.css'}}" rel="stylesheet" type="text/css" /> 
<link href="{{url('/home/css/hd_main.css')}}" rel="stylesheet" type="text/css" /> 
<script type="text/javascript" src=".{{url('/home/js/jquery-1.9.1.min.js')}}"></script>
<script src=".{{url('/home/js/slides.min.jquery.js')}}"></script>
<script type="text/javascript" src="{{url('/home/js/pv.js')}}"></script>
<script type="text/javascript" src="{{url('/home/js/ads.js')}}"></script>

</head>

<body>
<!--头部-->
<script type="text/javascript" src="./js/head_white.js"></script>
<div class="hd_head">
	<div class="w_1000 clearfix">
    	<h2 class="hd_navtit">一线牵活动</h2>
        
        <script type="text/javascript">
        	
			$(function(){
				$('.city_list dd a').each(function(){
					$(this).click(function(){
						$('.current_city').html($(this).html());
						$('#hd_city_list').hide();
					});
				});
				$('.change_btn').click(function(){
					$('#hd_city_list').show();	
				})
				$('.city_close span').click(function(){
					$('#hd_city_list').hide();	
				})
			});
        </script>
        <div class="hd_slgns fixPNG"></div>
    </div>
</div>
<div class="w_1000">
	<div class="hdlm_tit clearfix">
    	<ul>
            <li class="active"><a href="?locationId=11&tag=1"  target="_blank" title="">线下活动</a></li>
        	<li ><a href="?locationId=11&tag=2" target="_blank" title="">交友节目</a></li>
        	<li><a href="cooperation.php" target="_blank" title="">商务合作</a></li>
        </ul>
        <div class="myActive"><a href="my_party.php" title="">我的活动</a></div>
    </div>
    <div id="banner_slides" style="display: ;"> 
        <div class="slides_container"> 	
        	<div class="hd_banner"><a href="#" title="">
            <img src="{{url('/home/img/1467874427.jpeg')}}" width="680" height="250" alt="" /></a></div> 
        </div>	
		<a href="javascript:;" hidefocus="true" class="prev fixPNG"></a>
		<a href="javascript:;" hidefocus="true" class="next fixPNG"></a>	
    </div>
    <div class="hot_hd" style="border:none;">
        <div class="imgAd" id="ad_rightImg">

        <a href="#" target="_blank">
     
        <img src="{{url('/home/img/1472630539.jpeg')}}" width="318" height="119" alt="" /></a>

        </div>
            <ul>
                <li id="ad_remen"><span style="border:1px solid #fa5e73;color:#fa5e73;">热门</span><a href="#" target="_blank" title=""></a></li>
                <li id="ad_tuijian"><span style="border:1px solid #f29045;color:#f29045;">推荐</span><a href="#" target="_blank" title=""></a></li>
                <li id="ad_huodong"><span style="border:1px solid #30b16e;color:#30b16e;">活动</span><a href="#" target="_blank" title=""></a></li>
            </ul>
    </div>
    <div class="leftbar">
            	<!--<div class="orderad" style="margin-bottom:15px;"><a href="http://wxapi.jiayuan.com/wap/customized/index"><img src="http://hd.jyimg.com/w4/party/v2/customized/images/orderad2.jpg" width="680" height="210" /></a></div>-->
                


                <div class="hd_num">线下活动——报名进行中</div>
    	    
              @foreach($data as $active )
                <div class="hd_item clearfix">
            	
                <div class="hdlimg">
                <a href="party_info.php?pid=9019" target="_blank" title="">
               
                <img src="{{ $active -> img }}" width="260" height="190" alt="" />
                
                </a>   <span class="fixPNG">进行中</span>
               </div>
                <div class="hdlinfo">
                	<h5>{{$active -> startenter }}&nbsp;推荐&nbsp;{{$active -> money}}</h5>
                    <h4>
                    <a href="party_info.php?pid=9019" target="_blank" title="">{{$active -> title}}</a>

                    </h4>
                    <ul>
                    	<li class="fixPNG" style="background-position:0 0;">{{ $active -> starttime }}</li>
                    	<li class="fixPNG" style="background-position:2px -19px;">
                         {{$active-> place}}   
                        </li>
                    	<li class="fixPNG" style="background-position:0 -38px;">
                           男：<span class="b_color">{{$active -> man}}</span>人 | 女：<span class="g_color">{{$active -> woman}}</span>人
                        </li>
                    </ul>
                   
                </div>
                

                <div class="ljbm"><button id = 'button'>点击报名</button></div>
            </div>
            @endforeach
                <script type="text/javascript">
                    
                    var bu = document.getElementById('button');
                    bu.onclick = function()
                    {
                        alert('恭喜你报名成功');
                    }

                </script>   	
       
    </div>
    <div class="rightbar">
    	<div class="hd_latest">
            <div class="rtit"><h4>最新动态</h4></div>
            <div class="hd_state">
                <div id="latest">
                    <ul>
                                                 <li>
                            <div class="state_time">
<!--                                6分钟前-->
                            </div>
                            <dl class="state_info">
                            	<dt><img src="{{url('/home/img/c88e0dbc8_4_avatar_p.jpg')}}" width="60" height="74" alt="" /></dt>
                                <dd>
                                	<h5>咿</h5>
                                    <p>报名了活动<a href="party_info.php?pid=9028" title="">我们都是30+和TA...</a></p>
                                </dd>
                            </dl>
                        </li>
                                                 <li>
                            <div class="state_time">
<!--                                16分钟前-->
                            </div>
                            <dl class="state_info">
                            	<dt><img src="{{url('/home/img/a9bf4ea0d_5_avatar_p.jpg')}}" width="60" height="74" alt="" /></dt>
                                <dd>
                                	<h5>邱一</h5>
                                    <p>报名了活动<a href="party_info.php?pid=5745" title="">江苏卫视《缘来非诚勿...</a></p>
                                </dd>
                            </dl>
                        </li>
                                                 <li>
                            <div class="state_time">
<!--                                20分钟前-->
                            </div>
                            <dl class="state_info">
                            	<dt><img src="{{url('home/img/adff5a1fa_1_avatar_p.jpg')}}" width="60" height="74" alt="" /></dt>
                                <dd>
                                	<h5>vincent</h5>
                                    <p>报名了活动<a href="party_info.php?pid=8908" title="">花好月缘，以茶为媒，...</a></p>
                                </dd>
                            </dl>
                        </li>
                                                 <li>
                            <div class="state_time">
<!--                                22分钟前-->
                            </div>
                            <dl class="state_info">
                            	<dt><img src="{{url('/img/7c8bb4fe6_1_avatar_p.jpg')}}" width="60" height="74" alt="" /></dt>
                                <dd>
                                	<h5>佳缘会员</h5>
                                    <p>报名了活动<a href="party_info.php?pid=9019" title="">Forever yo...</a></p>
                                </dd>
                            </dl>
                        </li>
                                                 <li>
                            <div class="state_time">
<!--                                31分钟前-->
                            </div>
                            <dl class="state_info">
                            	<dt><img src="{{url('/img/54f5b8161_1_avatar_p.jpg')}}" width="60" height="74" alt="" /></dt>
                                <dd>
                                	<h5>御剑江湖</h5>
                                    <p>报名了活动<a href="party_info.php?pid=8593" title="">2016线下活动志愿...</a></p>
                                </dd>
                            </dl>
                        </li>
                                                 <li>
                            <div class="state_time">
<!--                                39分钟前-->
                            </div>
                            <dl class="state_info">
                            	<dt><img src="{{url('/home/img/f2858b061_2_avatar_p.jpg')}}" width="60" height="74" alt="" /></dt>
                                <dd>
                                	<h5>小墨</h5>
                                    <p>报名了活动<a href="party_info.php?pid=9007" title="">我想有个家——普惠家...</a></p>
                                </dd>
                            </dl>
                        </li>
                                                 <li>
                            <div class="state_time">
<!--                                40分钟前-->
                            </div>
                            <dl class="state_info">
                            	<dt><img src="{{url('home/img/90e79d99a_1_avatar_p.jpg')}}" width="60" height="74" alt="" /></dt>
                                <dd>
                                	<h5>neal</h5>
                                    <p>报名了活动<a href="party_info.php?pid=9021" title="">衡阳千人情定圣诞狂欢...</a></p>
                                </dd>
                            </dl>
                        </li>
                                                 <li>
                            <div class="state_time">
<!--                                41分钟前-->
                            </div>
                            <dl class="state_info">
                            	<dt><img src="{{url('/home/img/654e1a662_3_avatar_p.jpg')}}" width="60" height="74" alt="" /></dt>
                                <dd>
                                	<h5>四耳</h5>
                                    <p>报名了活动<a href="party_info.php?pid=9007" title="">我想有个家——普惠家...</a></p>
                                </dd>
                            </dl>
                        </li>
                                                 <li>
                            <div class="state_time">
<!--                                48分钟前-->
                            </div>
                            <dl class="state_info">
                            	<dt><img src="{{url('/home/img/e299a8192_6_avatar_p.jpg')}}" width="60" height="74" alt="" /></dt>
                                <dd>
                                	<h5>Cindy</h5>
                                    <p>报名了活动<a href="party_info.php?pid=5745" title="">江苏卫视《缘来非诚勿...</a></p>
                                </dd>
                            </dl>
                        </li>
                                                 <li>
                            <div class="state_time">
<!--                                52分钟前-->
                            </div>
                            <dl class="state_info">
                            	<dt><img src="{{url('/home/img/zwzp_f.jpg')}}" width="60" height="74" alt="" /></dt>
                                <dd>
                                	<h5>黎儿</h5>
                                    <p>报名了活动<a href="party_info.php?pid=5745" title="">江苏卫视《缘来非诚勿...</a></p>
                                </dd>
                            </dl>
                        </li>
                 </ul>
                </div>
            </div>
            <script type="text/javascript">
			$(function(){
				var scrtime;
				$("#latest").hover(function(){
					clearInterval(scrtime);
				
				},function(){
				
				scrtime = setInterval(function(){
					var $ul = $("#latest ul");
					var liHeight = $ul.find("li:last").height();
					$ul.animate({marginTop : liHeight + 35 + "px"},1000,function(){
					
					$ul.find("li:last").prependTo($ul)
					$ul.find("li:first").hide();
					$ul.css({marginTop:0});
					$ul.find("li:first").fadeIn(1000);
					});
				},3000);
				
				}).trigger("mouseleave");
			});
			</script>
        </div>
        <div class="high_vip">
        	<div class="rtit"><h4>优质报名会员</h4></div>
            <div id="vip_slide"> 
				<div class="slides_container"> 	
                    <div class="bm_vip"> 
                        <a href="v2/userparty.php?uid=63034536" target="_blank"><img src="{{url('/home/img/ebab45c4b_4_avatar_p.jpg')}}" width="110" height="135" alt="" /> </a>
                   		<div class="caption"> 
                                    <h5> <a href="v2/userparty.php?uid=63034536" target="_blank">jennia</a></h5>
                        	<p>26岁，福建厦门；</p>
                        	<p>未婚，168cm；</p>
                        	<p>本科，2000～5000元；</p>
                        	<p>暂未购房</p>
                        	<p>暂未购车</p>
                    	</div> 
                    </div> 
                                        <div class="bm_vip"> 
                        <a href="v2/userparty.php?uid=145333068" target="_blank"><img src="{{url('/home/img/b706be9db_3_avatar_p.jpg')}}" width="110" height="135" alt="" /> </a>
                   		<div class="caption"> 
                                    <h5> <a href="v2/userparty.php?uid=145333068" target="_blank">教父</a></h5>
                        	<p>33岁，北京朝阳；</p>
                        	<p>未婚，170cm；</p>
                        	<p>本科，10000～20000元；</p>
                        	<p>已购住房</p>
                        	<p>暂未购车</p>
                    	</div> 
                    </div> 
                        <div class="bm_vip"> 
                        <a href="v2/userparty.php?uid=147532433" target="_blank">

                        <img src="{{url('/home/img/f43b6907c_1_avatar_p.jpg')}}" width="110" height="135" alt="" /> </a>
                   		<div class="caption"> 
                                    <h5> <a href="v2/userparty.php?uid=147532433" target="_blank">面包树上的瑶瑶</a></h5>
                        	<p>24岁，上海黄浦；</p>
                        	<p>未婚，161cm；</p>
                        	<p>本科，2000～5000元；</p>
                        	<p></p>
                        	<p></p>
                    	</div> 
                    </div> 
                                        <div class="bm_vip"> 
                        <a href="v2/userparty.php?uid=35322685" target="_blank">

                        <img src="{{url('/home/img/7c94750a7_15_avatar_p.jpg')}}" width="110" height="135" alt="" /> </a>
                   		<div class="caption"> 
                                    <h5> <a href="v2/userparty.php?uid=35322685" target="_blank">欣欣</a></h5>
                        	<p>27岁，四川成都；</p>
                        	<p>未婚，165cm；</p>
                        	<p>大专，20000元以上；</p>
                        	<p>暂未购房</p>
                        	<p>已经购车</p>
                    	</div> 
                    </div> 
                                        <div class="bm_vip"> 
                        <a href="v2/userparty.php?uid=130594151" target="_blank"><img src="{{url('/home/img/f6e545d69_4_avatar_p.jpg')}}" width="110" height="135" alt="" /> </a>
                   		<div class="caption"> 
                                    <h5> <a href="v2/userparty.php?uid=130594151" target="_blank">dejun</a></h5>
                        	<p>30岁，湖北武汉；</p>
                        	<p>未婚，173cm；</p>
                        	<p>本科，10000～20000元；</p>
                        	<p>已购住房</p>
                        	<p>暂未购车</p>
                    	</div> 
                    </div> 
                                        <div class="bm_vip"> 
                        <a href="v2/userparty.php?uid=141140177" target="_blank"><img src="./img/ad40355ea_2_avatar_p.jpg" width="110" height="135" alt="" /> </a>
                   		<div class="caption"> 
                                    <h5> <a href="v2/userparty.php?uid=141140177" target="_blank">zqdyy</a></h5>
                        	<p>26岁，北京东城；</p>
                        	<p>未婚，165cm；</p>
                        	<p>本科，5000～10000元；</p>
                        	<p>需要时购置</p>
                        	<p>已经购车</p>
                    	</div> 
                    </div> 
                                        <div class="bm_vip"> 
                        <a href="v2/userparty.php?uid=27669691" target="_blank">

                        <img src="{{url('/home/img/d455c8d07_avatar_p.jpg')}}" width="110" height="135" alt="" />

                         </a>
                   		<div class="caption"> 
                                    <h5> <a href="v2/userparty.php?uid=27669691" target="_blank">念``兒</a></h5>
                        	<p>28岁，黑龙江哈尔滨；</p>
                        	<p>未婚，167cm；</p>
                        	<p>本科，2000元以下；</p>
                        	<p>与父母同住</p>
                        	<p>暂未购车</p>
                    	</div> 
                    </div> 
                                        <div class="bm_vip"> 
                        <a href="v2/userparty.php?uid=26689884" target="_blank"><img src="{{url('/home/img/zwzp_f.jpg')}}" width="110" height="135" alt="" /> </a>
                   		<div class="caption"> 
                                    <h5> <a href="v2/userparty.php?uid=26689884" target="_blank">依筱萱</a></h5>
                        	<p>29岁，湖北武汉；</p>
                        	<p>未婚，161cm；</p>
                        	<p>本科，2000～5000元；</p>
                        	<p>与父母同住</p>
                        	<p>暂未购车</p>
                    	</div> 
                    </div> 
                                        <div class="bm_vip"> 
                        <a href="v2/userparty.php?uid=25379934" target="_blank"><img src="./img/aa939e6c5_1_avatar_p.jpg" width="110" height="135" alt="" /> </a>
                   		<div class="caption"> 
                                    <h5> <a href="v2/userparty.php?uid=25379934" target="_blank">sooydoor</a></h5>
                        	<p>33岁，上海浦东新区；</p>
                        	<p>未婚，174cm；</p>
                        	<p>本科，20000元以上；</p>
                        	<p>已购住房</p>
                        	<p>已经购车</p>
                    	</div> 
                    </div> 
                                        <div class="bm_vip"> 
                        <a href="v2/userparty.php?uid=68245534" target="_blank"><img src="./img/719f1e66d_4_avatar_p.jpg" width="110" height="135" alt="" /> </a>
                   		<div class="caption"> 
                                    <h5> <a href="v2/userparty.php?uid=68245534" target="_blank">unusual</a></h5>
                        	<p>24岁，四川成都；</p>
                        	<p>未婚，172cm；</p>
                        	<p>本科，5000～10000元；</p>
                        	<p>已购住房</p>
                        	<p>暂未购车</p>
                    	</div> 
                    </div> 
                                	</div>	
                <a href="javascript:;" class="next">下一个</a>								
            </div>
        </div>
        <div class="hd_hosts">
            <div class="rtit"><h4>线下主持人风采</h4></div>
            <div id="slides"> 
				<div class="slides_container"> 	
                                        <div class="slide"> 
                        <img src="./img/xs.jpg" width="110" height="135" alt="" /> 
                   		<div class="caption"> 
                       		<h5>晓生</h5>
                        	<p>山东大区主持人；主持风格幽默、风趣，控场力强。</p>
                    	</div> 
                    </div> 
                                        <div class="slide"> 
                        <img src="./img/wj.png" width="110" height="135" alt="" /> 
                   		<div class="caption"> 
                       		<h5>文静</h5>
                        	<p>风格清新、大气、稳重；主持方向偏晚会庆典、中高端婚礼、商业活动、比赛类。</p>
                    	</div> 
                    </div> 
                                        <div class="slide"> 
                        <img src="./img/xd.jpg" width="110" height="135" alt="" /> 
                   		<div class="caption"> 
                       		<h5>小叨</h5>
                        	<p>世纪佳缘华西大区线下活动主持人，主持风格轻松幽默，欢笑不断。</p>
                    	</div> 
                    </div> 
                                	</div>									
            </div>
        </div>
        <div class="hd_partner">
            <div class="rtit"><h4>商务合作</h4></div>
            <ul>
            	<li class="hdp01"><a href="party_coop.php?cooptype=0" title="">活动场地赞助</a></li>
            	<li class="hdp02"><a href="party_coop.php?cooptype=2" title="">合作举办活动</a></li>
            	<li class="hdp03"><a href="party_coop.php?cooptype=7" title="">企业联谊策划</a></li>
            	<li class="hdp04"><a href="party_coop.php?cooptype=5" title="">免费礼品赞助</a></li>
            	<li class="hdp05"><a href="party_coop.php?cooptype=1" title="">主持人自荐</a></li>
            	<li class="hdp06"><a href="vol.php" title="">志愿者报名</a></li>
            </ul>
        </div>
        <div class="hd_question">
            <div class="rtit"><h4>常见问题</h4></div>
            <ul>
                <li>&bull;<a href="v2/question.php#0" target="_blank" title="">LOVE ID 是什么？如何查看？</a></li>
            	<li>&bull;<a href="v2/question.php#1" target="_blank" title="">线上支付如何现场验证？</a></li>
            	<li>&bull;<a href="v2/question.php#2" target="_blank" title="">已支付活动无法参加如何退款？</a></li>
            	<li>&bull;<a href="v2/question.php#3" target="_blank" title="">活动是否有二次确认？</a></li>
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="ad_space" id="ad_space"><a href="#" title="" target="_blank"><img src="./img/hzAd.jpg" width="1000" height="90" alt="" /></a></div>
</div>


<!--尾部-->
<script type="text/javascript" src=".{{url('/home/js/w4-simple.js')}}"></script>
</body>
</html>
