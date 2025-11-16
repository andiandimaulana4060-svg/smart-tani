<?php
$db_path = __DIR__ . '/../db/smart_tani.db';

if (!file_exists($db_path)) {
    $db = new SQLite3($db_path);

    // sensor data
    $db->exec("CREATE TABLE sensor_data (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        device_id TEXT,
        temperature REAL,
        humidity REAL,
        ph_level REAL,
        gas_level INTEGER,
        timestamp DATETIME DEFAULT CURRENT_TIMESTAMP
    )");

    // device config
    $db->exec("CREATE TABLE device_config (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        device_id TEXT UNIQUE,
        fan_auto_mode INTEGER DEFAULT 1,
        fan_threshold INTEGER DEFAULT 40,
        water_auto_mode INTEGER DEFAULT 1,
        water_threshold INTEGER DEFAULT 60,
        update_interval INTEGER DEFAULT 10000
    )");

    // control status table
    $db->exec("CREATE TABLE control_status (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        device_id TEXT UNIQUE,
        fan_status INTEGER DEFAULT 0,
        water_pump_status INTEGER DEFAULT 0,
        last_update DATETIME DEFAULT CURRENT_TIMESTAMP
    )");

    // default device
    $db->exec("INSERT INTO device_config (device_id) VALUES ('esp32_kompos_001')");
    $db->exec("INSERT INTO control_status (device_id) VALUES ('esp32_kompos_001')");
}
?>
