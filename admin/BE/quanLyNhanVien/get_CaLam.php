<?php
require_once '../../../php/connect.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

$calam = array();

try {
    $view_nhanvien = "SELECT * FROM nhanvien WHERE trangthai = 1";
    $result_nhanvien = mysqli_query($conn, $view_nhanvien);

    if (!$result_nhanvien) {
        throw new Exception("Error executing query: " . mysqli_error($conn));
    }

    while ($r_nhanvien = mysqli_fetch_assoc($result_nhanvien)) {
        $idnhanvien = $r_nhanvien['id'];
        $hoten = $r_nhanvien['hoten'];

        $count_sql = "SELECT COUNT(*) AS total FROM dangkycalam WHERE idnhanvien = $idnhanvien AND trangthai = 1";
        $result = mysqli_query($conn, $count_sql);

        if (!$result) {
            throw new Exception("Error executing query: " . mysqli_error($conn));
        }

        $row = mysqli_fetch_assoc($result);

        $calam[] = array(
            'idnhanvien' => $idnhanvien,
            'hoten' => $hoten,
            'total' => $row['total']
        );
    }

    // Return data as JSON
    header('Content-Type: application/json');
    echo json_encode($calam);

} catch (Exception $e) {
    // Return error as JSON
    header('Content-Type: application/json', true, 500);
    echo json_encode(['error' => $e->getMessage()]);
}

mysqli_close($conn);
?>
