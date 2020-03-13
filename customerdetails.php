<?php
	include_once("header.php");
	include_once("config.php");
?>
<div id="customerlisting" style="margin-top: 50px;">
	<center>
		<h1>Customer List</h1>
	</center>
		<?php
			opendb();
			$query = "SELECT * FROM user";
		  	$result = mysql_query($query) or db_fail($query);
		?>
		<table border="2" align="center">
		  <thead>
		    <tr>
		      <th>Name</th>
		      <th>Email</th>
		      <th>Address</th>
		      <th>Phone Number</th>
		      <th>Action</th>
		    </tr>
		  </thead>
		  <tbody>
		<?php
			if(mysql_num_rows($result)) {
				while ($row = mysql_fetch_assoc($result)) { ?>
				<tr><td><?php echo $row['name']; ?></td><td><?php echo $row['email']; ?></td><td><?php echo $row['address']; ?></td><td><?php echo $row['phone']; ?></td><td><div class="linkc"><a href="viewdetails.php?id=<?php echo $row['u_id']; ?>">View Details</a></div></td>
			<?php }
			} else {
				echo "No Record Found";
			}
			closedb();
		    ?>
	 	 </tbody>
	</table>
</div>
<?php
	include_once("footer.php");
?>