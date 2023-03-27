function checkMy(){
	var x = document.forms["reg"]["iname"].value;
	var y = document.forms["reg"]["aname"].value;
	var z = document.forms["reg"]["password"].value;
	var o = document.forms["reg"]["cpassword"].value;
	var p = document.forms["reg"]["email"].value;
	
	if(x==null||x==""){
	document.getElementById('isms').innerHTML ="Please Enter Instution Name";
	document.forms["reg"]["iname"].focus();
	return false;
	}
	else{
		document.getElementById('isms').innerHTML ="";
	}

	if(y==null||y==""){
	document.getElementById('asms').innerHTML ="Please Enter Account Name";
	document.forms["reg"]["aname"].focus();
	return false;
	}
	else{
		document.getElementById('asms').innerHTML ="";
	}

	if(p==null||p==""){
	document.getElementById('esms').innerHTML ="Please Enter Email address";
	document.forms["reg"]["email"].focus();
	return false;
	}
	else{
		document.getElementById('esms').innerHTML ="";
	}

	if(z==null||z==""){
	document.getElementById('psms').innerHTML ="Please Enter Password";
	document.forms["reg"]["password"].focus();
	return false;
	}
	else{
		document.getElementById('psms').innerHTML ="";
	}

	if(o==null||o==""){
	document.getElementById('csms').innerHTML ="Please Comfim Password";
	document.forms["reg"]["cpassword"].focus();
	return false;
	}
	else{
		document.getElementById('csms').innerHTML ="";
	}

	if(z!=o){
	document.getElementById('csms').innerHTML ="password and Comfim Password doe's not much";
	return false;
	}
}

// =========================================news validation========================
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