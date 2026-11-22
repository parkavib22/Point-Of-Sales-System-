<?php
// Run once after importing database.sql, then DELETE this file.
require_once 'config.php';
$hash=password_hash('Admin@123', PASSWORD_DEFAULT);
$stmt=db()->prepare("INSERT INTO users(name,username,password,role) VALUES('Administrator','admin',?,'admin') ON DUPLICATE KEY UPDATE password=VALUES(password)");
$stmt->execute([$hash]);
echo 'Admin account created. Username: admin | Password: Admin@123. Delete setup_admin.php now.';
