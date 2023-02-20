

function pollingGet(id) {
			var xmlhttp = new XMLHttpRequest();
			var now = new Date().getTime();
            var t = Math.floor((Math.random() * 10) + 3);

			while(new Date().getTime() < now + t){ /* hi */ } 
			var url = "http://parsec2.unicampania.it:5437/getstatus?loggedin="+id;
	        xmlhttp.onreadystatechange = function() {
				console.log(this.responseText);
				var myArr = String(this.responseText).split(" ")[3].split('"')[1];

				if(myArr == "False"){
				   var now = new Date().getTime();
					while(new Date().getTime() < now + 1000){ /* do nothing */ } 
				  return pollingGet(id);
				}
				else{
				   postMessage(true);
				}
			};
			xmlhttp.open("GET", url, false);
			xmlhttp.send();
}
			
self.addEventListener("message", function(event) {
    // `event.data` contains the value or object sent from main
	//var result = ;
	pollingGet(event.data);
	
});			

			
