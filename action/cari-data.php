<?php
include '../koneksi.php'; // Pastikan koneksi database sudah benar

$q = isset($_GET['q']) ? $_GET['q'] : '';
$searchQuery = '%' . $q . '%';

$sql = "SELECT id_pelanggan, nama_pelanggan FROM pelanggan WHERE id_pelanggan LIKE ? OR nama_pelanggan LIKE ?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param('ss', $searchQuery, $searchQuery);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>
