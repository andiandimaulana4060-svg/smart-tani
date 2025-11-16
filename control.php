<?php
header("Content-Type: application/json");
include_once "init.php";

$db = new SQLite3(__DIR__ . '/../db/smart_tani.db');

$device_id = $_GET["device_id"] ?? "esp32_kompos_001";

$stmt = $db->prepare("
SELECT fan_status, water_pump_status, last_update 
FROM control_status 
WHERE device_id = :device_id
");
$stmt->bindValue(":device_id", $device_id);

$result = $stmt->execute()->fetchArray(SQLITE3_ASSOC);

echo json_encode(["status" => "success", "data" => $result]);
?>
