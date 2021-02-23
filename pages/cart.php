<center>
	<?php
		if (!isset($_SESSION['cart'])){
			print "<h3>Cart is empty :)</h3>";
			//debugging purposes
			print '<p><a href="?p=logout"><font color="black"><b><i><u>destroy session (debugging purposes) (footer disabled)</u></i><b></font></a></p>';
			exit;
		}
	?>
	
	<table class="catinfo">
		<tr>
			<th class="catinfo">Name</th>
			<th class="catinfo">Quantity</th>
		</tr>
		<?php
			foreach($_SESSION['cart'] as $pid => $quantity){
				$sql = "select * from product where ID=?";
				if ($stmt = $mysqli->prepare($sql)){
					$stmt->bind_param("i",$pid);
					$stmt->execute();
					$result = $stmt->get_result();
					$row = $result->fetch_assoc();
					print '
						<tr>
							<td class="catinfo">' . $row['Title'] . '</td>
							<td class="catinfo">' . $quantity . '</td>
							<td class="catinfo">
							<form action="index.php?p=do_deleteitem&pid='.$pid.'" method="post">
									<input name="pid" type="hidden" value="'. $row['ID'] .'"/>
									<input type="submit" value="delete"/>
								</form>
							</td>
						</tr>
					';
				}
			}
		?>
	</table>
	<hr>
	<form method="post" action="index.php?p=do_order">
		<input type="submit" value="proceed" />
	</form>
	<form method="post" action="index.php?p=do_deletecart">
		<input type="submit" value="Delete the cart!" />
	</form>
</center>