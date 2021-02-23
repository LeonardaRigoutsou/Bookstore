<?php
	if (!isset($_SESSION['username'])){
		print "<h3>You must login to place an order...</h3>";
		print '<h3>Redirecting you in <label id="lab">2 seconds</label>... </h3>';
		echo "<meta http-equiv=\"refresh\" content=\"2;url=index.php?p=login\"/>";
	}else{
		$sql_custid = "select ID from customer where uname=?";
		if ($stmt = $mysqli->prepare($sql_custid)){
			$stmt->bind_param("s",$_SESSION['username']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row)){
				echo "empty bro";//debugging
			}else{
				$customer_id = $row['ID'];
				$sql_place_order = "insert into orders(Customer, oDate) values(?,now())";
				if ($stmt_order = $mysqli->prepare($sql_place_order)){
					$stmt_order->bind_param("i",$customer_id);
					$stmt_order->execute();
				}
				$sql_ordid = "select max(ID) from orders";
				$result_ordid = $mysqli->query($sql_ordid);
				$row = $result_ordid->fetch_row();
				$ordid = $row[0];
				//broken code, replaced with the above
				/*$sql_ordid = "select ID from orders where ID = MAX(ID) and Customer=?";
				if ($stmt = $mysqli->prepare($sql_ordid)){
					$stmt->bind_param("i",$customer_id);
					$stmt->execute();
					$result = $stmt->get_result();
					$row = $result->fetch_assoc();
					if(empty($row)){
						echo "empty bro";//debugging
					}else{
						$ordid = $row['ID'];
						echo "aaaa";
					}
				}else{
					echo "den mphke";
				}*/
				$sql_place_order = "insert into orderdetails(Orders,Quantity,Product) values(?,?,?)";
				if ($stmt_place_order = $mysqli->prepare($sql_place_order)){
					foreach ($_SESSION['cart'] as $pid => $quantity){
						$stmt_place_order->bind_param("iii",$ordid,$quantity,$pid);
						$stmt_place_order->execute();
					}
					echo '<h1>ORDER PLACED!!</h1>';
					print '<h3>Redirecting you in <label id="lab">2 second</label>... </h3>';
					echo "<meta http-equiv=\"refresh\" content=\"2;url=index.php?p=start\"/>";
				}
			}
		}
	}
?>