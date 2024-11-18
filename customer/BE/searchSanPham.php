<?php
//nhan du lieu tu form
$user = $_POST['user'];
$key = $_POST['key'];


header("Location: ../FE/viewTatCaSanPham.php?user=$user&key=$key");


?>