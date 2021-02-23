<center>
	<table class="catinfo">
		<tr>
			<th class="catinfo">Name</th>
			<th class="catinfo">Price</th>
		</tr>
		<?php
			$cat = $_REQUEST['catid'];
			$sql = "select * from product where Category=?";
			if ($stmt = $mysqli->prepare($sql)){
				$stmt->bind_param("i",$cat);
				$stmt->execute();
				$result = $stmt->get_result();
				while ($row = $result->fetch_assoc()){
					print '<tr><td class="catinfo"><a href="index.php?p=productinfo&pid=' . $row['ID'] . '">' . $row['Title'] . '</a></td><td class="catinfo">' . $row['Price'] . '</td></tr>';
				}
			}
		?>
	</table>
</center>