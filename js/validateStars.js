function validateStars( frm )
{
	var overall = $('#oStars').raty('score');
	var culture = $('#cStars').raty('score');
	var experience = $('#eStars').raty('score');
	var management = $('#mStars').raty('score');

	if ( overall == null )
	{
		$( document ).ready( function() {
			$( "#starsModal" ).modal( "toggle" );
		} );
		return false;
	}
	else if ( culture == null )
	{
		$( document ).ready( function() {
			$( "#starsModal" ).modal( "toggle" );
		} );
		return false;
	}
	else if ( experience == null )
	{
		$( document ).ready( function() {
			$( "#starsModal" ).modal( "toggle" );
		} );
		return false;
	}
	else if ( management == null )
	{
		$( document ).ready( function() {
			$( "#starsModal" ).modal( "toggle" );
		} );
		return false;
	}
	
	return true
}