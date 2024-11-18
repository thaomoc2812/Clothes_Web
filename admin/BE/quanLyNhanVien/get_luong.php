<?php
require_once '../../../php/connect.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

$monthlyCalam = array();

try {
    $view_nhanvien = "SELECT * FROM nhanvien WHERE trangthai = 1";
    $result_nhanvien = mysqli_query($conn, $view_nhanvien);

    if (!$result_nhanvien) {
        throw new Exception("Error executing query: " . mysqli_error($conn));
    }

    $nhanviens = array();
    while ($r_nhanvien = mysqli_fetch_assoc($result_nhanvien)) {
        $idnhanvien = $r_nhanvien['id'];
        $hoten = $r_nhanvien['hoten'];
        $nhanviens[$idnhanvien] = $hoten;
    }

    $count_sql = "SELECT idnhanvien, COUNT(*) AS total, DATE_FORMAT(ngay, '%Y-%m') AS month FROM dangkycalam WHERE trangthai = 1 GROUP BY idnhanvien, month";
    $result = mysqli_query($conn, $count_sql);

    if (!$result) {
        throw new Exception("Error executing query: " . mysqli_error($conn));
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $month = $row['month'];
        $idnhanvien = $row['idnhanvien'];
        $total = $row['total'];

        if (!isset($monthlyCalam[$month])) {
            $monthlyCalam[$month] = [];
        }

        $monthlyCalam[$month][$idnhanvien] = array(
            'idnhanvien' => $idnhanvien,
            'hoten' => $nhanviens[$idnhanvien],
            'total' => $total
        );
    }

    // Ensure all employees are in the results, even with zero shifts
    foreach ($nhanviens as $idnhanvien => $hoten) {
        foreach ($monthlyCalam as $month => &$calamData) {
            if (!isset($calamData[$idnhanvien])) {
                $calamData[$idnhanvien] = array(
                    'idnhanvien' => $idnhanvien,
                    'hoten' => $hoten,
                    'total' => 0
                );
            }
        }
    }

    // Sort the data by month and then by employee name for consistent display
    ksort($monthlyCalam);
    foreach ($monthlyCalam as &$calamData) {
        uasort($calamData, function ($a, $b) {
            return strcmp($a['hoten'], $b['hoten']);
        });
    }

    // Return data as JSON
    header('Content-Type: application/json');
    echo json_encode($monthlyCalam);

} catch (Exception $e) {
    // Return error as JSON
    header('Content-Type: application/json', true, 500);
    echo json_encode(['error' => $e->getMessage()]);
}

mysqli_close($conn);
?>
