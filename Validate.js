$(document).ready(function(){
	$('#userid').change(function(){
		if(CheckUserID()){
			$.ajax({
				url: 'Fetch.php',
				type: 'POST',
				data:{CheckID:$('#userid').val()},
				dataType: 'text',
				success: function(Result){
					if(Result == "True"){
						alert("Not a Unique User ID!");
						document.getElementById('userid').style.border = "1px solid red";
						document.getElementById('userid').value = "";
					}
					else{
						document.getElementById('userid').style.border = "1px solid white";
					}
				}
			});
		}
	});
});

function IsFormValid(){
	var errorNumber = 1;
	var AlertMsg = "The Form Has The Following Errors\n"; 
	
	if(!CheckUserID()){
		AlertMsg += errorNumber + ") User ID has incorrect form\n";
		++errorNumber;
	}
	if(!CheckFName()){
		AlertMsg += errorNumber + ") First Name has incorrect form\n";
		++errorNumber;
	}
	if(!CheckLName()){
		AlertMsg += errorNumber + ") Last Name has incorrect form\n";
		++errorNumber;
	}
	if(!CheckEmail()){
		AlertMsg += errorNumber + ") Email has incorrect form\n";
		++errorNumber;
	}
	if(!CheckPhone()){
		AlertMsg += errorNumber + ") Phone Number has incorrect form\n";
		++errorNumber;
	}
	if(!CheckStreet()){
		AlertMsg += errorNumber + ") Street Name has incorrect form\n";
		++errorNumber;
	}
	if(!CheckCity()){
		AlertMsg += errorNumber + ") City Name has incorrect form\n";
		++errorNumber;
	}
	if(!CheckState()){
		AlertMsg += errorNumber + ") State Name has incorrect form\n";
		++errorNumber;
	}
	if(!CheckZip()){
		AlertMsg += errorNumber + ") Zip Code has incorrect form\n";
		++errorNumber;
	}
	if(!CheckDate()){
		AlertMsg += errorNumber + ") Date-Added has incorrect form\n";
		++errorNumber;
	}
	
	//check if a radio button is selected
	if(!($('input[type=radio]:checked').size() > 0)){
		AlertMsg += errorNumber + ") You Must Select a Sex\n";
	}
	
	//validation failed
	if(AlertMsg.length > 34){
		alert(AlertMsg);
		return false;
	}
	
	return true;
}

function CheckUserID(){
	var InputID = document.getElementById('userid').value;
	var CorrectID = /^[0-9]{9}$/;
	if(!InputID.match(CorrectID)){
		document.getElementById('userid').style.border = "1px solid red";
		return false;
	}
	
	return true;
}
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

function CheckStreet(){
	var Street = document.getElementById('street').value;
	var StreetCheck = /^(([0-9A-z]+) ?([A-z ])?){1,}$/;
	if(!Street.match(StreetCheck)){
		document.getElementById('street').style.border = "1px solid red";
		return false;
	}else{
		document.getElementById('street').style.border = "1px solid white";
		return true;
	}
}

function CheckCity(){
	var City = document.getElementById('city').value;
	var CityCheck = /^([A-Z]{1}[a-z]+ ?){1,}$/;
	if(!City.match(CityCheck)){
		document.getElementById('city').style.border = "1px solid red";
		return false;
	}else{
		document.getElementById('city').style.border = "1px solid white";
		return true;
	}
}

function CheckState(){
	var State = document.getElementById('state').value;
	var StateCheck = /^[A-Z]{2}$/;
	if(!State.match(StateCheck)){
		document.getElementById('state').style.border = "1px solid red";
		return false;
	}else{
		document.getElementById('state').style.border = "1px solid white";
		return true;
	}
}

function CheckZip(){
	var Zip = document.getElementById('zip').value;
	var ZipCheck = /^[0-9]{5,6}$/;
	if(!Zip.match(ZipCheck)){
		document.getElementById('zip').style.border = "1px solid red";
		return false;
	}else{
		document.getElementById('zip').style.border = "1px solid white";
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