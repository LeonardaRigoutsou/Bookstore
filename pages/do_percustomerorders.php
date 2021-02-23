<center>
<?php
	print '<h1>Orders of '. $_POST['fname'] . ' ' . $_POST['lname'] . '</h1>';
	print '
		<table class="catinfo">
			<tr>
				<th class="catinfo">ID</th>
				<th class="catinfo">Customer ID</th>
				<th class="catinfo">Date</th>
			</tr>
	';
	$sql = 'select * from orders where Customer="'. $_POST['cid'] .'"';
	$result = $mysqli->query($sql);
	while($row = $result->fetch_assoc()){
		print '
			<tr>
				<td class="catinfo">'. $row['ID'] .'</td>
				<td class="catinfo">'. $row['Customer'] .'</td>
				<td class="catinfo">'. $row['oDate'] .'</td>
			</tr>
		';
	}
	print '</table>';
?>
</center>