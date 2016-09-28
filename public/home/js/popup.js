$(document).ready(function(){

	$(".op_close").bind("click",function(){
		var _id = $(this).parents(".op_box").attr("id");
		closeWin(_id);
	})
	$(".taskFinishBtn").live("click",function(){
		taskFinish(this);
		/*openWin("taskTipPop");*/
	})
	$(".exchangeBtn0").bind("click",function(){
		openWin("exchangePop0");
	})
	$(".exchangeBtn1").bind("click",function(){
		openWin("exchangePop1");
	})
	$(".exchangeBtn2").bind("click",function(){
		openWin("exchangePop2");
	})
	$(".exchangeBtn3").bind("click",function(){
		openWin("exchangePop3");
	})
	$(".exchangeBtn4").bind("click",function(){
		openWin("exchangePop4");
	})
	$(".exchangeBtn5").bind("click",function(){
		openWin("exchangePop5");
	})
	$(".exchangeBtn6").bind("click",function(){
		openWin("exchangePop6");
	})
	$(".exchangeBtn7").bind("click",function(){
		openWin("exchangePop7");
	})
	//窗口改变时 调整弹窗位置
	$(window).resize(function(){
		var win_w = $(window).width();
		var win_h = $(window).height();
		var doc_h = $(document).height();
		var sTop = $(window).scrollTop();
		if($("#bg").css("display") == "block"){
			var $curPop = $(".op_box:visible");
			var w = $curPop.width();
			var h = $curPop.height();
			$("#bg").css({"width":win_w,"height":doc_h});
			//$curPop.css({"left":(win_w-w)/2,"top":(win_h-h)/2+sTop});
			$curPop.css({"top":(win_h-h)/2+sTop});
		}
	});


	//滚动
	$(window).scroll(function(){
		var win_w = $(window).width();
		var win_h = $(window).height();
		var doc_h = $(document).height();
		var sTop = $(window).scrollTop();
		if($("#bg").css("display") == "block"){
			var $curPop = $(".op_box:visible");
			var w = $curPop.width();
			var h = $curPop.height();
			$("#bg").css({"width":win_w,"height":doc_h});
            //$curPop.stop().animate({"left": (win_w - w) / 2, "top": (win_h - h) / 2 + sTop}, 'slow');
            $curPop.stop().animate({"top": (win_h - h) / 2 + sTop}, 'slow');
		}
	});
})
/*Open the layer*/
function openWin(oMain){
	var oBg = document.getElementById('bg');
	var oMain = document.getElementById(oMain);
    var clientW = document.documentElement.clientWidth || document.body.clientWidth;
    var clientH = document.documentElement.clientHeight || document.body.clientHeight;
	var offsetW = document.documentElement.scrollWidth || document.body.scrollWidth;
	var offsetH = document.documentElement.scrollHeight || document.body.scrollHeight;
	var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
	var scrollLeft = document.documentElement.scrollLeft || document.body.scrollLeft;

	var bodyW = (offsetW>clientW)?offsetW:clientW;
	var bodyH = (offsetH>clientH)?offsetH:clientH;

	with(oBg.style)
	{
		display = 'block';
		width = bodyW+'px';
		height = bodyH+'px';
	}
	with(oMain.style)
	{
		display = 'block';
		left = (clientW-oMain.offsetWidth)/2+scrollLeft+'px';
		top = (clientH-oMain.offsetHeight)/2+scrollTop+'px';
		position = "absolute";
	}


    function drag(parent, ele) {
        if (!ele) return;
        var disX = 0, disY = 0, windowW = $(window).width(), documentH = $(document).height();
        $(window).bind("resize", function () {
            windowW = $(window).width();
            documentH = $(document).height()
        });
        ele.hover(function (){
            $(this).css({cursor: "move"});
        },function (){
            $(this).css({cursor: "default"});
        });
        ele.bind("mousedown", function (e) {
            $(this).css({cursor: "move"});
            disX = e.pageX - parent.position().left;
            disY = e.pageY - parent.position().top;
            $(document).bind("mousemove", function (e) {
                var l = e.pageX - disX;
                var t = e.pageY - disY;
                if (l < 0) {
                    l = 0
                } else {
                    if (l > windowW - parent.outerWidth()) {
                        l = windowW - parent.outerWidth()
                    }
                }
                if (t < 0) {
                    t = 0
                } else {
                    if (t > documentH - parent.outerHeight()) {
                        t = documentH - parent.outerHeight()
                    }
                }
                parent.css({left: l, top: t});
                if (parent[0].setCapture) parent[0].setCapture()
            });
            $(document).bind("mouseup", function () {
                $(document).unbind("mousemove");
                $(document).unbind("mouseup");
                if (parent[0].releaseCapture) parent[0].releaseCapture()
                ele.css({cursor: "default"})
            });
            return false
        })
    }

    drag($(oMain), $(oMain).find('h4'));
}
/*Close the layer*/
function closeWin(oMain)
{
	var oBg = document.getElementById('bg');
	var oMain = document.getElementById(oMain);

	oBg.style.display = 'none';
	oMain.style.display = 'none';
}


