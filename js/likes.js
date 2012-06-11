$( function()
{
	$( ".vote" ).click( function() 
	{
		var id = $( this ).attr( "id" );
		var name = $( this ).attr( "name" );
		var dataString = 'id=' + id ;
		var parent = $( this );

		if ( name == 'like' )
		{
			$( this ).fadeIn( 200 ).html( '<img src="images/dot.gif" align="absmiddle">' );
			$.ajax(
			{
				type: "POST",
				url: "like.php",
				data: dataString,
				cache: false,

				success: function( html )
				{
					parent.html( html );
  
				}
			} );
		}
		else if ( name == 'dislike' )
		{
			$( this ).fadeIn( 200 ).html( '<img src="images/dot.gif" align="absmiddle">' );
			$.ajax(
			{
				type: "POST",
				url: "dislike.php",
				data: dataString,
				cache: false,

				success: function(html)
				{
					parent.html(html);
				}
   
			} );
		}
		else
		{
			$( this ).fadeIn( 200 ).html( '<img src="images/dot.gif" align="absmiddle">' );
			$.ajax(
			{
				type: "POST",
				url: "flag.php",
				data: dataString,
				cache: false,

				success: function(html)
				{
					parent.html(html);
				}
   
			} );
		}

		return false;
	} );
});