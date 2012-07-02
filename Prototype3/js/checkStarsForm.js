
function checkStarsForm( frm )
{
	var overall = $('#oStars').raty('score');
	var culture = $('#cStars').raty('score');
	var experience = $('#eStars').raty('score');
	var management = $('#mStars').raty('score');
	
	if ( overall == null )
	{
		alert( "Please choose an Overall rating!" )
		return false	
	}
	else if ( culture == null )
	{
		alert( "Please choose a Culture rating!" )
		return false	
	}
	else if ( experience == null )
	{
		alert( "Please choose an Experience rating!" )
		return false	
	}
	else if ( management == null )
	{
		alert( "Please choose a Management rating!" )
		return false	
	}
	
	return true
}
 
