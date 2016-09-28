//閫夋嫨鍣�
function getEle(ele, oParent) {
    switch (ele.charAt(0)) {
        case "#":
            var objStr = ele.substring(1, ele.length);
            return document.getElementById(objStr);
            break;
        case ".":
            var sArg = ele;
            var reg = new RegExp("(^|\\s)" + sArg.substring(1) + "(\\s|$)"),
                arr = [],
                aEl = (oParent || document).getElementsByTagName('*'),
                i;
            for (i = 0; i < aEl.length; i++) {
                reg.test(aEl[i].className) && arr.push(aEl[i]);
            }
            return arr;
            break;
        default :
            return (oParent || document).getElementsByTagName(ele);
            break;
    };
};

//娣诲姞浜嬩欢
function addEvent(ele, sEvent, fn) {
    ele.attachEvent ? ele.attachEvent('on'+sEvent, fn) : ele.addEventListener(sEvent, fn, false);
}

//骞垮憡
function jy_ad(id){
    this.oAd = getEle(id);
    this.oUl = getEle('ul', this.oAd)[0];
    this.aLi = getEle('li', this.oUl);
    this.iNow = 0;
    this.iNow2 = this.iNow;
    this.iLen = this.aLi.length;
    this.iInterval = 36000000*24;
    this.timer;

    var _this = this;
    this.showAd();
    this.timer = setInterval(function (){
        _this.showAd();
    }, this.iInterval)
}

jy_ad.prototype.showAd = function (){
    //this.iNow2 = this.iNow;
    //this.iNow = Math.floor(Math.random() * this.iLen);
    //if(this.iNow == this.iNow2){
    //    this.iNow++;
    //    if(this.iNow >= this.iLen){
    //        this.iNow = this.iNow - 2;
    //    };
    //};

    for(var i=0; i<this.iLen; i++){
        this.aLi[i].style.display = 'none';
    };
	this.iNow = Math.floor(Math.random() * this.iLen);
    this.aLi[this.iNow].style.display = 'block';
};