<?php
header('Content-Type: application/json');

// Koneksi database SQLite
$db = new SQLite3(__DIR__ . '/../db/smart_tani.db');

// Mengambil data yang dikirimkan (JSON)
$input = json_decode(file_get_contents('php://input'), true);

// Validasi input
if (!$input) {
    echo json_encode(["status" => "error", "message" => "Invalid JSON"]);
    exit;
}

// Validasi data sensor yang diperlukan
if (!isset($input["temperature"]) || !isset($input["humidity"]) || !isset($input["ph_level"]) || !isset($input["gas_level"])) {
    echo json_encode(["status" => "error", "message" => "Missing sensor data"]);
    exit;
}

if (!is_numeric($input["temperature"]) || !is_numeric($input["humidity"]) || !is_numeric($input["ph_level"]) || !is_numeric($input["gas_level"])) {
    echo json_encode(["status" => "error", "message" => "Invalid sensor data format"]);
    exit;
}

// Menyimpan data sensor ke database
$stmt = $db->prepare("
    INSERT INTO sensor_data (device_id, temperature, humidity, ph_level, gas_level)
    VALUES (:device_id, :temperature, :humidity, :ph_level, :gas_level)
");
$stmt->bindValue(":device_id", $input["device_id"]);
$stmt->bindValue(":temperature", $input["temperature"]);
$stmt->bindValue(":humidity", $input["humidity"]);
$stmt->bindValue(":ph_level", $input["ph_level"]);
$stmt->bindValue(":gas_level", $input["gas_level"]);
$stmt->execute();

// Mengirimkan response berhasil
echo json_encode(["status" => "success"]);
?>
