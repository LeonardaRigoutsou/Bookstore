<center>
	<?php
		if (!isset($_SESSION['cart'])){
			$_SESSION['cart'] = array();
		}
		$exists = false;
		foreach ($_SESSION['cart'] as $pid => $quantity){
			if ($pid == $_POST['pid']){
				$_SESSION['cart'][$_POST['pid']] = intval($_POST['quantity']+$quantity);
				$exists = true;
			}
		}
		if (!$exists){
			$_SESSION['cart'][$_POST['pid']] = $_POST['quantity'];
		}
		echo "<h3>Added to cart... redirecting you in 1''</h3>";
		echo "<meta http-equiv=\"refresh\" content=\"1;url=index.php?p=products\"/>";
	?>
</center>