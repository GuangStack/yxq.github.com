function head_login_save_me(e) {
    if (e.checked == 1) {
        var t = !1;
        return t = confirm("涓轰簡鎮ㄧ殑璐﹀彿瀹夊叏锛岃涓嶈鍦ㄧ綉鍚х瓑鍏敤鐢佃剳涓婁娇鐢ㄦ鍔熻兘锛乗n鎵嬪姩閫€鍑哄悗锛屾鍔熻兘鑷姩澶辨晥銆�"), t ? (e.checked = !0, send_jy_pv2("head_login_confirm_true")) : (e.checked = !1, send_jy_pv2("head_login_confirm_false")), !1
    }
}
typeof window.JY != "object" && (window.JY = {}), typeof window.JY.DEFINED == "undefined" && function() {
    var e = window.JY;
    e.$ = function(e) {
        return "string" == typeof e ? document.getElementById(e) : e
    }, e.wr = function() {
        var e = [], t = arguments.length;
        for (var n = 0; n < t; n++)
            e.push(arguments[n]);
        t && document.write(e.join(""))
    }, e.importJs = function() {
    }, e.DEFINED = 1
}(), typeof window.JY != "object" && (window.JY = {}), typeof window.JY.tool != "object" && (window.JY.tool = {});
if (typeof window.JY.tool.cookie != "object" || typeof window.JY.tool.cookie.DEFINED == "undefined")
    window.JY.tool.cookie = {set: function(e, t, n, r, i) {
            if (typeof n != "undefined" && !isNaN(parseInt(n)))
                var s = new Date((new Date).getTime() + 6e4 * parseInt(n));
            document.cookie = e + "=" + escape(t) + (s ? "; expires=" + s.toGMTString() : "") + (r ? "; path=" + r : "; path=/") + (i ? ";domain=" + i : "")
        },get: function(e) {
            var t = document.cookie.match(new RegExp("(^| )" + e + "=([^;]*)(;|$)"));
            return t != null ? unescape(t[2]) : null
        },clear: function(e, t, n) {
            this.get(e) && (document.cookie = e + "=" + (t ? "; path=" + t : "; path=/") + (n ? "; domain=" + n : "") + ";expires=Fri, 02-Jan-1970 00:00:00 GMT")
        },unCharCode: function(e) {
            if (typeof e != "string" || e.length < 6)
                return e;
            if (!/&#\d{3,3};/.test(e))
                return e;
            var t, n = [];
            for (t = 5; t < e.length; t++)
                e.charAt(t) == ";" && e.charAt(t - 5) == "&" && e.charAt(t - 4) == "#" && n.push([e.substr(t - 5, 6), String.fromCharCode(e.substr(t - 3, 3))]);
            for (var t in n)
                e = e.replace(n[t][0], n[t][1]);
            return e
        }}, JY.tool.cookie.DEFINED = 1;
typeof window.JY != "object" && (window.JY = {}), (typeof window.JY.url != "object" || typeof window.JY.url.DEFINED == "undefined") && function() {
    window.JY.url = {};
    var _this = window.JY.url, testDH = String.fromCharCode(109, 105, 117, 117), testDF = String.fromCharCode(99, 110);
    _this.parse = function(e) {
        e = typeof e == "string" ? e : location.href, _this.href = e;
        var t = _this.href.match(/http[s]?:\/\/([^\/]+)/);
        if (!t) {
            var n = "url:椤甸潰鍦板潃淇℃伅涓嶆纭�";
            typeof JY_JSLIB_DEBUG == "number" && JY_JSLIB_DEBUG && alert(n), typeof JY_JSLIB_MSG == "string" && (JY_JSLIB_MSG += n + "\n")
        }
        _this.host = t[1] ? t[1] : location.hostname, _this.path = _this.href.replace(t[0], ""), _this.domain = _this.host
    }, _this.parse(location.href), _this.getSiteInfo = function() {
        eval("var siteMap={'msn.':[1,'msn'], 'sina.':[7,'sina'], '" + testDH + ".':[100,'test'], 'jiayuan.com':[0,'www']}");
        var siteNum, siteName, siteDomain, topDomain;
        for (var i in siteMap)
            if (_this.host.indexOf(i) >= 0) {
                siteNum = siteMap[i][0], siteName = siteMap[i][1];
                break
            }
        return typeof siteNum != "number" && (siteNum = -1, siteName = "unknown"), siteNum == 0 ? (siteDomain = "www.jiayuan.com", topDomain = "jiayuan.com") : siteNum == 100 ? (siteDomain = "www." + testDH + "." + testDF, topDomain = testDH + "." + testDF) : siteDomain = topDomain = _this.domain, {num: siteNum,name: siteName,domain: siteDomain,topDomain: topDomain}
    }, _this.getSiteHome = function() {
        var e = _this.getSiteInfo();
        return "http://" + e.domain + "/"
    }, _this.getQueryValue = function(e) {
        if (_this.href.indexOf("?") == -1 || _this.href.indexOf(e + "=") == -1)
            return "";
        var t = _this.href.substring(_this.href.indexOf("?") + 1), n = t.split("&"), r, i, s;
        for (var o = 0; o < n.length; o++) {
            r = n[o].indexOf("=");
            if (r == -1)
                continue;
            i = n[o].substring(0, r), s = n[o].substring(r + 1);
            if (i == e)
                return unescape(s.replace(/\+/g, " "))
        }
        return ""
    }, _this.getChannelList = function() {
        return ["index", "usercp", "search", "online", "party", "article", "story", "newmember", "paper", "master", "profile", "topics", "vip", "photo", "news", "notices", "about", "guard", "brightlist", "tv"]
    }, _this.getDomainChannelMap = function() {
        return {search: "search",usercp: "usercp",online: "online",party: "party",diary: "article",love: "story",my: "profile",profile: "profile",photo: "photo"}
    }, _this.getDirChannelMap = function() {
        return {usercp: "usercp",msg: "usercp",search: "search",newmember: "newmember",online: "online",party: "party",article: "article",story: "story",paper: "paper",ques: "paper",yiyuntest: "paper",master: "master",news: "news",gonggao: "notices",profile: "profile",parties: "topics",vip: "vip",bottom: "about",guard: "guard"}
    }, _this.getPathChannelMap = function() {
        return {"brightlist_new.php": "brightlist","parties/2010/all_videos": "tv"}
    }, _this.getChannel = function() {
        var e = _this.getDomainChannelMap(), t = _this.getDirChannelMap(), n = _this.getPathChannelMap(), r = "", i = _this.getQueryValue("channel");
        if (i) {
            var s = _this.getChannelList();
            for (chal in s)
                if (i == chal)
                    return chal
        }
        var o = _this.getSiteInfo();
        if (o.num == 0 || o.num == 100) {
            for (k in e)
                if (_this.host.indexOf(k) >= 0) {
                    r = e[k];
                    break
                }
        } else if (o.num == -1)
            return "unknown";
        if (!r && _this.path)
            for (k in n)
                if (_this.path.indexOf(k) >= 0) {
                    r = n[k];
                    break
                }
        if (!r && _this.path) {
            var u = _this.path.split("/"), a = u[0] ? u[0] : u[1];
            for (k in t)
                if (a.indexOf(k) == 0) {
                    r = t[k];
                    break
                }
            if (!r) {
                var f, l = a.indexOf("?");
                pos2 = a.indexOf("#"), l < 0 && pos2 < 0 ? f = -1 : l >= 0 && pos2 >= 0 ? f = l < pos2 ? l : pos2 : f = l > 0 ? l : pos2;
                if (f == 0)
                    return "index";
                if (f > 0 && /^\d{6,9}$/.test(a.substr(0, f)))
                    return "profile";
                if (f < 0 && /^\d{6,9}$/.test(a))
                    return "profile"
            }
        }
        return r ? r : "index"
    }, _this.getChannelUrl = function(e) {
        var t = _this.getSiteInfo(), n = _this.getSiteHome(), r = _this.getDomainChannelMap();
        if (e == "index")
            return n;
        if (t.num == 0 || t.num == 100)
            for (k in r)
                if (r[k] == e)
                    return "http://" + k + "." + t.topDomain + "/";
        var i = _this.getPathChannelMap(), s;
        for (k in i)
            if (i[k] == e) {
                s = k;
                break
            }
        if (typeof s == "string")
            return n + s;
        var o = _this.getDirChannelMap(), u;
        for (k in o)
            if (o[k] == e) {
                u = k;
                break
            }
        return typeof u == "string" ? n + u + "/" : n
    }, _this.getImgBaseUrl = function() {
        var e, t = {}, n = _this.getSiteInfo();
        return n.num == 100 ? e = "http://images." + n.topDomain + "/" : e = "http://images1.jyimg.com/", t.www = e + "w4/", t.sina = e + "s4/", t.msn = e + "m4/", t.test = "http://images1." + testDH + "." + testDF + "/w4/", t.unknown = e + "w4/", t[0] = t[n.name], t
    }, _this.getCssBaseUrl = function() {
        return _this.getImgBaseUrl()
    }, _this.getJsBaseUrl = function() {
        return _this.getImgBaseUrl()
    }, _this.DEFINED = 1
}(), typeof window.JY != "object" && (window.JY = {});
if (typeof window.JY.login != "object" || typeof window.JY.login.DEFINED == "undefined") {
    if (!JY.DEFINED) {
        var eMsg = "JY.login:渚濊禆浜嶫Y瀵硅薄锛屼絾JY鏈畾涔�";
        typeof JY_JSLIB_DEBUG == "number" && JY_JSLIB_DEBUG && alert(eMsg), typeof JY_JSLIB_MSG == "string" && (JY_JSLIB_MSG += eMsg + "\n")
    }
    if (typeof JY.url != "object" || !JY.url.DEFINED) {
        var eMsg = "JY.login:渚濊禆浜嶫Y.url瀵硅薄锛屼絾JY.url鏈畾涔�";
        typeof JY_JSLIB_DEBUG == "number" && JY_JSLIB_DEBUG && alert(eMsg), typeof JY_JSLIB_MSG == "string" && (JY_JSLIB_MSG += eMsg + "\n")
    }
    if (typeof JY.tool.cookie != "object" || !JY.tool.cookie.DEFINED) {
        var eMsg = "JY.login:渚濊禆浜嶫Y.tool.cookie瀵硅薄锛屼絾JY.tool.cookie鏈畾涔�";
        typeof JY_JSLIB_DEBUG == "number" && JY_JSLIB_DEBUG && alert(eMsg), typeof JY_JSLIB_MSG == "string" && (JY_JSLIB_MSG += eMsg + "\n")
    }
    (function() {
        function GetPcClient() {
            try {
                var e = new ActiveXObject("Jyclient.msgr");
                return !0
            } catch (t) {
            }
            if (!navigator.mimeTypes)
                return !1;
            var n;
            for (n = 0; n < navigator.mimeTypes.length; n++)
                if (navigator.mimeTypes[n].type == "application/x-jymsgr")
                    return !0;
            return !1
        }
        window.JY.login = {};
        var _this = window.JY.login;
        _this.user = {uid: 0}, _this.lastAliveTime = 0, _this.hiddenFrameId = "hder_hid_login_win", _this.formId, _this.frameStatus = 1, _this._submitCallback, _this._popCallback, _this._logoutCallback, _this._aliveCallback, _this.loginWin = null, _this.tryTimes = 0;
        var channel = JY.url.getChannel();
        /msn|miuu|xique|51liehun/.test(location.host) ? _this.loginUrl = "/login/dologin.php?new_header=1&host=" + location.host + "&channel=" + channel : _this.loginUrl = "https://passport.jiayuan.com/dologin.php?host=" + location.host + "&new_header=1&channel=" + channel, _this.popUrl = "/login/popup_v2.php?method=popup_v2&channel=" + channel, _this.logoutUrl = "/login/logout.php?new_header=1&channel=" + channel, _this.aliveUrl = "/login/user_status.php?channel=" + channel, _this.tips = {inputNull: "璇疯緭鍏ョ櫥褰曞笎鍙峰拰瀵嗙爜",inputIdErr: "鐧诲綍甯愬彿杈撳叆閿欒锛乗n\n鐧诲綍甯愬彿鍙互涓烘敞鍐岄偖绠便€佸凡閫氳繃楠岃瘉鐨勬墜鏈哄彿鎴栨偍鐨勪匠缂業D",inputPwNull: "璇峰～鍐欐偍鐨勭櫥褰曞瘑鐮�"}, typeof JY.login.autoLogin != "function" && (JY.login.autoLogin = function() {
            var e = JY.login.getUser();
            if (typeof e != "undefined" && typeof e.uid != "undefined" && /\d{7,9}/.test(e.uid))
                return !1;
            var t = JY.tool.cookie.get("upt"), n = JY.tool.cookie.get("save_jy_login_name");
            if (null != t && null != n) {
                var r = JY.$("hder_login_form");
                r.name.value = n, r.password.value = t, JY.login.loginUrl_bak = JY.login.loginUrl, JY.login.loginUrl += "&upt=" + t, JY.login.submit(r, function(e) {
                    JY.login.loginUrl = JY.login.loginUrl_bak, r.password.value = "";
                    if (typeof e == "object") {
                        if (e.errno == -5)
                            return location.href = e.url, !1;
                        if (e.type == 20)
                            return location.href = e.url, !0;
                        if(e.referer_url != undefined){
                            location.href = e.referer_url;
                        }else{
                            location.href = JY.url.getChannelUrl("usercp") + "?from=autologin"
                        }
                    }
                })
            }
        }, window.setTimeout(function() {
            JY.login.autoLogin()
        }, 2e3)), typeof JY.login.setCookieToReg != "function" && (JY.login.setCookieToReg = function() {
            var e = JY.login.getUser();
            if (typeof e != "undefined" && typeof e.uid != "undefined" && /\d{7,9}/.test(e.uid))
                return !1;
            var t = /((^https?\:\/\/)?(jiayuan|love21cn)\.(msn|jiayuan)\.(com|cn|com\.cn))|((^\w.+)\.((jiayuan|miuu)\.(com|cn)))/, n = /^(https?:\/\/)?([\da-zA-Z-]+)\.([\da-zA-Z-\.]+)([\/\w \.-\?]*)*\/?$/, r = /^https?\:\/\/([\da-zA-Z-]+)\.miuu\.cn/, i = document.referrer, s = location.href, o = "";
            r.test(s) ? o = "miuu.cn" : o = "jiayuan.com";
            if (i != "" && !t.test(i)) {
                var u = "http://reg." + o + "/regsetcookie.php?out_referer=" + i + "&inner_host=" + s;
                JY.login.acrossCookie({acrossurl: u})
            }
        }, window.setTimeout(function() {
            JY.login.setCookieToReg()
        }, 1e3)), _this.acrossCookie = function(e) {
            if (typeof e.acrossurl != "undefined") {
                var t = e.acrossurl;
                typeof t == "string" && (t = [t]);
                for (var n = 0; n < t.length; n++)
                    _this.scriptTag({url: _this.filterUrl(t[n])})
            }
        }, _this.scriptTag = function(e) {
            var t = document.getElementsByTagName("head")[0], n = document.createElement("script");
            n.src = e.url, e.scriptCharset && (n.charset = e.scriptCharset);
            var r = !1;
            n.onload = n.onreadystatechange = function() {
                !r && (!this.readyState || this.readyState == "loaded" || this.readyState == "complete") && (r = !0, t.removeChild(n))
            }, t.appendChild(n)
        }, _this.checkForm = function(e, t) {
            var n = /^1[345678]\d{9}$/gi, r = /^\d{7,9}$/gi;
            return e ? !/^\d+$/.test(e) && !(e.indexOf("@") > -1 && e.indexOf(".") > -1) || /^\d+$/.test(e) && !n.test(e) && !r.test(e) ? (alert(_this.tips.inputIdErr), !1) : t.length == 0 ? (alert(_this.tips.inputPwNull), !1) : !0 : (alert(_this.tips.inputNull), !1)
        }, _this.frameLoadCallback = function(json) {
            var logWin = JY.$(JY.login.hiddenFrameId), response = "";
            if (json)
                response = json;
            else
                try {
                    response = logWin.contentWindow.document.body.innerHTML
                } catch (e) {
                    location.reload()
                }
            if (response != "" && response.length < 6e3) {
                pos1 = response.indexOf("{"), pos2 = response.lastIndexOf("}"), pos1 >= 0 && pos2 > 0 ? response = response.substring(pos1, pos2 + 1) : response = "{}";
                var result = {}, param = {};
                response = response.replace(/\r/g, "").replace(/\n/g, "");
                try {
                    eval("result=" + response)
                } catch (e) {
                }
                if (_this.frameStatus == 1) {
                    var user = result;
                    if(user.jm == 1){
                    	location.href = user.url;
                    }
                    if (user.uid < 1) {
                        param.uid = 0;
                        if (++_this.tryTimes > 3)
                            return location.href = JY.url.getSiteHome() + "login/index.php?pre_url=" + JY.url.href, !1
                    } else {
                        param.uid = user.uid, param.sex = user.sex, param.nickname = JY.tool.cookie.unCharCode(decodeURIComponent(user.nickname)), param.age = user.age, param.work_location = user.work_location, param.work_sublocation = user.work_sublocation,param.referer_url = user.referer_url;
                        try {
                            _this.acrossCookie(user)
                        } catch (e) {
                        }
                        _this.user = param
                    }
                    param.type = user.type ? user.type : 0, param.errno = user.err_type ? user.err_type : 0, param.url = _this.filterUrl(user.url), _this.lastAliveTime = (new Date).getTime(), window.setTimeout(function() {
                        _this._submitCallback(param)
                    }, 1e3)
                } else if (_this.frameStatus == 2) {
                    var popInfo = result;
                    decodeURIComponent(popInfo.title).indexOf("浣崇紭妗岄潰") >= 0 ? GetPcClient() ? hidelayerTable(0) : (document.getElementById("header_login_pop_mask").style.display = "block", document.getElementById("layerTable").style.display = "block") : (popInfo.title ? (param.title = JY.tool.cookie.unCharCode(decodeURIComponent(popInfo.title)), param.content = JY.tool.cookie.unCharCode(decodeURIComponent(popInfo.content)), param.detailUrl = _this.filterUrl(popInfo.btnurl), param.buttonName = JY.tool.cookie.unCharCode(decodeURIComponent(popInfo.btnname)), param.jumpUrl = _this.filterUrl(popInfo.close_url), param.pvImg = _this.filterUrl(popInfo.simg)) : param = {title: "",content: "",jumpUrl: ""}, _this._popCallback(param))
                } else if (_this.frameStatus == 3)
                    _this.user = {uid: 0}, _this._logoutCallback(!0);
                else {
                    if (_this.frameStatus != 4)
                        return !1;
                    var aliveInfo = result;
                    aliveInfo.uid < 1 ? _this.user = {uid: 0} : _this.user.uid < 1 && (_this.user.uid = aliveInfo.uid, _this.user.sex = aliveInfo.sex, _this.user.nickname = aliveInfo.nickname, _this.user.age = aliveInfo.age, _this.user.work_location = aliveInfo.work_location, _this.user.work_sublocation = aliveInfo.work_sublocation), _this.lastAliveTime = (new Date).getTime(), typeof _this._aliveCallback == "function" && _this._aliveCallback(_this.user)
                }
            }
        }, _this.getHiddenFrame = function() {
            _this.loginWin == null && (_this.loginWin = JY.$(_this.hiddenFrameId));
            if (_this.loginWin == null) {
                var e = document.createElement("div");
                e.id = "JY_login_frame_container", e.style.display = "none", document.body.appendChild(e);
                var t = '<iframe name="' + _this.hiddenFrameId + '" id="' + _this.hiddenFrameId + '" ';
                t += 'width=0 height=0 style="display:none;" onload="JY.login.frameLoadCallback()"></iframe>', e.innerHTML = t, _this.loginWin = JY.$(_this.hiddenFrameId)
            }
            return _this.loginWin
        }, _this.submit = function(e, t) {
            if (typeof e != "object" || e.tagName != "FORM")
                return alert("璇蜂紶閫掕〃鍗曞璞�"), !1;
            if (typeof t != "function")
                return alert("璇锋彁渚涚櫥褰曡繑鍥炲悗鐨勮皟鐢ㄥ嚱鏁�"), !1;
            _this._submitCallback = t;
            var n = e.name.value, r = e.password.value;
            return _this.checkForm(n, r) ? (_this.formId = e.id, _this.getHiddenFrame() == null ? (alert("鍒涘缓鐧诲綍FRAME澶辫触"), !1) : (_this.frameStatus = 1, e.target = _this.hiddenFrameId, e.action = _this.loginUrl, e.method = "post", e.submit(), !0)) : !1
        }, _this.getPopInfo = function(e) {
            if (typeof e != "function")
                return alert("璇锋彁渚涘脊鍑轰俊鎭洖璋冨嚱鏁�"), !1;
            _this._popCallback = e;
            var t = _this.getHiddenFrame();
            return t == null ? (alert("鍒涘缓鐧诲綍FRAME澶辫触"), !1) : (_this.frameStatus = 2, t.addEventListener ? t.addEventListener("load", function() {
                JY.login.frameLoadCallback()
            }, !1) : t.attachEvent ? t.attachEvent("onload", function() {
                JY.login.frameLoadCallback()
            }) : t.onload = function() {
                JY.login.frameLoadCallback()
            }, t.src = _this.popUrl, !0)
        }, _this.logout = function(e) {
            if (typeof e != "function")
                return alert("璇锋彁渚涚櫥鍑哄洖璋冨嚱鏁�"), !1;
            _this._logoutCallback = e;
            var t = _this.getHiddenFrame();
            return t == null ? (alert("鍒涘缓鐧诲綍FRAME澶辫触"), !1) : (_this.frameStatus = 3, t.src = _this.logoutUrl, !0)
        }, _this.alive = function(e) {
            typeof e == "function" && (_this._aliveCallback = e);
            var t = _this.getHiddenFrame();
            return t == null ? (alert("鍒涘缓鐧诲綍FRAME澶辫触"), !1) : (_this.frameStatus = 4, t.src = _this.aliveUrl, !0)
        }, _this.getUser = function() {
            var e = JY.tool.cookie.get("PROFILE");
            if (e && e.length > 10) {
                var t = e.split(":");
                var tmp_avatar = (t[5] == 1) ? "http://" + t[3] + "/avatar.jpg" : t[7];
                if(!(/http/.test(e))){
                   tmp_avatar =  "http://" + t[3] + "/" + t[7];
                }
                /^\d{7,10}$/.test(t[0]) && (_this.user.uid = t[0]), _this.user.nickname = JY.tool.cookie.unCharCode(decodeURIComponent(t[1])), _this.user.sex = t[2], _this.user.avatar = tmp_avatar, _this.user.certify = t[5], _this.user.level = "", _this.user.bean = 0, t.length >= 10 && (_this.user.level = t[9], _this.user.bean = t[10]);
                var n = JY.tool.cookie.get("myloc");
                n && n.length > 3 && (n = n.split("|"), _this.user.work_location = n[0], _this.user.work_sublocation = n[1])
            }
            if (_this.user.uid > 0) {
                var r = JY.tool.cookie.get("last_login_time");
                r > 0 && (_this.lastAliveTime = r * 1e3), (new Date).getTime() - _this.lastAliveTime > 36e5
            }
            return _this.user
        }, _this.filterUrl = function(e) {
            return e ? (e = decodeURIComponent(e), e.replace(/&amp;/g, "&")) : ""
        }, document.write('<!--浣崇紭妗岄潰寮瑰眰寮€濮�--><link href="http://images1.jyimg.com/w4/nm/c/layer.css" rel="stylesheet" type="text/css" />'), document.write('<script src="http://images1.jyimg.com/w4/webim/client/clickonce/js/clickonce.js" type="text/javascript"></script>'), document.write('<div class="layerTable" id="layerTable" style="display:none;"><div class="layerTableTop"><a href="javascript:hidelayerTable(0)" class="layerTableClose"></a></div><div class="layerTableBody"><table border="0" cellspacing="0" cellpadding="0"><tr><td><a href="javascript:hidelayerTable(2)" class="layerTableButton"></a></td><td><a href="javascript:hidelayerTable(1)" class="layerTableLink">鏌ョ湅璇︽儏</a></td><td><a href="javascript:hidelayerTable(0)" class="layerTableLink">浠ュ悗鍐嶈</a></td></tr></table></div></div><script type="text/javascript">function hidelayerTable(butt){document.getElementById("layerTable").style.display="none";document.getElementById("header_login_pop_mask").style.display="none";location.href=JY.url.getChannelUrl("usercp");if(butt==1){window.open("http://webim.jiayuan.com/client/download.php");}if(butt==2){NavigateTo("jiayuan.com");}}</script><!--浣崇紭妗岄潰寮瑰眰缁撴潫-->'), _this.DEFINED = 1
    })()
}
