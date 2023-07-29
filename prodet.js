function validate(){
	var pid=document.getElementById("proid").value;
	var pname=document.getElementById("proname").value;
	var ror=document.getElementById("reorder").value;
	var qun=document.getElementById("quantity").value;
	var cost=document.getElementById("cost").value;
	if(ror<qun){
		alert("Reorder level is less than quantity");
		return false;
	}
	if(pid==""){
		alert("Please enter data");
		return false;
	}
	if(pname==""){
		alert("Please enter  data");
		return false;
	}
	if(ror==""){
		alert("Please enter  data");
		return false;
	}
	if(qun==""){
		alert("Please enter  data");
		return false;
	}
	if(cost==""){
		alert("Please enter  data");
		return false;
	}
	
}