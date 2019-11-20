window.onload = my_fun;

function my_fun() {
	var element = document.getElementById("lookup");
	var lookup2 = document.getElementById("lookup1")
	var div = document.getElementById("result");
	
    element.onclick = function(){
    	var country= document.getElementById("country").value;
		var url =('world.php?country='+country);
    	myFunction(url);
    }
    
    lookup2.onclick = function(){
    	var country = document.getElementById("country").value;
    	var url = "world.php?country="+country+"&context=cities";
    	myFunction(url);
    }

    
    
	function myFunction(url){	
    var httpRequest = new XMLHttpRequest();
	httpRequest.open("GET",url,true);
	httpRequest.send();
	
	httpRequest.onreadystatechange = function(){
		
		if (httpRequest.readyState === XMLHttpRequest.DONE){
			if (httpRequest.status === 200) {
			var response = httpRequest.responseText;
			div.innerHTML = response;
		}}
		else{
			div.innerHTML = "Error!!";
		}
	
	};

}
}