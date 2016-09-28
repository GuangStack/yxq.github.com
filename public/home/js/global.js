function my_getbyid(id)
{
   itm = null;
   if (document.getElementById)
   {
      itm = document.getElementById(id);
   }
   else if (document.all)
   {
      itm = document.all[id];
   }
   else if (document.layers)
   {
      itm = document.layers[id];
   }
   
   return itm;
}

function love21cnFlash(element,url,width,height)
{
	if (!my_getbyid(element)) return;
	var str = '';
	str += '<object width="'+ width +'" height="'+ height +'" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0">';
	str += '<param name="movie" value="'+ url +'">';
	str += '<param name="wmode" value="opaque">';
	str += '<param name="quality" value="autohigh">';
	str += '<embed width="'+ width +'" height="'+ height +'" src="'+ url +'" quality="autohigh" wmode="opaque" type="application/x-shockwave-flash" plugspace="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash"></embed>';
	str += '</object>';
	my_getbyid(element).innerHTML = str;
}

function love21cnstory(element,url,width,height,images,links,texts)
{
	if (!my_getbyid(element)) return;
	var borderwidth = width + 2;
	var borderheight = height + 2;
	var str = '';
	str += '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,9,0" width="'+ width +'" height="'+ height +'">';
	str += '<param name="allowScriptAccess" value="sameDomain"><param name="movie" value="'+url+'"><param name="quality" value="high"><param name="bgcolor" value="#ffffff">';
	str += '<param name="menu" value="false"><param name=wmode value="opaque">';
	str += '<param name="FlashVars" value="pics='+images+'&amp;links='+links+'&amp;texts='+texts+'&amp;borderwidth='+borderwidth+'&amp;borderheight='+borderheight+'&amp;textheight=0">';
	str += '<embed src="'+url+'" wmode="opaque" FlashVars="pics='+images+'&amp;links='+links+'&amp;texts='+texts+'&amp;borderwidth='+borderwidth+'&amp;borderheight='+borderheight+'&amp;textheight=0" menu="false" bgcolor="#ffffff" quality="high" width="'+ width +'" height="'+ height +'" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />';
	str += '</object>';
	my_getbyid(element).innerHTML = str;
}


function getCookie(c_name)
{
	if (document.cookie.length>0)
  {
		c_start=document.cookie.indexOf(c_name + "=");
		if (c_start!=-1)
		{ 
			c_start=c_start + c_name.length+1;
			c_end=document.cookie.indexOf(";",c_start);
			if (c_end==-1)
				c_end=document.cookie.length;
			return decodeURIComponent(document.cookie.substring(c_start,c_end));
		}
	}
	return null;
}

function setCookie(c_name,value,expiredays)
{
	var exdate=new Date();
	exdate.setDate(exdate.getDate()+expiredays);
	document.cookie=c_name+ "=" +escape(value)+((expiredays==null) ? "" : ";expires="+exdate);
}
