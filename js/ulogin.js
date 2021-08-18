$(document).ready(function() {                 
    $("#login_form").submit(function(e){
		  e.preventDefault();
		  $.ajax({
			url:'ajax/check_user_authentication.php',
			type:'POST',
			data: {staff_id:$("#staff_id").val(), password:$("#password").val()},
			success: function(resp) {
			   if(resp == "invalid") {
					$("#errorMsg").html("Invalid username and password!");  
			   }
			   else if(resp == "disabled")
			   {
			   		$("#errorMsg").html("User Account has been disabled!");  
			   } 

			   else {
					window.location.href= resp;
			   }
			}
		 });
	});
});