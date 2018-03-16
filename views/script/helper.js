function checkPass(){

// Check if passwords are match
	var passcode1 = document.getElementById('passcode1');
	var passcode2 = document.getElementById('passcode2');
	var signUpButton = document.getElementById('signSubmit');
	var passcodeError = document.getElementById('passcodeError');
	var buttonType = document.getElementById('signButton');

	var goodColor = "#fff";
    var badColor = "#ff6666";

	if(passcode1.value !== passcode2.value){	
		passcode2.style.backgroundColor = badColor;
		passcodeError.innerHTML = "Passwords has to match!";
		buttonType.type="button";
		buttonType.classList.add("disabled");
	}else{
	
		passcode2.style.backgroundColor = goodColor;
		buttonType.type="submit";
		passcodeError.innerHTML = "";
		buttonType.classList.remove("disabled");

	}



	
}