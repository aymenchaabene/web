function controle ()
{
	
	var codep=document.getElementById("Codepostal");
	if(codep.value.length != 4)
	{
		alert("le code postal est erroné");
		return false;
	}
	
	
	var gouv= document.getElementById("query");
	else if(gouv.value=="Choisir Gouvernorat")
	{
		alert("choisir gouvernement");
		return false;
	}
	
	var mobile=document.getElementById("mobile");
	else if(mobile.value.length != 8)
	{
		alert("le numero est erroné / doit contenir 8 chiffres");
		return false;
	}
	return true;
	
}