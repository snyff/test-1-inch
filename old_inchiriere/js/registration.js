$(document).ready(function(){
	$("#registration_form").validate({
		  rules: {
		    name: "required",
		    lastname : "required",
		    email: {
					required : true,
					email	 : true
			},
		    nick	: "required",
		    captcha	: "required",
		    repass	: "required",
		    pass	: "required"
		  }
	});
});