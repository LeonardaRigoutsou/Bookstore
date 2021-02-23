<?php
		if (!isset($_SESSION['cart'])){
			$_SESSION['cart'] = array();
        }

        foreach ($_SESSION['cart'] as $pid => $quantity){
            if ($pid == $_REQUEST['pid']){
                unset($_SESSION['cart'][$_POST['pid']]);

            }

        }

        echo "<meta http-equiv=\"refresh\" content=\"1;url=index.php?p=cart\"/>";
        
?>