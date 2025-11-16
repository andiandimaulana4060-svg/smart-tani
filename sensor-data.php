<?php
header('Content-Type: application/json');
include_once "init.php";

$db = new SQLite3(__DIR__ . '/../db/smart_tani.db');
$input = json_decode(file_get_contents('php://input'), true);

if (!$input) {
    echo json_encode(["status" => "error", "message" => "Invalid JSON"]);
    exit;
}

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

echo json_encode(["status" => "success"]);
?>
