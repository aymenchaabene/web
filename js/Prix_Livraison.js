function getXmlHttpRequestObject() {  
      if (window.XMLHttpRequest) {  
           return new XMLHttpRequest();  
      } else if(window.ActiveXObject) {  
           return new ActiveXObject("Microsoft.XMLHTTP");  
      } else {  
           alert("Your Browser Sucks!");  
      }  
 }  
 //Our XmlHttpRequest object to get the auto suggest  
 var searchReq = getXmlHttpRequestObject();  
 //Called from keyup on the search textbox.  
 //Starts the AJAX request.  
 function Prix_Livraison() {  
      if (searchReq.readyState == 4 || searchReq.readyState == 0) {  
           var str = escape(document.getElementById('query').value);  
           searchReq.open("GET", 'updateprix.php?gouvernorat=' + str, true);  
           searchReq.send(null);  
           searchReq.onreadystatechange = handleSearchResult;  
		  
      }            
 }  
 function handleSearchResult () {  
      if (searchReq.readyState == 4) {  
                     var ss = document.getElementById('result');  
                     var str1 = document.getElementById('query');
					// var str1 = document.getElementById('totale_final');
                    
					
                
                     }  
                     var str =searchReq.responseText.split("\n");  
                     if(str.length==1) {  
                          ss.innerHTML = '';  
                          ss.style.visibility = "visible";  
						
						  ss.innerHTML= str +" TND";
                     }  
                     
                }  
 