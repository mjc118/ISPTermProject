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
				$('#address').val(Result[5]);
				$('#add-date').val(Result[6]);
				if(Result[7] == "Male"){
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