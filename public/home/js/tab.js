
	function setTab03Syna1 ( i )
	{
		selectTab03Syna1(i);
	}
	
	function selectTab03Syna1 ( i )
	{
		switch(i){
			case 1:
			document.getElementById("TabTab03Cona1").style.display="block";
			document.getElementById("TabTab03Cona2").style.display="none";
			document.getElementById("TabTab03Cona3").style.display="none";
			document.getElementById("fonta1").style.color="#000000";
			document.getElementById("fonta2").style.color="#655d59";
			document.getElementById("fonta3").style.color="#655d59";
			break;
			case 2:
			document.getElementById("TabTab03Cona1").style.display="none";
			document.getElementById("TabTab03Cona2").style.display="block";
			document.getElementById("TabTab03Cona3").style.display="none";
			document.getElementById("fonta1").style.color="#655d59";
			document.getElementById("fonta2").style.color="#000000";
			document.getElementById("fonta3").style.color="#655d59";
			break;
			case 3:
			document.getElementById("TabTab03Cona1").style.display="none";
			document.getElementById("TabTab03Cona2").style.display="none";
			document.getElementById("TabTab03Cona3").style.display="block";
			document.getElementById("fonta1").style.color="#655d59";
			document.getElementById("fonta2").style.color="#655d59";
			document.getElementById("fonta3").style.color="#000000";
			break;
		}
	}




	function setTab03Synb1 ( i )
	{
		selectTab03Synb1(i);
	}
	
	function selectTab03Synb1 ( i )
	{
		switch(i){
			case 1:
			document.getElementById("TabTab03Conb1").style.display="block";
			document.getElementById("TabTab03Conb2").style.display="none";
			document.getElementById("fontb1").style.color="#000000";
			document.getElementById("fontb2").style.color="#655d59";
			break;
			case 2:
			document.getElementById("TabTab03Conb1").style.display="none";
			document.getElementById("TabTab03Conb2").style.display="block";
			document.getElementById("fontb1").style.color="#655d59";
			document.getElementById("fontb2").style.color="#000000";
			break;
		}
	}
	
	
	
	function setTab03Sync1 ( i )
	{
		selectTab03Sync1(i);
	}
	
	function selectTab03Sync1 ( i )
	{
		switch(i){
			case 1:
			document.getElementById("TabTab03Conc1").style.display="block";
			document.getElementById("TabTab03Conc2").style.display="none";
			document.getElementById("fontc1").style.color="#655d59";
			document.getElementById("fontc2").style.color="#655d59";
			break;
			case 2:
			document.getElementById("TabTab03Conc1").style.display="none";
			document.getElementById("TabTab03Conc2").style.display="block";
			document.getElementById("fontc1").style.color="#655d59";
			document.getElementById("fontc2").style.color="#655d59";
			break;
		}
	}

