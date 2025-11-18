<?php
header("Content-Type: application/json");

// Koneksi database SQLite
$db = new SQLite3(__DIR__ . '/../db/smart_tani.db');

// Mengambil data yang dikirimkan (JSON)
$input = json_decode(file_get_contents('php://input'), true);

// Validasi input
if (!$input) {
    echo json_encode(["status" => "error", "message" => "Invalid JSON"]);
    exit;
}

// Mengupdate status kontrol perangkat
$stmt = $db->prepare("
    UPDATE control_status SET 
    fan_status = :fan_status, 
    water_pump_status = :water_status,
    last_update = datetime('now')
    WHERE device_id = :device_id
");
$stmt->bindValue(":fan_status", $input["fan_status"]);
$stmt->bindValue(":water_status", $input["water_pump_status"]);
$stmt->bindValue(":device_id", $input["device_id"]);
$stmt->execute();

// Mengirimkan response berhasil
echo json_encode(["status" => "success"]);
?>
