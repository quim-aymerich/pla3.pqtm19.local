function publishUL(objArray,id){
	var objUL=document.getElementById(id);
	for(var i=0; i<objArray.length; i++){
		console.log("Dintre la funció");
		objUL.innerHTML+="<li>"+objArray[i]+"</li>";
		debugger;
	}
}
function publishULver2 (objArray){
	var cadena="";
	for(var i=0; i<objArray.length; i++){
		console.log("Dintre la funció");
		cadena+="<li>"+objArray[i]+"</li>";
		debugger;
	}
	return cadena;
}