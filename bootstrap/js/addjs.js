function checkMy(){
	var x = document.forms["reg"]["npass"].value;
    var y = document.forms["reg"]["cpass"].value;
    
    if(x!=y){
        document.getElementById('csms').innerHTML ="password and Comfim Password doe's not much";
        return false;
        }
}