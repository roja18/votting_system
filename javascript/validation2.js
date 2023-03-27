function checkMyy(){
	var x = document.forms["regg"]["nsubj"].value;
	var y = document.forms["regg"]["newb"].value;
	var z = document.forms["regg"]["newsto"].value;

	
	if(x==null||x==""){
	document.getElementById('nsubj').innerHTML ="Please Enter News Subject";
	document.forms["regg"]["nsubj"].focus();
	return false;
	}
	else{
		document.getElementById('nsubj').innerHTML ="";
	}

	if(y==null||y==""){
	document.getElementById('newb').innerHTML ="Please Type News";
	document.forms["regg"]["newb"].focus();
	return false;
	}
	else{
		document.getElementById('asms').innerHTML ="";
	}

	if(p==null||p==""){
	document.getElementById('newsto').innerHTML ="Please Select Send To";
	document.forms["regg"]["newsto"].focus();
	return false;
	}
	else{
		document.getElementById('newsto').innerHTML ="";
	}

	
}