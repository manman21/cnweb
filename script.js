
function setActive() {
	aObj = document.getElementById('menu').getElementsByTagName('a');
	  for(i=0;i<aObj.length;i++) { 
	    if(document.location.href.indexOf(aObj[i].href)>=0) {
	      aObj[i].className='active';
	    }
	  }
	}

window.onload = setActive;
$(document).ready(function(){
  $("#").click(function(){
    $("p").html("Hello <b>world!</b>");
  });
});
