
function checkForm( frm )
{
	if ( frm.company_name.value == "" )
	{
		alert( "Please select a company/employer from the list." )
		return false	
	}
	
	if ( frm.company_name.value == "OTHER_COMPANY" && frm.other_company_name.value == "" )
	{
		alert( "Please enter in your company/employer." )
		return false	
	}
	
	if ( frm.title.value == "" )
	{
		alert( "Please enter in your co-op title." )
		return false	
	}
	
	if ( frm.course_num.value == "" )
	{
		alert( "Please select a course number for your co-op." )
		return false	
	}
	
	if ( frm.desc.value == "" )
	{
		alert( "Please tell us more about your co-op experience!  We really want to know.  :)" )
		return false	
	}
	
	if ( frm.review.value == "" )
	{
		alert( "Please tell us more about your co-op experience!  We really want to know.  :)" )
		return false	
	}
	
	var score = $('#stars').raty('score');
	if ( score == null )
	{
		alert( "Please select a rating!" )
		return false	
	}
	
	alert( "Validation of form successful!  Thanks for posting!  ^_^" )
	
	return true
}

