<?php
	include( "config.php" );

	if ( $_POST['id'] )
	{
		$id = mysql_real_escape_String( $_POST[ 'id' ] );
		$name = mysql_real_escape_String( $_POST[ 'name' ] );
		echo "**$id** - **$name**";
		mysql_query( "UPDATE messages SET $name = $name+1 where id ='$id'" );

		$result = mysql_query( "SELECT up,down FROM messages WHERE id = '$id'");
		$row = mysql_fetch_array( $result );
		$up_value = $row[ 'up' ];
		$down_value = $row[ 'down' ];
		$total = $up_value + $down_value;

		$up_per = ( $up_value * 100 ) / $total;
		$down_per = ( $down_value * 100 ) / $total;
?>

<div style="margin-bottom:10px">
<b>ratings for this review</b> (<?php echo $total; ?> total)
</div>
<table width="300px">

<tr>
<td width="30px"></td>
<td width="30px"><?php echo $up_value; ?></td>
<td width="250px"><div id="greebar" style="width:<?php echo $up_per; ?>%"></div></td>
</tr>

<tr>
<td width="30px"></td>
<td width="30px"><?php echo $down_value; ?></td>
<td width="250px"><div id="redbar" style="width:<?php echo $down_per; ?>%"></div></td>
</tr>

</table>

<?php
	}
?>