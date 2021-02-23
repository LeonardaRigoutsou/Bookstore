<center>
	<?php
		$sql_profile = 'select * from customer where uname like "' . $_SESSION['username'] . '"';
		$sql_profile_result = $mysqli->query($sql_profile); //query einai gia aplo erotima, oxi prepare 
		print "<table>";
		$sql_profile_row = $sql_profile_result->fetch_assoc();
		print '
			<tr>
				<td><h3>First name:&nbsp;&nbsp;&nbsp; </td>
				<td><h3>' . $sql_profile_row['Fname'] . '</h3></td></h3>
			</tr>
			<tr>
				<td><h3>Last name:</h3> </td>
				<td><h3>' . $sql_profile_row['Lname'] . '</h3></td>
			</tr>
			<tr>
				<td><h3>Address:</h3> </td>
				<td><h3>' . $sql_profile_row['Address'] . '</h3></td>
			</tr>
			<tr>
				<td><h3>Phone:</h3> </td>
				<td><h3>' . $sql_profile_row['Phone'] . '</h3></td>
			</tr>
			<tr>
				<td><h3>Username:</h3> </td>
				<td><h3>' . $sql_profile_row['uname'] . '</h3></td>
			</tr>
			<tr>
				<td><h3>Password:</h3> </td>
				<td><h3>' . $sql_profile_row['passwd'] . '</h3></td>
			</tr>
			<tr>
				<td>
					<form action="index.php?p=do_delete" method="post">
					<input type="submit" value="Delete my Account"/>
					</form>
				</td>
				<td>
					<form action="index.php?p=changepassword" method="post">
					<input type="submit" value="Change my password"/>
					</form>
				</td>
			</tr>
		';
		print "</table>";
	?>
</center>