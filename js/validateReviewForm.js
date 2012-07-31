$( document ).ready( function()
{
	$( '#reviewForm' ).validate(
	{
		rules: {
			company_name: "required",
			other_company_name: 
			{
				minlength: 2,
				required: "#other_checkbox:checked"
			},
			title:
			{
				minlength: 3,
				required: true
			},
			course_num: "required",
			desc:
			{
				minlength: 140,
				required: true
			},
			review:
			{
				minlength: 140,
				required: true
			}
		},
		messages:
		{
			
		},
		highlight: function( label )
		{
			$( label ).closest( '.control-group' ).removeClass( 'success' ).addClass( 'error' );
			//$( label ).closest( '.control-group' ).addClass( 'error' );
		},
		success: function( label )
		{
			label
				.text( 'OK!' ).addClass( 'valid' )
				.closest( '.control-group' ).removeClass( 'error' ).addClass( 'success' );
				//.closest( '.control-group' ).addClass( 'success' );
		},
		onfocusout: function( label )
		{
			if( $( label ).val() == "" )
			{
				$( label ).closest( '.control-group' ).removeClass( 'success' );
			}
		}
	} );

	$( "#other_checkbox" ).click( function()
	{
		$( "#other_company_name" ).valid();
	} );
} );