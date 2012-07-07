$(document).ready(function()
{
	$('input').hover(function()
	{
		$(this).popover('show')
	});
	
	$("#contact-form").validate(
	{
		rules:{
			subject:"required",
			message:"required"
		},
		messages:{
			subject:"Please enter the subject.",
			message:"Please type in a question or message!"
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