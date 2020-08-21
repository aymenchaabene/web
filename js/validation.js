
			 
		function validation() {
						document.getElementById('er').value='';
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			   var nomReg= /^[a-zA-Z]/;
			    nom = document.getElementById('n').value;
				 prenom = document.getElementById('p').value;
			    mail = document.getElementById('mai').value;
				tel=document.getElementById('te').value;
				 mdp=document.getElementById('pass').value;
			   cin=document.getElementById('ci').value;
			   
				if (!(mail).match(emailReg) || mail == '') {
			        alert("Veuillez verifier votre Email.!");
				return false;
				}
				if (!(nom).match(nomReg) || nom == '') {
			        alert("Veuillez verifier votre nom!\nLe nom doit uniquement contenir des lettres!");
				return false;
				}
					if (!(prenom).match(nomReg) || prenom == '') {
			        alert("Veuillez verifier votre prenom!\nLe prenom doit uniquement contenir des lettres!");
				return false;
				}
			else if (mdp.length<6)
				{
				  alert("Le mot de passe doit contenir au minimum 6 caractères !");
				  document.getElementById('pass').value='';
				
				document.getElementById('er').value=false;
				return false;			
				}
				else if (cin.length!=8)
				{
				  alert("Veuillez vérifier votre CIN!");
				  document.getElementById('ci').value='';
				return false;			
				}
				else if (tel == '' || isNaN(tel)) {
			        alert("Entrer votre numero de telephone svp.!");
					document.getElementById('te').value='';
				return false;
				}
				else if (tel.length!=8)
				{
				  alert("Verifier la longuer du nombre de télélphone  saisi !");
				  document.getElementById('te').value='';
				return false;			
				}
			    return true;

			}
			
			

function VerifMail()
	{
		
	a = document.verif.e_mail_client.value;
	valide1 = false;
	
	for(var j=1;j<(a.length);j++){
		if(a.charAt(j)=='@'){
			if(j<(a.length-4)){
				for(var k=j;k<(a.length-2);k++){
					if(a.charAt(k)=='.') valide1=true;
				}
			}
		}
	}
	if(valide1==false) alert("Veuillez saisir une adresse email valide.");
	return valide1;
	}




			