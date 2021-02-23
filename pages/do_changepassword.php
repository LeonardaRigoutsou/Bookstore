<?php
    $sql = "select passwd from customer where uname like '" . $_SESSION['username'] . "'";
    $sql_result = $mysqli->query($sql);
    $sql_result_row = $sql_result->fetch_assoc();
    if ($sql_result_row['passwd'] == $_POST['current_password']){
        if ($_POST['new_password'] == $_POST['confirm_new_password']){
            $sql = "update customer set passwd=? where uname like '" . $_SESSION['username'] . "'";
            if ($stmt = $mysqli->prepare($sql)){
                $stmt->bind_param("s",$_POST['new_password']);
                $stmt->execute();
                echo '<h2>PASSWORD CHANGED</h2>';
                print '<h3>Redirecting you in <label id="lab">3 second</label>... </h3>';
                echo "<meta http-equiv=\"refresh\" content=\"3;url=index.php?p=logout\"/>";	
            }
        }else{
            echo '<h2>ERROR, NEW PASSWORD AND CONFIRM PASSWORD VALUES ARE DIFFERENT, TRY AGAIN</h2>';
            print '<h3>Redirecting you in <label id="lab">3 second</label>... </h3>';
            echo "<meta http-equiv=\"refresh\" content=\"3;url=index.php?p=changepassword\"/>";	
        }
    }else{
        echo '<h2>ERROR, THIS IS NOT YOUR CURRENT PASSWORD, TRY AGAIN</h2>';
        print '<h3>Redirecting you in <label id="lab">3 second</label>... </h3>';
        echo "<meta http-equiv=\"refresh\" content=\"3;url=index.php?p=changepassword\"/>";	
    }
    
?>