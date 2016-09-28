// JavaScript Document
var getID = function(objName){if(document.getElementById){return eval('document.getElementById("'+objName+'")')}else{return false}};
function tab(name,cur,n){
	for(i=1; i<=n; i++){ 
		var h=getID(name+i);
		var c=getID(name+'Con'+i);
		if (h.className == 'on') h.className = '';
		if(i==cur){
			h.className += ' on';
			c.style.display='block';
		}else{
			h.className = h.className.replace("on","");
			h.className = h.className.replace(" on","");
			c.style.display = 'none';
			}
		}
}

function showIcons(id){
	iconlayer("viplayer");
	iconlayer("levellayer");
	iconlayer("giftCon1");
	iconlayer("giftCon2");
}

function showById(id){
	getID(id).style.display = 'block';
}
function hiddenById(id){
	getID(id).style.display = 'none';
}

function changecostzhifubao(typea,typeb){
	if(typeb == 'qita'){			
		yinhang_qianshua = getID('yinhang_zhifubao1').value;
		var reg_zfb = new RegExp("^[0-9]*$");
		if(!reg_zfb.test(yinhang_qianshua)){
			alert("请输入数字!");
			getID('yinhang_zhifubao1').value = '';
			getID('cost_total_zhifubao').innerHTML = '0';
			getID("yinhang_zhifubao1").focus();
			return false;
		}
		yinhang_qianshua_int = parseInt(yinhang_qianshua,10);//十进制整形
		if(isNaN(yinhang_qianshua_int) ){
			yinhang_qianshua_int = 0;
			getID('yinhang_zhifubao1').value = '';
			getID('cost_total_zhifubao').innerHTML = '0';
		}else {
			getID('cost_total_zhifubao').innerHTML = yinhang_qianshua_int*2;
		}
	}else{	
		getID('cost_total_zhifubao').innerHTML = typea*2;
	}
}
function changecostyinhang(typea,typeb){
	if(typeb == 'qita'){			
		yinhang_qianshua = getID('yinhang_youpiao1').value;
		var reg_yh = new RegExp("^[0-9]*$");
		if(!reg_yh.test(yinhang_qianshua)){
			alert("请输入数字!");
			getID('yinhang_youpiao1').value = '';
			getID('cost_total_yinhang').innerHTML = '0';
			getID('yinhang_youpiaocc').value = '0';
			getID("yinhang_youpiao1").focus();
			return false;
		}
		yinhang_qianshua_int = parseInt(yinhang_qianshua,10);//十进制整形
		if(isNaN(yinhang_qianshua_int) ){
			yinhang_qianshua_int = 0;
			getID('yinhang_youpiao1').value = '';
			getID('cost_total_yinhang').innerHTML = '0';
		}else {
			getID('cost_total_yinhang').innerHTML = yinhang_qianshua_int*2;
			getID('yinhang_youpiaocc').value = yinhang_qianshua_int*2;

		}
	}else{	
		getID('cost_total_yinhang').innerHTML = typea*2;
	}
}
function check_form(zf_type){
	if(zf_type == 'yh'){
		yinhang_qianshua = getID('yinhang_youpiao1').value;
		var reg_yh = new RegExp("^[0-9]*$");
		if(!reg_yh.test(yinhang_qianshua)){
			alert("请输入数字!");
			getID('yinhang_youpiao1').value = '';
			getID('cost_total_yinhang').innerHTML = '0';
			getID('yinhang_youpiaocc').value = '0';
			getID("yinhang_youpiao1").focus();
			return false;
		}
	}else{
		yinhang_qianshua = getID('yinhang_zhifubao1').value;
		var reg_zfb = new RegExp("^[0-9]*$");
		if(!reg_zfb.test(yinhang_qianshua)){
			alert("请输入数字!");
			getID('yinhang_zhifubao1').value = '';
			getID('cost_total_zhifubao').innerHTML = '0';
			getID("yinhang_zhifubao1").focus();
			return false;
		}
	}
}