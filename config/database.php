<?php
    $host = 'localhost';
    $dbname = 'vastevents';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connection Successful.";
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
?>