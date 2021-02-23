<center>
<table class="catinfo">
	<tr>
		<th class="catinfo">Full Name</th>
		<th class="catinfo"></th>
	</tr>
	<?php
		$sql = "select * from customer";
		$result = $mysqli->query($sql);
		while ($row = $result->fetch_assoc()){
			print '
				<tr>
					<td class="catinfo">
						'. $row['Fname'] .' '. $row['Lname'] .'
					</td>
					<td class="catinfo">
						<form method="post" action="index.php?p=do_percustomerorders">
							<input name="cid" type="hidden" value="'. $row['ID'] .'"/>
							<input name="fname" type="hidden" value="'. $row['Fname'] .'"/>
							<input name="lname" type="hidden" value="'. $row['Lname'] .'"/>
							<input type="submit" value="View Orders"/>
						</form>
					</td>
				</tr>
			';
		}
?>
</table>
<hr>
<?php
	$sql = "select * from customer";
	$result = $mysqli->query($sql);
	print '<select name="cid" id="cid">';
	print '<option value="0">all</option>';
	while ($row = $result->fetch_assoc()){
		print '
			<option value="'. $row['ID'] .'">'. $row['ID'] .' '. $row['Fname'] .' '. $row['Lname'] .'</option>
		';
	}
	print '</select>';
?>
<input type="submit" id="button" value="AJAX"/>
<p id="target"><p>
<hr>
<br>
<hr>
<form method="post" action="index.php?p=do_select"
<select>
<?php
	$sql = "select * from customer";
	$result = $mysqli->query($sql);
	while ($row = $result->fetch_assoc()){
		print '
			<option value="'. $row['ID'] .'">'. $row['Fname'] . $row['Lname'] .'</option>
		';
	}
?>
</select>
<input type="submit" value="search"/>
</form>
</center>