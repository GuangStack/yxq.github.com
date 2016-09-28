jQuery(function() {

    if (!$('#slidePic')[0]) return;

    var j=0;
    for (j in areaDailyList){
        var ti=areaDailyList[j];
        $("#tul").append('<LI class="" id="tli_'+j+'"><P><IMG src="'+ti.timage+'"></P></LI>')
    } 

    var i = 0,
    p = $('#slidePic ul'),
    pList = $('#slidePic ul li'),
    len = pList.length;
    var elePrev = $('#prev'),
    eleNext = $('#next');
    var w = 90,
    num = 4;
    p.css('width', w * len);
    
    if (len <= num) eleNext.addClass('gray');

    function prev() {
        if (elePrev.hasClass('gray')) {
            //alert('已经是第一张了');
            return;
        }
        p.animate({
            marginTop: -(--i) * w
        },
        500);
        if (i < len - num) {
            eleNext.removeClass('gray');
        }
        if (i == 0) {
            elePrev.addClass('gray');
        }
    }

    function next() {
        if (eleNext.hasClass('gray')) {
            //alert('已经是最后一张了');
            return;
        }
        p.animate({
            marginTop: -(++i) * w
        },
        500);
        if (i != 0) {
            elePrev.removeClass('gray');
        }
        if (i == len - num) {
            eleNext.addClass('gray');
        }
    }

    elePrev.bind('click', prev);
    eleNext.bind('click', next);
    pList.each(function(n, v) {
        $(this).click(function() {
            if (n - i == 3) {
                next();
            }
            if (n - i == 0) {
                prev()
            }
            $('#slidePic ul li.cur').removeClass('cur');
            $(this).addClass('cur');
            show(n);
        }).mouseover(function() {
            $(this).addClass('hover');
        }).mouseout(function() {
            $(this).removeClass('hover');
        })
    });
    var timer
    function show(n) {
        var ad = areaDailyList[n];
        $('#dailyImage').attr('src', ad.image);
        $('#dailyImage').parent('a').attr('href', ad.url); 
        clearTimeout(timer)
        timer=setTimeout(function(){
            if(areaDailyList.length-1!=n){
                $("#tli_"+(n+1)).click();
            }else{
                n=0;
                $("#tli_0").click();
                $("#tul").css('margin-top',0);
            }
        },2000)
    }

    $("#tli_0").click();

});