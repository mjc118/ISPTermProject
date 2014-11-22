$(document).ready(function(){
	var CallAjax = function(){
		$.ajax({
			url: 'Fetch.php',
			type: 'GET',
			data: {USERID:$('#userid').val()},
			dataType: 'json',
			success: function(Result, status, xhr){
				$('#fname').val(Result[1]);
				$('#lname').val(Result[2]);
				$('#email').val(Result[3]);
				$('#phone').val(Result[4]);
				$('#street').val(Result[8]);
				$('#city').val(Result[9]);
				$('#state').val(Result[10]);
				$('#zip').val(Result[11]);
				$('#add-date').val(Result[5]);
				if(Result[6] == "Male"){
					$('#Male').attr('checked', true);
				}else{
					$('#Female').attr('checked', true);
				}
				//add in parts to fill in rest of form
			},
			error: function(xhr, status, error){
				alert(status);
			}
		});
	};
	setTimeout(CallAjax, 250);
});