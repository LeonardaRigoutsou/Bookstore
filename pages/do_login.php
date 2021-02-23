<?php
	$sql = "select * from customer where uname=? and passwd=?";
	if($stmt = $mysqli->prepare($sql)){     //opou -> simenei . px: $mysqli.prepare........s
		$stmt->bind_param("ss",$_POST['username'],$_POST['password']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();   //oti exei sto epistrefei me morfi pinaka
		if (empty($row)){
			echo "<h3>Username/Password is not correct, please try again...</h3><br>";
			echo "<meta http-equiv=\"refresh\" content=\"2;url=index.php?p=login\"/>";
		}else{
			if ($row['uname'] == 'admin'){
				$_SESSION['username']='admin';
				echo '<h1>!!!ADMIN LOGGED IN!!!</h1>';
				print '<h3>Redirecting you in <label id="lab">1 second</label>... </h3>';
				echo "<meta http-equiv=\"refresh\" content=\"1;url=index.php?p=start\"/>";
			}else{
				if ($_POST['captcha'] == $_POST['num']){
					$_SESSION['username'] = $row['uname'];
					echo '<h1>Hello '.$_POST['username'].'</h1>';
					print '<h3>Redirecting you in <label id="lab">1 second</label>... </h3>';
					echo "<meta http-equiv=\"refresh\" content=\"1;url=index.php?p=start\"/>";
				}else{
					echo "<h3>Captcha is not the same ! try again </h3><br>";
					echo "<meta http-equiv=\"refresh\" content=\"2;url=index.php?p=login\"/>";
				}
			}
		}
	}
	//updated that with the code above, db in use
	/*if (($_POST['username']=='admin')&&($_POST['password']=='admin')){
		$_SESSION['username']='admin';
		echo '<h1>!!!ADMIN LOGGED IN!!!</h1>';
	}else{
		$_SESSION['username']=$_POST['username']; 
   		echo '<h1>Hello '.$_POST['username'].'</h1>';
	}*/
?>
