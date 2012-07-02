
function checkOverallStars( frm )
{
	var overall = $('#oStars').raty('score');
	
	if ( overall == null )
	{
		return "Please choose an Overall rating!";
	}
	else
	{
		$('#oStars').validationEngine('hide');
	}
}
 
function checkCultureStars( frm )
{
	var culture = $('#cStars').raty('score');
	
	if ( culture == null )
	{
		return "Please choose a Culture rating!";
	}
	else
	{
		$('#cStars').validationEngine('hide');
	}
}

function checkExperienceStars( frm )
{
	var experience = $('#eStars').raty('score');
	
	if ( experience == null )
	{
		return "Please choose an Experience rating!";
	}
	else
	{
		$('#eStars').validationEngine('hide');
	}
}

function checkManagementStars( frm )
{
	var management = $('#mStars').raty('score');
	
	if ( management == null )
	{
		return "Please choose a Management rating!";
	}
	else
	{
		$('#mStars').validationEngine('hide');
	}
}

