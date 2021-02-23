<?php
	$sql_username_check = "select uname from customer where uname=?";
	if ($stmt_username_check = $mysqli->prepare($sql_username_check)){
		$stmt_username_check->bind_param("s",$_POST['username']);
		$stmt_username_check->execute();
		$result_username_check = $stmt_username_check->get_result();
		$row_username_check = $result_username_check->fetch_row();
		if (empty($row_username_check)){
			$sql = "insert into customer(Fname,Lname,Address,Phone,uname,passwd) values(?,?,?,?,?,?)";
			if ($stmt = $mysqli->prepare($sql)){
				$stmt->bind_param("ssssss",$_POST['firstName'],$_POST['lastName'],$_POST['address'],$_POST['phone'],$_POST['username'],$_POST['password']);
				$stmt->execute();
				echo '<h1>ACCOUNT CREATED, DATABASE UPDATED</h1>';
				print '<h3>Redirecting you in <label id="lab">3 second</label>... </h3>';
				echo "<meta http-equiv=\"refresh\" content=\"3;url=index.php?p=login\"/>";
			}
		}else{
			echo '<h2>ERROR, USERNAME ALREADY EXISTS, TRY AGAIN</h2>';
			print '<h3>Redirecting you in <label id="lab">3 second</label>... </h3>';
			echo "<meta http-equiv=\"refresh\" content=\"3;url=index.php?p=register\"/>";	
		}
	}
?>