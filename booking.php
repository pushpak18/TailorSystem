<?php
	include_once("header.php");
	if(!@$_SESSION['mps']['u_id'])
		header("Location: booking.php");
	else {
?>
<div class="form" id="center">
<form  class="bform" id="bookingForm" action="bookingsubmit.php" method="post" novalidate="novalidate">
	<input type="hidden" name="pattern" value="<?php echo $_REQUEST['pattern']; ?>">
		<table border="0" align="center">
			<center>
				<h1>Booking Form</h1>
			</center>
			<tr>
				<td>&nbsp;</td>
				<td>
					<input id="buser" type="hidden" name="user"  value="<?php  echo $_SESSION['mps']['u_id']?>" class="required number" />
				</td>
			</tr>
			<tr>
				<td><label for="bquantity">Quantity</label></td>
				<td>
					<input id="bquantity" type="text" name="quantity" class="required number" />
				</td>
			</tr>
			<tr>
				<td><label for="bdate">Booking Date</label></td>
				<td>
					<input id="bdate" type="text" name="bdate"  class="required"  value="<?php echo date('Y-m-d'); ?>" />
				</td>
			</tr>
			<tr>
				<td><label for="datepicker">Delivery Date</label></td>
				<td>
					<input type="text" name="ddate" id="ddate" />
				</td>
			</tr>
			<tr>
				<td align=center>
					<input type="submit" name="booking" value="Submit">
				</td>
				<td>
					<input type="reset"  name="booking" value="Reset">
				</td>
			</tr>
		</table>
	</form>
</div>
<script type="text/javascript" name="validate">
	$(document).ready(function()
	{
		$("#bookingForm").validate();
		$('#ddate, #bdate').datepicker();
	});
</script>

<?php
}
include_once("footer.php");

?>