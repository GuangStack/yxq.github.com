/*
 全站公用alert替换函数
 http://images1.jyimg.com/w4/popup/JY_Alert/
*/
function JY_Alert(title, content, zIndex) {
    var oBody = document.getElementsByTagName("body")[0], oHtml = document.getElementsByTagName("html")[0], JY_alert, alert_close, alert_title, alert_bg, alert_btn, title = title || "\u6e29\u99a8\u63d0\u793a", content = content || '', minHeight = 140, zIndex = zIndex || 99999, isIE6 = !-[1, ] && !window.XMLHttpRequest, setCss = function (obj, json) {
        var arr = ["Webkit", "Moz", "O", "ms", ""];
        for (var attr in json) {
            if (attr.charAt(0) == "$") {
                for (var i = 0; i < arr.length; i++) {
                    obj.style[arr[i] + attr.substring(1)] = json[attr]
                }
            } else {
                if (typeof json[attr] == "number") {
                    switch (attr) {
                        case "opacity":
                            if (value < 0) value = 0;
                            obj.style.filter = "alpha(opacity:" + value + ")";
                            obj.style.opacity = value / 100;
                            break;
                        case "zIndex":
                            obj.style[attr] = json[attr];
                            break;
                        default:
                            obj.style[attr] = json[attr] + "px";
                    }
                } else {
                    if (typeof json[attr] == "string") obj.style[attr] = json[attr];
                }
            }
        }
    }, addEvent = function (obj, sEv, callBak) {
        obj.attachEvent ? obj.attachEvent("on" + sEv, callBak) : obj.addEventListener(sEv, callBak, false)
    }, removeEvent = function (obj, sEv, callBak) {
        obj.detachEvent ? obj.attachEvent("on" + sEv, callBak) : obj.removeEventListener(sEv, callBak, false)
    }, getViewSize = function () {
        var result = {};
        if (window.innerWidth) {
            result.winW = window.innerWidth;
            result.winH = window.innerHeight
        } else {
            if (document.documentElement.offsetWidth == document.documentElement.clientWidth) {
                result.winW = document.documentElement.offsetWidth;
                result.winH = document.documentElement.offsetHeight
            } else {
                result.winW = document.documentElement.clientWidth;
                result.winH = document.documentElement.clientHeight;
            }
        }
        result.docW = Math.max(document.documentElement.scrollWidth, document.body.scrollWidth, document.documentElement.offsetWidth);
        result.docH = Math.max(document.documentElement.scrollHeight, document.body.scrollHeight, document.documentElement.offsetHeight);
        return result;
    }, range = function (iCurr, iMin, iMax) {
        return iCurr < iMin ? iMin : iCurr > iMax ? iMax : iCurr
    }, drag = function (popupID, moveID) {
        var popup = document.getElementById(popupID), move = document.getElementById(moveID), disX = disY = 0;
        move.onmouseover = function () {this.style.cursor = "move";};
        move.onmouseout = function () {this.style.cursor = "default"};
        move.onmousedown = function (ev) {
            var ev = ev || event;
            disX = ev.clientX - popup.offsetLeft;
            disY = ev.clientY - popup.offsetTop;
            document.onmousemove = function (ev) {
                var ev = ev || event;
                setCss(popup, {left: range(ev.clientX - disX, 0, getViewSize().docW - popup.offsetWidth), top: range(ev.clientY - disY, 0, getViewSize().winH - popup.offsetHeight)});
            };
            document.onmouseup = function () {this.onmousemove = null; this.onmouseup = null;};
            return false;
        }
    }, init = function () {
        if(!document.getElementById('JY_alert')){
            var JY_alert_main = document.createElement("div");
            JY_alert_main.id = "JY_alert";
            JY_alert_main.style.cssText = "width:400px; padding: 1px 1px 50px 1px; background: #fff; position: absolute; top: 0px; left: 0px; z-index:" + (zIndex + 1) + ";";
            setCss(JY_alert_main, {position: isIE6 ? "absolute" : "fixed"});
            var JY_alert_bg = document.createElement("div");
            JY_alert_bg.id = "JY_alert_bg";
            JY_alert_bg.style.cssText = "background: #000; opacity: 0.4; filter:alpha(opacity=40); position:absolute; top:0; left:0; z-index:" + zIndex + ";";
            oBody.appendChild(JY_alert_bg);
            var createEle = function (tagName, cssText, innerHTML, id) {
                var newEle = document.createElement(tagName);
                newEle.style.cssText = cssText;
                newEle.innerHTML = innerHTML;
                if (id) newEle.id = id;
                JY_alert_main.appendChild(newEle);
            };
            createEle("h2", "height: 30px; line-height: 30px; margin: 0; padding: 0 10px; text-align:left; color: #fff;  font-size: 14px; background: url(http://images1.jyimg.com/w4/popup/JY_alert/i/title_bg.jpg) repeat-x; position: relative;", title + '<a id="JY_alert_close" href="javascript:;" style="width: 15px; height: 15px; position: absolute; top: 7px; right: 10px; background: url(http://images1.jyimg.com/w4/popup/JY_alert/i/alert_close.png); overflow: hidden; display: block; font-size: 0;">\u5173\u95ed</a>', "JY_alert_title");
            createEle("div", "width: 90%; line-height:18px; margin: 0 auto; padding: 20px 0; font-size: 12px; color: #666; word-wrap: break-word; word-break: break-all;", content, 'jy_alert_content');
            createEle("div", "width: 73px; height: 28px; margin: 0; padding:0; position:absolute; bottom:20px; left:163px; text-align: center; cursor: pointer;", '<img src="http://images1.jyimg.com/w4/popup/JY_alert/i/alert_btn.png">', "JY_alert_btn");
            oBody.appendChild(JY_alert_main);
            JY_alert = document.getElementById("JY_alert");
            alert_close = document.getElementById("JY_alert_close");
            alert_title = document.getElementById("JY_alert_title");
            alert_content = document.getElementById("jy_alert_content");
            alert_bg = document.getElementById("JY_alert_bg");
            alert_btn = document.getElementById("JY_alert_btn");
            addEvent(window, "resize", function () {setCss(JY_alert_bg, {width: 0, height: 0}); reset(); });
            addEvent(window, "scroll", function () {setCss(JY_alert_bg, {width: 0, height: 0});reset(); });
            addEvent(alert_close, "click", remove_alert);
            addEvent(alert_btn, "click", function () {remove_alert();});
            addEvent(alert_close, "mouseover", function () {setCss(alert_close, {backgroundPosition: "0 -16px"})});
            addEvent(alert_close, "mouseout", function () {setCss(alert_close, {backgroundPosition: "0 0"})});
            drag("JY_alert", "JY_alert_title");
            reset();
            if (typeof(JY_alert.onselectstart) != "undefined") {
                JY_alert.onselectstart = new Function("return false")
            } else {
                JY_alert.onmousedown = new Function("return false");
                JY_alert.onmouseup = new Function("return true")
            };
        };
    }, remove_alert = function () {
        oBody.removeChild(JY_alert);
        oBody.removeChild(alert_bg);
        if(isIE6) oHtml.style.overflowX = '';
        return false;
    }, reset = function () {
        setCss(alert_bg, {width: getViewSize().docW, height: getViewSize().docH});
        setCss(JY_alert, {top: isIE6 ? (getViewSize().winH - JY_alert.offsetHeight) / 2 + document.documentElement.scrollTop || document.body.scrollTop: (getViewSize().winH - JY_alert.offsetHeight) / 2, left: isIE6 ? (getViewSize().winW - JY_alert.offsetWidth) / 2 + document.documentElement.scrollLeft || document.body.scrollLeft : (getViewSize().winW - JY_alert.offsetWidth) / 2
        });
        setCss(alert_content, {textAlign: JY_alert.offsetHeight > minHeight ? 'left' : 'center'});
        if(isIE6) oHtml.style.overflowX = 'hidden';
    };
    init();
};