<?php
$idkhachhang = $_GET['idkhachhang'];
$sdt = $_GET['sdt'];
$staff = $_GET['staff'];
$iddonhang = $_GET['iddonhang'];
$iddonhang = $_GET['iddonhang'];
$idsanpham = $_GET['idsanpham'];

header("Location: ../FE/taoHoaDon.php?staff=$staff&idkhachhang=$idkhachhang&sdt=$sdt&iddonhang=$iddonhang&idsanpham=$idsanpham&add=1");