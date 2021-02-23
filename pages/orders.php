<?php
	$power_sql = 'select product.Title,orderdetails.Quantity from orders 
				join orderdetails on orders.ID = orderdetails.Orders 
				join customer on orders.Customer = customer.ID 
				join product on orderdetails.Product = product.ID 
				where customer.uname like "' . $_SESSION['username'] . '"';
	$power_result = $mysqli->query($power_sql);
?>
<center>
	<table class="catinfo">
		<tr>
			<th class="catinfo">Name</th>
			<th class="catinfo">Quantity</th>
		</tr>
		<?php
			while($power_row = $power_result->fetch_assoc()){
				print '<tr><td class="catinfo">' . $power_row['Title'] . '</td><td class="catinfo">' . $power_row['Quantity'] . '</td></tr>';
			}
		?>
	</table>
</center>