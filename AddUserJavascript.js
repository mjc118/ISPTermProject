
$(document).ready(function(){
	$('#userid').blur(function(){
		$.ajax({
			url: 'Server.php',
			type: 'POST',
			data: {ADDID:$('#userid').val()},
			dataType: 'json',
			success: function(Result){
			}
		});
	});
});