
function checkPasswordMatch() {
    	var password = $("#txtNewPassword").val();
    	var confirmPassword = $("#txtConfirmPassword").val();
	
    	if (password != confirmPassword) {
		$("#txtNewPassword").css("background-color","red");       
        	$("#txtConfirmPassword").css("background-color","red");
    	} else {
        	$("#txtNewPassword").css("background-color","green");
        	$("#txtConfirmPassword").css("background-color","green");
    	}
}

function validateForm() {
    	var password = $("#txtNewPassword").val();
    	var confirmPassword = $("#txtConfirmPassword").val();
	var username = $("#txtUserName").val();
	
    	if (password != confirmPassword) {
    		alert("fix password");
		return false;
	} else {
    		if(username == ""){
			alert("first name empty");
			return false;
		} else {
			return true;
		}
	}

}
