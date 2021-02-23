<?php
    $sql ="delete from customer where uname like '" . $_SESSION['username'] . "'";
    $mysqli->query($sql);
    echo "<meta http-equiv=\"refresh\" content=\"1;url=index.php?p=logout\"/>";
?>