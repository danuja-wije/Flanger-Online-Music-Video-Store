function login(){
    document.querySelector('.reg_box').style.display = "none";
    document.querySelector('.log_box').style.display = "flex";
}

function reg(){
    if(document.querySelector('.log_box').style.display === "flex"){
        document.querySelector('.reg_box').style.display = "flex";
        document.querySelector('.log_box').style.display = "none";

    }
    
}

function enableButton(data){
    if(data === 'btn1'){
	if(document.getElementById("checkBox").checked){
	 document.getElementById("submitBtn").disabled=false;
	}
	else{
		 document.getElementById("submitBtn").disabled=true;
    }
}
else if(data === 'btn2'){
    if(document.getElementById("checkBox2").checked){
        document.getElementById("submitBtn2").disabled=false;
       }
       else{
            document.getElementById("submitBtn2").disabled=true;
       }
}
}

function checkPassword(){

    var pass1 = document.getElementById("pwd").value;
    var pass2 =document.getElementById("confpwd").value;

    if(pass1 === pass2){
        return true;
    }
    else{
        alert("Password Mismatch!");
		return false;
    }
    
}

