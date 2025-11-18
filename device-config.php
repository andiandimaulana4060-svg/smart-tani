<?php
// Koneksi database SQLite
$db = new SQLite3(__DIR__ . '/../db/smart_tani.db');

// Membuat tabel jika belum ada
$db->exec("CREATE TABLE IF NOT EXISTS device_config (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    device_id TEXT UNIQUE
)");

$db->exec("CREATE TABLE IF NOT EXISTS control_status (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    device_id TEXT UNIQUE,
    fan_status INTEGER DEFAULT 0,
    water_pump_status INTEGER DEFAULT 0,
    last_update DATETIME DEFAULT CURRENT_TIMESTAMP
)");

// Menambahkan perangkat baru (contoh)
$db->exec("INSERT INTO device_config (device_id) VALUES ('esp32_kompos_001')");
$db->exec("INSERT INTO control_status (device_id) VALUES ('esp32_kompos_001')");
?>
