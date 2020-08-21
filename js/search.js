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
 function search() {  
      if (searchReq.readyState == 4 || searchReq.readyState == 0) {  
           var str = escape(document.getElementById('query').value);  
           searchReq.open("GET", 'admin/crudproduit.php?id=7&search=' + str, true);  
           searchReq.send(null);  
           searchReq.onreadystatechange = handleSearchResult;  
      }            
 }  
 function handleSearchResult () {  
      if (searchReq.readyState == 4) {  
                     var ss = document.getElementById('result');  
                     var str1 = document.getElementById('query');  
                     var curLeft=0;  
                     ss.style.visibility = "visible";  
                     if (str1.offsetParent){  
                          while (str1.offsetParent){  
                          curLeft += str1.offsetLeft;  
                          str1 = str1.offsetParent;  
                          }  
                     }  
                     var str =searchReq.responseText.split("\n");  
                     if(str.length==1) {  
                          ss.innerHTML = '';  
                          ss.style.visibility = "hidden";  
                     }  
                     else  
                     ss.innerHTML = '';  
                     for(i=0; i < str.length - 1; i++) {  
                          //Build our element string. This is cleaner using the DOM, but  
                          //IE doesn't support dynamically added attributes.  
                          var suggest = '<div style="cursor : pointer;" onmouseover="javascript:suggestOver(this);" ';  
                          suggest += 'onmouseout="javascript:suggestOut(this);" ';  
                          suggest += 'onclick="javascript:setSearch(this.innerHTML);" ';  
                          suggest += 'class="small">' + str[i] + '</div>';  
                          ss.innerHTML += suggest;  
                     }  
                }  
 }  