<center>
	<table class="catinfo">
		<tr>
			<th class="catinfo">Name</th>
			<th class="catinfo">Price</th>
			<th class="catinfo">Category</th>
		</tr>
		<?php
			$sql = "select * from product order by Title";
			if(! ($result = $mysqli->query($sql))){
				echo "Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}else{
				while($row = $result->fetch_assoc()){
					$sql_category = "select Name from category where ID =" . $row['Category'];
					$result_category = $mysqli->query($sql_category);
					$row_category = $result_category->fetch_assoc();
					print '<td class="catinfo"><a href="index.php?p=productinfo&pid=' . $row['ID'] . '">' . $row['Title'] . '</a></td><td class="catinfo">' . $row['Price'] . '</td><td class="catinfo">' . $row_category['Name'] . '</td></tr>';
				}
			}
		?>
	</table>
</center>