$(document).ready(function()
{
	$('input').hover(function()
	{
		$(this).popover('show')
	});
	
	$("#login-form").validate(
	{
		rules:{
			username:"required",
			password:{
				required: true,
				minlength: 8
			}
		},
		messages:{
			username:"Please enter your username.",
			password:{
				required:"Please enter your password.",
				minlength:"Password must be at least 8 characters."
			}
		},
	
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
});