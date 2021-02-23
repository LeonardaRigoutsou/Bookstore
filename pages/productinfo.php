<form method="post" action="index.php?p=add2cart"
<center>
	<table class="catinfo">
		<tr>
			<th class="catinfo">Title</th>
			<th class="catinfo">Description</th>
			<th class="catinfo">Quantity</th>
			<th class="catinfo">Action</th>
		</tr>
		<tr>
			<?php
			$pid = $_REQUEST['pid'];
			$sql = "select * from product where ID=?";
			if ($stmt = $mysqli->prepare($sql)){
				$stmt->bind_param("i",$pid);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				print '<input name="pid" value="' . $pid . '" type="hidden"/><td class="catinfo">' . $row['Title'] . '</td><td class="catinfo">' . $row['Description'] . '</td><td class="catinfo"><input name="quantity" /></td><td class="catinfo"><input type="submit" value="Add to cart!""/></td>';
			}
			?>
		</tr>
	</table>
</center>