$( document ).ready( function()
{
	$( '#reviewForm' ).validate(
	{
		rules: {
			company_name:
			{
				required: true
			},
			title:
			{
				minlength: 3,
				required: true
			},
			course_num:
			{
				required: true
			},
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
		highlight: function( label )
		{
			$( label ).closest( '.control-group' ).addClass( 'error' );
		},
		success: function( label )
		{
			label
				.text( 'OK!' ).addClass( 'valid' )
				.closest( '.control-group' ).addClass( 'success' );
		}
	} );
} );