function CheckFName(){
	var Name = document.getElementById('fname').value;
	var FName = /^[A-Z]{1}[a-z]+$/;
	if(!Name.match(FName)){
		document.getElementById('fname').style.border = "1px solid red";
		return false;
	}else{
		document.getElementById('fname').style.border = "1px solid white";
		return true;
	}
}

function CheckLName(){
	var Name = document.getElementById('lname').value;
	var LName = /^[A-Z]{1}[a-z]+$/;
	if(!Name.match(LName)){
		document.getElementById('lname').style.border = "1px solid red";
		return false;
	}else{
		document.getElementById('lname').style.border = "1px solid white";
		return true;
	}
}

function CheckEmail(){
	var Email = document.getElementById('email').value;
	var EmailCheck = /^[A-z0-9._-]+@[A-z]+.[A-z]{2,5}$/;
	if(!Email.match(EmailCheck)){
		document.getElementById('email').style.border = "1px solid red";
		return false;
	}else{
		document.getElementById('email').style.border = "1px solid white";
		return true;
	}
}

function CheckPhone(){
	var Phone = document.getElementById('phone').value;
	var PhoneCheck = /^[0-9]{3}-[0-9]{3}-[0-9]{4}$/;
	if(!Phone.match(PhoneCheck)){
		document.getElementById('phone').style.border = "1px solid red";
		return false;
	}else{
		document.getElementById('phone').style.border = "1px solid white";
		return true;
	}
}

function CheckDate(){
	var Date = document.getElementById('add-date').value;
	var DateCheck = /^[0-1][0-9]\/[0-3][0-9]\/[0-9]{4}$/;
	if(!Date.match(DateCheck)){
		document.getElementById('add-date').style.border = "1px solid red";
		return false;
	}else{
		document.getElementById('add-date').style.border = "1px solid white";
		return true;
	}
}