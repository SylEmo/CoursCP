function recupererIdProjetURL(){
	var params = window.location.search;
	var param;
	var i;
	
	params = params.substring(1);
	params = params.split("&");
	for(i=0;i<params.length;i++){
		param = params[i].split("=");
		if(param[0] == "id"){
			return param[1];
		}
	}
}